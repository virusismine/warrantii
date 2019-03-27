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
     
           <a href="{{ URL::to('principalusers') }}" class="tips icon-btn edit-page" title="Cancel"><img src="{{ asset('sximo/images/icons/back.png')}}"  /></a>
        <a onclick="page_submit()" class="tips icon-btn edit-page" title="Save"><img src="{{ asset('sximo/images/icons/save.png')}}"  /></a>
        <a onclick="window.location.reload()" class="tips icon-btn edit-page" title="Reset"><img src="{{ asset('sximo/images/icons/reset.png')}}"  /></a>
    
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
      

        {!! Form::model($principaluser,array('route' => array('principalusers.update', $principaluser[0]->UA_ID.','.$principaluser[0]->ORG_UA_ID),'class'=>'form-horizontal','id'=>'resource1', 'method'=>'PUT','files' => true ,'parsley-validate'=>'','novalidate'=>' ')) !!}      
 
    

    <div class="" style="background-color:white; margin-top:">
     
      <div class="tabbable tabbable-custom">

        <ul class="nav nav-tabs cls" style="">
          <li class="active"><a href="#tab_1_4" id="tab3" data-toggle="tab" style="background-color:#0090d9;color:white">User Details</a></l> 
         
        </ul>

        <div class="tab-content">

              <div class="tab-pane active" id="tab_1_7" style='overflow: hidden'>
    
    <div class="col-md-12">
       <input type="hidden" class="PRINCIPAL_ID" name="PRINCIPAL_ID" id="PRINCIPAL_ID" value="{{$principaluser[0]->ORG_UA_ID}}">
       <input type="hidden" class="UA_ID" name="UA_ID" id="UA_ID" value="{{$principaluser[0]->UA_ID}}">
    </div>
   
            <div class="col-md-12 min-scroll"><br>
            <div class="row min_width">
              <div class="col-md-3 col-sm-3 col-xs-3">      
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="first_name" class=" control-label text-left"> First Name </label>
                    <input type="text" class="form-control first_name" id="first_name" name="first_name" value="{{$tbuser[0]->first_name}}" >
                  </div> 
                  <div class="col-md-6"></div>
                </div>
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="middle_name" class=" control-label text-left"> Middle Name </label>
                    <input type="text" class="form-control middle_name" id="middle_name" name="middle_name" value="{{$tbuser[0]->middle_name}}" >
                  </div> 
                  <div class="col-md-6"></div>
                </div>
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="last_name" class=" control-label text-left"> Last Name </label>
                     <input type="text" class="form-control last_name" id="last_name" name="last_name" value="{{$tbuser[0]->last_name}}" >
                  </div> 
                  <div class="col-md-6"></div>
                </div>
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="dob" class=" control-label text-left"> Date Of Birth </label>
                     <input type="text" class="form-control dob" id="dob" name="dob" value="{{$tbuser[0]->dob}}" >
                  </div> 
                  <div class="col-md-6"></div>
                </div>
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="gender" class=" control-label text-left"> Gender </label>
                  {!! Form::select('gender', array(''=>'--Select--', 'M'=>'Male','F'=>'Female'),array('value'=>$tbuser[0]->gender),array('class' => 'form-control gender','')) !!}
                  </div> 
                  <div class="col-md-6"></div>
                </div>

