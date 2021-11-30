<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use Auth;
use Illuminate\Support\Facades\Input;

class ChangePasswordController extends Controller
{
    public function forgot(Request $request)
        {    
                date_default_timezone_set("Asia/Jakarta");

                if ($request->input('pw1') == $request->input('pw2')) {
                        DB::table('users')->where('email', Auth::user()->email)->update([
                                'password'          => bcrypt($request->input('pw1')),
                                'updated_at'        => date("Y-m-d H:i:s")
                                ]);
                        return back()->with('sukses', "Password Berhasil di Ganti");
                } else {
                        return back()->with('sukses', "Password & Password Konfirmasi Harus Sama");
                }
        }
}
