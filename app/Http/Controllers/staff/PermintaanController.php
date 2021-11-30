<?php

namespace App\Http\Controllers\staff;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Permintaan;
use App\Category;
use DB;

class PermintaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permintaan=Permintaan::all();
        $cat=Category::all();
        return view('staff.permintaan.permintaan',compact(
            'permintaan',$permintaan,
            'cat',$cat    
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->validate($equest,[
            'product_name'       => 'required',
            'spec'               => 'required',
            'qty'                => 'required',
            'unit'               => 'required',
            'desc'               => 'required',
            'status'             => 'required', 
            'user_id'            => 'required',
            'category_id'        => 'required',
            'use_date'        => 'required',
        ]);

        $create= new Permintaan();
        $create->product_name = $request->product_name;
        $create->product_name = $request->product_name;
        $create->product_name = $request->product_name;
        $create->product_name = $request->product_name;
        $create->product_name = $request->product_name;
        $create->product_name = $request->product_name;
        $create->product_name = $request->product_name;
        $create->product_name = $request->product_name;
        $create->product_name = $request->product_name;
        $create->product_name = $request->product_name;


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
        $req= Permintaan::find($id);

        return View('staff.permintaan.show_permintaan', compact('req', $req));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
