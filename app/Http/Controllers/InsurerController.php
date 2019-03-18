<?php namespace App\Http\Controllers;

use App\Http\Controllers\controller;
use App\Models\Insurer;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;

use Validator, Input, Redirect ,DB; 
use App\Models\Musers;
use App\Models\Account;
use App\Models\orgusers ;
use App\Models\organisation;
use App\Models\Principalclass;
use App\Models\principal;
class InsurerController extends Controller {

	protected $layout = "layouts.main";
	protected $data = array();	
	public $module = 'insurer';
	static $per_page	= '10';

	public function __construct()
	{
		
		$this->beforeFilter('csrf', array('on'=>'post'));
		$this->model = new Insurer();
		$this->info = $this->model->makeInfo( $this->module);
		$this->access = $this->model->validAccess($this->info['id']);
	
		$this->data = array(
			'pageTitle'	=> 	$this->info['title'],
			'pageNote'	=>  $this->info['note'],
			'pageModule'=> 'insurer',
			'return'	=> self::returnUrl()
			
		);
		\App::setLocale(CNF_LANG);
		if (defined('CNF_MULTILANG') && CNF_MULTILANG == '1') {

		$lang = (\Session::get('lang') != "" ? \Session::get('lang') : CNF_LANG);
		\App::setLocale($lang);
		}  

		
	}
       public function show($id) {
               //  print_r($id);exit();
        $principal = Principal::where('PRINCIPAL_ID','=', $id)->get();
        
        $principalclass = DB::table('principal_class')
                ->where('PRINCIPAL_ID','=', $principal[0]->PRINCIPAL_ID)->get();
        
       
        $principalbrand = DB::table('principal_brand')
                ->where('PRINCIPAL_ID','=', $principal[0]->PRINCIPAL_ID)->get();
         
        
        
        
        $city = DB::table('cities')->orderBy('city_name','ASC')->lists('city_name','city_id'); 
       
        $state = DB::table('state_code_master')->lists('STATE_NAME','STATE_CODE_ID');
        $country = DB::table('country_master')->lists('COUNTRY_NAME','COUNTRY_ID');
        $organization = Organisation::where('ORG_UA_ID','=',$principal[0]->PRINCIPAL_ID)->get();
        $orguser = Orgusers::where('ORG_UA_ID','=',$principal[0]->PRINCIPAL_ID)->get();
        $tbuser = Musers::where('id','=',$orguser[0]->UA_ID)->get();
       $accountname = Musers::where('id','=',$organization[0]->ORG_SUPERUSER)->get();   
        $tp='INSURER';
        $this->data = array(
			'pageTitle'	=> 	'Show Insurer',
			'pageNote'	=> '',
			'pageModule'=> 'principal',
			'return'	=> self::returnUrl(),
           'city'=>$city,
           'state'=>$state,
           'country'=>$country,
            'organization'=>$organization,
               'orguser'=>$orguser,
               'tbuser'=>$tbuser,
               'principalclass'=>$principalclass,
               'principal'=>$principal,
		 'tp'=>$tp,
            'principalbrand'=>$principalbrand,
            'accountname'=>$accountname
		);
        
 //print_r($tbuser);exit();
//         print_r($state);exit();
              
        return view('principal.show', $this->data);
    }
    
        
        
        
public function create(){
          $city = DB::table('cities')->orderBy('city_name','ASC')->lists('city_name','city_id'); 
            $state = DB::table('state_code_master')->lists('STATE_NAME','STATE_CODE_ID');
            $country = DB::table('country_master')->lists('COUNTRY_NAME','COUNTRY_ID');
    $tp='INSURER';
            
          
       
       $this->data = array(
			'pageTitle'	=> 	'Create Insurer',
			'pageNote'	=> '',
			'pageModule'=> 'insurer',
			'return'	=> self::returnUrl(),
           'city'=>$city,
           'state'=>$state,
           'country'=>$country,
		'tp'=>$tp	
		);
         return view('principal.create',$this->data );
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
		$pagination->setPath('insurer');
		
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
		return view('insurer.index',$this->data);
	}	

}