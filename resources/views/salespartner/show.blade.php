@extends('layouts.app')
@section('content')

<div class="page-content row">	
  <div class="page-content-wrapper">
    <ul class="parsley-error-list">
      @foreach($errors->all() as $error)
      <li>{!! $error !!}</li>
      @endforeach
    </ul>
    <div class="sbox animated fadeInRight">
      <div class="sbox-title">

        <div class="page-title half-div">
      <a href="{{ URL::to('salespartner') }}" class="tips icon-btn show-page" title="Back"><img src="{{ asset('sximo/images/icons/back.png')}}"  /></a>
      <a href="{{ URL::to('salespartner/'.$salespartner->PARTNER_ID.'/edit')}}" class="tips icon-btn show-page" title="Edit"><img src="{{ asset('sximo/images/icons/edit.png')}}"  /></a>
      <a href="#" class="tips icon-btn show-page" title="Print"><img src="{{ asset('sximo/images/icons/print.png')}}"  /></a>
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

  {!! Form::model($salespartner,array('route' => array('salespartner.update', $salespartner->PARTNER_ID),'class'=>'form-horizontal','id'=>'resource1', 'method'=>'PUT','files' => true ,'novalidate'=>' ')) !!}      

        <legend> Principal Details </legend>

    <div class="col-md-12" style="background-color:x; margin-top:12px">
      <div class="row">
      <div class="tabbable tabbable-custom">

        <ul class="nav nav-tabs cls" style="">
          <li class="active"><a href="#tab_1_4" id="tab3" data-toggle="tab">General</a></l> 
          <li><a href="#tab_1_5" id="tab2" data-toggle="tab">Organization</a></li>
          <li><a href="#tab_1_3" id="tab4" data-toggle="tab">Admin User</a></li>
        </ul>

        <input type="hidden" id="PARTNER_TYPE" class="PARTNER_TYPE" name="PARTNER_TYPE" value="{{$partnertype}}">
        
        <div class="tab-content">
          <div class="tab-pane  active " id="tab_1_4" style='overflow: hidden'>
            <div class="col-md-12 min-scroll"><br/>
             <div class="row">
                <div class="min_width">
                <div class="col-md-4 col-sm-4 col-xs-4">      
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="PARTNER_CODE" class=" control-label text-left"> Partner Code </label>
                    {!! Form::text('PARTNER_CODE', Input::old('PARTNER_CODE'),array('class'=>'form-control PARTNER_CODE', 'placeholder'=>'', 'maxlength'=>'20', 'pattern'=>'^(?=.*[A-Z]{1,})[A-Z\d]{2,20}$','title'=>'Enter only Capital and numeric value','required','disabled' )) !!} 
                  </div> 
                  <div class="col-md-6"></div>
                </div>   

                <div class="form-group">
                  <div class="col-md-6">
                    <label for="PARTNER_MOBILE" class=" control-label text-left"> Partner Mobile </label>
                    {!! Form::text('PARTNER_MOBILE', Input::old('PARTNER_MOBILE'),array('class'=>'form-control PARTNER_MOBILE', 'placeholder'=>'','required'  ,'maxlength'=>'10' ,'pattern'=>'[0-9]{10,10}','title'=>'Enter a valid mobile number','disabled' )) !!} 
                  </div> 
                  <div class="col-md-6"></div>
                </div>     
                 
            
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="PARTNER_EMAIL" class=" control-label text-left"> Partner Email </label>
                    {!! Form::text('PARTNER_EMAIL', Input::old('PARTNER_EMAIL'),array('class'=>'form-control PARTNER_EMAIL', 'placeholder'=>'','required', 'pattern'=>'[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$', 'title'=>'Enter valid email address','disabled' )) !!} 
                  </div> 
                  <div class="col-md-6"></div>
                </div>     
              
            </div>
             <div class="col-md-4 col-sm-4 col-xs-4">
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="PARTNER_NAME" class=" control-label text-left"> Partner Name </label>
                    {!! Form::text('PARTNER_NAME', Input::old('PARTNER_NAME'),array('class'=>'form-control PARTNER_NAME', 'placeholder'=>'','required','pattern'=>'[A-Za-z ]{2,}','title'=>'Enter only alphabets','disabled' )) !!} 
                  </div> 
                  <div class="col-md-6"></div>
                </div>
               
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="LOCATION_CODE" class=" control-label text-left"> Location </label>
                    {!! Form::select('LOCATION_CODE',array(' '=>'Select Location')+$location,  Input::old('LOCATION_CODE'), array('class' => 'form-control LOCATION_CODE','id'=>'LOCATION_CODE','required','disabled' )) !!}
                  </div> 
                  <div class="col-md-6"></div>
                </div>                
                  
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="COUNTRY_CODE" class=" control-label text-left"> Country </label>
                    {!! Form::select('COUNTRY_CODE',array('99'=>'India')+$country,  Input::old('COUNTRY_CODE'), array('class' => 'form-control COUNTRY_CODE','id'=>'COUNTRY_CODE','required','disabled' )) !!}
                  </div> 
                  <div class="col-md-6"></div>
                </div> 
 
             </div>  
              <div class="col-md-4 col-sm-4 col-xs-4">
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="CREDIT_LIMIT" class=" control-label text-left"> Credit Limit </label>
                    {!! Form::text('CREDIT_LIMIT', Input::old('CREDIT_LIMIT'),array('class'=>'form-control CREDIT_LIMIT', 'placeholder'=>'','disabled' )) !!} 
                  </div> 
                  <div class="col-md-6"></div>
                </div>   
                    
                <div class="form-group">
                <div class="col-md-6">
                    <label for="CREDIT_PERIOD" class=" control-label text-left"> Credit Period </label>
                     <a class="tips field-hint showSingle" target="2" data-toggle="control-sidebar"><img src="{{ asset('sximo/images/question.png')}}" /></a>
                    {!! Form::text('CREDIT_PERIOD', Input::old('CREDIT_PERIOD'),array('class'=>'form-control CREDIT_PERIOD', 'placeholder'=>'In Days','disabled' )) !!} 
                   
                </div> 
                  <div class="col-md-6"></div>
                </div>     
                    
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="OUTSTANDING_DUES" class=" control-label text-left"> Outstanding Dues </label>
                     <a class="tips field-hint showSingle" target="1" data-toggle="control-sidebar"><img src="{{ asset('sximo/images/question.png')}}" /></a>
                     <input type="text" id="OUTSTANDING_DUES" class="form-control OUTSTANDING_DUES" name="OUTSTANDING_DUES" value="0.00" readonly="" disabled="">
                   
                  </div> 
                  <div class="col-md-6"></div>
                </div>     
              </div>
            </div> 
            </div>
          </div>

          </div>
          <div class="tab-pane" id="tab_1_3" style="overflow: hidden">

           <div class="col-md-12 min-scroll"><br>
            <div class="row">
            <div class="min_width"> 
              <div class="col-md-4 col-sm-4 col-xs-4">      
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="first_name" class=" control-label text-left"> First Name </label>
                     <input type="text" class="form-control first_name" id="first_name" name="first_name" value="{{$tbuser[0]->first_name}}" disabled="">
                  </div> 
                  <div class="col-md-6"></div>
                </div>
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="middle_name" class=" control-label text-left"> Middle Name </label>
                    <input type="text" class="form-control middle_name" id="middle_name" name="middle_name" value="{{$tbuser[0]->middle_name}}" disabled="">
                  </div> 
                  <div class="col-md-6"></div>
                </div>
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="last_name" class=" control-label text-left"> Last Name </label>
                    <input type="text" class="form-control last_name" id="last_name" name="last_name" value="{{$tbuser[0]->last_name}}" disabled="">
                  </div> 
                  <div class="col-md-6"></div>
                </div>
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="dob" class=" control-label text-left"> Date Of Birth </label>
                    <input type="text" class="form-control dob" id="dob" name="dob" value="{{$tbuser[0]->dob}}" disabled="">
                  </div> 
                  <div class="col-md-6"></div>
                </div>
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="gender" class=" control-label text-left"> Gender </label>
                    {!! Form::select('gender', array(''=>'Select', 'M'=>'Male','F'=>'Female'),array('value'=>$tbuser[0]->gender),array('class' => 'form-control gender','disabled')) !!}
                  </div> 
                  <div class="col-md-6"></div>
                </div>


                  
                <!--  <div class="form-group">
                  <div class="col-md-6">
                    <label for="c_password" class=" control-label text-left">Confirm Password</label>
                     {!! Form::password('c_password', Input::old('c_password'), array('class' => 'form-control c_password','id'=>'c_password', 'pattern'=>'.{6,}','required' , 'title'=>'password must be minimum six characters')) !!}
                  </div> 
                  <div class="col-md-6"></div>
                </div> -->
                
              </div>
              
              <div class="col-md-4 col-sm-4 col-xs-4">
                
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="marital_status" class=" control-label text-left"> Marital Status </label>
                    {!! Form::select('marital_status', array(''=>'Select', 'M'=>'Married','U'=>'Unmarried'),array('value'=>$tbuser[0]->marital_status),array('class' => 'form-control marital_status','disabled')) !!}
                  </div> 
                  <div class="col-md-6"></div>
                </div>
                
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="addr_house_no" class=" control-label text-left"> House No </label>
                    <input type="text" class="form-control addr_house_no" id="addr_house_no" name="addr_house_no" value="{{$tbuser[0]->addr_house_no}}"  disabled="">
                  </div> 
                  <div class="col-md-6"></div>
                </div>
                
               
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="addr_pin" class=" control-label text-left"> Pin Code </label>
                    <input type="text" class="form-control addr_pin" id="addr_pin" name="addr_pin" value="{{$tbuser[0]->addr_pin}}"  disabled="">
                  </div> 
                  <div class="col-md-6"></div>
                </div>

                <div class="form-group">
                  <div class="col-md-6">
                    <label for="phone_mobile" class=" control-label text-left"> Mobile </label>
                    <input type="text" class="form-control phone_mobile" id="phone_mobile" name="phone_mobile" value="{{$tbuser[0]->phone_mobile}}"  disabled="">
                  </div> 
                  <div class="col-md-6"></div>
                </div>

                <div class="form-group">
                  <div class="col-md-6">
                    <label for="email" class=" control-label text-left"> Email </label>
                    <input type="text" class="form-control email" id="email" name="email" value="{{$tbuser[0]->email}}"  disabled="">
                  </div> 
                  <div class="col-md-6"></div>
                </div>

                  

              </div> 
              
              <div class="col-md-4 col-sm-4 col-xs-4">
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="addr_locality" class=" control-label text-left"> Locality </label>
                    <input type="text" class="form-control addr_locality" id="addr_locality" name="addr_locality" value="{{$tbuser[0]->addr_locality}}"  disabled="">
                  </div> 
                  <div class="col-md-6"></div>
                </div>
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="addr_citovi" class=" control-label text-left"> City </label>
                    {!! Form::select('addr_citovi',array('0'=>'Select')+$city,array('value'=>$tbuser[0]->addr_citovi), array('class' => 'form-control addr_citovi','id'=>'addr_citovi','disabled')) !!}
                  </div> 
                  <div class="col-md-6"></div>
                </div>
                
                
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="addr_district" class=" control-label text-left"> District </label>
                    <input type="text" class="form-control addr_district" id="addr_district" name="addr_district" value="{{$tbuser[0]->addr_district}}"  disabled="">
                  </div> 
                  <div class="col-md-6"></div>
                </div>

                <div class="form-group">
                  <div class="col-md-6">
                    <label for="addr_state" class=" control-label text-left"> State </label>
                    {!! Form::select('addr_state',array('0'=>'Select')+$state,array('value'=>$tbuser[0]->addr_state), array('class' => 'form-control addr_state','id'=>'addr_state','disabled')) !!}
                  </div> 
                  <div class="col-md-6"></div>
                </div>

                <div class="form-group">
                  <div class="col-md-6">
                    <label for="addr_country" class=" control-label text-left"> Country </label>
                    {!! Form::select('addr_country',array('0'=>'Select')+$country,array('value'=>$tbuser[0]->addr_country), array('class' => 'form-control addr_country','id'=>'addr_country','disabled')) !!}
                  </div> 
                  <div class="col-md-6"></div>
                </div>
              </div> 
              
              </div>
           </div>
            </div>
          </div>
          
          
        
            <div class="tab-pane" id="tab_1_5" style='overflow: hidden;'>
            <div class="col-md-12 min-scroll"><br>
            <div class="row">
            <div class="min_width">
              <div class="col-md-3 col-sm-3 col-xs-3">      
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="ORG_TYPE" class=" control-label text-left"> Type </label>
                    {!! Form::select('ORG_TYPE', array(''=>'Select', 'PVT'=>'Private Limited','PL'=>'Public Limited','LLP'=>'Limited liability partnership','PROP'=>'Proprietor'),array('value'=>$organization[0]->ORG_TYPE),array('class' => 'form-control ORG_TYPE','required','disabled' )) !!}
                  </div> 
                  <div class="col-md-6"></div>
                </div> 

                <div class="form-group">
                  <div class="col-md-6">
                    <label for="ORG_NAME" class=" control-label text-left"> Name </label>
                    <input type="text" class="form-control ORG_NAME" id="ORG_NAME" name="ORG_NAME" value="{{$organization[0]->ORG_NAME}}"  disabled=""> 
                  </div> 
                  <div class="col-md-6"></div>
                </div>
                
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="ORG_CODE" class=" control-label text-left"> Code </label>  
                    <input type="text" class="form-control ORG_CODE" id="ORG_CODE" name="ORG_CODE" value="{{$organization[0]->ORG_CODE}}" disabled="">
                  </div> 
                  <div class="col-md-6"></div>
                </div>
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="ORG_EMAIL_ADDRESS" class=" control-label text-left"> Email </label>
                    <input type="text" class="form-control ORG_EMAIL_ADDRESS" id="ORG_EMAIL_ADDRESS" name="ORG_EMAIL_ADDRESS" value="{{$organization[0]->ORG_EMAIL_ADDRESS}}" disabled="">
                  </div> 
                  <div class="col-md-6"></div>
                </div>

                <div class="form-group">
                  <div class="col-md-6">
                    <label for="ORG_ADDR_HOUSE_NO" class=" control-label text-left"> House No </label>
                    <input type="text" class="form-control ORG_ADDR_HOUSE_NO" id="ORG_ADDR_HOUSE_NO" name="ORG_ADDR_HOUSE_NO" value="{{$organization[0]->ORG_ADDR_HOUSE_NO}}" disabled="">
                  </div> 
                  <div class="col-md-6"></div>
                </div>
                

                
              </div>
              <div class="col-md-3 col-sm-3 col-xs-3">
                
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="ORG_ADDR_DIST" class=" control-label text-left"> Address </label>
                    <input type="text" class="form-control ORG_ADDR_DIST" id="ORG_ADDR_DIST" name="ORG_ADDR_DIST" value="{{$organization[0]->ORG_ADDR_DIST}}" disabled="">
                  </div> 
                  <div class="col-md-6"></div>
                </div>
                
                <div class="form-group">
                  <div class="col-md-6">  
                    <label for="ORG_ADDR_CITYOVI" class=" control-label text-left"> City </label>   
                    {!! Form::select('ORG_ADDR_CITYOVI',array('0'=>'Select')+$city,array('value'=>$organization[0]->ORG_ADDR_CITYOVI), array('class' => 'form-control ORG_ADDR_CITYOVI','id'=>'ORG_ADDR_CITYOVI','disabled')) !!}

                  </div> 
                  <div class="col-md-6"></div>
                </div>
                
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="ORG_ADDR_DIST" class=" control-label text-left"> District </label>
                    <input type="text" class="form-control ORG_ADDR_DIST" id="ORG_ADDR_DIST" name="ORG_ADDR_DIST" value="{{$organization[0]->ORG_ADDR_DIST}}" disabled="">
                  </div> 
                  <div class="col-md-6"></div>
                </div>

                <div class="form-group">
                  <div class="col-md-6">
                    <label for="ORG_ADDR_LOCALITY" class=" control-label text-left"> Locality </label>
                    <input type="text" class="form-control ORG_ADDR_LOCALITY" id="ORG_ADDR_LOCALITY" name="ORG_ADDR_LOCALITY" value="{{$organization[0]->ORG_ADDR_LOCALITY}}" disabled="">
                  </div> 
                  <div class="col-md-6"></div>
                </div>

                                <div class="form-group">
                  <div class="col-md-6">
                    <label for="ORG_ADDR_STATE" class=" control-label text-left"> State </label> 
                    {!! Form::select('ORG_ADDR_STATE',array('0'=>'Select')+$state,array('value'=>$organization[0]->ORG_ADDR_STATE), array('class' => 'form-control ORG_ADDR_STATE','id'=>'ORG_ADDR_STATE','disabled')) !!}
                  </div> 
                  <div class="col-md-6"></div>
                </div>


              </div> 
              <div class="col-md-3 col-sm-3 col-xs-3">

                <div class="form-group">
                  <div class="col-md-6">
                    <label for="ORG_ADDR_COUNTRY" class=" control-label text-left"> Country </label> 
                    {!! Form::select('ORG_ADDR_COUNTRY',array('0'=>'Select')+$country,array('value'=>$organization[0]->ORG_ADDR_COUNTRY), array('class' => 'form-control ORG_ADDR_COUNTRY','id'=>'ORG_ADDR_COUNTRY','disabled')) !!}
                  </div> 
                  <div class="col-md-6"></div>
                </div>
                
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="ORG_ADDR_PIN" class=" control-label text-left"> Pin Code </label> 
                    <input type="text" class="form-control ORG_ADDR_PIN" id="ORG_ADDR_PIN" name="ORG_ADDR_PIN" value="{{$organization[0]->ORG_ADDR_PIN}}" disabled="">
                  </div> 
                  <div class="col-md-6"></div>
                </div>

                <div class="form-group">
                  <div class="col-md-6">
                    <label for="ORG_PHONE_MOBILE" class=" control-label text-left"> Mobile </label> 
                    <input type="text" class="form-control ORG_PHONE_MOBILE" id="ORG_PHONE_MOBILE" name="ORG_PHONE_MOBILE" value="{{$organization[0]->ORG_PHONE_MOBILE}}" disabled="">
                  </div> 
                  <div class="col-md-6"></div>
                </div>

                <div class="form-group">
                  <div class="col-md-6">
                    <label for="ORG_SUPERUSER" class=" control-label text-left"> Super User </label>
                    
                    <input type="text" class="form-control ORG_SUPERUSER" id="ORG_SUPERUSER" name="ORG_SUPERUSER" value="{{$tbuser[0]->username}}" disabled="">
                  </div> 
                  <div class="col-md-6"></div>
                </div>
              </div> 

                          
                 <div class="col-md-3 col-sm-3 col-xs-3">

                <div class="form-group">
                  <div class="col-md-6">
                    <label for="ACCESS_TYPE" class=" control-label text-left"> Access Type </label>
                    {!! Form::select('ACCESS_TYPE', array(''=>'Select', 'U'=>'User','M'=>'Manager'),array('value'=>$orguser[0]->ACCESS_TYPE),array('class' => 'form-control ACCESS_TYPE','disabled')) !!}
                  </div> 
                  <div class="col-md-6"></div>
                </div>
                
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="USER_CODE" class=" control-label text-left"> User Code </label>
                    <input type="text" class="form-control USER_CODE" id="USER_CODE" name="USER_CODE" value="{{$orguser[0]->USER_CODE}}"  disabled="">
                  </div> 
                  <div class="col-md-6"></div>
                </div>
                
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="DEPARTMENT" class=" control-label text-left"> Department </label>
                    {!! Form::select('DEPARTMENT', array('MG'=>'Managenent'),array('value'=>$orguser[0]->DEPARTMENT),array('class' => 'form-control DEPARTMENT','disabled')) !!}
                  </div> 
                  <div class="col-md-6"></div>
                </div>
                
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="COUNTRY_CODE" class=" control-label text-left"> Country Code </label>
                    {!! Form::select('COUNTRY_CODE',array('0'=>'Select')+$country,array('value'=>$orguser[0]->COUNTRY_CODE), array('class' => 'form-control COUNTRY_CODE','id'=>'COUNTRY_CODE','disabled')) !!}
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
    </div>

        <div class="col-md-12 btn-right-bottom" >  <br>
          <div class="form-group">
            <div class="col-sm-12" style="text-align: left; left:225px;">	
              <input type="submit" name="submit" class="tips btn btn-sm  btn-primary align-right submit hidden" onclick="check_valid()" value="{{ Lang::get('core.sb_save') }}  " />
              <!--<a href="{!! URL::to('principal') !!}" class="tips btn btn-sm  btn-primary ">{!! Lang::get('core.sb_cancel') !!}</a>-->
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
              var windowHeight = $(window).innerHeight();
              var x = windowHeight - 150;
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
              var windowHeight = $(window).innerHeight();
              var x = windowHeight - 150;
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
  </script>

  <script>
      function myFunction() {
          var popup = document.getElementById("myPopup");
          popup.classList.toggle("show");
      }
  </script>     


  
  <script>
