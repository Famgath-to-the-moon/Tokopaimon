<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DataTables;

class ProdukController extends Controller
{
    public function getAll(Request $request) {
        $data = Produk::with('kategori','image')->get();
        return view('user.welcome',[
            'datas' => $data,

        ]);
    }
    
    public function paginate(Request $request) {
        $perPage = $request->query('per_page');
        $columns = ['*'];
        $pageName = 'page';
        $page = $request->query('page');
        
        $data = Produk::with('image')->paginate($perPage,$columns,$pageName,$page);

        return view('user.produk',[
            'datas' => $data,

        ]);
    }
    
    public function getDetail(Request $request, $id) {
        $data = Produk::find($id);
        $randomDatas = Produk::with('kategori')->paginate(5);
        // dd($randomDatas);

        return view('user.detail-produk',[
            'datas' => $data,
            'randomDatas' => $randomDatas,

        ]);
    }
    
    public function getByKategoriId(Request $request, $kategori_id) {

        $data = Produk::with(['kategori'])
            ->where('kategori_id', '=', $kategori_id)
            ->get();

            return view('user.produk-kategori',[
                'datas' => $data,
    
            ]);
    }
    
    // public function add(Request $request) {
    //     $rules = array(
    //         'name' => 'required',
    //         'harga' => 'required',
    //         'jumlah' => 'required',
    //         'deskripsi' => 'required',
    //         'kategori_id' => 'required',
    //         'image_id' => 'required',
    //     );

    //     $validator = Validator::make($request->all(), $rules);
        
    //     if ($validator->fails()) {
    //         return redirect('produk');
    //     } else {
    //         $data = new Produk;
    //         $data->name = $request->input('name');
    //         $data->jumlah = $request->input('jumlah');
    //         $data->harga = $request->input('harga');
    //         $data->kategori_id = $request->input('kategori_id');
    //         $data->image_id = $request->input('image_id');
    //         $data->deskripsi = $request->input('deskripsi');

    //         $result = $data->save();

    //         if ($result) {
    //             return response()
    //         } else {
    //             return redirect('user-produk');
    //         }
    //     }
    // }
    
    // public function edit(Request $request, $id) {
    //     $rules = array(
    //         'name' => 'required',
    //         'harga' => 'required',
    //         'jumlah' => 'required',
    //         'deskripsi' => 'required',
    //         'kategori_id' => 'required',
    //         'image_id' => 'required',
    //     );
    //     $validator = Validator::make($request->all(), $rules);
        
    //     if ($validator->fails()) {
    //         return response()->json([
    //             'success' => false,
    //         ])
    //     } else {
    //         $data = Produk::find($id);

    //         $data->name = $request->input('name');
    //         $data->jumlah = $request->input('jumlah');
    //         $data->harga = $request->input('harga');
    //         $data->kategori_id = $request->input('kategori_id');
    //         $data->image_id = $request->input('image_id');
    //         $data->deskripsi = $request->input('deskripsi');
    //         $result = $data->update();

    //         if ($result) {
    //             return redirect('produk');
    //         } else {
    //             return redirect('produk');
    //         }
    //     }
    // }
    
    public function delete(Request $request, $id) {
        
        $data = Produk::find($id);

        $result = $data->delete();

        if ($result) {
            return redirect('produk');
        } else {
            return redirect('produk');
        }
    }
}
