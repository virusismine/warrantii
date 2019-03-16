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
          <a href="{{ URL::to('category') }}" class="tips icon-btn create-page" title="Cancel"><img src="{{ asset('sximo/images/icons/back.png')}}"/></a>
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

        {!! Form::open(array('route'=>'category.store', 'class'=>'form-horizontal','id'=>'resource1' ,'files' => true ,'enctype'=>'multipart/form-data','novalidate'=>' ')) !!}

        <legend> Category Details </legend>

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
                          <label for="CATEGORY_CODE" class=" control-label text-left"> Category Code </label>
                          {!! Form::text('CATEGORY_CODE', Input::old('CATEGORY_CODE'),array('class'=>'form-control CATEGORY_CODE', 'placeholder'=>'','required'=>'','pattern'=>'[a-zA-Z ]{2,}', 'title'=>'Enter name only alphabet')) !!} 
                        </div>
                        <div class="col-md-4"></div>
                      </div>

                      <div class="form-group">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                          <label for="CATEGORY_NAME" class=" control-label text-left"> Category Name </label>
                          {!! Form::text('CATEGORY_NAME', Input::old('CATEGORY_NAME'),array('class'=>'form-control CATEGORY_NAME', 'placeholder'=>'','required','maxlength'=>'20' ,'pattern'=>'^(?=.*[A-Z]{1,})[A-Z\d]{2,20}$','title'=>'Enter code in Capital and Numeric')) !!} 
                        </div>
                        <div class="col-md-4"></div>
                      </div>

                      <div class="form-group">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                          <label for="PARENT_CATEGORY_CODE" class=" control-label text-left"> Parent Category Code </label>
                          {!! Form::select('PARENT_CATEGORY_CODE', array(''=>'Select', 'P&T'=>'Phones & Tablets','C&O'=>'Cameras & Optics','C&H'=>'Computers & Peripherals','HMK'=>'Home & Kitchen Appliances','O'=>'Other'),Input::old('PARENT_CATEGORY_CODE'),array('class' => 'form-control PARENT_CATEGORY_CODE','required')) !!} 
                        </div>
                        <div class="col-md-4"></div>
                      </div>

                      <div class="form-group">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                          <label for="INSTALLATION" class=" control-label text-left"> Installation </label>
                          {!! Form::select('INSTALLATION', array('' =>'Installation Not Required' ,'1' =>'Installation Required'),Input::old('INSTALLATION'),array('class' => 'form-control INSTALLATION' ,'id'=>'INSTALLATION', 'name'=>'INSTALLATION')) !!}
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
          var o_name = $(".CATEGORY_NAME").val();
          var o_code = $(".CATEGORY_CODE").val();
          var p_c_code = $(".PARENT_CATEGORY_CODE").val();
       

          var onlytext = /^([a-zA-z ])+$/;
          var onlycode = /^(?=.*[A-Z]{1,})[A-Z\d]{2,20}$/;

          if (o_code === "")
          {
              $.tappification({type: 'danger', message: 'Please Enter The Category Code'});
              $(".CATEGORY_CODE").focus();
              return false;
          } else if (!o_code.match(onlycode))
          {
              $.tappification({type: 'danger', message: 'Please Enter Code in Capital Value and Numeric'});
              $(".CATEGORY_CODE").focus();
              return false;
          } else if (o_name === "")
          {
              $.tappification({type: 'danger', message: 'Please Enter The Category Name'});
              $(".CATEGORY_NAME").focus();
              return false;
          } else if (!o_name.match(onlytext))
          {
              $.tappification({type: 'danger', message: 'Please Enter Name Only in Alphabets'});
              $(".CATEGORY_NAME").focus();
              return false;
          } else if (p_c_code == "")
          {
              $.tappification({type: 'danger', message: 'Please Select Parent Category Code'});
              $(".PARENT_CATEGORY_CODE").focus();
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