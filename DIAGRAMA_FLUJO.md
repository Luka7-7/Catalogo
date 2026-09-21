```mermaid
graph TD
    %% Diagrama de Flujo Automático MVC
    classDef controlador fill:#f9f,stroke:#333,stroke-width:2px;

    /"_debugbar/open" -->|GET|HEAD| Fruitcake\LaravelDebugbar\Controllers\OpenHandlerController@handle:::controlador
    /"_debugbar/cache/{key}" -->|DELETE| Fruitcake\LaravelDebugbar\Controllers\CacheController@delete:::controlador
    /"_debugbar/queries/explain" -->|POST| Fruitcake\LaravelDebugbar\Controllers\QueriesController@explain:::controlador
    /"_debugbar/clockwork/{id}" -->|GET|HEAD| Fruitcake\LaravelDebugbar\Controllers\OpenHandlerController@clockwork:::controlador
    /"_debugbar/assets" -->|GET|HEAD| Fruitcake\LaravelDebugbar\Controllers\AssetController@getAssets:::controlador
    /"/" -->|GET|HEAD| CatalogoController@inicio:::controlador
    /"catalogo/productos" -->|GET|HEAD| CatalogoController@productos:::controlador
    /"catalogo/servicios" -->|GET|HEAD| CatalogoController@servicios:::controlador
    /"catalogo/registro" -->|GET|HEAD| CatalogoController@mostrarRegistro:::controlador
    /"catalogo/registro" -->|POST| CatalogoController@registro:::controlador
    /"catalogo/detalle-negocio/{id}" -->|GET|HEAD| CatalogoController@detalleNegocio:::controlador
    /"emprendedor/login" -->|GET|HEAD| EmprendedorController@login:::controlador
    /"emprendedor/login" -->|POST| EmprendedorController@autenticar:::controlador
    /"emprendedor/logout" -->|POST| EmprendedorController@logout:::controlador
    /"emprendedor/dashboard" -->|GET|HEAD| EmprendedorController@dashboard:::controlador
    /"emprendedor/mi-perfil" -->|GET|HEAD| EmprendedorController@miPerfil:::controlador
    /"emprendedor/crear-nuevo" -->|GET|HEAD| EmprendedorController@crearNuevo:::controlador
    /"emprendedor/guardar-producto" -->|POST| EmprendedorController@guardarProducto:::controlador
    /"emprendedor/editar-producto/{id}" -->|GET|HEAD| EmprendedorController@editarProducto:::controlador
    /"emprendedor/actualizar-producto/{id}" -->|POST| EmprendedorController@actualizarProducto:::controlador
    /"emprendedor/eliminar-producto/{id}" -->|POST| EmprendedorController@eliminarProducto:::controlador
    /"emprendedor/actualizar-perfil" -->|POST| EmprendedorController@actualizarPerfil:::controlador
    /"emprendedor/actualizar-redes" -->|POST| EmprendedorController@actualizarRedes:::controlador
    /"emprendedor/actualizar-password" -->|POST| EmprendedorController@actualizarPassword:::controlador
    /"emprendedor/actualizar-negocio" -->|POST| EmprendedorController@actualizarNegocio:::controlador
```
