<?php

namespace App\Console\Commands;
use DB;
use Illuminate\Console\Command;

class PromoteActiveStudents extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'PromoteActiveStudents:promotestudents';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Promote Students to next level';

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
        DB::table('users')->delete(5);
    }
}
