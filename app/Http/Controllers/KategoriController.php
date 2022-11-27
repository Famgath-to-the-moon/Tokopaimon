<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KategoriController extends Controller
{
    public function getAll(Request $request) {
        $data = Kategori::with('produk')->get();

        return response()->json([
            'success' => true,
            'message' => 'Berhasil Mengambil Data',
            'data' => $data,
        ]);
    
    }
    public function All(Request $request) {
        $data = Kategori::with('produk')->get();
        return view('admin.kategori',[
        'datas' => $data,
    ]);
    }
    
    public function paginate(Request $request) {
        $perPage = $request->query('per_page');
        $columns = ['*'];
        $pageName = 'page';
        $page = $request->query('page');
        
        $data = Kategori::with('produk')->paginate($perPage,$columns,$pageName,$page);

        return response()->json([
            'success' => true,
            'message' => 'Berhasil Mengambil Data',
            'data' => $data,
        ]);
    }
    
    public function getDetail(Request $request, $id) {
        $data = Kategori::find($id);

        return response()->json([
            'success' => true,
            'message' => 'Berhasil Mengambil Data',
            'data' => $data,
        ]);
    }
    
    public function create(Request $request) {
        $rules = array(
            'name' => 'required',
        );

        $validator = Validator::make($request->all(), $rules);
        
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => "Gagal Menambah Data"
            ], 403);
        } else {
            $data = new Kategori;
            $data->name = $request->input('name');

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
                    'message' => "Gagal Menambah Data"
                ], 403);
            }
        }
    }
    
    public function edit(Request $request, $id) {
        $rules = array(
            'name' => 'required',
        );
        $validator = Validator::make($request->all(), $rules);
        
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => "Gagal Mengubah Data Validsasi Salah"
            ], 403);
        } else {
            $data = Kategori::find($id);

            $data->name = $request->input('name');
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
        
        $data = Kategori::find($id);

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
