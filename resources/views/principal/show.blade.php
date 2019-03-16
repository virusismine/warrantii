@extends('layouts.master6')
@section('content')

<div class="page-content row">
  <div class="page-header">
    <div class="page-title">
      <!--<h3> Principal <small>Show Principal</small></h3>-->
        <a href="{{ URL::to('principal') }}" class="tips icon-btn show-page" title="Back"><img src="{{ asset('sximo/images/icons/back.png')}}" /></a>
        <a href="{{ URL::route('principal.edit',$principal->PRINCIPAL_ID)}}" class="tips icon-btn show-page" title="Edit"><img src="{{ asset('sximo/images/icons/edit.png')}}" /></a>
        <a href="#" class="tips icon-btn show-page" title="Print"><img src="{{ asset('sximo/images/icons/print.png')}}" /></a>
        <a href="#" class="tips icon-btn show-page" title="Menu"><img src="{{ asset('sximo/images/icons/menu-button.png')}}" /></a>
        <a href="#" class="tips icon-btn show-page" title="Info"><img src="{{ asset('sximo/images/icons/info.png')}}" /></a>
        <a href="#" class="tips icon-btn show-page" title="Export"><img src="{{ asset('sximo/images/icons/export.png')}}" /></a>
      <ul class="breadcrumb">
        <li><a href="{{ URL::to('dashboard') }}">{{ Lang::get('core.home') }}</a></li>
        <li><a href="{{ URL::to('principal') }}"> Principal</a></li>
        <li class="active">Show Principal </li>
      </ul>
    </div>


  </div>
  <style>
    .btn-primary { background-color: #000000 !important; border-color: #000000 !important;}
    .btn-primary:hover { background-color: #000000 !important;} 

  </style>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>

    .nav-tabs > li > a {

        color: #fff;
        font-weight: 500;
        background-color: #0777c0e6;
        padding: 5px 15px 5px 20px;
        font-size: 13px;
    }
    legend {text-align: center; background-color:#005b96; color:white; font-size: 14px; margin-bottom: 0px;}
  </style>



  @if(Session::has('message'))	  
  {{ Session::get('message') }}
  @endif	

  {{ Form::model($principal,array('route' => array('principal.update', $principal->PRINCIPAL_ID),'class'=>'form-horizontal','id'=>'resource1', 'method'=>'PUT','files' => true ,'parsley-validate'=>'','novalidate'=>' ')) }}      





  <div class="col-md-12" style="background-color:white;">
    <legend> Principal Details </legend>



    <div class="col-md-12">
      <input type="hidden" class="PRINCIPAL_ID" name="PRINCIPAL_ID" id="PRINCIPAL_ID" value="{{$principal->PRINCIPAL_ID}}">
    </div>
   

    <div class="col-md-12" style="background-color:x; margin-top:12px">
      <div class="row">
      <div class="tabbable tabbable-custom">

        <ul class="nav nav-tabs">


          <li class="active"><a href="#tab_1_4" id="tab3" data-toggle="tab">  Organization</a></li> 
          <li><a href="#tab_1_3" id="tab2" data-toggle="tab">Admin User </a></li>


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
                 {{ Form::select('gender', array(''=>'--Select--', 'M'=>'Male','F'=>'Female'),array('value'=>$tbuser[0]->gender),array('class' => 'form-control gender','disabled')) }}
                  </div> 
                </div>
                  
                <div class="form-group">
                  <div class="col-md-12">
                    <label for="marital_status" class=" control-label text-left"> Marital Status </label>
                    {{ Form::select('marital_status', array(''=>'--Select--', 'M'=>'Married','U'=>'Unmarried'),array('value'=>$tbuser[0]->marital_status),array('class' => 'form-control marital_status','disabled')) }}
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
                    {{ Form::select('addr_citovi',array('0'=>'Select')+$city,array('value'=>$tbuser[0]->addr_citovi), array('class' => 'form-control addr_citovi','id'=>'addr_citovi','disabled')) }}
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
                    {{ Form::select('addr_state',array('0'=>'Select')+$state,array('value'=>$tbuser[0]->addr_state), array('class' => 'form-control addr_state','id'=>'addr_state','disabled')) }}
                  </div> 
                </div>

                <div class="form-group">
                  <div class="col-md-12">
                    <label for="addr_country" class=" control-label text-left"> Country </label>
                    {{ Form::select('addr_country',array('0'=>'Select')+$country,array('value'=>$tbuser[0]->addr_country), array('class' => 'form-control addr_country','id'=>'addr_country','disabled')) }}
                  </div> 
                </div>
              </div> 
              
              <div class="col-md-3 col-sm-3 col-xs-3">

                <div class="form-group">
                  <div class="col-md-12">
                    <label for="ACCESS_TYPE" class=" control-label text-left"> Access Type </label>
                 {{ Form::select('ACCESS_TYPE', array(''=>'--Select--', 'M'=>'Married','U'=>'Unmarried'),array('value'=>$orguser[0]->ACCESS_TYPE),array('class' => 'form-control ACCESS_TYPE','disabled')) }}
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
                    {{ Form::select('DEPARTMENT', array('IS'=>'IT System'),array('value'=>$orguser[0]->DEPARTMENT),array('class' => 'form-control DEPARTMENT','disabled')) }}
                  </div> 
                </div>
                
                <div class="form-group">
                  <div class="col-md-12">
                    <label for="COUNTRY_CODE" class=" control-label text-left"> Country Code </label>
                    {{ Form::select('COUNTRY_CODE',array('0'=>'Select')+$country,array('value'=>$orguser[0]->COUNTRY_CODE), array('class' => 'form-control COUNTRY_CODE','id'=>'COUNTRY_CODE','disabled')) }}
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
                    {{ Form::select('ORG_TYPE', array(''=>'--Select--', 'PVT'=>'Private Limited','PL'=>'Public Limited','LLP'=>'Limited liability partnership','PROP'=>'Proprietor'),array('value'=>$organization[0]->ORG_TYPE),array('class' => 'form-control ORG_TYPE','required','disabled' )) }}
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
                    {{ Form::select('ORG_ADDR_CITYOVI',array('0'=>'Select')+$city,array('value'=>$organization[0]->ORG_ADDR_CITYOVI), array('class' => 'form-control ORG_ADDR_CITYOVI','id'=>'ORG_ADDR_CITYOVI','disabled')) }}
                  </div> 
                </div>
                


              

                <div class="form-group">
                  <div class="col-md-12">
                    <label for="ORG_ADDR_STATE" class=" control-label text-left"> State </label>
                    {{ Form::select('ORG_ADDR_STATE',array('0'=>'Select')+$state,array('value'=>$organization[0]->ORG_ADDR_STATE), array('class' => 'form-control ORG_ADDR_STATE','id'=>'ORG_ADDR_STATE','disabled')) }}
                  </div> 
                </div>

              </div> 
               
               
               
              <div class="col-md-3 col-sm-3 col-xs-3">
                
                <div class="form-group">
                  <div class="col-md-12">
                    <label for="ORG_ADDR_COUNTRY" class=" control-label text-left"> Country </label>
                     {{ Form::select('ORG_ADDR_COUNTRY',array('0'=>'Select')+$country,array('value'=>$organization[0]->ORG_ADDR_COUNTRY), array('class' => 'form-control ORG_ADDR_COUNTRY','id'=>'ORG_ADDR_COUNTRY','disabled')) }}
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
                  {{ Form::select('ORDER_COLLABORATION', array(''=>'--Select--', 'T'=>'TRUE','F'=>'FALSE'),Input::old('ORDER_COLLABORATION'),array('class' => 'form-control ORDER_COLLABORATION','required','disabled')) }} 
                  </div> 
                </div>
                
                <div class="form-group">
                  <div class="col-md-12">
                    <label for="PRODUCT_TRACING" class=" control-label text-left"> Product Tracing </label>
                  {{ Form::select('PRODUCT_TRACING', array(''=>'--Select--', 'T'=>'TRUE','F'=>'FALSE'),Input::old('PRODUCT_TRACING'),array('class' => 'form-control PRODUCT_TRACING','required','disabled')) }} 
                  </div> 
                </div>

    <div class="form-group">
                  <div class="col-md-12">
                    <label for="ORG_SUPERUSER" class=" control-label text-left"> Super User </label>
                    <?php $accountname = Users::where('id','=',$organization[0]->ORG_SUPERUSER)->get();    ?>
                    <input type="text" class="form-control ORG_SUPERUSER" id="ORG_SUPERUSER" name="ORG_SUPERUSER" value="{{$accountname[0]->username}}" disabled="">
                  </div> 
                </div>


              </div> 
            </div>
             </div>
          </div>

            <input type="hidden" value="2" name="count2" id="count2">
            <input type="hidden" name="tableangle2" id="tableangle2">
            
            
            
            

          </div>
          
          
            
           
          </div>
          
          
        </div>
      </div> 
  </div>
    </div> 
  
   <div class="col-md-12 btn-right-bottom"> <br>
            <div class="form-group">
            <div class="col-sm-6" style="text-align:left;left: 224px;" >	
<!--            <a href="{{ URL::to('principal') }}" class="tips btn btn-sm  btn-primary ">Back</a>
             <a href="{{ URL::route('principal.edit',$principal->PRINCIPAL_ID)}}" class="tips btn btn-sm  btn-primary "> Edit </a>-->
               
                
            </div>	
            <div class="col-sm-6" style="text-align:right">	   
                
 @if($principal->STATUS == 'N')
                <button type="button" class="tips btn btn-sm  btn-primary" onclick="actionprincipalactivate()">Enable</button>
                @endif
                @if($principal->STATUS == 'E')
                <button type="button" class="tips btn btn-sm  btn-primary" onclick="actionprincipaldisable()">Disable</button>
                @endif
                @if($principal->STATUS == 'D')
                <button type="button" class="tips btn btn-sm  btn-primary" onclick="actionprincipalenable()">Enable</button>
                @endif
               
            </div>	  
            </div> 
            </div>  
  

  
  </div> 

  {{ Form::close() }}
</div>	
    
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
<!--    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>-->

    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-toggle="control-sidebar"><i class="fa fa-times"></i></button>
        </div>
        <h3 class="control-sidebar-heading">Title</h3>     

      </div>

      <!-- Second Tab -->
      <!--<div class="tab-pane" id="control-sidebar-settings-tab"> <h3 class="control-sidebar-heading">Second Tab</h3> </div>-->
      
    </div>
  </aside>
  <!-- /.control-sidebar -->

  
<script>
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
 
 var principal_id = $('#PRINCIPAL_ID').val();
// alert(principal_id)
 
        $.ajax({
            type: "POST",
            url: "{{URL::route('principal.actionprincipalactivate')}}",
            "_token": $(this).find('input[name=_token]').val(),
            data: {set1: principal_id},
            success: function (data) {
                console.log(data);
                 location.href = "/principal"

                }
        });
    }

        function actionprincipaldisable()
    {
//        alert("actionprincipaldisable")
        
         var principal_id = $('#PRINCIPAL_ID').val();
        $.ajax({
            type: "POST",
            url: "{{URL::route('principal.actionprincipaldisable')}}",
            "_token": $(this).find('input[name=_token]').val(),
            data: {set1: principal_id},
            success: function (data) {
                console.log(data);
               location.href = "/principal"
                }
        });
    }
    
        function actionprincipalenable()
    {
//  alert("actionprincipalenable")
   var principal_id = $('#PRINCIPAL_ID').val();
        $.ajax({
            type: "POST",
            url: "{{URL::route('principal.actionprincipalenable')}}",
            "_token": $(this).find('input[name=_token]').val(),
            data: {set1: principal_id},
            success: function (data) {
                console.log(data);
                location.href = "/principal"
                }
        });
    }
</script>

@stop
