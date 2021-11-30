<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Permintaan;

class ApproveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $count=Permintaan::where('approval','0')->count();
        $permintaan=Permintaan::where('approval', '0' )->orderBy('id','desc')->get();
        $permin_approve=Permintaan::where('approval', '2')->orderBy('id','desc')->get();
        return view('admin.permintaan.approve',
        compact(
            'permintaan',$permintaan,
            'count',$count,
            'permin_approve', $permin_approve
        ));
    }

    // approve $ decline meneger terkait
    public function approve_menter($id)
    {
        $approve=Permintaan::where('id',$id)->update([
            'approval' => '1'
        ]);
        return redirect()->route('admin.menu.approve')->with('update', 'Data Berhasil Dilakukan Approve');
    }

    // decline menter
    public function decline_menter($id)
    {
        $decline=Permintaan::find($id);

        return view('admin.decline.decline',compact('decline',$decline));
    }
    // end approve and decline menter
    // ==================================================
    
    // approve menkar
    public function approve_menkan($id)
    {
        $approve=Permintaan::where('id',$id)->update([
            'approval' => '2'
        ]);
        return redirect()->route('admin.menu.approve')->with('update', 'Data Berhasil Dilakukan Approve');
    }

    // decline menkan
    public function decline_menkan($id)
    {
        $decline=Permintaan::find($id);

        return view('admin.decline.decline',compact('decline',$decline));
    }

    public function decline_menter_post(Request $request, $id)
    {
        $this->validate($request, [
            'note_decline'  => 'required',
            
        ]);

        $decline=Permintaan::find($id);
        $decline->approval = '3';
        $decline->note_declinementer = $request->note_declinementer;
        // dd( $decline);
        $decline->update();
        return redirect()->route('admin.menu.approve')->with('update', 'Pesanan Telah Ditolak');

    }

    
    public function decline_menkan_post(Request $request, $id)
    {
        $this->validate($request, [
            'note_decline'  => 'required',
            
        ]);

        $decline=Permintaan::find($id);
        $decline->approval = '3';
        $decline->note_declinemenkan = $request->note_declinemenkan;
        // dd( $decline);
        $decline->update();
        return redirect()->route('admin.menu.approve')->with('update', 'Pesanan Telah Ditolak');

    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
