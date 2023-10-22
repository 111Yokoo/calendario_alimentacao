<?php
$autoridade = $_GET['autoridade'];
$erro = '';
if(isset($_GET['erro'])){
    $erro = $_GET['erro'];
}
include_once ("Layouts/header.php");
?>
<!--CSS-->
<link rel="stylesheet" href="css/style_app.css">
<!--JS-->
<script src="js/script_cardapio.js"></script>
<!--JS-->

    <section id="aviso"></section>
    <section id="erro">
        <?php
                if(isset($erro)){
            ?>
        <article id="erroMessage" class="bg-danger d-flex justify-content-center">
            <?php
                if($erro == 'faltou_info_data'){
            ?>
                <p class="text-light"><strong>É necessário inserir as datas de inicio e término da semana!</strong></p>
            <?php
                }
            ?>

            <?php
                if($erro == 'faltou_info_cardapio'){
            ?>
                <p class="text-light"><strong>É necessário inserir ao menos uma refeção no dia!</strong></p>
            <?php
                }
            ?>

            <?php
                if($erro == 'dia_repetido'){
            ?>
                <p class="text-light"><strong>O dia inserido já tem um cardápio definido!</strong></p>
            <?php
                }
            ?>
        </article>
        <?php
                }
        ?>
    </section>

    <main class="container" id="cardapios">
        <section class="row">
            <form action="Controller/adicionarCardapio.php?autoridade=<?= $autoridade ?>" method="post" class="d-flex">
                <article class="col-4 form-group">
                    <aside class="form-group">
                        <label for="data_inicial">Insira a data do primeiro dia da semana:</label>
                        <br>
                        <input type="date" name="data_inicial" id="data_inicial">
                    </aside>
                    <br>
                    <aside class="form-group">
                        <label for="data_final">Insira a data do último dia da semana:</label>
                        <br>
                        <input type="date" name="data_final" id="data_final">
                    </aside>
                    <br><br>
                    <aside>
                        <p>Ao inserir os cadápios utilize vírgulas e quebras de linhas.</p>
                    </aside>
                </article>
                <article class="col-6">
                    <aside class="form-group">
                        <label for="data_dia">Insira a data do dia:</label>
                        <br>
                        <input type="date" name="data_dia" id="data_dia">
                    </aside>
                    <br>
                    <aside class="form-group">
                        <label for="lanche">Insira o lanche da manhã:</label>
                        <br>
                        <textarea name="lanche_manha" id="lanche_manha" cols="50"></textarea>
                    </aside>
                    <br>
                    <aside class="form-group">
                        <label for="almoco">Insira o Almoço:</label>
                        <br>
                        <textarea name="almoco" id="almoco" cols="50"></textarea>
                    </aside>
                    <br>
                    <aside class="form-group">
                        <label for="lanche_tarde">Insira o lanche da tarde:</label>
                        <br>
                        <textarea name="lanche_tarde" id="lanche_tarde" cols="50"></textarea>
                    </aside>
                </article>
                <article class="col-2 d-flex align-items-end">
                    <input type="submit" value="Adicionar" class="btn btn-outline-dark">
                </article>
            </form>
        </section>
    </main>
</body>
</html>