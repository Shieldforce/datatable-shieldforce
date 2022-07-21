<?php

namespace Shieldforce\Frontend\JsRender;

class Ghost
{
    public static function js()
    {
        return "
            <script src='https://code.jquery.com/jquery-3.5.1.js'></script>
            <script src='https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js'></script>
            <script src='https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js'></script>
            <script src='https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap.min.js'></script>
        ";
    }
}