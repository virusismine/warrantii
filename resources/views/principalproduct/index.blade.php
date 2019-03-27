@extends('layouts.app')

@section('content')
{{--*/ usort($tableGrid, "SiteHelpers::_sort") /*--}}
<div class="page-content row">


  <div class="page-content-wrapper m-t">	 	

    <div class="sbox animated fadeInRight">
      <div class="sbox-title">
        <h3><i class="icon-bars"></i>  {{ $pageTitle }} <small>{{ $pageNote }}</small></h3>

        
        <div class="page-title half-div">
<!--<h3> {{ $pageTitle }} <small>{{ $pageNote }}</small></h3>-->
          <a href="#" class="tips icon-btn index-page" title="Summary"><img src="{{ asset('sximo/images/icons/summary.png')}}" /></a>

          <a href="{{ URL::to('principalproduct/create') }}" class="tips icon-btn index-page" title="Add"><img src="{{ asset('sximo/images/icons/add.png')}}" /></a>

          <a href="#" class="tips icon-btn index-page" title="Print"><img src="{{ asset('sximo/images/icons/print.png')}}" /></a>
          <a href="#" class="tips icon-btn index-page" title="Info"><img src="{{ asset('sximo/images/icons/info.png')}}" /></a>
          <a href="#" class="tips icon-btn index-page" title="Export"><img src="{{ asset('sximo/images/icons/export.png')}}" /></a>
        </div>
        <div class="text-right half-div" style='    margin-top: -22px;'> 
            <a id="show_popup" class="tips icon-btn index-page" title="Search"><img src="{{ asset('sximo/images/icons/filter.png')}}"/></a>
            <a href="#" class="tips icon-btn index-page" title="Menu"><img src="{{ asset('sximo/images/icons/menu-button.png')}}" /></a>
        </div>
         <div class="pop-up pop_up_box">
        <div class="col-md-12 cln-padding"><button class="pop-hide right-x">&#10006;</button></div>
        <form class="form-horizontal">
        <div class="col-md-12 cln-padding">
        <div class="form-group">
            <label for="PRODUCT_CODE" class=" control-label col-md-5 no-padding text-left">Product Code</label>
            <div class="col-md-7 no-padding">
               <input type="text" id="PRODUCT_CODE" class="form-control PRODUCT_CODE" required="" name="PRODUCT_CODE" >                     
            </div>
        </div>     
        </div>
          
        <div class="col-md-12 cln-padding">
            <div class="form-group">
            <label for="PRODUCT_NAME" class=" control-label col-md-5 no-padding text-left">Product Name</label>
            <div class="col-md-7 no-padding">
                <input type="text" id="PRODUCT_NAME" class="form-control PRODUCT_NAME" required="" name="PRODUCT_NAME" >                     
            </div>
            </div>     
        </div>  
            
        <div class="col-md-12 cln-padding">
            <div class="form-group">
            <label for="BRAND_CODE" class=" control-label col-md-5 no-padding text-left">Brand Code</label>
            <div class="col-md-7 no-padding">
            <input type="text" id="BRAND_CODE" class="form-control BRAND_CODE" required="" name="BRAND_CODE" >                     
            </div>
            </div>     
        </div> 
           

            
        <div class="col-md-12 cln-padding">
            <div class="form-group">
            <label for="CATEGORY_CODE" class=" control-label col-md-5 no-padding text-left">Category Code</label>
            <div class="col-md-7 no-padding">
                <input type="text" id="CATEGORY_CODE" class="form-control CATEGORY_CODE" required="" name="CATEGORY_CODE" >                     
            </div>
            </div>     
        </div>
            
        <div class="col-md-12 cln-padding">
            <div class="form-group">
            <label for="YEAR_LAUNCH" class=" control-label col-md-5 no-padding text-left">Year of Launch</label>
            <div class="col-md-7 no-padding">
                <input type="text" id="YEAR_LAUNCH" class="form-control YEAR_LAUNCH" required="" name="YEAR_LAUNCH" >                     
            </div>
            </div>     
        </div>
            
            
        <div class="col-md-12 cln-padding">
            <div class="form-group">
            <label for="STATUS" class=" control-label col-md-5 no-padding text-left">Status</label>
            <div class="col-md-7 no-padding">
            {{ Form::select('STATUS', array(''=>'Select', 'N'=>'New','E'=>'Enabled','D'=>'Disabled'),Input::old('STATUS'),array('class' => 'form-control STATUS','id' => 'STATUS', 'required')) }}                   
            </div>
            </div>     
        </div>
          
        <div class="col-md-12 cln-padding">
            <div class="form-group">
                <label for="TAX_CLASS_DESC" class=" control-label col-md-5 no-padding text-left"></label>
                <div class="col-md-7 no-padding" style="text-align:right;">
                <button type="button" class="tips btn btn-sm btn-primary" onclick="searchprincipalproduct()">Search</button>                           
                </div>
            </div>     
        </div> 
        </form>
    </div>
      </div>
      <div class="sbox-content"> 	


        {!! Form::open(array('url'=>'principalproduct/delete/', 'class'=>'form-horizontal' ,'id' =>'SximoTable' )) !!}
        <div class="table-responsive" style="min-height:300px;">
           <table width="100%" class="table display cell-border diamond_table" id="diamond_table" cellpadding="0" cellspacing="0">
                <thead>
                            <tr style="background-color: rgb(255, 255, 255);">
                            <th style=" min-width: 60px;">#</th>
                            <th>Product Code </th>
                            <th>Product Name </th>
                            <th>Brand Code</th>
                            <th>Category Code</th>
                            <th>Model Number</th>
                            <th>Year Of Launch </th>
                            <th>Product Measuring Unit </th>
                            <th>Product Unit Price </th>
                            <th>Discount </th>
                            <th>Shipping Type </th>
                            <th>Product Trace </th>
                            <th>Doa </th>
                            <th>Status </th>
                            </tr>
                </thead>

            </table>
          <input type="hidden" name="md" value="" />
        </div>
        {!! Form::close() !!}
      
      </div>
    </div>	
  </div>	  
</div>





<input type="hidden" id="length1" name="length1" value="20">
<style type="text/css">
table thead tr th{
   text-align: center;
}
  
table.dataTable tbody td:nth-child(2), table.dataTable tbody td:nth-child(3)
    {text-align:left !important;}
    
    table.dataTable tbody td:nth-child(1)
    {text-align:center !important;}
   
 table.dataTable tbody td {
    padding: 0px 10px 0px 10px !important;
    line-height: 23px;
}
table.dataTable tbody td:last-child {padding: 0px 0px 0px 0px !important;}
    
  table.dataTable tbody th, table.dataTable tbody td {
    padding: 0px 10px 0px 10px !important;
    line-height: 23px;
}
    
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
  
/*table.dataTable tbody th, table.dataTable tbody td {
    padding: 0px 10px !important;
}*/

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

/*  table.dataTable tbody th, table.dataTable tbody td {
      padding: 2px 10px !important;
  }*/


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
   
<script>
    
     function searchprincipalproduct() {
    $(".pop-up").hide();
//     alert("days")  ;
//       if(days<=31) {
           oTable.ajax.reload(); 

       
    }
    
    
$(document).ready(function(){
var windowHeight = $(window).innerHeight();

//alert(windowHeight);
        var trx = $('tr').eq(0).height();
//          alert(trx);
        var limit = (windowHeight / trx);
       var indisplaylength1 = parseInt(limit) + 2 ;
        $('#length1').val( indisplaylength1);
//          alert(limit);

//        
                oTable = $('#diamond_table').DataTable({
            "processing": true,
//            oLanguage: {
//                sProcessing: "<img src='https://media.giphy.com/media/gmwdx428w9puw/giphy.gif' style='height:68px;z-index:100;'>"
//            },
            "serverSide": true,
            "ajax": {
                "url": "{{ url('searchproduct') }}",
                "dataType": "json",
                "type": "POST",
                "_token": $(this).find('input[name=_token]').val(),
                data: {
                           
                    PRODUCT_CODE: function () {
                        return $('#PRODUCT_CODE').val();
                    },
                    PRODUCT_NAME: function () {
                        return $('#PRODUCT_NAME').val();
                    },
                    BRAND_CODE: function () {
                        return $('#BRAND_CODE').val();
                    },
                    CATEGORY_CODE: function () {
                        return $('#CATEGORY_CODE').val();
                    },
                    YEAR_LAUNCH: function () {
                        return $('#YEAR_LAUNCH').val();
                    },
                    STATUS: function () {
                        return $('#STATUS').val();
                    },
                   
                     length1: function () {
                        return $('#length1').val();
                    }
                   
              
    }     
            },
            "columns": [
                {"data": "1"},
                {data: "2",
                    
                    
                    
                render: function (data) {
                    var items = data.split(',');
                       return '<a href='+ 'principalproduct' + '/' + items[1] + '>' + items[0] + '</a>';
                }
                },
                {"data": "3"},
                {"data": "4"},
                {"data": "5"},
                {"data": "6"},
                {"data": "7"},
                {"data": "8"},
                {"data": "9"},
                {"data": "10"},
                {"data": "11"},
                {"data": "12"},
                {"data": "13"},
                {data: "14",
               render: function (data) {
 
                   if (data == 'E') {
                       return  '<div class="E"> ENABLED </div>';
                   } else if(data == 'D') {
                       return '<div class="D"> DISABLED </div>';
                   } else if(data == 'N') {
                       return '<div class="N"> NEW </div>';
                   }
 
               }
                },
            ],    
                    
            initComplete: function () {
                this.api().columns().every(function () {
                    var column = this;
                    var select = $('<select><option value=""></option></select>')
                            .appendTo($(column.footer()).empty())
                            .on('change', function () {
                                var val = $.fn.dataTable.util.escapeRegex(
                                        $(this).val()
                                        );

                                column
                                        .search(val ? '^' + val + '$' : '', true, false)
                                        .draw();
                            });

                    column.data().unique().sort().each(function (d, j) {
                        select.append('<option value="' + d + '">' + d + '</option>')
                    });
                });

            },
           
            "bLengthChange": false,
            "searching": false,
            scrollX: true,
            scrollCollapse: true,
            scroller: false,
           iDisplayLength: indisplaylength1,
           oLanguage: {
           sEmptyTable: "Sorry, no results found!"
           }
           
        });
});

</script> 
@stop