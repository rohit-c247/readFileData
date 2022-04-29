<?php

namespace App\Http\Controllers;

use App\Jobs\ReadFile;
use App\Imports\ImportFileData;
use Maatwebsite\Excel\Facades\Excel;

class ApiReadFileController extends Controller
{
    public function index()
    {
        //Excel::import(new ImportFileData, public_path() . "/Sample-Spreadsheet-10-rows.xlsx");
        ReadFile::dispatch();
        echo "Done";
    }
}
