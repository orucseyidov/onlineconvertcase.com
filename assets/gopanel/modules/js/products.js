if ($("#products").hasClass("table")) {
    var mydata              = $("#datatableOptions");
    var exportColunmDat     = "";
    var counter             = 0;
    var exportColunm        = "";

    exportColunmDat         = mydata.attr("exportColunm");
    data_where              = mydata.attr("data-where");



    $('#products').DataTable({
        // dom: '<"html5buttons"B>lTfgitp',
        dom: '<"html5buttons"B>lTfgitp',
        "language": {
            "url": "/assets/json/datatable.json"
        },
        "lengthMenu": [ [10, 25, 50, 100, -1], ['10 Ədəd', '25 Ədəd', '50 Ədəd', '100 Ədəd', "Hamısı"] ],
        buttons: [
            {
                extend: 'excel',exportOptions: {columns: exportColunm}, title: 'ExampleFile',
                text: ' Excel',
                className: 'fas fa-file-excel fa-2x excel_icon'
            },
            // {extend: 'pdf', title: 'ExampleFile'},
            {
              extend: 'pdf',
              text: ' PDF',
              className: 'far fa-file-pdf fa-2x pdf_icon',
              customize: function (doc) {
                doc.content[1].table.widths = 
                    Array(doc.content[1].table.body[0].length + 1).join('*').split('');
                // doc.content[1].margin = [ -50, 0, 50, 0 ];
              },
              exportOptions: {columns: exportColunm}
            },
            {extend: 'print',
                 text: ' Çap',
                 className: 'fas fa-print fa-2x print_icon',
                 customize: function (win){
                        $(win.document.body).addClass('white-bg');
                        $(win.document.body).css('font-size', '10px');

                        $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                },
                exportOptions: {columns: exportColunm}
            },
            {extend: 'colvis'}
        ],
        "filter": true,
        "responsive": false,
        "processing": true,
        "serverSide": true,
        "ajax": {
            url: "/gopanel/products/manageserverside",
            type: "POST",
            data: {where:data_where}
        },
        // "deferLoading": 57,
        "columns":[
            {data:"id"},
            {data:"image"},
            {data:"title"},
            {data:"price_azn"},
            {data:"special"},
            {data:"status"},
            {data:"manage"}
        ],
        "columnDefs": [
            {"className": "dt-center", "targets": "_all"},
            { orderable: false, targets: [0] },
            { targets: 'no-sort', orderable: false }
        ],
        "fnPreDrawCallback":function(){
            // alert("Pre Draw");
            setTimeout(function(){ 
                $('.status').bootstrapToggle()
            }, 1);
            $('#example_processing').attr('style', 'font-size: 20px; font-weight: bold; padding-bottom: 60px; display: block; z-index: 10000 !important');
        }
    });
}
