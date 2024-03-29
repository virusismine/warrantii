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
     
        <a href="{{ URL::to('principal') }}" class="tips icon-btn create-page" title="Cancel"><img src="{{ asset('sximo/images/icons/back.png')}}"/></a>
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
      
  {!! Form::open(array('route'=>'principal.store', 'class'=>'form-horizontal','id'=>'resource1' ,'files' => true ,'enctype'=>'multipart/form-data','novalidate'=>' ')) !!}

  
    <legend> Principal Details </legend>

    <div class="" style="background-color:white; margin-top:12px">
     
      <div class="tabbable tabbable-custom">

        <ul class="nav nav-tabs cls" style="">
          <li class="active"><a href="#tab_1_4" id="tab3" data-toggle="tab">Organization</a></l> 
          <li><a href="#tab_1_3" id="tab2" data-toggle="tab">Admin User</a></li>

        </ul>

        <div class="tab-content">

          <div class="tab-pane" id="tab_1_3" style='overflow: hidden'>

            <div class="col-md-12 min-scroll"><br>
            <div class="row">
              <div class="min_width">
              <div class="col-md-3 col-sm-3 col-xs-3">      
                <div class="form-group">
                  <div class="col-md-12">
                    <label for="first_name" class=" control-label text-left"> First Name </label>
                    {!! Form::text('first_name', Input::old('first_name'),array('class'=>'form-control first_name', 'placeholder'=>'','required'=>'','pattern'=>'[a-zA-Z ]{2,}', 'title'=>'Enter only alphabets')) !!}
                  </div> 
                </div>
                  
                <div class="form-group">
                  <div class="col-md-12">
                    <label for="middle_name" class=" control-label text-left"> Middle Name </label>
                    {!! Form::text('middle_name', Input::old('middle_name'),array('class'=>'form-control middle_name', 'placeholder'=>'')) !!} 
                  </div> 
                </div>
                  
                <div class="form-group">
                  <div class="col-md-12">
                    <label for="last_name" class=" control-label text-left"> Last Name </label>
                    {!! Form::text('last_name', Input::old('last_name'),array('class'=>'form-control last_name', 'placeholder'=>'')) !!} 
                  </div> 
                </div>
                  
                <div class="form-group">
                  <div class="col-md-12">
                    <label for="dob" class=" control-label text-left"> Date Of Birth </label>
                    {!! Form::text('dob', Input::old('dob'),array('class'=>'form-control dob','id'=>'dob', 'placeholder'=>'','readonly' )) !!} 
                  </div> 
                </div>
                  
                <div class="form-group">
                  <div class="col-md-12">
                    <label for="gender" class=" control-label text-left"> Gender </label>
                    {!! Form::select('gender', array(''=>'Select', 'M'=>'Male','F'=>'Female'),Input::old('gender'),array('class' => 'form-control gender','required')) !!} 
                  </div> 
                </div>
                  
                <div class="form-group">
                  <div class="col-md-12">
                    <label for="marital_status" class=" control-label text-left"> Marital Status </label>
                    {!! Form::select('marital_status', array(''=>'Select', 'M'=>'Married','U'=>'Unmarried'),Input::old('marital_status'),array('class' => 'form-control marital_status','required')) !!} 
                  </div> 
                </div>

              </div>

              <div class="col-md-3 col-sm-3 col-xs-3">

                <div class="form-group">
                  <div class="col-md-12">
                    <label for="email" class=" control-label text-left"> Email </label>
                    {!! Form::text('email', Input::old('email'),array('class'=>'form-control email', 'placeholder'=>'','required' , 'pattern'=>'[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$', 'title'=>'Enter valid email address')) !!} 
                  </div> 
                </div>
                  
                <div class="form-group">
                  <div class="col-md-12">
                    <label for="password" class=" control-label text-left"> Password </label> 
                    {!! Form::text('password', Input::old('password'), array('class' => 'form-control','id'=>'password','required','pattern'=>'.{8,}', 'title'=>'Password must be minimum 8 charactors')) !!}
                  </div> 
                </div>

                <div class="form-group">
                  <div class="col-md-12">
                    <label for="addr_house_no" class=" control-label text-left"> House No </label>
                    {!! Form::text('addr_house_no', Input::old('addr_house_no'),array('class'=>'form-control addr_house_no', 'placeholder'=>'')) !!} 
                  </div> 
                </div>

                <div class="form-group">
                  <div class="col-md-12">
                    <label for="addr_pin" class=" control-label text-left"> Pin Code </label>
                    {!! Form::text('addr_pin', Input::old('addr_pin'),array('class'=>'form-control addr_pin', 'placeholder'=>'','required','maxlength'=>'6' ,'pattern'=>'[0-9]{6,6}','title'=>'Enter a valid pincode')) !!} 
                  </div> 
                </div>

                <div class="form-group">
                  <div class="col-md-12">
                    <label for="phone_mobile" class=" control-label text-left"> Mobile </label>
                    {!! Form::text('phone_mobile', Input::old('phone_mobile'),array('class'=>'form-control phone_mobile', 'placeholder'=>'','required' ,'maxlength'=>'10' ,'pattern'=>'[0-9]{10,10}','title'=>'Enter a valid mobile number' )) !!} 
                  </div> 
                </div>
              </div>

              <div class="col-md-3 col-sm-3 col-xs-3">
                <div class="form-group">
                  <div class="col-md-12">
                    <label for="addr_locality" class=" control-label text-left"> Locality </label>
                    {!! Form::text('addr_locality', Input::old('addr_locality'),array('class'=>'form-control addr_locality', 'placeholder'=>'')) !!} 
                  </div> 
                </div>



                <div class="form-group">
                  <div class="col-md-12">
                    <label for="addr_district" class=" control-label text-left"> District </label>
                    {!! Form::text('addr_district', Input::old('addr_district'),array('class'=>'form-control addr_district', 'placeholder'=>'')) !!} 
                  </div> 
                </div>
                  
                <div class="form-group">
                  <div class="col-md-12">
                    <label for="addr_citovi" class=" control-label text-left"> City </label>
                    {!! Form::select('addr_citovi',array(''=>'Select City')+$city,  Input::old('addr_citovi'), array('class' => 'form-control addr_citovi','id'=>'addr_citovi','required')) !!}
                  </div> 
                </div>

                <div class="form-group">
                  <div class="col-md-12">
                    <label for="addr_state" class=" control-label text-left"> State </label>
                    {!! Form::select('addr_state',array(''=>'Select State')+$state,  Input::old('addr_state'), array('class' => 'form-control addr_state','id'=>'addr_state','required')) !!}
                  </div> 
                </div>


              </div> 

              <div class="col-md-3 col-sm-3 col-xs-3">

                <div class="form-group">
                  <div class="col-md-12">
                    <label for="ACCESS_TYPE" class=" control-label text-left"> Access Type </label>
                    {!! Form::select('ACCESS_TYPE', array(''=>'Select', 'U'=>'User','M'=>'Manager'),Input::old('ACCESS_TYPE'),array('class' => 'form-control ACCESS_TYPE','required','required')) !!} 
                  </div> 
                </div>

                <div class="form-group">
                  <div class="col-md-12">
                    <label for="USER_CODE" class=" control-label text-left"> User Code </label>
                    {!! Form::text('USER_CODE', Input::old('USER_CODE'),array('class'=>'form-control USER_CODE', 'placeholder'=>'','required','maxlength'=>'20' ,'pattern'=>'^(?=.*[A-Z]{1,})[A-Z\d]{2,20}$','title'=>'Enter only alphabet and numeric' )) !!} 
                  </div> 
                </div>

                <div class="form-group">
                  <div class="col-md-12">
                    <label for="DEPARTMENT" class=" control-label text-left"> Department </label>
                    {!! Form::select('DEPARTMENT', array('IS'=>'IT System'),Input::old('DEPARTMENT'),array('class' => 'form-control DEPARTMENT','required' )) !!} 
                  </div> 
                </div>

                <div class="form-group">
                  <div class="col-md-12">
                    <label for="COUNTRY_CODE" class=" control-label text-left"> Country Code </label>
                    {!! Form::select('COUNTRY_CODE',array('99'=>'India')+$country,  Input::old('COUNTRY_CODE'), array('class' => 'form-control COUNTRY_CODE','id'=>'COUNTRY_CODE','required')) !!}
                  </div> 
                </div>  


              </div>  

            </div>
            </div>
          </div>

          </div>
          <div class="tab-pane  active " id="tab_1_4" style="overflow: hidden">



            <div class="col-md-12 min-scroll"><br>
            <div class="row">
             <div class="min_width">
              <div class="col-md-3 col-sm-3 col-xs-3">      
                <div class="form-group">
                  <div class="col-md-12">
                    <label for="ORG_TYPE" class=" control-label text-left"> Type </label>
                    {!! Form::select('ORG_TYPE', array(''=>'Select', 'PVT'=>'Private Limited','PL'=>'Public Limited','LLP'=>'Limited liability partnership','PROP'=>'Proprietor'),Input::old('ORG_TYPE'),array('class' => 'form-control ORG_TYPE','required', 'title'=>'Please select type')) !!}
