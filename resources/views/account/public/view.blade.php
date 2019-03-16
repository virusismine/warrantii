<div class="m-t" style="padding-top:25px;">	
    <div class="row m-b-lg animated fadeInDown delayp1 text-center">
        <h3> {{ $pageTitle }} <small> {{ $pageNote }} </small></h3>
        <hr />       
    </div>
</div>
<div class="m-t">
	<div class="table-responsive" > 	

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
						
					<tr>
						<td width='30%' class='label-view text-right'></td>
						<td> <a href="javascript:history.go(-1)" class="btn btn-primary"> Back To Grid <a> </td>
						
					</tr>					
				
			</tbody>	
		</table>   

	 
	
	</div>
</div>	