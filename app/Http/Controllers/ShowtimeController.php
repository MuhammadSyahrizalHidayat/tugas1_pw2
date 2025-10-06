<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Showtime;
use Illuminate\Http\Request;

class ShowtimeController extends Controller
{
    protected $fillable = ['Tanggal Penayangan', 'Jam Penayangan', 'movie_id'];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Showtime = Showtime::with('Showtime_Movie')->get();  
        return response()->json($Showtime, 200);                              
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
                'Tanggal Penayangan' => 'required',
                'Jam Penayangan' => 'required',
                'Movie_id' => 'required|exists:Movie,id'
            ]
        );
        $Movie = Movie::create($validate);
        if($Movie) {
            $data['Success'] = true;
            $data['Message'] = "Data Showtime Berhasil Disimpan";
            $data['Data'] = $Movie;
            return response()->json($data, 201);
        }
    }

    /**
     * Display the specified resource.
     */
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
        $cariMovie = Movie::find($id);
        if($cariMovie) 
        {
            $validate = $request->validate(
                [
                    'Tanggal Penayangan' => 'required',
                    'Jam Penayangan' => 'required',
                    'Movie_id' => 'required|exists:Movie,id'
                ]
            );  

            $Movie = Movie::where('id', $id)->update($validate); 
            if($Movie) {
                $data['Success'] = true;
                $data['Message'] = "Data Showtime Berhasil Diupdate";
                $data['Data'] = $cariMovie;
                return response()->json($data, 201);
            }
        }
        else 
        {
            $data['Success'] = false;
            $data['Message'] = "Data Showtime Tidak Ditemukan";
            return response()->json($data, 404); 
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cariMovie = Movie::where('id',$id);
        if(count($cariMovie->get())){
            $cariMovie->delete();
            $response['success'] = true;
            $response['message'] = 'Showtime berhasil dihapus.';
            return response()->json($response, 200);
        } else {
            $response['success'] = false;
            $response['message'] = 'Showtime tidak ditemukan.';
            return response()->json($response, 404);
        }

    }
}