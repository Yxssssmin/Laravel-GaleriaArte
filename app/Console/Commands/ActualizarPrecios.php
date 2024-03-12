<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ActualizarPrecios extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:actualizar-precios';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Actualizar precios cada 12 horas';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
    }
}
