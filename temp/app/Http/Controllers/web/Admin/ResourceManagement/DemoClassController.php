<?php

namespace App\Http\Controllers\web\Admin\ResourceManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\DemoClassService;
use App\Services\CategoryService;

class DemoClassController extends Controller
{
    private $demo_class_service;

    private $category_service;

    public function __construct(DemoClassService $demo_class_service, CategoryService $category_service)
    {
        $this->demo_class_service = $demo_class_service;

        $this->category_service = $category_service;
    }

    public function index()
    {
        set_page_name('demo-class-index');

        return view('admin.dashboard.resource-management.demo-class.index');
    }

    public function list()
    {
        set_page_name('demo-class.index');

        $demo_classes = $this->demo_class_service->index();

        return view('admin.dashboard.resource-management.demo-class.list', compact('demo_classes'));
    }

    public function create()
    {
        set_page_name('demo-class.create');

        $subjects = $this->category_service->subjects();

        $grades = $this->category_service->grades();

        return view('admin.dashboard.resource-management.demo-class.create', compact('subjects', 'grades'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required | string',
            'class' => 'required | numeric',
            'subject' => 'required | numeric',
            'video_url' => 'required | string',
            'duration' => 'required | numeric',
            'price' => 'required | numeric',
            'sale_price' => 'nullable | numeric'
        ]);

        $this->demo_class_service->store($request);

        return redirect()->back()->with(['success' => 'Demo Class Created Successfully !']);
    }

    public function edit($demo_class_id)
    {
        set_page_name('demo-class.index');

        $demo_class = $this->demo_class_service->find($demo_class_id);

        $subjects = $this->category_service->subjects();

        $grades = $this->category_service->grades();

        return view('admin.dashboard.resource-management.demo-class.edit', compact('demo_class', 'subjects', 'grades'));
    }

    public function update(Request $request, $demo_class_id)
    {
        $request->validate([
            'title' => 'required | string',
            'class' => 'required | numeric',
            'subject' => 'required | numeric',
            'video_url' => 'required | string',
            'duration' => 'required | numeric',
            'price' => 'required | numeric',
            'sale_price' => 'nullable | numeric'
        ]);

        $this->demo_class_service->update($request, $demo_class_id);

        return redirect()->route('resource-management.demo-class.index')->with(['success' => 'Demo Class Updated Successfully !']);
    }

    public function changeStatus($demo_class_id)
    {
        $this->demo_class_service->changeStatus($demo_class_id);

        return redirect()->back()->with(['success' => 'Status Updated Successfully !']);
    }


}
