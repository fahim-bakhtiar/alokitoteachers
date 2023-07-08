@extends('admin.layouts.parent')



@section('content')

    <div class="row">

        <div class="col-12">

            <div class="page-title-box d-sm-flex align-items-center justify-content-between">

                <h4 class="mb-sm-0">Question List</h4>

                <div class="page-title-right">

                    <ol class="breadcrumb m-0">

                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>

                        <li class="breadcrumb-item"><a href="{{route('course-management.course.list')}}">Course List</a></li>

                        <li class="breadcrumb-item"><a href="{{route('course-management.course.edit', $quiz->course->id)}}">Edit Course</a></li>

                        <li class="breadcrumb-item"><a href="{{route('course-management.course.sequence', $quiz->course->id)}}">Content Sequence</a></li>

                        <li class="breadcrumb-item"><a href="{{route('course-management.course.quiz.edit', $quiz->id)}}">Edit Quiz</a></li>

                        <li class="breadcrumb-item active">Question List</li>

                    </ol>

                </div>

            </div>
        </div>

    </div> 

    <div class="row">

        <div class="col-12">

        <div class="card">

            <div class="card-header text-right bg-gray-dark color-palette">

                <div class="row">

                    <div class="col">

                        <span class="text-left pl-3 fs-20">Course: {{$quiz->course->title}}</span>
                        <span><i class="bx bx-caret-right"></i></span>
                        <span class="text-left pl-3 fs-20">Quiz: {{$quiz->title}}</span>

                    </div>

                    <div class="col" style="text-align: end;">

                        <a href="{{route('course-management.course.question.create', $quiz->id)}}" class="btn btn-success btn-label"><i class="bx bx-plus-circle label-icon align-middle fs-16 me-2"></i> Add Question</a>

                    </div>

                </div>

            </div>

            
            <div class="card-body">

                <table id="example1" class="table table-sm table-bordered table-striped">

                    <thead>

                        <tr>
                            <th>SL/Sequence</th>

                            <th>Question</th>

                            <th>Option 01</th>

                            <th>Option 02</th>

                            <th>Option 03</th>

                            <th>Option 04</th>

                            <th>Actions</th>

                        </tr>

                    </thead>

                    <tbody>
                        @foreach($quiz->questions as $question)
                        <tr style="vertical-align:middle">

                            <td>
                                {{$question->sequence}}
                            </td>

                            <td>{{$question->question}}</td>

                            <td @if($question->answer == 1) class="bg-success color-palette" @endif >{{$question->option_1}}</td>

                            <td @if($question->answer == 2) class="bg-success color-palette" @endif>{{$question->option_2}}</td>

                            <td @if($question->answer == 3) class="bg-success color-palette" @endif>{{$question->option_3}}</td>

                            <td @if($question->answer == 4) class="bg-success color-palette" style="color:#fff" @endif>{{$question->option_4}}</td>

                            <td>
                                <a href="{{route('course-management.course.question.edit', $question->id)}}" class="btn btn-primary d-grid"><i class="far fa-edit"></i> Edit</a>
                            </td>

                        </tr>
                        @endforeach

                    
                    </tbody>

                </table>
                
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

        </div>

    </div>


@endsection



