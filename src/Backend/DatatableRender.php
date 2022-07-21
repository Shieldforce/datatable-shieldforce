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
     * ‘ID’ de idêntificação da tabela
     * @var string
     */
    private static string $id;

    /**
     * Rendeniza o html de uma table
     * @param array $columns
     * @param $id
     * @param $class
     * @return string
     */
    public static function renderHtmlTable(
        array $columns = [],
        string $id = "datatableDefault",
        string $class = "display table responsive table-striped table-bordered nowrap"
    ) : string
    {
        self::$id = $id;
        self::$columns = $columns;
        $htmlColumn = count($columns) == 0 ? "<th class='text-center'>Nenhum coluna informada!</th>" : '';
        $htmlColumn = self::loopColumns($columns, $htmlColumn);
        return "
        <table id='{$id}' class='{$class}' style='width:100%'>
            <thead>
            <tr>
                {$htmlColumn}
            </tr>
            </thead>
        </table>
        ";
}

    /**
     * Responsável por rodar o loop das colunas informadas
     * @param $columns
     * @param $htmlColumn
     * @return mixed|string
     */
    private static function loopColumns(array $columns, string $htmlColumn) : string
    {
        foreach ($columns as $index => $column) {
            $htmlColumn .=
                "<th 
                    style='width: {$columns['width']};' 
                    id='{$index}' 
                    data-column-name='{$column['name']}' 
                    class='{$column['class']}'
                >
                {$column['title']}
                </th>";
        }
        return $htmlColumn;
    }

    /**
     * Responsável por mostrar a lista de colunas
     * @return array
     */
    public static function getColumns() : array
    {
        return self::$columns;
    }

    /**
     * Responsável por mostrar o ‘id’ de idêntificação da tabela
     * @return string
     */
    public static function getId() : string
    {
        return self::$id;
    }


}