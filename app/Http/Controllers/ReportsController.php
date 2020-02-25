<?php

namespace App\Http\Controllers;

use App\Jobs\CompileReports;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    /**
     *
     */
    public function index(){
        $job= new CompileReports(1);

        $this->dispatchNow($job);
      dd('done');
    }
}
