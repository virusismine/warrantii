<?php namespace App\Http\Controllers;

use App\Http\Controllers\controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Validator, Input, Redirect, DB ; 


class CategoryController extends Controller {

	protected $layout = "layouts.main";
	protected $data = array();	
	public $module = 'category';
	static $per_page	= '10';

	public function __construct()
	{
		
		$this->beforeFilter('csrf', array('on'=>'post'));
		$this->model = new Category();
		$this->info = $this->model->makeInfo( $this->module);
		$this->access = $this->model->validAccess($this->info['id']);
	
		$this->data = array(
			'pageTitle'	=> 	$this->info['title'],
			'pageNote'	=>  $this->info['note'],
			'pageModule'=> 'category',
			'return'	=> self::returnUrl()
			
		);
		\App::setLocale(CNF_LANG);
		if (defined('CNF_MULTILANG') && CNF_MULTILANG == '1') {

		$lang = (\Session::get('lang') != "" ? \Session::get('lang') : CNF_LANG);
		\App::setLocale($lang);
		}  

		
	}
        
                public function create(){
                $this->data = array(
			'pageTitle'	=> 'Create Category',
			'pageNote'	=> '',
			'pageModule'=> 'Category',
			'return'	=> self::returnUrl(),
		);
                return view('category.create',$this->data );
                } 
                
                public function show($id) {
                $category = Category::where('CATEGORY_CODE','=', $id)->get();
                $this->data = array(
			'pageTitle'	=> 'Show category',
			'pageNote'	=> 'sdfgsd',
			'pageModule'    => 'category',
			'return'	=> self::returnUrl(),
                        'category' =>  $category,
		);
                return View('category.show',$this->data);
                }
        
                public function edit($id) {
                $category = Category::where('CATEGORY_CODE','=', $id)->get();
                $this->data = array(
			'pageTitle'	=> 'Show category',
			'pageNote'	=> 'sdfgsd',
			'pageModule'    => 'category',
			'return'	=> self::returnUrl(),
                        'category' =>  $category,
		);
                return View('category.edit',$this->data);
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

            $detail9 = Category:: where('CATEGORY_CODE', '=', Input::get('CATEGORY_CODE'))->get();
          
            if (count($detail9) == 0) {
                
                Category::insert([
                  'CATEGORY_CODE' => $request->input('CATEGORY_CODE'),
                  'CATEGORY_NAME' => $request->input('CATEGORY_NAME'),
                    'PARENT_CATEGORY_CODE' => $request->input('PARENT_CATEGORY_CODE'),
                    'INSTALLATION' => $request->input('INSTALLATION'),
                  'STATUS' => 'N',
                  'UCO' => \Session::get('uid'),
              ]);
          
             DB::commit();
             } else {
                return Redirect::to('category/create')->with('message', \SiteHelpers::alert('error', 'This Category Already Exists'));
            }
             
//            } catch (Exception $e) {
//                DB::rollback();
//                Session::flash('message', SiteHelpers::alert('error', 'Something Went Wrong'));
//                return Redirect::to('saleinvoice/create');
//            }
        }
       //    return Redirect::to('user/login')->with('message',\SiteHelpers::alert('success',$message));
        return Redirect::to('category')->with('message', \SiteHelpers::alert('success', \Lang::get('core.note_success')));
    }  
        
        
        public function update(Request $request) {
   
        $rules = array();
        $validator = Validator::make($data = Input::all(), $rules);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        } else {
            DB::beginTransaction();
//            try {
            
            Category:: where('CATEGORY_CODE', '=', $request->input('CATEGORY_CODE'))
                    ->update(array(
                        'CATEGORY_NAME' => $request->input('CATEGORY_NAME'),
                        'PARENT_CATEGORY_CODE' => $request->input('PARENT_CATEGORY_CODE'),
                        'INSTALLATION' => $request->input('INSTALLATION'),
                        'ULUO' => \Session::get('uid'),
            ));
            
            DB::commit();
//            } catch (Exception $e) {
//
//                Session::flash('message', 'Record already exists');
//                return Redirect::to('saleinvoice/' . $id . '/edit');
//            }
        }
         return Redirect::to('category')->with('message', \SiteHelpers::alert('success', \Lang::get('core.note_success')));
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
		$pagination->setPath('category');
		
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
		return view('category.index',$this->data);
	}	

}