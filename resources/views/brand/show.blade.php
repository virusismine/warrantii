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
        <a href="{{ URL::to('brand') }}" class="tips icon-btn show-page" title="Back"><img src="{{ asset('sximo/images/icons/back.png')}}"  /></a>
         <a href="{{ URL::route('brand.edit',$brand[0]->BRAND_CODE)}}" class="tips icon-btn show-page" title="Edit"><img src="{{ asset('sximo/images/icons/edit.png')}}"  /></a>
        <a href="#" class="tips icon-btn show-page" title="Print"><img src="{{ asset('sximo/images/icons/print.png')}}"  /></a>
        <a href="#" class="tips icon-btn show-page" title="Menu"><img src="{{ asset('sximo/images/icons/menu-button.png')}}"  /></a>
        <a href="#" class="tips icon-btn show-page" title="Info"><img src="{{ asset('sximo/images/icons/info.png')}}"  /></a>
        <a href="#" class="tips icon-btn show-page" title="Export"><img src="{{ asset('sximo/images/icons/export.png')}}"  /></a>
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
                            <input type="text" id="BRAND_CODE " class="form-control BRAND_CODE" name="BRAND_CODE"  required="" value="{{$brand[0]->BRAND_CODE}}" readonly="">
                          </div>
                          <div class="col-md-4"></div>
                        </div>

                        <div class="form-group">
                          <div class="col-md-4"></div>
                          <div class="col-md-4">
                            <label for="BRAND_NAME" class=" control-label text-left"> Brand Name </label>
                            <input type="text" id="BRAND_NAME " class="form-control BRAND_NAME" name="BRAND_NAME"  required="" value="{{$brand[0]->BRAND_NAME}}" readonly="">                          </div>
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


</div>
</div>	
</div>	  
</div>	
@stop