<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Input;
use App\register;
use DB;
use Auth;
use App\User;
use App\Roles;
use App\Division;

class ManagementUserController extends Controller
{
    public function index()
    {
        // $users=User::all();
        $users= DB::table('users')
        ->join('roles', 'users.role_user', '=', 'roles.id')
        ->join('division', 'users.divisi_id', '=', 'division.id')
        ->select('users.*', 'roles.namarole', 'division.divisi')
        ->get();

        $role=Roles::all();
        $divisi=Division::all();

        return view('admin.user.users')->with([
            'users'     => $users,
            'role'      => $role,
            'divisi'    => $divisi,
        ]);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'role_user' => 'required',
            'divisi_id' => 'required',
            'name'      => 'required',
            'nik'       => 'required | unique:users' ,
    		'email'     => 'required | unique:users',
            'password'  => 'required',
           
    	]);

    	// $user = User::create([
    	// 	'role_user'   => request()->get('role_user'),
        //     'name'        => request()->get('name'),
    	// 	'nik'         => request()->get('nik'),
    	// 	'email'       => request()->get('email'),
        //     'password'    => bcrypt(request()->get('password')),
        //     'status'      => '1',
    	// ]);

        $user = New User;
        $user->role_user = $request->role_user;
        $user->divisi_id = $request->divisi_id;
        $user->name      = $request->name;
        $user->nik       = $request->nik;
        $user->email     = $request->email;
        $user->password  = bcrypt($request->password);
        $user->status    = '0';
        // dd($user);
    	$user->save();
    	return redirect()->route('admin.users')->with('sukses','Data Berhasil diinput');
    }

    public function edit($id)
    {
        $user= User::where('id',$id)->first();
        $role =Roles::all();

        return view('admin.user.edit_user')->with([
            'user'   => $user,
            'role'  => $role, 
        ]);
    }

    public function update($id, Request $request)
    {
        
        $user = User::find($id);
        $user->nik      = $request->nik;
        $user->name     = $request->name;
        $user->email    = $request->email;
        // $user->role_user= $request->role_user;
        $user->update();
        // dd($user);
        return redirect()->route('admin.users')->with('update', 'Data Berhasil Diedit...!');
    }

    public function delete($id)
    {
        // User::where('id', $id)->delete();
        $user= User::find($id);
        $user->status = 0;
        $user->save();
        return redirect('admin/users/detail/all')->with('sukses', 'Data Berhasil Dihapus...!');
    }

    public function detail ()
    {
        $detail= DB::table('users')
        ->join('roles', 'users.role_user', '=', 'roles.id')
        ->select('users.*', 'roles.namarole')
        ->get();

        return view('admin.user.detail_users', compact('detail', $detail));
    }


}
