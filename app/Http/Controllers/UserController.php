<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Paroki;
use App\Models\Penyelenggara;

class UserController extends Controller
{
    public function index(){
        $d['user'] = User::with('parokiRelation:idParoki,namaParoki','penyelenggaraRelation:idPenyelenggara,nama')
            ->get(['nama','email','noTelp','hakAkses','paroki','penyelenggara']);
        $d['paroki'] = Paroki::get(['idParoki','namaParoki']);
        $d['penyelenggara'] = Penyelenggara::get(['idpenyelenggara','nama']);
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
