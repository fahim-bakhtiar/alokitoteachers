<?php

namespace App\Http\Controllers\web\Admin\ResourceManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\WorksheetService;
use App\Services\CategoryService;

class WorksheetController extends Controller
{
    private $worksheet_service;

    private $category_service;

    public function __construct(WorksheetService $worksheet_service, CategoryService $category_service)
    {
        $this->worksheet_service = $worksheet_service;

        $this->category_service = $category_service;
    }

    public function index()
    {
        set_page_name('worksheet-index');

        return view('admin.dashboard.resource-management.worksheet.index');
    }

    public function list()
    {

        $worksheets = $this->worksheet_service->index();

        return view('admin.dashboard.resource-management.worksheet.list', compact('worksheets'));
    }

    public function create()
    {
        set_page_name('worksheet.create');

        $subjects = $this->category_service->subjects();

        $grades = $this->category_service->grades();

        return view('admin.dashboard.resource-management.worksheet.create', compact('subjects', 'grades'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required | string',
            'class' => 'required | numeric',
            'subject' => 'required | numeric',
            'worksheet_file' => 'required | file | max:8192 | mimes:pdf',
            'price' => 'required | numeric',
            'sale_price' => 'nullable | numeric'
        ]);

        $this->worksheet_service->store($request);

        return redirect()->back()->with(['success' => 'Worksheet Created Successfully !']);
    }

    public function edit($worksheet_id)
    {
        set_page_name('worksheet.index');

        $worksheet = $this->worksheet_service->find($worksheet_id);

        $subjects = $this->category_service->subjects();

        $grades = $this->category_service->grades();

        return view('admin.dashboard.resource-management.worksheet.edit', compact('worksheet', 'subjects', 'grades'));
    }

    public function update(Request $request, $worksheet_id)
    {
        $request->validate([
            'title' => 'required | string',
            'class' => 'required | numeric',
            'subject' => 'required | numeric',
            'worksheet_file' => 'file | max:8192 | mimes:pdf',
            'price' => 'required | numeric',
            'sale_price' => 'nullable | numeric'
        ]);

        $this->worksheet_service->update($request, $worksheet_id);

        return redirect()->route('resource-management.worksheet.index')->with(['success' => 'Worksheet Updated Successfully !']);
    }

    public function changeStatus($worksheet_id)
    {
        $this->worksheet_service->changeStatus($worksheet_id);

        return redirect()->back()->with(['success' => 'Status Updated Successfully !']);
    }


}
