<!DOCTYPE html>
<?php
        $id = $_GET['id'];
        include "conexao.php";		
		$sql2      = "
						SELECT * FROM tb_categorias
						WHERE
						id_categoria = '$id'
					"; 
		$categ  = $fusca -> prepare($sql2);
		$categ -> execute();
		$fusca = null;
		
		foreach($categ as $p){
			$id_categoria   = $p['id_categoria'];
			$desc_categoria = $p['cat_desc'];
			$obs_categoria  = $p['cat_obs'];
		}	
		//======= Alteração ===============================
		if(ISSET($_POST['alterar'])){
		    date_default_timezone_set('America/Sao_Paulo');
	        $data_hoje   = date("Y-m-d H:i");		    
		    $categoria   = $_POST['descricao_categ'];
		    $observacao  = $_POST['obs'];
		    		    
		    $sql = "UPDATE tb_categorias
		            SET 
		            cat_desc       = '$categoria',       
		            cat_obs        = '$observacao',
		            data_alteracao = '$data_hoje'
		            WHERE 
		            id_categoria   = '$id'";
		    include "conexao.php";
		    $prod2  = $fusca -> prepare($sql);
		    $prod2 -> execute();
		    $fusca = NULL;
		   
		    echo "
		        <script>
		            alert('Categoria alterada com sucesso!');
		            window.location.href='categorias.php';
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
        <title>Editar categoria</title>
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
                        <h3 class="mt-4">Editar categoria: <?php echo $codigo;?></h3>
                       <hr>                            
                    			
			<form method="POST" action="">
    			<div class="form-row">
					<div class="form-group col-md-12">
						<label for="inputPassword4">Descrição:</label>
						<input type="text" name='descricao_categ' class="form-control" value='<?php echo $desc_categoria; ?>'>
					</div>
					
					
				</div>
				<div class="form-row">
					<div class="form-group col-md-12">
    					    <label for="inputAddress">Observação:</label>
    					    <textarea class="form-control" name='obs'><?php echo $obs_categoria; ?></textarea>
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
