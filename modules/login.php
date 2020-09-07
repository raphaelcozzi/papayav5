<?php

class login
{
	
	/** OS SEGUINTES DADOS DO USUÁRIO SÃO ARMAZENADOS EM SESSÕES:
	*
	*				$_SESSION['logged'] = "43628bbbb8613ac94fd61bd46aab5a45314s";
	*				$_SESSION['id']
	*				$_SESSION['nome']		
	*				$_SESSION['email']
	*				$_SESSION['alert_daily']
	*				$_SESSION['boss']
	*				$_SESSION['lancamentos_lote']		
	*				$_SESSION['grantees']		
	*				$_SESSION['idioma']		
    */
	
	
	function main()
	{
		$db = new db();

		@session_start();


			$sql = "select * from estados";
			$db->query($sql,__LINE__,__FILE__);
			$db->next_record();

			$listagem_estado = "<option value='7' selected>Rio de Janeiro</option>";
			
			for($i = 0; $i < $db->num_rows(); $i++)
			{
				$listagem_estado .= "<option value='".$db->f("id")."' ";
				
				if($db->f("id") == $estado)
					$listagem_estado .= "selected='selected'";
				
				$listagem_estado .= ">".$db->f("estado")."</option>";			
	
				$db->next_record();

			}

	   $sql = "SELECT * FROM cidades WHERE id_estados = 7";
	   $db->query($sql,__LINE__,__FILE__);
	   $db->next_record();
	
	   for($i = 0; $i < $db->num_rows(); $i++)
	   {
		   $listagem_cidade .= "<option value='".$db->f("id")."'>".$db->f("cidade")."</option>";
	
		   $db->next_record();
	
	   }
		   $alertaDisplay = 'hide';
         
         
            $sql = "SELECT * FROM departamentos ORDER BY nome ASC";
            $db->query($sql,__LINE__,__FILE__);
            $db->next_record();

            for($i = 0; $i < $db->num_rows(); $i++)
            {
               $listagem_departamentos .= "<option value='".$db->f("id")."'>".$db->f("nome")."</option>";

               $db->next_record();

            }
         
   		$GLOBALS["base"]->template->set_var('login_field' ,$_REQUEST['login']);
   		$GLOBALS["base"]->template->set_var('senha_field' ,$_REQUEST['senha']);
         

			$GLOBALS["base"]->template->set_var("listagem_departamentos",$listagem_departamentos);
			$GLOBALS["base"]->template->set_var("alertaDisplay",$alertaDisplay);

   		$GLOBALS["base"]->template->set_var('ABS_LINK' ,ABS_LINK);
			$GLOBALS["base"]->template->set_var("TX_ENTRAR",TX_ENTRAR);
			$GLOBALS["base"]->template->set_var("TX_LEMBRAR",TX_LEMBRAR);
			$GLOBALS["base"]->template->set_var("TX_LOGIN",TX_LOGIN);
			$GLOBALS["base"]->template->set_var("TX_ESQUECEU_SENHA",TX_ESQUECEU_SENHA);
			$GLOBALS["base"]->template->set_var("TX_ACESSE_USANDO",TX_ACESSE_USANDO);
			$GLOBALS["base"]->template->set_var("TX_AINDA_NAO_POSSUO_CONTA",TX_AINDA_NAO_POSSUO_CONTA);
			$GLOBALS["base"]->template->set_var("TX_REDEFINIR_SENHA",TX_REDEFINIR_SENHA);
			$GLOBALS["base"]->template->set_var("TX_VOLTAR",TX_VOLTAR);
			$GLOBALS["base"]->template->set_var("TX_ESQUECEU_A_SENHA",TX_ESQUECEU_A_SENHA);
			$GLOBALS["base"]->template->set_var("TITULO_SISTEMA",TITULO_SISTEMA);
			$GLOBALS["base"]->template->set_var("TX_CRIAR_NOVA_CONTA",TX_CRIAR_NOVA_CONTA);
			$GLOBALS["base"]->template->set_var("TX_ENTRE_INFORMACOES",TX_ENTRE_INFORMACOES);
			$GLOBALS["base"]->template->set_var("BTN_SUBMIT",BTN_SUBMIT);
			$GLOBALS["base"]->template->set_var("ANALYTICS",ANALYTICS);
			$GLOBALS["base"]->template->set_var("listagem_cidade",$listagem_cidade);
			$GLOBALS["base"]->template->set_var("listagem_estado",$listagem_estado);
			$GLOBALS["base"]->template->set_var('msg_error' , '');
			$GLOBALS["base"]->write_design_specific('login.tpl' , 'login');


	}
		
	
	function logar()
	{	
		/**
		*	Método principal de login ao sistema
		*/

		$db = new db();
		$db2 = new db();
		$db3 = new db();
		
		@session_start();
		
		$login = $_POST['login'];
		$senha = $_POST['senha'];
		$warehouse = $_POST['warehouse'];
		$id_warehouse_escolhido = $_POST['id_warehouse_escolhido'];
		
		$login = $this->blockrequest($login);
		$senha = $this->blockrequest($senha);	
		$warehouse = $this->blockrequest($warehouse);	
			


            $sql = "SELECT id, nome FROM departamentos ORDER BY nome ASC";
            $db->query($sql,__LINE__,__FILE__);
            $db->next_record();

            for($i = 0; $i < $db->num_rows(); $i++)
            {
               if(isset($_REQUEST['departamento']) && $departamento == $db->f("id"))
               {
                  $_SESSION['departamento'] = $departamento;
                  $_SESSION['id_departamento_escolhido'] = $departamento;
               }
               
               $listagem_departamentos .= "<option value='".$db->f("id")."'>".$db->f("nome")."</option>";

               $db->next_record();

            }
      		$GLOBALS["base"]->template->set_var('listagem_departamentos' ,$listagem_departamentos);

      
                  if($warehouse == "0")
                  {
                     $msg = "Select a Warehouse Station";

                     $GLOBALS["base"]->template->set_var('login_field' ,$_REQUEST['login']);
                     $GLOBALS["base"]->template->set_var('senha_field' ,$_REQUEST['senha']);

                     $GLOBALS["base"]->template->set_var("TX_ENTRAR",TX_ENTRAR);
                     
                     $GLOBALS["base"]->template->set_var("TX_ENTRAR",TX_ENTRAR);
                     $GLOBALS["base"]->template->set_var("TX_LEMBRAR",TX_LEMBRAR);
                     $GLOBALS["base"]->template->set_var("TX_ESQUECEU_SENHA",TX_ESQUECEU_SENHA);
                     $GLOBALS["base"]->template->set_var("TX_VOLTAR",TX_VOLTAR);
                     $GLOBALS["base"]->template->set_var("TX_REDEFINIR_SENHA",TX_REDEFINIR_SENHA);
                     $GLOBALS["base"]->template->set_var("BTN_SUBMIT",BTN_SUBMIT);
                     $GLOBALS["base"]->template->set_var("ANALYTICS",ANALYTICS);
                     $GLOBALS["base"]->template->set_var("TITULO_SISTEMA",TITULO_SISTEMA);
                     
                     $GLOBALS["base"]->template->set_var('msg_error' , $msg);
                     $GLOBALS["base"]->write_design_specific('login.tpl' , 'login');
                     die();
                  }

      
      
		if($_POST['login'] && $_POST['senha'])
		{	
			$sql = "SELECT * FROM usuarios
					WHERE ( email = '".$login."' AND senha = MD5('".$senha."')) AND (status = 1) limit 1";
         
									
			$db->query($sql,__LINE__,__FILE__);
			$db->next_record();
					
			if($db->num_rows() > 0)
			{
					/* Guarda em sessão todos os parâmetros utéis do usuário */
					$_SESSION['logged'] = "43628bbbb8613ac94fd61bd46aab5a45314s";
					$_SESSION['id'] = $db->f("id");		
					$_SESSION['nome'] = $db->f("nome");		
					$_SESSION['email'] = $db->f("email");
					$_SESSION['alert_daily'] = $db->f("alert_daily");		
					$_SESSION['boss'] = $db->f("usuario_master");		
					$_SESSION['idioma'] = $db->f("idioma");		
		
					$_SESSION['eventos_lote'] = "_lote_".$db->f("eventos_lote");
						
					if($db->f("lancamentos_lote") != 1)
						$_SESSION['lancamentos_lote'] = "_lote_".$db->f("lancamentos_lote");
					else
						$_SESSION['lancamentos_lote'] = "";
               
               if(ACTIVE_GRANTEES == 1)
                  $this->gera_permissoes($_SESSION['id']); // Chama a função que define as áreas que o usuário tem acesso.
			

				$GLOBALS["base"]->template->set_var('msg_error' , '');
				

				if($db->f("avatar") == "")
					$avatar = 'http://www.placehold.it/200x200/EFEFEF/AAAAAA&amp;text=sem+imagem';
				else
					$avatar = $db->f("avatar");
					
					/*
					if(date("H") > 00 && date("H") < 12)
						$saudacao = "Bom dia";

					if(date("H") >= 12 && date("H") < 18)
						$saudacao = "Boa tarde";


					if(date("H") >= 18 && date("H") <= 23)
						$saudacao = "Boa noite";
                           */
            
                  $sql2 = "SELECT id_grupo FROM usuarios_grupos WHERE id_usuario = ".$db->f("id")." ";
                  $db2->query($sql2,__LINE__,__FILE__);
                  $db2->next_record();
                  if($db2->f("id_grupo") == 1 || $db2->f("id_grupo") == 2)
                  {
                     $_SESSION['departamentos'] = '';
                     
                        $sql = "SELECT id FROM departamentos";
                        $db->query($sql,__LINE__,__FILE__);
                        $db->next_record();
                        for($i = 0; $i < $db->num_rows(); $i++)
                        {
                           $_SESSION['departamentos'] .= $db->f("id");
                           if($i < ($db->num_rows()-1))
                               $_SESSION['departamentos'] .= ',';
   
                          $db->next_record();
                          
                        }
                     
                  }
            
                 
                  
            
                  $saudacao = "Bem-vindo, ";

				
                  $this->notificacao($saudacao.", ".$_SESSION['nome']." ", "green");
						header("Location: ".ABS_LINK);

			}
		}
			
			$msg = "Incorrect access data.";


			$sql = "select * from estados";
			$db->query($sql,__LINE__,__FILE__);
			$db->next_record();

			$listagem_estado = "<option value='7' selected>Rio de Janeiro</option>";
			
			for($i = 0; $i < $db->num_rows(); $i++)
			{
				$listagem_estado .= "<option value='".$db->f("id")."' ";
				
				if($db->f("id") == $estado)
					$listagem_estado .= "selected='selected'";
				
				$listagem_estado .= ">".$db->f("estado")."</option>";			
	
				$db->next_record();

			}

	   $sql = "SELECT * FROM cidades WHERE id_estados = 7";
	   $db->query($sql,__LINE__,__FILE__);
	   $db->next_record();
	
	   for($i = 0; $i < $db->num_rows(); $i++)
	   {
		   $listagem_cidade .= "<option value='".$db->f("id")."'>".$db->f("cidade")."</option>";
	
		   $db->next_record();
	
	   }
      
   		$GLOBALS["base"]->template->set_var('login_field' ,$_REQUEST['login']);
   		$GLOBALS["base"]->template->set_var('senha_field' ,$_REQUEST['senha']);

   		$GLOBALS["base"]->template->set_var('ABS_LINK' ,ABS_LINK);
			$GLOBALS["base"]->template->set_var("TX_ENTRAR",TX_ENTRAR);
			$GLOBALS["base"]->template->set_var("TX_LEMBRAR",TX_LEMBRAR);
			$GLOBALS["base"]->template->set_var("TX_LOGIN",TX_LOGIN);
			$GLOBALS["base"]->template->set_var("TX_ESQUECEU_SENHA",TX_ESQUECEU_SENHA);
			$GLOBALS["base"]->template->set_var("TX_ACESSE_USANDO",TX_ACESSE_USANDO);
			$GLOBALS["base"]->template->set_var("TX_AINDA_NAO_POSSUO_CONTA",TX_AINDA_NAO_POSSUO_CONTA);
			$GLOBALS["base"]->template->set_var("TX_REDEFINIR_SENHA",TX_REDEFINIR_SENHA);
			$GLOBALS["base"]->template->set_var("TX_VOLTAR",TX_VOLTAR);
			$GLOBALS["base"]->template->set_var("TX_ESQUECEU_A_SENHA",TX_ESQUECEU_A_SENHA);
			$GLOBALS["base"]->template->set_var("TITULO_SISTEMA",TITULO_SISTEMA);
			$GLOBALS["base"]->template->set_var("TX_CRIAR_NOVA_CONTA",TX_CRIAR_NOVA_CONTA);
			$GLOBALS["base"]->template->set_var("TX_ENTRE_INFORMACOES",TX_ENTRE_INFORMACOES);
			$GLOBALS["base"]->template->set_var("BTN_SUBMIT",BTN_SUBMIT);

			$GLOBALS["base"]->template->set_var("alertaDisplay",$alertaDisplay);
			$GLOBALS["base"]->template->set_var("ANALYTICS",ANALYTICS);
			$GLOBALS["base"]->template->set_var("TITULO_SISTEMA",TITULO_SISTEMA);
			$GLOBALS["base"]->template->set_var("listagem_cidade",$listagem_cidade);
			$GLOBALS["base"]->template->set_var("listagem_estado",$listagem_estado);

			$GLOBALS["base"]->template->set_var('msg_error' , $msg);
			$GLOBALS["base"]->write_design_specific('login.tpl' , 'login');

	}
	
			
	function logout()
	{
		@session_start();	

            unset($_SESSION['id']);
            unset($_SESSION['nome']);
            unset($_SESSION['email']);
            unset($_SESSION['logged']);
            unset($_SESSION['alert_daily']);
            unset($_SESSION['boss']);
            unset($_SESSION['idioma']);
            unset($_SESSION['grantees']);
            unset($_SESSION['departamento']);
            unset($_SESSION['id_departamento_escolhido']);

		session_destroy();

		header("Location: ".ABS_LINK."/home");
		
	}

