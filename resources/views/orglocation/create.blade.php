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
     
        <a href="{{ URL::to('orglocation') }}" class="tips icon-btn create-page" title="Cancel"><img src="{{ asset('sximo/images/icons/back.png')}}"/></a>
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
      
  {!! Form::open(array('route'=>'orglocation.store', 'class'=>'form-horizontal','id'=>'resource1' ,'files' => true ,'enctype'=>'multipart/form-data','novalidate'=>' ')) !!}

  
   

    <div class="" style="background-color:white; margin-top:1px">
     
      <div class="tabbable tabbable-custom">

        <ul class="nav nav-tabs cls" style="">
          <li class="active"><a href="#tab_1_4" id="tab3" data-toggle="tab" style="background-color: #0090d9; color:white">Organization location Details</a></l> 
   

        </ul>

        <div class="tab-content">

             <div class="col-md-12 min-scroll"><br>
              <div class="row min_width" style="min-width: 600px;">
            <div class="col-md-2"></div>
            <div class="col-md-4 col-sm-4 col-xs-4">      
              
                <div class="form-group">
                  <div class="col-md-2"></div>
                  <div class="col-md-8">
                    <label for="LOCATION_NAME" class=" control-label text-left"> Location Name  </label>
                    {!! Form::text('LOCATION_NAME', Input::old('LOCATION_NAME'),array('class'=>'form-control LOCATION_NAME', 'placeholder'=>'','required' ,'id' =>'LOCATION_NAME', 'pattern'=>'[A-Za-z ]{2,}', 'title'=>'Enter only alphabets value')) !!}
                  </div> 
                  <div class="col-md-2"></div>
                </div> 
              
                <div class="form-group">
                  <div class="col-md-2"></div>
                  <div class="col-md-8">
                    <label for="LOCATION_CODE" class=" control-label text-left"> Location Code  </label>
                  {!! Form::text('LOCATION_CODE', Input::old('LOCATION_CODE'),array('class'=>'form-control LOCATION_CODE', 'placeholder'=>'','required' ,'id' =>'LOCATION_CODE','maxlength'=>'20', 'pattern'=>'^(?=.*[A-Z]{1,})[A-Z\d]{2,20}$','title'=>'Enter only Capital and numeric value')) !!}
                  </div> 
                  <div class="col-md-2"></div>
                </div>               
              
                <div class="form-group">
                  <div class="col-md-2"></div>
                  <div class="col-md-8">
                    <label for="LOCATION_TYPE" class=" control-label text-left"> Location Type </label>
                {!! Form::select('LOCATION_TYPE', array(''=>'Select', 'O'=>'Office','P'=>'Plant','M'=>'Market','D'=>'Depot'),Input::old('LOCATION_TYPE'),array('class' => 'form-control LOCATION_TYPE','required')) !!}
                  </div> 
                  <div class="col-md-2"></div>
                </div>
              
                <div class="form-group">
                  <div class="col-md-2"></div>
                  <div class="col-md-8">
                    <label for="ADDRESS" class=" control-label text-left"> Address </label>
                 {!! Form::text('ADDRESS', Input::old('ADDRESS'),array('class'=>'form-control ADDRESS', 'placeholder'=>'','required' ,'id' =>'ADDRESS')) !!}
                  </div> 
                  <div class="col-md-2"></div>
                </div>              
              
              </div>
               <div class="col-md-4 col-sm-4 col-xs-4">
              
              
                <div class="form-group">
                  <div class="col-md-2"></div>
                  <div class="col-md-8">
                    <label for="CITY" class=" control-label text-left"> City </label>
                   {!! Form::select('CITY',array(''=>'Select City')+$city,  Input::old('CITY'), array('class' => 'form-control CITY','id'=>'CITY','required')) !!}
                  </div> 
                  <div class="col-md-2"></div>
                </div>       
              
                <div class="form-group">
                  <div class="col-md-2"></div>
                  <div class="col-md-8">
                    <label for="STATE" class=" control-label text-left"> State </label>
                   {!! Form::select('STATE',array(''=>'Select State')+$state,  Input::old('STATE'), array('class' => 'form-control STATE','id'=>'STATE','required')) !!}
                  </div> 
                  <div class="col-md-2"></div>
                </div>               
              
                <div class="form-group">
                  <div class="col-md-2"></div>
                  <div class="col-md-8">
                    <label for="COUNTRY" class=" control-label text-left"> Country </label>
               {!! Form::select('COUNTRY',array('99'=>'India')+$country,  Input::old('COUNTRY'), array('class' => 'form-control COUNTRY','id'=>'COUNTRY','required')) !!}
                  </div> 
                  <div class="col-md-2"></div>
                </div>   
                 
                <div class="form-group">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                <label for="HOST_USER" class=" control-label"> Host User </label>  <a class="tips field-hint" data-toggle="control-sidebar"><img src="{{ asset('sximo/images/question.png')}}" /></a><br/>
                <input type="checkbox" id="HOST_USER" name="HOST_USER" class="form-control HOST_USER" />
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


@stop
