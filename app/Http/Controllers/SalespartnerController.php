<?php namespace App\Http\Controllers;

use App\Http\Controllers\controller;
use App\Models\Salespartner;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Validator, Input, Redirect ; 
use App\Models\Musers;
use App\Models\Account;
use App\Models\Organisation;
use App\Models\Orgusers;

class SalespartnerController extends Controller {

	protected $layout = "layouts.main";
	protected $data = array();	
	public $module = 'salespartner';
	static $per_page	= '10';

	public function __construct()
	{
		$this->beforeFilter('csrf', array('on'=>'post'));
		$this->model = new Salespartner();
		$this->info = $this->model->makeInfo( $this->module);
		$this->access = $this->model->validAccess($this->info['id']);
	
		$this->data = array(
			'pageTitle'	=> 	$this->info['title'],
			'pageNote'	=>  $this->info['note'],
			'pageModule'=> 'salespartner',
			'return'	=> self::returnUrl()
			
		);
		\App::setLocale(CNF_LANG);
		if (defined('CNF_MULTILANG') && CNF_MULTILANG == '1') {

		$lang = (\Session::get('lang') != "" ? \Session::get('lang') : CNF_LANG);
		\App::setLocale($lang);
		}  
	}
        
        public function show($id) 
        {
        $city =      \DB::table('cities')->orderBy('city_name', 'ASC')->lists('city_name', 'city_id');
        $state =     \DB::table('state_code_master')->lists('STATE_NAME', 'STATE_CODE_ID');
        $country =   \DB::table('country_master')->lists('COUNTRY_NAME', 'COUNTRY_ID');
        $location =  \DB::table('org_location')->where('STATUS','=','E')->where('ORG_UA_ID', \Session::get('pid'))->lists('LOCATION_NAME', 'LOCATION_CODE');         
                 
        $salespartner = Salespartner::where('PRINCIPAL_ID', '=', \Session::get('pid'))->find($id);
        $organization = Organisation::where('ORG_UA_ID', '=', $id)->get();
        $orguser      = Orgusers::where('ORG_UA_ID', '=', $id)->get();
        $tbuser       = Musers::where('id', '=', $orguser[0]->UA_ID)->get();
        $partnertype = "SALES";
        
        $this->data = array(
			'pageTitle'	=> 	'Show Sales Pratner',
			'pageNote'	=> 'Show',
			'pageModule'=> 'salespartner',
			'return'	=> self::returnUrl(),
                        'city'=>$city,
                        'state'=>$state,
                        'country'=>$country,
                        'location'=>$location,
                        'salespartner'=>$salespartner,
                        'organization'=>$organization,
                        'orguser'=>$orguser,
                        'tbuser'=>$tbuser,
                        'partnertype'=>$partnertype,
	);

        return view('salespartner.show', $this->data);
        }
        
        public function edit($id) 
        {
        $city =      \DB::table('cities')->orderBy('city_name', 'ASC')->lists('city_name', 'city_id');
        $state =     \DB::table('state_code_master')->lists('STATE_NAME', 'STATE_CODE_ID');
        $country =   \DB::table('country_master')->lists('COUNTRY_NAME', 'COUNTRY_ID');
        $location =  \DB::table('org_location')->where('STATUS','=','E')->where('ORG_UA_ID', \Session::get('pid'))->lists('LOCATION_NAME', 'LOCATION_CODE');         
                 
        $salespartner = Salespartner::where('PRINCIPAL_ID', '=', \Session::get('pid'))->find($id);
        $organization = Organisation::where('ORG_UA_ID', '=', $id)->get();
        $orguser      = Orgusers::where('ORG_UA_ID', '=', $id)->get();
        $tbuser       = Musers::where('id', '=', $orguser[0]->UA_ID)->get();
        $partnertype = "SALES";
        
        $this->data = array(
			'pageTitle'	=> 'Edit Sales Pratner',
			'pageNote'	=> 'Edit',
			'pageModule'=> 'salespartner',
			'return'	=> self::returnUrl(),
                        'city'=>$city,
                        'state'=>$state,
                        'country'=>$country,
                        'location'=>$location,
                        'salespartner'=>$salespartner,
                        'organization'=>$organization,
                        'orguser'=>$orguser,
                        'tbuser'=>$tbuser,
                        'partnertype'=>$partnertype,
	);

        return view('salespartner.edit', $this->data);
        }        
        
        
        
        
        
