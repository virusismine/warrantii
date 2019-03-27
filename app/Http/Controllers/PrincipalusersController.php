<?php namespace App\Http\Controllers;

use App\Http\Controllers\controller;
use App\Models\Principalusers;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Validator, Input, Redirect ,DB; 
use App\Models\Musers;
use App\Models\Account;
use App\Models\orgusers;
use App\Models\organisation;
use App\Models\Principalclass;

class PrincipalusersController extends Controller {

	protected $layout = "layouts.main";
	protected $data = array();	
	public $module = 'principalusers';
	static $per_page	= '10';

	public function __construct()
	{
		
		$this->beforeFilter('csrf', array('on'=>'post'));
		$this->model = new Principalusers();
		$this->info = $this->model->makeInfo( $this->module);
		$this->access = $this->model->validAccess($this->info['id']);
	
		$this->data = array(
			'pageTitle'	=> 	$this->info['title'],
			'pageNote'	=>  $this->info['note'],
			'pageModule'=> 'principalusers',
			'return'	=> self::returnUrl()
			
		);
		\App::setLocale(CNF_LANG);
		if (defined('CNF_MULTILANG') && CNF_MULTILANG == '1') {

		$lang = (\Session::get('lang') != "" ? \Session::get('lang') : CNF_LANG);
		\App::setLocale($lang);
		}  

		
	}
        
         public function edit($id) {
        
        $filters = explode(",",$id );
        $ua_id = $filters[0];
        $org_ua_id = $filters[1];           
               
//      print_r($ua_id);exit();
        $principaluser = Principalusers::where('UA_ID','=',$ua_id)->where('ORG_UA_ID','=',$org_ua_id)->get();
        $city = DB::table('cities')->orderBy('city_name','ASC')->lists('city_name','city_id'); 
        $state = DB::table('state_code_master')->lists('STATE_NAME','STATE_CODE_ID');
        $country = DB::table('country_master')->lists('COUNTRY_NAME','COUNTRY_ID');
     $tbuser =Musers::where('id','=',$principaluser[0]->UA_ID)->get();
         
         $this->data = array(
			'pageTitle'	=> 	'Users Details',
			'pageNote'	=> '',
			'pageModule'=> 'principalusers',
			'return'	=> self::returnUrl(),
           'city'=>$city,
           'state'=>$state,
           'country'=>$country,
              'principaluser'=>$principaluser,
                  'tbuser'=>$tbuser
		);
        
      
         return view('principalusers.edit',$this->data );
               }
        
         public function show($id) {
               
        $filters = explode(",",$id );
        $ua_id = $filters[0];
        $org_ua_id = $filters[1];           

//      print_r($ua_id);exit();
        $principaluser = Principalusers::where('UA_ID','=',$ua_id)->where('ORG_UA_ID','=',$org_ua_id)->get();
        $city = DB::table('cities')->orderBy('city_name','ASC')->lists('city_name','city_id'); 
        $state = DB::table('state_code_master')->lists('STATE_NAME','STATE_CODE_ID');
        $country = DB::table('country_master')->lists('COUNTRY_NAME','COUNTRY_ID');
        $tbuser =Musers::where('id','=',$principaluser[0]->UA_ID)->get();
         
         $this->data = array(
			'pageTitle'	=> 	'Users Details',
			'pageNote'	=> '',
			'pageModule'=> 'principalusers',
			'return'	=> self::returnUrl(),
           'city'=>$city,
           'state'=>$state,
           'country'=>$country,
              'principaluser'=>$principaluser,
                  'tbuser'=>$tbuser
		);
        
      
         return view('principalusers.show',$this->data );
//              print_r($principallocation);exit();
    } 
        
        
     
