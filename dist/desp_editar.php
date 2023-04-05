<!DOCTYPE html>
<?php
        $id = $_GET['id'];
        //$sql = "SELECT * FROM tb_despesas WHERE id_despesa='$id'"; 
        $sql = "SELECT * FROM tb_despesas 
                INNER JOIN tb_fornecedores
                ON tb_despesas.fk_fornecedor = tb_fornecedores.id_fornecedor
                WHERE id_despesa='$id'";
        
		include "conexao.php";
		$desp  = $fusca -> prepare($sql);
		$desp -> execute();
		$fusca = NULL;
		foreach($desp as $d){}
        
        //=============Select fornecedores ====================
        $sql = "SELECT * FROM tb_fornecedores ORDER BY nome_fornecedor"; 
		include "conexao.php";
		$fornec  = $fusca -> prepare($sql);
		$fornec -> execute();
		$fusca = NULL;
        //=====================================================
        
        
		if(ISSET($_POST['alterar'])){
		    
		    $id_desp   = $_POST['id_despesa'];
		    $fk_fornec = $_POST['fornecedor'];
		    $descricao = $_POST['descricao'];
		    $d_compra  = $_POST['data_compra'];
		    $d_pgto    = $_POST['data_pgto'];
		    $valor     = $_POST['valor'];
		    $pago      = $_POST['pago']; //Sim/Não
		    $obs       = $_POST['obs'];
		    
		    $sql = "UPDATE tb_despesas 
		            SET 
		            fk_fornecedor     = '$fk_fornec',
		            despesa_descricao = '$descricao',
		            data_compra       = '$d_compra',
		            data_pagamento    = '$d_pgto',
		            despesa_valor     = '$valor',
		            pago              = '$pago',
		            despesa_obs       = '$obs'
		            WHERE 
		            id_despesa        = '$id_desp'";
		    include "conexao.php";
		    $despEdit  = $fusca -> prepare($sql);
		    $despEdit -> execute();
		    $fusca = NULL;
		   
		    echo "
		        <script>
		            alert('Despesa alterada com sucesso!');
		            window.location.href='despesas.php';
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
        <title>Editar despesa</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
        <link rel="shortcut icon" type="image/png" href="imagens/marmita4.png"> 

    </head>
    <body class="sb-nav-fixed">
        <?php include "menu_superior.php"; ?>
        <div id="layoutSidenav">
            <?php include "menu_lateral.php"; ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h3 class="mt-4">Alterar despesa</h3>
                        
                       <hr>
                            
                    			
			<form method="POST" action="">
			    <input type="hidden" name="id_despesa" value='<?php echo $id; ?>'>       
				<div class="form-row">
					<div class="form-group col-md-4">
						<label for="inputEmail4">Fornecedor/Colaborador:</label>
						<select class="form-control" name='fornecedor'>
						    <?php 
						        $fk_fornecedor   = $d['fk_fornecedor'];
						        $nome_fornecedor = $d['nome_fornecedor'];
						        echo "<option value='".$fk_fornecedor."'>".$nome_fornecedor."</option>";
						        echo "<option value=''>---------------------</option>";
						        //========================================
						        foreach($fornec as $f){
						            $fk_fornecedor   = $f['fk_fornecedor'];
    						        $nome_fornecedor = $f['nome_fornecedor'];
    						        echo "<option value='".$fk_fornecedor."'>".$nome_fornecedor."</option>"; 
						        }
						    ;?>
						    
						</select>
					</div>
					<div class="form-group col-md-8">
						<label for="inputPassword4">Descrição:</label>
						<input type="text" name='descricao' class="form-control" value='<?php echo $d['despesa_descricao']; ?>'>
					</div>
				</div>
				
				<div class="form-row">
					
					<div class="form-group col-md-3">
						<label for="inputAddress">Data compra:</label>
						<input type="date" name='data_compra' class="form-control" id="endereco" value='<?php echo $d['data_compra']; ?>'>
					</div>
					<div class="form-group col-md-3">
						<label for="inputAddress">Data pagamento:</label>
						<input type="date" name='data_pgto' class="form-control" id="endereco" value='<?php echo $d['data_pagamento']; ?>'>
					</div>
					<div class="form-group col-md-3">
						<label for="inputAddress">Valor:</label>
						<input type="text" name='valor' class="form-control" id="endereco" value='<?php echo $d['despesa_valor']; ?>'>
					</div>
					<div class="form-group col-md-3">
    					    <label for="inputAddress">Pago:</label>
    					    <select name='pago' class="form-control">
    					       <?php
    					           $pago = $d['pago'];
    					           if($pago == '1'){
    					               echo "<option value='1'>Sim</option>";
    					               echo "<option value='0'>Não</option>";
    					           }
    					           if($pago == '0'){
    					               echo "<option value='0'>Não</option>";
    					               echo "<option value='1'>Sim</option>";
    					           }
    					       ?>
    					    </select>
    				</div>
				</div>
				
				<div class="form-row">
					
				
					<div class="form-group col-md-12">
    					    <label for="inputAddress">Observação:</label>
    					    <textarea class="form-control" name='obs'><?php echo $d['despesa_obs']; ?></textarea>
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
