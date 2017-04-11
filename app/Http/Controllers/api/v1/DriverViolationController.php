<?php

namespace App\Http\Controllers\api\v1;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Driver;

class DriverViolationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $driverID = DB::table('tblDriver')
                ->select('intDriverID')
                ->where('strDriverLicense', $request->strDriverLicenseNumber)
                ->first();

            $id = DB::table('tblViolationTransactionHeader')->insertGetId([
                'strControlNumber' => $request->strControlNumber,
                'intEnforcerID' => $request->intEnforcerID,
                'intDriverID' => $driverID->intDriverID,
                'strRegistrationSticker' => $request->strRegistrationSticker,
                'strPlateNumber' => $request->strPlateNumber,
                'intVehicleTypeID' => $request->intVehicleTypeID,
                'dblLatitude' => $request->dblLatitude,
                'dblLongitude' => $request->dblLongitude
            ]);

            $violations = $request->violations;
            foreach ($violations as $value) {
                DB::table('tblViolationTransactionDetail')->insert([
                    'intViolationTransactionHeaderID' => $id,
                    'intViolationID' => $value
                ]);
            }

            DB::commit();

            return response()->json([
                'message' => "Driver's Offense Filed.",
                'status code' => '201'
            ]);
        } catch (Exception $e) {
            DB::rollback();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
