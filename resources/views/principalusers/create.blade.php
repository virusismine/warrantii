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
     
        <a href="{{ URL::to('principalusers') }}" class="tips icon-btn create-page" title="Cancel"><img src="{{ asset('sximo/images/icons/back.png')}}"/></a>
    <a class="tips icon-btn create-page" title="Save" onclick="page_submit()"><img src="{{ asset('sximo/images/icons/save.png')}}" /></a>
    <a onclick="window.location.reload()" class="tips icon-btn create-page" title="Reset"><img src="{{ asset('sximo/images/icons/reset.png')}}" /></a>
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
      
  {!! Form::open(array('route'=>'principalusers.store', 'class'=>'form-horizontal','id'=>'resource1' ,'files' => true ,'enctype'=>'multipart/form-data','novalidate'=>' ')) !!}

  
   

    <div class="" style="background-color:white; margin-top:12px">
     
      <div class="tabbable tabbable-custom">

        <ul class="nav nav-tabs cls" style="">
          <li class="active"><a href="#tab_1_4" id="tab3" data-toggle="tab" style="background-color: #0090d9; color:white">Users Details</a></l> 
   

        </ul>

        <div class="tab-content">

          <div class="tab-pane active" id="tab_1_4" style='overflow: hidden'>

        <div class="col-md-12 min-scroll"><br>
            <div class="row min_width">
              
              <div class="col-md-3 col-sm-3 col-xs-3">      
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="first_name" class=" control-label text-left"> First Name </label>
                    {!! Form::text('first_name', Input::old('first_name'),array('class'=>'form-control first_name', 'placeholder'=>'','required', 'pattern'=>'[A-Za-z ]{2,}', 'title'=>'Enter only alphabets' )) !!} 
                  </div> 
                  <div class="col-md-6"></div>
                </div>
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="middle_name" class=" control-label text-left"> Middle Name </label>
                    {!! Form::text('middle_name', Input::old('middle_name'),array('class'=>'form-control middle_name', 'placeholder'=>'')) !!} 
                  </div> 
                  <div class="col-md-6"></div>
                </div>
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="last_name" class=" control-label text-left"> Last Name </label>
                    {!! Form::text('last_name', Input::old('last_name'),array('class'=>'form-control last_name', 'placeholder'=>'')) !!} 
                  </div> 
                  <div class="col-md-6"></div>
                </div>
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="dob" class=" control-label text-left"> Date Of Birth </label>
                    {!! Form::text('dob', Input::old('dob'),array('class'=>'form-control dob','id'=>'dob', 'placeholder'=>'','readonly','required' )) !!} 
                  </div> 
                  <div class="col-md-6"></div>
                </div>
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="gender" class=" control-label text-left"> Gender </label>
                  {!! Form::select('gender', array(''=>'Select', 'M'=>'Male','F'=>'Female'),Input::old('gender'),array('class' => 'form-control gender','required')) !!} 
                  </div> 
                  <div class="col-md-6"></div>
                </div>
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="marital_status" class=" control-label text-left"> Marital Status </label>
                    {!! Form::select('marital_status', array(''=>'Select', 'M'=>'Married','U'=>'Unmarried'),Input::old('marital_status'),array('class' => 'form-control marital_status','required')) !!} 
                  </div> 
                  <div class="col-md-6"></div>
                </div>

              </div>
              
              <div class="col-md-3 col-sm-3 col-xs-3">
                
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="email" class=" control-label text-left"> Email </label>
                    {!! Form::text('email', Input::old('email'),array('class'=>'form-control email', 'placeholder'=>'','required' , 'pattern'=>'[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$')) !!} 
                  </div> 
                  <div class="col-md-6"></div>
                </div>
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="password" class=" control-label text-left"> Password </label>
                     {!! Form::text('password', Input::old('password'), array('class' => 'form-control','id'=>'password','pattern'=>'.{8,}', 'required', 'title'=>'Password must be minimum 8 characters')) !!} 
                  </div> 
                  <div class="col-md-6"></div>
                </div>
                
                
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="addr_house_no" class=" control-label text-left"> House No </label>
                    {!! Form::text('addr_house_no', Input::old('addr_house_no'),array('class'=>'form-control addr_house_no', 'placeholder'=>'')) !!} 
                  </div> 
                  <div class="col-md-6"></div>
                </div>
                
               
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="addr_pin" class=" control-label text-left"> Pin Code </label>
                    {!! Form::text('addr_pin', Input::old('addr_pin'),array('class'=>'form-control addr_pin', 'placeholder'=>'','required', 'maxlength'=>'6','pattern'=>'[0-9]{6}','title'=>'Enter valid Pin Code')) !!} 
                  </div> 
                  <div class="col-md-6"></div>
                </div>

                <div class="form-group">
                  <div class="col-md-6">
                    <label for="phone_mobile" class=" control-label text-left"> Mobile </label>
                    {!! Form::text('phone_mobile', Input::old('phone_mobile'),array('class'=>'form-control phone_mobile', 'placeholder'=>'','required' ,'maxlength'=>'10' ,'pattern'=>'[0-9]{10,10}','title'=>'enter a valid mobile number' )) !!} 
                  </div> 
                  <div class="col-md-6"></div>
                </div>
                
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="LOCATION_CODE" class=" control-label text-left"> Location </label>
                    {!! Form::select('LOCATION_CODE',array(''=>'Select Location')+$location,  Input::old('LOCATION_CODE'), array('class' => 'form-control LOCATION_CODE','id'=>'LOCATION_CODE','required')) !!} 
                  </div> 
                  <div class="col-md-6"></div>
                </div>
                
                


              </div> 
              
              <div class="col-md-3 col-sm-3 col-xs-3">
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="addr_locality" class=" control-label text-left"> Locality </label>
                    {!! Form::text('addr_locality', Input::old('addr_locality'),array('class'=>'form-control addr_locality', 'placeholder'=>'')) !!} 
                  </div> 
                  <div class="col-md-6"></div>
                </div>
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="addr_citovi" class=" control-label text-left"> City </label>
                    {!! Form::select('addr_citovi',array(''=>'Select City')+$city,  Input::old('addr_citovi'), array('class' => 'form-control addr_citovi','id'=>'ORG_ADDR_CITYOVI','required')) !!} 
                  </div> 
                  <div class="col-md-6"></div>
                </div>
                
                
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="addr_district" class=" control-label text-left"> District </label>
                    {!! Form::text('addr_district', Input::old('addr_district'),array('class'=>'form-control addr_district', 'placeholder'=>'')) !!} 
                  </div> 
                  <div class="col-md-6"></div>
                </div>

                <div class="form-group">
                  <div class="col-md-6">
                    <label for="addr_state" class=" control-label text-left"> State </label>
                    {!! Form::select('addr_state',array(''=>'Select State')+$state,  Input::old('addr_state'), array('class' => 'form-control addr_state','id'=>'addr_state','required')) !!} 
                  </div> 
                  <div class="col-md-6"></div>
                </div>

                <div class="form-group">
                  <div class="col-md-6">
                    <label for="addr_country" class=" control-label text-left"> Country </label>
                    {!! Form::select('addr_country',array('99'=>'India')+$country,  Input::old('addr_country'), array('class' => 'form-control addr_country','id'=>'ORG_ADDR_COUNTRY','required')) !!} 
                  </div> 
                  <div class="col-md-6"></div>
                </div>
              </div> 
              
              <div class="col-md-3 col-sm-3 col-xs-3">

                <div class="form-group">
                  <div class="col-md-12">
                    <label for="ACCESS_TYPE" class=" control-label text-left"> Access Type  <a class="tips field-hint" data-toggle="control-sidebar"><img src="{{ asset('sximo/images/question.png')}}" /></a></label>
                    {!! Form::select('ACCESS_TYPE', array(''=>'Select', 'U'=>'User','M'=>'Manager','K'=>'Key Contact'),Input::old('ACCESS_TYPE'),array('class' => 'form-control ACCESS_TYPE','required','required')) !!} 
                  </div> 
                </div>
                
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="USER_CODE" class=" control-label text-left"> User Code </label>
                    {!! Form::text('USER_CODE', Input::old('USER_CODE'),array('class'=>'form-control USER_CODE', 'placeholder'=>'','required', 'maxlength'=>'20', 'pattern'=>'^(?=.*[A-Z]{1,})[A-Z\d]{2,20}$', 'title'=>'Enter only capital and nuneric value' )) !!} 
                  </div> 
                  <div class="col-md-6"></div>
                </div>
                
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="DEPARTMENT" class=" control-label text-left"> Department </label>
                    {!! Form::select('DEPARTMENT', array(''=>'Select', 'IS'=>'IT System','S'=>'Sales','M'=>'Marketing','I'=>'Inventory','SP'=>'Support','MG'=>'Management','F'=>'Finance'),Input::old('DEPARTMENT'),array('class' => 'form-control DEPARTMENT','required','required')) !!} 
                  </div> 
                  <div class="col-md-6"></div>
                </div>
                
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="COUNTRY_CODE" class=" control-label text-left"> Country Code </label>
                    {!! Form::select('COUNTRY_CODE',array('99'=>'India')+$country,  Input::old('COUNTRY_CODE'), array('class' => 'form-control COUNTRY_CODE','id'=>'COUNTRY_CODE','required')) !!}
                  </div> 
                  <div class="col-md-6"></div>
                </div>
                
              </div>  
              </div>
          </div>

          </div>

          </div>
    


          <div class="tab-pane" id="tab_1_5" style='overflow: hidden'>


          </div>
          <input type="hidden" value="2" name="count3" id="count3">
          <input type="hidden" name="tableangle3" id="tableangle3">
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
function check_valid()
{
var first_name =$(".first_name").val();
var dob =$(".dob").val();
var gender =$(".gender").val();
var m_status =$(".marital_status").val();
var email =$(".email").val();
var password =$("#password").val();
var pin =$(".addr_pin").val();
var mobile =$(".phone_mobile").val();
var location =$(".LOCATION_CODE").val();
var city =$(".addr_citovi").val();
var state =$(".addr_state").val();
var access =$(".ACCESS_TYPE").val();
var user_code =$(".USER_CODE").val();
var dept =$(".DEPARTMENT").val();


var onlytext=/^([a-zA-z ]{2,})+$/;
var onlycode=/^(?=.*[A-Z]{1,})[A-Z\d]{2,20}$/;
var validemail=/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/;
var onlynumber=/^([0-9]{10,10})+$/;
var onlypin=/^([0-9]{6,6})+$/;
var onlypass= /^.{8,}$/;

if(first_name === "" )
{
  $.tappification({ type: 'danger', message: 'Please Enter First Name' }); 
  $(".first_name").focus();
  return false;
}

else if(!first_name.match(onlytext))
{
  $.tappification({ type: 'danger', message: 'Please Enter Name Only in Alphabets' });
  $(".first_name").focus();
  return false;
}

else if(dob === "" )
{
  $.tappification({ type: 'danger', message: 'Please Select Date of Birth' }); 
  $(".dob").focus();
  return false;
}

else if(gender === "" )
{
  $.tappification({ type: 'danger', message: 'Please Select Gender' }); 
  $(".gender").focus();
  return false;
}

else if(m_status === "" )
{
  $.tappification({ type: 'danger', message: 'Please Select Marital Status' }); 
  $(".marital_status").focus();
  return false;
}

else if(email === "" )
{
  $.tappification({ type: 'danger', message: 'Please Enter E-mail' });
  $(".email").focus();
  return false;
}

else if(!email.match(validemail))
{
  $.tappification({ type: 'danger', message: 'Please Enter Correct E-mail Address' });
  $(".email").focus();
  return false;
}

else if(!password.match(onlypass))
{
  $.tappification({ type: 'danger', message: 'Password Must be Minimum 8 Characters' });
  $("#password").focus();
  return false;
}

else if(pin === "" )
{
  $.tappification({ type: 'danger', message: 'Please Enter Pin Code' });
  $(".addr_pin").focus();
  return false;
}

else if(!pin.match(onlypin))
{
  $.tappification({ type: 'danger', message: 'Please Enter Correct Pin Code' });
  $(".addr_pin").focus();
  return false;
}

else if(mobile === "" )
{
  $.tappification({ type: 'danger', message: 'Please Enter Mobile Number' });
  $(".phone_mobile").focus();
  return false;
}

else if(!mobile.match(onlynumber))
{
  $.tappification({ type: 'danger', message: 'Please Enter Correct Mobile Number' });
  $(".phone_mobile").focus();
  return false;
}

else if(location === "" )
{
  $.tappification({ type: 'danger', message: 'Please Select Location' }); 
  $(".LOCATION_CODE").focus();
  return false;
}

else if(city === "" )
{
  $.tappification({ type: 'danger', message: 'Please Select City' }); 
  $(".addr_citovi").focus();
  return false;
}

else if(state === "" )
{
  $.tappification({ type: 'danger', message: 'Please Select State' }); 
  $(".addr_state").focus();
  return false;
}

else if(access === "" )
{
  $.tappification({ type: 'danger', message: 'Please Select Access Type' }); 
  $(".ACCESS_TYPE").focus();
  return false;
}

else if(user_code === "" )
{
  $.tappification({ type: 'danger', message: 'Please Enter Organization Location Code' });
  $(".USER_CODE").focus();
  return false;
}

else if(!user_code.match(onlycode))
{
  $.tappification({ type: 'danger', message: 'Please Enter Code in Capital Value and Numeric' });
  $(".USER_CODE").focus();
  return false;
}

else if(dept === "" )
{
  $.tappification({ type: 'danger', message: 'Please Select Department' }); 
  $(".DEPARTMENT").focus();
  return false;
}

  
    else
    {
	return true;
    }
};
</script> 
  
  

