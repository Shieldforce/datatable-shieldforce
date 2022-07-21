<?php

namespace Shieldforce\Backend;

class DatatableReturn
{
    public static function baseReturn($post)
    {
        $list = [
            ["id"=>1, "name"=>"Firstname Lastname 1", "age"=>22],
            ["id"=>2, "name"=>"Firstname Lastname 2", "age"=>34],
            ["id"=>3, "name"=>"Firstname Lastname 3", "age"=>12],
            ["id"=>4, "name"=>"Firstname Lastname 4", "age"=>42],
            ["id"=>5, "name"=>"Firstname Lastname 5", "age"=>88],
            ["id"=>6, "name"=>"Firstname Lastname 6", "age"=>41],
            ["id"=>7, "name"=>"Firstname Lastname 7", "age"=>45],
            ["id"=>8, "name"=>"Firstname Lastname 8", "age"=>45],
            ["id"=>9, "name"=>"Firstname Lastname 9", "age"=>45],
            ["id"=>10,"name"=>"Firstname Lastname 10","age"=>45],
            ["id"=>11,"name"=>"Firstname Lastname 11","age"=>45],
            ["id"=>12,"name"=>"Firstname Lastname 12","age"=>45],
            ["id"=>12,"name"=>"Firstname Lastname 13","age"=>45],
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