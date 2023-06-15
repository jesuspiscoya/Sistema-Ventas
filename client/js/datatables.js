let botones = [
    {
        extend: 'pdfHtml5',
        text: '<i class="fas fa-file-pdf m-1 mx-2 h5"></i> ',
        titleAttr: 'Exportar a PDF',
        className: 'btn btn-inverse-danger',
    },
    {
        extend: 'print',
        text: '<i class="fa fa-print m-1 mx-2 h5"></i> ',
        titleAttr: 'Imprimir',
        className: 'btn btn-inverse-info',
    }
];

(function ($) {
    'use strict';
    $(function () {
        $('#dataTableConfirmacion').DataTable({
            responsive: "true",
            dom: "Bfrtilp",
            buttons: botones,
            columnDefs: [
                { orderable: false, target: [0, 1, 2, 3, 4] }
            ]
        });
    });
})(jQuery);