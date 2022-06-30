<?php

namespace App\Http\Controllers;

use App\Imports\UserImport;
use App\Exports\UserExport;

use App\Mail\UserActivate;

use App\Models\Identity;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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
        $date = date("Y-m-d H:i:s");
        
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:rfc,dns|unique:users',
            'phoneNumber' => 'nullable',
            'birthDay' => 'required',
            'married' => 'nullable',
            'gender' => 'nullable',
            'religion' => 'nullable',
            'address' => 'nullable',
            'bloodType' => 'nullable',
            'student_no' => 'required|unique:identities',
            'arrivalYear' => 'nullable',
            'university' => 'nullable',
            'faculty' => 'nullable',
            'departman' => 'nullable',
        ]);
        
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => 'user'
        ]);

        Identity::create([
            'user_id' => $user->id,
            'phone_number' => $request->phoneNumber,
            'date_of_birth' => $request->birthDay,
            'married' => $request->married,
            'gender' => $request->gender,
            'religion' => $request->religion,
            'address_tr' => $request->address,
            'blood_type' => $request->bloodType,
            'student_no' => $request->student_no,
            'arrival_year' => $request->arrivalYear,
            'university' => $request->university,
            'faculty' => $request->faculty,
            'departman' => $request->departman,
        ]);
        
        session()->flash('success', 'Berhasil menambah member {$user->name}!');
        $this->activate($user);
        return redirect()->route('member.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {   
        
        return view('/admin/member/edit', 
        ['user'=> User::find($id)]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required',
            'phoneNumber' => 'nullable',
            'birthDay' => 'required',
            'married' => 'nullable',
            'gender' => 'nullable',
            'religion' => 'nullable',
            'address' => 'nullable',
            'bloodType' => 'nullable',
            'student_no' => 'required',
            'arrivalYear' => 'nullable',
            'university' => 'nullable',
            'faculty' => 'nullable',
            'departman' => 'nullable',
        ]);

        $user = User::find($id);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        $user->identity()->update([
            'phone_number' => $request->phoneNumber,
            'date_of_birth' => $request->birthDay,
            'married' => $request->married,
            'gender' => $request->gender,
            'religion' => $request->religion,
            'address_tr' => $request->address,
            'blood_type' => $request->bloodType,
            'student_no' => $request->student_no,
            'arrival_year' => $request->arrivalYear,
            'university' => $request->university,
            'faculty' => $request->faculty,
            'departman' => $request->departman,
        ]);

        session()->flash('success', 'Berhasil mengubah data!');
        return redirect()->route('member.index');
    }

    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();

        session()->flash('success', 'user telah dihapus!');
        return redirect()->route('member.index');
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

        Excel::import(new UserImport, request()->file('file'));

        Session::flash('sukses', 'Data berhasil diimport');

        return redirect('/admin/member');
    }

    public function activate(User $user){
        $userInformation = [
            'name' => $user->name
        ];
        Mail::to($user->email)->send(new UserActivate($userInformation));

        Session::flash('sukses', 'Email terkirim');
        return redirect()->back();
    }

    public function export_user(){
        return Excel::download(new UserExport, 'PPI Bandirma.xlsx');
    }

}
