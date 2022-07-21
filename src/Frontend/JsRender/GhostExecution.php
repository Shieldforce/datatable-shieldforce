<?php

namespace Shieldforce\Frontend\JsRender;

use Shieldforce\Backend\DatatableRender;

class GhostExecution
{
    /**
     * Responsável por rendenizar as chamadas js
     * @param string $url
     * @param bool $stateSave
     * @param bool $paging
     * @param bool $searching
     * @param bool $ordering
     * @return string
     */
    public static function js(
        string $url,
        bool $stateSave = true,
        bool $paging = true,
        bool $searching = true,
        bool $ordering = true
    )
    {
        $id      = DatatableRender::getId();
        $columns = json_encode(DatatableRender::getColumns());
        $dom     = '<"row mb-3"<"col-sm-4"l><"col-sm-8 text-end"<"d-flex justify-content-end"fB>>>t<"d-flex align-items-center"<"me-auto"i><"mb-0"p>>';
        return "
            <script>
            var dataTable = $('#'{$id});
            $(document).ready(function () {
                dataTable.DataTable({
                    dom: '{$dom}',
                    lengthMenu: [ 10, 20, 30, 40, 50 ],
                    stateSave: '{$stateSave}',
                    responsive: true,
                    'paging': '{$paging}',
                    'lengthChange': true,
                    'searching': '{$searching}',
                    'ordering': '{$ordering}',
                    'info': true,
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
                        'url'                      : '{$url}',
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