        public function create()
            {
            $city =      \DB::table('cities')->orderBy('city_name', 'ASC')->lists('city_name', 'city_id');
            $state =     \DB::table('state_code_master')->lists('STATE_NAME', 'STATE_CODE_ID');
            $country =   \DB::table('country_master')->lists('COUNTRY_NAME', 'COUNTRY_ID');
            $location =  \DB::table('org_location')->where('STATUS','=','E')->where('ORG_UA_ID', 3)->lists('LOCATION_NAME', 'LOCATION_CODE');
            $partnertype = "SALES";
            
            $this->data = array(
			'pageTitle'	=> 'Create Sales Partner',
			'pageNote'	=> '',
			'pageModule'    => 'salespartner',
			'return'	=> self::returnUrl(),
                        'city'=>$city,
                        'state'=>$state,
                        'country'=>$country,
                        'location'=>$location,       
                        'partnertype'=>$partnertype,
            );
            return view('salespartner.create',$this->data );
            }
        
            public function store(Request $request) {
//                print_r("arun");exit();
            $rules = array( );
            $validator = Validator::make($data = Input::all(), $rules);
        echo "<pre>";
//print_r($request->input('email'));exit();
            if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
            } else {
            \DB::beginTransaction();
//           try {
//                  creating object
           

            $detail9 = Salespartner::where('PRINCIPAL_ID', '=', 3)->where('PARTNER_CODE', '=', $request->input('PARTNER_CODE'))->get();
            //print_r(Input::get('CUST_MOBILE'););exit();
            $detail10 = Musers::where('email', '=', $request->input('email'))->get();


            
            
            if (count($detail9) == 0 && count($detail10) == 0) {

                    
                $max_account1 = Account::max('ACCOUNT') + 1;
                // Insert Account
//                if ($request->input('page_type') == 'BRAND') {
//                    $st = 'PRINCIPAL';
//                } else if ($request->input('page_type') == 'INSURER') {
//                    $st = 'INSURER';
//                }
                $max_account2 = $max_account1+1;
                Account::insert([[
                'ACCOUNT' => $max_account1,
                'ACCOUNT_TYPE' => 'PARTNER',
                'STATUS' => 1,
                'UCO' => \Session::get('uid'),
                    ],
                    [
                        'ACCOUNT' => $max_account2,
                        'ACCOUNT_TYPE' => 'PARTNER',
                        'STATUS' => 1,
                        'UCO' => \Session::get('uid'),
                    ],
                 ]);
                
                Salespartner::insert([
                    'PARTNER_ID' => $max_account1,
                    'PRINCIPAL_ID' => 3,
                    'UA_ID' => $max_account2,
                    'PARTNER_TYPE' => $request->input('PARTNER_TYPE'),
                    'COUNTRY_CODE' => $request->input('COUNTRY_CODE'),
                    'PARTNER_CODE' => $request->input('PARTNER_CODE'),
                    'PARTNER_NAME' => $request->input('PARTNER_NAME'),
                    'PARTNER_MOBILE' => $request->input('PARTNER_MOBILE'),
                    'PARTNER_EMAIL' => $request->input('PARTNER_EMAIL'),
                    'LOCATION_CODE' => $request->input('LOCATION_CODE'),
                    'CREDIT_LIMIT' => $request->input('CREDIT_LIMIT'),
                    'CREDIT_PERIOD' => $request->input('CREDIT_PERIOD'),
                    'OUTSTANDING_DUES' => $request->input('OUTSTANDING_DUES'),
                    'STATUS' => 'N',
                    'UCO' => \Session::get('uid'),
              ]);                   
                    
                    
                Organisation::insert([
                    'ORG_UA_ID' => $max_account1,
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
                    'ORG_SUPERUSER' => $max_account2,
                    
                    'UCO' => \Session::get('uid'),
              ]);
                
                Musers::insert([
                    'id' => $max_account2,
                    'group_id' => 4,
                    'username' => $request->input('first_name') . ' ' . Input::get('middle_name') . ' ' . Input::get('last_name'),
                    'first_name' => $request->input('first_name'),
                    'middle_name' => $request->input('middle_name'),
                    'last_name' => $request->input('last_name'),
                    'dob' => date("Y-m-d", strtotime(Input::get('dob'))),
                    'gender' => $request->input('gender'),
                    'marital_status' => $request->input('marital_status'),
                    'email' => $request->input('email'),
                    'password' =>  \Hash::make($request->input('password')),
                    'addr_house_no' => $request->input('addr_house_no'),
                    'addr_pin' => $request->input('addr_pin'),
                    'phone_mobile' => $request->input('phone_mobile'),
                    'addr_locality' => $request->input('addr_locality'),
                    'addr_citovi' => $request->input('addr_citovi'),
                    'addr_district' => $request->input('addr_district'),
                    'addr_state' => $request->input('addr_state'),
                    'addr_country' => $request->input('addr_country'),
                    'designation' => "arin",
                    'UCO' => \Session::get('uid'),
              ]);
                
                Orgusers::insert([
                    'ORG_UA_ID' => $max_account1,
                    'UA_ID' => $max_account2,
                    'LOCATION_CODE' => $request->input('LOCATION_CODE'),
                    'ACCESS_TYPE' => $request->input('ACCESS_TYPE'),
                    'USER_CODE' => $request->input('USER_CODE'),
                    'DEPARTMENT' => $request->input('DEPARTMENT'),
                    'COUNTRY_CODE' => $request->input('COUNTRY_CODE'),
                    'STATUS' => "N",
                    'UCO' => \Session::get('uid'),
              ]);                


                \DB::commit();
            }else {
                if ($request->input('PARTNER_TYPE') == 'SALES') {
                    return Redirect::to('salespartner/create')->with('message', \SiteHelpers::alert('error', 'This Saled Partner Already Exists'));
                } else if ($request->input('PARTNER_TYPE') == 'SERVICE') {
                    return Redirect::to('servicepartner/create')->with('message', \SiteHelpers::alert('error', 'This Service Partner Already Exists'));
                }
            }
            
            
//            } catch (Exception $e) {
//                DB::rollback();
//                Session::flash('message', SiteHelpers::alert('error', 'Something Went Wrong'));
//                return Redirect::to('saleinvoice/create');
//            }
        }
          if ($request->input('PARTNER_TYPE') == 'SALES') {
            return Redirect::to('salespartner')->with('message', \SiteHelpers::alert('success', \Lang::get('core.note_success')));
        } else if ($request->input('PARTNER_TYPE') == 'SERVICE') {
            return Redirect::to('servicepartner')->with('message', \SiteHelpers::alert('success', \Lang::get('core.note_success')));
        }

    }    
            
    
    
        public function update(Request $request) {
        $rules = array();
        $validator = Validator::make($data = Input::all(), $rules);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        } else {
            \DB::beginTransaction();
//            try {
                print_r(Input::get('BILLTOCOMPANTACCOUNT'));exit();
                $s_partner = Salespartner::find($id);

                Orglocation:: where('UA_ID', '=', $s_partner->PARTNER_ID)
                        ->update(array(
                            'LOCATION_CODE' => Input::get('LOCATION_CODE'),
                            'LOCATION_NAME' => Input::get('LOCATION_CODE'),
                            'ULUO' => $user[0]->id,
                ));

                Principalpartner:: where('PARTNER_ID', '=', $s_partner->PARTNER_ID)
                        ->update(array(
                            'PARTNER_CODE' => Input::get('PARTNER_CODE'),
                            'PARTNER_MOBILE' => Input::get('PARTNER_MOBILE'),
                            'PARTNER_EMAIL' => Input::get('PARTNER_EMAIL'),
                            'PARTNER_NAME' => Input::get('PARTNER_NAME'),
                            'COUNTRY_CODE' => Input::get('COUNTRY_CODE'),
                            'LOCATION_CODE' => Input::get('LOCATION_CODE'),
                            'ULUO' => $user[0]->id,
                ));

                $s_quote = Organisation::find($id);
                Organisation:: where('ORG_UA_ID', '=', $s_quote->ORG_UA_ID)
                        ->update(array(
                            'ORG_TYPE' => Input::get('ORG_TYPE'),
                            'ORG_NAME' => Input::get('ORG_NAME'),
                            'ORG_CODE' => Input::get('ORG_CODE'),
                            'ORG_EMAIL_ADDRESS' => Input::get('ORG_EMAIL_ADDRESS'),
                            'ORG_ADDR_HOUSE_NO' => Input::get('ORG_ADDR_HOUSE_NO'),
                            'ORG_ADDR_CITYOVI' => Input::get('ORG_ADDR_CITYOVI'),
                            'ORG_ADDR_DIST' => Input::get('ORG_ADDR_DIST'),
                            'ORG_ADDR_LOCALITY' => Input::get('ORG_ADDR_LOCALITY'),
                            'ORG_ADDR_STATE' => Input::get('ORG_ADDR_STATE'),
                            'ORG_ADDR_COUNTRY' => Input::get('ORG_ADDR_COUNTRY'),
                            'ORG_ADDR_PIN' => Input::get('ORG_ADDR_PIN'),
                            'ORG_PHONE_MOBILE' => Input::get('ORG_PHONE_MOBILE'),
                            'ULUO' => $user[0]->id,
                ));

                Orgusers:: where('ORG_UA_ID', '=', $s_quote->ORG_UA_ID)
                        ->update(array(
                            'ACCESS_TYPE' => Input::get('ACCESS_TYPE'),
                            'USER_CODE' => Input::get('USER_CODE'),
                            'DEPARTMENT' => Input::get('DEPARTMENT'),
                            'COUNTRY_CODE' => Input::get('COUNTRY_CODE1'),
                            'USER_CODE' => Input::get('USER_CODE'),
                            'LOCATION_CODE' => Input::get('LOCATION_CODE'),
                            'ULUO' => $user[0]->id,
                ));

                $s_quote1 = Orgusers::find($id);

                Users:: where('id', '=', $s_quote1->UA_ID)
                        ->update(array(
                            'username' => Input::get('first_name') . ' ' . Input::get('middle_name') . ' ' . Input::get('last_name'),
                            'first_name' => Input::get('first_name'),
                            'middle_name' => Input::get('middle_name'),
                            'last_name' => Input::get('last_name'),
                            'dob' => date("Y-m-d", strtotime(Input::get('dob'))),
                            'gender' => Input::get('gender'),
                            'marital_status' => Input::get('marital_status'),
                            'email' => Input::get('email'),
                            'addr_house_no' => Input::get('addr_house_no'),
                            'addr_pin' => Input::get('addr_pin'),
                            'phone_mobile' => Input::get('phone_mobile'),
                            'addr_locality' => Input::get('addr_locality'),
                            'addr_citovi' => Input::get('addr_citovi'),
                            'addr_district' => Input::get('addr_district'),
                            'addr_state' => Input::get('addr_state'),
                            'addr_country' => Input::get('addr_country'),
                            'ULUO' => $user[0]->id,
                ));
            

            DB::commit();
//               print_r("arun");exit();
//            } catch (Exception $e) {
//
//                Session::flash('message', 'Record already exists');
//                return Redirect::to('saleinvoice/' . $id . '/edit');
//            }
        }
        return Redirect::to('principalpartner')->with('message', SiteHelpers::alert('success', Lang::get('core.note_success')));
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
		$pagination->setPath('salespartner');
		
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
		return view('salespartner.index',$this->data);
	}	

}