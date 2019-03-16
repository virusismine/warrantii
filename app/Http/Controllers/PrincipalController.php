<?php namespace App\Http\Controllers;

use App\Http\Controllers\controller;
use App\Models\Principal;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Validator, Input, Redirect ,DB; 
use App\Models\Musers;
use App\Models\Account;
use App\Models\orgusers ;
use App\Models\organisation;
use App\Models\Principalclass;

class PrincipalController extends Controller {

	protected $layout = "layouts.main";
	protected $data = array();	
	public $module = 'principal';
	static $per_page	= '10';

	public function __construct()
	{
		
		$this->beforeFilter('csrf', array('on'=>'post'));
		$this->model = new Principal();
		$this->info = $this->model->makeInfo( $this->module);
		$this->access = $this->model->validAccess($this->info['id']);
	
		$this->data = array(
			'pageTitle'	=> 	$this->info['title'],
			'pageNote'	=>  $this->info['note'],
			'pageModule'=> 'principal',
			'return'	=> self::returnUrl()
			
		);
		\App::setLocale(CNF_LANG);
		if (defined('CNF_MULTILANG') && CNF_MULTILANG == '1') {

		$lang = (\Session::get('lang') != "" ? \Session::get('lang') : CNF_LANG);
		\App::setLocale($lang);
		}  

		
	}
   public function create(){
          $city = DB::table('cities')->orderBy('city_name','ASC')->lists('city_name','city_id'); 
            $state = DB::table('state_code_master')->lists('STATE_NAME','STATE_CODE_ID');
            $country = DB::table('country_master')->lists('COUNTRY_NAME','COUNTRY_ID');
      $tp='BRAND';
            
          
       
       $this->data = array(
			'pageTitle'	=> 	'Create Principal',
			'pageNote'	=> '',
			'pageModule'=> 'principal',
			'return'	=> self::returnUrl(),
           'city'=>$city,
           'state'=>$state,
           'country'=>$country,
           'tp'=>$tp	
			
		);
         return view('principal.create',$this->data );
   }    

