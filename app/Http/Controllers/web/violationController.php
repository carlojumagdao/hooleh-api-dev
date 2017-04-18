<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Violation;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use DB;

class violationController extends Controller
{
    public function index()
    {

        $now = Carbon::now()->addHours(8);
        $violations = DB::table('tblViolation')
            ->join('tblViolationFee', 'tblViolation.intViolationID', '=', 'tblViolationFee.intViolationID')
            ->where([
                ['tblViolationFee.datStartDate', '<=', $now],
                ['tblViolationFee.datEndDate', '>=', $now]
            ])
            ->select('tblViolation.*', 'tblViolationFee.dblPrice')
            ->orderBy('tblViolation.strViolationDescription', 'asc')
            ->get();

        return view('violation.index', ['violations' => $violations]);
    }
}
