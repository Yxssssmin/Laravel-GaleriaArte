<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
        
        $schedule->call(function () {
            // Coloca aquí la lógica para obtener y actualizar la tasa de cambio en la base de datos
            // Utiliza la misma lógica que tenías en el controlador para obtener la tasa de cambio
            // y actualiza la base de datos según sea necesario
        })->twiceDaily(0, 12); // Ejecuta la tarea cada 12 horas

    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
