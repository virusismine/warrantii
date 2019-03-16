<?php namespace App\Http\Controllers;

use App\Http\Controllers\controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Validator, Input, Redirect, DB ; 


class BrandController extends Controller {

	protected $layout = "layouts.main";
	protected $data = array();	
	public $module = 'brand';
	static $per_page	= '10';

	public function __construct()
	{
		
		$this->beforeFilter('csrf', array('on'=>'post'));
		$this->model = new Brand();
		$this->info = $this->model->makeInfo( $this->module);
		$this->access = $this->model->validAccess($this->info['id']);
	
		$this->data = array(
			'pageTitle'	=> 	$this->info['title'],
			'pageNote'	=>  $this->info['note'],
			'pageModule'=> 'brand',
			'return'	=> self::returnUrl()
			
		);
		\App::setLocale(CNF_LANG);
		if (defined('CNF_MULTILANG') && CNF_MULTILANG == '1') {

		$lang = (\Session::get('lang') != "" ? \Session::get('lang') : CNF_LANG);
		\App::setLocale($lang);
		}  
	}
        
        public function show($id) {
                    
        $brand = Brand::where('BRAND_CODE','=', $id)->get();
                $this->data = array(
			'pageTitle'	=> 'Show Brand',
			'pageNote'	=> 'sdfgsd',
			'pageModule'=> 'brand',
			'return'	=> self::returnUrl(),
                        'brand' =>  $brand,
		);
            
        return View('brand.show',$this->data);
        }
        
        public function edit($id) {
                    
        $brand = Brand::where('BRAND_CODE','=', $id)->get();
      
                $this->data = array(
			'pageTitle'	=> 'Show Brand',
			'pageNote'	=> 'sdfgsd',
			'pageModule'=> 'brand',
			'return'	=> self::returnUrl(),
                        'brand' =>  $brand,
		);
            
        return View('brand.edit',$this->data);
        }        
        
        
        public function create(){
            
                $this->data = array(
			'pageTitle'	=> 'Create Brand',
			'pageNote'	=> '',
			'pageModule'=> 'brand',
			'return'	=> self::returnUrl(),
		);
        return view('brand.create',$this->data );
        } 
        
           public function store(Request $request) {
               
             
               
           $rules = array(
           );
           $validator = Validator::make($data = Input::all(), $rules);
           if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
           } else {
            DB::beginTransaction();
//           try {
//                  creating object

           
            $detail9 = Brand:: where('BRAND_CODE', '=', Input::get('BRAND_CODE'))->get();
          
            if (count($detail9) == 0) {
                
                
                Brand::insert([
                  'BRAND_CODE' => $request->input('BRAND_CODE'),
                  'BRAND_NAME' => $request->input('BRAND_NAME'),
                  'STATUS' => 'N',
                  'UCO' => \Session::get('uid'),
              ]);
          
             DB::commit();
             } else {
                return Redirect::to('brand/create')->with('message', \SiteHelpers::alert('error', 'This Brand Already Exists'));
            }
             
//            } catch (Exception $e) {
//                DB::rollback();
//                Session::flash('message', SiteHelpers::alert('error', 'Something Went Wrong'));
//                return Redirect::to('saleinvoice/create');
//            }
        }
       //    return Redirect::to('user/login')->with('message',\SiteHelpers::alert('success',$message));
        return Redirect::to('brand')->with('message', \SiteHelpers::alert('success', \Lang::get('core.note_success')));
    }     
    
        public function update(Request $request) {
   
        $rules = array();
        $validator = Validator::make($data = Input::all(), $rules);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        } else {
            DB::beginTransaction();
//            try {
            
             Brand:: where('BRAND_CODE', '=', $request->input('BRAND_CODE'))
                    ->update(array(
                        'BRAND_NAME' => $request->input('BRAND_NAME'),
                        'ULUO' => \Session::get('uid'),
            ));
            
            DB::commit();
//            } catch (Exception $e) {
//
//                Session::flash('message', 'Record already exists');
//                return Redirect::to('saleinvoice/' . $id . '/edit');
//            }
        }
         return Redirect::to('brand')->with('message', \SiteHelpers::alert('success', \Lang::get('core.note_success')));
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
		$pagination->setPath('brand');
		
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
		return view('brand.index',$this->data);
	}	

}