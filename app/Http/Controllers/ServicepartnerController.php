<?php namespace App\Http\Controllers;

use App\Http\Controllers\controller;
use App\Models\Servicepartner;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Validator, Input, Redirect ; 
use App\Models\Salespartner;
use App\Models\Musers;
use App\Models\Account;
use App\Models\Organisation;
use App\Models\Orgusers;



class ServicepartnerController extends Controller {

	protected $layout = "layouts.main";
	protected $data = array();	
	public $module = 'servicepartner';
	static $per_page	= '10';

	public function __construct()
	{
		$this->beforeFilter('csrf', array('on'=>'post'));
		$this->model = new Servicepartner();
		$this->info = $this->model->makeInfo( $this->module);
		$this->access = $this->model->validAccess($this->info['id']);
	
		$this->data = array(
			'pageTitle'	=> 	$this->info['title'],
			'pageNote'	=>  $this->info['note'],
			'pageModule'=> 'servicepartner',
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
        $servicepartner = Salespartner::where('PRINCIPAL_ID', '=', \Session::get('pid'))->find($id);
        $organization = Organisation::where('ORG_UA_ID', '=', $id)->get();
        $orguser      = Orgusers::where('ORG_UA_ID', '=', $id)->get();
        $tbuser       = Musers::where('id', '=', $orguser[0]->UA_ID)->get();
        $partnertype = "SERVICE";

 
        $this->data = array(
			'pageTitle'	=> 	'Show Service Pratner',
			'pageNote'	=> 'Show',
			'pageModule'=> 'servicepartner',
			'return'	=> self::returnUrl(),
                        'city'=>$city,
                        'state'=>$state,
                        'country'=>$country,
                        'location'=>$location,
                        'servicepartner'=>$servicepartner,
                        'organization'=>$organization,
                        'orguser'=>$orguser,
                        'tbuser'=>$tbuser,
                        'partnertype'=>$partnertype,
		);

        return view('servicepartner.show', $this->data);
        }
        
        
        public function edit($id) 
        {
              
        $city =      \DB::table('cities')->orderBy('city_name', 'ASC')->lists('city_name', 'city_id');
         
        $state =     \DB::table('state_code_master')->lists('STATE_NAME', 'STATE_CODE_ID');
        $country =   \DB::table('country_master')->lists('COUNTRY_NAME', 'COUNTRY_ID');
        $location =  \DB::table('org_location')->where('STATUS','=','E')->where('ORG_UA_ID', \Session::get('pid'))->lists('LOCATION_NAME', 'LOCATION_CODE');      
        $servicepartner = Salespartner::where('PRINCIPAL_ID', '=', \Session::get('pid'))->find($id);
        $organization = Organisation::where('ORG_UA_ID', '=', $id)->get();
        $orguser      = Orgusers::where('ORG_UA_ID', '=', $id)->get();
        $tbuser       = Musers::where('id', '=', $orguser[0]->UA_ID)->get();
        $partnertype = "SERVICE";

 
        $this->data = array(
			'pageTitle'	=> 'Edit Service Pratner',
			'pageNote'	=> 'Edit',
			'pageModule'=> 'servicepartner',
			'return'	=> self::returnUrl(),
                        'city'=>$city,
                        'state'=>$state,
                        'country'=>$country,
                        'location'=>$location,
                        'servicepartner'=>$servicepartner,
                        'organization'=>$organization,
                        'orguser'=>$orguser,
                        'tbuser'=>$tbuser,
                        'partnertype'=>$partnertype,
		);

        return view('servicepartner.edit', $this->data);
        }
        
        
        
             
            public function create()
            {
            $city =      \DB::table('cities')->orderBy('city_name', 'ASC')->lists('city_name', 'city_id');
            $state =     \DB::table('state_code_master')->lists('STATE_NAME', 'STATE_CODE_ID');
            $country =   \DB::table('country_master')->lists('COUNTRY_NAME', 'COUNTRY_ID');
            $location =  \DB::table('org_location')->where('STATUS','=','E')->where('ORG_UA_ID', 3)->lists('LOCATION_NAME', 'LOCATION_CODE');
            $partnertype = "SERVICE";
            
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
		$pagination->setPath('servicepartner');
		
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
		return view('servicepartner.index',$this->data);
	}	

}