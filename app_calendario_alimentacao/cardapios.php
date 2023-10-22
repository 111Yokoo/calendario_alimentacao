<?php
$autoridade = $_GET['autoridade'];
require 'Controller/mostrarCardapio.php';
include_once ("Layouts/header.php");
?>
<!--JS-->
<script>
    function remover(id, autoridade){
        location.href = 'Controller/mostrarCardapio.php?autoridade='+autoridade+'&acao=remover&id='+id;
    }
</script>
<!--JS-->
<script src="js/script_cardapio.js"></script>
<!--JS-->

    <section id="aviso"></section>

    <main class="container">
        <section>
            <ul class="list-group">
            <li class="list-group-item row d-flex">
                    <article class="col-10">
                        <p class="row">
                            <span class="col-2"><strong>Começo da semana</strong></span>
                            <span class="col-2"><strong>Final da semana</strong></span>
                            <span class="col-2"><strong>Dia da semana</strong></span>
                            <span class="col-2">Cardápio da manhã</span>
                            <span class="col-2">Cardápio do almoço</span>
                            <span class="col-2">Cardápio da tarde</span>
                        </p>
                    </article>
                    <article class="col-2 d-flex justify-content-center">
                        <strong>Excluir cardápio</strong>
                    </article>
            </li>
                <?php
                    foreach($cardapioDiario as $id){
                ?>
                <li class="list-group-item row d-flex">
                    <article class="col-10">
                        <p class="row">
                            <span class="col-2"><strong><?= $id->dia_inicial ?></strong></span>
                            <span class="col-2"><strong><?= $id->dia_final ?></strong></span>
                            <span class="col-2"><strong><?= $id->dia_cardapio ?></strong></span>
                            <span class="col-2"><?= $id->cardapio_manha ?></span>
                            <span class="col-2"><?= $id->cardapio_almoco ?></span>
                            <span class="col-2"><?= $id->cardapio_tarde ?></span>
                        </p>
                    </article>
                    <article class="col-2 d-flex justify-content-center">
                    <button class="btn btn-outline-danger" id="btn-remove" onclick="remover(<?= $id->id_cardapio ?>, '<?= $autoridade ?>')">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                    </article>
                </li>
                <?php
                    }
                ?>
            </ul>
        </section>
    </main>
</body>
</html>