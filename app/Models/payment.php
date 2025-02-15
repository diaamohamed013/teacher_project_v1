<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Exception;


/**
 * Class Payment
 * @package App\Models
 *
 * @property integer  $teacher_id
 * @property integer  $student_id
 * @property integer  $invoice_id
 * @property string   $invoice_key
 * @property string   $payment_method
 * @property string   $currency
 * @property integer  $commission
 * @property integer  $total
 * @property string   $paid
 * @property string   $paid_at
 * @property string   $invoice_created_at

 *
 *
 *
 * @method static where(string $string, mixed $input)
 * @method static paginate(int $APP_PAGINATE)
 */
class payment extends Model
{
    /**
     * @throws Exception
     */
    public static function CreatePayment(object $data): payment
    {
        $payment = new self();

        $payment->teacher_id        = $data->teacher_id;
        $payment->student_id        = $data->student_id;
        $payment->invoice_id        = $data->invoice_id;
        $payment->invoice_key       = $data->invoice_key;
        $payment->payment_method    = $data->payment_method;
        $payment->currency          = $data->currency ?? 'EGP';
        $payment->commission        = $data->commission ?? 0;
        $payment->paid              = $data->paid ?? 0;
        $payment->total             = $data->total ?? 0;

        if (!$payment->save())
        {
            throw new Exception('payment not saved');
        }
        return $payment;
    }


}
