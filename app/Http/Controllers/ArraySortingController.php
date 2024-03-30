<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArraySortingController extends Controller
{
    public function index()
    {
        $data['targetIndex']='';
        return view('array_sorting.array_sorting', $data);
    }


    public function save(Request $r)
    {
         

         $data['targetIndex']='';


    $addmoreData = $r->addmore;

    $target_number = $r->target_number;
        
        // Extracting the numbers from the addmore array
        $numbers = array_map(function($item) {
            return $item['number'];
        }, $addmoreData);

        if (count($numbers)>0) {
$isExist = in_array($target_number, $numbers);

if (!$isExist) {

   array_push($numbers, $target_number);


}



 sort($numbers, SORT_NUMERIC);

 $data['targetIndex'] = array_search($target_number, $numbers);


        }





        return view('array_sorting.array_sorting', $data);
    }
}
