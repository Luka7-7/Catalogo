<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EmprendedorController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | MOSTRAR LOGIN
    |--------------------------------------------------------------------------
    */

    public function login()
    {
        return view('emprendedor.login');
    }


    public function autenticar(Request $request)
    {
        $request->validate([

            'correo_electronico' => 'required|email',

            'contrasena' => 'required'

        ]);

        $usuario = DB::table('users')

            ->where('email', $request->correo_electronico)

            ->where('esta_eliminado', 0)

            ->first();

        /*
        |--------------------------------------------------------------------------
        | USUARIO NO EXISTE
        |--------------------------------------------------------------------------
        */

        if (!$usuario) {

            return back()

                ->withErrors([
                    'correo_electronico' => 'El correo no existe'
                ])

                ->withInput();

        }

        /*
        |--------------------------------------------------------------------------
        | CONTRASEÑA INCORRECTA
        |--------------------------------------------------------------------------
        */

        if (!Hash::check($request->contrasena, $usuario->password)) {

            return back()

                ->withErrors([
                    'password' => 'Contraseña incorrecta'
                ])

                ->withInput();

        }

        /*
        |--------------------------------------------------------------------------
        | GUARDAR SESION
        |--------------------------------------------------------------------------
        */

        session([

            'usuario' => $usuario

        ]);

        return redirect()

            ->route('emprendedor.dashboard');
    }

    public function dashboard(){
        // USUARIO EN SESION
        $usuario = session('usuario');

        /*
        |--------------------------------------------------------------------------
        | PRODUCTOS
        |--------------------------------------------------------------------------
        */

        $productos = DB::table('productos_servicios')
            ->join(
                'negocios',
                'productos_servicios.negocio_id',
                '=',
                'negocios.id'
            )
            ->leftJoin(
                'categorias_negocio',
                'productos_servicios.categoria_id',
                '=',
                'categorias_negocio.id'
            )
            ->select(
                'productos_servicios.*',
                'negocios.nombre as negocio',
                'categorias_negocio.nombre_categoria'
            )
            ->where('negocios.user_id', $usuario->id)
            ->where('productos_servicios.tipo', 'Producto')
            ->get();

        /*
        |--------------------------------------------------------------------------
        | SERVICIOS
        |--------------------------------------------------------------------------
        */

        $servicios = DB::table('productos_servicios')
            ->join(
                'negocios',
                'productos_servicios.negocio_id',
                '=',
                'negocios.id'
            )
            ->leftJoin(
                'categorias_negocio',
                'productos_servicios.categoria_id',
                '=',
                'categorias_negocio.id'
            )
            ->select(
                'productos_servicios.*',
                'negocios.nombre as negocio',
                'categorias_negocio.nombre_categoria'
            )
            ->where('negocios.user_id', $usuario->id)
            ->where('productos_servicios.tipo', 'Servicio')
            ->get();

        return view('emprendedor.dashboard', [

            'productos' => $productos,

            'servicios' => $servicios

        ]);
    }

/*
    public function miPerfil()
    {
        return view('emprendedor.perfil');
    }
        */
    public function logout(Request $request)   {
        // ELIMINAR SESION
        $request->session()->forget('usuario');

        // LIMPIAR SESION
        $request->session()->invalidate();

        // REGENERAR TOKEN
        $request->session()->regenerateToken();

        return redirect()->route('inicio');
    }

    public function crearNuevo(){
    // USUARIO EN SESION
    $usuario = session('usuario');

    // NEGOCIOS DEL USUARIO
    $negocios = DB::table('negocios')
        ->where('user_id', $usuario->id)
        ->get();

    // CATEGORIAS
    $categorias = DB::table('categorias_negocio')
        ->get();

    return view('emprendedor.formularioproducto', [

        'negocios' => $negocios,

        'categorias' => $categorias

    ]);
    }
    public function guardarProducto(Request $request)
{
    $request->validate([

        'negocio_id' => 'required|exists:negocios,id',

        'categoria_id' => 'required|exists:categorias_negocio,id',

        'nombre' => 'required|max:255',

        'tipo' => 'required|in:Producto,Servicio',

        'descripcion' => 'required',

        'precio' => 'required|numeric|min:0',

        'imagen' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'

    ]);

    /*
    |--------------------------------------------------------------------------
    | GUARDAR PRODUCTO
    |--------------------------------------------------------------------------
    */

    $productoId = DB::table('productos_servicios')->insertGetId([

        'negocio_id' => $request->negocio_id,

        'categoria_id' => $request->categoria_id,

        'nombre' => $request->nombre,

        'tipo' => $request->tipo,

        'descripcion' => $request->descripcion,

        'precio' => $request->precio,

        'esta_activo' => 1,

        'created_at' => now(),

        'updated_at' => now()

    ]);

    /*
    |--------------------------------------------------------------------------
    | SUBIR IMAGEN
    |--------------------------------------------------------------------------
    */

if (
    $request->hasFile('imagen') &&
    $request->file('imagen')->isValid()
) {

    $archivo = $request->file('imagen');

    // NOMBRE UNICO
    $nombreImagen = time() . '_' . str_replace(
        ' ',
        '_',
        $archivo->getClientOriginalName()
    );

    // CARPETA DESTINO
    $destino = public_path('uploads/productos');

    // CREAR CARPETA SI NO EXISTE
    if (!file_exists($destino)) {

        mkdir($destino, 0777, true);

    }

    // MOVER IMAGEN
    $archivo->move($destino, $nombreImagen);

    // RUTA PARA BD
    $rutaBD = '/uploads/productos/' . $nombreImagen;

    DB::table('imagenes_productos')->insert([

        'producto_id' => $productoId,

        'ruta_imagen' => $rutaBD,

        'es_principal' => 1,

        'creado_el' => now()

    ]);
}

    return redirect()

        ->route('emprendedor.dashboard')

        ->with('success', 'Registro creado correctamente');
}
    public function eliminarProducto($id){
        // ELIMINAR IMAGENES
        DB::table('imagenes_productos')
            ->where('producto_id', $id)
            ->delete();

        // ELIMINAR PRODUCTO
        DB::table('productos_servicios')
            ->where('id', $id)
            ->delete();

        return redirect()

            ->route('emprendedor.dashboard')

            ->with('success', 'Registro eliminado');
    }
    public function editarProducto($id){
        $producto = DB::table('productos_servicios')

            ->where('id', $id)

            ->first();

        $categorias = DB::table('categorias_negocio')->get();

        $negocios = DB::table('negocios')->get();

        return view('emprendedor.editarproducto', [

            'producto' => $producto,

            'categorias' => $categorias,

            'negocios' => $negocios

        ]);
    }
