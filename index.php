<?php
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);


//Autoload
spl_autoload_register(function($class){
    $arquivo = str_replace('\\','/',$class).'.php';
    if(!file_exists($arquivo)){
      throw new Exception("Error Processing Request");
    }
    require_once($arquivo);
});

    $pd = new Model\App\Produto();
    $pd->setId(4);
    $pd->setNome('Antonio');
    $pd->setDescricao('Antonio um programador Jr');

    $pdD = new Model\App\ProdutoDao();
    
    $pdD->update($pd);
    // $pdD->create($pd);
    // $pdD->delete($pd);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD</title>
</head>
    <body>
    <h1>CRUD - 1</h1>
        <p> Um CRUD criado em php, com padrao singleton. </p>
        <p>Nesse CRUD usei a seguintes estrutura: composer e autoload </p>
        <section>
            <div>
                <?php 
                $pdD = new Model\App\ProdutoDao();
                    foreach($pdD->read() as $prod){
                        echo "ID: ".$prod['id']." Nome: ".$prod['nome']."<br>"." Funcao: ".$prod['descricao']."<hr>";
                    }
                
                ?>
            </div>
        </section>
    </body>
</html>