           public function edit($id) {
             
        $principal = Principal::where('PRINCIPAL_ID','=', $id)->get();
        $principalclass = DB::table('principal_class')->where('PRINCIPAL_ID','=', $principal[0]->PRINCIPAL_ID)->get();
        $city = DB::table('cities')->orderBy('city_name','ASC')->lists('city_name','city_id'); 
        $state = DB::table('state_code_master')->lists('STATE_NAME','STATE_CODE_ID');
        $country = DB::table('country_master')->lists('COUNTRY_NAME','COUNTRY_ID');
        $organization = Organisation::where('ORG_UA_ID','=',$principal[0]->PRINCIPAL_ID)->get();
        $orguser = Orgusers::where('ORG_UA_ID','=',$principal[0]->PRINCIPAL_ID)->get();
        $tbuser = Musers::where('id','=',$orguser[0]->UA_ID)->get();
        $tp='BRAND';
        $principalbrand = Db::table('principal_brand')
                            ->join('brand','brand.BRAND_CODE','=','principal_brand.BRAND_CODE')
                            ->get();
       $brand = Db::table('brand')->get();
        
                        $this->data = array(
			'pageTitle'	=> 'Edit Principal',
			'pageNote'	=> '',
			'pageModule'=> 'principal',
			'return'	=> self::returnUrl(),
                        'principal' =>  $principal,
                        'principalclass' =>  $principalclass,
                        'city' =>  $city,
                        'state' =>  $state,
                        'country' =>  $country,
                        'organization' =>  $organization,
                        'orguser' =>  $orguser,
                        'tbuser' =>  $tbuser,
                        'tp'=>$tp,
                        'principalbrand' => $principalbrand,       
                        'brand' => $brand
		);
        
                return View('principal.edit',$this->data);
    }
   
   
   
        
   public function store( Request $request) {
        $rules = array(
        );
        //  print_r(Input::all());exit();
        $validator = Validator::make($data = Input::all(), $rules);
    
        if ($validator->fails()) {
            
            
            return Redirect::back()->withErrors($validator)->withInput();
        } else {
            DB::beginTransaction();
//           try {
//                  creating object
            
            $user = Musers:: where('id', '=',\Session::get('uid'))->get();
          //  print_r($user);exit();
            if(Input::get('PRODUCT_TRACING') == 'on')
            {
                $pt = 'T';
            }
            else{
                $pt = 'F';
            }
            
            if(Input::get('ORDER_COLLABORATION') == 'on')
            {
                $oc = 'T';
            }
            else{
                $oc = 'F';
            }           
            
            
            $detail9 = Musers:: where('email', '=', Input::get('email'))->get();
          
            
            
            
            if (count($detail9) == 0) {
                
             $max_account= Account::max('ACCOUNT') + 1;
              // Insert Account
              if($request->input('page_type') == 'BRAND'){
                    $st='PRINCIPAL' ;
                  }else  if($request->input('page_type') == 'INSURER'){
                   $st='INSURER' ;
                  }
             
                 Account::insert([[
                   'ACCOUNT' => $max_account,
                   'ACCOUNT_TYPE' => $st,
                   'STATUS' => 1,  
                   'UCO' => \Session::get('uid'),   
               ],
              [
                   'ACCOUNT' => $max_account,
                   'ACCOUNT_TYPE' => 'ORGANISATION',
                   'STATUS' => 1,  
                   'UCO' => \Session::get('uid'),   
               ],
                [
                   'ACCOUNT' => $max_account,
                   'ACCOUNT_TYPE' => 'ADMINUSER',
                   'STATUS' => 1,  
                   'UCO' => \Session::get('uid'),   
               ]] );   
       // Insert Principal
       Principal::insert([
                   'PRINCIPAL_ID' => $max_account,
                   'PRINCIPAL_NAME' => $request->input('ORG_NAME'),
                   'PRINCIPAL_CODE' => $request->input('ORG_CODE'), 
            'OWNER_TYPE' => $request->input('page_type'), 
                   'ORDER_COLLABORATION' => $oc,   
                 'PRODUCT_TRACING' => $pt,  
                 'STATUS' => 'N',   
                 'UCO' => \Session::get('uid'),   
               ]);  
       
       //insert organisation
       Organisation::insert([
                   'ORG_UA_ID' => $max_account,
                   'ORG_TYPE' => $request->input('ORG_TYPE'),
                   'ORG_NAME' => $request->input('ORG_NAME'),
             'ORG_CODE' => $request->input('ORG_CODE'),
           'ORG_EMAIL_ADDRESS' => $request->input('ORG_EMAIL_ADDRESS'),
           'ORG_ADDR_HOUSE_NO' => $request->input('ORG_ADDR_HOUSE_NO'),
           'ORG_ADDR_CITYOVI' => $request->input('ORG_ADDR_CITYOVI'),
           'ORG_ADDR_DIST' => $request->input('ORG_ADDR_DIST'),
           'ORG_ADDR_LOCALITY' => $request->input('ORG_ADDR_LOCALITY'),
           'ORG_ADDR_STATE' => $request->input('ORG_ADDR_STATE'),
           'ORG_ADDR_COUNTRY' => $request->input('ORG_ADDR_COUNTRY'),
           'ORG_ADDR_PIN' => $request->input('ORG_ADDR_PIN'),
           'ORG_PHONE_MOBILE' => $request->input('ORG_PHONE_MOBILE'),
           'ORG_SUPERUSER' =>'',
                 'UCO' => \Session::get('uid'),   
               ]);  
          
          Musers::insert([
                   'id' => $max_account,
                   'group_id' => '3',
                   'active' => 0,
             'username' => $request->input('first_name').' '.$request->input('middle_name').' '.$request->input('last_name'),
           'first_name' => $request->input('first_name'),
           'middle_name' => $request->input('middle_name'),
           'last_name' => $request->input('last_name'),
           'dob' => date("Y-m-d", strtotime(Input::get('dob'))),
           'gender' => $request->input('gender'),
           'email' => $request->input('email'),
           'password' => \Hash::make(Input::get('password')),
           'addr_house_no' => $request->input('addr_house_no'),
           'addr_pin' => $request->input('addr_pin'),
           'phone_mobile' => $request->input('phone_mobile'),
               'addr_locality' => $request->input('addr_locality'),
               'addr_citovi' => $request->input('addr_citovi'),
               'addr_district' => $request->input('addr_district'),
               'addr_state' => $request->input('addr_state'),
               'addr_country' => $request->input('addr_country'),
                 'UCO' => \Session::get('uid'),   
               ]); 
          
            Orgusers::insert([
                   'ORG_UA_ID' => $max_account,
                   'UA_ID' => $max_account,
                   'LOCATION_CODE' => $request->input('LOCATION_CODE'),
             'ACCESS_TYPE' => $request->input('ACCESS_TYPE'),
           'USER_CODE' => $request->input('USER_CODE'),
           'DEPARTMENT' => $request->input('DEPARTMENT'),
           'COUNTRY_CODE' => $request->input('ORG_ADDR_CITYOVI'),
           'STATUS' => 'N',
                 'UCO' => \Session::get('uid'),   
               ]);   
            
             Principalclass::insert([
                   'PRINCIPAL_ID' => $max_account,
                   'PC_CODE' => $request->input('PC_CODE'),
                   'PC_NAME' => $request->input('PC_NAME'),
             'PC_DESCRIPTION' => $request->input('PC_DESCRIPTION'),
           'PC_LEVEL' =>0,
           'INCENTIVIZE' => 'NO',
           'LINE_STATUS' => 'N',
           'ENTITY_COUNT' => '1',
                 'UCO' => \Session::get('uid'),
                  'ORGANIZATION' => 'Y',
               ]);        
               
          //   print_r($request->input('page_type'));exit();
             
        if($request->input('page_type') == 'BRAND'){
          
            $getBrand= \App\Models\brand::where('BRAND_CODE',$request->input('ORG_CODE'))->get();
            if(count($getBrand) == 0){
                \App\Models\brand::insert([
                   'BRAND_CODE' =>  $request->input('ORG_CODE1'),
                   'BRAND_NAME' => $request->input('ORG_NAME1'),
                 'UCO' => \Session::get('uid'),
                
               ]);  
             DB::table('principal_brand')->insert([
                   'BRAND_CODE' =>  $request->input('ORG_CODE1'),
                   'PRINCIPAL_ID' =>$max_account,
                 'UCO' => \Session::get('uid'),
                
               ]);   
                
                
            }
            
        }else  if($request->input('page_type') == 'INSURER'){
             DB::table('insurer')->insert([
                   'INSURER_NAME' =>  $request->input('ORG_NAME1'),
                 'INSURER_CODE' =>  $request->input('ORG_CODE1'),
                   'INSURER_ID' =>$max_account,
                 'UCO' => \Session::get('uid'),
                
               ]);   
        }        
                
                

             DB::commit();
             } else {
                  if($request->input('page_type') == 'BRAND'){
                       return Redirect::to('principal/create')->with('message', \SiteHelpers::alert('error', 'This Principal Already Exists'));
                  }else  if($request->input('page_type') == 'INSURER'){
                     return Redirect::to('insurer/create')->with('message', \SiteHelpers::alert('error', 'This Insurer Already Exists'));  
                  }
                 
               
            }
             
             
             
//            } catch (Exception $e) {
//                DB::rollback();
//                Session::flash('message', SiteHelpers::alert('error', 'Something Went Wrong'));
//                return Redirect::to('saleinvoice/create');
//            }
        }
         if($request->input('page_type') == 'BRAND'){
                       return Redirect::to('principal')->with('message', \SiteHelpers::alert('success', \Lang::get('core.note_success')));
                  }else  if($request->input('page_type') == 'INSURER'){
                    return Redirect::to('insurer')->with('message', \SiteHelpers::alert('success', \Lang::get('core.note_success')));
                  }
       
    }     
   
        
        
        

