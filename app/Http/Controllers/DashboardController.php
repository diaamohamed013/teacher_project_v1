<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\payment;
use App\Models\Student;
use Illuminate\Http\JsonResponse;

class DashboardController extends Controller
{
    public function index()
    {
        $studentsCount = Student::count();
        $coursesCount = Course::count();
        $paymentsCount = payment::count();
        $price = Payment::all()->sum('total');
        $payments = payment::latest()->take(5)->get();

        return view('site.pages.dashboard.index', compact(
            'studentsCount',
            'coursesCount',
            'paymentsCount',
            'price',
            'payments')
        );
    }

    public function chart(): JsonResponse
    {
        $studentsCountPerMonth = [];
        $paymentsCountPerMonth = [];
        $year = date('Y');

        for ($month = 1; $month <= 12; $month++)
        {
            $studentsNum = Student::whereYear('created_at', '=', $year)
                ->whereMonth('created_at', '=', $month)
                ->count();

            $paymentsNum = Payment::whereYear('created_at', '=', $year)
                ->whereMonth('created_at', '=', $month)
                ->count();

            $studentsCountPerMonth[] = $studentsNum;
            $paymentsCountPerMonth[] = $paymentsNum;
        }
        return response()->json(['students' => array_values($studentsCountPerMonth)
        , 'payments' => array_values($paymentsCountPerMonth)]);
    }
}
