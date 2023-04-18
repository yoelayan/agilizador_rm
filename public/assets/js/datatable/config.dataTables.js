function initDataTable(data){
    $(document).ready(function () {
        $('#' + data).DataTable({
            buttons: [],
            scrollY: true,
            scroller: {
                rowHeight: 60
            },
            language: {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Registros _END_ de _TOTAL_",
                "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Registros",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                } 
            }
        });
    });
}