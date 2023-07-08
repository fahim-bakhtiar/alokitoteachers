<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\Package;
use App\Models\Teacher;
use App\Models\Subscription;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class SubscriptionService{


    public function package($subscription_id){

        if($subscription_id == 0){

            return get_empty_package();

        }

        $subscription = Subscription::find($subscription_id);

        $package = Package::find($subscription->package_id);

        return $package;

    }


    public function get_remaining_consumables($teacher_id){

        $teacher = Teacher::find($teacher_id);

        $subscription = $teacher->current_subscription();
        
        if($subscription){

            return ['courses' => $subscription->remaining_courses, 'resources' => $subscription->remaining_resources, 'workshops' => $subscription->remaining_workshops];


        }

        return ['courses' => 0, 'resources' => 0, 'workshops' => 0];
       
    }

    public function create_subscription($teacher_id, $package_id, $remaining_consumables_array){
        
        $package = Package::find($package_id);

        $teacher = Teacher::find($teacher_id);

        if($teacher->current_package()->id != $package_id){

            $subscription = new Subscription();
            
            $subscription->renew_count = 0;


        }else{

            //if renew then no need to create new entry

            $subscription = $teacher->current_subscription();
            
            $subscription->renew_count = $subscription->renew_count + 1;

        } 
    
        $subscription->package_id = $package_id;

        $subscription->teacher_id = $teacher_id;

        $subscription->remaining_courses = $package->max_course + ($remaining_consumables_array['courses'] == -1 ? 0 : $remaining_consumables_array['courses']);
        
        $subscription->remaining_resources = $package->max_resource + ($remaining_consumables_array['resources'] == -1 ? 0 : $remaining_consumables_array['resources']);

        $subscription->remaining_workshops = $package->max_workshop + ($remaining_consumables_array['workshops'] == -1 ? 0 : $remaining_consumables_array['workshops']);

        $subscription->expires_at = Carbon::now()->addMonths($package->duration);
        
        $subscription->save();

        $teacher->sub_id = $subscription->id;

        $teacher->save();

        return $subscription;

    }

   

}