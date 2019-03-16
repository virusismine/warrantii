  
//      var datatable = function () {
//
//    return {
//
//        //main function to initiate the module
//        init: function () {
    // jQuery(document).ready(function() {
         function apply_datatable(){
            // alert("ddd");
      $("#sample").dataTable({
               "aLengthMenu": [
                    [5, 15, 20, -1],
                    [5, 15, 20, "All"] // change per page values here
                ],
                // set the initial value
                "iDisplayLength": 5  
   });
         }
    // });
//  }
//    };
//      }
