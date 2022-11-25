<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProdukController extends Controller
{
    public function getAll(Request $request) {
        $data = Produk::with('image')->get();

        return response()->json([
            'success' => true,
            'message' => 'Berhasil Mengambil Data',
            'data' => $data,
        ]);
    }
    
    public function paginate(Request $request) {
        $perPage = $request->query('per_page');
        $columns = ['*'];
        $pageName = 'page';
        $page = $request->query('page');
        
        $data = Produk::with('image')->paginate($perPage,$columns,$pageName,$page);

        return response()->json([
            'success' => true,
            'message' => 'Berhasil Mengambil Data',
            'data' => $data,
        ]);
    }
    
    public function getDetail(Request $request, $id) {
        $data = Produk::find($id);

        return response()->json([
            'success' => true,
            'message' => 'Berhasil Mengambil Data',
            'data' => $data,
        ]);
    }
    
    public function getByKategoriId(Request $request, $kategori_id) {

        $data = Produk::with(['kategori'])
            ->where('kategori_id', '=', $kategori_id)
            ->get();

        return response()->json([
            'success' => true,
            'message' => 'Berhasil Mengambil Data',
            'data' => $data,
        ]);
    }
    
    public function add(Request $request) {
        $rules = array(
            'name' => 'required',
            'harga' => 'required',
            'jumlah' => 'required',
            'deskripsi' => 'required',
            'kategori_id' => 'required',
            'image_id' => 'required',
        );

        $validator = Validator::make($request->all(), $rules);
        
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => "Gagal Menambah Data Validasi Salah"
            ], 403);
        } else {
            $data = new Produk;
            $data->name = $request->input('name');
            $data->jumlah = $request->input('jumlah');
            $data->harga = $request->input('harga');
            $data->kategori_id = $request->input('kategori_id');
            $data->image_id = $request->input('image_id');
            $data->deskripsi = $request->input('deskripsi');

            $result = $data->save();

            if ($result) {
                return response()->json([
                    'success' => true,
                    'message' => "Berhasil Menambah Data",
                    'data' => $data,
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => "Gagal Menambah Data, data tidak dapat tersimpan"
                ], 403);
            }
        }
    }
    
    public function edit(Request $request, $id) {
        $rules = array(
            'name' => 'required',
            'harga' => 'required',
            'jumlah' => 'required',
            'deskripsi' => 'required',
            'kategori_id' => 'required',
            'image_id' => 'required',
        );
        $validator = Validator::make($request->all(), $rules);
        
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => "Gagal Mengubah Data Validsasi Salah"
            ], 403);
        } else {
            $data = Produk::find($id);

            $data->name = $request->input('name');
            $data->jumlah = $request->input('jumlah');
            $data->harga = $request->input('harga');
            $data->kategori_id = $request->input('kategori_id');
            $data->image_id = $request->input('image_id');
            $data->deskripsi = $request->input('deskripsi');
            $result = $data->update();

            if ($result) {
                return response()->json([
                    'success' => true,
                    'message' => "Berhasil Mengubah Data",
                    'data' => $data,
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => "Gagal Mengubah Data"
                ], 403);
            }
        }
    }
    
    public function delete(Request $request, $id) {
        
        $data = Produk::find($id);

        $result = $data->delete();

        if ($result) {
            return response()->json([
                'success' => true,
                'message' => "Berhasil Menghapus Data",
                'data' => $data,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => "Gagal Menghapus Data"
            ], 403);
        }
    }
}