 public function create(){
          $city = DB::table('cities')->orderBy('city_name','ASC')->lists('city_name','city_id'); 
            $state = DB::table('state_code_master')->lists('STATE_NAME','STATE_CODE_ID');
            $country = DB::table('country_master')->lists('COUNTRY_NAME','COUNTRY_ID');
              $location = DB::table('org_location')->where('STATUS','=','E')->lists('LOCATION_NAME','LOCATION_CODE');
     
      
       $this->data = array(
			'pageTitle'	=> 	'Create Users',
			'pageNote'	=> '',
			'pageModule'=> 'principalusers',
			'return'	=> self::returnUrl(),
           'city'=>$city,
           'state'=>$state,
           'country'=>$country,
           'location'=>$location	
		);
         return view('principalusers.create',$this->data );
   }  
      
   
     public function store(Request $request) {
        $rules = array(
        );
        $validator = Validator::make($data = Input::all(), $rules);
//        print_r(Input::all());exit();
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        } else {
            DB::beginTransaction();
//           try {
//                  creating object
            
            $orguser = DB::table('org_users')->where('UA_ID', \Session::get('uid'))->get();
            // print_r(\Session::get('uid'));exit();
            $orgid = DB::table('organisation')->where('ORG_UA_ID', $orguser[0]->ORG_UA_ID)->get();
        //   print_r($orgid[0]->ORG_UA_ID);exit();
            $user = Musers:: where('id', '=',\Session::get('uid'))->get();
            $detail9 = Musers::where('email', '=', Input::get('email'))->get();
            
            if(Input::get('DEPARTMENT') == "IS")
            {
                $designation = "Admin User";
            }
            elseif(Input::get('DEPARTMENT') == "S")
            {
                $designation = "Sales User";
            }
            elseif(Input::get('DEPARTMENT') == "M")
            {
                $designation = "Marketing User";
            }
            elseif(Input::get('DEPARTMENT') == "I")
            {
                $designation = "Inventory User";
            }
            elseif(Input::get('DEPARTMENT') == "SP")
            {
                $designation = "Support User";
            }
            elseif(Input::get('DEPARTMENT') == "MG")
            {
                $designation = "Management User";
            }
            elseif(Input::get('DEPARTMENT') == "F")
            {
                $designation = "Finance User";
            }
            elseif(Input::get('DEPARTMENT') == "SE")
            {
                $designation = "Service User";
            }
            
            
           //  try {
            //print_r(Input::get('CUST_MOBILE'););exit();
            if (count($detail9) == 0)
            {
             $max_account = Account::max('ACCOUNT') + 1;
                Account::insert([
                'ACCOUNT' => $max_account,
                'ACCOUNT_TYPE' => 'USER',
                'STATUS' => 1,
                'UCO' => \Session::get('uid'),
                    ]
            );
                
 Orgusers::insert([
                    'ORG_UA_ID' =>  3,
                    'UA_ID' => $max_account,
                    'LOCATION_CODE' => $request->input('LOCATION_CODE'),
                    'ACCESS_TYPE' => $request->input('ACCESS_TYPE'),
                    'USER_CODE' => $request->input('USER_CODE'),
                    'DEPARTMENT' => $request->input('DEPARTMENT'),
                    'COUNTRY_CODE' => $request->input('COUNTRY_CODE'),
                    'STATUS' => 'N',
                    'UCO' => \Session::get('uid'),
                ]);
 
 
              
  Musers::insert([
                    'id' => $max_account,
                    'group_id' => '3',
                    'active' => 0,
                    'username' => $request->input('first_name') . ' ' . $request->input('middle_name') . ' ' . $request->input('last_name'),
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
                   'marital_status' => $request->input('marital_status'),
                    'addr_state' => $request->input('addr_state'),
                    'addr_country' => $request->input('addr_country'),
                    'UCO' => \Session::get('uid'),
                ]);
                

               
                
                //for aleert
//                $_data = array(
//                    'ALERT_CODE' => '',
//                    'OBJECT_ID' => $s_acct->ACCOUNT,
//                    'OBJECT_CODE' => 'PRINCIPAL_USER',
//                    'OBJECT_TYPE' => 'PRINCIPAL_USER',
//                    'LOCATION' => '',
//                    'OBJECT_ACTION' => '',
//                    'OBJECT_STATE' => '',
//                    'MEDIUM' => '',
//                    'CHANNEL' => '',
//                    'RESOURCE' => '',
//                );
//                $results1 = $this->model->generateAlert($_data);   
        
        
                
                
             DB::commit();
           } else {
//                throw new EmailAlreadyExistException();
//            }
//             }catch (EmailAlreadyExistException $e) {
//            //    echo 'Message: ' . $e->getExceptionDesc();
              //  exit();
//               $_data = array(
//                    'ALERT_CODE' => '',
//                    'OBJECT_ID' => '',
//                    'OBJECT_CODE' => 'PRINCIPAL_USER',
//                    'OBJECT_TYPE' => 'PRINCIPAL_USER',
//                    'LOCATION' => '',
//                    'OBJECT_ACTION' => '',
//                    'OBJECT_STATE' => '',
//                    'MEDIUM' => '',
//                    'CHANNEL' => '',
//                    'RESOURCE' => '',
//                );
//                $results1 = $this->model->generateAlert($_data);   
         //   DB::commit();
              return Redirect::to('principalusers/create')->with('messagetext',\Lang::get('core.note_error'))->with('msgstatus','error')
			->withErrors($validator)->withInput();
        
            //  return Redirect::to('principalusers/create')->with('message', \SiteHelpers::alert('msgstatus', 'EMAIL ALREADY EXISTS'));

              
            }  
            //            } catch (Exception $e) {
//                DB::rollback();
//                Session::flash('message', SiteHelpers::alert('error', 'Something Went Wrong'));
//                return Redirect::to('saleinvoice/create');
//            }
        }
       return Redirect::to('principalusers')->with('messagetext',\Lang::get('core.note_success'))->with('msgstatus','success')
			->withErrors($validator)->withInput();
    
    }
        public function update(Request $request) {
               
        $rules = array();
        $validator = Validator::make($data = Input::all(), $rules);
        
//       
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        } else {
            DB::beginTransaction();
//            try {
 $filters = explode(",",$request->principalusers );
        $ua_id = $filters[0];
        $org_ua_id = $filters[1];           

       
           Orgusers:: where('UA_ID', '=', $ua_id)->where('ORG_UA_ID', '=', $org_ua_id)->update([
                    'ACCESS_TYPE' => $request->input('ACCESS_TYPE'),
                    'USER_CODE' => $request->input('USER_CODE'),
                    'DEPARTMENT' => $request->input('DEPARTMENT'),
                    'COUNTRY_CODE' => $request->input('COUNTRY_CODE'),
                    'STATUS' => 'N',
                    'ULUO' => \Session::get('uid'),
                ]);
 
 
              
  Musers:: where('id', '=',$ua_id)->where('group_id','=', 3)->update([
                    'username' => $request->input('first_name') . ' ' . $request->input('middle_name') . ' ' . $request->input('last_name'),
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
                   'marital_status' => $request->input('marital_status'),
                    'addr_state' => $request->input('addr_state'),
                    'addr_country' => $request->input('addr_country'),
                    'ULUO' => \Session::get('uid'),
                ]);
                
           
      
            
            DB::commit();
//            } catch (Exception $e) {
//
//                Session::flash('message', 'Record already exists');
//                return Redirect::to('saleinvoice/' . $id . '/edit');
//            }
        }
        
      return Redirect::to('principalusers')->with('messagetext','Updated Successfully')->with('msgstatus','success')
			->withErrors($validator)->withInput();
       
       
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
		$pagination->setPath('principalusers');
		
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
		return view('principalusers.index',$this->data);
	}	

}