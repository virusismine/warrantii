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
    <a href="{{URL::to('servicepartner') }}" class="tips icon-btn create-page" title="Cancel"><img src="{{asset('sximo/images/icons/back.png')}}"/></a>
    <a class="tips icon-btn create-page" title="Save" onclick="page_submit()"><img src="{{asset('sximo/images/icons/save.png')}}" /></a>
    <a onclick="window.location.reload()" class="tips icon-btn create-page" title="Reset"><img src="{{asset('sximo/images/icons/reset.png')}}" /></a>
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

  {!! Form::model($servicepartner,array('route' => array('salespartner.update', $servicepartner->PARTNER_ID),'class'=>'form-horizontal','id'=>'resource1', 'method'=>'PUT','files' => true ,'novalidate'=>' ')) !!}      

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
                    {!! Form::text('PARTNER_CODE', Input::old('PARTNER_CODE'),array('class'=>'form-control PARTNER_CODE', 'placeholder'=>'', 'pattern'=>'^(?=.*[A-Z]{1,})[A-Z\d]{2,20}$','title'=>'Enter only Capital and numeric value','required')) !!} 
                  </div> 
                  <div class="col-md-6"></div>
                </div>   

                <div class="form-group">
                  <div class="col-md-6">
                    <label for="PARTNER_MOBILE" class=" control-label text-left"> Partner Mobile </label>
                    {!! Form::text('PARTNER_MOBILE', Input::old('PARTNER_MOBILE'),array('class'=>'form-control PARTNER_MOBILE', 'placeholder'=>'','required'  ,'maxlength'=>'10' ,'pattern'=>'[0-9]{10,10}','title'=>'enter a valid mobile number')) !!} 
                  </div> 
                  <div class="col-md-6"></div>
                </div>     
                 
            
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="PARTNER_EMAIL" class=" control-label text-left"> Partner Email </label>
                    {!! Form::text('PARTNER_EMAIL', Input::old('PARTNER_EMAIL'),array('class'=>'form-control PARTNER_EMAIL', 'placeholder'=>'','required', 'pattern'=>'[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$')) !!} 
                  </div> 
                  <div class="col-md-6"></div>
                </div>     
              
            </div>
             <div class="col-md-4 col-sm-4 col-xs-4">
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="PARTNER_NAME" class=" control-label text-left"> Partner Name </label>
                    {!! Form::text('PARTNER_NAME', Input::old('PARTNER_NAME'),array('class'=>'form-control PARTNER_NAME', 'placeholder'=>'', 'required','pattern'=>'[A-Za-z ]{2,}','title'=>'Enter only alphabets value')) !!} 
                  </div> 
                  <div class="col-md-6"></div>
                </div>
               
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="LOCATION_CODE" class=" control-label text-left"> Location </label>
                    {!! Form::select('LOCATION_CODE',array(' '=>'Select Location')+$location,  Input::old('LOCATION_CODE'), array('class' => 'form-control LOCATION_CODE','id'=>'LOCATION_CODE','required' )) !!}
                  </div> 
                  <div class="col-md-6"></div>
                </div>                
                  
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="COUNTRY_CODE" class=" control-label text-left"> Country </label>
                    {!! Form::select('COUNTRY_CODE',array('99'=>'India')+$country,  Input::old('COUNTRY_CODE'), array('class' => 'form-control COUNTRY_CODE','id'=>'COUNTRY_CODE')) !!}
                  </div> 
                  <div class="col-md-6"></div>
                </div> 
 
             </div>  
              <div class="col-md-4 col-sm-4 col-xs-4">
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="CREDIT_LIMIT" class=" control-label text-left"> Credit Limit </label>
                    {!! Form::text('CREDIT_LIMIT', Input::old('CREDIT_LIMIT'),array('class'=>'form-control CREDIT_LIMIT', 'placeholder'=>''  )) !!}
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
                    <input type="text" class="form-control first_name" id="first_name" name="first_name" value="{{$tbuser[0]->first_name}}" required="" pattern='[A-Za-z ]{2,}' title='Enter only alphabets value' >
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
                     <input type="text" class="form-control last_name" id="last_name" name="last_name" value="{{$tbuser[0]->last_name}}">
                  </div> 
                  <div class="col-md-6"></div>
                </div>
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="dob" class=" control-label text-left"> Date Of Birth </label>
                    <input type="text" class="form-control dob" id="dob" name="dob" value="{{$tbuser[0]->dob}}" readonly="" >
                  </div> 
                  <div class="col-md-6"></div>
                </div>
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="gender" class=" control-label text-left"> Gender </label>
                 {!! Form::select('gender', array(''=>'Select', 'M'=>'Male','F'=>'Female'),array('value'=>$tbuser[0]->gender),array('class' => 'form-control gender','required')) !!}
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
                    {!! Form::select('marital_status', array(''=>'Select', 'M'=>'Married','U'=>'Unmarried'),array('value'=>$tbuser[0]->marital_status),array('class' => 'form-control marital_status','required')) !!}
                  </div> 
                  <div class="col-md-6"></div>
                </div>
                
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="addr_house_no" class=" control-label text-left"> House No </label>
                      <input type="text" class="form-control addr_house_no" id="addr_house_no" name="addr_house_no" value="{{$tbuser[0]->addr_house_no}}">
                  </div> 
                  <div class="col-md-6"></div>
                </div>
                
               
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="addr_pin" class=" control-label text-left"> Pin Code </label>
                      <input type="text" class="form-control addr_pin" id="addr_pin" name="addr_pin" value="{{$tbuser[0]->addr_pin}}" required="" maxlength = "6" pattern="[0-9]{6,6}">
                  </div> 
                  <div class="col-md-6"></div>
                </div>

                <div class="form-group">
                  <div class="col-md-6">
                    <label for="phone_mobile" class=" control-label text-left"> Mobile </label>
                      <input type="text" class="form-control phone_mobile" id="phone_mobile" name="phone_mobile" value="{{$tbuser[0]->phone_mobile}}" maxlength = "10" pattern="[0-9]{10,10}" title = "enter a valid mobile number" required="">
                  </div> 
                  <div class="col-md-6"></div>
                </div>

                <div class="form-group">
                  <div class="col-md-6">
                    <label for="email" class=" control-label text-left"> Email </label>
                     <input type="text" class="form-control email" id="email" name="email" value="{{$tbuser[0]->email}}" pattern= "[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required="">
                  </div> 
                  <div class="col-md-6"></div>
                </div>

                  

              </div> 
              
              <div class="col-md-4 col-sm-4 col-xs-4">
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="addr_locality" class=" control-label text-left"> Locality </label>
                     <input type="text" class="form-control addr_locality" id="addr_locality" name="addr_locality" value="{{$tbuser[0]->addr_locality}}">
                  </div> 
                  <div class="col-md-6"></div>
                </div>
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="addr_citovi" class=" control-label text-left"> City </label>
                    {!! Form::select('addr_citovi',array(''=>'Select')+$city,array('value'=>$tbuser[0]->addr_citovi), array('class' => 'form-control addr_citovi','id'=>'addr_citovi','required')) !!}
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
                    {!! Form::select('addr_state',array(''=>'Select')+$state,array('value'=>$tbuser[0]->addr_state), array('class' => 'form-control addr_state','id'=>'addr_state','required')) !!}
                  </div> 
                  <div class="col-md-6"></div>
                </div>

                <div class="form-group">
                  <div class="col-md-6">
                    <label for="addr_country" class=" control-label text-left"> Country </label>
                    {!! Form::select('addr_country',array('0'=>'Select')+$country,array('value'=>$tbuser[0]->addr_country), array('class' => 'form-control addr_country','id'=>'addr_country','required')) !!}
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
                    {!! Form::select('ORG_TYPE', array(''=>'Select', 'PVT'=>'Private Limited','PL'=>'Public Limited','LLP'=>'Limited liability partnership','PROP'=>'Proprietor'),array('value'=>$organization[0]->ORG_TYPE),array('class' => 'form-control ORG_TYPE','required')) !!}
                  </div> 
                  <div class="col-md-6"></div>
                </div> 

                <div class="form-group">
                  <div class="col-md-6">
                    <label for="ORG_NAME" class=" control-label text-left"> Name </label>
                 <input type="text" class="form-control ORG_NAME" id="ORG_NAME" name="ORG_NAME" value="{{$organization[0]->ORG_NAME}}" required="" pattern='[A-Za-z ]{2,}' title='Enter only alphabets value' >
                  </div> 
                  <div class="col-md-6"></div>
                </div>
                
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="ORG_CODE" class=" control-label text-left"> Code </label>  
                     <input type="text" class="form-control ORG_CODE" id="ORG_CODE" name="ORG_CODE" value="{{$organization[0]->ORG_CODE}}" required="" pattern="^(?=.*[A-Z]{1,})[A-Z\d]{2,20}$" title="Enter only Capital and numeric value">
                  </div> 
                  <div class="col-md-6"></div>
                </div>
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="ORG_EMAIL_ADDRESS" class=" control-label text-left"> Email </label>
                    <input type="text" class="form-control ORG_EMAIL_ADDRESS" id="ORG_EMAIL_ADDRESS" name="ORG_EMAIL_ADDRESS" value="{{$organization[0]->ORG_EMAIL_ADDRESS}}" pattern= "[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required="">
                  </div> 
                  <div class="col-md-6"></div>
                </div>

                <div class="form-group">
                  <div class="col-md-6">
                    <label for="ORG_ADDR_HOUSE_NO" class=" control-label text-left"> House No </label>
                    <input type="text" class="form-control ORG_ADDR_HOUSE_NO" id="ORG_ADDR_HOUSE_NO" name="ORG_ADDR_HOUSE_NO" value="{{$organization[0]->ORG_ADDR_HOUSE_NO}}">
                  </div> 
                  <div class="col-md-6"></div>
                </div>
                

                
              </div>
              <div class="col-md-3 col-sm-3 col-xs-3">
                
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="ORG_ADDR_DIST" class=" control-label text-left"> Address </label>
                    <input type="text" class="form-control ORG_ADDR_DIST" id="ORG_ADDR_DIST" name="ORG_ADDR_DIST" value="{{$organization[0]->ORG_ADDR_DIST}}">
                  </div> 
                  <div class="col-md-6"></div>
                </div>
                
                <div class="form-group">
                  <div class="col-md-6">  
                    <label for="ORG_ADDR_CITYOVI" class=" control-label text-left"> City </label>   
                    {!! Form::select('ORG_ADDR_CITYOVI',array(''=>'Select')+$city,array('value'=>$organization[0]->ORG_ADDR_CITYOVI), array('class' => 'form-control ORG_ADDR_CITYOVI','id'=>'ORG_ADDR_CITYOVI','required')) !!}

                  </div> 
                  <div class="col-md-6"></div>
                </div>
                
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="ORG_ADDR_DIST" class=" control-label text-left"> District </label>
                    <input type="text" class="form-control ORG_ADDR_DIST" id="ORG_ADDR_DIST" name="ORG_ADDR_DIST" value="{{$organization[0]->ORG_ADDR_DIST}}">
                  </div> 
                  <div class="col-md-6"></div>
                </div>

                <div class="form-group">
                  <div class="col-md-6">
                    <label for="ORG_ADDR_LOCALITY" class=" control-label text-left"> Locality </label>
                      <input type="text" class="form-control ORG_ADDR_LOCALITY" id="ORG_ADDR_LOCALITY" name="ORG_ADDR_LOCALITY" value="{{$organization[0]->ORG_ADDR_LOCALITY}}">
                  </div> 
                  <div class="col-md-6"></div>
                </div>

                                <div class="form-group">
                  <div class="col-md-6">
                    <label for="ORG_ADDR_STATE" class=" control-label text-left"> State </label> 
                    {!! Form::select('ORG_ADDR_STATE',array(''=>'Select')+$state,array('value'=>$organization[0]->ORG_ADDR_STATE), array('class' => 'form-control ORG_ADDR_STATE','id'=>'ORG_ADDR_STATE','required')) !!}
                  </div> 
                  <div class="col-md-6"></div>
                </div>


              </div> 
              <div class="col-md-3 col-sm-3 col-xs-3">

                <div class="form-group">
                  <div class="col-md-6">
                    <label for="ORG_ADDR_COUNTRY" class=" control-label text-left"> Country </label> 
                     {!! Form::select('ORG_ADDR_COUNTRY',array(''=>'Select')+$country,array('value'=>$organization[0]->ORG_ADDR_COUNTRY), array('class' => 'form-control ORG_ADDR_COUNTRY','id'=>'ORG_ADDR_COUNTRY','required')) !!}
                  </div> 
                  <div class="col-md-6"></div>
                </div>
                
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="ORG_ADDR_PIN" class=" control-label text-left"> Pin Code </label> 
                      <input type="text" class="form-control ORG_ADDR_PIN" id="ORG_ADDR_PIN" name="ORG_ADDR_PIN" value="{{$organization[0]->ORG_ADDR_PIN}}" required="" maxlength="6" pattern='[0-9]{6}' title='Enter valid Pin Code'>
                  </div> 
                  <div class="col-md-6"></div>
                </div>

                <div class="form-group">
                  <div class="col-md-6">
                    <label for="ORG_PHONE_MOBILE" class=" control-label text-left"> Mobile </label> 
                        <input type="text" class="form-control ORG_PHONE_MOBILE" id="ORG_PHONE_MOBILE" name="ORG_PHONE_MOBILE" value="{{$organization[0]->ORG_PHONE_MOBILE}}" maxlength = "10" pattern="[0-9]{10,10}" title = "enter a valid mobile number" required="">
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
               {!! Form::select('ACCESS_TYPE', array(''=>'Select', 'M'=>'Married','U'=>'Unmarried'),array('value'=>$orguser[0]->ACCESS_TYPE),array('class' => 'form-control ACCESS_TYPE','required')) !!}
                  </div> 
                  <div class="col-md-6"></div>
                </div>
                
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="USER_CODE" class=" control-label text-left"> User Code </label>
                    <input type="text" class="form-control USER_CODE" id="USER_CODE" name="USER_CODE" value="{{$orguser[0]->USER_CODE}}" required="" maxlength="20" pattern="^(?=.*[A-Z]{1,})[A-Z\d]{2,20}$" >
                  </div> 
                  <div class="col-md-6"></div>
                </div>
                
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="DEPARTMENT" class=" control-label text-left"> Department </label>
                    {!! Form::select('DEPARTMENT', array('MG'=>'Managenent'),array('value'=>$orguser[0]->DEPARTMENT),array('class' => 'form-control DEPARTMENT' ,'required')) !!}
                  </div> 
                  <div class="col-md-6"></div>
                </div>
                
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="COUNTRY_CODE" class=" control-label text-left"> Country Code </label>
                    {!! Form::select('COUNTRY_CODE1',array('0'=>'Select')+$country,array('value'=>$orguser[0]->COUNTRY_CODE), array('class' => 'form-control COUNTRY_CODE1','id'=>'COUNTRY_CODE1','required')) !!}
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
            <div class="col-sm-12" style="text-align: left; left: 225px;">	
               <!--<a href="{{ URL::to('principalpartner') }}" class="tips btn btn-sm  btn-primary"> Back </a>-->
              <input type="submit" name="submit" onclick="check_valid()" class="tips btn btn-sm  btn-primary align-right submit hidden" value=" Update" />

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
    function page_submit(){
     $('.submit').click();
    }
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
    
