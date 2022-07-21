<?php

namespace Shieldforce\Backend;

use Shieldforce\Helpers\ArrayOrderable;

class DatatableReturn
{
    public static function baseReturn($post, $list)
    {
        $columns                = array_column($post["columns"], "name");
        $totalData              = count($list);
        $start                  = $post['start'];
        $limit                  = $post['length'];
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

    private static function dataSearchFilter($list, $post)
    {
        // $search = $post["search"];
        // $search = self::filterIsNotNull($search);
        return $list;
    }

    private static function dataOffsetAndLimit($list, $start, $limit)
    {
        $posts = [];
        foreach ($list as $index => $value) {
            if ($index >= $start && $index < $limit ) {
                $posts[$index] = $value;
            }
        }
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