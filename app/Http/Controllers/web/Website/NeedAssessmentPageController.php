<?php

namespace App\Http\Controllers\web\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\NeedAssessmentService;

class NeedAssessmentPageController extends Controller
{
    private $need_assessment_service;

    public function __construct(NeedAssessmentService $need_assessment_service)
    {
        $this->need_assessment_service = $need_assessment_service;
    }

    public function needAssessmentView()
    {
        $questions = $this->need_assessment_service->getQuestions();

        return view('website.need-assessment.need-assessment-form', compact('questions'));
    }

    public function needAssessmentStore(Request $request)
    {
        $result = $this->need_assessment_service->needAssessmentStore($request);

        $courses = $result['courses'];

        $workshops = $result['workshops'];

        return view('website.need-assessment.need-assessment-recommendations', compact('courses', 'workshops'));
    }


}
