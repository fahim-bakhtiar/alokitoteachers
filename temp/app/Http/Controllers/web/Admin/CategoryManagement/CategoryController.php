<?php

namespace App\Http\Controllers\web\Admin\CategoryManagement;

use Illuminate\Http\Request;
use App\Services\CategoryService;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    

    protected $category_service;

    public function __construct(CategoryService $category_service){

        $this->category_service = $category_service;

    }

    public function create(){

        set_page_name('category-mgt-create');

        return view('admin.dashboard.category-management.create');

    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required',
            'type' => 'required',
        ]);
        
        $category = $this->category_service->create($request);

        return redirect()->back()->with('success', 'New category is created successfully!');
    }

    public function list(){

        set_page_name('category-mgt-list');

        $categories = $this->category_service->categories();

        foreach($categories as $category){

            $category->edit_link = route('category-management.edit', $category->id);
            

        }
        
        return view('admin.dashboard.category-management.list', compact('categories'));

    }

    public function edit($id){

        $category = $this->category_service->find($id);

        return view('admin.dashboard.category-management.edit_category', compact('category'));

    }

    public function update(Request $request, $id){

        $request->validate([
            'name' => 'required',
            'type' => 'required',
        ]);
        
        $category = $this->category_service->update($id, $request);

        return redirect()->back()->with('success', 'The category is updated successfully!');

    }
}