	public function index( Request $request )
	{
		$sort = (!is_null($request->input('sort')) ? $request->input('sort') : ''); 
		$order = (!is_null($request->input('order')) ? $request->input('order') : 'asc');
		// End Filter sort and order for query 
		// Filter Search for query		
		$filter = (!is_null($request->input('search')) ? '': '');

		
		$page = $request->input('page', 1);
                
		$params = array(
			'page'		=> $page ,
			'limit'		=> (!is_null($request->input('rows')) ? filter_var($request->input('rows'),FILTER_VALIDATE_INT) : static::$per_page ) ,
			'sort'		=> $sort ,
			'order'		=> $order,
			'params'	=> $filter,
			'global'	=> (isset($this->access['is_global']) ? $this->access['is_global'] : 0 )
		);
       
		// Get Query 
		$results = $this->model->getRows( $params );		
		
		// Build pagination setting
		$page = $page >= 1 && filter_var($page, FILTER_VALIDATE_INT) !== false ? $page : 1;	
		$pagination = new Paginator($results['rows'], $results['total'], $params['limit']);	
		$pagination->setPath('principal');
		
		$this->data['rowData']		= $results['rows'];
		// Build Pagination 
		$this->data['pagination']	= $pagination;
		// Build pager number and append current param GET
		$this->data['pager'] 		= $this->injectPaginate();	
		// Row grid Number 
		$this->data['i']			= ($page * $params['limit'])- $params['limit']; 
		// Grid Configuration 
		$this->data['tableGrid'] 	= $this->info['config']['grid'];
		$this->data['tableForm'] 	= $this->info['config']['forms'];
		$this->data['colspan'] 		= \SiteHelpers::viewColSpan($this->info['config']['grid']);		
		// Group users permission
		$this->data['access']		= $this->access;
		// Detail from master if any
		
		// Master detail link if any 
		$this->data['subgrid']	= (isset($this->info['config']['subgrid']) ? $this->info['config']['subgrid'] : array()); 
		// Render into template
                
              //  print_r($this->data);exit();
		return view('principal.index',$this->data);
	}	

}