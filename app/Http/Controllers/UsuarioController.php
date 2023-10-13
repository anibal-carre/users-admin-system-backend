<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Usuario::all();
        return response()->json($usuarios);
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

            'usuario' => 'required|unique:usuarios,usuario',
            'clave' => 'required',
            'habilitado' => 'boolean',
            'idrol' => 'required|exists:rols,idrol',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $usuario = Usuario::create($request->all());

        return response()->json($usuario, 201);
    }


    public function show($id)
    {
        $usuario = Usuario::find($id);

        if (!$usuario) {
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }

        return response()->json($usuario);
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

            'usuario' => 'unique:usuarios,usuario,' . $id,
            'habilitado' => 'boolean',
            'clave',
            'idrol' => 'exists:rols,idrol',
            'idpersona'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $usuario = Usuario::findOrFail($id);
        $usuario->update($request->all());

        return response()->json($usuario, 200);
    }




    //Register Function
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'usuario' => 'unique:usuarios,usuario',
            'clave' => 'required',
            'habilitado' => 'boolean',
            'idrol' => 'exists:rols,idrol',
            // Campo opcional
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        try {
            // Inicia una transacción de base de datos
            DB::beginTransaction();

            // Crea un nuevo usuario
            $usuario = new Usuario();
            $usuario->usuario = $request->input('usuario');
            $usuario->clave = $request->input('clave'); // Recuerda encriptar la contraseña
            $usuario->habilitado = $request->input('habilitado');
            $usuario->idrol = $request->input('idrol');
            $usuario->save();

            // Crea una nueva persona solo si se proporcionan nombres y apellidos
            $persona = new Persona([
                'user' => $request->input('usuario'),

            ]);

            if ($request->filled('usuario')) {
                $persona->save();

                // Vincula el ID de la persona al usuario
                $usuario->idpersona = $persona->id;
                $usuario->save();
            }

            // Confirma la transacción si todo ha ido bien

            DB::commit();

            return response()->json(['message' => 'Usuario registrado con éxito', 'usuario' => $usuario, 'Persona' => $persona], 201);
        } catch (\Exception $e) {
            // En caso de error, revierte la transacción y devuelve un mensaje de error
            DB::rollback();
            return response()->json(['error' => 'Error al registrar usuario']);
        }
    }


    public function login(Request $request)
    {

        $auth = Usuario::where('usuario', $request->usuario)->where('clave', $request->clave)->first();

        if (!$auth) {
            return response()->json(['error' => 'Credenciales incorrectas'], 401);
        }


        return response()->json([
            'success' => true,
            'message' => 'Inicio de sesión exitoso',
            'token' => 'el-token-de-autenticación',
            'idrol' => $auth->idrol,
            'usuario' => $auth,
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
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();

        return response()->json(null, 204);
    }
}
