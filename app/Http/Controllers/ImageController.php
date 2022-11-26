<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ImageController extends Controller
{
    public function add(Request $request){

        $rules = array(
            'path|file|mimes:pdf,png,jpg|max:2048',
        );

        $validator = Validator::make($request->all(),$rules);
        
        if($validator->fails()){
            return response()->json([
                'success'=>false,
                'message'=>'Validasi salah, gagal menambah image',
            ], 403);
        } else {
            if (!$request->hasFile('path')) {
                return response()->json(['upload_file_not_found'], 400);
            }
         
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
                return response()->json([
                    'success' => true,
                    'message' => 'Berhasil tambah data image',
                    'data' => $data,
                ]);
            }else {
                return response()->json([
                    'success' => false,
                    'message' => "Gagal Menambah Data"
                ], 403);
            }
        }
    }
    public function getAll(Request $request) {
        $data = Image::with('produk')->get();

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
        
        $data = Image::with('produk')->paginate($perPage,$columns,$pageName,$page);

        return response()->json([
            'success' => true,
            'message' => 'Berhasil Mengambil Data',
            'data' => $data,
        ]);
    }
    public function getDetail(Request $request, $id) {
        $data = Image::find($id);

        return response()->json([
            'success' => true,
            'message' => 'Berhasil Mengambil Data',
            'data' => $data,
        ]);
    }

    public function edit(Request $request,$id){
        $data = Image::find($id);
        
        if(!$request->hasFile('path')){
            return response()->json([
                'success' => false,
                'message' => "Gagal Menambah Data validasi salah"
            ], 403);
        } else {
         
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
            $result = $data->update();

            if($result){                
                return response()->json([
                    'success' => true,
                    'message' => 'Berhasil tambah data image',
                    'data' => $data,
                ]);
            }else {
                return response()->json([
                    'success' => false,
                    'message' => "Gagal Menambah Data, data tidak terupdate"
                ], 403);
            }
        }
    }
}
