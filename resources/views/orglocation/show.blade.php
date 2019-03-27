@extends('layouts.app')
@section('content')

	<div class="page-content row">	
<div class="page-content-wrapper">
    <ul class="parsley-error-list">
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
<div class="sbox animated fadeInRight">
	<div class="sbox-title">
	
                   <div class="page-title half-div">
     
        <a href="{{ URL::to('orglocation') }}" class="tips icon-btn show-page" title="Back"><img src="{{ asset('sximo/images/icons/back.png')}}"  /></a>
        <a href="{{ URL::to('orglocation/'.$location[0]->LOCATION_CODE.','.$location[0]->ORG_UA_ID.'/edit')}}" class="tips icon-btn show-page" title="Edit"><img src="{{ asset('sximo/images/icons/edit.png')}}"  /></a>
        <a href="#" class="tips icon-btn show-page" title="Print"><img src="{{ asset('sximo/images/icons/print.png')}}"  /></a>
        <a href="#" class="tips icon-btn show-page" title="Menu"><img src="{{ asset('sximo/images/icons/menu-button.png')}}"  /></a>
        <a href="#" class="tips icon-btn show-page" title="Info"><img src="{{ asset('sximo/images/icons/info.png')}}"  /></a>
        <a href="#" class="tips icon-btn show-page" title="Export"><img src="{{ asset('sximo/images/icons/export.png')}}"  /></a>
     </div>
	</div>


              <style>
    .nav-tabs > li > a {

        color: #fff;
        font-weight: 500;
        background-color: #0777c0e6;
        padding: 5px 15px 5px 20px;
        font-size: 13px;

    }
    
    #collaboration .help-inline, #check-req .help-inline {padding-left: 30px !important;}
    legend {text-align: center; background-color:#005b96; color:white; font-size: 14px; margin-bottom: 0px;}
    .red-alert {
  border-color: #800000;
  border-width: 3px;
}

span .help-inline {display: none !important;}
  </style>
            <div class="sbox-content"> 
      

   {!! Form::model($location,array('route' => array('orglocation.update', $location[0]->LOCATION_CODE.','.$location[0]->ORG_UA_ID),'class'=>'form-horizontal','id'=>'resource1', 'method'=>'PUT','files' => true ,'parsley-validate'=>'','novalidate'=>' ')) !!} 
    

    <div class="" style="background-color:white; margin-top:">
      <input type="hidden" id="UA_ID"  name="UA_ID" class="UA_ID" value="{{$location[0]->ORG_UA_ID}}">
         <input type="hidden" id="LOCATION_ID"  name="LOCATION_ID" class="LOCATION_ID" value="{{$location[0]->LOCATION_ID}}">

      <div class="tabbable tabbable-custom">

        <ul class="nav nav-tabs cls" style="">
          <li class="active"><a href="#tab_1_4" id="tab3" data-toggle="tab" style="background-color:#0090d9;color:white">Organization location Details</a></l> 
         
        </ul>

        <div class="tab-content">

              <div class="tab-pane active" id="tab_1_7" style='overflow: hidden'>
     <div class="col-md-12 min-scroll"><br>
            <div class="row" style="min-width: 600px;">
            <div class="col-md-2"></div>
            <div class="col-md-4 col-sm-4 col-xs-4">      
                 <div class="form-group">
                   <div class="col-md-2"></div>
                  <div class="col-md-8">
                    <label for="LOCATION_NAME" class=" control-label text-left"> Location Name </label>
                    <input type="text" class="form-control LOCATION_NAME" id="LOCATION_NAME" name="LOCATION_NAME" value="{{$location[0]->LOCATION_NAME}}" disabled="">
                  </div> 
                  <div class="col-md-2"></div>
                </div>
               <div class="form-group">
                 <div class="col-md-2"></div>
                  <div class="col-md-8">
                    <label for="LOCATION_CODE" class=" control-label text-left">  Location Code </label>
                    <input type="text" class="form-control LOCATION_CODE" id="LOCATION_CODE" name="LOCATION_CODE" value="{{$location[0]->LOCATION_CODE}}" disabled="">
                  </div> 
                  <div class="col-md-2"></div>
                </div>
              
                <div class="form-group">
                  <div class="col-md-2"></div>
                  <div class="col-md-8">
                    <label for="LOCATION_TYPE" class=" control-label text-left"> Location Type </label>
               {!! Form::select('LOCATION_TYPE', array(''=>'--Select--', 'O'=>'Office','P'=>'Plant','M'=>'Market','D'=>'Depot'),array('value'=>$location[0]->LOCATION_TYPE),array('class' => 'form-control LOCATION_TYPE','required','disabled')) !!}
                  </div> 
                  <div class="col-md-2"></div>
                </div> 
              
                <div class="form-group">
                  <div class="col-md-2"></div>
                  <div class="col-md-8">
                    <label for="ADDRESS" class=" control-label text-left"> Address </label>
                    <input type="text" class="form-control ADDRESS" id="ADDRESS" name="ADDRESS" value="{{$location[0]->ADDRESS}}" disabled="">
                  </div> 
                  <div class="col-md-2"></div>
                </div>                
            </div>
            
            <div class="col-md-4 col-sm-4 col-xs-4">      
                <div class="form-group">
                  <div class="col-md-2"></div>
                  <div class="col-md-8">
                    <label for="CITY" class=" control-label text-left"> City </label>
                  {!! Form::select('CITY',array(''=>'Select City')+$city,  array('value'=>$location[0]->CITY), array('class' => 'form-control CITY','id'=>'CITY','required','disabled')) !!}
                  </div> 
                  <div class="col-md-2"></div>
                </div>       
              
                <div class="form-group">
                  <div class="col-md-2"></div>
                  <div class="col-md-8">
                    <label for="STATE" class=" control-label text-left"> State </label>
           {!! Form::select('STATE',array(''=>'Select State')+$state,  array('value'=>$location[0]->STATE), array('class' => 'form-control STATE','id'=>'STATE','required','disabled')) !!}
                  </div> 
                  <div class="col-md-2"></div>
                </div>               
              
                <div class="form-group">
                  <div class="col-md-2"></div>
                  <div class="col-md-8">
                    <label for="COUNTRY" class=" control-label text-left"> Country </label>
                    {!! Form::select('COUNTRY',array('99'=>'India')+$country, array('value'=>$location[0]->COUNTRY), array('class' => 'form-control COUNTRY','id'=>'COUNTRY','required','disabled')) !!}
                  </div> 
                  <div class="col-md-2"></div>
                </div>   
              
                <div class="form-group">
                <div class="col-md-2"></div>
                    <div class="col-md-8">
                    <label for="HOST_USER" class=" control-label text-left"> Host User </label> <a class="tips field-hint" data-toggle="control-sidebar"><img src="{{ asset('sximo/images/question.png')}}" /></a><br>
                        @if($location[0]->HOST_USER == '1')
                        <input type="checkbox" id="HOST_USER" name="HOST_USER" class="form-control HOST_USER" checked=""  readonly="">
                         @else
                         <input type="checkbox" id="HOST_USER" name="HOST_USER" class="form-control HOST_USER" unchecked="" readonly="">
                         @endif
                    </div> 
                  <div class="col-md-2"></div>
                 </div>
              
              
              
              
              
            </div>
            
            <div class="col-md-2"></div>
        </div>
        </div>
        
              </div>  
              </div>        
       


    
          
          
          
          
      
        </div>


      </div>
    
  </div>
    
  <div class="col-md-12 btn-right-bottom" >  <br>
    <div class="form-group">
      <div class="col-sm-12" style="text-align: left; left:225px;">	
        <input type="submit" name="submit" class="tips btn btn-sm  btn-primary align-right submit hidden" onclick="check_valid()" value="{{ Lang::get('core.sb_save') }}  " />
        <!--<a href="{{ URL::to('principal') }}" class="tips btn btn-sm  btn-primary ">{{ Lang::get('core.sb_cancel') }}</a>-->
      </div>	  
    </div> 
  </div>  
   
    {!! Form::close() !!}
  </div> 

   

</div> 


</div>	


 
 
<script>
    
</script>    

<script>

    
    
    
    
    $(document).ready(function () {
        function setHeightx() {
        var    windowHeight = $(window).innerHeight();
        var    x = windowHeight-150;
          //  alert(x);
            $('.sbox-content').css('height', x);
            
            // $('.viru').css('height', x);
        }
        ;
        setHeightx();

        $(window).resize(function () {
            setHeightx();
        });
    });


    $(window).resize(function () {
        function setHeightx1() {
          var  windowHeight = $(window).innerHeight();
         var   x = windowHeight-150;
           //  alert("resize" + x);
     $('.sbox-content').css('height', x);
            // $('.viru').css('height', x);
        }
        ;
        setHeightx1();

        $(window).resize(function () {
            setHeightx1();
        });
    });
  function check_valid()
{
var o_name =$(".ORG_NAME").val();
var o_type =$(".ORG_TYPE").val();
var o_code =$(".ORG_CODE").val();
var o_email =$(".ORG_EMAIL_ADDRESS").val();
var o_mobile =$(".ORG_PHONE_MOBILE").val();
var o_pin =$(".ORG_ADDR_PIN").val();
var o_city =$(".ORG_ADDR_CITYOVI").val();
var o_state =$(".ORG_ADDR_STATE").val();
var o_locationcode =$(".LOCATION_CODE").val();
var o_order_coll = $(".ORDER_COLLABORATION").is(":checked");
var o_product_trace = $(".PRODUCT_TRACING").is(":checked");

var a_first_name =$(".first_name").val();
var a_gender =$(".gender").val();
var a_marital_status =$(".marital_status").val();
var a_email =$(".email").val();
var a_pasword =$("#password").val();
var a_pin =$(".addr_pin").val();
var a_mobile =$(".phone_mobile").val();
var a_city =$(".addr_citovi").val();
var a_state =$(".addr_state").val();
var a_access =$(".ACCESS_TYPE").val();
var a_usercode =$(".USER_CODE").val();


var onlytext=/^([a-zA-z ])+$/;
var onlycode=/^(?=.*[A-Z]{1,})[A-Z\d]{2,20}$/;
var validemail=/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/;
var onlynumber=/^([0-9]{10,10})+$/;
var onlypin=/^([0-9]{6,6})+$/;
var onlypass= /^.{8,}$/;

if(o_type === "" )
{
 /* alert("please enter the FirstName"); */
  $.tappification({ type: 'danger', message: 'Please Select Organization Type' }); 
  $(".ORG_TYPE").focus();
  return false;
}

else if(o_name === "" )
{
  $.tappification({ type: 'danger', message: 'Please Enter The Organization Name' });
  $(".ORG_NAME").focus();
  return false;
}

else if(!o_name.match(onlytext))
{
  $.tappification({ type: 'danger', message: 'Please Enter Name Only in Alphabets' });
  $(".ORG_NAME").focus();
  return false;
}

else if(o_code === "" )
{
  $.tappification({ type: 'danger', message: 'Please Enter The Organization Code' });
  $(".ORG_CODE").focus();
  return false;
}

else if(!o_code.match(onlycode))
{
  $.tappification({ type: 'danger', message: 'Please Enter Code in Capital Value and Numeric' });
  $(".ORG_CODE").focus();
  return false;
}

else if(o_email === "" )
{
  $.tappification({ type: 'danger', message: 'Please Enter Organization E-mail' });
  $(".ORG_EMAIL_ADDRESS").focus();
  return false;
}

else if(!o_email.match(validemail))
{
  $.tappification({ type: 'danger', message: 'Please Enter Correct E-mail Address' });
  $(".ORG_EMAIL_ADDRESS").focus();
  return false;
}

else if(o_mobile === "" )
{
  $.tappification({ type: 'danger', message: 'Please Enter Organization Mobile Number' });
  $(".ORG_PHONE_MOBILE").focus();
  return false;
}

else if(!o_mobile.match(onlynumber))
{
  $.tappification({ type: 'danger', message: 'Please Enter Correct Mobile Number' });
  $(".ORG_PHONE_MOBILE").focus();
  return false;
}

else if(o_pin === "" )
{
  $.tappification({ type: 'danger', message: 'Please Enter Organization Pin Code' });
  $(".ORG_ADDR_PIN").focus();
  return false;
}

else if(!o_pin.match(onlypin))
{
  $.tappification({ type: 'danger', message: 'Please Enter Correct Pin Code' });
  $(".ORG_ADDR_PIN").focus();
  return false;
}

else if(o_city === "" )
{
  $.tappification({ type: 'danger', message: 'Please Select Organization City' });
  $(".ORG_ADDR_CITYOVI").focus();
  return false;
}

else if(o_state === "" )
{
  $.tappification({ type: 'danger', message: 'Please Select Organization State' });
  $(".ORG_ADDR_STATE").focus();
  return false;
}

else if(o_locationcode === "" )
{
  $.tappification({ type: 'danger', message: 'Please Enter Organization Location Code' });
  $(".LOCATION_CODE").focus();
  return false;
}

else if(!o_locationcode.match(onlycode))
{
  $.tappification({ type: 'danger', message: 'Please Enter Code in Capital Value and Numeric' });
  $(".LOCATION_CODE").focus();
  return false;
}

else if(!o_order_coll)
{
  $.tappification({ type: 'danger', message: 'Please Check Organization Order Collaboration' });
  return false;
}
else if(!o_product_trace)
{
  $.tappification({ type: 'danger', message: 'Please Check Organization Product Tracing' });
  return false;
}

else if(a_first_name === "" )
{
  $.tappification({ type: 'danger', message: 'Please Enter Admin First Name' });
  $(".first_name").focus();
  return false;
}

else if(!a_first_name.match(onlytext))
{
  $.tappification({ type: 'danger', message: 'Please Enter Name Only in Alphabets' });
  $(".first_name").focus();
  return false;
}

else if(a_gender === "" )
{
  $.tappification({ type: 'danger', message: 'Please Select Admin Gender' });
  $(".gender").focus();
  return false;
}

else if(a_marital_status === "" )
{
  $.tappification({ type: 'danger', message: 'Please Select Marital Status' });
  $(".marital_status").focus();
  return false;
}

else if(a_email === "" )
{
  $.tappification({ type: 'danger', message: 'Please Enter Admin E-mail' });
  $(".email").focus();
  return false;
}

else if(!a_email.match(validemail))
{
  $.tappification({ type: 'danger', message: 'Please Enter Correct E-mail Address' });
  $(".email").focus();
  return false;
}

else if(!a_pasword.match(onlypass)) {
   $.tappification({ type: 'danger', message: 'Password must be minimum 8 charactors' });
   $("#password").focus();
  return false;
}

else if(!a_pin.match(onlypin))
{
  $.tappification({ type: 'danger', message: 'Please Enter Correct Pin Code' });
  $(".addr_pin").focus();
  return false;
}

else if(!a_mobile.match(onlynumber))
{
  $.tappification({ type: 'danger', message: 'Please Enter Correct Mobile Number' });
  $(".phone_mobile").focus();
  return false;
}

else if(a_city === "" )
{
  $.tappification({ type: 'danger', message: 'Please Select Admin City' });
  $(".addr_citovi").focus();
  return false;
}

else if(a_state === "" )
{
  $.tappification({ type: 'danger', message: 'Please Select Admin State' });
  $(".addr_state").focus();
  return false;
}

else if(a_access === "" )
{
  $.tappification({ type: 'danger', message: 'Please Select Admin Access Type' });
  $(".ACCESS_TYPE").focus();
  return false;
}

else if(!a_usercode.match(onlycode) )
{
  $.tappification({ type: 'danger', message: 'Please Enter Code in Capital Value and Numeric' });
  $(".USER_CODE").focus();
  return false;
}

  
    else
    {
	return true;
    }
}  
 
    
</script>

<script>
    function myFunction() {
        var popup = document.getElementById("myPopup");
        popup.classList.toggle("show");
    }
</script>     


<script type="text/javascript">
function page_submit(){
//    alert("submit");
     $('.submit').click();
}

   



    $(function () {


//        $('#contact').on('keyup', '.NO_OF_DAYS,.VALUE_WITH_TAX,.VALUE_WITHOUT_TAX,.TAX_ID,.TAX_AMOUNT,.TOTAL', calculateRow);
//        $('.TOTALDISCOUNT,.TAX_AMOUNT,.FREIGHT,.FREIGHT_TAX_AMOUNT').on('input', function () {
//            var sum = $("#DOCUMENT_SUB_TOTAL").val();
//
//            var totaltax = $("#TOTAL_TAX").val();
//            var totaldiscount = $("#TOTALDISCOUNT").val();
//
//            var d = totaldiscount;
//
//
//            var a = sum - d;
//
//            var b = a  // grandtotal=subtotal - discount/100 +totaltax
//
//            $("#GRAND_TOTAL").val(b.toFixed(2));
//            var f = 0;
//            f = $("#FREIGHT").val();
//
//            if (f != 0) {
//                var c = b + parseInt(f);
//            } else {
//                var c = b;
//            }
//            var fright_val = $("#FREIGHT_TAX_AMOUNT").val();
//            // alert(fright_val);
//            var x = c + parseInt(fright_val);
//            $("#GRAND_TOTAL").val(x.toFixed(2));
//            $("#GRAND_TOTAL1").val(x.toFixed(2));
//
//
//
//        });






//                 $(function() {
//  $("#BP_ID").customselect({
//          maxListSize: 100, 
//         // hoveropen:  true
//        });
//});
//                

//                 $(function () {
//                        $("#BP_ID").customselect({
//                            maxListSize: 100,
//                            // hoveropen:  true
//                        });
//                });
//                
//                $(function () {
//                        $("#STATE_CODE_ID").customselect({
//                            maxListSize: 100,
//                            // hoveropen:  true
//                        });
//                });                
//                
//                $(function () {
//                        $("#SHIP_FROM").customselect({
//                            maxListSize: 100,
//                            // hoveropen:  true
//                        });  
//                });  
//                
//                $(function () {
//                        $("#DOC_TYPE").customselect({
//                            maxListSize: 100,
//                            // hoveropen:  true
//                        });  
//                });
//                
//                 
//                
//                $(function () {
//                        $("#STATUS").customselect({
//                            maxListSize: 100,
//                            // hoveropen:  true
//                        });
//                });  







        $("#dob").datepicker({
            defaultDate: '0000-00-00', //set the default date to Jan 1st 1990
            changeMonth: true,
            changeYear: true,
            yearRange: '1930:2000', //set the range of years
            dateFormat: 'dd-mm-yy' //set the format of the date
        });






        var form1 = $('#resource1');
        var error1 = $('.alert-error', form1);
        var success1 = $('.alert-success', form1);
        //      alert("hello");
        $("#resource1").validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-inline', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",

            // Specify the validation rules

            //                    rules: {
            //                        BP_ID: {required: true,
            //                            bp: {bp: "0"}
            //                        },
            //                        QUOTATION_SERIES: {required: true,
            //                            series: {series: "0"}
            //                        },
            //                        LINE_TYPE: {required: true,
            //                            line_type: {line_type: "0"}
            //                        },
            //                        //   BP_ID:{required:true},
            ////                        REF_NO: {required: true
            ////                        },
            //                        DOCUMENT_DATE: {required: true},
            //                        DOCUMENT_DUE_DATE: {required: true}
            ////                        
            ////                        TOTAL_TAX:{required:true,digits:true  }          
            //
            //                    },
            //                    onfocusout: function (element) {
            //                        if (!this.checkable(element)) {
            //                            this.element(element);
            //                        }
            //                    },

            errorPlacement: function (error, element) {
                //  var container = $('<span>');
                //  container.addClass('help-inline'); // add a class to the wrapper
                error.insertAfter(element);
                error.wrap('<span>');
//                $("<div class='errorImage'></div>").insertAfter(error);
            },
            //                    invalidHandler: function (event, validator) { //display error alert on form submit              
            //                        success1.hide();
            //                        error1.show();
            //                       // App.scrollTop(error1, -200);
            //                    },
            highlight: function (element) { // hightlight error inputs
                $(element)
                        .closest('.help-inline').removeClass('ok');
                $(element)
                        .closest('.col-md-3').removeClass('success').addClass('error'); // set error class to the control group
                $(element)
                .closest('.form-group').addClass('has-error');
            },
            unhighlight: function (element) { // revert the change done by hightlight


                $(element)
                        .closest('.col-md-3').removeClass('error'); // set error class to the control group
                 $(element)
                        .closest('.form-group').removeClass('has-error');
                
            },
            success: function (label) { 

                //  label
                //                        .addClass('valid').addClass('help-inline ok') // mark the current input as valid and display OK icon
                //                    .closest('.col-md-3').removeClass('error').addClass('success'); 
                label
                        .removeClass('error,has-error')
                        .addClass('valid').addClass('help-inline ok') // mark the current input as valid and display OK icon
                        .closest('.form-group').addClass('success') // set success class to the control group

            },
                    
            submitHandler: function (form) {

//                var TableData1;
//                TableData1 = storeTblValues1();
//                var TableDataw = JSON.stringify(TableData1);
//// alert(TableDataw);
//                $("[name='tableangle1']").val(TableDataw);  //.val get data or insert data in to table

                form.submit();
            }
        });
    });

//    function storeTblValues1()
//    {
//        TableData1 = new Array();  //each extends same as foreach function
//        $('#contact tr').each(function (row, tr) {
//            TableData1[row] = {
//                "LINE_ID": $(tr).find('td:eq(0) .LINE_ID').val()
//                , "PC_CODE": $(tr).find('td:eq(1) .PC_CODE').val()
//                , "PC_NAME": $(tr).find('td:eq(2) .PC_NAME').val()
//                , "PC_DESCRIPTION": $(tr).find('td:eq(3) .PC_DESCRIPTION').val()
//                , "PC_LEVEL": $(tr).find('td:eq(4) .PC_LEVEL').val()
//                , "INCENTIVIZE": $(tr).find('td:eq(5) .INCENTIVIZE').val()
//            }
//        });
//        TableData1.shift(); // first row will be empty - so remove
//        return TableData1;
//    }

</script>   
              
	</div>
</div>	
	</div>	  
</div>	
@stop