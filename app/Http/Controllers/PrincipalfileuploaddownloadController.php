<?php namespace App\Http\Controllers;

use App\Http\Controllers\controller;
use App\Models\Principalfileuploaddownload;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Validator, Input, Redirect,  DB;
use App\Models\Musers;
use App\Models\Account;
use App\Models\orgusers;
use App\Models\organisation;
use App\Models\Principalclass;
use App\Models\orglocation;
use App\Models\productserial;
use App\Models\principalproduct;
use App\Models\principal;


class PrincipalfileuploaddownloadController extends Controller {

	protected $layout = "layouts.main";
	protected $data = array();	
	public $module = 'principalfileuploaddownload';
	static $per_page	= '10';

	public function __construct()
	{
		
		$this->beforeFilter('csrf', array('on'=>'post'));
		$this->model = new Principalfileuploaddownload();
		$this->info = $this->model->makeInfo( $this->module);
		$this->access = $this->model->validAccess($this->info['id']);
	
		$this->data = array(
			'pageTitle'	=> 	$this->info['title'],
			'pageNote'	=>  $this->info['note'],
			'pageModule'=> 'principalfileuploaddownload',
			'return'	=> self::returnUrl()
			
		);
		\App::setLocale(CNF_LANG);
		if (defined('CNF_MULTILANG') && CNF_MULTILANG == '1') {

		$lang = (\Session::get('lang') != "" ? \Session::get('lang') : CNF_LANG);
		\App::setLocale($lang);
		}  

		
	}
  public function store(Request $request) {

//        print_r("aruujn");exit();
        
        
        
        $rules = array();
        $validator = Validator::make($data = Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        } else {
            DB::beginTransaction();
//            try {
 


            $bytes = filesize(Input::file('file'));
  print_r($bytes);exit();
            if ($bytes >= 1073741824) {
                $bytes = number_format($bytes / 1073741824, 2) . ' GB';
            } elseif ($bytes >= 1048576) {
                $bytes = number_format($bytes / 1048576, 2) . ' MB';
            } elseif ($bytes >= 1024) {
                $bytes = number_format($bytes / 1024, 2) . ' KB';
            } elseif ($bytes > 1) {
                $bytes = $bytes . ' bytes';
            } elseif ($bytes == 1) {
                $bytes = $bytes . ' byte';
            } else {
                $bytes = '0 bytes';
            }
//        print_r($bytes);exit();


            $orguser = Orgusers::where('UA_ID', '=', \Session::get('uid'))->get();
            $principal = Principal::where('PRINCIPAL_ID', '=', $orguser[0]->ORG_UA_ID)->get();
//               print_r($principal[0]->PRODUCT_SERIES);exit();   
            $REQUEST_ID = $principal[0]->NO_OF_UPLOAD + 1;
            $PRINCIPAL_ID = $orguser[0]->ORG_UA_ID;

            $file = $request->file('file');
            print_r($file);exit();
            $destinationPath = '/sximo/';
            $imagePath = $file->getPathName();

            $extension = $file->getClientOriginalExtension();
            $fileName = strtotime(date('Y-m-d H:i:s')) . '-' . $PRINCIPAL_ID . '-' . $REQUEST_ID . '.' . $extension;

            // $s3 = AWS::get('s3');

//            $s3 = \Aws\S3\S3Client::factory(
//                            array(
//                                'credentials' => array(
//                                    'key' => Config::get('custom.AWSKEY'),
//                                    'secret' => Config::get('custom.AWSSECRET')
//                                ),
//                                'version' => 'latest',
//                                'region' => 'us-east-1'
//                            )
//            );
//
//            $s3->putObject(array(
//                'Bucket' => 'www.viziblexdms.com',
//                'Key' => 'PRINCIPAL_UPLOAD/' . $fileName,
//                'Body' => $file,
//                'SourceFile' => $imagePath,
//                'ACL' => 'public-read',
//                'Content-Type' => 'application/vnd.ms-excel'
//            ));

            $user = Users:: where('id', '=', Session::get('uid'))->get();

            $s_quote = new Principalfileuploaddownload;
            $s_quote->PRINCIPAL_ID = $orguser[0]->ORG_UA_ID;
            $s_quote->REQUEST_ID = $REQUEST_ID;
            $s_quote->FILE_TYPE = 'PRO';
            $s_quote->UPLOAD_DOWNLOAD = 'U';
            $s_quote->FILE_PATH = $fileName;
            $s_quote->STATUS = 'N';
            $s_quote->UCO = $user[0]->id;
            $s_quote->FILE_SIZE = $bytes;
            $s_quote->INCLUDE_HEADER = Input::get('rdo');
            $s_quote->save();

            Principal::WHERE('PRINCIPAL_ID', $orguser[0]->ORG_UA_ID)->update(array('NO_OF_UPLOAD' => $REQUEST_ID));

        //    DB::commit();

            $REMARK1 = [];
            $REMARK = [];
            $CATCHCOUNT = 0;
            $files = Input::file('file');
            // print_r(count($files));exit();

            if (isset($_POST['submit'])) {
                //  print_r(count($files));exit();
                //validate whether uploaded file is a csv file
                $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
                if (!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)) {
                    if (is_uploaded_file($_FILES['file']['tmp_name'])) {

                        //open uploaded csv file with read only mode
                        $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
//                              print_r($csvFile);exit();  
                        //skip first line
                        //   fgetcsv($csvFile);
                        $count_line = 1;
                        $count = 0;
                        //parse data from csv file line by line

                        while (($line = fgetcsv($csvFile)) !== FALSE) {
 
                            $i = 0; //initialize
                            foreach ($line as $key => $value) {
                                $cols[$i] = explode("\t", $value);
                                $i++;
                            }
                            $cols1[$count] = $cols;
                            $count++;
                        }

//                         echo "<pre>";
//                        print_r($cols);exit();
                        
                        
                        if(Input::get('rdo') == 'Y')
                        {
                            $arun = 1;
                        }
                        else{
                            $arun = 0;
                        }
                        
                        for ($i = $arun; $i < count($cols1); $i++) 
                        {
                            if ($cols1[$i][0][0] == '' && $cols1[$i][1][0] == '' && $cols1[$i][2][0] == '' && $cols1[$i][3][0] == '' && $cols1[$i][4][0] == '') {
                                
                            } else {

                                $user = Users:: where('id', '=', \Session::get('uid'))->get();
                                $orguser = Orgusers::where('UA_ID', '=', \Session::get('uid'))->get();
                                $location = DB::table('org_location')->where('UA_ID', $orguser[0]->ORG_UA_ID)->where('LOCATION_CODE', '=', $cols1[$i][0][0])->get();
                                $product = DB::table('principal_product')->where('PRINCIPAL_ID', $orguser[0]->ORG_UA_ID)->where('ITEM_CODE', '=', $cols1[$i][1][0])->get();
                                $batch = DB::table('batch_master')->where('PRINCIPAL_ID', $orguser[0]->ORG_UA_ID)->where('BATCH_NO', '=', $cols1[$i][3][0])->get();
                                $sameserial = DB::table('product_serial')->where('PRINCIPAL_ID', $orguser[0]->ORG_UA_ID)->where('SERIAL_NO', '=', $cols1[$i][2][0])->get();


                                try {
                                    if (count($location) == 0 || count($product) == 0 || count($batch) == 0 || count($sameserial) != 0) {
                                        throw new C_ERROR();
                                    } else {
//                                        $s_quote = new Productserial;
//                                        $s_quote->PRINCIPAL_ID = $orguser[0]->ORG_UA_ID;
//                                        $s_quote->PRODUCT_ID = $product[0]->PRINCIPAL_PRODUCT_ID;
//                                        $s_quote->PRODUCT_CODE = $cols1[$i][1][0];
//                                        $s_quote->SERIAL_NO = $cols1[$i][2][0];
//                                        $s_quote->BATCH_NO = $cols1[$i][3][0];
//                                        $s_quote->BIRTH_LOCATION = $cols1[$i][0][0];
//                                        $s_quote->MFG_DATE = date("Y-m-d", strtotime($cols1[$i][4][0]));
//                                        $s_quote->STATUS = 'E';
//                                        $s_quote->UCO = $user[0]->id;
//                                        $s_quote->save();
                                        
//                                        $s_quote1 = new Producttrack;
//                                        $s_quote1->PRINCIPAL_ID = $orguser[0]->ORG_UA_ID;
//                                        $s_quote1->PRODUCT_ID = $product[0]->PRINCIPAL_PRODUCT_ID;
//                                        $s_quote1->PRODUCT_CODE = $cols1[$i][1][0];
//                                        $s_quote1->SERIAL_NO = $cols1[$i][2][0];
//                                        $s_quote1->DATE = date("Y-m-d", strtotime($cols1[$i][4][0]));
//                                        $s_quote1->START_LOCATION = $cols1[$i][0][0];
//                                        $s_quote1->STATUS = 'E';
//                                        $s_quote1->UCO = $user[0]->id;
//                                        $s_quote1->save();
                                    }
                                } catch (C_ERROR $ex) {

                                    $E1 = '';
                                    $E2 = '';
                                    $E3 = '';
                                    $E4 = '';

                                    if (count($product) == 0) {
                                        $E1 = 'ERROR IN PRODUCT';
                                    }
                                    if (count($location) == 0) {
                                        $E2 = ', ERROR IN LOCATION';
                                    }

                                    if (count($batch) == 0) {
                                        $E3 = ', ERROR IN BATCH';
                                    }
                                    
                                    if (count($sameserial) != 0) {
                                        $E4 = ', ERROR SERIAL CODE ALREADY EXISTS';
                                    }

                                    $REMARK[$CATCHCOUNT] = 'LINE NUMBER -' . $i . '-' . $E1 . ' ' . $E2 . ' ' . $E3 . ' ' . $E4;
                                    $CATCHCOUNT++;
                                    //print_r("location");exit();
                                }
                            }

                            $count++;
                            $count_line++;
                        }

                        //close opened csv file
                        fclose($csvFile);

                        $qstring = '?status=succ';
                    } else {
                        $qstring = '?status=err';
                    }
                } else {
                    $qstring = '?status=invalid_file';
                }
            }
            DB::commit();

//            print_r($REMARK);exit();
            $REMARKCOUTNT = '';
          
                     for ($k = 0; $k < count($REMARK); $k++) {
                     $REMARKCOUTNT.=  $REMARK[$k] .':';
                 }
            
            
              Principalfileuploaddownload::WHERE('PRINCIPAL_ID', $s_quote->PRINCIPAL_ID)->WHERE('REQUEST_ID',$REQUEST_ID)->update(array('REMARKS' => $REMARKCOUTNT,'ERROR_COUNT' => count($REMARK)));
//        
//              } catch (Exception $e) {
//
//                Session::flash('message', 'Record already exists');
//                return Redirect::to('saleinvoice/' . $id . '/edit');
//              }
        }
        return Redirect::to('principalfileuploaddownload')->with('message', SiteHelpers::alert('success', Lang::get('core.note_success')));
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
		$pagination->setPath('principalfileuploaddownload');
		
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
		return view('principalfileuploaddownload.index',$this->data);
	}	

}