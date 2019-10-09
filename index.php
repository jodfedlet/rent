<?php include "includes/cabecalho.php"; ?>
	<!-- area central com 3 colunas -->
	<div class="container">
	<?php include "includes/menu_lateral.php"; ?>	
		<section class="col-2">
			<?php	
            require_once "classes/Produto.php";
            $produto = new Produto();

            // controller
            if(isset($_GET['busca'])){
              $lista = $produto->filtroBusca($_GET['busca']);
              $titulo = 
              "Resultado da busca por \"{$_GET['busca']}\" ";
            }
            else{
              $lista = $produto->filtroNovidades();
              $titulo = "Novidades";
            }

           // echo "<pre>";
           // print_r($lista);
           // echo "</pre>";
            require_once "views/listaProdutos.php";

            ?>
					
		</section>
        <?php include "includes/mais_vendidos.php"; ?>
	</div>
	<!-- fim area central -->
	<?php include "includes/rodape.php"; ?>
