<!DOCTYPE html>
<html lang="pt-br">
    <?php
		$id = $_GET['id'];
		$sql = "SELECT * FROM tb_usuarios WHERE userId = '$id'"; 
		include "conexao.php";
		$user  = $fusca -> prepare($sql);
		$user -> execute();
		$fusca = NULL;
		foreach($user as $u){
			$nomeUsuario   = $u['nomeUsuario'];
			$emailUsuario  = $u['emailUsuario'];
			$celUsuario    = $u['celUsuario'];
			$perfilUsuario = $u['perfilUsuario'];
			$obsUsuario    = $u['obsUsuario'];
		}
		
		if(ISSET($_POST['salvar'])){
		    date_default_timezone_set('America/Sao_Paulo');
	        $data_hoje  = date("Y-m-d H:i");
	        session_start();
	        $id_usuario = $_SESSION['idUsuario']; 
		    $nome     = $_POST['nome'];
		    $email    = $_POST['email'];
			$celular  = $_POST['celular'];
		    $perfil   = $_POST['perfil'];
		    $obs      = $_POST['obs'];
		    
		    $sql = "UPDATE tb_usuarios
		            SET 
		            nomeUsuario   = '$nome',
		            emailUsuario  = '$email',
		            celUsuario    = '$celular',
		            perfilUsuario = '$perfil',
		            obsUsuario    = '$obs'	            
		            WHERE 
		            userId        = '$id'";
		    include "conexao.php";
		    $userEdit  = $fusca -> prepare($sql);
		    $userEdit -> execute();
		    $fusca = NULL;
		   
		    echo "
		        <script>
		            alert('Usuário alterado com sucesso!');
		            window.location.href='usuarios.php';
		        </script>
		    ";			
		}
	?>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Usuário - Editar</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
        <link rel="shortcut icon" type="image/png" href="imagens/icon1.png">
        <script>
			function mascara(o,f){
				v_obj=o
				v_fun=f
				setTimeout("execmascara()",1)
			}
			function execmascara(){
				v_obj.value=v_fun(v_obj.value)
			}
			function mtel(v){
				v=v.replace(/\D/g,"");             //Remove tudo o que não é dígito
				v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
				v=v.replace(/(\d)(\d{4})$/,"$1-$2");    //Coloca hífen entre o quarto e o quinto dígitos
				return v;
			}
			function id( el ){
				return document.getElementById( el );
			}
			window.onload = function(){
				id('telefone').onkeypress = function(){
					mascara( this, mtel );
				}
			}		
		</script>
    </head>
    <body class="sb-nav-fixed">
        <?php include "menu_superior.php"; ?>
        <div id="layoutSidenav">
            <?php include "menu_lateral.php"; ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h3 class="mt-4">Editar usuário</h3>                        
                        <hr>
                        <div class="row">
                            	<div class="container">
			<form method="POST" action="">
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="inputEmail4">Nome*:</label>
						<input type="text" name='nome' value="<?php echo $nomeUsuario; ?>" class="form-control" required>
					</div>
					<div class="form-group col-md-6">
						<label for="inputPassword4">E-mail*:</label>
						<input type="text" name='email' value="<?php echo $emailUsuario; ?>" class="form-control" id="email" required>
					</div>
					
				</div>	
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="inputPassword4">Celular:</label>
						<input type="phone" name='celular'  value="<?php echo $celUsuario; ?>" id="telefone" maxlength="15" class="form-control">
					</div>
					<div class="form-group col-md-6">
						<label for="inputPassword4">Perfil*:</label>
						<select name="perfil" class="form-control">
						    <?php
								if($perfilUsuario == "3"){
									echo "
										<option value='3' selected>Administrador</option>
										<option value='1'>Colaborador</option>
									";
								}
								else{
									echo "
										<option value='3'>Administrador</option>
										<option value='1' selected>Colaborador</option>
									";
								}
							?>
						</select>						
					</div>					
				</div>	
				<div class="form-row">
					<div class="form-group col-md-12">
    					<label for="inputAddress">Observação:</label>
    					<textarea class="form-control" name='obs'><?php echo $obsUsuario; ?></textarea>
				    </div>
				</div>				
				<input type='submit' class="btn btn-primary" value='Salvar' name='salvar'>
				<input type='button' class="btn btn-primary" value='Voltar' onclick='window.history.back();'>
				<br><br>
			</form>
		</div>
                            
                        </div>
                      
                       
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
