<?php

namespace App\Http\Controllers;

use App\Helper\Classes\fawaterk;
use App\Models\payment;
use App\Models\Student;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        try
        {
            $payment = new fawaterk(349,1,1);
            $payment->createCustomer(
                'احمد',
                'تواب',
                'ahlsdkjflasj@gmail.com',
                '01011401555',
                'sdjfasdfsdaf');
            return $payment->createInvoice();
        }catch (\Exception $exception)
        {
            dd($exception->getMessage());
        }
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function success(Request $request): RedirectResponse
    {
        if ($request->has('invoice_id') && is_numeric($request->input('invoice_id')))
        {
            $payment = payment::where('invoice_id',$request->input('invoice_id'))->first();
            if (empty($payment))
            {
                return abort(404);
            }

            $payment->paid = 1;
            $payment->paid_at = date('Y-m-d H:i:s');
            $payment->save();

            $student = student::where('id',$payment->student_id)->first();
            $student->balance = $student->balance + $payment->total;
            $student->save();

            return redirect()->route('profile');
        }
        return abort(404);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function fail(Request $request): RedirectResponse
    {
        return redirect()->route('profile')->withErrors('payment fail');
    }

    public function pending(Request $request)
    {
        //TODO::pending
    }
}
