<?php

namespace Shieldforce\Backend;

use Shieldforce\Helpers\ArrayOrderable;

/**
 * Classes qie retorna os resultados
 */
class DatatableReturn
{
    /**
     * Responsável por retornar os resultados
     * @param $post
     * @param $list
     * @param callable $callable
     * @return false|string
     */
    public static function baseReturn($post, $list, callable $callable) : false|string
    {
        $columns                = array_column($post["columns"], "name");
        $totalData              = count($list);
        $start                  = $post['start'];
        $limit                  = $start + $post['length'];
        $order                  = $columns[$post['order']['0']['column']];
        $dir                    = $post['order']['0']['dir'];
        $search                 = self::dataSearchFilter($list, $post);
        $ordarable              = ArrayOrderable::array($search, $order, $dir);
        $dataOffsetAndLimit     = self::dataOffsetAndLimit($ordarable, $start, $limit);
        $totalFiltered          = count($search);
        $data                   = [];
        if( $dataOffsetAndLimit ) {
            foreach ( $dataOffsetAndLimit as $r ) {
                foreach ( $columns as $key => $col ) {
                    $nestedData = call_user_func($callable, $nestedData, $col, $r);
                }
                $data[] = $nestedData;
            }
        }
        return json_encode([
            "draw"                          => intval($post['draw']),
            "recordsTotal"                  => intval($totalData),
            "recordsFiltered"               => intval($totalFiltered),
            "data"                          => $data
        ]);
    }

    /**
     * Responsável por filtrar os resultados
     * @param $list
     * @param $post
     * @return array
     */
    private static function dataSearchFilter($list, $post) : array
    {
        $search = $post["search"]["value"] ?? false;
        if($search) {
            $newArray = [];
            foreach ($list as $line) {
                foreach ($line as $index => $v) {
                    if(preg_match("/".$search.".*/i", $line[$index])) {
                        $newArray[] = $line;
                    }
                }
            }
        }
        return $newArray ?? $list;
    }

    /**
     * Responsável por paginar
     * @param $list
     * @param $start
     * @param $limit
     * @return array
     */
    private static function dataOffsetAndLimit($list, $start, $limit) : array
    {
        $posts = [];
        foreach ($list as $index => $value) {
            if ($index >= $start && $index < $limit ) {
                $posts[$index] = $value;
            }
        }
        return $posts;
    }
}