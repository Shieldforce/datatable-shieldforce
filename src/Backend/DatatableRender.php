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
        <table id='datatableDefault' class='table table-striped table-bordered nowrap' style='width:100%'>
            <thead>
            <tr>
                {$htmlColumn}
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td>teste1</td>
                    <td>teste2</td>
                    <td>teste3</td>
                    <td>teste4</td>
                </tr>
            </tbody>
        </table>
        ";
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
                    style='width: {$columns['width']};' 
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