<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Paroki;

class UserController extends Controller
{
    public function index(){
        $d['user'] = User::select('nama','email','noTelp','hakAkses','paroki','penyelenggara')->with('paroki')->get();
        $d['paroki'] = Paroki::select('idParoki','namaParoki')->get();
        // dd($user);
        return view('master.user', ['data'=>$d]);
    }

    public function store(Request $request){
        try{
            $user_baru = new User($request->all());
            $user_baru->password = Hash::make($request->username);
            $user_baru->save();
        }catch(QueryException $exception){
            $this->flashError($exception->getMessage());
            return back();
        }

        $this->flashSuccess('Data User Berhasil Ditambahkan');
        return back();
    }

    public function update(Request $request, $id){
        try{
            $user = User::findOrFail($id);
            $user->fill($request->all());
            $user->save();
        }catch(QueryException $exception){
            $this->flashError($exception->getMessage());
            return back();
        }
        
        $this->flashSuccess('Data User Berhasil Diubah');
        return back();
    }

    public function destroy(Request $request, $id){
        try {
            $user = User::findOrFail($id);
            $user->delete();
        }catch (QueryException $exception) {
            $this->flashError($exception->getMessage());
            return back();
        }

        $this->flashSuccess('Data User Berhasil Dihapus');
        return back();
    }
}
