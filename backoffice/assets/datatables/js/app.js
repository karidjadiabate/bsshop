/**
 * Created by beraaksoy on 2/6/17.
 */
$(document).ready(function () {

    // 1) Basic Table
    // Uncomment the next line and comment everything else for a basic table pagination and search
    // $('#maintable').DataTable();

    // 2) Hide columns 3 and 4
    // Use when you want to show a different view
    // $('#maintable').dataTable({
    //     "columnDefs": [
    //         {
    //             "targets": [2],
    //             "visible": false,
    //             "searchable": false
    //         },
    //         {
    //             "targets": [3],
    //             "visible": false
    //         }
    //     ]
    // });

    // 3) Add the following buttons:
    // - Show 10, 25, 50, 100, All rows
    // - Copy rows to clipboard
    // - Export to Excel
    // - Export to CSV
    // - Printable view
    // - Export to PDF
    // - Set column visibility
   
    var table = $('#maintable').DataTable({
        scrollX: true,
        mark: true,
        dom: 'Bfrtip',
        lengthMenu: [
            [10, 25, 50, 100, -1],
            ['10 lignes', '25 lignes', '50 lignes', '100 lignes', 'Voir tous']
        ],
        buttons: [
            'pageLength',
            {
                extend: 'copyHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'csvHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'print',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'pdfHtml5',
                download: 'open',
                exportOptions: {
                    columns: ':visible'
                }
            },
            'colvis'
        ],
        columDefs: [{
            targets: -1,
            visible: false
        }],
        language: {
          "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
        }
    });

    // 4) Search on Multiple Columns
    // $('#maintable tfoot th').each(function () {
    //     var title = $('#maintable tfoot th').eq($(this).index()).text();
    //     $(this).html('<input id="searchDatatable" type="text" placeholder="Search ' + title + '" />');
    // });

    // table.columns().eq(0).each(function (colIdx) {
    //     $('#searchDatatable', table.column(colIdx).footer()).on('keyup change', function () {
    //         table
    //             .column(colIdx)
    //             .search(this.value)
    //             .draw();
    //     });
    // });

    var tables = $('#secondtable').DataTable({
        mark: true,
        dom: 'Bfrtip',
        lengthMenu: [
            [10, 25, 50, 100, -1],
            ['10 lignes', '25 lignes', '50 lignes', '100 lignes', 'Voir tous']
        ],
        buttons: [
            'pageLength',
            {
                extend: 'copyHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'csvHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'print',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'pdfHtml5',
                download: 'open',
                exportOptions: {
                    columns: ':visible'
                }
            },
            'colvis'
        ],
        columDefs: [{
            targets: -1,
            visible: false
        }],
        language: {
          "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
        }
    });

    // 4) Search on Multiple Columns
    // $('#secondtable tfoot th').each(function () {
    //     var titles = $('#secondtable tfoot th').eq($(this).index()).text();
    //     $(this).html('<input id="searchDatatable" type="text" placeholder="Search ' + titles + '" />');
    // });

    // tables.columns().eq(0).each(function () {
    //     $('#searchDatatable', tables.column().footer()).on('keyup change', function () {
    //         tables
    //             .column()
    //             .search(this.value)
    //             .draw();
    //     });
    // });

});
