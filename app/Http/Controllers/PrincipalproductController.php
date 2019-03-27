<?php namespace App\Http\Controllers;

use App\Http\Controllers\controller;
use App\Models\Principalproduct;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Validator, Input, Redirect ; 
use App\Models\Principal;

class PrincipalproductController extends Controller {

	protected $layout = "layouts.main";
	protected $data = array();	
	public $module = 'principalproduct';
	static $per_page	= '10';

	public function __construct()
	{
		
		$this->beforeFilter('csrf', array('on'=>'post'));
		$this->model = new Principalproduct();
		$this->info = $this->model->makeInfo( $this->module);
		$this->access = $this->model->validAccess($this->info['id']);
	
		$this->data = array(
			'pageTitle'	=> 	$this->info['title'],
			'pageNote'	=>  $this->info['note'],
			'pageModule'=> 'principalproduct',
			'return'	=> self::returnUrl()
			
		);
		\App::setLocale(CNF_LANG);
		if (defined('CNF_MULTILANG') && CNF_MULTILANG == '1') {

		$lang = (\Session::get('lang') != "" ? \Session::get('lang') : CNF_LANG);
		\App::setLocale($lang);
		}  

		
	}
        
        
        public function create(){
          
         $brand = \DB::table('principal_brand')->where('PRINCIPAL_ID','=',3)->lists('BRAND_CODE','BRAND_CODE'); 
         $category = \DB::table('category')->where('STATUS','=','E')->lists('CATEGORY_NAME','CATEGORY_CODE'); 
         $hsn= \DB::table('hsn_master')->where('ACCOUNT_ID', 3)->lists('HSN_CODE','HSN_ID');  
         $principal = \DB::table('principal')->where('PRINCIPAL_ID','=',  3)->get();  
        
         $this->data = array(
			'pageTitle'	=> 'Create Principal Product',
			'pageNote'	=> '',
			'pageModule'=>     'principalproduct',
			'return'	=> self::returnUrl(),
                        'brand'         => $brand,
                        'category'	=> $category,
                        'hsn'           => $hsn,
                        'principal'	=> $principal,
	 );
                
        return view('principalproduct.create',$this->data );
        }
        
        public function show($id){
          
         $principalproduct = Principalproduct::where('PRINCIPAL_ID','=',3)->where('PRINCIPAL_PRODUCT_ID','=',$id)->get();
         $brand = \DB::table('principal_brand')->where('PRINCIPAL_ID','=',3)->lists('BRAND_CODE','BRAND_CODE');
         $category = \DB::table('category')->where('STATUS','=','E')->lists('CATEGORY_NAME','CATEGORY_CODE');
         $hsn= \DB::table('hsn_master')->where('ACCOUNT_ID', 3)->lists('HSN_CODE','HSN_ID');
         $principal = \DB::table('principal')->where('PRINCIPAL_ID','=',  3)->get();
         $this->data = array(
			'pageTitle'	=> 'Show Principal Product',
			'pageNote'	=> '',
			'pageModule'=>     'principalproduct',
			'return'	=> self::returnUrl(),
                        'principalproduct' => $principalproduct,
                        'brand'         => $brand,
                        'category'	=> $category,
                        'hsn'           => $hsn,
                        'principal'	=> $principal,
	 );
                
        return view('principalproduct.show',$this->data );
        }
        
                public function edit($id){
          
         $principalproduct = Principalproduct::where('PRINCIPAL_ID','=',3)->where('PRINCIPAL_PRODUCT_ID','=',$id)->get();
         $brand = \DB::table('principal_brand')->where('PRINCIPAL_ID','=',3)->lists('BRAND_CODE','BRAND_CODE');
         $category = \DB::table('category')->where('STATUS','=','E')->lists('CATEGORY_NAME','CATEGORY_CODE');
         $hsn= \DB::table('hsn_master')->where('ACCOUNT_ID', 3)->lists('HSN_CODE','HSN_ID');
         $principal = \DB::table('principal')->where('PRINCIPAL_ID','=',  3)->get();
         $this->data = array(
			'pageTitle'	=> 'Edit Principal Product',
			'pageNote'	=> '',
			'pageModule'=>     'principalproduct',
			'return'	=> self::returnUrl(),
                        'principalproduct' => $principalproduct,
                        'brand'         => $brand,
                        'category'	=> $category,
                        'hsn'           => $hsn,
                        'principal'	=> $principal,
	 );
                
        return view('principalproduct.edit',$this->data );
        }
        