<!--                <div class="form-group">
                  <div class="col-md-6">
                    <label for="password" class=" control-label text-left"> Password </label>
                      <input type="text" class="form-control password" id="password" name="password" value="{{$tbuser[0]->password}}">
                  </div> 
                  <div class="col-md-6"></div>
                </div>-->
              </div>
              
              <div class="col-md-3 col-sm-3 col-xs-3">
                
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="marital_status" class=" control-label text-left"> Marital Status </label>
                     {!! Form::select('marital_status', array(''=>'--Select--', 'M'=>'Married','U'=>'Unmarried'),array('value'=>$tbuser[0]->marital_status),array('class' => 'form-control marital_status','')) !!}
                  </div> 
                  <div class="col-md-6"></div>
                </div>
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="email" class=" control-label text-left"> Email </label>
                     <input type="text" class="form-control email" id="email" name="email" value="{{$tbuser[0]->email}}"  >
                  </div> 
                  <div class="col-md-6"></div>
                </div>
                
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="addr_house_no" class=" control-label text-left"> House No </label>
                      <input type="text" class="form-control addr_house_no" id="addr_house_no" name="addr_house_no" value="{{$tbuser[0]->addr_house_no}}"  >
                  </div> 
                  <div class="col-md-6"></div>
                </div>
                
               
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="addr_pin" class=" control-label text-left"> Pin Code </label>
                      <input type="text" class="form-control addr_pin" id="addr_pin" name="addr_pin" value="{{$tbuser[0]->addr_pin}}"  >
                  </div> 
                  <div class="col-md-6"></div>
                </div>

                <div class="form-group">
                  <div class="col-md-6">
                    <label for="phone_mobile" class=" control-label text-left"> Mobile </label>
                      <input type="text" class="form-control phone_mobile" id="phone_mobile" name="phone_mobile" value="{{$tbuser[0]->phone_mobile}}"  >
                  </div> 
                  <div class="col-md-6"></div>
                </div>

              </div> 
              
              <div class="col-md-3 col-sm-3 col-xs-3">
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="addr_locality" class=" control-label text-left"> Locality </label>
                     <input type="text" class="form-control addr_locality" id="addr_locality" name="addr_locality" value="{{$tbuser[0]->addr_locality}}"  >
                  </div> 
                  <div class="col-md-6"></div>
                </div>
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="addr_citovi" class=" control-label text-left"> City </label>
                   {!! Form::select('addr_citovi',array('0'=>'Select')+$city,array('value'=>$tbuser[0]->addr_citovi), array('class' => 'form-control addr_citovi','id'=>'addr_citovi','')) !!}
                  </div> 
                  <div class="col-md-6"></div>
                </div>
                
                
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="addr_district" class=" control-label text-left"> District </label>
                    <input type="text" class="form-control addr_district" id="addr_district" name="addr_district" value="{{$tbuser[0]->addr_district}}" >
                  </div> 
                  <div class="col-md-6"></div>
                </div>

                <div class="form-group">
                  <div class="col-md-6">
                    <label for="addr_state" class=" control-label text-left"> State </label>
                  {!! Form::select('addr_state',array('0'=>'Select')+$state,array('value'=>$tbuser[0]->addr_state), array('class' => 'form-control addr_state','id'=>'addr_state','')) !!}
                  </div> 
                  <div class="col-md-6"></div>
                </div>

                <div class="form-group">
                  <div class="col-md-6">
                    <label for="addr_country" class=" control-label text-left"> Country </label>
                   {!! Form::select('addr_country',array('0'=>'Select')+$country,array('value'=>$tbuser[0]->addr_country), array('class' => 'form-control addr_country','id'=>'addr_country','')) !!}
                  </div> 
                  <div class="col-md-6"></div>
                </div>
              </div> 
              
              <div class="col-md-3 col-sm-3 col-xs-3">

                <div class="form-group">
                  <div class="col-md-12">
                    <label for="ACCESS_TYPE" class=" control-label text-left"> Access Type  <a class="tips field-hint" data-toggle="control-sidebar"><img src="{{ asset('sximo/images/question.png')}}" /></a></label>
                 {!! Form::select('ACCESS_TYPE', array(''=>'Select', 'U'=>'User','M'=>'Manager','K'=>'Key Contact'),array('value'=>$principaluser[0]->ACCESS_TYPE),array('class' => 'form-control ACCESS_TYPE','')) !!}
                  </div> 
                </div>
                
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="USER_CODE" class=" control-label text-left"> User Code </label>
  <input type="text" class="form-control USER_CODE" id="USER_CODE" name="USER_CODE" value="{{$principaluser[0]->USER_CODE}}" required="" maxlength="20" pattern="^(?=.*[A-Z]{1,})[A-Z\d]{2,20}$" title="Enter only capital and numeric value">

                  </div> 
                  <div class="col-md-6"></div>
                </div>
                
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="DEPARTMENT" class=" control-label text-left"> Department </label>
                     {!! Form::select('DEPARTMENT', array(''=>'--Select--', 'IS'=>'IT System','S'=>'Sales','M'=>'Marketing','I'=>'Inventory','SP'=>'Support','MG'=>'Management','F'=>'Finance','SE'=>'Service'),array('value'=>$principaluser[0]->DEPARTMENT),array('class' => 'form-control DEPARTMENT','')) !!}
                  </div> 
                  <div class="col-md-6"></div>
                </div>
                
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="COUNTRY_CODE" class=" control-label text-left"> Country Code </label>
                    {!! Form::select('COUNTRY_CODE',array('0'=>'Select')+$country,array('value'=>$principaluser[0]->COUNTRY_CODE), array('class' => 'form-control COUNTRY_CODE','id'=>'COUNTRY_CODE','')) !!}
                  </div>
                  <div class="col-md-6"></div>
                </div>                
              </div>  
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
function check_valid()
{
var location_name =$(".LOCATION_NAME").val();
var location_cede =$(".LOCATION_CODE").val();
var type =$(".LOCATION_TYPE").val();
var address =$(".ADDRESS").val();
var city =$(".CITY").val();
var state =$(".STATE").val();


var onlytext=/^([a-zA-z ]{2,})+$/;
var onlycode=/^(?=.*[A-Z]{1,})[A-Z\d]{2,20}$/;
var validemail=/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/;
var onlynumber=/^([0-9]{10,10})+$/;
var onlypin=/^([0-9]{6,6})+$/;

if(location_name === "" )
{
  $.tappification({ type: 'danger', message: 'Please Enter Location Name' }); 
  $(".LOCATION_NAME").focus();
  return false;
}

else if(!location_name.match(onlytext))
{
  $.tappification({ type: 'danger', message: 'Please Enter Name Only in Alphabets' });
  $(".LOCATION_NAME").focus();
  return false;
}

else if(location_cede === "" )
{
  $.tappification({ type: 'danger', message: 'Please Enter Organization Location Code' });
  $(".LOCATION_CODE").focus();
  return false;
}

else if(!location_cede.match(onlycode))
{
  $.tappification({ type: 'danger', message: 'Please Enter Code in Capital Value and Numeric' });
  $(".LOCATION_CODE").focus();
  return false;
}

else if(type === "" )
{
  $.tappification({ type: 'danger', message: 'Please Select Location Type' });
  $(".LOCATION_TYPE").focus();
  return false;
}

else if(address === "" )
{
  $.tappification({ type: 'danger', message: 'Please Enter Address' });
  $(".ADDRESS").focus();
  return false;
}

else if(city === "" )
{
  $.tappification({ type: 'danger', message: 'Please Select City' });
  $(".CITY").focus();
  return false;
}

else if(state === "" )
{
  $.tappification({ type: 'danger', message: 'Please Select State' });
  $(".STATE").focus();
  return false;
}



  
    else
    {
	return true;
    }
};
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

    function actionprincipalactivate()
    {
// alert("actionprincipalactivate")
 
 var BRAND_CODE = $('#BRAND_CODE').val();
// alert(principal_id)
 
        $.ajax({
            type: "POST",
            url: "{{URL::route('principal.actionprincipalactivate')}}",
            "_token": $(this).find('input[name=_token]').val(),
            data: {set1: BRAND_CODE},
            success: function (data) {
                console.log(data);
                 location.href = "/principal"

                }
        });
    }

        function actionprincipaldisable()
    {
//        alert("actionprincipaldisable")
        
         var BRAND_CODE = $('#BRAND_CODE').val();
        $.ajax({
            type: "POST",
            url: "{{URL::route('principal.actionprincipaldisable')}}",
            "_token": $(this).find('input[name=_token]').val(),
            data: {set1: BRAND_CODE},
            success: function (data) {
                console.log(data);
               location.href = "/principal"
                }
        });
    }
    
        function actionprincipalenable()
    {
//  alert("actionprincipalenable")
   var BRAND_CODE = $('#BRAND_CODE').val();
        $.ajax({
            type: "POST",
            url: "{{URL::route('principal.actionprincipalenable')}}",
            "_token": $(this).find('input[name=_token]').val(),
            data: {set1: BRAND_CODE},
            success: function (data) {
                console.log(data);
                location.href = "/principal"
                }
        });
    }
</script>


@stop
