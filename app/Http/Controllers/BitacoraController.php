<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BitacoraController extends Controller
{
    public function index()
    {
        $bitacoras = Bitacora::all();
        return response()->json($bitacoras);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $fecha = Carbon::now()->toDateString();


        $hora = Carbon::now('America/Sao_Paulo')->toTimeString();


        $ip = $request->ip();


        $so = 'Windows 10';
        $navegador = 'Chrome';


        $usuario = $request->input('usuario');


        DB::table('bitacoras')->insert([
            'idusuario' => $request->input('idusuario'),
            'fecha' => $fecha,
            'hora' => $hora,
            'ip' => $ip,
            'so' => $so,
            'navegador' => $navegador,
            'usuario' => $usuario,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return response()->json(['message' => 'Bitácora registrada correctamente']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bitacora = Bitacora::find($id);

        if (!$bitacora) {
            return response()->json(['error' => 'Bitácora no encontrada'], 404);
        }

        return response()->json($bitacora, 200);
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
            'idusuario' => 'required|exists:usuarios,id',
            'fecha' => 'required|date',
            'hora' => 'required',
            'ip' => 'required|ip',
            'so' => 'required',
            'navegador' => 'required',
            'usuario' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $bitacora = Bitacora::findOrFail($id);
        $bitacora->update($request->all());

        return response()->json($bitacora, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bitacora = Bitacora::findOrFail($id);
        $bitacora->delete();

        return response()->json(null, 204);
    }
}