	function check_login()
	{
		@session_start();
		if($_SESSION['id'] == 0 || !$_SESSION['id'])
		{
			header("Location: ".ABS_LINK."login/logout");
		}
		if($_SESSION['logged'] <> "43628bbbb8613ac94fd61bd46aab5a45314s" || !$_SESSION['logged'])
		{
			header("Location: ".ABS_LINK."login");
		}
		
	}
	
		function blockrequest($param)
		{
			/*
				Retira todas as tags html da string;
				Retira qualquer isntrução SQL da string
			*/
			
			$str = strip_tags($param);

			$p1 = str_replace("INSERT"," ",$str);
			$p2 = str_replace("DELETE"," ",$p1);
			$p3 = str_replace("UPDATE"," ",$p2);
			$p4 = str_replace("TRUNCATE"," ",$p3);
			$p5 = str_replace("DUMP"," ",$p4);
			$p6 = str_replace("DROP"," ",$p5);

			$p7 = str_replace("<"," ",$p6);
			$p8 = str_replace(">"," ",$p7);
			$p9 = str_replace("'","/'",$p8);
			$p10 = str_replace("id","",$p9);
			$p11 = str_replace("id","",$p10);
			$p12 = str_replace(" or ","",$p11);
			$p13 = str_replace(" and ","",$p12);
			$p14 = str_replace("<>","",$p13);
			$p15 = str_replace("> 0","",$p14);
			$p15 = str_replace("--","",$p15);

			$str = $p15;
			
			return $str;
		}
		
