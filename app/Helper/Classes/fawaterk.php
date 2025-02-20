<?php

namespace App\Helper\Classes;

use App\Models\payment;
use Illuminate\Support\Facades\DB;

class fawaterk
{
    protected  $curl;
    protected string $customer;
    protected string $price;
    protected string $success_url;
    protected string $fail_url;
    protected string $pending_url;
    protected int $student_id;
    protected int $teacher_id;
    public function __construct($price,int $student_id,int $teacher_id)
    {
        $this->curl = curl_init();
        $this->price = $price;
        $this->success_url  = env('APP_URL').'payment/success';
        $this->fail_url     = env('APP_URL').'payment/fail';
        $this->pending_url  = env('APP_URL').'payment/pending';
        $this->student_id = $student_id;
        $this->teacher_id = $teacher_id;
    }

    /**
     * @param string $first_name
     * @param string $last_name
     * @param string $email
     * @param string $phone
     * @param string $address
     * @return object
     */
    public function createCustomer(string $first_name, string $last_name, string $email, string $phone, string $address): string
    {
        return $this->customer = '{
            "first_name": "'.$first_name.'",
            "last_name" : "'.$last_name.'",
            "email"     : "'.$email.'",
            "phone"     : "'.$phone.'",
            "address"   : "'.$address.'"
        }';
    }

    public function createInvoice()
    {
        if (empty($this->customer))
        {
            throw new \Exception('you need to create a customer first');
        }
        curl_setopt_array($this->curl, array(
            CURLOPT_URL => 'https://staging.fawaterk.com/api/v2/createInvoiceLink',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{
                "cartTotal": "'.$this->price.'",
                "currency": "EGP",
                "customer": '.$this->customer.',
                "redirectionUrls": {
                     "successUrl" : "'.$this->success_url.'",
                     "failUrl":  "'.$this->fail_url.'",
                     "pendingUrl": "'.$this->pending_url.'"
                },
                "cartItems": [
                    {
                        "name": "كارت شحن بقيمة '.$this->price.' جنيه",
                        "price": "'.$this->price.'",
                        "quantity": "1"
                    }
                ]
            }',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Authorization: Bearer '.env('PAYMENT_API_TOKEN')
            ),
        ));
        $response = curl_exec($this->curl);
        if (array_key_exists('data', $response))
        {
            $url = json_decode($response, true)['data']['url'];
            $this->close();
            $this->createPaymentRecord($response);
            return redirect($url);
        }
        $this->close();
        throw new \Exception($response);
    }

    protected function close()
    {
        return curl_close($this->curl);
    }

    protected function createPaymentRecord($response)
    {
        DB::beginTransaction();
        try
        {
            $data = json_decode($response, true)['data'];
            $obj = (object) array(
                'teacher_id'            => $this->teacher_id,
                'student_id'            => $this->student_id,
                'invoice_id'            => $data['invoiceId'],
                'invoice_key'           => $data['invoiceKey'],
                'payment_method'        => null,
                'currency'              => 'EGP',
                'commission'            => 0,
                'total'                 => $this->price,
                'paid'                  => 0,
            );

            $payment = payment::CreatePayment($obj);

            DB::commit();
        }
        catch (\Exception $e)
        {
            DB::rollBack();
            dd($e->getMessage());
        }

    }

}