<!--                    <div class="hints">
                        <a class="tips field-hint" data-toggle="control-sidebar"><img src="{{ asset('sximo/images/next-page.png')}}" /></a> 
                        <a class="tips field-hint" data-toggle="control-sidebar"><img src="{{ asset('sximo/images/question.png')}}" /></a>
                        <a class="tips field-hint" data-toggle="control-sidebar"><img src="{{ asset('sximo/images/search.png')}}" /></a>
                    </div>-->
                  </div> 
                </div> 

                <div class="form-group">
                  <div class="col-md-12">
                    <label for="ORG_NAME" class=" control-label text-left">Legal Name </label>
                    {!! Form::text('ORG_NAME', Input::old('ORG_NAME'),array('class'=>'form-control ORG_NAME', 'placeholder'=>'','required'=>'','pattern'=>'[a-zA-Z ]{2,}', 'title'=>'Enter name only alphabet')) !!} 
                  </div> 
                </div>

                <div class="form-group">
                  <div class="col-md-12">
                    <label for="ORG_CODE" class=" control-label text-left">Legal Code </label>
                    {!! Form::text('ORG_CODE', Input::old('ORG_CODE'),array('class'=>'form-control ORG_CODE', 'placeholder'=>'','required','maxlength'=>'20' ,'pattern'=>'^(?=.*[A-Z]{1,})[A-Z\d]{2,20}$','title'=>'Enter code in Capital and Numeric')) !!} 
                  </div> 
                </div>
    <div class="form-group">
                  <div class="col-md-12">
                      @if($tp == 'BRAND')
                    <label for="ORG_NAME" class=" control-label text-left">Brand Name </label>
                    @else
                     <label for="ORG_NAME" class=" control-label text-left">Insurer Name </label>
                    @endif
                    {!! Form::text('ORG_NAME1', Input::old('ORG_NAME1'),array('class'=>'form-control ORG_NAME1', 'placeholder'=>'','required'=>'','pattern'=>'[a-zA-Z ]{2,}', 'title'=>'Enter name only alphabet')) !!} 
                  </div> 
                </div>

                <div class="form-group">
                  <div class="col-md-12">
                       @if($tp == 'BRAND')
                     <label for="ORG_CODE" class=" control-label text-left">Brand Code </label>
                    @else
                    <label for="ORG_CODE" class=" control-label text-left">Insurer Code </label>
                    @endif
                  
                    {!! Form::text('ORG_CODE1', Input::old('ORG_CODE1'),array('class'=>'form-control ORG_CODE1', 'placeholder'=>'','required','maxlength'=>'20' ,'pattern'=>'^(?=.*[A-Z]{1,})[A-Z\d]{2,20}$','title'=>'Enter code in Capital and Numeric')) !!} 
                  </div> 
                </div>
                  
                  
                <div class="form-group">
                  <div class="col-md-12">
                    <label for="ORG_EMAIL_ADDRESS" class=" control-label text-left"> Email </label>
                    {!! Form::text('ORG_EMAIL_ADDRESS', Input::old('ORG_EMAIL_ADDRESS'),array('class'=>'form-control ORG_EMAIL_ADDRESS', 'placeholder'=>'','required', 'pattern'=>'[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$', 'title'=>'Enter valid email address')) !!} 
                  </div> 
                </div>

                


              </div>


              <div class="col-md-3 col-sm-3 col-xs-3">
