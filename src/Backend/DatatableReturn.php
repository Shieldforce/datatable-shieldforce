<?php

namespace Shieldforce\Backend;

class DatatableReturn
{
    public static function baseReturn($post)
    {
        return json_encode($post);
    }
}