<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Mahasiswa as MahasiswaResource;
use App\Mahasiswa;

class MahasiswaController extends Controller
{
 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return MahasiswaResource::collection(Mahasiswa::all());

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'Name' => 'required',
            'Faculty' => 'required',
            'NIM' => 'required',
            'Gender' => 'required',
        ]);

        $post = new Mahasiswa([
            'Name' => $request->Name,
            'Faculty' => $request->Faculty,
            'NIM' => $request->NIM,
            'Gender' => $request->Gender,

        ]);

        $post->save();
        return response()->json([
            'data' => 'Catalog created!'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new MahasiswaResource(Mahasiswa::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'Name' => 'required',
            'Faculty' => 'required',
            'NIM' => 'required',
            'Gender' => 'required',
        ]);

        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->Name = $request->Name;
        $mahasiswa->Faculty = $request->Faculty;
        $mahasiswa->NIM = $request->NIM;
        $mahasiswa->Gender = $request->Gender;


        $mahasiswa->update();
        return response()->json([
            'data' => 'Catalog update!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete();
        return response()->json([
            'data' => 'Catalog deleted!'
        ]);
    }
}
