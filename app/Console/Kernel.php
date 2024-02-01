<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

use App\Models\Pregrooming;
use Carbon\Carbon;

//use App\Http\Controllers\PregroomingController;

use App\Livewire\Pets\Cita;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->everyMinute()->appendOutputTo("scheduler-output.log");

         $schedule->call(function () {
                
                $now = Carbon::now();
                $pregrooming = Pregrooming::where('created_at', '<=', $now->subMinutes(15))
                      ->orderBy('created_at','DESC')
                      ->first();

                if(empty($pregrooming->user_id)){
                    return;
                }else{
                    $pregrooming_delete = Pregrooming::where('user_id', $pregrooming->user_id );
                    $pregrooming_delete->delete();
                }

        })->everyMinute();
        
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
