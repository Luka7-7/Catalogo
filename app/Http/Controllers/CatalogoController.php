<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CatalogoController extends Controller
{
    public function inicio(Request $request) {
        $categoria = $request->get('categoria');
        $query = DB::table('productos_servicios')
            ->leftJoin(
                'imagenes_productos',
                'productos_servicios.id',
                '=',
                'imagenes_productos.producto_id'
            )
            ->leftJoin(
                'categorias_negocio',
                'productos_servicios.categoria_id',
                '=',
                'categorias_negocio.id'
            )
            ->select(
                'productos_servicios.*',
                'categorias_negocio.nombre_categoria as categoria',
                'imagenes_productos.ruta_imagen'
            );

        // FILTRO POR CATEGORIA
        if ($categoria) {

            $query->where('categorias_negocio.id', $categoria);

        }

        $productos = $query->get();

        // OBTENER CATEGORIAS
        $categorias = DB::table('categorias_negocio')
            ->select('id', 'nombre_categoria')
            ->get();

        return view('home', [
            'productos' => $productos,
            'categorias' => $categorias,
            'categoriaActual' => $categoria
        ]);
    }
    public function mostrarRegistro()
{
    return view('signup');
}
    public function registro(Request $request)
    {
    $request->validate([
        'nombre' => 'required|max:255',
        'correo_electronico' => 'required|email|unique:users,email',
        'contrasena' => 'required|min:6|confirmed'
    ]);

    DB::table('users')->insert([

        'nombre' => $request->nombre,

        'email' => $request->correo_electronico,

        'password' => Hash::make($request->contrasena),

        'email_verified_at' => null,

        'remember_token' => null,

        'esta_eliminado' => 0,

        'created_at' => now(),

        'updated_at' => now()

    ]);

    return redirect()
        ->route('emprendedor.dashboard')
        ->with('success', 'Cuenta creada correctamente');
    }
    public function productos(Request $request){
    $categoria = $request->get('categoria');

    $query = DB::table('productos_servicios')
        ->leftJoin(
            'imagenes_productos',
            'productos_servicios.id',
            '=',
            'imagenes_productos.producto_id'
        )
        ->leftJoin(
            'categorias_negocio',
            'productos_servicios.categoria_id',
            '=',
            'categorias_negocio.id'
        )
        ->select(
            'productos_servicios.*',
            'categorias_negocio.nombre_categoria',
            'imagenes_productos.ruta_imagen'
        )
        ->where('productos_servicios.tipo', 'Producto');

    // FILTRO POR CATEGORIA
    if ($categoria) {

        $query->where(
            'productos_servicios.categoria_id',
            $categoria
        );

    }

    $productos = $query->get();

    // CATEGORIAS
    $categorias = DB::table('categorias_negocio')
        ->select('id', 'nombre_categoria')
        ->get();

    return view('productos', [
        'productos' => $productos,
        'categorias' => $categorias,
        'categoriaActual' => $categoria
    ]);
}

    public function servicios(Request $request)
    {
      $categoria = $request->get('categoria');

    $query = DB::table('productos_servicios')
        ->leftJoin(
            'imagenes_productos',
            'productos_servicios.id',
            '=',
            'imagenes_productos.producto_id'
        )
        ->leftJoin(
            'categorias_negocio',
            'productos_servicios.categoria_id',
            '=',
            'categorias_negocio.id'
        )
        ->select(
            'productos_servicios.*',
            'categorias_negocio.nombre_categoria',
            'imagenes_productos.ruta_imagen'
        )
        ->where('productos_servicios.tipo', 'Servicio');

    // FILTRO POR CATEGORIA
    if ($categoria) {

        $query->where(
            'productos_servicios.categoria_id',
            $categoria
        );

    }

    $productos = $query->get();

    // CATEGORIAS
    $categorias = DB::table('categorias_negocio')
        ->select('id', 'nombre_categoria')
        ->get();

    return view('servicios', [
        'productos' => $productos,
        'categorias' => $categorias,
        'categoriaActual' => $categoria
    ]);
    }
        public function detalleNegocio($id){
        /*
        |--------------------------------------------------------------------------
        | PRODUCTO SELECCIONADO
        |--------------------------------------------------------------------------
        */

        $producto = DB::table('productos_servicios')

            ->where('id', $id)

            ->first();

        if(!$producto){

            abort(404);

        }

        /*
        |--------------------------------------------------------------------------
        | NEGOCIO
        |--------------------------------------------------------------------------
        */

        $negocio = DB::table('negocios')

            ->where('id', $producto->negocio_id)

            ->first();

        /*
        |--------------------------------------------------------------------------
        | PRODUCTOS Y SERVICIOS DEL NEGOCIO
        |--------------------------------------------------------------------------
        */

        $productos = DB::table('productos_servicios')

            ->leftJoin(
                'imagenes_productos',
                'productos_servicios.id',
                '=',
                'imagenes_productos.producto_id'
            )

            ->leftJoin(
                'categorias_negocio',
                'productos_servicios.categoria_id',
                '=',
                'categorias_negocio.id'
            )

            ->select(
                'productos_servicios.*',
                'imagenes_productos.ruta_imagen',
                'categorias_negocio.nombre_categoria'
            )

            ->where(
                'productos_servicios.negocio_id',
                $negocio->id
            )

            ->get();

        return view('negocio', [

            'negocio' => $negocio,

            'productos' => $productos

        ]);
    }

}
