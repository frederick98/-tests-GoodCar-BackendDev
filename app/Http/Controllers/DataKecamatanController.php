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
        Excel::import(new UsersImport, request()->file('file'));
        return redirect()->back()->with('status','Data Kecamatan Berhasil Diimport');
    }
    
    public function post(DataKecamatanRequest  $request){
        $uuid = Uuid::uuid4();

        // formatting status
        $status = $request->status;
        if(($request->status) == 1){
            $published = Carbon::now();
        }

        $input = DataKecamatan::create([
            'id'=>$uuid,
            'name'=>$request->name,
            'status'=>$request->status,
            'created_time'=>Carbon::now(),
            'created_by'=>Auth::user()->id,
        ]);
        return redirect()->route('dataKecamatan.list')->with('status', 'Kecamatan has been successfully created!'); 
    }

    public function edit($id){
        $category = DataKecamatan::find($id);

        // return response()->json(['data' => $category]);
        return view('admin.data-kecamatan.dataKecamatanEdit', $data);
    }

    public function postEdit(DataKecamatanRequest $request, $id) {
        // ArticleCategory::updateOrCreate([
        //     ['id' => $id],
        //     ['name' => $request->name],
        //     ['status' => $request->status],
        // ]);

        return response()->json(['success' => true]);
        // item category yg akan diedit
        // $data['first'] = ArticleCategory::select(
        //         'm_category.id',
        //         'm_category.name',
        //         'm_category.status')
        //     ->where('m_category.id', $id)
        //     ->firstOrFail();

        // return view('admin.news.category.categoryIndex', $data);
    }

    // public function create() {
    //     $data['category'] = ArticleCategory::select('id', 'name')->orderby('name')->get();
    //     $data['topic'] = DB::table('m_topic')->select('id', 'name')->orderby('name')->get();
    //     return view('admin.news.newsCreate', $data);
    // }

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
