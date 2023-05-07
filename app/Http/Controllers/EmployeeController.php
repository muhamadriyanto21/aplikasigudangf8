<?php

namespace App\Http\Controllers;

use App\Exports\EmployeeExport;
use App\Imports\EmployeeImport;
use App\Models\Employee;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel as ExcelExcel;
use Maatwebsite\Excel\Facades\Excel;
// use Barryvdh\DomPDF\Facade as PDF;
use PDF;


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

    // export pdf

    public function exportpdf() {
        $data = Employee::all();
        view()->share('data', $data);
        $pdf = PDF::loadview('databahan-pdf');
        return $pdf->download('data.pdf');
    }

    // export excel
    public function exportexcel() {
      Excel::download(new EmployeeExport, 'databahan.xlsx');
    }


    // import excel
    public function importexcel(Request $request) {
        $data = $request->file('file');
        $namafile = $data->getClientOriginalName();
        $data->move('EmployeeData', $namafile);
        Excel::import(new EmployeeImport, \public_path('/EmployeeData/'.$namafile));
        return \redirect()->back();
        
      }
      
    
    
}