        public function update(Request $request) {
//        print_r(Input::all());exit();
        $rules = array();
        $validator = Validator::make($data = Input::all(), $rules);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        } else {
            \DB::beginTransaction();
//            try {
            
             Principalproduct:: where('PRODUCT_CODE', '=', $request->input('PRODUCT_CODE'))
                    ->update(array(
                        'PRODUCT_NAME' => $request->input('PRODUCT_NAME'),
                        'PRODUCT_MEASURING_UNIT' => $request->input('PRODUCT_MEASURING_UNIT'),
                        'PRODUCT_UNIT_PRICE' => $request->input('PRODUCT_UNIT_PRICE'),
                        'DISCOUNT' => $request->input('DISCOUNT'),
                        'BRAND_CODE' => $request->input('BRAND_CODE'),
                        'CATEGORY_CODE' => $request->input('CATEGORY_CODE'),
                        'YEAR_OF_LAUNCH' => $request->input('YEAR_OF_LAUNCH'),
                        'HSN_MASTER_ID' => $request->input('HSN_MASTER_ID'),
                        'PRODUCT_TRACE' => $request->input('PRODUCT_TRACE'),
                        'SHELF_LIFE' => $request->input('SHELF_LIFE'),
                        'STOCKVALUE' => $request->input('STOCKVALUE'),
                        'MINORDERQTY' => $request->input('MINORDERQTY'),
                        'INVENTORY_EVAL' => $request->input('INVENTORY_EVAL'),
                        'SHIPPING_TYPE' => $request->input('SHIPPING_TYPE'),
                        'LEAD_TIME' => $request->input('LEAD_TIME'),
                        'UNIT_VOLUME' => $request->input('UNIT_VOLUME'),
                        'ULUO' => \Session::get('uid'),
            ));
            
            \DB::commit();
//            } catch (Exception $e) {
//
//                Session::flash('message', 'Record already exists');
//                return Redirect::to('saleinvoice/' . $id . '/edit');
//            }
        }
         return Redirect::to('principalproduct')->with('message', \SiteHelpers::alert('success', \Lang::get('core.note_success')));
    }         
        
        
        
        
                
            public function store(Request $request) {
//          print_r(Input::all());eSxit();   
            $rules = array(
            );
            $validator = Validator::make($data = Input::all(), $rules);

            if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
            } else {
            \DB::beginTransaction();
//           try {
//                  creating object
            $principal = Principal::where('PRINCIPAL_ID','=', 3)->get();
//            print_r($principal);exit();
            $series = $principal[0]->PRODUCT_SERIES + 1;
            
            $detail9 = Principalproduct::where('PRINCIPAL_ID', '=', 3)->where('PRODUCT_CODE', '=', Input::get('PRODUCT_CODE'))->get();
//            print_r(count($detail9));exit();
            if (count($detail9) == 0)
            {
      
            Principalproduct::insert([
                'PRINCIPAL_PRODUCT_ID' => $series,
                'PRINCIPAL_ID' => 3,
                'PRODUCT_CODE' => $request->input('PRODUCT_CODE'),
                'PRODUCT_NAME' => $request->input('PRODUCT_NAME'),
                'PRODUCT_MEASURING_UNIT' => $request->input('PRODUCT_MEASURING_UNIT'),
                'PRODUCT_UNIT_PRICE' => $request->input('PRODUCT_UNIT_PRICE'),
                'DISCOUNT' => $request->input('DISCOUNT'),
                'HSN_MASTER_ID' => $request->input('HSN_MASTER_ID'),
                'STOCKVALUE' => $request->input('STOCKVALUE'),
                'MINORDERQTY' => $request->input('MINORDERQTY'),
                'INVENTORY_EVAL' => $request->input('INVENTORY_EVAL'),
                'SHIPPING_TYPE' => $request->input('SHIPPING_TYPE'),
                'LEAD_TIME' => $request->input('LEAD_TIME'),
                'BRAND_CODE' => $request->input('BRAND_CODE'),
                'CATEGORY_CODE' => $request->input('CATEGORY_CODE'),
                'YEAR_OF_LAUNCH' => $request->input('YEAR_OF_LAUNCH'),
                'PRODUCT_TRACE' => $request->input('PRODUCT_TRACE'),
                'SHELF_LIFE' => $request->input('SHELF_LIFE'),
                'UNIT_VOLUME' => $request->input('UNIT_VOLUME'),
                'STATUS' => 'N',
                'UCO' => \Session::get('uid'),
            ]);
            
            
            Principal::WHERE('PRINCIPAL_ID',3)->update(array('PRODUCT_SERIES' => $series));

             \DB::commit();
             
           } else {
                return Redirect::to('Principalproduct/create')->with('message', \SiteHelpers::alert('error', 'This Principal Product Number Already Exists'));
            }             
           
//            } catch (Exception $e) {
//                DB::rollback();
//                Session::flash('message', SiteHelpers::alert('error', 'Something Went Wrong'));
//                return Redirect::to('saleinvoice/create');
//            }
        }
        return Redirect::to('principalproduct')->with('message', \SiteHelpers::alert('success', \Lang::get('core.note_success')));
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
		$pagination->setPath('principalproduct');
		
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
		return view('principalproduct.index',$this->data);
	}	

}