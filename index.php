<?php

    require_once './model/LivroModel.php';

    use Alisson\model\LivroModel;

    $livro = new LivroModel(1, "NomeLivro", "AutorLivro", true, date("2014/05/02"), date("2014/05/10"));

    var_dump($livro);