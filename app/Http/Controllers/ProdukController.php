<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DataTables;

class ProdukController extends Controller
{
    public function getAll(Request $request) {
        $data = Produk::with('kategori','image')->get();
        $kategori = Kategori::all();
        return view('user.welcome',[
            'datas' => $data,
            'kategoris' => $kategori,

        ]);
    }
    public function All(Request $request) {
        $data = Produk::with('kategori','image')->get();
        $kategori = Kategori::all();
        return view('admin.produk',[
            'datas' => $data,
            'kategoris' => $kategori,

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
        $kategoris = Kategori::all();
            return view('user.produk-kategori',[
                'datas' => $data,
                'kategoris' => $kategoris,
            ]);
    }
    
    public function add(Request $request) {
        $rules = array(
            'name' => 'required',
            'harga' => 'required',
            'jumlah' => 'required',
            'deskripsi' => 'required',
            'kategori_id' => 'required',
        );

        $validator = Validator::make($request->all(), $rules);
        
        if ($validator->fails()) {
            return response()->json([
                'gagal' => $validator->errors()
            ]);
        } 
        if($request->hasFile('path')){
            $allowedfileExtension = ['pdf','jpg','png'];
            $file = $request->file('path'); 
            $extension = $file->getClientOriginalExtension();
            $check = in_array($extension, $allowedfileExtension);

            if($check){
                $name = time() . '-' . $file->getClientOriginalName();
                // dd($name);
                
                $file->move(public_path('upload/images/'. $name), $name);
                $imagePath = ('upload/images/'.$name .'/'.$name);
                $file= $imagePath;  
            } else{
                return response()->json([
                    'success' => false,
                    'message' => 'invalid_file_format',
                ], 422);
            }

            $data = new Image();
            $data->path = $file;
            $result = $data->save();
            if($result){
                $dataProduk = new Produk;
                $dataProduk->name = $request->input('name');
                $dataProduk->jumlah = $request->input('jumlah');
                $dataProduk->harga = $request->input('harga');
                $dataProduk->image_id = $data->id;
                $dataProduk->kategori_id = $request->input('kategori_id');
                $dataProduk->deskripsi = $request->input('deskripsi');
                $resultProduk = $dataProduk->save();
                if($resultProduk){
                    return response()->json([

                        'succes',
                    ]);

                } else{
                    return response()->json([
                        'gagal'
                    ]);
                }
            }else{
                return response()->json([
                    'success' => false,
                    'message' => 'tidak dapat menyimpan produk',
                ], 422);
            }
        } else {
            return response()->json([
                'success' => false,
                'message' => 'gagal menyimpan produk',
            ], 422);
        }
    }
    
    public function edit(Request $request, $id) {
        $rules = array(
            'name' => 'required',
            'harga' => 'required',
            'jumlah' => 'required',
            'deskripsi' => 'required',
            'kategori_id' => 'required',
        );

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->route('admin-home');
        } 
        if($request->hasFile('path')){
            $allowedfileExtension = ['pdf','jpg','png'];
            $file = $request->file('path'); 
            $extension = $file->getClientOriginalExtension();
            $check = in_array($extension, $allowedfileExtension);

            if($check){
                $name = time() . '-' . $file->getClientOriginalName();
                // dd($name);
                
                $file->move(public_path('upload/images/'. $name), $name);
                $imagePath = ('upload/images/'.$name .'/'.$name);
                $file= $imagePath;  
            } else{
                return response()->json([
                    'success' => false,
                    'message' => 'invalid_file_format',
                ], 422);
            }

            $data = new Image();
            $data->path = $file;
            $data->save();
           
        } else {
            $dataProduk = Produk::find($id);
            if(!is_null($dataProduk)){
                $dataProduk->name = $request->input('name');
                $dataProduk->jumlah = $request->input('jumlah');
                $dataProduk->harga = $request->input('harga');
                // $dataProduk->harga = $data->id;
                $dataProduk->kategori_id = $request->input('kategori_id');
                $dataProduk->deskripsi = $request->input('deskripsi');
                $resultProduk = $dataProduk->update();
                if($resultProduk){
                    return response()->json([

                        'succes',
                    ]);

                } else{
                    return response()->json([
                        'gagal'
                    ]);
                }
            }
        }
    }
    
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
