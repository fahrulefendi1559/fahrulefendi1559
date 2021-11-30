<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Division;
use App\Department;
use DB;

class DivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $division = Division::all();
        $division = DB::table('department')
            ->join('division', 'division.department_id', '=', 'department.id')
            ->get();
        $department = Department::all();

        return view('admin.division.division')->with([
            'division'  => $division,
            'department'=> $department,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->validate($request, [
            'divisi'        => 'required',
            'department_id' => 'required',

        ]);

        $division = new Division;
        $division->divisi           = $request->divisi;
        $division->department_id    = $request->department_id;
        // dd($division);
        $division->save();

        return redirect()->route('admin.division')->with('sukses', 'Data Berhasil Ditambah');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $division= Division::find($id);
        // $division = DB::table('department')
        //     ->join('division', 'division.department_id', '=', 'department.id')
        //     ->get();

        return view('admin.division.edit_divisi', compact('division',$division) );
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
        $this->validate($request, [
            'divisi'        => 'required',
        ]);

        $update=Division::find($id);
        $update->divisi = $request->divisi;
        $update->save();
        // dd($update); untuk daidum data sebelum di simpan ke database 
        return redirect()->route('admin.division')->with('update', 'Data Berhasil Terupdate...!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
