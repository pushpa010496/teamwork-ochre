<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\Jobs\CompanyController;
use Log;

class PlasticCompanyCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'plastic-compaines:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'get the plastcs compaines insert into database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $company = new CompanyController();
        if($company->insertPlasticsCompaines()){
            Log::info('plastic Compaines inserted successfully');
        }
    }
}
