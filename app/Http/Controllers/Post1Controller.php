<?php namespace App\Http\Controllers;

use App\Http\Controllers\controller;
use App\Library\Slimdown;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Validator, Input, Redirect ,DB ,Psy\Util\Json; 
use Illuminate\Http\Response;
class Post1Controller extends Controller {

    public function __construct() {
        parent::__construct();
    }

   
    
            public function searchprincipal(Request $request) {


        if ($request->ajax()) {
            $progress = array();

            $PRINCIPAL_CODE = LTRIM(RTRIM(Input::get('PRINCIPAL_CODE')));
            $PRINCIPAL_NAME = LTRIM(RTRIM(Input::get('PRINCIPAL_NAME')));
            $STATUS = LTRIM(RTRIM(Input::get('STATUS')));
            $limit = Input::get('length1');
            $start = Input::get('start');
            
            
            $_SUBQUERY = "SELECT  * FROM `principal` WHERE 1 ";
          
            if($PRINCIPAL_CODE != ''){
               $_SUBQUERY=$_SUBQUERY.' AND PRINCIPAL_CODE = ' . "'" . $PRINCIPAL_CODE . "'" . ' '; 
            }
            
          if($PRINCIPAL_NAME != ''){
               $_SUBQUERY=$_SUBQUERY.' AND PRINCIPAL_NAME = ' . "'" . $PRINCIPAL_NAME . "'" . ' '; 
            }
            
          if($STATUS != ''){
               $_SUBQUERY=$_SUBQUERY.' AND STATUS = ' . "'" . $STATUS . "'" . ' '; 
            }            
            
            $result_count = DB::select($_SUBQUERY);
            $resultx = DB::select($_SUBQUERY." LIMIT $limit OFFSET $start");
            $totalData = count($result_count);
            $totalFiltered = $totalData;
//
            for ($i = 0; $i < count($resultx); $i++) {
                $one   = $i + 1; 
                $two   = $resultx[$i]->PRINCIPAL_CODE.','.$resultx[$i]->PRINCIPAL_ID;
                $three = $resultx[$i]->PRINCIPAL_NAME;
                $four  = $resultx[$i]->DCO;
                $five  = $resultx[$i]->DOA;
                $six   = $resultx[$i]->STATUS;
                
                  $progress[$i] = array(
                      '1' => $one,
                      '2' => $two,
                      '3' => $three,
                      '4' => $four,
                      '5' => $five,
                      '6' => $six,
                      );
            }


           $json_data = [
                "draw" => intval(Input::get('draw')),
                "recordsTotal" => $totalData,
                "recordsFiltered" => intval($totalFiltered),
                "data" => $progress
           ];
//
//            return json_encode($json_data);
            
             return Response()->json($json_data);
        }
    }
    
    
    
}
    
    
    