<div class="form-group">
                  <div class="col-md-12">
                    <label for="ORG_PHONE_MOBILE" class=" control-label text-left"> Mobile </label>
                    {!! Form::text('ORG_PHONE_MOBILE', Input::old('ORG_PHONE_MOBILE'),array('class'=>'form-control ORG_PHONE_MOBILE', 'placeholder'=>'','required','maxlength'=>'10' ,'pattern'=>'[0-9]{10,10}','title'=>'Enter a valid mobile number' )) !!} 
                  </div> 
                </div>
                  
                <div class="form-group">
                  <div class="col-md-12">
                    <label for="ORG_ADDR_HOUSE_NO" class=" control-label text-left"> House No </label>
                    {!! Form::text('ORG_ADDR_HOUSE_NO', Input::old('ORG_ADDR_HOUSE_NO'),array('class'=>'form-control', 'placeholder'=>'')) !!} 
                  </div> 
                </div>
                <div class="form-group">
                  <div class="col-md-12">
                    <label for="ORG_ADDR_DIST" class=" control-label text-left"> Address </label>
                    {!! Form::text('ORG_ADDR_DIST', Input::old('ORG_ADDR_DIST'),array('class'=>'form-control ORG_ADDR_DIST', 'placeholder'=>'')) !!} 
                  </div> 
                </div>



                <div class="form-group">
                  <div class="col-md-12">
                    <label for="ORG_ADDR_DIST" class=" control-label text-left"> District </label>
                    {!! Form::text('ORG_ADDR_DIST', Input::old('ORG_ADDR_DIST'),array('class'=>'form-control ORG_ADDR_DIST', 'placeholder'=>'')) !!} 
                  </div> 
                </div>




                <div class="form-group">
                  <div class="col-md-12">
                    <label for="ORG_ADDR_LOCALITY" class=" control-label text-left"> Locality </label>
                    {!! Form::text('ORG_ADDR_LOCALITY', Input::old('ORG_ADDR_LOCALITY'),array('class'=>'form-control ORG_ADDR_LOCALITY', 'placeholder'=>'')) !!} 
                  </div> 
                </div>

                <div class="form-group">
                  <div class="col-md-12">
                    <label for="ORG_ADDR_PIN" class=" control-label text-left"> Pin Code </label>
                    {!! Form::text('ORG_ADDR_PIN', Input::old('ORG_ADDR_PIN'),array('class'=>'form-control ORG_ADDR_PIN', 'placeholder'=>'','required', 'maxlength'=>'6' ,'pattern'=>'[0-9]{6,6}','title'=>'Enter a valid pincode')) !!} 
                  </div> 
                </div>
                  
               

               

              </div>           



              <div class="col-md-3 col-sm-3 col-xs-3">
                   <div class="form-group">
                  <div class="col-md-12">
                    <label for="ORG_ADDR_CITYOVI" class=" control-label text-left"> City </label>
                    {!! Form::select('ORG_ADDR_CITYOVI',array(''=>'Select City')+$city,  Input::old('ORG_ADDR_CITYOVI'), array('class' => 'form-control ORG_ADDR_CITYOVI', 'id'=>'ORG_ADDR_CITYOVI', 'required'=>'', 'title'=>'Please select city' )) !!}
                  </div> 
                </div>
 <div class="form-group">
                  <div class="col-md-12">
                    <label for="ORG_ADDR_STATE" class=" control-label text-left"> State </label>
                    {!! Form::select('ORG_ADDR_STATE',array(''=>'Select State')+$state,  Input::old('ORG_ADDR_STATE'), array('class' => 'form-control ORG_ADDR_STATE','id'=>'ORG_ADDR_STATE','required'=>'', 'title'=>'Please select state' )) !!}
                  </div> 
                </div>
                <div class="form-group">
                  <div class="col-md-12">
                    <label for="ORG_ADDR_COUNTRY" class=" control-label text-left"> Country </label>
                    {!! Form::select('ORG_ADDR_COUNTRY',array('99'=>'India')+$country,  Input::old('ORG_ADDR_COUNTRY'), array('class' => 'form-control ORG_ADDR_COUNTRY','id'=>'ORG_ADDR_COUNTRY','required')) !!}
                  </div> 
                </div>

                <div class="form-group">
                  <div class="col-md-12">
                    <label for="LOCATION_CODE" class=" control-label text-left"> Location Code </label>
                   {!! Form::text('LOCATION_CODE', Input::old('LOCATION_CODE'),array('class'=>'form-control LOCATION_CODE', 'placeholder'=>'','required','maxlength'=>'20' ,'pattern'=>'^(?=.*[A-Z]{1,})[A-Z\d]{2,20}$','title'=>'Enter code in Capital and Numeric')) !!} 
                  </div> 
                </div>

                <div class="form-group">
                  <div class="col-md-12">
                    <label for="PC_CODE" class=" control-label text-left"> Class Code </label>  <a class="tips field-hint" data-toggle="control-sidebar"><img src="{{ asset('sximo/images/question.png')}}" /></a>
                    <input class="form-control PC_CODE" name="PC_CODE" id="PC_CODE" value="" required="">
                    <div class="hints">                    
                      
                    </div>
                  </div> 
                </div>

                <div class="form-group">
                  <div class="col-md-12">
                    <label for="PC_NAME" class=" control-label text-left"> Class Name </label>  <a class="tips field-hint" data-toggle="control-sidebar"><img src="{{ asset('sximo/images/question.png')}}" /></a>
                    <input class="form-control PC_NAME" name="PC_NAME" id="PC_NAME" value="" required="">
                    
                  </div> 
                </div>

              

              </div>
                 
                 
              <div class="col-md-3 col-sm-3 col-xs-3">
  <div class="form-group">
                  <div class="col-md-12">
                    <label for="PC_DESCRIPTION" class=" control-label text-left"> Description </label>
                    {!! Form::text('PC_DESCRIPTION', Input::old('PC_DESCRIPTION'),array('class'=>'form-control PC_DESCRIPTION', 'placeholder'=>'')) !!} 
                  </div> 
                </div>
                <div class="form-group">
                    <div class="col-md-12" id="collaboration">
                    <label for="ORDER_COLLABORATION" class=" control-label text-left"> Order Collaboration </label>  <a class="tips field-hint" data-toggle="control-sidebar"><img src="{{ asset('sximo/images/question.png')}}" /></a><br>
                    <input type="checkbox" id="ORDER_COLLABORATION" name="ORDER_COLLABORATION" class="ORDER_COLLABORATION" required="" title="Please check" >                 
                                     
                       
                  
                    </div> 
                 
                </div>

                <div class="form-group">
                    <div class="col-md-12" id="check-req">
                    <label for="PRODUCT_TRACING" class=" control-label text-left">  Product Tracing </label>  <a class="tips field-hint" data-toggle="control-sidebar"><img src="{{ asset('sximo/images/question.png')}}" /></a>
                    <br>
                    <input type="checkbox" id="PRODUCT_TRACING" name="PRODUCT_TRACING" class="PRODUCT_TRACING" required="" title="Please check" >
                  
                    </div> 
                </div>



              </div> 


            </div>
            </div>
          </div>






            <input type="hidden" value="2" name="count2" id="count2">
            <input type="hidden" name="tableangle2" id="tableangle2">


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
     <input type="hidden" name="page_type" id="page_type" value="{{$tp}}">
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