function check_valid()
{
var partner_code =$(".PARTNER_CODE").val();
var partner_mobile =$(".PARTNER_MOBILE").val();
var partner_email =$(".PARTNER_EMAIL").val();
var partner_name =$(".PARTNER_NAME").val();

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
  
    
        $(function () {
        var form1 = $('#resource12');
        var error1 = $('.alert-error', form1);
        var success1 = $('.alert-success', form1);
        $.validator.addMethod("code", function (value, element, arg) {
            //alert(value);
            return value != 0;
        }, "Please input any Item Part NO.");
        $.validator.addMethod("iby", function (value, element, arg) {
            //alert(value);
            return value != 0;
        }, "Please select any Inspected By");
        $.validator.addMethod("cby", function (value, element, arg) {
            //alert(value);
            return value != 0;
        }, "Please select any Packed By");
        $.validator.addMethod("batch", function (value, element, arg) {
            //alert(value);
            return value != 0;
        }, "Please Input Batch No.");
        $.validator.addMethod("box", function (value, element, arg) {
            //alert(value);
            return value != 0;
        }, "Please Input Box/roll No.");
        $("#resource12").validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-inline', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            // Specify the validation rules
            rules: {
                IM_PART_NO: {required: true,
                    code: {code: "0"}
                },
                BATCH_NO: {required: true,
                    batch: {batch: "0"}
                },
                BOX_NO: {required: true,
                    box: {box: "0"}
                },
                IM_PART_NO1: {required: true,
                },
                BOX_NO2: {required: true,
                },
                BOX_NO3: {required: true,
                },
                BOX_NO4: {required: true,
                },
                BOX_NO5: {required: true,
                },
                BOX_NO6: {required: true,
                },
                BOX_NO7: {required: true,
                },
                BOX_NO8: {required: true,
                },
                INSPECTED_BY: {required: true,
                    iby: {iby: "0"}
                },
                PACKED_BY: {required: true,
                    cby: {cby: "0"}
                },
                onfocusout: function (element) {
                    if (!this.checkable(element)) {
                        this.element(element);
                    }
                },
            },
            errorPlacement: function (error, element) {
                //  var container = $('<span>');
                //  container.addClass('help-inline'); // add a class to the wrapper
                error.insertAfter(element);
                error.wrap('<span>');
                $("<div class='errorImage'></div>").insertAfter(error);
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

                //  alert("hello");

                        TableData2 = storeTblValues2();
                        var Datachecked2 = TableData2[0];
                        var Dataunchecked2 = TableData2[1];
                        var checked2 = JSON.stringify(Datachecked2);
                        var unchecked2 = JSON.stringify(Dataunchecked2);

                        $("[name='Datachecked2']").val(checked2);  //.val get data or insert data in to table
                        $("[name='Dataunchecked2']").val(unchecked2);

                        TableData3 = storeTblValues3();
                        var Datachecked3 = TableData3[0];
                        var Dataunchecked3 = TableData3[1];
                        var checked3 = JSON.stringify(Datachecked3);
                        var unchecked3 = JSON.stringify(Dataunchecked3);

                        $("[name='Datachecked3']").val(checked3);  //.val get data or insert data in to table
                        $("[name='Dataunchecked3']").val(unchecked3);
//  alert(checked3);
//  alert(unchecked3);



//                var TableData2;
//                TableData2 = storeTblValues2();
//                var TableDatao = JSON.stringify(TableData2);
//                $("[name='tableangle2']").val(TableDatao);
//                // alert(TableDatao);
//                
//                var TableData3;
//                TableData3 = storeTblValues3();
//                var TableDatan = JSON.stringify(TableData3);
//                $("[name='tableangle3']").val(TableDatan);

                form.submit();

            }

        });
    });
    
    
                   function storeTblValues2()
            {
                var Dataunchecked2 = new Array();
                var Datachecked2 = new Array();
                var index = 0;
                var i = 0;
                //                TableData = new Array();  //each extends same as foreach function
                $('#address tr').each(function (row, tr) {
                    if ($(tr).find('td:eq(0) .LINE_ID').is(':checked')) {

                        Datachecked2[index] = {
                  "LINE_ID": $(tr).find('td:eq(1) .LINE_ID').val()
                , "PRODUCT": $(tr).find('td:eq(2) .PRODUCT').val()
                , "BRAND_CODE": $(tr).find('td:eq(3) .BRAND_CODE').val()
                , "CATEGORY_CODE": $(tr).find('td:eq(4) .CATEGORY_CODE').val()
                , "MODEL_NUMBER": $(tr).find('td:eq(5) .MODEL_NUMBER').val()
                , "YEAR_OF_LAUNCH": $(tr).find('td:eq(6) .YEAR_OF_LAUNCH').val()
                , "ITEM_UNIT_PRICE": $(tr).find('td:eq(7) .ITEM_UNIT_PRICE').val()
                       }
                    }
                    else if ($(tr).find('td:eq(0) .LINE_ID').is(':unchecked'))
                    {
                        Dataunchecked2[index] = {
                  "LINE_ID": $(tr).find('td:eq(1) .LINE_ID').val()
                , "PRODUCT": $(tr).find('td:eq(2) .PRODUCT').val()
                , "BRAND_CODE": $(tr).find('td:eq(3) .BRAND_CODE').val()
                , "CATEGORY_CODE": $(tr).find('td:eq(4) .CATEGORY_CODE').val()
                , "MODEL_NUMBER": $(tr).find('td:eq(5) .MODEL_NUMBER').val()
                , "YEAR_OF_LAUNCH": $(tr).find('td:eq(6) .YEAR_OF_LAUNCH').val()
                , "ITEM_UNIT_PRICE": $(tr).find('td:eq(7) .ITEM_UNIT_PRICE').val()
                       }

                    }
                    index++;
                });
                var checkedarray2;
                var uncheckedarray2;
                checkedarray2 = array_remove_empty(Datachecked2);
                uncheckedarray2 = check(Dataunchecked2);
                return [checkedarray2, uncheckedarray2];

            }
            
            
                function storeTblValues3()
            {
                var Dataunchecked3 = new Array();
                var Datachecked3 = new Array();
                var index = 0;
                var i = 0;
                //                TableData = new Array();  //each extends same as foreach function
                $('#contact1 tr').each(function (row, tr) {
                    if ($(tr).find('td:eq(0) .LINE_ID').is(':checked')) {

                        Datachecked3[index] = {
                  "LINE_ID": $(tr).find('td:eq(1) .LINE_ID').val()
                , "LOCATION_CODE": $(tr).find('td:eq(2) .LOCATION_CODE').val()
                , "LOCATION_NAME": $(tr).find('td:eq(3) .LOCATION_NAME').val()
                , "LOCATION_TYPE": $(tr).find('td:eq(4) .LOCATION_TYPE').val()
                       }
                    }
                    else if ($(tr).find('td:eq(0) .LINE_ID').is(':unchecked'))
                    {
                        Dataunchecked3[index] = {
                  "LINE_ID": $(tr).find('td:eq(1) .LINE_ID').val()
                , "LOCATION_CODE": $(tr).find('td:eq(2) .LOCATION_CODE').val()
                , "LOCATION_NAME": $(tr).find('td:eq(3) .LOCATION_NAME').val()
                , "LOCATION_TYPE": $(tr).find('td:eq(4) .LOCATION_TYPE').val()
                       }

                    }
                    index++;
                });
                var checkedarray3;
                var uncheckedarray3;
                checkedarray3 = array_remove_empty(Datachecked3);
                uncheckedarray3 = check(Dataunchecked3);
                return [checkedarray3, uncheckedarray3];
            }
            
            function array_remove_empty($arr) {
                var arr = new Array();
                var removeItem = null;
                arr = jQuery.grep($arr, function (value) {
                    return value != removeItem;
                });
                return arr;
            }
            function check(arr)
            {
                var arr1;
                arr1 = jQuery.grep(arr, function (value) {
                    return !(value === "" || typeof value == "undefined" || value === null);
                });
                //  console.log(arr1);
                return arr1;
            }

</script>

@stop
