<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeZone;
use Faker\Provider\DateTime;
use Illuminate\Database\Eloquent\Model;
use Exception;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


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
    protected $dateFormat = 'Y-m-d H:i:s';

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
        $payment->paid_at           = $data->paid_at;
        $payment->total             = $data->total ?? 0;

        if (!$payment->save())
        {
            throw new Exception('payment not saved');
        }
        return $payment;
    }

    public static function updatePayment(object $data,int $payment_id): payment
    {
        $payment = payment::where('id', $payment_id)->first();

        $payment->teacher_id        = $data->teacher_id;
        $payment->student_id        = $data->student_id;
        $payment->invoice_id        = $data->invoice_id;
        $payment->invoice_key       = $data->invoice_key;
        $payment->payment_method    = $data->payment_method;
        $payment->currency          = $data->currency ?? 'EGP';
        $payment->commission        = $data->commission ?? 0;
        $payment->paid              = $data->paid ?? 0;
        $payment->total             = $data->total ?? 0;

        if ($data->paid_at)
        {
            $utcDateTime    = Carbon::createFromFormat('Y-m-d\TH:i:s.u\Z', $data->paid_at, 'UTC');
            $localDateTime  = $utcDateTime->setTimezone('Africa/Cairo');
            $localTime      = $localDateTime->format('Y-m-d H:i:s');
            $payment->paid_at       = $localTime;
        }

        if (!$payment->update())
        {
            throw new Exception('payment not update');
        }
        return $payment;
    }


    public function student():belongsTo
    {
        return $this->belongsTo(student::class);
    }
}
