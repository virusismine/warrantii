
@extends('layouts.app')

@section('content')
{{--*/ usort($tableGrid, "SiteHelpers::_sort") /*--}}
<div class="page-content row">


  <div class="page-content-wrapper m-t">	 	

    <div class="sbox animated fadeInRight">
      <div class="sbox-title">
        <h3><i class="icon-bars"></i>  {{ $pageTitle }} <small>{{ $pageNote }}</small></h3>

        
        <div class="page-title half-div">
    <a href="#" class="tips icon-btn index-page" title="Summary"><img src="{{ asset('sximo/images/icons/summary.png')}}"  /></a>
        <a class="tips icon-btn index-page" id="show_popup" title="Download Analytics Report"><img src="{{ asset('sximo/images/icons/add.png')}}"  /></a>
        <a href="#" class="tips icon-btn index-page" title="Print"><img src="{{ asset('sximo/images/icons/print.png')}}"  /></a>
        <a href="#" class="tips icon-btn index-page" title="Info"><img src="{{ asset('sximo/images/icons/info.png')}}"  /></a>
        <a href="#" class="tips icon-btn index-page" title="Export"><img src="{{ asset('sximo/images/icons/export.png')}}"  /></a>
        </div>
        <div class="text-right half-div" style='    margin-top: -22px;'> 
              </div>
     
      </div>
      <div class="sbox-content"> 		
	
	
	 {!! Form::open()!!}
	 <div class="table-responsive" style="min-height:300px;">
    <table width="100%" class="table display cell-border diamond_table" id="diamond_table" cellpadding="0" cellspacing="0">
        <thead>
			<tr>
				<th class="number"> No </th>			
				@foreach ($tableGrid as $t)
					@if($t['view'] =='1')
						<th>{{ $t['label'] }}</th>
					@endif
				@endforeach
			  </tr>
        </thead>

        <tbody>
						
            @foreach ($rowData as $row)
                <tr>
					<td width="30"> {{ ++$i }} </td>	
				@foreach ($tableGrid as $field)
					 @if($field['view'] =='1')
					 	<?php $limited = isset($field['limited']) ? $field['limited'] :''; ?>
					 	@if(SiteHelpers::filterColumn($limited ))
						 <td>					 
						 	{!! SiteHelpers::formatRows($row->{$field['field']},$field ,$row ) !!}						 
						 </td>
                                                 
						@endif	
					 @endif					 
				 @endforeach				 
				
                </tr>
				
            @endforeach
              
        </tbody>
      
    </table>
	<input type="hidden" name="md" value="" />
	</div>
	
      <div class="pop-up pop_up_box">
        <div class="col-md-12 cln-padding"></div>
        {!! Form::open(array('route'=>'principalfileuploaddownload.store', 'class'=>'form-horizontal','id'=>'resource1', 'parsley-validate'=>'','novalidate'=>' ','enctype'=>"multipart/form-data")) !!}
    <div class="">
      <div class="col-md-12">

        <div class="form-group">

          <div class="col-md-6">

            <label for="CSVFILE" class=" control-label text-left"> Download Production Format  </label><br>
            <label style="font-weight:normal;font-size:13px;    "></label><a style="margin-top: -29px;float: right;" href="https://s3.amazonaws.com/www.viziblexdms.com/PRINCIPAL_UPLOAD/1546696232-11-8.csv" class="tips btn btn-sm  btn-primary align-right" >Download</a>
           

  

                  </div> 

                  <div class="col-md-6">

                    <div class="toggle-radio">
                      <label for="file1" class=" control-label text-left"> Include Header </label>
                      <div style="position: absolute;right: 20px;top: -2px;">
                        <label for="yes">Yes</label>
                        <input type="radio" name="rdo" id="yes" value="Y" checked>
                        <label for="no">No</label>
                        <input type="radio" name="rdo" id="no" value="N">
                      </div>
                    </div><br>
                    <label for="file" class=" control-label text-left"> Upload File </label>
                    <input type="file" class="form-control btn file" id="file" name="file" >
                    <p id="error1" style="display:none; color:#FF0000;">
                    Invalid File Format! File Format Must Be csv.
                    </p>
                    <p id="error2" style="display:none; color:#FF0000;">
                    Maximum File Size Limit is 1 mb.
                    </p>

                  </div> 

              </div>   
        
        
        
        
        


              <div class="form-group">
                <div class="col-md-2"></div>
                <div class="col-md-8">

                </div> 
                <div class="col-md-2"></div>
              </div>

              <div class="form-group">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                </div> 
                <div class="col-md-2"></div>
              </div>









            </div>
          </div>  






          <div class="modal-footer">

            <form method="GET"  id="myform" accept-charset="UTF-8">
              <input type="submit" name="submit" class="btn btn-sm btn-primary submit" id="submit" value="Upload">
              <button type="button" class="btn btn-sm btn-primary  pop-hide right-x"  >Close</button>
            </form>

            <div id="cover" > </div>
          </div>
          {!! Form::close() !!}
    </div>    
         
	



	</div>
</div>	
	</div>	  
</div>
<script>      
          var a=0;
//binds to onchange event of your input field
$('#file').bind('change', function() {
 //alert("dsd")
if ($('#submit').attr('disabled',false)){
	$('#submit').attr('disabled',true);
	}
var ext = $('#file').val().split('.').pop().toLowerCase();
if ($.inArray(ext, ['csv']) == -1){
	$('#error1').slideDown("slow");
	$('#error2').slideUp("slow");
        $('.submit').attr('disabled',true);
	a=0;
	}else{
	var picsize = (this.files[0].size);
	if (picsize > 1000000){
	$('#error2').slideDown("slow");
	a=0;
        $('.submit').attr('disabled',true);
       // alert("dsd")
	}else{
	a=1;
	$('#error2').slideUp("slow");
	}
	$('#error1').slideUp("slow");
	if (a==1){
		$('#submit').attr('disabled',false);
		}
}
});    
</script>

      <style type="text/css">
.pop_up_box {
    position: absolute;
    top: 15%;
    right: 10%;
    left: 17%;
    width: 59%;
    background-color: #fefefe;
    padding: 10px;
    z-index: 999;
    display: none;
    border: 1px solid #c5c5c5;
    box-shadow: 0 0 1px #000;
}
          
          
          
          
          
        table.dataTable tbody td:nth-child(2), table.dataTable tbody td:nth-child(3), table.dataTable tbody td:nth-child(4)
    {text-align:left !important;}
    
    table.dataTable tbody td:nth-child(1)
    {text-align:center !important;}
   
    table.dataTable tbody td {
    padding: 0px 10px 0px 10px !important;
    line-height: 23px;
}
table.dataTable tbody td:last-child {padding: 0px 0px 0px 0px !important;}
p { margin: 0 0 0px !important;}

        #diamond_table_length {
            margin-left: 5px;
            margin-top: -10px;
        }

        #diamond_table_filter {
            margin-right: 10px;
            margin-top: -13px;
        }

        #diamond_table_length label {font-weight: normal; font-size:13px !important;}

        #diamond_table_filter label {font-weight: normal; font-size:13px !important; }




        #diamond_table_paginate {
            position: fixed;
            bottom: 5px;
            right: 0px;
        }

        #diamond_table_info {
            position: fixed;
            bottom: 5px;
        }
        table.dataTable.no-footer {
            border-bottom: 1px solid #dedede;
        }


        table.dataTable thead th, table.dataTable tfoot th {
            font-weight: inherit;

        }

        .border {
            border-left: 1px solid #ddd;
            border-right: 1px solid #ddd;
            border-bottom: 1px solid #ddd;
        }

        .divheight {
            padding: 4px;

        }

        .bold_size {
            font-size: 11px;
        }

        .table > caption + thead > tr:first-child > th, .table > colgroup + thead > tr:first-child > th,
        .table > thead:first-child > tr:first-child > th, .table > caption + thead > tr:first-child > td,
        .table > colgroup + thead > tr:first-child > td, .table > thead:first-child > tr:first-child > td {
            border-top: 0;
            background-color: #e2e2e2;
            line-height: 1.82857143;
            vertical-align: top;
            padding: 6px;
            border-top: 1px solid #ddd;
            white-space: nowrap;
        }
        .table > tbody > tr > td, .table > tbody > tr > th, .table > tfoot > tr > td,
        .table > tfoot > tr > th, .table > thead > tr > td, .table > thead > tr > th {
            white-space: nowrap;
            padding: 5px;

        }

        .multicollab_table td {
            padding: 4px;
            white-space: nowrap;
        }

        .multicollab_table input[type="text"]  {
            height: 18px;
            width: 40%;
        }

        figure a {
            color: white;
        }

        .btn-group-xs>.btn, .btn-xs {
            font-size: 11px;
            line-height: 1.5;
        }

        .dataTables_wrapper.no-footer .dataTables_scrollBody {
            border-bottom: 1px solid #ddd;
        }




        /* Check Box */
        input[type="checkbox"] {
            -webkit-appearance: none !important;
            -moz-appearance:    none !important;
            appearance:         none !important;
            background-color: #fff;
            border-radius: 2px;
            border: 1px solid;
            padding: 6px;
            margin-bottom: 0;
            display: inline-block;
            position: relative;
            cursor: pointer;
            height: 11px;
            width: 11px;
        }

        input[type="checkbox"]:active,
        input[type="checkbox"]:checked:active {
            box-shadow: 0 1px 2px rgba(0,0,0,0.05), inset 0px 1px 3px rgba(0,0,0,0.1);
        }

        input[type="checkbox"]:checked {
            background-color: #fff;
            border: 1px solid #black;
            color: black;
        }

        input[type="checkbox"]:checked:after {
            content: '\2714';
            font-size: 11px;
            position: absolute;
            top: -2px;
            left: 1px;
            color: black;
        }

        .same {
            border: 1px solid #e1e1e1;
            box-shadow: 0 1px #fff, inset 0 1px 4px rgba(0, 0, 0, 0.15);
            border-radius: 3px;
            height: 18px;
            min-height: 21px;
            padding: 0px 10px;
            width: 100%;
        }

        .filter_table tr td {
            padding: 3px;
        }


        .over {
            position: absolute;
            right: 2%;

        }

        .filter tr td {
            padding: 5px;
            width: 1%;
        }

        label {
            display: inline-block;
            margin-top: 5px;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .outline {
            border: 1px solid gray;
        }


        /*hide no*/
        #diamond_table_length {
            display: none;
        }
      </style>



      <script>
          $(document).ready(function () {

              $('.do-quick-search').click(function () {
                  $('#SximoTable').attr('action', '{{ URL::to("orderdetail/multisearch")}}');
                  $('#SximoTable').submit();
              });

          });
      </script>

      <script>
          $(".DATE").datepicker({
              dateFormat: 'dd-mm-yy',
              changeMonth: true,
              changeYear: true,
              //  onSelect: function (selected) {
              // $(".DOCUMENT_DUE_DATE").datepicker("option", "minDate", selected)

          });
      </script>

      <script type="text/javascript">

          $(document).ready(function () {
              var table = $('#diamond_table').DataTable({
                  searching: false,
                  scrollCollapse: true,
                  //            scrollX: true,
                  ordering: false,
                  responsive: true,
                  //            paging: true,
                  //            bFilter: false,
                  //            bInfo: false,
                  fixedColumns: {
                      leftColumns: 2,
                      rightColumns: 0
                  }
              });

          });





      </script>

     <script>
    $(document).ready(function () {

        $("#show").click(function () {
            $(".log").show();
        })

    });

</script>

<script>
    $(".space, .multicollab_table, .page-header").click(function () {
        //alert("in");
        $(".log").hide();
        $(".highlight").css("background", "transparent");


    });

</script>

<script>
    $(document).ready(function () {
        $(".bttn").click(function () {
            $(".highlight").css("background", "#5450507a");
        });
    });
</script>
@stop