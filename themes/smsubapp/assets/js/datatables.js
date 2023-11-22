$(document).ready(function() {
    //var table =
    $('#contactApp').DataTable( {
        drawCallback: function() {
            $('body').tooltip({
                selector: '[data-bs-togglee="tooltip"]'
            });
        },
        buttons: [
            {extend:'excel',title:'Agenda',header: 'Agenda',filename:'Agenda',className: 'btn btn-sm btn-outline-success mb-2',text:'<i class="bi bi-file-earmark-excel"></i>' },
            // {extend: 'pdfHtml5',exportOptions: {columns: ':visible'},title:'Agenda',header: 'Agenda',filename:'Agenda',orientation: 'portrait',pageSize: 'LEGAL',className: 'btn btn-outline-danger',text:'<i class="bi bi-file-earmark-pdf"></i>'},
            {extend:'print', exportOptions: {columns: ':visible'},title:'Agenda SMSUB',header: 'Agenda',filename:'Agenda',orientation: 'portrait',className: 'btn btn-sm btn-outline-secondary mb-2',text:'<i class="bi bi-printer"></i>'},
            {extend:'colvis',titleAttr: 'Select Colunas',className: 'btn btn-sm btn-outline-info mb-2',text:'<i class="bi bi-list"></i>'}],
        "dom": "<'row'<'col-lg-5 col-sm-5 col-md-5 numporpag'l><'col-lg-2 col-sm-2 col-md-2 text-center'B><'col-lg-5 col-sm-5 col-md-5 searchbar'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
        responsive:
            {details:
                {display: DataTable.Responsive.display.modal({
                        header: function (row) {
                            var data = row.data();
                            return data[0] + ' ' + data[1];
                },
                update: true
            }),
            renderer: DataTable.Responsive.renderer.tableAll({})}},
        "language": {
            "sEmptyTable": "Nenhum registro encontrado","sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros","sInfoFiltered": "(Filtrados de _MAX_ registros)",
            "sInfoThousands": ".","sLengthMenu": "_MENU_ Resultados por Página","sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...","sZeroRecords": "Nenhum registro encontrado","sSearch": "Pesquisar",
            "oPaginate": {"sNext": "Próximo","sPrevious": "Anterior","sFirst": "Primeiro","sLast": "Último"},
            "oAria": {"sSortAscending": "Ordenar colunas de forma ascendente","sPrevious": "Ordenar colunas de forma descendente"}
        },
        // dom: "lBftipr",
        "lengthMenu": [[7, 10, 25, 50, -1], [7, 10, 25, 50, "Todos"]],
        "aaSorting": [0, 'asc'], /* 'desc' Carregar table decrescente e asc crescente*/
        "aoColumnDefs": [
            {
                "aTargets": [0], // o numero 6 é o nº da coluna
                "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                    return '<a data-bs-togglee="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip"\n' +
                        'data-bs-title="Clique para editar o contato ' + full[2] + ' - Ramal : ' + full[3] + '" href="editar-contato/' + full[0] + '" role="button" class="btn btn-outline-warning btn-sm rounded-circle text-center"><i class="bi bi-pencil text-secondary"></i></a>';
                }
            },
            {
                "aTargets": [5], // o numero 6 é o nº da coluna
                "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                    return '<button type="button" data-bs-togglee="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip"\n' +
                        'data-bs-title="Clique para excluir o contato ' + full[2] + ' - Ramal : ' + full[3] + '" class="btn btn-outline-warning btn-sm rounded-circle text-secondary" data-bs-toggle="modal" data-bs-target="#trashModal'+ full[0]+'">' +
                                '<i class="bi bi-trash"></i></button>' +
                                '<div class="modal fade" id="trashModal' + full[0] + '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">\n' +
                                    '<div class="modal-dialog modal-sm">\n' +
                                        '<div class="modal-content">\n' +
                                            '<div class="modal-header bg-warning text-secondary">\n' +
                                                '<h6 class="modal-title text-center" id="exampleModalLabel"><i class="bi bi-trash me-2"></i> Enviar a Lixeira Ramal '+ full[3] +'</h6>\n' +
                                                '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>\n' +
                                            '</div>\n' +
                                            '<div class="modal-body fw-semibold">Deseja enviar a lixeira o ramal : ' + full[3] + ' ?</div>\n' +
                                                '<div class="modal-footer">\n' +
                                                    '<button type="button" class="btn btn-outline-danger btn-sm fw-semibold" data-bs-dismiss="modal"><i class="bi bi-trash"></i> Não</button>\n' +
                                                    '<a href="excluir-contato/' + full[0] + '" class="btn btn-outline-success btn-sm fw-semibold"><i class="bi bi-plus-circle" role="button" ></i> Sim</a>\n' +
                                                '</div>\n' +
                                            '</div>\n' +
                                    '</div>\n' +
                                '</div>';
                }
            },
            {
                "aTargets": [6], // o numero 6 é o nº da coluna
                "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                    return '<button type="button" class="btn btn-outline-danger btn-sm rounded-circle" data-bs-toggle="modal" data-bs-target="#trashModalFim'+ full[6]+'">' +
                        '<i class="bi bi-trash"></i></button>' +
                        '<div class="modal fade" id="trashModalFim' + full[6] + '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">\n' +
                        '<div class="modal-dialog modal-sm">\n' +
                        '<div class="modal-content">\n' +
                        '<div class="modal-header bg-danger text-light">\n' +
                        '<h6 class="modal-title text-center" id="exampleModalLabel"><i class="bi bi-trash me-2"></i> Excluir Definitivo Ramal ' + full[3] + '</h6>\n' +
                        '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>\n' +
                        '</div>\n' +
                        '<div class="modal-body fw-semibold">Deseja excluir definitivo o ramal : ' + full[3] + ' ?</div>\n' +
                        '<div class="modal-footer">\n' +
                        '<button type="button" class="btn btn-outline-danger btn-sm fw-semibold" data-bs-dismiss="modal"><i class="bi bi-trash"></i> Não</button>\n' +
                        '<a href="excluir-definitivo-contato/' + full[6] + '" class="btn btn-outline-success btn-sm fw-semibold"><i class="bi bi-plus-circle" role="button" ></i> Sim</a>\n' +
                        '</div>\n' +
                        '</div>\n' +
                        '</div>\n' +
                        '</div>';
                }
            }
        ]
    });

    //var table =
    $('#contactAppTrash').DataTable( {
        drawCallback: function() {
            $('body').tooltip({
                selector: '[data-bs-togglee="tooltip"]'
            });
        },
        buttons: [
            {extend:'excel',title:'Agenda',header: 'Agenda',filename:'Agenda',className: 'btn btn-sm btn-outline-success mb-2',text:'<i class="bi bi-file-earmark-excel"></i>' },
            // {extend: 'pdfHtml5',exportOptions: {columns: ':visible'},title:'Agenda',header: 'Agenda',filename:'Agenda',orientation: 'portrait',pageSize: 'LEGAL',className: 'btn btn-outline-danger',text:'<i class="bi bi-file-earmark-pdf"></i>'},
            {extend:'print', exportOptions: {columns: ':visible'},title:'Agenda SMSUB',header: 'Agenda',filename:'Agenda',orientation: 'portrait',className: 'btn btn-sm btn-outline-secondary mb-2',text:'<i class="bi bi-printer"></i>'},
            {extend:'colvis',titleAttr: 'Select Colunas',className: 'btn btn-sm btn-outline-info mb-2',text:'<i class="bi bi-list"></i>'}],
        "dom": "<'row'<'col-lg-5 col-sm-5 col-md-5 numporpag'l><'col-lg-2 col-sm-2 col-md-2 text-center'B><'col-lg-5 col-sm-5 col-md-5 searchbar'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
        responsive:
            {details:
                    {display: DataTable.Responsive.display.modal({
                            header: function (row) {
                                var data = row.data();
                                return data[0] + ' ' + data[1];
                            },
                            update: true
                        }),
                        renderer: DataTable.Responsive.renderer.tableAll({})}},
        "language": {
            "sEmptyTable": "Nenhum registro encontrado","sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros","sInfoFiltered": "(Filtrados de _MAX_ registros)",
            "sInfoThousands": ".","sLengthMenu": "_MENU_ Resultados por Página","sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...","sZeroRecords": "Nenhum registro encontrado","sSearch": "Pesquisar",
            "oPaginate": {"sNext": "Próximo","sPrevious": "Anterior","sFirst": "Primeiro","sLast": "Último"},
            "oAria": {"sSortAscending": "Ordenar colunas de forma ascendente","sPrevious": "Ordenar colunas de forma descendente"}
        },
        // dom: "lBftipr",
        "lengthMenu": [[7, 10, 25, 50, -1], [7, 10, 25, 50, "Todos"]],
        "aaSorting": [0, 'asc'], /* 'desc' Carregar table decrescente e asc crescente*/
        "aoColumnDefs": [
            {
                "aTargets": [4], // o numero 6 é o nº da coluna
                "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                    return '<button type="button" class="btn btn-outline-warning btn-sm rounded-circle text-secondary" data-bs-toggle="modal" data-bs-target="#trashModal'+ full[4]+'">' +
                                '<i class="bi bi-arrow-up-circle"></i></button>' +
                                    '<div class="modal fade" id="trashModal' + full[4] + '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">\n' +
                                        '<div class="modal-dialog modal-sm">\n' +
                                            '<div class="modal-content">\n' +
                                                '<div class="modal-header bg-warning text-secondary">\n' +
                                                    '<h6 class="modal-title text-center" id="exampleModalLabel"><i class="bi bi-arrow-up-circle me-2"></i> Restaurar Ramal '+ full[2] +'</h6>\n' +
                                                        '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>\n' +
                                                '</div>\n' +
                                            '<div class="modal-body fw-semibold">Deseja restaurar o ramal : ' + full[2] + ' ?</div>\n' +
                                        '<div class="modal-footer">\n' +
                                            '<button type="button" class="btn btn-outline-danger btn-sm fw-semibold" data-bs-dismiss="modal"><i class="bi bi-trash"></i> Não</button>\n' +
                                            '<a href="reativar-contato/' + full[4] + '" class="btn btn-outline-success btn-sm fw-semibold"><i class="bi bi-plus-circle" role="button" ></i> Sim</a>\n' +
                                        '</div>\n' +
                                    '</div>\n' +
                                '</div>\n' +
                            '</div>';
                }
            },
            {
                "aTargets": [5], // o numero 6 é o nº da coluna
                "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                    return '<button type="button" class="btn btn-outline-danger btn-sm rounded-circle" data-bs-toggle="modal" data-bs-target="#trashModalFim'+ full[5]+'">' +
                        '<i class="bi bi-trash"></i></button>' +
                        '<div class="modal fade" id="trashModalFim' + full[5] + '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">\n' +
                        '<div class="modal-dialog modal-sm">\n' +
                        '<div class="modal-content">\n' +
                        '<div class="modal-header bg-danger text-light">\n' +
                        '<h6 class="modal-title text-center" id="exampleModalLabel"><i class="bi bi-trash me-2"></i> Excluir Contato ' + full[1] + '</h6>\n' +
                        '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>\n' +
                        '</div>\n' +
                        '<div class="modal-body fw-semibold">Deseja excluir definitivo o contato : ' + full[1] + ' ?</div>\n' +
                        '<div class="modal-footer">\n' +
                        '<button type="button" class="btn btn-outline-danger btn-sm fw-semibold" data-bs-dismiss="modal"><i class="bi bi-trash"></i> Não</button>\n' +
                        '<a href="excluir-definitivo-contato/' + full[5] + '" class="btn btn-outline-success btn-sm fw-semibold"><i class="bi bi-plus-circle" role="button" ></i> Sim</a>\n' +
                        '</div>\n' +
                        '</div>\n' +
                        '</div>\n' +
                        '</div>';
                }
            }
        ]
    });

    $('#sectorApp').DataTable({
        drawCallback: function() {
            $('body').tooltip({
                selector: '[data-bs-togglee="tooltip"]'
            });
        },
        buttons: [
            {extend:'excel',title:'Setores da Agenda SMSUB',header: 'Setores da Agenda SMSUB',filename:'Setores da Agenda SMSUB',className: 'btn btn-sm btn-outline-success mb-2',text:'<i class="bi bi-file-earmark-excel"></i>' },
            {extend:'print', exportOptions: {columns: ':visible'},title:'Setores da Agenda SMSUB',header: 'Setores da Agenda SMSUB',filename:'Setores da Agenda SMSUB',orientation: 'portrait',className: 'btn btn-sm btn-outline-secondary mb-2',text:'<i class="bi bi-printer"></i>'},
            {extend:'colvis',titleAttr: 'Select Colunas',className: 'btn btn-sm btn-outline-info mb-2',text:'<i class="bi bi-list"></i>'}],
        "dom": "<'row'<'col-lg-5 col-sm-5 col-md-5 numporpag'l><'col-lg-2 col-sm-2 col-md-2 text-center'B><'col-lg-5 col-sm-5 col-md-5 searchbar'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
       responsive:
            {details:
                    {display: DataTable.Responsive.display.modal({
                            header: function (row) {
                                var data = row.data();
                                return data[1];
                            },
                            update: true
                        }),
                        renderer: DataTable.Responsive.renderer.tableAll({})}},
        "language": {
            "sEmptyTable": "Nenhum registro encontrado","sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros","sInfoFiltered": "(Filtrados de _MAX_ registros)",
            "sInfoThousands": ".","sLengthMenu": "_MENU_ Resultados por Página","sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...","sZeroRecords": "Nenhum registro encontrado","sSearch": "Pesquisar",
            "oPaginate": {"sNext": "Próximo","sPrevious": "Anterior","sFirst": "Primeiro","sLast": "Último"},
            "oAria": {"sSortAscending": "Ordenar colunas de forma ascendente","sPrevious": "Ordenar colunas de forma descendente"}
        },
        // dom: "lBftipr",
        "lengthMenu": [[7, 10, 25, 50, -1], [7, 10, 25, 50, "Todos"]],
        "aaSorting": [0, 'asc'], /* 'desc' Carregar table decrescente e asc crescente*/
        "aoColumnDefs": [
            {
                "aTargets": [0], // o numero 6 é o nº da coluna
                "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                    return '<a data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip"\n' +
                        'data-bs-title="Clique para editar" href="editar-setor/' + full[0] + '" role="button" class="btn btn-outline-warning btn-sm rounded-circle text-center"><i class="bi bi-pencil text-secondary"></i></a>';
                }
            },
            {
                "aTargets": [4], // o numero 6 é o nº da coluna
                "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                    return '<button type="button" class="btn btn-outline-warning btn-sm rounded-circle text-secondary" data-bs-toggle="modal" data-bs-target="#trashModal'+ full[0]+'">' +
                        '<i class="bi bi-trash"></i></button>' +
                            '<div class="modal fade" id="trashModal' + full[0] + '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">\n' +
                                '<div class="modal-dialog modal-sm">\n' +
                                    '<div class="modal-content">\n' +
                                        '<div class="modal-header bg-secondary text-light">\n' +
                                            '<h6 class="modal-title text-center" id="exampleModalLabel"><i class="bi bi-trash me-2"></i> Setor '+ full[1] +'</h6>\n' +
                                                '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>\n' +
                                        '</div>\n' +
                                    '<div class="modal-body fw-semibold">Deseja excluir o setor : ' + full[1] + ' ?</div>\n' +
                                '<div class="modal-footer">\n' +
                                    '<button type="button" class="btn btn-outline-danger btn-sm fw-semibold" data-bs-dismiss="modal"><i class="bi bi-trash"></i> Não</button>\n' +
                                    '<a href="excluir-setor/' + full[0] + '" class="btn btn-outline-success btn-sm fw-semibold"><i class="bi bi-plus-circle" role="button" ></i> Sim</a>\n' +
                                '</div>\n' +
                            '</div>\n' +
                        '</div>\n' +
                    '</div>';
                }
            },
        ]
    });

    $('#sectorAppTrash').DataTable({
        drawCallback: function() {
            $('body').tooltip({
                selector: '[data-bs-togglee="tooltip"]'
            });
        },
        buttons: [
            {extend:'excel',title:'Setores da Agenda SMSUB',header: 'Setores da Agenda SMSUB',filename:'Setores da Agenda SMSUB',className: 'btn btn-sm btn-outline-success mb-2',text:'<i class="bi bi-file-earmark-excel"></i>' },
            {extend:'print', exportOptions: {columns: ':visible'},title:'Setores da Agenda SMSUB',header: 'Setores da Agenda SMSUB',filename:'Setores da Agenda SMSUB',orientation: 'portrait',className: 'btn btn-sm btn-outline-secondary mb-2',text:'<i class="bi bi-printer"></i>'},
            {extend:'colvis',titleAttr: 'Select Colunas',className: 'btn btn-sm btn-outline-info mb-2',text:'<i class="bi bi-list"></i>'}],
        "dom": "<'row'<'col-lg-5 col-sm-5 col-md-5 numporpag'l><'col-lg-2 col-sm-2 col-md-2 text-center'B><'col-lg-5 col-sm-5 col-md-5 searchbar'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
        responsive:
            {details:
                    {display: DataTable.Responsive.display.modal({
                            header: function (row) {
                                var data = row.data();
                                return data[1];
                            },
                            update: true
                        }),
                        renderer: DataTable.Responsive.renderer.tableAll({})}},
        "language": {
            "sEmptyTable": "Nenhum registro encontrado","sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros","sInfoFiltered": "(Filtrados de _MAX_ registros)",
            "sInfoThousands": ".","sLengthMenu": "_MENU_ Resultados por Página","sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...","sZeroRecords": "Nenhum registro encontrado","sSearch": "Pesquisar",
            "oPaginate": {"sNext": "Próximo","sPrevious": "Anterior","sFirst": "Primeiro","sLast": "Último"},
            "oAria": {"sSortAscending": "Ordenar colunas de forma ascendente","sPrevious": "Ordenar colunas de forma descendente"}
        },
        // dom: "lBftipr",
        "lengthMenu": [[7, 10, 25, 50, -1], [7, 10, 25, 50, "Todos"]],
        "aaSorting": [0, 'asc'], /* 'desc' Carregar table decrescente e asc crescente*/
        "aoColumnDefs": [
            {
                "aTargets": [3], // o numero 6 é o nº da coluna
                "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                    return '<button type="button" class="btn btn-outline-warning btn-sm rounded-circle text-secondary" data-bs-toggle="modal" data-bs-target="#trashModal'+ full[3]+'">' +
                        '<i class="bi bi-arrow-up-circle"></i></button>' +
                        '<div class="modal fade" id="trashModal' + full[3] + '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">\n' +
                        '<div class="modal-dialog modal-sm">\n' +
                        '<div class="modal-content">\n' +
                        '<div class="modal-header bg-secondary text-light">\n' +
                        '<h6 class="modal-title text-center" id="exampleModalLabel"><i class="bi bi-trash me-2"></i> Setor '+ full[0] +'</h6>\n' +
                        '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>\n' +
                        '</div>\n' +
                        '<div class="modal-body fw-semibold">Deseja reativar o setor : ' + full[0] + ' ?</div>\n' +
                        '<div class="modal-footer">\n' +
                        '<button type="button" class="btn btn-outline-danger btn-sm fw-semibold" data-bs-dismiss="modal"><i class="bi bi-trash"></i> Não</button>\n' +
                        '<a href="reativar-setor/' + full[3] + '" class="btn btn-outline-success btn-sm fw-semibold"><i class="bi bi-plus-circle" role="button" ></i> Sim</a>\n' +
                        '</div>\n' +
                        '</div>\n' +
                        '</div>\n' +
                        '</div>';
                }
            },
            {
                "aTargets": [4], // o numero 6 é o nº da coluna
                "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                    return '<button type="button" class="btn btn-outline-secondary btn-sm rounded-circle" data-bs-toggle="modal" data-bs-target="#trashModalFim'+ full[4]+'">' +
                        '<i class="bi bi-trash"></i></button>' +
                        '<div class="modal fade" id="trashModalFim' + full[4] + '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">\n' +
                        '<div class="modal-dialog modal-sm">\n' +
                        '<div class="modal-content">\n' +
                        '<div class="modal-header bg-danger text-light">\n' +
                        '<h6 class="modal-title text-center" id="exampleModalLabel"><i class="bi bi-book-half me-2"></i> Excluir Usuário</h6>\n' +
                        '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>\n' +
                        '</div>\n' +
                        '<div class="modal-body fw-semibold">Deseja excluir definitivo o setor : ' + full[0] + ' ?</div>\n' +
                        '<div class="modal-footer">\n' +
                        '<button type="button" class="btn btn-outline-danger btn-sm fw-semibold" data-bs-dismiss="modal"><i class="bi bi-trash"></i> Não</button>\n' +
                        '<a href="excluir-definitivo-setor/' + full[4] + '" class="btn btn-outline-success btn-sm fw-semibold"><i class="bi bi-plus-circle" role="button" ></i> Sim</a>\n' +
                        '</div>\n' +
                        '</div>\n' +
                        '</div>\n' +
                        '</div>';
                }
            }
        ]
    });

    $('#userApp').DataTable( {
        drawCallback: function() {
            $('body').tooltip({
                selector: '[data-bs-togglee="tooltip"]'
            });
        },
        buttons: [
            {extend:'excel',title:'Agenda',header: 'Agenda',filename:'Agenda',className: 'btn btn-sm btn-outline-success mb-2',text:'<i class="bi bi-file-earmark-excel"></i>' },
            // {extend: 'pdfHtml5',exportOptions: {columns: ':visible'},title:'Agenda',header: 'Agenda',filename:'Agenda',orientation: 'portrait',pageSize: 'LEGAL',className: 'btn btn-outline-danger',text:'<i class="bi bi-file-earmark-pdf"></i>'},
            {extend:'print', exportOptions: {columns: ':visible'},title:'Agenda SMSUB',header: 'Agenda',filename:'Agenda',orientation: 'portrait',className: 'btn btn-sm btn-outline-secondary mb-2',text:'<i class="bi bi-printer"></i>'},
            {extend:'colvis',titleAttr: 'Select Colunas',className: 'btn btn-sm btn-outline-info mb-2',text:'<i class="bi bi-list"></i>'}],
        "dom": "<'row'<'col-lg-5 col-sm-5 col-md-5 numporpag'l><'col-lg-2 col-sm-2 col-md-2 text-center'B><'col-lg-5 col-sm-5 col-md-5 searchbar'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
        responsive:
            {details:
                    {display: DataTable.Responsive.display.modal({
                            header: function (row) {
                                var data = row.data();
                                return data[0] + ' ' + data[1];
                            },
                            update: true
                        }),
                        renderer: DataTable.Responsive.renderer.tableAll({})}},
        "language": {
            "sEmptyTable": "Nenhum registro encontrado","sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros","sInfoFiltered": "(Filtrados de _MAX_ registros)",
            "sInfoThousands": ".","sLengthMenu": "_MENU_ Resultados por Página","sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...","sZeroRecords": "Nenhum registro encontrado","sSearch": "Pesquisar",
            "oPaginate": {"sNext": "Próximo","sPrevious": "Anterior","sFirst": "Primeiro","sLast": "Último"},
            "oAria": {"sSortAscending": "Ordenar colunas de forma ascendente","sPrevious": "Ordenar colunas de forma descendente"}
        },
        // dom: "lBftipr",
        "lengthMenu": [[7, 10, 25, 50, -1], [7, 10, 25, 50, "Todos"]],
        "aaSorting": [0, 'asc'], /* 'desc' Carregar table decrescente e asc crescente*/
        "aoColumnDefs": [
            {
                "aTargets": [0], // o numero 6 é o nº da coluna
                "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                    return '<a data-bs-togglee="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip"\n' +
                        'data-bs-title="Clique para editar o usuário ' + full[1] + '" href="editar-usuario/' + full[0] + '" role="button" class="btn btn-outline-warning btn-sm rounded-circle text-center"><i class="bi bi-pencil text-secondary"></i></a>';
                }
            },
            {
                "aTargets": [7], // o numero 6 é o nº da coluna
                "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                    return '<button type="button" class="btn btn-outline-danger btn-sm rounded-circle text-secondary" data-bs-toggle="modal" data-bs-target="#trashModal'+ full[7]+'">' +
                        '<i class="bi bi-trash"></i></button>' +
                        '<div class="modal fade" id="trashModal' + full[7] + '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">\n' +
                        '<div class="modal-dialog modal-sm">\n' +
                        '<div class="modal-content">\n' +
                        '<div class="modal-header bg-danger text-light">\n' +
                        '<h6 class="modal-title text-center" id="exampleModalLabel"><i class="bi bi-book-half me-2"></i> Excluir Usuário</h6>\n' +
                        '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>\n' +
                        '</div>\n' +
                        '<div class="modal-body fw-semibold">Deseja excluir o usuário : ' + full[1] + ' ?</div>\n' +
                        '<div class="modal-footer">\n' +
                        '<button type="button" class="btn btn-outline-danger btn-sm fw-semibold" data-bs-dismiss="modal"><i class="bi bi-trash"></i> Não</button>\n' +
                        '<a href="excluir-usuario/' + full[7] + '" class="btn btn-outline-success btn-sm fw-semibold"><i class="bi bi-plus-circle" role="button" ></i> Sim</a>\n' +
                        '</div>\n' +
                        '</div>\n' +
                        '</div>\n' +
                        '</div>';
                }
            },
        ]
    });

    $('#userAppTrash').DataTable( {
        drawCallback: function() {
            $('body').tooltip({
                selector: '[data-bs-togglee="tooltip"]'
            });
        },
        buttons: [
            {extend:'excel',title:'Agenda',header: 'Agenda',filename:'Agenda',className: 'btn btn-sm btn-outline-success mb-2',text:'<i class="bi bi-file-earmark-excel"></i>' },
            // {extend: 'pdfHtml5',exportOptions: {columns: ':visible'},title:'Agenda',header: 'Agenda',filename:'Agenda',orientation: 'portrait',pageSize: 'LEGAL',className: 'btn btn-outline-danger',text:'<i class="bi bi-file-earmark-pdf"></i>'},
            {extend:'print', exportOptions: {columns: ':visible'},title:'Agenda SMSUB',header: 'Agenda',filename:'Agenda',orientation: 'portrait',className: 'btn btn-sm btn-outline-secondary mb-2',text:'<i class="bi bi-printer"></i>'},
            {extend:'colvis',titleAttr: 'Select Colunas',className: 'btn btn-sm btn-outline-info mb-2',text:'<i class="bi bi-list"></i>'}],
        "dom": "<'row'<'col-lg-5 col-sm-5 col-md-5 numporpag'l><'col-lg-2 col-sm-2 col-md-2 text-center'B><'col-lg-5 col-sm-5 col-md-5 searchbar'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
        responsive:
            {details:
                    {display: DataTable.Responsive.display.modal({
                            header: function (row) {
                                var data = row.data();
                                return data[0] + ' ' + data[1];
                            },
                            update: true
                        }),
                        renderer: DataTable.Responsive.renderer.tableAll({})}},
        "language": {
            "sEmptyTable": "Nenhum registro encontrado","sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros","sInfoFiltered": "(Filtrados de _MAX_ registros)",
            "sInfoThousands": ".","sLengthMenu": "_MENU_ Resultados por Página","sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...","sZeroRecords": "Nenhum registro encontrado","sSearch": "Pesquisar",
            "oPaginate": {"sNext": "Próximo","sPrevious": "Anterior","sFirst": "Primeiro","sLast": "Último"},
            "oAria": {"sSortAscending": "Ordenar colunas de forma ascendente","sPrevious": "Ordenar colunas de forma descendente"}
        },
        // dom: "lBftipr",
        "lengthMenu": [[7, 10, 25, 50, -1], [7, 10, 25, 50, "Todos"]],
        "aaSorting": [0, 'asc'], /* 'desc' Carregar table decrescente e asc crescente*/
        "aoColumnDefs": [
            {
                "aTargets": [4], // o numero 6 é o nº da coluna
                "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                    return '<button type="button" class="btn btn-outline-warning btn-sm rounded-circle text-secondary" data-bs-toggle="modal" data-bs-target="#trashModal'+ full[4]+'">' +
                        '<i class="bi bi-arrow-up-circle"></i></button>' +
                        '<div class="modal fade" id="trashModal' + full[4] + '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">\n' +
                        '<div class="modal-dialog modal-sm">\n' +
                        '<div class="modal-content">\n' +
                        '<div class="modal-header bg-danger text-light">\n' +
                        '<h6 class="modal-title text-center" id="exampleModalLabel"><i class="bi bi-book-half me-2"></i> Excluir Usuário</h6>\n' +
                        '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>\n' +
                        '</div>\n' +
                        '<div class="modal-body fw-semibold">Deseja reativar o usuário : ' + full[1] + ' ?</div>\n' +
                        '<div class="modal-footer">\n' +
                        '<button type="button" class="btn btn-outline-danger btn-sm fw-semibold" data-bs-dismiss="modal"><i class="bi bi-trash"></i> Não</button>\n' +
                        '<a href="reativar-usuario/' + full[4] + '" class="btn btn-outline-success btn-sm fw-semibold"><i class="bi bi-plus-circle" role="button" ></i> Sim</a>\n' +
                        '</div>\n' +
                        '</div>\n' +
                        '</div>\n' +
                        '</div>';
                }
            },
            {
                "aTargets": [5], // o numero 6 é o nº da coluna
                "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                    return '<button type="button" class="btn btn-outline-secondary btn-sm rounded-circle" data-bs-toggle="modal" data-bs-target="#trashModalFim'+ full[5]+'">' +
                        '<i class="bi bi-trash"></i></button>' +
                        '<div class="modal fade" id="trashModalFim' + full[5] + '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">\n' +
                        '<div class="modal-dialog modal-sm">\n' +
                        '<div class="modal-content">\n' +
                        '<div class="modal-header bg-danger text-light">\n' +
                        '<h6 class="modal-title text-center" id="exampleModalLabel"><i class="bi bi-book-half me-2"></i> Excluir Usuário</h6>\n' +
                        '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>\n' +
                        '</div>\n' +
                        '<div class="modal-body fw-semibold">Deseja excluir definitivo o usuário : ' + full[0] + ' ?</div>\n' +
                        '<div class="modal-footer">\n' +
                        '<button type="button" class="btn btn-outline-danger btn-sm fw-semibold" data-bs-dismiss="modal"><i class="bi bi-trash"></i> Não</button>\n' +
                        '<a href="excluir-definitivo-usuario/' + full[5] + '" class="btn btn-outline-success btn-sm fw-semibold"><i class="bi bi-plus-circle" role="button" ></i> Sim</a>\n' +
                        '</div>\n' +
                        '</div>\n' +
                        '</div>\n' +
                        '</div>';
                }
            },
        ]
    });
});