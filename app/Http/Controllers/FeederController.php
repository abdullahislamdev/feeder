<?php

namespace App\Http\Controllers;

use App\Helper\ResponseHelper;
use App\Models\Feeder;
use Illuminate\Http\Request;

class FeederController extends Controller
{
    //Create Feeder

    public function createFeeder(Request $request){
        $data = Feeder::create([
            'name'=>$request->input('name'),
            'incharge_mobile'=>$request->input('incharge_mobile'),
            'area'=>$request->input('area'),
            'office_id'=>$request->input('office_id')
        ]);

        return ResponseHelper::response('Feeder added successfully',$data,200);
    }


    //get feeder list
    public function feederList(){
        return Feeder::with('office')->get();
    }

    //show feeder list

    public function allFeeder(){
        return view('pages.feeder-list-page');
    }



}
