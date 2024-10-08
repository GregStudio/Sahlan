<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Repositories\CrudRepositories;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $product, $category;
    public function __construct(Product $product, Category $category)
    {
        $this->product = new CrudRepositories($product);
        $this->category = new CrudRepositories($category);
    }

    public function index()
    {
        $data['product'] = $this->product->get();
        return view('backend.product.index', compact('data'));
    }

    public function create()
    {
        $data['category'] = $this->category->get();
        return view('backend.product.create', compact('data'));
    }

    public function store(Request $request)
    {
        $data = $request->except('_token');
        $thumbnails = ['thumbnails', 'thumbnails2', 'thumbnails3', 'thumbnails4', 'thumbnails5'];
        $thisThumbnails = [];
        foreach ($thumbnails as $key => $value) {
            if (isset($data[$value])) {
                array_push($thisThumbnails, $value);
            }
        }
        $this->product->store($data, true, $thisThumbnails, 'product/thumbnails');
        return redirect()->route('admin.product.index')->with('success', __('message.store'));
    }

    public function show($id)
    {
        $data['product'] = $this->product->find($id);
        return view('backend.product.show', compact('data'));
    }

    public function edit($id)
    {
        $data['product'] = $this->product->find($id);
        $data['category'] = $this->category->get();
        return view('backend.product.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        if (isset($request->thumbnails)) {
            $this->product->update($id, $request->all('_token'), true, ['thumbnails', 'thumbnails2', 'thumbnails3', 'thumbnails4', 'thumbnails5'], 'product/thumbnails');
        } else {
            $this->product->update($id, $request->except('_token'));
        }
        return redirect()->route('admin.product.index')->with('success', __('message.store'));
    }

    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();
        return back()->with('success', __('message.harddelete'));
    }

    public function deleted()
    {
        $data['product'] = Product::onlyTrashed()->get();
        return view('backend.product.deleted', compact('data'));
    }

    public function restore($id)
    {
        $product = Product::onlyTrashed()->where('id', $id);
        $product->restore();
        return redirect()->route('admin.product.deleted')->with('success', __('message.store'));
    }
}
