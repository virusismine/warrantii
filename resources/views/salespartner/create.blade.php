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

        {!! Form::open(array('route'=>'salespartner.store', 'class'=>'form-horizontal','id'=>'resource1' ,'files' => true ,'enctype'=>'multipart/form-data','novalidate'=>' ')) !!}

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
                    {!! Form::text('PARTNER_CODE', Input::old('PARTNER_CODE'),array('class'=>'form-control PARTNER_CODE', 'placeholder'=>'', 'maxlength'=>'20', 'pattern'=>'^(?=.*[A-Z]{1,})[A-Z\d]{2,20}$','title'=>'Enter only Capital and numeric value','required' )) !!} 
                  </div> 
                  <div class="col-md-6"></div>
                </div>   

                <div class="form-group">
                  <div class="col-md-6">
                    <label for="PARTNER_MOBILE" class=" control-label text-left"> Partner Mobile </label>
                    {!! Form::text('PARTNER_MOBILE', Input::old('PARTNER_MOBILE'),array('class'=>'form-control PARTNER_MOBILE', 'placeholder'=>'','required'  ,'maxlength'=>'10' ,'pattern'=>'[0-9]{10,10}','title'=>'Enter a valid mobile number')) !!} 
                  </div> 
                  <div class="col-md-6"></div>
                </div>     
                 
            
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="PARTNER_EMAIL" class=" control-label text-left"> Partner Email </label>
                    {!! Form::text('PARTNER_EMAIL', Input::old('PARTNER_EMAIL'),array('class'=>'form-control PARTNER_EMAIL', 'placeholder'=>'','required', 'pattern'=>'[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$', 'title'=>'Enter valid email address')) !!} 
                  </div> 
                  <div class="col-md-6"></div>
                </div>     
              
            </div>
             <div class="col-md-4 col-sm-4 col-xs-4">
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="PARTNER_NAME" class=" control-label text-left"> Partner Name </label>
                    {!! Form::text('PARTNER_NAME', Input::old('PARTNER_NAME'),array('class'=>'form-control PARTNER_NAME', 'placeholder'=>'','required','pattern'=>'[A-Za-z ]{2,}','title'=>'Enter only alphabets')) !!} 
                  </div> 
                  <div class="col-md-6"></div>
                </div>
               
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="LOCATION_CODE" class=" control-label text-left"> Location </label>
                    {!! Form::select('LOCATION_CODE',array(' '=>'Select Location')+$location,  Input::old('LOCATION_CODE'), array('class' => 'form-control LOCATION_CODE','id'=>'LOCATION_CODE','required')) !!}
                  </div> 
                  <div class="col-md-6"></div>
                </div>                
                  
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="COUNTRY_CODE" class=" control-label text-left"> Country </label>
                    {!! Form::select('COUNTRY_CODE',array('99'=>'India')+$country,  Input::old('COUNTRY_CODE'), array('class' => 'form-control COUNTRY_CODE','id'=>'COUNTRY_CODE','required')) !!}
                  </div> 
                  <div class="col-md-6"></div>
                </div> 
 
             </div>  
              <div class="col-md-4 col-sm-4 col-xs-4">
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="CREDIT_LIMIT" class=" control-label text-left"> Credit Limit </label>
                    {!! Form::text('CREDIT_LIMIT', Input::old('CREDIT_LIMIT'),array('class'=>'form-control CREDIT_LIMIT', 'placeholder'=>'')) !!} 
                  </div> 
                  <div class="col-md-6"></div>
                </div>   
                    
                <div class="form-group">
                <div class="col-md-6">
                    <label for="CREDIT_PERIOD" class=" control-label text-left"> Credit Period </label>
                     <a class="tips field-hint showSingle" target="2" data-toggle="control-sidebar"><img src="{{ asset('sximo/images/question.png')}}" /></a>
                    {!! Form::text('CREDIT_PERIOD', Input::old('CREDIT_PERIOD'),array('class'=>'form-control CREDIT_PERIOD', 'placeholder'=>'In Days')) !!} 
                   
                </div> 
                  <div class="col-md-6"></div>
                </div>     
                    
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="OUTSTANDING_DUES" class=" control-label text-left"> Outstanding Dues </label>
                     <a class="tips field-hint showSingle" target="1" data-toggle="control-sidebar"><img src="{{ asset('sximo/images/question.png')}}" /></a>
                    <input type="text" id="OUTSTANDING_DUES" class="form-control OUTSTANDING_DUES" name="OUTSTANDING_DUES" value="0.00" readonly="">
                   
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
                    {!! Form::text('first_name', Input::old('first_name'),array('class'=>'form-control first_name', 'placeholder'=>'','required','pattern'=>'[A-Za-z ]{2,}','title'=>'Enter only alphabets')) !!} 
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
                    {!! Form::text('dob', Input::old('dob'),array('class'=>'form-control dob','id'=>'dob', 'placeholder'=>'','readonly', 'required' )) !!} 
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
                    <label for="addr_house_no" class=" control-label text-left"> House No </label>
                    {!! Form::text('addr_house_no', Input::old('addr_house_no'),array('class'=>'form-control addr_house_no', 'placeholder'=>'')) !!} 
                  </div> 
                  <div class="col-md-6"></div>
                </div>
                
               
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="addr_pin" class=" control-label text-left"> Pin Code </label>
                    {!! Form::text('addr_pin', Input::old('addr_pin'),array('class'=>'form-control addr_pin', 'placeholder'=>'','maxlength'=>'6','pattern'=>'[0-9]{6}','title'=>'Enter valid Pin Code','required')) !!} 
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
                    <label for="email" class=" control-label text-left"> Email </label>
                    {!! Form::text('email', Input::old('email'),array('class'=>'form-control email', 'placeholder'=>'','required' , 'pattern'=>'[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$')) !!} 
                  </div> 
                  <div class="col-md-6"></div>
                </div>
                  
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="password" class=" control-label text-left"> Password </label>
                     {!! Form::text('password', Input::old('password'), array('class' => 'form-control password','id'=>'password', 'pattern'=>'.{8,}', 'required', 'title'=>'Password must be minimum 8 characters' )) !!}
                  </div> 
                  <div class="col-md-6"></div>
                </div>
                  

              </div> 
              
              <div class="col-md-4 col-sm-4 col-xs-4">
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
                    {!! Form::select('addr_citovi',array(''=>'Select City')+$city,  Input::old('addr_citovi'), array('class' => 'form-control addr_citovi','id'=>'addr_citovi','required')) !!}
                  </div> 
                  <div class="col-md-6"></div>
                </div>
                
                
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="addr_district" class=" control-label text-left"> District </label>
                    {!! Form::text('addr_district', Input::old('addr_district'),array('class'=>'form-control addr_district', 'placeholder'=>'' )) !!} 
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
                    {!! Form::select('ORG_TYPE', array(''=>'Select', 'PVT'=>'Private Limited','PL'=>'Public Limited','LLP'=>'Limited liability partnership','PROP'=>'Proprietor'),Input::old('ORG_TYPE'),array('class' => 'form-control ORG_TYPE','id'=>'ORG_TYPE','required')) !!}
                  </div> 
                  <div class="col-md-6"></div>
                </div> 

                <div class="form-group">
                  <div class="col-md-6">
                    <label for="ORG_NAME" class=" control-label text-left"> Name </label>
                    {!! Form::text('ORG_NAME', Input::old('ORG_NAME'),array('class'=>'form-control ORG_NAME', 'placeholder'=>'','required','id'=>'ORG_NAME','pattern'=>'[A-Za-z ]{2,}','title'=>'Enter only alphabets value')) !!} 
                  </div> 
                  <div class="col-md-6"></div>
                </div>
                
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="ORG_CODE" class=" control-label text-left"> Code </label>  
                    {!! Form::text('ORG_CODE', Input::old('ORG_CODE'),array('class'=>'form-control ORG_CODE', 'placeholder'=>'','pattern'=>'^(?=.*[A-Z]{1,})[A-Z\d]{2,20}$','title'=>'Enter only Capital and numeric value','required','id'=>'ORG_CODE')) !!} 
                  </div> 
                  <div class="col-md-6"></div>
                </div>
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="ORG_EMAIL_ADDRESS" class=" control-label text-left"> Email </label>
                    {!! Form::text('ORG_EMAIL_ADDRESS', Input::old('ORG_EMAIL_ADDRESS'),array('class'=>'form-control ORG_EMAIL_ADDRESS','id'=>'ORG_EMAIL_ADDRESS','placeholder'=>'','required', 'pattern'=>'[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$', 'title'=>'Enter valid email address')) !!} 
                  </div> 
                  <div class="col-md-6"></div>
                </div>

                <div class="form-group">
                  <div class="col-md-6">
                    <label for="ORG_ADDR_HOUSE_NO" class=" control-label text-left"> House No </label>
                    {!! Form::text('ORG_ADDR_HOUSE_NO', Input::old('ORG_ADDR_HOUSE_NO'),array('class'=>'form-control', 'placeholder'=>'')) !!} 
                  </div> 
                  <div class="col-md-6"></div>
                </div>
                

                
              </div>
              <div class="col-md-3 col-sm-3 col-xs-3">
                
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="ORG_ADDR_DIST" class=" control-label text-left"> Address </label>
                    {!! Form::text('ORG_ADDR_DIST', Input::old('ORG_ADDR_DIST'),array('class'=>'form-control ORG_ADDR_DIST', 'placeholder'=>'')) !!} 
                  </div> 
                  <div class="col-md-6"></div>
                </div>
                
                <div class="form-group">
                  <div class="col-md-6">  
                    <label for="ORG_ADDR_CITYOVI" class=" control-label text-left"> City </label>   
                    {!! Form::select('ORG_ADDR_CITYOVI',array(''=>'Select City')+$city,  Input::old('ORG_ADDR_CITYOVI'), array('class' => 'form-control ORG_ADDR_CITYOVI','id'=>'ORG_ADDR_CITYOVI','required','id'=>'ORG_ADDR_CITYOVI')) !!}

                  </div> 
                  <div class="col-md-6"></div>
                </div>
                
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="ORG_ADDR_DIST" class=" control-label text-left"> District </label>
                    {!! Form::text('ORG_ADDR_DIST', Input::old('ORG_ADDR_DIST'),array('class'=>'form-control ORG_ADDR_DIST', 'placeholder'=>'')) !!} 
                  </div> 
                  <div class="col-md-6"></div>
                </div>

                <div class="form-group">
                  <div class="col-md-6">
                    <label for="ORG_ADDR_LOCALITY" class=" control-label text-left"> Locality </label>
                    {!! Form::text('ORG_ADDR_LOCALITY', Input::old('ORG_ADDR_LOCALITY'),array('class'=>'form-control ORG_ADDR_LOCALITY', 'placeholder'=>'')) !!} 
                  </div> 
                  <div class="col-md-6"></div>
                </div>

                                <div class="form-group">
                  <div class="col-md-6">
                    <label for="ORG_ADDR_STATE" class=" control-label text-left"> State </label> 
                    {!! Form::select('ORG_ADDR_STATE',array(''=>'Select State')+$state,  Input::old('ORG_ADDR_STATE'), array('class' => 'form-control ORG_ADDR_STATE','id'=>'ORG_ADDR_STATE','required','id'=>'ORG_ADDR_STATE')) !!}
                  </div> 
                  <div class="col-md-6"></div>
                </div>


              </div> 
              <div class="col-md-3 col-sm-3 col-xs-3">

                <div class="form-group">
                  <div class="col-md-6">
                    <label for="ORG_ADDR_COUNTRY" class=" control-label text-left"> Country </label> 
                    {!! Form::select('ORG_ADDR_COUNTRY',array('99'=>'India')+$country,  Input::old('ORG_ADDR_COUNTRY'), array('class' => 'form-control ORG_ADDR_COUNTRY','id'=>'ORG_ADDR_COUNTRY','required','id'=>'ORG_ADDR_COUNTRY')) !!}
                  </div> 
                  <div class="col-md-6"></div>
                </div>
                
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="ORG_ADDR_PIN" class=" control-label text-left"> Pin Code </label> 
                    {!! Form::text('ORG_ADDR_PIN', Input::old('ORG_ADDR_PIN'),array('class'=>'form-control ORG_ADDR_PIN', 'placeholder'=>'','maxlength'=>'6','pattern'=>'[0-9]{6}','title'=>'Enter valid Pin Code','required','id'=>'ORG_ADDR_PIN')) !!} 
                  </div> 
                  <div class="col-md-6"></div>
                </div>

                <div class="form-group">
                  <div class="col-md-6">
                    <label for="ORG_PHONE_MOBILE" class=" control-label text-left"> Mobile </label> 
                    {!! Form::text('ORG_PHONE_MOBILE', Input::old('ORG_PHONE_MOBILE'),array('class'=>'form-control ORG_PHONE_MOBILE', 'placeholder'=>'','required','maxlength'=>'10' ,'pattern'=>'[0-9]{10,10}','title'=>'enter a valid mobile number','id'=>'ORG_PHONE_MOBILE' )) !!} 
                  </div> 
                  <div class="col-md-6"></div>
                </div>


              </div> 

                          
                 <div class="col-md-3 col-sm-3 col-xs-3">

                <div class="form-group">
                  <div class="col-md-6">
                    <label for="ACCESS_TYPE" class=" control-label text-left"> Access Type </label>
                    {!! Form::select('ACCESS_TYPE', array(''=>'Select', 'U'=>'User','M'=>'Manager'),Input::old('ACCESS_TYPE'),array('class' => 'form-control ACCESS_TYPE','required','required','id'=>'ACCESS_TYPE')) !!} 
                  </div> 
                  <div class="col-md-6"></div>
                </div>
                
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="USER_CODE" class=" control-label text-left"> User Code </label>
                    {!! Form::text('USER_CODE', Input::old('USER_CODE'),array('class'=>'form-control USER_CODE', 'placeholder'=>'','maxlength'=>'20', 'pattern'=>'^(?=.*[A-Z]{1,})[A-Z\d]{2,20}$','required','title'=>'Enter only Capital and numeric value','id'=>'USER_CODE')) !!} 
                  </div> 
                  <div class="col-md-6"></div>
                </div>
                
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="DEPARTMENT" class=" control-label text-left"> Department </label>
                    {!! Form::select('DEPARTMENT', array('MG'=>'Managenent'),Input::old('DEPARTMENT'),array('class' => 'form-control DEPARTMENT','required','required','id'=>'DEPARTMENT')) !!} 
                  </div> 
                  <div class="col-md-6"></div>
                </div>
                
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="COUNTRY_CODE" class=" control-label text-left"> Country Code </label>
                    {!! Form::select('COUNTRY_CODE',array('99'=>'India')+$country,  Input::old('COUNTRY_CODE'), array('class' => 'form-control COUNTRY_CODE','id'=>'COUNTRY_CODE','required','id'=>'COUNTRY_CODE')) !!}
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
