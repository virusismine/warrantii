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

          public function searchlocation(Request $request) {

            if ($request->ajax()) {
            $progress = array();

            $LOCATION_CODE = LTRIM(RTRIM(Input::get('LOCATION_CODE')));
            $LOCATION_NAME = LTRIM(RTRIM(Input::get('LOCATION_NAME')));
            $LOCATION_TYPE = Input::get('LOCATION_TYPE');
            $STATUS =Input::get('STATUS');
            $limit = Input::get('length1');
            $start = Input::get('start');
             $IDS=\Session::get('pid');
            
            $_SUBQUERY = 'SELECT * FROM org_location WHERE ORG_UA_ID = ' . "'" . $IDS . "'" . '';  
          
            if($LOCATION_CODE != ''){
               $_SUBQUERY=$_SUBQUERY.' AND LOCATION_CODE = ' . "'" . $LOCATION_CODE . "'" . ' '; 
            }
            
            if($LOCATION_NAME != ''){
               $_SUBQUERY=$_SUBQUERY.' AND LOCATION_NAME = ' . "'" . $LOCATION_NAME . "'" . ' '; 
            }           
            
            if($LOCATION_TYPE != ''){
               $_SUBQUERY=$_SUBQUERY.' AND LOCATION_TYPE = ' . "'" . $LOCATION_TYPE . "'" . ' '; 
            } 
            
            if($STATUS != ''){
               $_SUBQUERY=$_SUBQUERY.' AND STATUS = ' . "'" . $STATUS . "'" . ' '; 
            } 
            
            $result_count = DB::select($_SUBQUERY);
            $resultx = DB::select($_SUBQUERY." LIMIT $limit OFFSET $start");
            $totalData = count($result_count);
            $totalFiltered = $totalData;

            for ($i = 0; $i < count($resultx); $i++){
                $one   = $i + $start + 1; 
                $two   = $resultx[$i]->LOCATION_CODE.','.$resultx[$i]->ORG_UA_ID;
                $three = $resultx[$i]->LOCATION_NAME;
                $four = $resultx[$i]->LOCATION_TYPE;
                $five = $resultx[$i]->DOA;
                $six = $resultx[$i]->STATUS;

                
                  $progress[$i] = array(
                      '1' => $one,
                      '2' => $two,
                      '3' => $three,
                      '4' => $four,
                      '5' => $five,
                      '6' => $six,
                      );
            }

           $json_data = array(
                "draw" => intval(Input::get('draw')),
                "recordsTotal" => $totalData,
                "recordsFiltered" => intval($totalFiltered),
                "data" => $progress
            );

            return Response()->json($json_data);
        }
    }
    
    
    
    
   
   public function searchPrincipalUsers(Request $request) {
//        print_r("arun");exit();


        if ($request->ajax()) {
            $progress = array();

            $USER_CODE = LTRIM(RTRIM(Input::get('USER_CODE')));
            $USER_NAME = LTRIM(RTRIM(Input::get('USER_NAME')));
             $STATUS = LTRIM(RTRIM(Input::get('STATUS')));
              $EMAIL = LTRIM(RTRIM(Input::get('EMAIL')));
               $COUNTRY = LTRIM(RTRIM(Input::get('COUNTRY')));
            $limit = Input::get('length1');
            $start = Input::get('start');
            $IDS=\Session::get('pid');
//           $user = Users:: where('id', '=',Session::get('uid'))->get();
//                $org = DB::table('org_users')->where('UA_ID', Session::get('uid'))->get();
//                $resultx['rows'] = DB::table('org_users')->where('ORG_UA_ID', $org[0]->ORG_UA_ID)->get();  
            $_SUBQUERY = 'SELECT  * FROM `org_users` WHERE ORG_UA_ID = ' . "'" . $IDS . "'" . '';
          
            if($USER_CODE != ''){
               $_SUBQUERY=$_SUBQUERY.' AND USER_CODE = ' . "'" . $USER_CODE . "'" . ' '; 
            }
//            
          if($EMAIL != ''){
              $getemail=   DB::table('tb_users')->where('email','=',$EMAIL)->get();
                if(count($getemail)!=0){
               $_SUBQUERY=$_SUBQUERY.' AND UA_ID = ' . "'" . $getemail[0]->id . "'" . ' '; 
                }
            }
            
             if($STATUS != ''){
               $_SUBQUERY=$_SUBQUERY.' AND STATUS = ' . "'" . $STATUS . "'" . ' '; 
            }
             if($COUNTRY != ''){
                  $getcntry= DB::table('country_master')->where('COUNTRY_NAME','=',$COUNTRY)->get();
                 if(count($getcntry)!=0){
               $_SUBQUERY=$_SUBQUERY.' AND COUNTRY_CODE = ' . "'" . $getcntry[0]->COUNTRY_ID . "'" . ' '; 
                 }
            }
            
            $result_count = DB::select($_SUBQUERY);
            $resultx = DB::select($_SUBQUERY." LIMIT $limit OFFSET $start");
            $totalData = count($result_count);
            $totalFiltered = $totalData;

            for ($i = 0; $i < count($resultx); $i++) {
              $xc=   DB::table('tb_users')->where('id','=',$resultx[$i]->UA_ID)->get();
              $xc1= DB::table('country_master')->where('COUNTRY_ID','=',$resultx[$i]->COUNTRY_CODE)->get();
                             
                $one =$i + $start + 1; 
                $two = $resultx[$i]->USER_CODE.'-'.$resultx[$i]->UA_ID.','.$resultx[$i]->ORG_UA_ID;
                $three =$xc[0]->username;
               $four=$xc[0]->email;
               $five=$xc1[0]->COUNTRY_NAME;
                $six=$resultx[$i]->STATUS;
                
                  $progress[$i] = array('1' => $one,
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
    
    
    
    public function allPosts(Request $request) {
//        print_r("arun");exit();


           if ($request->ajax()) {
            $progress = array();

            $BRAND_CODE = LTRIM(RTRIM(Input::get('BRAND_CODE')));
            $BRAND_NAME = LTRIM(RTRIM(Input::get('BRAND_NAME')));
            $limit = Input::get('length1');
            $start = Input::get('start');
            
            
            $_SUBQUERY = "SELECT  * FROM `brand` WHERE 1 ";
          
            if($BRAND_CODE != ''){
               $_SUBQUERY=$_SUBQUERY.' AND BRAND_CODE = ' . "'" . $BRAND_CODE . "'" . ' '; 
            }
            
          if($BRAND_NAME != ''){
               $_SUBQUERY=$_SUBQUERY.' AND BRAND_NAME = ' . "'" . $BRAND_NAME . "'" . ' '; 
            }
            
            $result_count = DB::select($_SUBQUERY);
            $resultx = DB::select($_SUBQUERY." LIMIT $limit OFFSET $start");
            $totalData = count($result_count);
            $totalFiltered = $totalData;

            for ($i = 0; $i < count($resultx); $i++) {
                $one =$i + $start + 1; 
                $two = $resultx[$i]->BRAND_CODE;
                $three =$resultx[$i]->BRAND_NAME;
                $four=$resultx[$i]->STATUS;
                
                  $progress[$i] = array('1' => $one,
                    '2' => $two,
                    '3' => $three,
                      '4' => $four,
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
    
    
        public function searchcategory(Request $request) {
//        print_r("arun");exit();


             if ($request->ajax()) {
            $progress = array();

            $CATEGORY_CODE = LTRIM(RTRIM(Input::get('CATEGORY_CODE')));
            $CATEGORY_NAME = LTRIM(RTRIM(Input::get('CATEGORY_NAME')));
            $PARENT_CATEGORY_CODE = LTRIM(RTRIM(Input::get('PARENT_CATEGORY_CODE')));
            $limit = Input::get('length1');
            $start = Input::get('start');
            
            
            $_SUBQUERY = "SELECT  * FROM `category` WHERE 1 ";
          
            if($CATEGORY_CODE != ''){
               $_SUBQUERY=$_SUBQUERY.' AND CATEGORY_CODE = ' . "'" . $CATEGORY_CODE . "'" . ' '; 
            }
            
          if($CATEGORY_NAME != ''){
               $_SUBQUERY=$_SUBQUERY.' AND CATEGORY_NAME = ' . "'" . $CATEGORY_NAME . "'" . ' '; 
            }
            
          if($PARENT_CATEGORY_CODE != ''){
               $_SUBQUERY=$_SUBQUERY.' AND PARENT_CATEGORY_CODE = ' . "'" . $PARENT_CATEGORY_CODE . "'" . ' '; 
            }            
            
            $result_count = DB::select($_SUBQUERY);
            $resultx = DB::select($_SUBQUERY." LIMIT $limit OFFSET $start");
            $totalData = count($result_count);
            $totalFiltered = $totalData;

            for ($i = 0; $i < count($resultx); $i++) {
                $one   = $i + $start + 1; 
                $two   = $resultx[$i]->CATEGORY_CODE;
                $three = $resultx[$i]->CATEGORY_NAME;
                $four  = $resultx[$i]->PARENT_CATEGORY_CODE;
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
    
    
            public function searchprincipal(Request $request) {


        if ($request->ajax()) {
            $progress = array();

            $PRINCIPAL_CODE = LTRIM(RTRIM(Input::get('PRINCIPAL_CODE')));
            $PRINCIPAL_NAME = LTRIM(RTRIM(Input::get('PRINCIPAL_NAME')));
            $STATUS = LTRIM(RTRIM(Input::get('STATUS')));
            $limit = Input::get('length1');
            $start = Input::get('start');
            $TP = Input::get('page_type');
           
            $_SUBQUERY = 'SELECT  * FROM `principal` WHERE OWNER_TYPE = ' . "'" . $TP . "'" . ' ';
          
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
    
    
    
            public function searchproduct(Request $request) {


            if ($request->ajax()) {
            $progress = array();

            $PRODUCT_CODE = LTRIM(RTRIM(Input::get('PRODUCT_CODE')));
            $PRODUCT_NAME = LTRIM(RTRIM(Input::get('PRODUCT_NAME')));
            $BRAND_CODE = LTRIM(RTRIM(Input::get('BRAND_CODE')));
            $CATEGORY_CODE = LTRIM(RTRIM(Input::get('CATEGORY_CODE')));
            $YEAR_LAUNCH = LTRIM(RTRIM(Input::get('YEAR_LAUNCH')));
            $STATUS = Input::get('STATUS');
            $limit = Input::get('length1');
            $start = Input::get('start');
            
            $_SUBQUERY = 'SELECT  * FROM `principal_product` WHERE PRINCIPAL_ID =  3 ';
          
           if($PRODUCT_CODE != ''){
               $_SUBQUERY=$_SUBQUERY.' AND PRODUCT_CODE = ' . "'" . $PRODUCT_CODE . "'" . ' '; 
            }
            
           if($PRODUCT_NAME != ''){
               $_SUBQUERY=$_SUBQUERY.' AND PRODUCT_NAME = ' . "'" . $PRODUCT_NAME . "'" . ' '; 
            }
            
          if($BRAND_CODE != ''){
               $_SUBQUERY=$_SUBQUERY.' AND BRAND_CODE = ' . "'" . $BRAND_CODE . "'" . ' '; 
            }
            
          if($CATEGORY_CODE != ''){
               $_SUBQUERY=$_SUBQUERY.' AND CATEGORY_CODE = ' . "'" . $CATEGORY_CODE . "'" . ' '; 
            }            
            
          if($YEAR_LAUNCH != ''){
               $_SUBQUERY=$_SUBQUERY.' AND  YEAR_OF_LAUNCH = ' . "'" . $YEAR_LAUNCH . "'" . ' '; 
            }            
            

            
            
            
            $result_count = DB::select($_SUBQUERY);
            $resultx = DB::select($_SUBQUERY." LIMIT $limit OFFSET $start");
            $totalData = count($result_count);
            $totalFiltered = $totalData;
//
            for ($i = 0; $i < count($resultx); $i++) {
                $one   = $i + 1; 
                $two   = $resultx[$i]->PRODUCT_CODE.','.$resultx[$i]->PRINCIPAL_PRODUCT_ID;
                $three = $resultx[$i]->PRODUCT_NAME;
                $four  = $resultx[$i]->BRAND_CODE;
                $five  = $resultx[$i]->CATEGORY_CODE;
                $six  = $resultx[$i]->MODEL_NUMBER;
                $seven  = $resultx[$i]->YEAR_OF_LAUNCH;
                $eight  = $resultx[$i]->PRODUCT_MEASURING_UNIT;
                $nine  = $resultx[$i]->PRODUCT_UNIT_PRICE;
                $ten  = $resultx[$i]->DISCOUNT;
                $eleven  = $resultx[$i]->SHIPPING_TYPE;
                $twelve  = $resultx[$i]->PRODUCT_TRACE;
                $thirteen  = $resultx[$i]->DOA;
                $forteen   = $resultx[$i]->STATUS;
                
                  $progress[$i] = array(
                      '1' => $one,
                      '2' => $two,
                      '3' => $three,
                      '4' => $four,
                      '5' => $five,
                      '6' => $six,
                      '7' => $seven,
                      '8' => $eight,
                      '9' => $nine,
                      '10' => $ten,
                      '11' => $eleven,
                      '12' => $twelve,
                      '13' => $thirteen,
                      '14' => $forteen,
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
    
                public function searchprincipalpartner(Request $request) {


            if ($request->ajax()) {
            $progress = array();

            $PARTNER_CODE = LTRIM(RTRIM(Input::get('PARTNER_CODE')));
            $PARTNER_NAME = LTRIM(RTRIM(Input::get('PARTNER_NAME')));
            $LOCATION_CODE = LTRIM(RTRIM(Input::get('LOCATION_CODE')));
            $PARTNER_MOBILE = LTRIM(RTRIM(Input::get('PARTNER_MOBILE')));
            $YEAR_LAUNCH = LTRIM(RTRIM(Input::get('YEAR_LAUNCH')));
            $STATUS = Input::get('STATUS');
            $limit = Input::get('length1');
            $start = Input::get('start');
            $TP = Input::get('page_type');
            
            $_SUBQUERY = 'SELECT  * FROM `principal_partner`  WHERE PARTNER_TYPE = ' . "'" . $TP . "'" . ' ';
          
           if($PARTNER_CODE != ''){
               $_SUBQUERY=$_SUBQUERY.' AND PARTNER_CODE = ' . "'" . $PARTNER_CODE . "'" . ' '; 
            }
            
           if($PARTNER_NAME != ''){
               $_SUBQUERY=$_SUBQUERY.' AND PARTNER_NAME = ' . "'" . $PARTNER_NAME . "'" . ' '; 
            }
            
          if($LOCATION_CODE != ''){
               $_SUBQUERY=$_SUBQUERY.' AND LOCATION_CODE = ' . "'" . $LOCATION_CODE . "'" . ' '; 
            }
             $_SUBQUERY=$_SUBQUERY.' AND PRINCIPAL_ID = ' . "'" . 3 . "'" . ' '; 
            
            
//          if($PARTNER_EMAIL != ''){
//               $_SUBQUERY=$_SUBQUERY.' AND PARTNER_EMAIL = ' . "'" . $PARTNER_EMAIL . "'" . ' '; 
//            }            
//            
//          if($STATUS != ''){
//               $_SUBQUERY=$_SUBQUERY.' AND  STATUS = ' . "'" . $STATUS . "'" . ' '; 
//            }            
            
            
            $result_count = DB::select($_SUBQUERY);
            $resultx = DB::select($_SUBQUERY." LIMIT $limit OFFSET $start");
            $totalData = count($result_count);
            $totalFiltered = $totalData;
//
            for ($i = 0; $i < count($resultx); $i++) {
                $one   = $i + 1; 
                $two   = $resultx[$i]->PARTNER_CODE.','.$resultx[$i]->PARTNER_ID;
                $three = $resultx[$i]->PARTNER_NAME;
                $four  = $resultx[$i]->LOCATION_CODE;
                $five  = $resultx[$i]->PARTNER_MOBILE;
                $six  = $resultx[$i]->PARTNER_EMAIL;
                $seven  = $resultx[$i]->DOA;
                $eight   = $resultx[$i]->STATUS;
                
                  $progress[$i] = array(
                      '1' => $one,
                      '2' => $two,
                      '3' => $three,
                      '4' => $four,
                      '5' => $five,
                      '6' => $six,
                      '7' => $seven,
                      '8' => $eight,
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
    
    
    


