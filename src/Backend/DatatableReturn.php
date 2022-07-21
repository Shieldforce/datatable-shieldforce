<?php

namespace Shieldforce\Backend;

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
        $posts          = $list;
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
}