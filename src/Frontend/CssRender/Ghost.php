<?php

namespace Shieldforce\Frontend\CssRender;

class Ghost
{
    public static function head()
    {
        return "
            <link href='../../assets/plugins/datatables.net-bs5/css/dataTables.bootstrap5.min.css' rel='stylesheet' />
            <link href='../../assets/plugins/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css' rel='stylesheet' />
            <link href='../../assets/plugins/bootstrap-table/dist/bootstrap-table.min.css' rel='stylesheet' />
        ";
    }
}