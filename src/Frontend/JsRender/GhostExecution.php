<?php

namespace Shieldforce\Frontend\JsRender;

class GhostExecution
{
    public static function js()
    {
        return "
            <script>
            $(document).ready(function() {
                var table = $('#datatableDefault').DataTable( {
                    responsive: true
                } );
             
                new $.fn.dataTable.FixedHeader( table );
            } );
            </script>
        ";
    }
}