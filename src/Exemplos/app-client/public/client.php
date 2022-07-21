<?php
$autoloadPath = __DIR__."/../vendor/autoload.php";
require($autoloadPath);
?>
<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Datatable</title>
    <!-- Responsável por renderizar a chamada do css -->
    <?php echo \Shieldforce\Frontend\CssRender\Ghost::head() ?>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Tabela de teste!</h2>
        <?php
            // Responsável por criar as colunas
            echo \Shieldforce\Backend\DatatableRender::renderHtmlTable([
                [ "name" => "id",     "data" => "id",     "title" => "#",     "class" => 'text-danger', 'width' => '10%', "orderable" => true, ],
                [ "name" => "name",   "data" => "name",   "title" => "Nome",  "class" => 'text-dark',   'width' => '50%', "orderable" => true  ],
                [ "name" => "age",    "data" => "age",    "title" => "Idade", "class" => 'text-dark',   'width' => '20%', "orderable" => true  ],
                [ "name" => "action", "data" => "action", "title" => "Ação",  "class" => 'text-dark',   'width' => '20%', "orderable" => true  ],
            ]);
        ?>
    </div>
    <!-- Responsável por renderizar a chamada do javascript -->
    <?php echo \Shieldforce\Frontend\JsRender\Ghost::js() ?>
    <!-- Responsável por renderizar a lógica do javascript -->
    <?php echo \Shieldforce\Frontend\JsRender\GhostExecution::js("server.php") ?>
</body>
</html>