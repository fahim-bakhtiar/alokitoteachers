@extends('admin.layouts.base')

@section('content')

<div class="container-fluid">

    <div class="row">

        <div class="col-12">

            <h1>Lesson Plan</h1>
            <hr>

            <a class="btn btn-app bg-primary" href="{{route('resource-management.lessonplan.create')}}">
                <!-- <span class="badge bg-success">300</span> -->
                <i class="fas fa-plus-circle"></i> Create
            </a>

            <a class="btn btn-app bg-primary" href="{{route('resource-management.lessonplan.list')}}">
                <!-- <span class="badge bg-success">300</span> -->
                <i class="fas fa-th-list"></i> List
            </a>

        </div>

    </div>

</div>

@endsection