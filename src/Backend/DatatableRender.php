<?php

namespace Shieldforce\Backend;

/**
 * Classe de renderização
 */
class DatatableRender
{
    /**
     * Rendeniza o html de uma table
     * @return string
     */
    public static function renderHtmlTable()
    {
        return "
        <div id='datatable' class='mb-5'>
            <div class='card'>
                <div class='card-body'>
                    <table id='datatableDefault' class='table text-nowrap w-100'>
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Ação</th>
                        </tr>
                        </thead>
                    </table>
                </div>
                <div class='card-arrow'>
                    <div class='card-arrow-top-left'></div>
                    <div class='card-arrow-top-right'></div>
                    <div class='card-arrow-bottom-left'></div>
                    <div class='card-arrow-bottom-right'></div>
                </div>
            </div>
        </div>";
    }
}