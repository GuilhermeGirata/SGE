	<?php
	    session_start();
	    
	    if(($_SESSION['login']) != "yes"){
	        //echo"<li><a href='login.php' title='Login'>Login</a></li>"; 
	        $_SESSION['login'] = "NO";
	        header("Location: login_sg.php");
	       
	    }
	    date_default_timezone_set('America/Sao_Paulo');
    	$mes_hoje = date("m");
    	$ano_atual = date("Y");
	
	    $sql = "SELECT * FROM tb_clientes ORDER BY razao_social";
	    //$sql_ani = "SELECT * FROM tb_usuarios WHERE MONTH(data_nascimento) = '$mes_hoje'";
		include "conexao.php";
		$contatos  = $fusca -> prepare($sql);
		$contatos -> execute();		
		//$aniv  = $fusca -> prepare($sql_ani);
		//$aniv -> execute();
		$fusca = NULL; 	
		$n_cont = $contatos -> rowCount();
		//$n_aniv = $aniv -> rowCount();
	?>	
<ul class="nav navbar-nav navbar-right">
    <?php
        session_start();
	    
	    if(($_SESSION['perfil']) != 3){
	        //echo"<li><a href='login.php' title='Login'>Login</a></li>";    
	    }
	    
	    if($_SESSION['perfil'] == 3){
	        //echo"<li><a href='../' title='Professor Cezar Jenzura'>PCJ-System</a></li>";
	        //echo"<li><a href='aniversariantes.php' title='Aniversariantes'>Aniversariantes ($n_aniv)</a></li>";
	        //echo"<li><a href='contatos.php' title='Contatos'>Contatos ($n_cont)</a></li>";
	        //echo"<li><a href='contato_inserir.php' title='Adicionar contato'>Add_contato</a></li>";
	    }
	    
	    echo"<li><a href='index.php' title='Vai para a tabela inicial do Sistema Gestor de Clientes (SGC)'>Início</a></li>";
	    echo"<li><a href='cliente_inserir.php' title='Adicionar novo cliente ao SGC'>Adicionar cliente</a></li>";
	    echo"<li><a href='sobre.php' title='Funcionalidades sobre o sistema SGC'>Sobre</a></li>";
	    echo"<li><a href='logout.php' title='Sair do sistema SGC'>Sair</a></li>";
	    
	    if($_SESSION['perfil'] == 3){
	        echo"<li><a href='logout.php' title='Sair'>Sair</a></li>";   
	    }
	?>
</ul>