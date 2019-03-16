

		 {!! Form::open(array('url'=>'account/savepublic', 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) !!}

	@if(Session::has('messagetext'))
	  
		   {!! Session::get('messagetext') !!}
	   
	@endif
	<ul class="parsley-error-list">
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>		


<div class="col-md-12">
						<fieldset><legend> Account</legend>
									
									  <div class="form-group  " >
										<label for="ACCOUNT" class=" control-label col-md-4 text-left"> ACCOUNT </label>
										<div class="col-md-7">
										  <input  type='text' name='ACCOUNT' id='ACCOUNT' value='{{ $row['ACCOUNT'] }}' 
						     class='form-control ' /> 
										 </div> 
										 <div class="col-md-1">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="ACCOUNT TYPE" class=" control-label col-md-4 text-left"> ACCOUNT TYPE </label>
										<div class="col-md-7">
										  <input  type='text' name='ACCOUNT_TYPE' id='ACCOUNT_TYPE' value='{{ $row['ACCOUNT_TYPE'] }}' 
						     class='form-control ' /> 
										 </div> 
										 <div class="col-md-1">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="STATUS" class=" control-label col-md-4 text-left"> STATUS </label>
										<div class="col-md-7">
										  <input  type='text' name='STATUS' id='STATUS' value='{{ $row['STATUS'] }}' 
						     class='form-control ' /> 
										 </div> 
										 <div class="col-md-1">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="DCO" class=" control-label col-md-4 text-left"> DCO </label>
										<div class="col-md-7">
										  
				<div class="input-group m-b" style="width:150px !important;">
					{!! Form::text('DCO', $row['DCO'],array('class'=>'form-control datetime', 'style'=>'width:150px !important;')) !!}
					<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
				</div>
				 
										 </div> 
										 <div class="col-md-1">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="DLUO" class=" control-label col-md-4 text-left"> DLUO </label>
										<div class="col-md-7">
										  
				<div class="input-group m-b" style="width:150px !important;">
					{!! Form::text('DLUO', $row['DLUO'],array('class'=>'form-control datetime', 'style'=>'width:150px !important;')) !!}
					<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
				</div>
				 
										 </div> 
										 <div class="col-md-1">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="UCO" class=" control-label col-md-4 text-left"> UCO </label>
										<div class="col-md-7">
										  <input  type='text' name='UCO' id='UCO' value='{{ $row['UCO'] }}' 
						     class='form-control ' /> 
										 </div> 
										 <div class="col-md-1">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="ULUO" class=" control-label col-md-4 text-left"> ULUO </label>
										<div class="col-md-7">
										  <input  type='text' name='ULUO' id='ULUO' value='{{ $row['ULUO'] }}' 
						     class='form-control ' /> 
										 </div> 
										 <div class="col-md-1">
										 	
										 </div>
									  </div> </fieldset>
			</div>
			
			

			<div style="clear:both"></div>	
				
					
				  <div class="form-group">
					<label class="col-sm-4 text-right">&nbsp;</label>
					<div class="col-sm-8">	
					<button type="submit" name="apply" class="btn btn-info btn-sm" ><i class="fa  fa-check-circle"></i> {{ Lang::get('core.sb_apply') }}</button>
					<button type="submit" name="submit" class="btn btn-primary btn-sm" ><i class="fa  fa-save "></i> {{ Lang::get('core.sb_save') }}</button>
				  </div>	  
			
		</div> 
		 
		 {!! Form::close() !!}
		 
   <script type="text/javascript">
	$(document).ready(function() { 
		
		 

		$('.removeCurrentFiles').on('click',function(){
			var removeUrl = $(this).attr('href');
			$.get(removeUrl,function(response){});
			$(this).parent('div').empty();	
			return false;
		});		
		
	});
	</script>		 
