<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;

class GenerarFlujoMermaid extends Command
{
    // El comando que escribirás en la consola
    protected $signature = 'flujo:mermaid';
    protected $description = 'Genera un diagrama de flujo automático del sitio en formato Mermaid.md';

    public function handle()
    {
        $rutas = Route::getRoutes();
        
        $contenido = "```mermaid\n";
        $contenido .= "graph TD\n";
        $contenido .= "    %% Diagrama de Flujo Automático MVC\n";
        $contenido .= "    classDef controlador fill:#f9f,stroke:#333,stroke-width:2px;\n\n";

        foreach ($rutas as $ruta) {
            $url = $ruta->uri();
            $metodo = implode('|', $ruta->methods());
            $accion = $ruta->getActionName();

            // Ignoramos rutas de sistema o de paquetes internos para limpiar el diagrama
            if (str_contains($url, '_ignition') || str_contains($url, 'sanctum') || str_contains($accion, 'Closure')) {
                continue;
            }

            // Limpiamos el nombre del controlador para que se vea estético
            $controladorCorto = str_replace('App\\Http\\Controllers\\', '', $accion);

            // Creamos la conexión visual en Mermaid: Ruta --> Controlador
            $contenido .= "    /\"{$url}\" -->|{$metodo}| {$controladorCorto}:::controlador\n";
        }

        $contenido .= "```\n";

        // Guardamos el archivo en la raíz del proyecto
        File::put(base_path('DIAGRAMA_FLUJO.md'), $contenido);

        $this->info('¡Listo! Tu diagrama automático se ha guardado en DIAGRAMA_FLUJO.md');
    }
}