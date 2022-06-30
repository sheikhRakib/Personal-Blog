<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    public function index()
    {
        $data['categories'] = Category::latest('id')->paginate(10);

        return view('dashboard.category.index', $data);
    }

    public function create()
    {
        return view('dashboard.category.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:categories,name',
        ]);

        $category = new Category();
        $category['name'] = $request->name;
        $category['description'] = $request->description;
        $category->save();

        Session::flash('success', 'Category successfully created.');

        return redirect()->back();
    }

        public function show(Category $category)
        {
            return view('dashboard.category.show', compact('category'));
        }

        public function edit(Category $category)
        {
            return view('dashboard.category.edit', compact('category'));
        }

        public function update(Request $request, Category $category)
        {
            $this->validate($request, [
                'name' => "required|unique:categories,name,$category->id",
            ]);

            $category->name = $request->name;
            $category->description = $request->description;
            $category->save();

            Session::flash('success', 'Category updated successfully');
            return redirect()->route('dashboard.category.edit', $category->slug);
        }

        public function destroy(Category $category)
        {
            $category->delete();

            Session::flash('success', 'Category deleted');
            return redirect()->route('dashboard.category.index');
        }
}