public function actualizarProducto(Request $request, $id)
{
    $usuario = session('usuario');

    $request->validate([

        'negocio_id' => 'required|exists:negocios,id',

        'categoria_id' => 'required|exists:categorias_negocio,id',

        'nombre' => 'required',

        'descripcion' => 'required',

        'precio' => 'required|numeric|min:0',

        'tipo' => 'required|in:Producto,Servicio'

    ]);

    DB::table('productos_servicios')

        ->join(
            'negocios',
            'productos_servicios.negocio_id',
            '=',
            'negocios.id'
        )

        ->where('productos_servicios.id', $id)

        ->where('negocios.user_id', $usuario->id)

        ->update([

            'productos_servicios.negocio_id' => $request->negocio_id,

            'productos_servicios.categoria_id' => $request->categoria_id,

            'productos_servicios.nombre' => $request->nombre,

            'productos_servicios.tipo' => $request->tipo,

            'productos_servicios.descripcion' => $request->descripcion,

            'productos_servicios.precio' => $request->precio,

            'productos_servicios.updated_at' => now()

        ]);

    return redirect()

        ->route('emprendedor.dashboard')

        ->with('success', 'Registro actualizado');
}
/*
|--------------------------------------------------------------------------
| PERFIL
|--------------------------------------------------------------------------
*/

public function miPerfil()
{
    $usuario = session('usuario');

    // FIX: user_id → usuario_id
    $negocio = DB::table('negocios')
        ->where('user_id', $usuario->id)
        ->first();

    $negocios = DB::table('negocios')
        ->where('user_id', $usuario->id)
        ->orderBy('id', 'desc')
        ->get();

    if (!$negocio) {
        $negocio = (object) [
            'enlace_whatsapp' => '',
            'url_facebook'    => '',
            'url_instagram'   => '',
            'url_tiktok'      => ''
        ];
    }

    return view('emprendedor.perfil', compact('usuario', 'negocio', 'negocios'));
}
    /*
    |--------------------------------------------------------------------------
    | RETORNAR VISTA
    |--------------------------------------------------------------------------
    */




    /*
    |--------------------------------------------------------------------------
    | ACTUALIZAR PERFIL AJAX
    |--------------------------------------------------------------------------
    */




    /*
    |--------------------------------------------------------------------------
    | ACTUALIZAR REDES SOCIALES
    |--------------------------------------------------------------------------
    */

public function actualizarPerfil(Request $request)
{
    $usuario = session('usuario');

    $camposPermitidos = ['nombre', 'correo_electronico'];

    if (!in_array($request->campo, $camposPermitidos)) {
        return response()->json(['error' => 'Campo no permitido'], 403);
    }

    // Map view field names → real DB column names
    $mapa = [
        'nombre'              => 'nombre',
        'correo_electronico'  => 'email',  // view sends correo_electronico, DB has email
    ];

    DB::table('users')                          // FIX: usuarios → users
        ->where('id', $usuario->id)
        ->update([$mapa[$request->campo] => $request->valor]);

    return response()->json(['ok' => true]);
}

public function actualizarRedes(Request $request)
{
    $usuario = session('usuario');

    $camposPermitidos = ['enlace_whatsapp', 'url_facebook', 'url_instagram', 'url_tiktok'];

    if (!in_array($request->campo, $camposPermitidos)) {
        return response()->json(['error' => 'Campo no permitido'], 403);
    }

    DB::table('negocios')
        ->where('user_id', $usuario->id) // ⚠️ change to your real FK column
        ->update([$request->campo => $request->valor]);

    return response()->json(['ok' => true]);
}


    /*
    |--------------------------------------------------------------------------
    | ACTUALIZAR PASSWORD
    |--------------------------------------------------------------------------
    */

    public function actualizarPassword(Request $request)
    {
        $usuario = session('usuario');

        DB::table('users')

            ->where('id', $usuario->id)

            ->update([

                'password' => Hash::make($request->contrasena)

            ]);

        return response()->json([

            'success' => true

        ]);
    }
    public function actualizarNegocio(Request $request)
{
    $usuario = session('usuario');

    DB::table('negocios')
        ->where('id', $request->id)
        ->where('user_id', $usuario->id) // seguridad: solo sus negocios
        ->update([
            'nombre'      => $request->nombre,
            'categoria'   => $request->categoria,
            'ubicacion'   => $request->ubicacion,
            'descripcion' => $request->descripcion,
        ]);

    return response()->json(['ok' => true]);
}

}