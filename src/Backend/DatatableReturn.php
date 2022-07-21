<?php

namespace Shieldforce\Backend;

use Shieldforce\Helpers\ArrayOrderable;

class DatatableReturn
{
    public static function baseReturn($post, $list)
    {
        $columns        = array_column($post["columns"], "name");
        $totalData      = count($list);
        $start          = $post['start'];
        $limit          = $post['length'];
        $order          = $columns[$post['order']['0']['column']];
        $dir            = $post['order']['0']['dir'];
        $list           = self::dataSearchFilter($list, $start, $limit, $post);
        $posts          = ArrayOrderable::array($list, $order, $dir);
        $totalFiltered  = count($posts);
        $data           = [];
        if( $posts ) {
            foreach ( $posts as $r ) {
                foreach ( $columns as $key => $col ) {
                    if($col=="id") {
                        $nestedData["$col"] = $r["id"] ?? "-";
                    } elseif($col=="name") {
                        $nestedData["$col"] = $r["name"] ?? "-";
                    } elseif($col=="age") {
                        $nestedData["$col"] = $r["age"] ?? "-";
                    } elseif($col=="action") {
                        $nestedData["$col"]   = "-";
                    } else {
                        $nestedData["$col"] = "-";
                    }
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

    private static function dataSearchFilter($list, $start, $limit, $post)
    {
        $posts = [];
        foreach ($list as $index => $value) {
            if ($index >= $start && $index <= $limit ) {
                $posts[$index] = $value;
            }
        }

        // $search = $post["search"];
        // $search = self::filterIsNotNull($search);

        return $posts;
    }

    private static function filterIsNotNull($searchCustom)
    {
        foreach ($searchCustom as $index => $sc) {
            if(!$sc["value"]) {
                unset($searchCustom[$index]);
            }
        }
        return $searchCustom;
    }
}