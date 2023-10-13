<?php

namespace App\Http\Controllers;

use App\Models\Enlace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EnlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enlaces = Enlace::all();
        return response()->json($enlaces);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'idrol' => 'required|exists:roles,idrol',
            'idpagina' => 'required|exists:paginas,idpagina',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $enlace = Enlace::create($request->all());

        return response()->json($enlace, 201);
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
        $validator = Validator::make($request->all(), [
            'idrol' => 'required|exists:roles,idrol',
            'idpagina' => 'required|exists:paginas,idpagina',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $enlace = Enlace::findOrFail($id);
        $enlace->update($request->all());

        return response()->json($enlace, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $enlace = Enlace::findOrFail($id);
        $enlace->delete();

        return response()->json(null, 204);
    }
}