<script>
    $(document).ready(function () {
        var table = $('#contact').DataTable({
            scrollY: true,
            scrollX: true,
            scrollCollapse: true,
            paging: false,
            sort: false,
            bInfo: false,
        });
    });
</script>    

<script>
    function page_submit(){
     $('.submit').click();
}

    $(document).ready(function () {
        function setHeightx() {
            windowHeight = $(window).innerHeight();
            x = windowHeight - 372 - 45 - 60;
            // alert(x);
            $('.dataTables_scrollBody').css('height', x);
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
            windowHeight = $(window).innerHeight();
            x = windowHeight - 372 - 45 - 60;
            // alert("resize" + x);
            $('.dataTables_scrollBody').css('height', x);
            // $('.viru').css('height', x);
        }
        ;
        setHeightx1();

        $(window).resize(function () {
            setHeightx1();
        });
    });
</script>

<script>
    function myFunction() {
        var popup = document.getElementById("myPopup");
        popup.classList.toggle("show");
    }
</script>     


<script type="text/javascript">


    function calculateSum() {
        // alert("sum");
        var sum2 = 0;
        var sum3 = 0;
        var sum4 = 0;
        var sumx = 0;
        var sum5 = 0;
        $(".TAX_AMOUNT").each(function () {
            if (!isNaN(this.value) && this.value.length !== 0) {
                sum2 += parseFloat(this.value);
                // alert("sum2::::" + sum2);
            }
        });
        $(".TOTAL").each(function () {
            if (!isNaN(this.value) && this.value.length !== 0) {
                sum3 += parseFloat(this.value);
            }
        });

        var gt = sum2 + sum3;
        $(".LINE_TOTAL").val(sum3.toFixed(2));
        // alert(TOTAL);

        $(".TOTAL_TAX").val(sum2.toFixed(2));

        $(".GRAND_TOTAL").val(gt.toFixed(2));

    }

    function calculateRow() {
        //alert("row");
        var cost = 0;
        var $row = $(this).closest("tr");


//                    var NO_OF_DAYS = $row.find('.NO_OF_DAYS').val();
//                   //  alert(NO_OF_DAYS); 
//                    var VALUE_WITH_TAX = $row.find('.VALUE_WITH_TAX').val();
//                    var TAX_ID = $row.find('.TAX_ID').val();
//                    var amt1 = (VALUE_WITH_TAX * TAX_ID )/100;
//                    var amt5 = amt1 * NO_OF_DAYS;
//                    var amt2 = VALUE_WITH_TAX - amt1;
//                    var amt3 = VALUE_WITH_TAX-0;
//                    var amt4 = amt2 * NO_OF_DAYS;


        var NO_OF_DAYS = $row.find('.NO_OF_DAYS').val();
        //  alert(NO_OF_DAYS); 
        var VALUE_WITH_TAX = $row.find('.VALUE_WITH_TAX').val();
        var TAX_ID = $row.find('.TAX_ID').val();
        var amt16 = 100;
        var amt15 = parseInt(amt16) + parseInt(TAX_ID);
        var amt1 = (VALUE_WITH_TAX * TAX_ID) / amt15;
        var amt5 = amt1 * NO_OF_DAYS;
        var amt2 = VALUE_WITH_TAX - amt1;
        var amt3 = VALUE_WITH_TAX - 0;
        var amt4 = amt2 * NO_OF_DAYS;


        if (isNaN(cost)) {
            $row.find('.VALUE_WITH_TAX').val("0");
            $row.find('.TAX_AMOUNT').val("0");
            $row.find('.VALUE_WITHOUT_TAX').val("0");

        } else {
            $row.find('.TOTAL').val(amt4.toFixed(2));
            $row.find('.TAX_AMOUNT').val(amt5.toFixed(2));
            $row.find('.VALUE_WITHOUT_TAX').val(amt2.toFixed(2));

        }
        calculateSum();
    }



