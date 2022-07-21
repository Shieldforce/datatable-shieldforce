<?php
$autoloadPath = __DIR__."/../vendor/autoload.php";
require($autoloadPath);

// Array de data simulado para exemplo
$list = [];
for ($i=1;$i<=50000;$i++) {
    $age = rand(10, 80);
    $list[$i] = ["id"=>"{$i}", "name"=>"Firstname Lastname {$i}", "age"=>"{$age}"];
}

// Monta e rendeniza o resultado da datatable
echo \Shieldforce\Backend\DatatableReturn::baseReturn($_POST, $list, function ($nestedData, $col, $r){

    // Configura as colunas de retorno com opção de criar lógica customizada!
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

    // Retorna as colunas de resultado
    return $nestedData;
});

?>
