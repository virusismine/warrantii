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
          <a href="{{ URL::to('brand') }}" class="tips icon-btn create-page" title="Cancel"><img src="{{ asset('sximo/images/icons/back.png')}}"/></a>
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

  @if(Session::has('message'))	  
  {{ Session::get('message') }}
  @endif
        
        {!! Form::open(array('route'=>'brand.store', 'class'=>'form-horizontal','id'=>'resource1' ,'files' => true ,'enctype'=>'multipart/form-data','novalidate'=>' ')) !!}

        <legend> Brand Details </legend>

        <div class="" style="background-color:white; margin-top:12px">
          <div class="tabbable tabbable-custom">
              <div class="tab-pane  active " id="tab_1_4" style="overflow: hidden">
                <div class="col-md-12 min-scroll"><br>
                  <div class="row">
                    <div class="min_width">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                      </div>

                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <div class="form-group">
                          <div class="col-md-4"></div>
                          <div class="col-md-4">
                            <label for="BRAND_CODE" class=" control-label text-left"> Brand Code </label>
                            {!! Form::text('BRAND_CODE', Input::old('BRAND_CODE'),array('class'=>'form-control BRAND_CODE', 'placeholder'=>'','required'=>'','pattern'=>'[a-zA-Z ]{2,}', 'title'=>'Enter name only alphabet')) !!} 
                          </div>
                          <div class="col-md-4"></div>
                        </div>

                        <div class="form-group">
                          <div class="col-md-4"></div>
                          <div class="col-md-4">
                            <label for="BRAND_NAME" class=" control-label text-left"> Brand Name </label>
                            {!! Form::text('BRAND_NAME', Input::old('BRAND_NAME'),array('class'=>'form-control BRAND_NAME', 'placeholder'=>'','required','maxlength'=>'20' ,'pattern'=>'^(?=.*[A-Z]{1,})[A-Z\d]{2,20}$','title'=>'Enter code in Capital and Numeric')) !!} 
                          </div>
                          <div class="col-md-4"></div>
                        </div>
                    </div>

                      <div class="col-md-4 col-sm-4 col-xs-4">
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
      function check_valid()
      {
          var o_name = $(".BRAND_NAME").val();
          var o_code = $(".BRAND_CODE").val();
         
          var onlytext = /^([a-zA-z ])+$/;
          var onlycode = /^(?=.*[A-Z]{1,})[A-Z\d]{2,20}$/;

        if (o_code === "")
          {
              $.tappification({type: 'danger', message: 'Please Enter The Brand Code'});
              $(".BRAND_CODE").focus();
              return false;
          } else if (!o_code.match(onlycode))
          {
              $.tappification({type: 'danger', message: 'Please Enter Code in Capital Value and Numeric'});
              $(".BRNAD_CODE").focus();
              return false;
          }
           else if (o_name === "")
          {
              $.tappification({type: 'danger', message: 'Please Enter The Brand Name'});
              $(".BRAND_NAME").focus();
              return false;
          } else if (!o_name.match(onlytext))
          {
              $.tappification({type: 'danger', message: 'Please Enter Name Only in Alphabets'});
              $(".BRAND_NAME").focus();
              return false;
          } else   
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
      function page_submit() {
          //    alert("submit");
          $('.submit').click();
      }

      $(function () {

          var form1 = $('#resource1');
          var error1 = $('.alert-error', form1);
          var success1 = $('.alert-success', form1);
          //      alert("hello");
          $("#resource1").validate({
              errorElement: 'span', //default input error message container
              errorClass: 'help-inline', // default input error message class
              focusInvalid: false, // do not focus the last invalid input
              ignore: "",

              errorPlacement: function (error, element) {

                  error.insertAfter(element);
                  error.wrap('<span>');

              },

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

                  label
                          .removeClass('error,has-error')
                          .addClass('valid').addClass('help-inline ok') // mark the current input as valid and display OK icon
                          .closest('.form-group').addClass('success') // set success class to the control group

              },

              submitHandler: function (form) {

                  form.submit();
              }
          });
      });

  </script>   

</div>
</div>	
</div>	  
</div>	
@stop