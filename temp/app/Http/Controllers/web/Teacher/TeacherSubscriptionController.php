<?php

namespace App\Http\Controllers\web\Teacher;

use Illuminate\Http\Request;
use App\Bus\TeacherSubscriptionBus;
use App\Http\Controllers\Controller;

class TeacherSubscriptionController extends Controller
{

    protected $teacher_subscription_bus;

    public function __construct(TeacherSubscriptionBus $teacher_subscription_bus){

        $this->teacher_subscription_bus = $teacher_subscription_bus;

    }

    public function subscribe(Request $request){

        $teacher = get_current_teacher();
        
        $result = $this->teacher_subscription_bus->purchase_subscription_for_teacher($teacher->id, $request->package_id);

        if($result['status'] == true){

            return 'You have succesfully purchased ' . $result['package']->title . ' Package' . '\\n Your subscription will expire at ' . date('D, M, Y', strtotime($result['subscription']->expires_at));

        }

    }
}
