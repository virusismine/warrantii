<?php namespace App\Http\Controllers;

use App\Http\Controllers\controller;
use App\Models\Orglocation;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Validator, Input, Redirect,DB ; 
use App\Models\Musers;
use App\Models\Account;
use App\Models\orgusers;
use App\Models\organisation;
use App\Models\Principalclass;

class OrglocationController extends Controller {

	protected $layout = "layouts.main";
	protected $data = array();	
	public $module = 'orglocation';
	static $per_page	= '10';

	public function __construct()
	{
		
		$this->beforeFilter('csrf', array('on'=>'post'));
		$this->model = new Orglocation();
		$this->info = $this->model->makeInfo( $this->module);
		$this->access = $this->model->validAccess($this->info['id']);
	
		$this->data = array(
			'pageTitle'	=> 	$this->info['title'],
			'pageNote'	=>  $this->info['note'],
			'pageModule'=> 'orglocation',
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
           
   //  print_r($city);exit();
      
       $this->data = array(
			'pageTitle'	=> 	'Create Organization location',
			'pageNote'	=> '',
			'pageModule'=> 'orglocation',
			'return'	=> self::returnUrl(),
           'city'=>$city,
           'state'=>$state,
           'country'=>$country,
		);
         return view('orglocation.create',$this->data );
   }  
   
     public function store(Request $request) {
        $rules = array(
        );
        $validator = Validator::make($data = Input::all(), $rules);
//print_r(Input::all());exit();
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        } else {
            DB::beginTransaction();
//           try {
//                  creating object
            
         
             $user = Musers:: where('id', '=',\Session::get('uid'))->get();
             $orguser = Orgusers::where('UA_ID','=',\Session::get('uid'))->get();
             $detail9 = Orglocation::where('LOCATION_CODE', '=', $request->input('LOCATION_CODE'))->get();
            //print_r(Input::get('CUST_MOBILE'););exit();
             
            if(Input::get('HOST_USER') == 'on')
            {
                $HOST_USER = 1;
            }
            else{
                $HOST_USER = 0;
            }
             
            if (count($detail9) == 0) {
            
                
             Orglocation::insert([
                    'ORG_UA_ID' => $orguser[0]->ORG_UA_ID,
                    'LOCATION_TYPE' => $request->input('LOCATION_TYPE'),
                      'LOCATION_TYPE' => $request->input('LOCATION_TYPE'),
                      'LOCATION_NAME' => $request->input('LOCATION_NAME'),
                      'LOCATION_CODE' => $request->input('LOCATION_CODE'),
                      'ADDRESS' => $request->input('ADDRESS'),
                      'CITY' => $request->input('CITY'),
                      'LOCATION_TYPE' => $request->input('LOCATION_TYPE'),
                    'STATE' => $request->input('STATE'),
                    'COUNTRY' => $request->input('COUNTRY'),
                    'START_OF_OPERATION' => date("Y-m-d"),
                    'HOST_USER' => $HOST_USER,
                    'STATUS' => 'N',
                    'UCO' => \Session::get('uid'),
                ]);
                
             DB::commit();
             } else {
                 
               return Redirect::to('orglocation/create')->with('messagetext',\Lang::get('core.note_error'))->with('msgstatus','error')
			->withErrors($validator)->withInput();
            
             //   return Redirect::to('orglocation/create')->with('message', SiteHelpers::alert('error', 'This Brand Code Already Exists'));
            }
//            } catch (Exception $e) {
//                DB::rollback();
//                Session::flash('message', SiteHelpers::alert('error', 'Something Went Wrong'));
//                return Redirect::to('saleinvoice/create');
//            }
        }
        return Redirect::to('orglocation')->with('messagetext',\Lang::get('core.note_success'))->with('msgstatus','success')
			->withErrors($validator)->withInput();
    
    }
          public function update(Request $request) {
                  
//        print_r(Input::get('UA_ID'));exit();
        $rules = array();
        $validator = Validator::make($data = Input::all(), $rules);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        } else {
            DB::beginTransaction();
//            try {
  $filters = explode(",",$request->orglocation );
        $lcode = $filters[0];
        $org_ua_id = $filters[1]; 
        
          
            
            
             Orglocation:: where('LOCATION_CODE', '=', $lcode)->where('ORG_UA_ID', '=', $org_ua_id)
                    ->update([
                        'LOCATION_TYPE' => Input::get('LOCATION_TYPE'),
                        'LOCATION_NAME' => Input::get('LOCATION_NAME'),
                        'LOCATION_CODE' => Input::get('LOCATION_CODE'),
                        
                        'ADDRESS' => Input::get('ADDRESS'),
                        'CITY' => Input::get('CITY'),
                        'STATE' => Input::get('STATE'),
                        'COUNTRY' => Input::get('COUNTRY'),
                        'LOCATION_CODE' => Input::get('LOCATION_CODE'),
                                     
                        
                        
                        'ULUO' =>\Session::get('uid'),
            ]);
            
            DB::commit();
//            } catch (Exception $e) {
//
//                Session::flash('message', 'Record already exists');
//                return Redirect::to('saleinvoice/' . $id . '/edit');
//            }
        }
          return Redirect::to('orglocation')->with('messagetext','Updated Successfully')->with('msgstatus','success')
			->withErrors($validator)->withInput();
        
    } 
    
    
       
    
    
    
   
     public function edit($id) {
               
        $filters = explode(",",$id );
        $locationcode = $filters[0];
        $uaid = $filters[1];       
            
         $city = DB::table('cities')->orderBy('city_name','ASC')->lists('city_name','city_id'); 
        $state = DB::table('state_code_master')->lists('STATE_NAME','STATE_CODE_ID');
        $country = DB::table('country_master')->lists('COUNTRY_NAME','COUNTRY_ID');
        $location = Orglocation::where('LOCATION_CODE','=',$locationcode)->where('ORG_UA_ID','=',$uaid)->get();
         
        $this->data = array(
            'pageTitle' => 'Update Organization location',
            'pageNote' => '',
            'pageModule' => 'orglocation',
            'return' => self::returnUrl(),
            'city' => $city,
            'state' => $state,
            'country' => $country,
            'location' => $location,
        );

      
         return view('orglocation.edit',$this->data );
//              print_r($principallocation);exit();
    } 
        
   
   
   
   
        
         public function show($id) {
               
        $filters = explode(",",$id );
        $locationcode = $filters[0];
        $uaid = $filters[1];       
            
         $city = DB::table('cities')->orderBy('city_name','ASC')->lists('city_name','city_id'); 
        $state = DB::table('state_code_master')->lists('STATE_NAME','STATE_CODE_ID');
        $country = DB::table('country_master')->lists('COUNTRY_NAME','COUNTRY_ID');
        $location = Orglocation::where('LOCATION_CODE','=',$locationcode)->where('ORG_UA_ID','=',$uaid)->get();
         
        $this->data = array(
            'pageTitle' => 'Show Organization location',
            'pageNote' => '',
            'pageModule' => 'orglocation',
            'return' => self::returnUrl(),
            'city' => $city,
            'state' => $state,
            'country' => $country,
            'location' => $location,
        );

      
         return view('orglocation.show',$this->data );
//              print_r($principallocation);exit();
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
		$pagination->setPath('orglocation');
		
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
		return view('orglocation.index',$this->data);
	}	

}