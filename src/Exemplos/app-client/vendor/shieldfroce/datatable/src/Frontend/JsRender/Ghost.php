<?php

namespace Shieldforce\Frontend\JsRender;

class Ghost
{

    /**
     * Responsável por fazer as chamadas js
     * @param array $links
     * @return string
     */
    public static function js(array $links = [])
    {
        if (count($links) == 0) {
            $links = [
                "<script src='https://code.jquery.com/jquery-3.5.1.js'></script>",
                "<script src='https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js'></script>",
                "<script src='https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js'></script>",
                "<script src='https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap.min.js'></script>",
                "<script src='https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js'></script>",
            ];
        }
        return implode("\n", $links);
    }
}