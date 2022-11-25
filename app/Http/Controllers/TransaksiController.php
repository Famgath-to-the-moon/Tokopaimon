<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransaksiController extends Controller
{
    public function getAll(Request $request) {
        $data = Transaksi::with('produk','user')->get();

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
        
        $data = Transaksi::with('produk','user')->paginate($perPage,$columns,$pageName,$page);

        return response()->json([
            'success' => true,
            'message' => 'Berhasil Mengambil Data',
            'data' => $data,
        ]);
    }
    
    public function detail(Request $request, $id) {
        $data = Transaksi::find($id);

        return response()->json([
            'success' => true,
            'message' => 'Berhasil Mengambil Data',
            'data' => $data,
        ]);
    }
    
    public function add(Request $request,$produk_id) {
        $rules = array(
            'jumlah' => 'required',
            'user_id' => 'required',
        );
        
        $validator = Validator::make($request->all(), $rules);
        
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => "Gagal Menambah Data, Validasi salah"
            ], 403);
        } else {
            $dataProduk = Produk::find($produk_id);

            if ($dataProduk->jumlah == 0){
                return response()->json([
                    'success' => true,
                    'message' => "Stok Habis",
                ],403);
            }

            $data = new Transaksi;
            $data->jumlah = $request->input('jumlah');
            $data->produk_id = $produk_id;
            $data->user_id = $request->input('user_id');

            $result = $data->save();

            if(!is_null($data->jumlah)){
                
                $total = intval($dataProduk->jumlah-$data->jumlah );
                $dataProduk->jumlah = $total;
                $resultProduk = $dataProduk->update();
                
                if($resultProduk || $result){
                    return response()->json([
                        'success' => true,
                        'message (1)' => "Berhasil Menmbahkan Data",
                        'message (2)' => "Jumlah produk telah berkurang",
                        'data' => $dataProduk,$data
                    ]);
                }
                else {
                    return response()->json([
                        'success' => false,
                        'message' => "Jumlah produk tidak berkurang"
                    ], 403);
                }
            }
            // if ($result) {
            //     return response()->json([
            //         'success' => true,
            //         'message' => "Berhasil Menambah Data",
            //         'data' => $data,
            //     ]);
            //     dd($result);
            // } else {
            //     return response()->json([
            //         'success' => false,
            //         'message' => "Gagal Menambah Data"
            //     ], 403);
            // }
        }
    }
    
    // public function edit(Request $request, $id) {
    //     $rules = array(
    //         'name' => 'required',
    //     );
    //     $validator = Validator::make($request->all(), $rules);
        
    //     if ($validator->fails()) {
    //         return response()->json([
    //             'success' => false,
    //             'message' => "Gagal Mengubah Data Validsasi Salah"
    //         ], 403);
    //     } else {
    //         $data = Transaksi::find($id);

    //         $data->name = $request->input('name');
    //         $result = $data->update();

    //         if ($result) {
    //             return response()->json([
    //                 'success' => true,
    //                 'message' => "Berhasil Mengubah Data",
    //                 'data' => $data,
    //             ]);
    //         } else {
    //             return response()->json([
    //                 'success' => false,
    //                 'message' => "Gagal Mengubah Data"
    //             ], 403);
    //         }
    //     }
    // }
    
    // public function delete(Request $request, $id) {
        
    //     $data = Transaksi::find($id);

    //     $result = $data->delete();

    //     if ($result) {
    //         return response()->json([
    //             'success' => true,
    //             'message' => "Berhasil Menghapus Data",
    //             'data' => $data,
    //         ]);
    //     } else {
    //         return response()->json([
    //             'success' => false,
    //             'message' => "Gagal Menghapus Data"
    //         ], 403);
    //     }
    // }
}