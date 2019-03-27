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
    <a href="{{ URL::route('principal.edit',$principal[0]->PRINCIPAL_ID)}}" class="tips icon-btn show-page" title="Edit"><img src="{{ asset('sximo/images/icons/edit.png')}}" /></a>
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

  @if($tp == 'BRAND')
    <legend> Principal Details </legend>
@else
 <legend> Insurer Details </legend>
 @endif
    <div class="" style="background-color:white; margin-top:12px">
     
      <div class="tabbable tabbable-custom">

        <ul class="nav nav-tabs cls" style="">
          <li class="active"><a href="#tab_1_4" id="tab3" data-toggle="tab">Organization</a></l> 
          <li><a href="#tab_1_3" id="tab2" data-toggle="tab">Admin User</a></li>
            @if($tp == 'BRAND')
          <li><a href="#tab_1_5" id="tab4" data-toggle="tab">Brand List</a></li>
          @endif
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
                    <input type="text" class="form-control first_name" id="first_name" name="first_name" value="{{$tbuser[0]->first_name}}" disabled="">
                  </div> 
                </div>
                  
                <div class="form-group">
                  <div class="col-md-12">
                    <label for="middle_name" class=" control-label text-left"> Middle Name </label>
                    <input type="text" class="form-control middle_name" id="middle_name" name="middle_name" value="{{$tbuser[0]->middle_name}}" disabled="">
                  </div> 
                </div>
                  
                <div class="form-group">
                  <div class="col-md-12">
                    <label for="last_name" class=" control-label text-left"> Last Name </label>
                     <input type="text" class="form-control last_name" id="last_name" name="last_name" value="{{$tbuser[0]->last_name}}" disabled="">
                  </div> 
                </div>
                  
                <div class="form-group">
                  <div class="col-md-12">
                    <label for="dob" class=" control-label text-left"> Date Of Birth </label>
                     <input type="text" class="form-control dob" id="dob" name="dob" value="{{$tbuser[0]->dob}}" disabled="">
                  </div> 
                </div>
                  
                <div class="form-group">
                  <div class="col-md-12">
                    <label for="gender" class=" control-label text-left"> Gender1 </label>
                 {!! Form::select('gender', array(''=>'--Select--', 'M'=>'Male','F'=>'Female'),array('value'=>$tbuser[0]->gender),array('class' => 'form-control gender','disabled')) !!}
                  </div> 
                </div>
                  
                <div class="form-group">
                  <div class="col-md-12">
                    <label for="marital_status" class=" control-label text-left"> Marital Status </label>
                    {!! Form::select('marital_status', array(''=>'--Select--', 'M'=>'Married','U'=>'Unmarried'),array('value'=>$tbuser[0]->marital_status),array('class' => 'form-control marital_status','disabled')) !!}
                  </div> 
                </div>


              </div>
              
              <div class="col-md-3 col-sm-3 col-xs-3">
                
                <div class="form-group">
                  <div class="col-md-12">
                    <label for="email" class=" control-label text-left"> Email </label>
                     <input type="text" class="form-control email" id="email" name="email" value="{{$tbuser[0]->email}}"  disabled="">
                  </div> 
                </div>
                
                <div class="form-group">
                  <div class="col-md-12">
                    <label for="addr_house_no" class=" control-label text-left"> House No </label>
                      <input type="text" class="form-control addr_house_no" id="addr_house_no" name="addr_house_no" value="{{$tbuser[0]->addr_house_no}}"  disabled="">
                  </div> 
                </div>
                
               
                <div class="form-group">
                  <div class="col-md-12">
                    <label for="addr_pin" class=" control-label text-left"> Pin Code </label>
                      <input type="text" class="form-control addr_pin" id="addr_pin" name="addr_pin" value="{{$tbuser[0]->addr_pin}}"  disabled="">
                  </div> 
                </div>

                <div class="form-group">
                  <div class="col-md-12">
                    <label for="phone_mobile" class=" control-label text-left"> Mobile </label>
                      <input type="text" class="form-control phone_mobile" id="phone_mobile" name="phone_mobile" value="{{$tbuser[0]->phone_mobile}}"  disabled="">
                  </div> 
                </div>


              </div> 
              
              <div class="col-md-3 col-sm-3 col-xs-3">
                <div class="form-group">
                  <div class="col-md-12">
                    <label for="addr_locality" class=" control-label text-left"> Locality </label>
                     <input type="text" class="form-control addr_locality" id="addr_locality" name="addr_locality" value="{{$tbuser[0]->addr_locality}}"  disabled="">
                  </div> 
                </div>
                  
                <div class="form-group">
                  <div class="col-md-12">
                    <label for="addr_citovi" class=" control-label text-left"> City </label>
                    {!! Form::select('addr_citovi',array('0'=>'Select')+$city,array('value'=>$tbuser[0]->addr_citovi), array('class' => 'form-control addr_citovi','id'=>'addr_citovi','disabled')) !!}
                  </div> 
                </div>
                
                
                <div class="form-group">
                  <div class="col-md-12">
                    <label for="addr_district" class=" control-label text-left"> District </label>
                    <input type="text" class="form-control addr_district" id="addr_district" name="addr_district" value="{{$tbuser[0]->addr_district}}"  disabled="">
                  </div> 
                </div>

                <div class="form-group">
                  <div class="col-md-12">
                    <label for="addr_state" class=" control-label text-left"> State </label>
                    {!! Form::select('addr_state',array('0'=>'Select')+$state,array('value'=>$tbuser[0]->addr_state), array('class' => 'form-control addr_state','id'=>'addr_state','disabled')) !!}
                  </div> 
                </div>

                <div class="form-group">
                  <div class="col-md-12">
                    <label for="addr_country" class=" control-label text-left"> Country </label>
                    {!! Form::select('addr_country',array('0'=>'Select')+$country,array('value'=>$tbuser[0]->addr_country), array('class' => 'form-control addr_country','id'=>'addr_country','disabled')) !!}
                  </div> 
                </div>
              </div> 
              
              <div class="col-md-3 col-sm-3 col-xs-3">

                <div class="form-group">
                  <div class="col-md-12">
                    <label for="ACCESS_TYPE" class=" control-label text-left"> Access Type </label>
                 {!! Form::select('ACCESS_TYPE', array(''=>'--Select--', 'M'=>'Married','U'=>'Unmarried'),array('value'=>$orguser[0]->ACCESS_TYPE),array('class' => 'form-control ACCESS_TYPE','disabled')) !!}
                  </div> 
                </div>
                
                <div class="form-group">
                  <div class="col-md-12">
                    <label for="USER_CODE" class=" control-label text-left"> User Code </label>
                    <input type="text" class="form-control USER_CODE" id="USER_CODE" name="USER_CODE" value="{{$orguser[0]->USER_CODE}}"  disabled="">
                  </div> 
                </div>
                
                <div class="form-group">
                  <div class="col-md-12">
                    <label for="DEPARTMENT" class=" control-label text-left"> Department </label>
                    {!! Form::select('DEPARTMENT', array('IS'=>'IT System'),array('value'=>$orguser[0]->DEPARTMENT),array('class' => 'form-control DEPARTMENT','disabled')) !!}
                  </div> 
                </div>
                
                <div class="form-group">
                  <div class="col-md-12">
                    <label for="COUNTRY_CODE" class=" control-label text-left"> Country Code </label>
                    {!! Form::select('COUNTRY_CODE',array('0'=>'Select')+$country,array('value'=>$orguser[0]->COUNTRY_CODE), array('class' => 'form-control COUNTRY_CODE','id'=>'COUNTRY_CODE','disabled')) !!}
                  </div> 
                </div>                
              </div>  
              </div>
            </div>
          </div>
            
             <input type="hidden" value="2" name="count3" id="count3">
            <input type="hidden" name="tableangle3" id="tableangle3">

          </div>
         <div class="tab-pane  active " id="tab_1_4" style="overflow: hidden">

             <div class="col-md-12 min-scroll"><br>
              <div class="row">
              <div class="min_width">
              <div class="col-md-3 col-sm-3 col-xs-3">      
                <div class="form-group">
                  <div class="col-md-12">
                    <label for="ORG_TYPE" class=" control-label text-left"> Type </label>
                    {!! Form::select('ORG_TYPE', array(''=>'--Select--', 'PVT'=>'Private Limited','PL'=>'Public Limited','LLP'=>'Limited liability partnership','PROP'=>'Proprietor'),array('value'=>$organization[0]->ORG_TYPE),array('class' => 'form-control ORG_TYPE','required','disabled' )) !!}
                  </div> 
                </div> 

                <div class="form-group">
                  <div class="col-md-12">
                    <label for="ORG_NAME" class=" control-label text-left"> Name </label>
                 <input type="text" class="form-control ORG_NAME" id="ORG_NAME" name="ORG_NAME" value="{{$organization[0]->ORG_NAME}}"  disabled=""> 
                  </div> 
                </div>
                
                 <div class="form-group">
                  <div class="col-md-12">
                    <label for="ORG_CODE" class=" control-label text-left"> Code </label>
                     <input type="text" class="form-control ORG_CODE" id="ORG_CODE" name="ORG_CODE" value="{{$organization[0]->ORG_CODE}}" disabled="">
                  </div> 
                </div>
                

                <div class="form-group">
                  <div class="col-md-12">
                    <label for="ORG_EMAIL_ADDRESS" class=" control-label text-left"> Email </label>
                    <input type="text" class="form-control ORG_EMAIL_ADDRESS" id="ORG_EMAIL_ADDRESS" name="ORG_EMAIL_ADDRESS" value="{{$organization[0]->ORG_EMAIL_ADDRESS}}" disabled="">
                  </div> 
                </div>
                  
                <div class="form-group">
                  <div class="col-md-12">
                    <label for="ORG_PHONE_MOBILE" class=" control-label text-left"> Mobile </label>                   
                    <input type="text" class="form-control ORG_PHONE_MOBILE" id="ORG_PHONE_MOBILE" name="ORG_PHONE_MOBILE" value="{{$organization[0]->ORG_PHONE_MOBILE}}" disabled="">
                  </div> 
                </div>
                  
                <div class="form-group">
                  <div class="col-md-12">
                    <label for="ORG_ADDR_HOUSE_NO" class=" control-label text-left"> House No </label>
                    <input type="text" class="form-control ORG_ADDR_HOUSE_NO" id="ORG_ADDR_HOUSE_NO" name="ORG_ADDR_HOUSE_NO" value="{{$organization[0]->ORG_ADDR_HOUSE_NO}}" disabled="">
                  </div> 
                </div>

                
              </div>
               
               

               
               
               
            <div class="col-md-3 col-sm-3 col-xs-3">
                
                <div class="form-group">
                  <div class="col-md-12">
                    <label for="ORG_ADDR_DIST" class=" control-label text-left"> Address </label>
                    <input type="text" class="form-control ORG_ADDR_DIST" id="ORG_ADDR_DIST" name="ORG_ADDR_DIST" value="{{$organization[0]->ORG_ADDR_DIST}}" disabled="">
                  </div> 
                </div>
                               
                <div class="form-group">
                  <div class="col-md-12">
                     <label for="ORG_ADDR_LOCALITY" class=" control-label text-left"> Locality </label>
                      <input type="text" class="form-control ORG_ADDR_LOCALITY" id="ORG_ADDR_LOCALITY" name="ORG_ADDR_LOCALITY" value="{{$organization[0]->ORG_ADDR_LOCALITY}}" disabled="">
                  </div> 
                </div>

                <div class="form-group">
                  <div class="col-md-12">
                    <label for="ORG_ADDR_PIN" class=" control-label text-left"> Pin Code </label>
                      <input type="text" class="form-control ORG_ADDR_PIN" id="ORG_ADDR_PIN" name="ORG_ADDR_PIN" value="{{$organization[0]->ORG_ADDR_PIN}}" disabled="">
                  </div> 
                </div>               
                
                 <div class="form-group">
                  <div class="col-md-12">
                    <label for="ORG_ADDR_DIST" class=" control-label text-left"> District </label>
                    <input type="text" class="form-control ORG_ADDR_DIST" id="ORG_ADDR_DIST" name="ORG_ADDR_DIST" value="{{$organization[0]->ORG_ADDR_DIST}}" disabled="">
                  </div> 
                </div>
                               
                <div class="form-group">
                  <div class="col-md-12">
                    <label for="ORG_ADDR_CITYOVI" class=" control-label text-left"> City </label>
                    {!! Form::select('ORG_ADDR_CITYOVI',array('0'=>'Select')+$city,array('value'=>$organization[0]->ORG_ADDR_CITYOVI), array('class' => 'form-control ORG_ADDR_CITYOVI','id'=>'ORG_ADDR_CITYOVI','disabled')) !!}
                  </div> 
                </div>
                


              

                <div class="form-group">
                  <div class="col-md-12">
                    <label for="ORG_ADDR_STATE" class=" control-label text-left"> State </label>
                    {!! Form::select('ORG_ADDR_STATE',array('0'=>'Select')+$state,array('value'=>$organization[0]->ORG_ADDR_STATE), array('class' => 'form-control ORG_ADDR_STATE','id'=>'ORG_ADDR_STATE','disabled')) !!}
                  </div> 
                </div>

              </div> 
               
               
               
              <div class="col-md-3 col-sm-3 col-xs-3">
                
                <div class="form-group">
                  <div class="col-md-12">
                    <label for="ORG_ADDR_COUNTRY" class=" control-label text-left"> Country </label>
                     {!! Form::select('ORG_ADDR_COUNTRY',array('0'=>'Select')+$country,array('value'=>$organization[0]->ORG_ADDR_COUNTRY), array('class' => 'form-control ORG_ADDR_COUNTRY','id'=>'ORG_ADDR_COUNTRY','disabled')) !!}
                  </div> 
                </div> 
                  
                <div class="form-group">
                  <div class="col-md-12">
                    <label for="LOCATION_CODE" class=" control-label text-left"> Location Code </label>
                    <input type="text" class="form-control LOCATION_CODE" id="LOCATION_CODE" name="LOCATION_CODE" value="{{$orguser[0]->LOCATION_CODE}}" required="" maxlength="20" pattern ='^(?=.*[A-Z]{1,})[A-Z\d]{2,20}$' title = "Enter code in Capital and Numeric" disabled="">
                  </div> 
                </div>
                
                <div class="form-group">
                  <div class="col-md-12">
                    <label for="PC_CODE" class=" control-label text-left"> Class Code </label>
                    <input type="text" class="form-control PC_CODE" id="PC_CODE" name="PC_CODE" value="{{$principalclass[0]->PC_CODE}}" required="" maxlength="20" pattern ='[A-Z0-9]{2,20}' title = "enter a valid code" disabled="">
                  </div> 
                </div>

                <div class="form-group">
                  <div class="col-md-12">
                    <label for="PC_NAME" class=" control-label text-left"> Class Name </label>
                    <input type="text" class="form-control PC_NAME" id="PC_NAME" name="PC_NAME" value="{{$principalclass[0]->PC_NAME}}" disabled="">
                  </div> 
                </div>

                <div class="form-group">
                  <div class="col-md-12">
                    <label for="PC_DESCRIPTION" class=" control-label text-left"> Description </label>
                    <input type="text" class="form-control PC_DESCRIPTION" id="PC_DESCRIPTION" name="PC_DESCRIPTION" value="{{$principalclass[0]->PC_DESCRIPTION}}" disabled="">
                  </div> 
                </div>
                
                            
                
                
                

              </div> 
              <div class="col-md-3 col-sm-3 col-xs-3">

                   <div class="form-group">
                  <div class="col-md-12">
                    <label for="ORDER_COLLABORATION" class=" control-label text-left"> Order Collaboration </label>
                  {!! Form::select('ORDER_COLLABORATION', array(''=>'--Select--', 'T'=>'TRUE','F'=>'FALSE'),Input::old('ORDER_COLLABORATION'),array('class' => 'form-control ORDER_COLLABORATION','required','disabled')) !!} 
                  </div> 
                </div>
                
                <div class="form-group">
                  <div class="col-md-12">
                    <label for="PRODUCT_TRACING" class=" control-label text-left"> Product Tracing </label>
                  {!! Form::select('PRODUCT_TRACING', array(''=>'--Select--', 'T'=>'TRUE','F'=>'FALSE'),Input::old('PRODUCT_TRACING'),array('class' => 'form-control PRODUCT_TRACING','required','disabled')) !!} 
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
            <div class="col-md-12 min-scroll"><br>
            <div class="row">
            <div class="min_width">
            <div class="col-md-2 col-sm-2 col-xs-2"> 
            </div> 
              
            <div class="col-md-4 col-sm-4 col-xs-4"> 
                 <div class="col-md-12">  
                   <div class="row">
                    <table id="PRINCIPAL_BRAND" class="stripe row-border order-column" cellspacing="0" width="100%">
                        <thead> 
                          <tr height="35" style="border-top: 1px solid #ddd; border-bottom: 1px solid #ddd;">
                            <th style="text-align:center;"></th>
                            <th style="text-align:center;"> Brand Name </th>
                          </tr>
                        </thead>
                        <tbody>
               @if(count($principalbrand)!=0)     
               @for($i=0;$i<count($principalbrand);$i++)
                    <tr> 
                            <td align="center" width="80"> <input type="checkbox" name="LINE_ID" class="form-control LINE_ID" id="LINE_ID" checked ></td>
                            <td><input  type="text"  class="form-control LINE_ID"  value="{{$principalbrand[$i]->BRAND_CODE}}" disabled=""></td>
                    </th>        
               @endfor    
               @endif    
                   </tbody>
                    </table>           
             
            </div> 
                 </div>  
            </div>
                     
              
            <div class="col-md-2 col-sm-2 col-xs-2"> 
            </div>  
            </div>
            </div>
            </div> 
            
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