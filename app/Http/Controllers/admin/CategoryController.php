<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $category= Category::all();
        return view('admin.category.category')->with('category',$category);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
        'category' => 'required',

        ]);

        $category = New Category;
        $category->category = $request->category;
        $category->save();
        // dd($category); didum data sebelum masuk database
        return redirect()->route('admin.category')->with('sukses', 'Data Berhasil Ditambah');
    }

    public function edit($id)
    {
        $category= Category::find($id);

        return view('admin.category.category_edit', compact('category',$category) );
    }

    public function update($id, Request $request)
    {
        $this->validate($request,[
            'category' => 'required',
        ]);

        $update=Category::find($id);
        $update->category = $request->category;
        $update->save();
        // dd($update); untuk daidum data sebelum di simpan ke database 
        return redirect()->route('admin.category')->with('update', 'Data Berhasil Terupdate...!');

    }

    public function delete($id)
    {
        Category::where('id', $id)->delete();
        return redirect()->route('admin.category')->with('delete', 'Data Berhasil DiHapus');
    }

}
