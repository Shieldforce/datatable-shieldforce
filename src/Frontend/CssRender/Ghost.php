<?php

namespace Shieldforce\Frontend\CssRender;

class Ghost
{
    public static function head()
    {
        return "
            <link href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css' rel='stylesheet' />
            <link href='https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css' rel='stylesheet' />
            <link href='https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css' rel='stylesheet' />
            
        ";
    }
}