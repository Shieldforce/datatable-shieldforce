<?php

namespace Shieldforce\Helpers;

/**
 * Classe para ordenação de arrays
 */
class ArrayOrderable
{

    /**
     * Responsável por ordenar arrays
     * @param $list
     * @param $order
     * @param $dir
     * @return mixed
     */
    public static function array(array $list, string $order, string $dir) : array
    {
        $orderable = $dir == "asc" ? SORT_ASC : SORT_DESC;
        array_multisort(array_map(function ($element) use($order){
            return $element[$order];
        }, $list), $orderable, $list);
        return $list;
    }
}