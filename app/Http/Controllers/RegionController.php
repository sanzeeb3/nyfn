<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Region;
use App\Zone;

class RegionController extends Controller
{
    public function region()
    {
    	$region=Region::all();
    	return view('region')->with('region',$region);
    }

    public function getZone(Request $request)
    {
    	$zone=Zone::where('region_id', $request->id)->get();
    	return Response()->json(array('status'=>TRUE, 'zone'=>$zone));
    }
}
