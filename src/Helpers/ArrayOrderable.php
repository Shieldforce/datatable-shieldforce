<?php

namespace Shieldforce\Helpers;

class ArrayOrderable
{
    public static function array($list, $order, $dir)
    {
        $orderable = $dir == "asc" ? SORT_ASC : SORT_DESC;
        array_multisort(array_map(function ($element) use($order){
            return $element[$order];
        }, $list), $orderable, $list);
        return $list;
    }
}