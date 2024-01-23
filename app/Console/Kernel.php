<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // everyFiveMinutes
        $schedule->command('plant-compaines:cron')
                  ->everyFiveMinutes();
                  
        $schedule->command('plant-company-enquiry:cron')
                  ->everyTenMinutes();
                  
        $schedule->command('package-company:cron')
                  ->everyTenMinutes();
                  
        $schedule->command('package-company-enquiry:cron')
                  ->daily();
                  
        $schedule->command('pulp-company:cron')
                  ->everyFiveMinutes();
                  
         $schedule->command('pulp-company-enquiry:cron')
                  ->daily();
                  
        $schedule->command('steel-company:cron')
                  ->everyMinute();
                  
        $schedule->command('steel-company-enquiry:cron')
                  ->daily();
                  
        $schedule->command('defence-company:cron')
                  ->everyFiveMinutes();
                  
         $schedule->command('defence-company-enquiry:cron')
                  ->daily();
                  
        $schedule->command('pharmatech-compaines:cron')
                  ->everyTenMinutes();
                  
        $schedule->command('automotive-compaines:cron')
                  ->hourly();
                  
        $schedule->command('hospials-compaines:cron')
                  ->hourly();
                  
        $schedule->command('sports-compaines:cron')
                  ->hourly();
                  
        $schedule->command('plastic-compaines:cron')
                  ->hourly();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
