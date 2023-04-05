<!DOCTYPE html>
<?php
        $id = $_GET['id'];
        include "conexao.php";		
		$sql2      = "
						SELECT * FROM tb_leitores
						WHERE id_leitor= '$id'
					"; 
		$leitore  = $fusca -> prepare($sql2);
		$leitore -> execute();
		$fusca = null;
		
		//============== Categorias ====================================
		include "conexao.php";		
		$sql2      = "SELECT * FROM tb_categorias ORDER BY cat_desc ASC"; 
		$categorias  = $fusca -> prepare($sql2);
		$categorias -> execute();
		$fusca = null;
				
		foreach($leitore as $p){
			$nome       = $p['nome_leitor'];
			$email      = $p['email_leitor'];
			$celular    = $p['celular_leitor'];
			$nascimento = $p['data_nascimento'];
			$perfil_l   = $p['perfil_leitor'];
			$manha      = $p['manha'];
			if($manha == "1"){
				$checked_m = "checked";
			}
			else{
				$checked_m = "";
			}
			$tarde      = $p['tarde'];
			if($tarde == "1"){
				$checked_t = "checked";
			}
			else{
				$checked_t = "";
			}
			$noite      = $p['noite'];
			if($noite == "1"){
				$checked_n = "checked";
			}
			else{
				$checked_n = "";
			}
			$serie         = $p['serie'];
			$observacao    = $p['observacao_leitor'];
		}	
		//======= Alteração ===============================
		if(ISSET($_POST['alterar'])){
		    date_default_timezone_set('America/Sao_Paulo');
	        $data_hoje   = date("Y-m-d H:i");
			session_start();
	        $id_usuario = $_SESSION['idUsuario'];		    
		    $nome       = $_POST['nome'];
		    $email      = $_POST['email'];
		    $celular    = $_POST['celular']; 
		    $nascimento = $_POST['nascimento'];			
		    $perfil     = $_POST['perfil'];
		    $manha      = $_POST['manha'];
		    $tarde      = $_POST['tarde'];
		    $noite      = $_POST['noite'];
		    $serie      = $_POST['serie'];
		    $observacao = $_POST['obs'];
		    		    
		    $sql = "UPDATE tb_leitores
		            SET 
		            nome_leitor       = '$nome',
		            email_leitor      = '$email',       
		            celular_leitor    = '$celular',
		            data_nascimento   = '$nascimento',
		            perfil_leitor     = '$perfil',
		            serie             = '$serie',
		            manha             = '$manha',
		            tarde             = '$tarde',
		            noite             = '$noite',
		            observacao_leitor = '$observacao',
		            data_alteracao    = '$data_hoje',
		            fk_usuario        = '$id_usuario'
		            WHERE 
		            id_leitor         = '$id'";
		    include "conexao.php";
		    $prod2  = $fusca -> prepare($sql);
		    $prod2 -> execute();
		    $fusca = NULL;
		   
		    echo "
		        <script>
		            alert('Leitor alterado com sucesso!');
		            window.location.href='leitores.php';
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
        <title>Editar leitor</title>
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
                        <h3 class="mt-4">Editar leitor: <?php echo $codigo;?></h3>
                       <hr>                            
                    			
			<form method="POST" action="">
    			<div class="form-row">
					<div class="form-group col-md-6">
						<label for="inputPassword4">Nome:</label>
						<input type="text" name='nome' class="form-control" value='<?php echo $nome; ?>'>
					</div>
					
					<div class="form-group col-md-6">
						<label for="inputPassword4">E-mail:</label>
						<input type="text" name='email' class="form-control" value='<?php echo $email; ?>'>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-4">
						<label for="inputPassword4">Celular:</label>
						<input type="text" name='celular' class="form-control" value='<?php echo $celular; ?>'>
					</div>
					<div class="form-group col-md-4">
						<label for="inputPassword4">Nascimento:</label>
						<input type="date" name='nascimento' class="form-control" value='<?php echo $nascimento; ?>'>
					</div>
					<div class="form-group col-md-4">
						<label for="inputPassword4">Perfil:</label>
						<select name="perfil" class="form-control">
							<?php
								echo "<option value=".$perfil_l.">".$perfil_l."</option>";
							?>
							<option value="">---------</option>
							<option value="Professor">Professor</option>
							<option value="Funcionário">Funcionário</option>
							<option value="Aluno">Aluno</option>
							<option value="Outro">Outro</option>
						</select>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-3">
						<label for="inputPassword4">Período:</label><br>
						<div class="form-check form-check-inline">
						  <input class="form-check-input" name="manha" type="checkbox" <?php echo $checked_m;?> id="inlineCheckbox1" value="1">
						  <label class="form-check-label" for="inlineCheckbox1">Manhã</label>
						</div>
						<div class="form-check form-check-inline">
						  <input class="form-check-input" name="tarde" type="checkbox" <?php echo $checked_t;?> id="inlineCheckbox2" value="1">
						  <label class="form-check-label" for="inlineCheckbox2">Tarde</label>
						</div>
						<div class="form-check form-check-inline">
						  <input class="form-check-input"  name="noite" type="checkbox" <?php echo $checked_n;?> id="inlineCheckbox3" value="1">
						  <label class="form-check-label" for="inlineCheckbox3">Noite</label>
						</div>
					</div>
					<div class="form-group col-md-3">
						<label for="inputPassword4">Série:</label>
						<select name="serie" class="form-control">
							<option value='<?php echo $serie; ?>'><?php echo $serie; ?></option>
							<option value=''>---------------</option>
							<option value="Fundamental">Fundamental</option>
							<option value="Médio">Médio</option>
							<option value="Técnico">Técnico</option>
							<option value="Outro">Outro</option>
						</select>
						<!--<input type="text" name='localizacao' class="form-control" value=''>-->
					</div>
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
