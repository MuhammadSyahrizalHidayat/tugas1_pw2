<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
     
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Movie = Movie::all(); 
        return response() -> json($Movie ,200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate(
            [
                'Judul Film' => 'required|unique:Movie',
                'Genre' => 'required',
                'Sinopsis Film' => 'required',
                'Durasi Film' => 'required',
                'Tanggal Rilis' => 'required',
                'Bahasa' => 'required',
                'Rating' => 'required'
            ]
        );


        $Movie = Movie::create($validate); 
        if($Movie){
            $data['Success'] = true;
            $data['Message'] = "Data Movie Berhasil Disimpan";
            $data['Data'] = $Movie;
            return response()->json($data, 201);
        }
    }
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Mencari data fakultas berdasarkan ID
        $Movie = Movie::find($id);
        if ($Movie) {
            // Validasi input
            $validate = $request->validate(
                [
                    'nama' => 'required',
                    'kode' => 'required'
                ]
            );

            $Movie = Movie::where('id',$id)->update($validate); 
            if($Movie){
                $data['Success'] = true;
                $data['Message'] = "Data Movie Berhasil Diupdate";
                $data['Data'] = $Movie;
                return response()->json($data, 201);
            }
        } else {
            $data['Success'] = false;
            $data['Message'] = "Data Movie Tidak Ditemukan";
            return response()->json($data, 404); 
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cariMovie = Movie::where('id',$id);
        if($cariMovie) {
            $cariMovie->delete();
            $data['Success'] = true;
            $data['Message'] = "Data Movie Berhasil Dihapus";
            return response()->json($data, 200);
    } else {
            $data['Success'] = false;
            $data['Message'] = "Data Movie Tidak Ditemukan";
            return response()->json($data, 404); 
        }
    }
}
