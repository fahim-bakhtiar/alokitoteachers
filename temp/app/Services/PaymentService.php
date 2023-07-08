<?php


namespace App\Services;

use App\Models\Payment;

class PaymentService{

    public function create($amount, $teacherID, $model){

        $payment = new Payment();

        $payment->amount = $amount;

        $payment->teacher_id = $teacherID;

        $model->payments()->save($payment);

        return $payment;

    }

}