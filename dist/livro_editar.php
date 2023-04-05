<!DOCTYPE html>
<?php
        $id = $_GET['id'];
        include "conexao.php";		
		$sql2      = "
						SELECT * FROM tb_livros
						INNER JOIN
						tb_categorias
						ON tb_livros.fk_categoria = tb_categorias.id_categoria
						WHERE
						id_livro = '$id'
					"; 
		$livros  = $fusca -> prepare($sql2);
		$livros -> execute();
		$fusca = null;
		
		//============== Categorias ====================================
		include "conexao.php";		
		$sql2      = "SELECT * FROM tb_categorias ORDER BY cat_desc ASC"; 
		$categorias  = $fusca -> prepare($sql2);
		$categorias -> execute();
		$fusca = null;
		
		
		foreach($livros as $p){
			$id_categoria   = $p['id_categoria'];
			$desc_categoria = $p['cat_desc'];
			$titulo         = $p['titulo'];
			$autor          = $p['autor'];
			$editora        = $p['editora'];
			$publicacao     = $p['ano_publicacao'];
			$codigo         = $p['cod_interno'];
			$isbn           = $p['isbn'];
			$localizacao    = $p['localizacao'];
			$quantidade     = $p['quantidade'];
			$observacao     = $p['observacao'];
		}	
		//======= Alteração ===============================
		if(ISSET($_POST['alterar'])){
		    date_default_timezone_set('America/Sao_Paulo');
	        $data_hoje   = date("Y-m-d H:i");		    
		    $categoria   = $_POST['categoria'];
		    $titulo      = $_POST['titulo'];
		    $autor       = $_POST['autor']; 
		    $editora     = $_POST['editora'];			
		    $publicacao  = $_POST['publicacao'];
		    $codigo      = $_POST['codigo'];
		    $isbn        = $_POST['isbn'];
		    $localizacao = $_POST['localizacao'];
		    $quantidade  = $_POST['quantidade'];
		    $observacao  = $_POST['obs'];
		    		    
		    $sql = "UPDATE tb_livros
		            SET 
		            fk_categoria   = '$categoria',
		            titulo         = '$titulo',       
		            autor          = '$autor',
		            editora        = '$editora',
		            ano_publicacao = '$publicacao',
		            localizacao    = '$localizacao',
		            cod_interno    = '$codigo',
		            isbn           = '0',
		            quantidade     = 1,
		            observacao     = '$observacao',
		            data_alteracao = '$data_hoje'
		            WHERE 
		            id_livro       = '$id'";
		    include "conexao.php";
		    $prod2  = $fusca -> prepare($sql);
		    $prod2 -> execute();
		    $fusca = NULL;
		   
		    echo "
		        <script>
		            alert('Livro alterado com sucesso!');
		            window.location.href='livros.php';
		        </script>
		    ";
		}
	?>	
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Editar livro</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
        <link rel="shortcut icon" type="image/png" href="imagens/book_open.png"> 
        
		
    </head>
    <body class="sb-nav-fixed">
        <?php include "menu_superior.php"; ?>
        <div id="layoutSidenav">
            <?php include "menu_lateral.php"; ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h3 class="mt-4">Editar livro cód: <?php echo $codigo;?></h3>
                       <hr>                            
                    			
			<form method="POST" action="">
    			<div class="form-row">
					<!--<div class="form-group col-md-1">
						<!--<label for="inputEmail4">Código:</label>-->
						<input type="hidden" name='codigo' class="form-control" value='<?php echo $id_prod; ?>'>
					<!--</div>-->
					<div class="form-group col-md-5">
						<label for="inputPassword4">Categoria:</label>
						<select name="categoria" class="form-control" id="local" required>
							
							<?php
								echo "<option value=".$id_categoria.">".$desc_categoria."</option>";
								echo "<option>--------------------------</option>";
								foreach($categorias as $l){
									$idCat  = $l['id_categoria'];
									$desc = $l['cat_desc'];
									echo "
										<option value=".$idCat.">".$desc."</option>
									";
								}
							?>
						</select>
					</div>
					
					<div class="form-group col-md-7">
						<label for="inputPassword4">Título:</label>
						<input type="text" name='titulo' class="form-control" value='<?php echo $titulo; ?>'>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="inputPassword4">Autor:</label>
						<input type="text" name='autor' class="form-control" value='<?php echo $autor; ?>'>
					</div>
					<div class="form-group col-md-4">
						<label for="inputPassword4">Editora:</label>
						<input type="text" name='editora' class="form-control" value='<?php echo $editora; ?>'>
					</div>
					<div class="form-group col-md-2">
						<label for="inputPassword4">Ano de publicação:</label>
						<input type="text" name='publicacao' class="form-control" value='<?php echo $publicacao; ?>'>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-3">
						<label for="inputPassword4">Código:</label>
						<input type="text" name='codigo' class="form-control" value='<?php echo $codigo; ?>'>
					</div>
					<!--
					<div class="form-group col-md-3">
						<label for="inputPassword4">ISBN:</label>
						<input type="text" name='isbn' class="form-control" value='<?php echo $isbn; ?>'>
					</div>
					-->
					<div class="form-group col-md-3">
						<label for="inputPassword4">Localização:</label>
						<select name="localizacao" class="form-control">
							<option value='<?php echo $localizacao; ?>'><?php echo $localizacao; ?></option>
							<option value=''>---------------</option>
							<?php include "prateleiras.html"?>
						</select>
						<!--<input type="text" name='localizacao' class="form-control" value=''>-->
					</div>
					<!--
					<div class="form-group col-md-2">
						<label for="inputPassword4">Quantidade:</label>
						<input type="number" name='quantidade' class="form-control" value='<?php echo $quantidade; ?>'>
					</div>
					-->
					<div class="form-group col-md-6">
    					    <label for="inputAddress">Observação:</label>
    					    <textarea class="form-control" name='obs'><?php echo $observacao; ?></textarea>
    				</div>
				</div>
				
				<input type='submit' class="btn btn-primary" value='Salvar' name='alterar'>
				<input type='button' class="btn btn-primary" value='Voltar' onclick='window.history.back();'>
				<br><br>
			</form>
                    </div>
                </main>
                <?php include "rodape.php"; ?>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>
