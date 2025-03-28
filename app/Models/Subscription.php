<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $table ='subscription';

    /**
     * @param Student $student
     * @param float $price
     * @param int $course_id
     * @return bool
     */
    public static function handel_subscription(Student $student, float $price, int $course_id): bool
    {
        if($student->balance >= $price && $course_id != null) {
            $subscription = new Subscription();
            $subscription->course_id = $course_id;
            $subscription->student_id = $student->id;
            $subscription->date = now();
            $subscription->end_date = now()->addYear();

            $student->balance -= $price;
            $student->save();


            if ($subscription->save()) {
                return true;
            }
        }

        return false;
    }

}
