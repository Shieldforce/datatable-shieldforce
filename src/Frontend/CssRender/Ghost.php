<?php

namespace Shieldforce\Frontend\JsRender;

class Ghost
{
    public static function head()
    {
        return "
            <link href='https://code.jquery.com/jquery-3.5.1.js' rel='stylesheet' />
            <link href='https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js' rel='stylesheet' />
            <link href='https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap.min.js' rel='stylesheet' />
            <link href='https://cdn.datatables.net/fixedheader/3.2.4/js/dataTables.fixedHeader.min.js' rel='stylesheet' />
            <link href='https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js' rel='stylesheet' />
            <link href='https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap.min.js' rel='stylesheet' />
        ";
    }
}