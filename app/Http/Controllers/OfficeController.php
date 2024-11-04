<?php

namespace App\Http\Controllers;

use App\Helper\ResponseHelper;
use App\Models\Office;
use Illuminate\Http\Request;

class OfficeController extends Controller
{
    //Create Office

    public function createOffice(Request $request)
        {
            $data = Office::create([
                'code'=>$request->input('code'),
                'name'=>$request->input('name'),
                'address'=>$request->input('address'),
                'xen_mobile'=>$request->input('xen_mobile'),
                'one_stop_mobile'=>$request->input('one_stop_mobile'),
                'one_stop_phone'=>$request->input('one_stop_phone')
            ]);

            return ResponseHelper::response('Office add successfully',$data,200);
        }

        //Office List

        public function officeList(){
            return Office::all();
        }

        //Office list page

        public function officePage(){
            return view('pages.office-page');
        }
}
