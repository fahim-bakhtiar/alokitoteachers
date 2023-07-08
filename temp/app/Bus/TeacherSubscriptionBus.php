<?php

namespace App\Bus;

use Carbon\Carbon;
use App\Services\PackageService;
use App\Services\PaymentService;
use App\Services\TeacherService;
use App\Services\SubscriptionService;



class TeacherSubscriptionBus{


    protected $teacher_service;
    protected $package_service;
    protected $payment_service;
    protected $subscription_service;

    public function __construct(PaymentService $payment_service, TeacherService $teacher_service, SubscriptionService $subscription_service, PackageService $package_service){

        $this->subscription_service = $subscription_service;
        $this->teacher_service = $teacher_service;
        $this->payment_service = $payment_service;
        $this->package_service = $package_service;

    }


    

    public function purchase_subscription_for_teacher($teacherID, $packageID){
        
        $package = $this->package_service->find($packageID);
        
        $teacher = $this->teacher_service->find($teacherID);

        $subscription = $this->subscription_service->create_subscription(

            $teacherID, 

            $packageID, 

            $this->subscription_service->get_remaining_consumables($teacherID)

        );

        if($subscription){

            $payment = $this->payment_service->create($package->price, $teacherID, $subscription);

        }

        return [
            'status' => true,
            'teacher' => $teacher,
            'package' => $package,
            'subscription' => $subscription,
        ];

    }

    


}