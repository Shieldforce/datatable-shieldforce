<?php

namespace Shieldforce\Frontend\CssRender;

class Ghost
{

    /**
     * Responsável por fazer as chamadas css
     * @param array $links
     * @return string
     */
    public static function head(array $links = [])
    {
        if (count($links) == 0) {
            $links = [
                "<link href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css' rel='stylesheet' />",
                "<link href='https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css' rel='stylesheet' />",
                "<link href='https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap5.min.css' rel='stylesheet' />",
            ];
        }
        return implode("\n", $links);
    }
}