<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;

use App\Models\DataKecamatan;
use App\Exports\DataKecamatanExport;

class DataKecamatanController extends Controller
{
    public function index() {
        $data['totalKecamatan'] = DataKecamatan::count();
        $data['kecamatan'] = DataKecamatan::orderBy('created_time', 'desc')->get();
        
        return view('admin.data-kecamatan.dataKecamatanIndex', $data);
    }

    public function export(){
        return Excel::download(new DataKecamatanExport, 'dataKecamatan.xlsx');
    }
    
    public function import(){
        // save ile to storage
        $fileName = time().'_'.request()->file->getClientOriginalName();
        request()->file('file')->storeAs('reports', $fileName, 'public');

        Excel::import(new UsersImport, request()->file('file'));
        return redirect()->back()->with('status','Data Kecamatan Berhasil Diimport');
    }

    public function edit($id){
        // item data kecamatan yang akan diedit
        $data['first'] = Banner::where('id', $id)->firstOrFail();

        return view('admin.data-kecamatan.dataKecamatanEdit', $data);
    }

    public function postEdit(DataKecamatanRequest $request, $id) {
        $uuid = Uuid::uuid4();

        $input = DataKecamatan::create([
            'id'=>$uuid,
            'provinsi'=>$request->provinsi,
            'kota'=>$request->kota,
            'kelurahan'=>$request->kelurahan,
            'nama'=>$request->nama,
            'status'=>$request->status,
            'updated_time'=>Carbon::now(),
            'updated_time'=>Auth::user()->id,
        ]);
        return redirect()->route('dataKecamatan.list')->with('status', 'Data Kecamatan berhasil diperbarui!');
    }

    public function delete($id){
        $delete = DataKategory::find($id);
        if(isset($delete)){
            // kalo pake soft delete
            // $delete->update([
            //     // 'deleted_time'=>Carbon::now(),
            //     'deleted_by'=>Auth::user()->id,
            // ]);
            DataKategory::destroy($id);
            return redirect()->route('dataKecamatan.list')->with('deleted', 'Kecamatan has been successfully deleted!'); 
            // return response()->json([
            //     'success'=>true,
            //     'message'=>'Artikel berhasil dihapus'
            // ],200);
        }else{
            return response()->json([
                'success'=>false,
                'message'=>'data tidak tersedia'
            ],404);
        }
    }
}
