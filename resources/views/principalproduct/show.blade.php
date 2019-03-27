@extends('layouts.app')
@section('content')

<div class="page-content row">	
  <div class="page-content-wrapper">
    <ul class="parsley-error-list">
      @foreach($errors->all() as $error)
      <li>{{$error }}</li>
      @endforeach
    </ul>
    <div class="sbox animated fadeInRight">
      <div class="sbox-title">
        <div class="page-title half-div">
        <a href="{{URL::to('principalproduct') }}" class="tips icon-btn create-page" title="Cancel"><img src="{{asset('sximo/images/icons/back.png')}}"  /></a>
        <a href="{{ URL::to('principalproduct/'.$principalproduct[0]->PRINCIPAL_PRODUCT_ID.'/edit')}}" class="tips icon-btn show-page" title="Edit"><img src="{{ asset('sximo/images/icons/edit.png')}}"  /></a>
        <a onclick="window.location.reload()" class="tips icon-btn create-page" title="Reset"><img src="{{asset('sximo/images/icons/reset.png')}}"  /></a>
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
        .nav-tabs > li > a {

        color: #fff;
        font-weight: 500;
        background-color: #0777c0e6;
        padding: 5px 15px 5px 20px;
        font-size: 13px;

    }
      </style>
      <div class="sbox-content"> 

  @if(Session::has('message'))	  
  {{Session::get('message') }}
  @endif
        
        {!! Form::open(array('route'=>'principalproduct.store', 'class'=>'form-horizontal','id'=>'resource1' ,'files' => true ,'enctype'=>'multipart/form-data','novalidate'=>' ')) !!}

  <div class="col-md-12" style="background-color:white;">
    <legend style='text-align: center;background-color:#005b96;color:white; font-size: 14px; margin-bottom: 0px;'> Principal Product Details </legend>
      <div class="col-md-12 min-scroll">
        <div class="row min_width">
        <fieldset>
          <div class="col-md-4 col-sm-4 col-xs-4">

            <div class="form-group">
              <div class="col-md-6">
                 <label for="PRODUCT_CODE" class=" control-label text-left"> Product Code </label>
                <input type="text" class="form-control PRODUCT_CODE" id="PRODUCT_CODE" name="PRODUCT_CODE" value="{{$principalproduct[0]->PRODUCT_CODE}}" readonly="" disabled="">
              </div> 
                 <div class="col-md-6"></div>
            </div> 					

            <div class="form-group">
              <div class="col-md-6">
                <label for="PRODUCT_NAME" class=" control-label text-left"> Product Name </label>
                <input type="text" class="form-control PRODUCT_NAME" id="PRODUCT_NAME" name="PRODUCT_NAME" value="{{$principalproduct[0]->PRODUCT_NAME}}" readonly="" disabled="">
              </div> 
              <div class="col-md-6"></div>
            </div>

          

            <div class="form-group">
              <div class="col-md-6">
                 <label for="PRODUCT_MEASURING_UNIT" class=" control-label  text-left"> Measuring Unit </label>
                <input type="text" class="form-control text-right PRODUCT_MEASURING_UNIT" id="PRODUCT_MEASURING_UNIT" name="PRODUCT_MEASURING_UNIT" value="{{$principalproduct[0]->PRODUCT_MEASURING_UNIT}}" readonly="" disabled="">
              </div> 
              <div class="col-md-6">
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-6">
                 <label for="PRODUCT_UNIT_PRICE" class=" control-label text-left"> Maximum Retail Price(M.R.P) </label>
                   <input type="text" class="form-control text-right PRODUCT_UNIT_PRICE" id="PRODUCT_UNIT_PRICE" name="PRODUCT_UNIT_PRICE" value="{{$principalproduct[0]->PRODUCT_UNIT_PRICE}}" readonly="" disabled="">
              </div> 
              <div class="col-md-6">
              </div>
            </div>     

            <div class="form-group">
              <div class="col-md-6">
                 <label for="DISCOUNT" class=" control-label text-left"> Discount </label>
                  <input type="text" class="form-control text-right DISCOUNT" id="DISCOUNT" name="DISCOUNT" value="{{$principalproduct[0]->DISCOUNT}}" readonly="" disabled="">
              </div> 
              <div class="col-md-6">
              </div>
            </div>
          </div>

          <div class="col-md-4 col-sm-4 col-xs-4">
            
                <div class="form-group">
                  
                  <div class="col-md-6">
                    <label for="BRAND_CODE" class=" control-label text-left"> Brand Name </label>
                    {!!Form::select('BRAND_CODE',array(''=>'Select')+ $brand,array('value'=>$principalproduct[0]->BRAND_CODE),array('class' => 'form-control BRAND_CODE','id'=>'BRAND_CODE','required','disabled')) !!}

                  </div> 
                <div class="col-md-6"></div>
                </div>
              
                <div class="form-group">
               
                  <div class="col-md-6">
                    <label for="CATEGORY_CODE" class=" control-label text-left"> Category Name </label>
        {!! Form::select('CATEGORY_CODE',array('0'=>'Select')+$category,array('value'=>$principalproduct[0]->CATEGORY_CODE), array('class' => 'form-control CATEGORY_CODE','id'=>'CATEGORY_CODE','required','disabled' )) !!}

                  </div> 
                  <div class="col-md-6"></div>
                </div>         
              
             
               
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="YEAR_OF_LAUNCH" class=" control-label text-left"> Year Of Launch </label>
                     <input type="text" class="form-control YEAR_OF_LAUNCH" id="YEAR_OF_LAUNCH" name="YEAR_OF_LAUNCH" value="{{$principalproduct[0]->YEAR_OF_LAUNCH}}" readonly="" disabled="">
                  </div> 
                  <div class="col-md-6"></div>
                </div>    
            
            <div class="form-group  " >
              <div class="col-md-6">
                 <label for="HSN_MASTER_ID" class=" control-label text-left"> HSN Code </label>
                   {!! Form::select('HSN_MASTER_ID',array('0'=>'Select')+$hsn,array('value'=>$principalproduct[0]->HSN_MASTER_ID), array('class' => 'form-control HSN_MASTER_ID','id'=>'HSN_MASTER_ID','required','disabled' )) !!}
              </div> 
              <div class="col-md-6">
              </div>
            </div>
            
            
             <div class="form-group  " >
              <div class="col-md-6">
              <label for="PRODUCT_TRACE" class=" control-label text-left"> Product Trace </label>
              @if($principal[0]->PRODUCT_TRACING == 'T')
              {!! Form::select('PRODUCT_TRACE', array(''=>'--Select--', 'T'=>'TRUE','F'=>'FALSE'),array('value'=>$principalproduct[0]->PRODUCT_TRACE),array('class' => 'form-control PRODUCT_TRACE','required','disabled')) !!} 
              @else 
              {!! Form::select('PRODUCT_TRACE', array('F'=>'FALSE'),Input::old('PRODUCT_TRACE'),array('class' => 'form-control PRODUCT_TRACE','disabled')) !!} 
              @endif
              </div> 
              <div class="col-md-6">
              </div>
            </div>
            
            <div class="form-group">
              <div class="col-md-6">
                <label for="SHELF_LIFE" class=" control-label text-left"> Shelf Life </label>
                <a class="tips field-hint" data-toggle="control-sidebar"><img src="{{asset('sximo/images/question.png')}}" /></a>
                <input type="text" class="form-control SHELF_LIFE" id="SHELF_LIFE" name="SHELF_LIFE" value="{{$principalproduct[0]->SHELF_LIFE}}" disabled="" >
              <div class="col-md-6">
              </div>
            </div> 

          </div></div>
          
          
          <div class="col-md-4 col-sm-4 col-xs-4">
                        
            <div class="form-group">
              <div class="col-md-6">
                 <label for="STOCKVALUE" class=" control-label text-left"> Stock Value </label>
                <input class="form-control text-right STOCKVALUE" id="STOCKVALUE" name="STOCKVALUE" value="0.00" readonly="">
              </div> 
              <div class="col-md-6">
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-6">
                <label for="MINORDERQTY" class=" control-label text-left"> Minimum Order Quantity </label>
                <input type="text" class="form-control text-right MINORDERQTY" id="MINORDERQTY" name="MINORDERQTY" value="{{$principalproduct[0]->MINORDERQTY}}" readonly="" disabled="">
              </div> 
              <div class="col-md-6">
              </div>
            </div>
            

            <div class="form-group">
              <div class="col-md-6">
                 <label for="INVENTORY_EVAL" class=" control-label text-left"> Inventory Evaluation Policy</label>
                 <input type="text" class="form-control INVENTORY_EVAL" id="INVENTORY_EVAL" name="INVENTORY_EVAL" value="{{$principalproduct[0]->INVENTORY_EVAL}}" readonly="" disabled="">
              </div> 
              <div class="col-md-6">
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-6">
                <label for="SHIPPING_TYPE" class=" control-label text-left"> Shipping Type </label>
                  <input type="text" class="form-control SHIPPING_TYPE" id="SHIPPING_TYPE" name="SHIPPING_TYPE" value="{{$principalproduct[0]->SHIPPING_TYPE}}" readonly="" disabled="">
              </div> 
              <div class="col-md-6">
              </div>
            </div>
              
            <div class="form-group">
              <div class="col-md-6">
                <label for="LEAD_TIME" class=" control-label text-left"> Lead Time </label>
                  <input type="text" class="form-control LEAD_TIME" id="LEAD_TIME" name="LEAD_TIME" value="{{$principalproduct[0]->LEAD_TIME}}" readonly="" disabled="">
              </div> 
              <div class="col-md-6">
              </div>
            </div>
            
       
            
            <div class="form-group">
              <div class="col-md-6">
                <label for="UNIT_VOLUME" class=" control-label text-left"> Unit Volume </label>
                 <input type="text" class="form-control text-right UNIT_VOLUME" id="UNIT_VOLUME" name="UNIT_VOLUME" value="{{$principalproduct[0]->UNIT_VOLUME}}" disabled="">
              </div> 
              <div class="col-md-6">
              </div>
            </div>    
            
            
            
          </div>              
        </fieldset>
      </div>
  </div>

  
    <div class="col-md-12 btn-right-bottom" >  <br>
          <div class="form-group">
            <div class="col-sm-12" style="text-align: left;left:225px;">	
              <input type="submit" name="submit" onclick="check_valid()" class="tips btn btn-sm  btn-primary align-right submit hidden" value="{{ Lang::get('core.sb_save') }}  " />
              <!--<a href="{{ URL::to('principalproduct') }}" class="tips btn btn-sm  btn-primary ">{{ Lang::get('core.sb_cancel') }}</a>-->
            </div>	  
          </div> 
    </div>
  
  
  
</div>
        
        
        
        
        {!! Form::close() !!}
      </div> 



    </div> 


  </div>	



  

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
       $(function () {
     
        $("#YEAR_OF_LAUNCH").datepicker({
	changeYear: true,
	dateFormat: 'yy',
        });
          
      
    });
  </script>     
  

</div>

@stop