	function gera_permissoes($func)
	{
		@session_start();
		
		$db = new db();
		
		// GUARDA A SESSÃO COM O ARRAY DE PERMISSÕES DAS ÁREAS DO ADMIN
		// GUARDA A SESSÃO COM O ARRAY DE PERMISSÕES DAS ÁREAS DO ADMIN
		// GUARDA A SESSÃO COM O ARRAY DE PERMISSÕES DAS ÁREAS DO ADMIN

		$sql_privilegios = "SELECT
							id_usuario
							,id_menu
							,allow
						FROM privilegios
						WHERE id_usuario = ".$func." 
						order by id_menu asc";

		$db->query($sql_privilegios,__LINE__,__FILE__);				
		$db->next_record();

		$_SESSION['grantees'] = array();
		
		for($i = 0; $i < $db->num_rows(); $i++)
		{
				
				$_SESSION['grantees']["area_".$db->f("id_menu")] = $db->f("allow");
				
				$db->next_record();
		}
			
								
	}

		function termos()
		{
			
			$GLOBALS["base"]->template->set_var("TX_VOLTAR",TX_VOLTAR);
			$GLOBALS["base"]->template->set_var("ANALYTICS",ANALYTICS);
			$GLOBALS["base"]->template->set_var('msg_error' , '');
			$GLOBALS["base"]->write_design_specific('login.tpl' , 'termos');			
		}
	
         function notificacao($mensagem,$cor)
         {
            $_SESSION['msg'] = array("mensagem"=>$mensagem,"tm"=>$cor,"mt"=>"air");
         }

      
 }

?>