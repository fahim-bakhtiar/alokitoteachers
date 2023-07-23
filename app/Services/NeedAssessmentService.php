<?php

namespace App\Services;

use App\Models\NeedAssessmentQuestion;

class NeedAssessmentService
{
    public function storeQuestion($request)
    {
        $need_assessment_question = new NeedAssessmentQuestion();

        $need_assessment_question->question = $request->question;
        $need_assessment_question->strongly_disagree = $request->strongly_disagree;
        $need_assessment_question->disagree = $request->disagree;
        $need_assessment_question->neutral = $request->neutral;
        $need_assessment_question->agree = $request->agree;
        $need_assessment_question->strongly_agree = $request->strongly_agree;

        $need_assessment_question->save();
    }

    public function questionList()
    {
        $questions = NeedAssessmentQuestion::all();

        return $questions;
    }

    
}