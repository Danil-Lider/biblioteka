<?php

namespace App\Http\Controllers\New;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\order_books as model;

class GetFreeTimeForOrderMainController extends Controller
{
    public function index(Request $request)
    {   

        $date_from_request = $request->year . '-' . $request->month . '-' . $request->day;

        $data = model::where('date_main', $date_from_request)->get();

        // dd($data);

        if($data){
            foreach($data as $key => $item){
                $hours_blocked[] = $item->hour;
            }
        }

       

        $hours_all = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24];

        if(isset($hours_blocked)){

            $res = array_merge(array_diff($hours_all,$hours_blocked),array_diff($hours_blocked,$hours_all));

        }else{
            $res = $hours_all;
        }
        // dd($res);


        echo json_encode($res);

        exit;
  
    }

}
