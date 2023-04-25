<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(Request $request) {
        if($request->has('search')){
            $data = Employee::where('nama', 'LIKE', '%' . $request->search.'%')->paginate(5);
        }else {
            $data = Employee::paginate(5);
        }
        
        return view("databahan", compact('data'));
    }

    public function tambahbahan() {
        
        return view("tambahbahan");
    }

    public function insertdata(Request $request) {
        $data = Employee::create($request->all());
        if($request->hasFile('foto')) {
            $request->file('foto')->move('fotobahan/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('pegawai')->with('success', 'Data Berhasil DiTambahkan');
    }

    public function tampilkandata($id) {
        $data = Employee::find($id);
        // dd($data);
        return view('tampildata', compact('data'));
    }

    public function updatedata(Request $request, $id) {
        $data = Employee::find($id);
        $data->update($request->all());
        return redirect()->route('pegawai')->with('success', 'Data Berhasil Di Ubah');
    }

    public function delete($id) {
        $data = Employee::find($id);
        $data->delete();
        return redirect()->route('pegawai')->with('success', 'Data Berhasil Di Hapus');
    }
    
}
