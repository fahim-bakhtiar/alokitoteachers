<?php

namespace App\Services;

use App\Models\Course;
use App\Models\Workshop;
use App\Models\NeedAssessmentQuestion;
use App\Models\NeedAssessmentRange;
use App\Models\NeedAssessmentResponse;
use DB;

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

    public function courseDropdown()
    {
        return Course::select('id', 'title')->get();
    }

    public function workshopDropdown()
    {
        return Workshop::select('id', 'name')->get();
    }

    public function storeRange($request)
    {
        $need_assessment_range = new NeedAssessmentRange();

        $need_assessment_range->min = $request->min;
        $need_assessment_range->max = $request->max;
        $need_assessment_range->course_ids = json_encode($request->course_ids);
        $need_assessment_range->workshop_ids = json_encode($request->workshop_ids);

        $need_assessment_range->save();
    }

    public function rangeList()
    {
        $ranges = NeedAssessmentRange::all();

        foreach($ranges as $range)
        {
            $courses = [];

            $workshops = [];
            
            foreach(json_decode($range->course_ids) as $course_id)
            {
                $courses[] = '<span class="badge bg-primary">' . Course::find($course_id)->title . '</span>';
            }

            foreach(json_decode($range->workshop_ids) as $workshop_id)
            {
                $workshops[] = '<span class="badge bg-success">' . Workshop::find($workshop_id)->name . '</span>';
            }

            $range->courses = implode(" ", $courses);

            $range->workshops = implode(" ", $workshops);
        }

        return $ranges;
    }

    public function responseList()
    {
        $responses = NeedAssessmentResponse::join('teachers as t', 't.id', '=', 'need_assessment_responses.teacher_id')
        ->select(

            'need_assessment_responses.id',
            't.first_name as name',
            DB::raw('SUM(points) as total_points')
        )
        ->groupBy('need_assessment_responses.teacher_id')
        ->orderBy('need_assessment_responses.created_at', 'desc')
        ->get();

        return $responses;
    }

    
}