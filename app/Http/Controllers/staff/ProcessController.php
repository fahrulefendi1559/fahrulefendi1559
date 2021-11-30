<?php

namespace App\Http\Controllers\staff;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Permintaan;
use App\Category;
use App\Proses;
use DB;

class ProcessController extends Controller
{
    public function index()
    {
        $permintaan= Permintaan::where([
            ['approval','2'],
            ['status','0']
        ])->orderBy('id','desc')->get();

        return view('staff.process')->with([
            'permintaan' => $permintaan,
        ]);
    }

    public function process($id)
    {
        // $process= DB::table('process_request')
        //  ->join('request', 'process_request.request_id', '=', 'request.id')
        //  ->join('category', 'process_request.category_id', '=', 'category.id')
        //  ->select('process_request.*', 'request.product_name','request.spec','request.qty','request.unit','request.info','category.category')
        //  ->get(); 

        $proses=Permintaan::where('id',$id)->first();
        $category=Category::all();

         return view('staff.process_request',compact('id','proses','category'));
    }

    public function post_process(Request $request)
    {   
        DB::table('request')->where('id', $request->input('request_id'))->update([
            'status'        => '1'
        ]);

        $post_proses= New Proses;
        $post_proses->request_id = $request->request_id;
        $post_proses->category_id= $request->category_id;
        $post_proses->catatan    = $request->catatan;
        $post_proses->save();
        // dd($post_proses);
        return redirect()->route('staff.process')->with('update', 'Permintaan Berhasil Diproses');
    }
}
