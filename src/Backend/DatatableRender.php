<?php

namespace Shieldforce\Backend;

/**
 * Classe de renderização
 */
class DatatableRender
{

    /**
     * Lista de colunas para setup da tabela
     * @var array
     */
    private static array $columns = [];

    /**
     * Rendeniza o html de uma table
     * @param array $columns
     * @return string
     */
    public static function renderHtmlTable(array $columns = []) : string
    {
        $htmlColumn = count($columns) == 0 ? "<th class='text-center'>Nenhum coluna informada!</th>" : '';
        $htmlColumn = self::loopColumns($columns, $htmlColumn);
        return "
        <div id='datatable' class='mb-5'>
            <div class='card'>
                <div class='card-body'>
                    <table id='datatableDefault' class='table text-nowrap w-100'>
                        <thead>
                        <tr>
                            {$htmlColumn}
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>";
    }

    /**
     * Responsável por rodar o loop das colunas informadas
     * @param $columns
     * @param $htmlColumn
     * @return mixed|string
     */
    private static function loopColumns($columns, $htmlColumn)
    {
        foreach ($columns as $colId => $column) {
            $htmlColumn .=
                "<th 
                    style='width: {$columns['width']}' 
                    id='{$colId}' 
                    data-column-name='{$column['name']}' 
                    class='{$column['class']}'
                >
                {$column['title']}
                </th>";
        }
        return $htmlColumn;
    }


}