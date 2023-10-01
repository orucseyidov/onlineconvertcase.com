// $(document).ready(function() {
//     $("#datatable").DataTable(), $("#datatable-buttons").DataTable({
//         lengthChange: !1,
//         buttons: ["copy", "excel", "pdf", "colvis"]
//     }).buttons().container().appendTo("#datatable-buttons_wrapper .col-md-6:eq(0)")
// });

var mydata              = $("#datatableOptions");
var exportColunmDat     = "";
var counter             = 0;
var exportColunm        = "";

exportColunmDat         = mydata.attr("exportColunm");

if (exportColunmDat.length > 0) {
    exportColunm = exportColunmDat.split(",")
}

// console.log(exportColunm);

$('#datatable').DataTable({
    // dom: '<"html5buttons"B>lTfgitp',
    dom: '<"html5buttons"B>lTfgitp',
    "language": {
        "url": "/assets/gopanel/json/datatable.json"
    },
    "lengthMenu": [ [10, 25, 50, 100, -1], ['10 Ədəd', '25 Ədəd', '50 Ədəd', '100 Ədəd', "Hamısı"] ],
    order:[
        [0, 'asc']
    ],
    buttons: [
        {
            extend: 'copy',exportOptions: {columns: exportColunm},
            text: ' Kopyala',
            className: 'far fa-copy fa-2x copy_icon'
        },
        {
            extend: 'csv',exportOptions: {columns: exportColunm},
            text: ' CSV',
            className: 'fas fa-file-csv fa-2x csv_icon'
        },
        {
            extend: 'excel',exportOptions: {columns: exportColunm}, title: 'ExampleFile',
            text: ' Excel',
            className: 'far fa-file-excel fa-2x excel_icon'
        },
        // {extend: 'pdf', title: 'ExampleFile'},
        {
          extend: 'pdf',
          text: ' PDF',
          className: 'far fa-file-pdf fa-2x pdf_icon',
          customize: function (doc) {
            doc.content[1].table.widths = 
                Array(doc.content[1].table.body[0].length + 1).join('*').split('');
            // doc.content[1].margin = [ 100, 0, 100, 0 ];
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
    "columnDefs": [
        {"className": "dt-center", "targets": "_all"}
    ],
    "fnPreDrawCallback":function(){
        //alert("Pre Draw");
        $('#example_processing').attr('style', 'font-size: 20px; font-weight: bold; padding-bottom: 60px; display: block; z-index: 10000 !important');
    }
});
