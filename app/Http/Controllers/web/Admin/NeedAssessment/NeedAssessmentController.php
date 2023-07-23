<?php

namespace App\Http\Controllers\web\Admin\NeedAssessment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\NeedAssessmentService;

class NeedAssessmentController extends Controller
{
    private $need_assessment_service;

    public function __construct(NeedAssessmentService $need_assessment_service)
    {
        $this->need_assessment_service = $need_assessment_service;
    }

    public function questionList()
    {
        $questions = $this->need_assessment_service->questionList();

        return view('admin.dashboard.need-assessment.question.index', compact('questions'));
    }

    public function createQuestion()
    {
        return view('admin.dashboard.need-assessment.question.create');
    }

    public function storeQuestion(Request $request)
    {
        $request->validate([
            'question' => 'required | string',
            'strongly_disagree' => 'required | numeric',
            'disagree' => 'required | numeric',
            'neutral' => 'required | numeric',
            'agree' => 'required | numeric',
            'strongly_agree' => 'required | numeric'
        ]);

        $this->need_assessment_service->storeQuestion($request);

        return redirect()->route('need-assessment.question.create')->with(['success' => 'Question Created Successfully !']);
    }


}