jQuery(function() {
  jQuery('.showSingle').click(function() {
    jQuery('.targetDiv').hide();
    jQuery('#div' + $(this).attr('target')).show();
  });
});
  </script>

<script>
function check_valid()
{
var partner_code =$(".PARTNER_CODE").val();
var partner_mobile =$(".PARTNER_MOBILE").val();
var partner_email =$(".PARTNER_EMAIL").val();
var partner_name =$(".PARTNER_NAME").val();
var class_code =$(".CLASS_CODE").val();


var o_type =$(".ORG_TYPE").val();
var o_name =$(".ORG_NAME").val();
var o_code =$(".ORG_CODE").val();
var o_email =$(".ORG_EMAIL_ADDRESS").val();
var o_city =$(".ORG_ADDR_CITYOVI").val();
var o_state =$(".ORG_ADDR_STATE").val();
var o_pin =$(".ORG_ADDR_PIN").val();
var o_mobile =$(".ORG_PHONE_MOBILE").val();
var o_access =$(".ACCESS_TYPE").val();
var o_user_code =$(".USER_CODE").val();

var u_f_name =$(".first_name").val();
var u_dob =$(".dob").val();
var u_gender =$(".gender").val();
var u_status =$(".marital_status").val();
var u_email =$(".email").val();
var u_password =$(".password").val();
var u_pin =$(".addr_pin").val();
var u_mobile =$(".phone_mobile").val();
var u_city =$(".addr_citovi").val();
var u_state =$(".addr_state").val();


var onlyperiod=/^([0-9]{1,5})+$/;
var onlycredit=/^([0-9]{1,})+$/;
var onlytext=/^([a-zA-z ]{2,})+$/;
var onlycode=/^(?=.*[A-Z]{1,})[A-Z\d]{2,20}$/;
var validemail=/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/;
var onlynumber=/^([0-9]{10,10})+$/;
var onlypin=/^([0-9]{6,6})+$/;
var onlypass= /^.{8,}$/;


if(partner_code === "" )
{
 /* alert("please enter the FirstName"); */
  $.tappification({ type: 'danger', message: 'Please Enter Partner Code' }); 
  $(".PARTNER_CODE").focus();
  return false;
}

else if(!partner_code.match(onlycode))
{
  $.tappification({ type: 'danger', message: 'Please Enter Code in Capital Value and Numeric' }); 
  $(".PARTNER_CODE").focus();
  return false;
}

if(partner_mobile === "" )
{
  $.tappification({ type: 'danger', message: 'Please Enter Partner Mobile Number' }); 
  $(".PARTNER_MOBILE").focus();
  return false;
}

else if(!partner_mobile.match(onlynumber))
{
  $.tappification({ type: 'danger', message: 'Please Enter Correct Mobile Number' }); 
  $(".PARTNER_MOBILE").focus();
  return false;
}

if(partner_email === "" )
{
  $.tappification({ type: 'danger', message: 'Please Enter Partner E-mail Address' }); 
  $(".PARTNER_EMAIL").focus();
  return false;
}

else if(!partner_email.match(validemail))
{
  $.tappification({ type: 'danger', message: 'Please Enter Correct E-mail Address' }); 
  $(".PARTNER_EMAIL").focus();
  return false;
}

if(partner_name === "" )
{
  $.tappification({ type: 'danger', message: 'Please Enter Partner Name' }); 
  $(".PARTNER_NAME").focus();
  return false;
}

else if(!partner_name.match(onlytext))
{
  $.tappification({ type: 'danger', message: 'Please Enter Name Only in Alphabets' }); 
  $(".PARTNER_NAME").focus();
  return false;
}

else if(class_code === "")
{
  $.tappification({ type: 'danger', message: 'Please Select Class Code' }); 
  $(".CLASS_CODE").focus();
  return false;
}

else if(o_type === "")
{
  $.tappification({ type: 'danger', message: 'Please Select Organization Type' }); 
  $(".ORG_TYPE").focus();
  return false;
}

else if(o_name === "")
{
  $.tappification({ type: 'danger', message: 'Please Enter Organization Name' }); 
  $(".ORG_NAME").focus();
  return false;
}

else if(!o_name.match(onlytext))
{
  $.tappification({ type: 'danger', message: 'Please Enter Name Only in Alphabets' }); 
  $(".ORG_NAME").focus();
  return false;
}

else if(o_code === "")
{
  $.tappification({ type: 'danger', message: 'Please Enter Organization Code' }); 
  $(".ORG_CODE").focus();
  return false;
}

else if(!o_code.match(onlycode))
{
  $.tappification({ type: 'danger', message: 'Please Enter Code Only in Capital Alphabets and Numeric' }); 
  $(".ORG_CODE").focus();
  return false;
}

else if(o_email === "")
{
  $.tappification({ type: 'danger', message: 'Please Enter Organization E-mail Address' }); 
  $(".ORG_EMAIL_ADDRESS").focus();
  return false;
}

else if(!o_email.match(validemail))
{
  $.tappification({ type: 'danger', message: 'Please Enter Correct E-mail Address' }); 
  $(".ORG_EMAIL_ADDRESS").focus();
  return false;
}

else if(o_city === "")
{
  $.tappification({ type: 'danger', message: 'Please Select Organization City' }); 
  $(".ORG_ADDR_CITYOVI").focus();
  return false;
}

else if(o_state === "")
{
  $.tappification({ type: 'danger', message: 'Please Select Organization State' }); 
  $(".ORG_ADDR_STATE").focus();
  return false;
}

else if(o_pin === "")
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

else if(o_mobile === "")
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

else if(o_access === "")
{
  $.tappification({ type: 'danger', message: 'Please Select Organization Access Type' }); 
  $(".ACCESS_TYPE").focus();
  return false;
}

else if(o_user_code === "")
{
  $.tappification({ type: 'danger', message: 'Please Enter Organization User Code' }); 
  $(".USER_CODE").focus();
  return false;
}

else if(!o_user_code.match(onlycode))
{
  $.tappification({ type: 'danger', message: 'Please Enter Code Only in Capital Alphabets and Numeric' }); 
  $(".USER_CODE").focus();
  return false;
}

else if(u_f_name === "")
{
  $.tappification({ type: 'danger', message: 'Please Enter First Name' }); 
  $(".first_name").focus();
  return false;
}

else if(!u_f_name.match(onlytext))
{
  $.tappification({ type: 'danger', message: 'Please Enter Name Only in Alphabets' }); 
  $(".first_name").focus();
  return false;
}

else if(u_dob === "")
{
  $.tappification({ type: 'danger', message: 'Please Select Date of Birth' }); 
  $(".dob").focus();
  return false;
}

else if(u_gender === "")
{
  $.tappification({ type: 'danger', message: 'Please Select Gender' }); 
  $(".gender").focus();
  return false;
}

else if(u_status === "")
{
  $.tappification({ type: 'danger', message: 'Please Select Marital Status' }); 
  $(".marital_status").focus();
  return false;
}

else if(u_email === "")
{
  $.tappification({ type: 'danger', message: 'Please Enter E-mail Address' }); 
  $(".email").focus();
  return false;
}

else if(!u_email.match(validemail))
{
  $.tappification({ type: 'danger', message: 'Please Enter Correct E-mail Address' }); 
  $(".email").focus();
  return false;
}

else if(!u_password.match(onlypass))
{
  $.tappification({ type: 'danger', message: 'Password must be Minimum 8 Characters' }); 
  $(".password").focus();
  return false;
}

else if(u_pin === "")
{
  $.tappification({ type: 'danger', message: 'Please Enter Pin Code' }); 
  $(".addr_pin").focus();
  return false;
}

else if(!u_pin.match(onlypin))
{
  $.tappification({ type: 'danger', message: 'Please Enter Correct Pin Code' }); 
  $(".addr_pin").focus();
  return false;
}

else if(!u_mobile.match(onlynumber))
{
  $.tappification({ type: 'danger', message: 'Please Enter Correct Mobile Number' }); 
  $(".phone_mobile").focus();
  return false;
}

else if(u_city === "")
{
  $.tappification({ type: 'danger', message: 'Please Select City' }); 
  $(".addr_citovi").focus();
  return false;
}

else if(u_state === "")
{
  $.tappification({ type: 'danger', message: 'Please Select State' }); 
  $(".addr_state").focus();
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
            bInfo: false
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
        };

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

    $(function () {

                        var d = new Date(90,0,1);
                        $("#dob").datepicker({
	                defaultDate:d, //set the default date to Jan 1st 1990
			changeMonth: true,
			changeYear: true,
	                yearRange: '1930:2000', //set the range of years
	                dateFormat: 'dd-mm-yy' //set the format of the date
                        });
    });

</script>

@stop
