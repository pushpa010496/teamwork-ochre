<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\Jobs\CompanyController;

class DefenceCompanyEnquiryCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'defence-company-enquiry:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update the Package company enquires  into database';

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
        if($company->updateDefenceCompanyEnquires()){
            Log::info('Compaines Enquires Updated successfully');
        }
    }
}
