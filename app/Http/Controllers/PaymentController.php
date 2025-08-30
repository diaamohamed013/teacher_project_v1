<?php

namespace App\Http\Controllers;

use App\Helper\Classes\fawaterk;
use App\Models\payment;
use App\Models\Student;
use App\Models\Subscription;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Exception;

class PaymentController extends Controller
{
    public function index(Request $request)
    {
        $course_id = $request->input('user_id');
        $price = $request->input('price', 0);
        $user_id = $request->input('user_id');
        $student = Student::where('user_id', $user_id)->first();
        $user = $student->user;

        try
        {
            $subscription = Subscription::handel_subscription($student,$price,$course_id);

            if (!$subscription) // if balance not enough
            {
                $payment = new fawaterk($price, $student->id, 1);
                $payment->createCustomer(
                    $user->name ?? 'student',
                    $user->name ?? 'lastname',
                    $student->user->email,
                    $student->phone,
                    $student->city
                );
                return $payment->createInvoice();
            }
            return redirect()->route('home')->with('status', 'تمت عملية الدفع بنجاح.');
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors('error', $exception->getMessage());
        }
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function success(Request $request)
    {
        if (!$request->has('invoice_id') || !is_numeric($request->input('invoice_id')))
        {
            return abort(404,'Not found');
        }

        DB::beginTransaction();
        try
        {
            $payment = payment::where('invoice_id', $request->input('invoice_id'))->first();
            if (empty($payment))
            {
                return abort(404);
            }
            if ($payment->paid == 1)
            {
                return abort(404);
            }


            $payment_update = fawaterk::Payment_processing($request->input('invoice_id'), $payment->teacher_id, $payment->student_id, $payment->id);

            $student = student::where('id', $payment_update->student_id)->first();
            $student->balance = $student->balance + $payment_update->total;
            if ($student->update())
            {
                DB::commit();
                return redirect()->route('home')->with('status', 'تمت عملية الدفع بنجاح.');
            }
            DB::rollBack();
            return redirect()->route('home')->with('error', 'فشلت عملية الدفع الرجاء المحاولة مرة اخري.');
        }catch (\Exception $exception)
        {
            DB::rollBack();
            return redirect()->route('home')->with('error', 'فشلت عملية الدفع الرجاء المحاولة مرة اخري.');
        }
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