//    var count = 1;
//    function addrow() {
//
//        //  alert($('#count').val());
//        $(".remove").parent().remove();
//        //  alert("ds");
//
//        var tr = "<tr >" +
//                "<td><input type='hidden' id='LINE_ID" + count + "' name='LINE_ID' class='form-control  LINE_ID' /></td>" +
//                "<td><input type='text' name='PC_CODE' class='form-control PC_CODE' id='PC_CODE" + count + "' style='text-align: center;' ></td>" +
//                "<td><input type='text' name='PC_NAME' class='form-control PC_NAME' id='PC_NAME" + count + "' style='text-align: center;'></td>" +
//                "<td><input type='text' name='PC_DESCRIPTION' class='form-control PC_DESCRIPTION' id='PC_DESCRIPTION" + count + "' style='text-align: center;'></td>" +
//                "<td><input type='text' name='PC_LEVEL' class='form-control PC_LEVEL' id='PC_LEVEL" + count + "' style='text-align: center;'></td>" +
//                "<td><input type='text' name='INCENTIVIZE' class='form-control INCENTIVIZE' id='INCENTIVIZE" + count + "' style='text-align: center;'></td>" +
//                "<td style='text-align: center;'><a class='tips btn btn-xs  btn-primary align-right' style='background-color:#ff7b5a' value='-' onclick='removerow(this)'><i class='fa fa-trash-o'></i></a></td>" +
//                "</tr>";
//        // alert(tr);
//        $("#contact").append(tr);
//        var a = parseInt($('#count').val()) + 1;
//        document.getElementById('count').value = a;
//        count++;
//        $('#contact').off('keyup').on('keyup', '.NO_OF_DAYS,.VALUE_WITH_TAX,.VALUE_WITHOUT_TAX,.TAX_ID,.TAX_AMOUNT,.TOTAL', calculateRow);
//    }







    function removerow(row)
    {
        $(row).parent().parent().remove();
        calculateRow();

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






                        var d = new Date(90,0,1);
                        $("#dob").datepicker({
	                defaultDate:d, //set the default date to Jan 1st 1990
			changeMonth: true,
			changeYear: true,
	                yearRange: '1930:2000', //set the range of years
	                dateFormat: 'dd-mm-yy' //set the format of the date
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

@stop
