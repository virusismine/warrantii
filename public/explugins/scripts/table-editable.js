var TableEditable = function () {

    return {

        //main function to initiate the module
        init: function () {
            
            $('#sample_editable_1').dataTable({
                "aLengthMenu": [
                    [5, 15, 20, -1],
                    [5, 15, 20, "All"] // change per page values here
                ],
                // set the initial value
                "iDisplayLength": 5,
//   aLengthMenu: [
//        [25, 50, 100, 200, -1],
//        [25, 50, 100, 200, "All"]
//    ],
//    iDisplayLength: -1,
                  //  "sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",

                // "sDom": 'T<"clear">lfrtip',
		//		 "sScrollX": "350px",
              //                 "sScrollY": "350px",
               //             "iScrollLoadGap": 50,
                "sPaginationType": "bootstrap",
                "oLanguage": {
                    "sLengthMenu": "_MENU_ records per page",
                    "oPaginate": {
                        "sPrevious": "Prev",
                        "sNext": "Next"
                    }
                },
                "aoColumnDefs": [{
                        'bSortable': false,
                        'aTargets': [0]
                    }
                ],
                 dom: 'T<"clear">lfrtip',
            "scrollY": "200px",
            "tableTools": {
                "sSwfPath": "assets/TableTools/swf/copy_csv_xls_pdf.swf",
                "sRowSelect": "multi",
                "aButtons": [
                    {
                        "sExtends": "copy",
                        "oSelectorOpts": {
                            "filter": "applied"
                        },
                        "mColumns": [0, 1, 2, 3, 4]

                    },
                    {
                        "sExtends": "print",
                        "sInfo": "Please press \"ESC\" when done"

                    },
                    {
                        "sExtends": "csv",
                        "oSelectorOpts": {
                            "filter": "applied"
                        },
                        "mColumns": [0, 1, 2, 3, 4],
                        "sFileName": "PromoterList.csv"

                    },
                    {
                        "sExtends": "xls",
                        "oSelectorOpts": {
                            "filter": "applied"
                        },
                        "mColumns": [0, 1, 2, 3, 4],
                        "sFileName": "PromoterList.csv"

                    },
                    {
                        "sExtends": "pdf",
                        "oSelectorOpts": {
                            "filter": "applied"
                        },
                        "mColumns": [0, 1, 2, 3, 4],
                        "sFileName": "PromoterList.pdf"

                    }
                ]
            },
            });
            jQuery('#sample_editable_1_wrapper .dataTables_filter input').addClass("m-wrap medium"); // modify table search input
            jQuery('#sample_editable_1_wrapper .dataTables_length select').addClass("m-wrap small"); // modify table per page dropdown

        }

    };

}();