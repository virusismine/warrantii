@extends('layouts.app')

@section('content')
<div class="page-content row">
    <!-- Page header -->

	 
	 
 	<div class="page-content-wrapper m-t">   

<div class="sbox ">
	<div class="sbox-title">
		<div class="sbox-tools pull-left" >
	   		<a href="{{ url('account?return='.$return) }}" class="tips btn btn-xs btn-default" title="{{ Lang::get('core.btn_back') }}"><i class="fa  fa-arrow-left"></i></a>
			@if($access['is_add'] ==1)
	   		<a href="{{ url('account/update/'.$id.'?return='.$return) }}" class="tips btn btn-xs btn-default" title="{{ Lang::get('core.btn_edit') }}"><i class="fa  fa-pencil"></i></a>
			@endif 
					
		</div>	

		<div class="sbox-tools " >
			<a href="{{ ($prevnext['prev'] != '' ? url('account/show/'.$prevnext['prev'].'?return='.$return ) : '#') }}" class="tips btn btn-xs btn-default"><i class="fa fa-arrow-left"></i>  </a>	
			<a href="{{ ($prevnext['next'] != '' ? url('account/show/'.$prevnext['next'].'?return='.$return ) : '#') }}" class="tips btn btn-xs btn-default"> <i class="fa fa-arrow-right"></i>  </a>
			@if(Session::get('gid') ==1)
				<a href="{{ URL::to('sximo/module/config/'.$pageModule) }}" class="tips btn btn-xs btn-default" title=" {{ Lang::get('core.btn_config') }}" ><i class="fa  fa-ellipsis-v"></i></a>
			@endif 			
		</div>


	</div>
	<div class="sbox-content" > 	

		<table class="table table-striped table-bordered" >
			<tbody>	
		
					<tr>
						<td width='30%' class='label-view text-right'>ACCOUNT</td>
						<td>{{ $row->ACCOUNT}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>ACCOUNT TYPE</td>
						<td>{{ $row->ACCOUNT_TYPE}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>STATUS</td>
						<td>{{ $row->STATUS}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>DCO</td>
						<td>{{ $row->DCO}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>DLUO</td>
						<td>{{ $row->DLUO}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>UCO</td>
						<td>{{ $row->UCO}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>ULUO</td>
						<td>{{ $row->ULUO}} </td>
						
					</tr>
				
			</tbody>	
		</table>   

	 
	
	</div>
</div>	

	</div>
</div>
	  
@stop