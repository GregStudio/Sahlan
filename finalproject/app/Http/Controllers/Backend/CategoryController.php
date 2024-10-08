<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Repositories\CrudRepositories;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $category;
    public function __construct(Category $category)
    {
        $this->category = new CrudRepositories($category);
    }

    public function index()
    {
        $data['category'] = $this->category->get();
        return view('backend.category.index', compact('data'));
    }

    public function create()
    {
        return view('backend.category.create');
    }

    public function store(Request $request)
    {
        $this->category->store($request->all(), true, ['thumbnails'], 'category');
        return redirect()->route('admin.category.index')->with('success', __('message.store'));
    }

    public function delete($id)
    {
        $this->category->hardDelete($id, true, 'thumbnails');
        return redirect()->back()->with('success', __('message.delete'));
    }

    public function edit($id)
    {
        $data['category'] = $this->category->find($id);
        return view('backend.category.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        if (isset($request->thumbnails)) {
            $this->category->update($id, $request->all(), true, ['thumbnails'], 'category');
        } else {
            $this->category->update($id, $request->all());
        }
        return redirect()->route('admin.category.index')->with('success', __('message.update'));
    }

    public function show($id)
    {
        $data['category'] = $this->category->find($id);
        return view('backend.category.show', compact('data'));
    }
}
