<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Permintaan;
use PDF;
use DB;

class RecordController extends Controller
{
    public function index()
    {
        $permintaan=Permintaan::all();
        // $permintaan = DB::table('request')
        //     ->join('roles', 'request.user_create', '=', 'roles.id')
        //     ->join('category', 'request.category_id', '=','category.id')
        //     ->select('request.*', 'roles.namarole', 'category.category')
        //     ->get();

        return view('admin.permintaan.record', compact('permintaan', $permintaan));
    }

    public function detail($id)
    {
        $req= Permintaan::find($id);
        // $req = DB::table('request')->where('id',$id)->get();

        return View('admin.permintaan.detail_record', compact('req', $req));
    }

    // approve manager terkait
    public function men_approve($id)
    {
        $approve=Permintaan::where('id',$id)->update([
            'approval' => '1'
        ]);

        
        return redirect()->route('admin.fpb_record')->with('update', 'Data Berhasil Dilakukan Approve');
    }

    // approve manager kantor
    public function approve($id)
    {
        $approve=Permintaan::where('id',$id)->update([
            'approval' => '2'
        ]);
        return redirect()->route('admin.fpb_record')->with('update', 'Data Berhasil Dilakukan Approve');
    }

    // decline manager terkait
    public function men_decline($id)
    {
        $decline=Permintaan::find($id);

        return view('admin.permintaan.decline_menter',compact('decline',$decline));
    }

    // decline manager kantor
    public function decline($id)
    {
        $decline=Permintaan::find($id);

        return view('admin.permintaan.decline_menkan',compact('decline',$decline));
    }

    public function post_declinementer(Request $request,$id)
    {
        $this->validate($request, [
            'note_declinementer'  => 'required',
            
        ]);

        $decline=Permintaan::find($id);
        $decline->approval = '3';
        $decline->note_declinementer = $request->note_declinementer;
        // dd( $decline);
        $decline->update();
        return redirect()->route('admin.fpb_record')->with('update', 'Pesanan Telah Ditolak');


    }
 

    public function post_declinemenkan(Request $request,$id)
    {
        $this->validate($request, [
            'note_declinemenkan'  => 'required',
            
        ]);

        $decline=Permintaan::find($id);
        $decline->approval = '3';
        $decline->note_declinemenkan = $request->note_declinemenkan;
        // dd( $decline);
        $decline->update();
        return redirect()->route('admin.fpb_record')->with('update', 'Pesanan Telah Ditolak');


    }

    public function fpb()
    {
        // $nama_barang  =DB::table('request')->where('id', $id)->value('product_name');
        // $spec         =DB::table('request')->where('id', $id)->value('spec');
        // $qty          =DB::table('request')->where('id', $id)->value('qty');
        // $satuan       =DB::table('request')->where('id', $id)->value('unit');
        // $info         =DB::table('request')->where('id', $id)->value('info');
        // $date         =DB::table('request')->where('id', $id)->value('date');

        // $fpb= Permintaan::find('id',$id);

        // $pdf = PDF::loadView('admin.permintaan.fpb_pdf', compact('nama_barang', 'spec', 'qty', 'satuan', 'info','date', 'fpb'));
        // $pdf->setPaper('A4', 'potrait');
        // return $pdf->stream('FPB_'.date('Y-m-d_H-i-s').'.pdf');

        $Permintaan = Permintaan::all();
 
    	$pdf = PDF::loadview('admin.permintaan.fpb_pdf',['Permintaan'=>$Permintaan]);
    	return $pdf->stream('laporan-permintaan.pdf');
    }


}
