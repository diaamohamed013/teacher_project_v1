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

        // select last of response
        $position = strpos(mb_convert_encoding($response, 'UTF-8', 'ISO-8859-1'),mb_convert_encoding("}}", 'UTF-8', 'ISO-8859-1'));

        $rest = substr($response, 0,$position + 2);
        $response_json = json_decode($rest, true);
        $url = $response_json['data']['url'];
        $invoiceId = $response_json['data']['invoiceId'];
        $this->Payment_processing($invoiceId,$this->teacher_id,$this->student_id);
        $this->close();
        return redirect($url);

    }

    protected function close()
    {
        return curl_close($this->curl);
    }

    public static function Payment_processing($invoiceId,$teacher_id,$student_id,$payment_id = null)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://staging.fawaterk.com/api/v2/getInvoiceData/'.$invoiceId,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Authorization: Bearer '.env('PAYMENT_API_TOKEN')
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $data = json_decode($response, true);

        $obj = (object) array(
            'teacher_id'            => $teacher_id,
            'student_id'            => $student_id,
            'invoice_id'            => $data['data']['invoice_id'],
            'invoice_key'           => $data['data']['invoice_key'],
            'payment_method'        => $data['data']['payment_method'],
            'currency'              => $data['data']['currency'],
            'commission'            => $data['data']['commission'],
            'total'                 => $data['data']['total_paid'],
            'paid_at'               => $data['data']['paid_at'],
            'paid'                  => $data['data']['paid'],
        );

        if ($payment_id)
        {
            payment::updatePayment($obj,$payment_id);
        }else
        {
            payment::CreatePayment($obj);
        }
    }



}
