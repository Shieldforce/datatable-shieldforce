<?php

namespace Shieldforce\Backend;

class DatatableReturn
{
    public static function baseReturn($post)
    {
        $list           = [
            ["id"=>1,"name"=>"Firstname Lastname","age"=>22],
            ["id"=>2,"name"=>"Firstname Lastname","age"=>34],
            ["id"=>3,"name"=>"Firstname Lastname","age"=>12],
            ["id"=>4,"name"=>"Firstname Lastname","age"=>42],
            ["id"=>5,"name"=>"Firstname Lastname","age"=>88],
            ["id"=>6,"name"=>"Firstname Lastname","age"=>41],
            ["id"=>7,"name"=>"Firstname Lastname","age"=>45],
        ];

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