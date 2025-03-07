<?php

namespace App\Http\Controllers;

use App\Helper\Classes\fawaterk;
use App\Models\payment;
use App\Models\Student;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index(Request $request)
    {
        $price = $request->input('price', 0);
        $user_id = $request->input('user_id');
        $student = Student::where('user_id', $user_id)->first();
        $user = $student->user;
        try
        {
            $payment = new fawaterk($price,$student->id,1);
            $payment->createCustomer(
                $user->name ?? 'student',
                $user->name ?? 'lastname',
                $student->user->email,
                $student->phone,
                $student->city
            );
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
            if ($payment->paid == 1)
            {
                return abort(404);
            }


            fawaterk::Payment_processing($request->input('invoice_id'),$payment->teacher_id,$payment->student_id,$payment->id);

            $student = student::where('id',$payment->student_id)->first();
            $student->balance = $student->balance + $payment->total;
            $student->save();

            return redirect()->route('home')->with('status', 'تمت عملية الدفع بنجاح.');
        }
        return abort(404);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function fail(Request $request): RedirectResponse
    {
        return redirect()->route('home')->with('error', 'فشلت عملية الدفع الرجاء المحاولة مرة اخري.');
    }

    public function pending(Request $request)
    {
        //TODO::pending
    }
}
