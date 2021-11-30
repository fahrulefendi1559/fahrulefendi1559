<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Roles;
use App\Department;
use DB;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $department = Department::all();
        // $roles = Roles::all();
        $roles = DB::table('department')
            ->join('roles', 'roles.department_id', '=', 'department.id')
            ->get();

        return view('admin.roles.roles')->with([
            'roles' => $roles,
            'department' => $department
        
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
            'namarole' => 'required',
            'department_id' =>'required',
    
            ]);
    
            $roles = New Roles;
            $roles->namarole = $request->namarole;
            $roles->department_id = $request->department_id;
            $roles->save();
            // dd($roles); //didum data sebelum masuk database
            return redirect()->route('admin.roles')->with('sukses', 'Data Berhasil Ditambah');
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
        $roles= Roles::find($id);

        return view('admin.roles.edit_roles', compact('roles',$roles) );
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
            'namarole' => 'required',
        ]);

        $update=Roles::find($id);
        $update->namarole = $request->namarole;
        $update->save();
        // dd($update); untuk daidum data sebelum di simpan ke database 
        return redirect()->route('admin.roles')->with('update', 'Data Berhasil Terupdate...!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Roles::where('id', $id)->delete();
        return redirect()->route('admin.roles')->with('delete', 'Data Berhasil DiHapus');
    }
}
