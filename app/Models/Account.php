<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class account extends Sximo  {
	
	protected $table = 'account';
	protected $primaryKey = 'ACCOUNT';
        public $timestamps = false;
        public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT account.* FROM account  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE account.ACCOUNT IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
