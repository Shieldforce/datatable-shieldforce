<?php

namespace Shieldforce\Frontend\JsRender;

use Shieldforce\Backend\DatatableRender;

class GhostExecution
{
    public static function js()
    {
        $columns = json_encode(DatatableRender::getColumns());
        return "
            <script>
            var dataTable = $('#datatableDefault');
            $(document).ready(function () {
                dataTable.DataTable({
                    dom: 'Bfrtip',
                    lengthMenu: [ 10, 20, 30, 40, 50 ],
                    stateSave: false,
                    responsive:true,
                    'paging': true,
                    'lengthChange': true,
                    'searching': false,
                    'ordering': true,
                    'info': false,
                    'autoWidth': false,
                    'pagingType': 'full_numbers',
                    'language': {
                        'sEmptyTable': 'Nenhum registro encontrado',
                        'sInfo': 'Mostrando de _START_ até _END_ de _TOTAL_ registros',
                        'sInfoEmpty': 'Mostrando 0 até 0 de 0 registros',
                        'sInfoFiltered': '(Filtrados de _MAX_ registros)',
                        'sInfoPostFix': '',
                        'sInfoThousands': '.',
                        'sLengthMenu': '_MENU_ resultados por página',
                        'sLoadingRecords': 'Carregando...',
                        'sProcessing': 'Processando...',
                        'sZeroRecords': 'Nenhum registro encontrado',
                        'sSearch': 'Pesquisa Geral',
                        'oPaginate': {
                            'sNext': 'Próximo',
                            'sPrevious': 'Anterior',
                            'sFirst': 'Primeiro',
                            'sLast': 'Último'
                        },
                        'oAria': {
                            'sSortAscending': ': Ordenar colunas de forma ascendente',
                            'sSortDescending': ': Ordenar colunas de forma descendente'
                        }
                    },
                    // Configuração Server Side ----------------------------------------------------------------------------
                    'processing': true,
                    'serverSide': true,
                    'ajax': {
                        'url'                      : '/db/datatable',
                        'dataType'                 : 'json',
                        'type'                     : 'POST',
                        'data'                     : function ( d ) {
                            return $.extend( {}, d, {
                                'columns'          : columns,
                            } );
                        }
                    },
                    'columns':columns
                    // -----------------------------------------------------------------------------------------------------
                });
            });
            var columns = {$columns};
            </script>
        ";
    }
}