<?php

namespace App\Http\Controllers;

use App\Jobs\ReadFile;
use App\Imports\ImportFileData;
use Maatwebsite\Excel\Facades\Excel;

class ApiReadFileController extends Controller
{
    public function index()
    {
        ReadFile::dispatch();
        echo "Done";
    }
}
