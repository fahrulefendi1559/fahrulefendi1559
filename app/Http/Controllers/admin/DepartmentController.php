<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Department;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $department= Department::all();
        return view('admin.department.department')->with('department',$department);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->validate($request, [
            'department' => 'required',
    
            ]);
    
            $department = New Department;
            $department->department = $request->department;
            $department->save();
            // dd($category); didum data sebelum masuk database
            return redirect()->route('admin.department')->with('sukses', 'Data Berhasil Ditambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $department= Department::find($id);
        // dd($department);
        return view('admin.department.department_edit', compact('department',$department) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'department' => 'required',
        ]);

        $update=Department::find($id);
        $update->department = $request->department;
        $update->save();
        // dd($update); untuk daidum data sebelum di simpan ke database 
        return redirect()->route('admin.department')->with('update', 'Data Berhasil Terupdate...!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Department::where('id', $id)->delete();
        return redirect()->route('admin.department')->with('delete', 'Data Berhasil DiHapus');
    }
}
