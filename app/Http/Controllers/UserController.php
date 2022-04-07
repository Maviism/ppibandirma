<?php

namespace App\Http\Controllers;

use App\Imports\UserImport;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{

    public function index()
    {
        return view('admin/member/index', [
            'users' => User::all()
        ]);
    }

    public function create()
    {
        return view('admin/member/createMember');
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function changeRole(Request $request, User $user)
    {
        
        $user->role = $request->role;
        $user->save();
        return redirect()->route('member.index');
    }

    public function import_excel(Request $request){
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        $file = $request->file('file');

        $name_file = rand().$file->getClientOriginalName();

        $file->move('file_siswa', $name_file);

        Excel::import(new UserImport, public_path('/file_siswa/'.$name_file));

        Session::flash('sukses', 'Data berhasil diimport');

        return redirect('/admin/member');
    }

    public function activate(User $user){
        $user->sendEmailVerificationNotification();
        
        return back()->with('status', 'verification-link-sent');
    }
}
