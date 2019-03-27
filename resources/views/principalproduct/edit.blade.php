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
       <a onclick="page_submit()" class="tips icon-btn create-page" title="Save"><img src="{{ asset('sximo/images/icons/save.png')}}"  /></a>
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
     {!! Form::model($principalproduct,array('route' => array('principalproduct.update', $principalproduct[0]->PRINCIPAL_PRODUCT_ID),'class'=>'form-horizontal','id'=>'resource1', 'method'=>'PUT','files' => true ,'parsley-validate'=>'','novalidate'=>' ')) !!}      


  <div class="col-md-12" style="background-color:white;">
    <legend style='text-align: center;background-color:#005b96;color:white; font-size: 14px; margin-bottom: 0px;'> Principal Product Details </legend>
      <div class="col-md-12 min-scroll">
        <div class="row min_width">
        <fieldset>
          <div class="col-md-4 col-sm-4 col-xs-4">

            <div class="form-group">
              <div class="col-md-6">
                 <label for="PRODUCT_CODE" class=" control-label text-left"> Product Code </label>
                 <input type="text" class="form-control PRODUCT_CODE" id="PRODUCT_CODE" required="" name="PRODUCT_CODE" value="{{$principalproduct[0]->PRODUCT_CODE}}"  maxlength ="20" pattern= "^(?=.*[A-Z]{1,})[A-Z\d]{2,20}$"  readonly="" >
              </div> 
                 <div class="col-md-6"></div>
            </div> 					

            <div class="form-group">
              <div class="col-md-6">
                <label for="PRODUCT_NAME" class=" control-label text-left"> Product Name </label>
                <input type="text" class="form-control PRODUCT_NAME" id="PRODUCT_NAME" name="PRODUCT_NAME" value="{{$principalproduct[0]->PRODUCT_NAME}}" required="" pattern = "[A-Za-z ]{2,}" >
              </div> 
              <div class="col-md-6"></div>
            </div>

          

            <div class="form-group">
              <div class="col-md-6">
                 <label for="PRODUCT_MEASURING_UNIT" class=" control-label  text-left"> Measuring Unit </label>
                <input type="text" class="form-control text-right PRODUCT_MEASURING_UNIT" id="PRODUCT_MEASURING_UNIT" name="PRODUCT_MEASURING_UNIT" value="{{$principalproduct[0]->PRODUCT_MEASURING_UNIT}}"  >
              </div> 
              <div class="col-md-6">
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-6">
                 <label for="PRODUCT_UNIT_PRICE" class=" control-label text-left"> Maximum Retail Price(M.R.P) </label>
                   <input type="text" class="form-control text-right PRODUCT_UNIT_PRICE" id="PRODUCT_UNIT_PRICE" name="PRODUCT_UNIT_PRICE" value="{{$principalproduct[0]->PRODUCT_UNIT_PRICE}}"  pattern = "00[0-9.]{1,}" >
              </div> 
              <div class="col-md-6">
              </div>
            </div>     

            <div class="form-group">
              <div class="col-md-6">
                 <label for="DISCOUNT" class=" control-label text-left"> Discount </label>
                  <input type="text" class="form-control text-right DISCOUNT" id="DISCOUNT" name="DISCOUNT" value="{{$principalproduct[0]->DISCOUNT}}"  >
              </div> 
              <div class="col-md-6">
              </div>
            </div>
          </div>

          <div class="col-md-4 col-sm-4 col-xs-4">
            
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="BRAND_CODE" class=" control-label text-left"> Brand Name </label>
                    {!!Form::select('BRAND_CODE',array(''=>'Select')+ $brand,array('value'=>$principalproduct[0]->BRAND_CODE),array('class' => 'form-control BRAND_CODE','id'=>'BRAND_CODE','required')) !!}
                  </div> 
                <div class="col-md-6"></div>
                </div>
              
                <div class="form-group">
               
                  <div class="col-md-6">
                    <label for="CATEGORY_CODE" class=" control-label text-left"> Category Name </label>
        {!! Form::select('CATEGORY_CODE',array('0'=>'Select')+$category,array('value'=>$principalproduct[0]->CATEGORY_CODE), array('class' => 'form-control CATEGORY_CODE','id'=>'CATEGORY_CODE','required' )) !!}

                  </div> 
                  <div class="col-md-6"></div>
                </div>         
              
             
               
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="YEAR_OF_LAUNCH" class=" control-label text-left"> Year Of Launch </label>
                     <input type="text" class="form-control YEAR_OF_LAUNCH" id="YEAR_OF_LAUNCH" name="YEAR_OF_LAUNCH" value="{{$principalproduct[0]->YEAR_OF_LAUNCH}}"  >
                  </div> 
                  <div class="col-md-6"></div>
                </div>    
            
            <div class="form-group  " >
              <div class="col-md-6">
                 <label for="HSN_MASTER_ID" class=" control-label text-left"> HSN Code </label>
                   {!! Form::select('HSN_MASTER_ID',array('0'=>'Select')+$hsn,array('value'=>$principalproduct[0]->HSN_MASTER_ID), array('class' => 'form-control HSN_MASTER_ID','id'=>'HSN_MASTER_ID','required' )) !!}
              </div> 
              <div class="col-md-6">
              </div>
            </div>
            
            
             <div class="form-group  " >
              <div class="col-md-6">
              <label for="PRODUCT_TRACE" class=" control-label text-left"> Product Trace </label>
              @if($principal[0]->PRODUCT_TRACING == 'T')
              {!! Form::select('PRODUCT_TRACE', array(''=>'--Select--', 'T'=>'TRUE','F'=>'FALSE'),array('value'=>$principalproduct[0]->PRODUCT_TRACE),array('class' => 'form-control PRODUCT_TRACE','required')) !!} 
              @else 
              {!! Form::select('PRODUCT_TRACE', array('F'=>'FALSE'),Input::old('PRODUCT_TRACE'),array('class' => 'form-control PRODUCT_TRACE')) !!} 
              @endif
              </div> 
              <div class="col-md-6">
              </div>
            </div>
            
            <div class="form-group">
              <div class="col-md-6">
                <label for="SHELF_LIFE" class=" control-label text-left"> Shelf Life </label>
                <a class="tips field-hint" data-toggle="control-sidebar"><img src="{{asset('sximo/images/question.png')}}" /></a>
                <input type="text" class="form-control SHELF_LIFE" id="SHELF_LIFE" name="SHELF_LIFE" value="{{$principalproduct[0]->SHELF_LIFE}}" >
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
                <input type="text" class="form-control text-right MINORDERQTY" id="MINORDERQTY" name="MINORDERQTY" value="{{$principalproduct[0]->MINORDERQTY}}" required pattern = "[0-9]{1,}"  >
              </div> 
              <div class="col-md-6">
              </div>
            </div>
            

            <div class="form-group">
              <div class="col-md-6">
                 <label for="INVENTORY_EVAL" class=" control-label text-left"> Inventory Evaluation Policy</label>
                 <input type="text" class="form-control INVENTORY_EVAL" id="INVENTORY_EVAL" name="INVENTORY_EVAL" value="{{$principalproduct[0]->INVENTORY_EVAL}}"  >
              </div> 
              <div class="col-md-6">
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-6">
                <label for="SHIPPING_TYPE" class=" control-label text-left"> Shipping Type </label>
                  <input type="text" class="form-control SHIPPING_TYPE" id="SHIPPING_TYPE" name="SHIPPING_TYPE" value="{{$principalproduct[0]->SHIPPING_TYPE}}"  >
              </div> 
              <div class="col-md-6">
              </div>
            </div>
              
            <div class="form-group">
              <div class="col-md-6">
                <label for="LEAD_TIME" class=" control-label text-left"> Lead Time </label>
                  <input type="text" class="form-control LEAD_TIME" id="LEAD_TIME" name="LEAD_TIME" value="{{$principalproduct[0]->LEAD_TIME}}"  >
              </div> 
              <div class="col-md-6">
              </div>
            </div>
            
       
            
            <div class="form-group">
              <div class="col-md-6">
                <label for="UNIT_VOLUME" class=" control-label text-left"> Unit Volume </label>
                 <input type="text" class="form-control text-right UNIT_VOLUME" id="UNIT_VOLUME" name="UNIT_VOLUME" value="{{$principalproduct[0]->UNIT_VOLUME}}" >
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
function check_valid()
{
var product_code =$(".PRODUCT_CODE").val();
var product_name =$(".PRODUCT_NAME").val();
var measuring_unit =$(".PRODUCT_MEASURING_UNIT").val();
var mrp =$(".PRODUCT_UNIT_PRICE").val();
var brand_code =$(".BRAND_CODE").val();
var category_code =$(".CATEGORY_CODE").val();
var launch =$(".YEAR_OF_LAUNCH").val();
var hsn_id =$(".HSN_MASTER_ID").val();
var trace =$(".PRODUCT_TRACE").val();
var order_qty =$(".MINORDERQTY").val();

var onlytext=/^([a-zA-z ]{2,})+$/;
var onlycode=/^(?=.*[A-Z]{1,})[A-Z\d]{2,20}$/;
var onlyprice=/^([0-9]{1,})+$/;

if(product_code === "" )
{
  $.tappification({ type: 'danger', message: 'Please Enter Code' }); 
  $(".PRODUCT_CODE").focus();
  return false;
}

else if(!product_code.match(onlycode))
{
  $.tappification({ type: 'danger', message: 'Please Enter Code in Capital Value and Numeric' });
  $(".PRODUCT_CODE").focus();
  return false;
}

else if(product_name === "" )
{
  $.tappification({ type: 'danger', message: 'Please Enter Product Name' }); 
  $(".PRODUCT_NAME").focus();
  return false;
}

else if(!product_name.match(onlytext))
{
  $.tappification({ type: 'danger', message: 'Please Enter Name in Only Alphabets' });
  $(".PRODUCT_NAME").focus();
  return false;
}

else if(measuring_unit === "" )
{
  $.tappification({ type: 'danger', message: 'Please Enter Measuring Unit' }); 
  $(".PRODUCT_MEASURING_UNIT").focus();
  return false;
}

else if(!mrp.match(onlyprice))
{
  $.tappification({ type: 'danger', message: 'Please Enter Maximum Retail Price(M.R.P.)' }); 
  $(".PRODUCT_UNIT_PRICE").focus();
  return false;
}

else if(brand_code === "" )
{
  $.tappification({ type: 'danger', message: 'Please Select Brand Name' }); 
  $(".BRAND_CODE").focus();
  return false;
}

else if(category_code === "" )
{
  $.tappification({ type: 'danger', message: 'Please Select Category Name' }); 
  $(".CATEGORY_CODE").focus();
  return false;
}

else if(launch === "" )
{
  $.tappification({ type: 'danger', message: 'Please Select Year Of Launch' }); 
  $(".YEAR_OF_LAUNCH").focus();
  return false;
}

else if(hsn_id === "" )
{
  $.tappification({ type: 'danger', message: 'Please Select HSN Code' }); 
  $(".HSN_MASTER_ID").focus();
  return false;
}

else if(trace === "" )
{
  $.tappification({ type: 'danger', message: 'Please Select Product Trace' }); 
  $(".PRODUCT_TRACE").focus();
  return false;
}

else if(!order_qty.match(onlyprice))
{
  $.tappification({ type: 'danger', message: 'Please Enter Minimum Order Quantity' }); 
  $(".MINORDERQTY").focus();
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