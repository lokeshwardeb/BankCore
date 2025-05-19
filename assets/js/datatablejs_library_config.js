
let emp_table_console  = $("#datatable_info_table").html()
console.log(emp_table_console)


$(document).ready(function () {
    $('#datatable_info_table').DataTable({
        // dom: 'Bfrtip',
        // dom: 'lBfrtip',
        dom: 'Bflrtip',
        // buttons: [
        //     'copy', 'csv', 'excel', 'pdf', 'print', 'colvis'
        // ],

        lengthMenu: [5, 10, 25, 50, 100], // Options for number of entries per page
        pageLength: 5, // Default number of entries per page

        buttons: [
            {
                extend: 'excelHtml5',
                text: 'Export to Excel',
                exportOptions: {
                    columns: ':not(:last-child)' // Exclude the last column
                }
            },
            {
                extend: 'pdfHtml5',
                text: 'Export to PDF',
                exportOptions: {
                    columns: ':not(:last-child)' // Exclude the last column

                    // columns: [0, 1] // Include only the first two columns
                }
            },
            {
                extend: 'csvHtml5',
                text: 'Export to CSV',
                exportOptions: {
                    columns: ':not(:last-child)' // Exclude the last column

                    // columns: ':visible' // Export only visible columns
                }
            },
            {
                extend: 'copyHtml5',
                text: 'Copy',
                exportOptions: {
                    columns: ':not(:last-child)' // Exclude the last column

                    // columns: ':visible' // Export only visible columns
                }
            }
        ],

        initComplete: function () {
            // Add the "btn" class to all DataTables buttons
            $('.dt-button').addClass('btn btn-outline-primary '); // Replace with any Bootstrap button class
            $('.dt-search').addClass('mb-4 mt-4 w-25 float-end '); // Replace with any Bootstrap button class
            $('.dt-paging').addClass('mb-4 mt-4 '); // Replace with any Bootstrap button class
            $('.dt-length').addClass('mb-4 '); // Replace with any Bootstrap button class
            $('#dt-length-0').addClass('mb-2 mt-5 w-25 '); // Replace with any Bootstrap button class
            $('.dt-info').addClass('mt-4 '); // Replace with any Bootstrap button class
        }
    });
});