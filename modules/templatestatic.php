<?php
require_once("modules/home.php");                                                                      

    class templatestatic extends home                                                                             
    {              

		function main()
		{
			@session_start();
                        
			if($_SESSION['id'] != $_SESSION['boss'])
			$this->valida_privilegios();
         
                     $_SESSION['page_title'] = "Nome da Página";
			
			$db = new db();
			$db1 = new db();
			$db2 = new db();
			$db3 = new db();
			$db4 = new db();

			$sql = "SELECT
					usuarios.id as id
					, usuarios.nome
					, usuarios.email
					, usuarios_grupos.id_grupo as id_grupo
				FROM
					usuarios,
					usuarios_grupos
				WHERE usuarios.id = usuarios_grupos.id_usuario
            AND usuarios.usuario_master = ".$_SESSION['boss']."
            ORDER BY usuarios.nome ASC";
				
			$db->query($sql,__LINE__,__FILE__);
			$db->next_record();
			

			for($i = 0; $i < $db->num_rows(); $i++)
			{
				$id_usuario = $db->f("id");			
				$nome = $db->f("nome");			
				$email = $db->f("email");
                            $idGrupo = $db->f("id_grupo");
				
				$sql2 = "SELECT nome FROM grupos WHERE id = ".$idGrupo." ";
            $db2->query($sql2,__LINE__,__FILE__);
            $db2->next_record();
            $grupo = $db2->f("nome");
            
            
				$listagem .= '<tr> 
                                                         <td>'.$nome.'</td>
                                                         <td>'.$email.'</td>
                                                         <td>'.$grupo.'</td> 
                                                         <td><a href="index.php?module=usuarios&method=edita&id='.$db->f("id").'" >Edit</a></td>
                                                         <td><a href="index.php?module=usuarios&method=exclui&id='.$db->f("id").'" onclick="return(confirm(\'Confirm delete user '.$db->f("nome").' ? \'))">Excluir</a></td>										
                                                </tr>';
				
				
				
				
				$db->next_record();
			}
      

		$this->cabecalho();                                                                            
		$GLOBALS["base"]->template = new template();       
		
		$GLOBALS["base"]->template->set_var("listagem",$listagem);
													
		$GLOBALS["base"]->write_design_specific('templatestatic.tpl' , 'main');                       
		$GLOBALS["base"]->template = new template();                                                  
		$this->footer();                                                                           

			
		}
      
      
      function novo()
      {
         
		@session_start();
		$db = new db();
		$db1 = new db();
		$db2 = new db();
		$db3 = new db();
		$db4 = new db();

			if($_SESSION['id'] != $_SESSION['boss'])
                         $this->valida_privilegios();


               	$sql = "SELECT * FROM grupos ORDER BY nome ASC";
			$db->query($sql,__LINE__,__FILE__);
			$db->next_record();
			for($l = 0; $l < $db->num_rows(); $l++)
			{
                           $listagem_grupos .= '<option value="'.$db->f("id").'" ';
                           $listagem_grupos .= '>'.$db->f("nome").'</option>';           

                           $db->next_record();
                        }



		$this->cabecalho();                                                                            
		$GLOBALS["base"]->template = new template();       
		$GLOBALS["base"]->template->set_var('listagem_grupos',$listagem_grupos);
		$GLOBALS["base"]->template->set_var('BTN_SALVAR' , BTN_SALVAR);
		$GLOBALS["base"]->template->set_var('BTN_CANCELAR' , BTN_CANCELAR);  
		$GLOBALS["base"]->write_design_specific('templatestatic.tpl' , 'novo');                                            
		$GLOBALS["base"]->template = new template();                                                  
		$this->footer();                                                                               
		
      }
      
      function edita()
      {
			@session_start();
			$db = new db();
			$db1 = new db();
			$db2 = new db();
			$db3 = new db();
			$db4 = new db();

			if($_SESSION['id'] != $_SESSION['boss'])
                        $this->valida_privilegios();
                        
                        
			$id = $this->blockrequest($_REQUEST['id']);	
			

			$sql = "SELECT nome 
                                   FROM usuarios
					WHERE id = ".$id."
               AND usuarios.usuario_master = ".$_SESSION['boss']." ";
                        
			$db->query($sql,__LINE__,__FILE__);
			$db->next_record();
			
			$nome = $db->f("nome");
			$email = $db->f("email");
			$senha = $db->f("senha");
			$telefone = $db->f("telefone");

         
                     $sql4 = "SELECT id_grupo FROM usuarios_grupos WHERE id_usuario = ".$id." ";
			$db4->query($sql4,__LINE__,__FILE__);
			$db4->next_record();
         
                     $grupo = $db4->f("id_grupo");
			
			$sql = "SELECT * FROM grupos ORDER BY nome ASC";
			$db->query($sql,__LINE__,__FILE__);
			$db->next_record();
			for($l = 0; $l < $db->num_rows(); $l++)
			{
                           $listagem_grupos .= '<option value="'.$db->f("id").'" ';

                        if($db->f("id") == $grupo)
                           $listagem_grupos .= 'selected="selected" ';

                        $listagem_grupos .= '>'.$db->f("nome").'</option>';           

                        $db->next_record();
                  }


      
      
			$this->cabecalho();                                                                            
			$GLOBALS["base"]->template = new template();       

			$GLOBALS["base"]->template->set_var('BTN_SALVAR' , BTN_SALVAR);
			$GLOBALS["base"]->template->set_var('BTN_CANCELAR' , BTN_CANCELAR);  
			$GLOBALS["base"]->template->set_var("nome",$nome);
			$GLOBALS["base"]->template->set_var("listagem_grupos",$listagem_grupos);
			$GLOBALS["base"]->template->set_var("id",$id);


                     $GLOBALS["base"]->write_design_specific('templatestatic.tpl' , 'edita');                       
			$GLOBALS["base"]->template = new template();                                                  
			$this->footer();                                                                               
         
      }
      
      
	function insere()
	{
		@session_start();
		$db = new db();

                
		$db = new db();
		$db1 = new db();
		$db2 = new db();
		$db3 = new db();
		$db4 = new db();
	
		$nome = $this->blockrequest($_REQUEST['nome']);

	   
               $sql = "INSERT INTO ";
               $db->query($sql,__LINE__,__FILE__);
               $db->next_record();

               $id_registro = $db->get_last_insert_id("TABELA","id");


               $this->dolog("LOG DE REGISTRO");

              $this->notificacao("NOTIFICAÇÃO DE INFORMAÇÃO A EXIBIR.", "green");
              header("Location: ".ABS_LINK."modulor/metodo");	

	   }
      
	function update()
	{
		@session_start();
		$db = new db();

                
		$db = new db();
		$db1 = new db();
		$db2 = new db();
		$db3 = new db();
		$db4 = new db();
	
		$nome = $this->blockrequest($_REQUEST['nome']);

	   
               $sql = "UPDATE tabela SET  ";
               $db->query($sql,__LINE__,__FILE__);
               $db->next_record();


               $this->dolog("LOG DE REGISTRO");

              $this->notificacao("NOTIFICAÇÃO DE INFORMAÇÃO A EXIBIR.", "green");
              header("Location: ".ABS_LINK."modulor/metodo");	

	   }
      

}                                                                                                     





?>