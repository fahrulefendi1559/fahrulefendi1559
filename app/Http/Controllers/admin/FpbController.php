<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Permintaan;
use App\Roles;
use Auth;
use DB;
use App\Category;

class FpbController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cat= Category::all();
        
        // $data = DB::table('barang')
        //     ->join('detail_barang', 'detail_barang.id_barang', '=', 'barang.id_barang')
        //     ->get();

        // $permintaan = DB::table('request')
        //     ->join('roles', 'request.user_create', '=', 'roles.id')
        //     ->join('category', 'request.category_id', '=','category.id')
        //     ->select('request.*', 'roles.namarole', 'category.category')
        //     ->get();

        $permintaan = Permintaan::all();
        
        return view('admin.permintaan.fpb', compact('cat',$cat,'permintaan',$permintaan));
            
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->validate($request, [
            'product_name'  => 'required',
            'spec'          => 'required',
            'qty'           => 'required',
    		'unit'          => 'required',
            'desc'          => 'required',
            'use_date'      => 'required',
            'category_id'   => 'required',
            
        ]);

        $permintaan = New Permintaan;
        $permintaan->category_id  = $request->category_id;
        $permintaan->product_name = $request->product_name;
        $permintaan->spec         = $request->spec;
        $permintaan->qty          = $request->qty;
        $permintaan->unit         = $request->unit;
        $permintaan->desc         = $request->desc;
        $permintaan->status       = '0';
        $permintaan->user_create  = Auth::user()->id;
        $permintaan->use_date     = $request->use_date;
        
        $permintaan->save();
        
        return redirect()->route('admin.fpb_index')->with('sukses','Data Berhasil Diinput...!');
        // dd($permintaan);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //  controlle untuk melihat detail Pesanan
    public function show($id)   
    {
        $req= Permintaan::find($id);
        // $req = DB::table('request')->where('id',$id)->get();

        Return View('admin.permintaan.show_fpb', compact('req', $req));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permintaan=Permintaan::find($id);

        return view('admin.permintaan.edit_fpb', compact('permintaan', $permintaan));
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
       
        $permintaan=Permintaan::find($id);
        $permintaan->product_name = $request->product_name;
        $permintaan->spec         = $request->spec;
        $permintaan->qty          = $request->qty;
        $permintaan->unit         = $request->unit;
        $permintaan->desc         = $request->desc;
        $permintaan->use_date     = $request->use_date;
        $permintaan->save();
        // dd($permintaan);
        return redirect()->route('admin.fpb_index')->with('update', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $delete=Permintaan::where('id',$id);
        $delete->delete();

        return redirect()->route('admin.fpb_index')->with('delete', 'Data Berhasil DiHapus');
    }

}
