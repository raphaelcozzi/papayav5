<?php 

/*******************************************************************************************************************
*                                                                                                                  *
*		CLASSE PRINCIPAL QUE MONTA O CABEÇALHO E O RODAPE                                                          *
*		TODA CLASSE QUE CONTENHA MÉTODOS QUE EXIBAM UM CONTEUDO NA TELA DEVEM SEGUIR O SEGUINTE PADRÃO:            *
*                                                                                                                  *
*			require_once("modules/home.php");                                                                      *
*		                                                                                                           *
*			class exemplo extends home                                                                             *
*			{                                                                                                      *
*				function main()                                                                                    *
*				{                                                                                                  * 
*					                                                                                               *
*					$this->cabecalho();                                                                            *
*					$GLOBALS["base"]->template = new template();                                                   *
*					echo $GLOBALS["base"]->write_design_specific('exemplo.tpl' , 'exemplo');                       * 
*					$GLOBALS["base"]->template = new template();                                                   *
*					$this->footer();                                                                               *
*				}                                                                                                  * 
*			}                                                                                                      *
*                                                                                                                  *
********************************************************************************************************************/
   require "vendor/autoload.php";         
   
   use Aws\S3\S3Client;
   use Http\Message\Authentication\BasicAuth;
   use Http\Message\Authentication\QueryParam;

class home
{
   
	public function main()
	{
      
        @session_start();
        $db = new db();
        $db2 = new db();
        $db3 = new db();
         
         
        $this->cabecalho();                                                                            
        $GLOBALS["base"]->template = new template();

        $GLOBALS["base"]->write_design_specific('home.tpl' , 'main_home');
        $this->footer();
	}
	
	
	function busca()
	{
		header("Location: home");	
	}
	
   function cabecalho()
	{	
		/* Monta o cabeÃ§alho que serÃ¡ comum em todas as pÃ¡ginas do admin */ 
		@session_start();
		$db = new db();
		
		$sql = "SELECT id FROM usuarios WHERE id = ".$_SESSION['boss']." ";
		$db->query($sql,__LINE__,__FILE__);
		$db->next_record();
		if($db->num_rows() == 0)
		{
			header("Location: ".ABS_LINK."login/logout");
			die();	
		}
		
		
		if(isset($_SESSION['msg']))
      {
         
           @$mensagem = $_SESSION['msg']["mensagem"];
         $tm =  $_SESSION['msg']["tm"];
         $float =  $_SESSION['msg']["float"];
        
            
        if(!$float || $float == "0") // menssagem no topo
        {        
        
            if($tm)
            {
                switch($tm)
                {
                    case "green":
                    $tipo_msg = 'alert alert-success';
                    break;    
    
                    case "red":
                    $tipo_msg = 'alert alert-danger';
                    break;    
    
                    case "yellow":
                    $tipo_msg = 'alert alert-warning ';
                    break;    
    
                    case "blue":
                    $tipo_msg = 'alert alert-info';
                    break;
                    
                    default: $tipo_msg = 'alert alert-info';     
                    
                }
            }
            else
                $tipo_msg = 'alert alert-info';     
            
            
                @$mess = '<div class="'.$tipo_msg.'">
                           <button class="close" data-dismiss="alert"></button>
                           '.$mensagem.'
                        </div> <div class="portlet-body">';
        }

                $GLOBALS["base"]->template->set_var('msg' ,$mess);

            unset($_SESSION['msg']);
      }
      else
                $GLOBALS["base"]->template->set_var('msg' ,'');
		if(USE_AVATAR == 1)
		{
			
			
			$sql = "SELECT avatar FROM usuarios WHERE id = ".$_SESSION['boss']." ";
			$db->query($sql,__LINE__,__FILE__);
			$db->next_record();
			
			if($db->f("avatar") == "")
			$GLOBALS["base"]->template->set_var('avatar' ,'<img src="https://www.placehold.it/40x40/EFEFEF/AAAAAA&amp;text=sem+foto" border="0" >');
			else
			$GLOBALS["base"]->template->set_var('avatar' ,'<img src="'.$db->f("avatar").'" class="img-circle" >');

		}

		$GLOBALS["base"]->template->set_var('usuario_nome' ,$_SESSION['nome']);
		$GLOBALS["base"]->template->set_var('email' ,$_SESSION['email']);
		
		
		/* Define o titulo da pagina que aparece no meio preto no cabeÃ§alho */
		
		if($_REQUEST['module'])
		{
			$linkMenu = "index.php?module=".$_REQUEST['module']."&method=".$_REQUEST['method'];
			
			$sql = "SELECT descricao FROM menu_itens WHERE link LIKE '%".$linkMenu."%' LIMIT 1";
			$db->query($sql,__LINE__,__FILE__);
			$db->next_record();
			if($db->num_rows() > 0)
				$page_title = $db->f("descricao");
			else
			{
				if($_REQUEST['module'] == "home" && $_REQUEST['method'] == "main")
					$page_title = PAGINA_INICIAL;
				else
					$page_title = "";
			}
		}
		else
		{
			$page_title = "";
		}


		$GLOBALS["base"]->template->set_var('ABS_LINK' ,ABS_LINK);
		$GLOBALS["base"]->template->set_var('TITULO_SISTEMA' ,TITULO_SISTEMA." - ".utf8_encode($page_title));
		$GLOBALS["base"]->template->set_var('page_title' ,utf8_encode($page_title));
		$GLOBALS["base"]->template->set_var('module_busca' ,$_REQUEST['module']);


		if($_REQUEST['q'])
			$q = $_REQUEST['q'];
		else
			$q = "Buscar";
				
		$GLOBALS["base"]->template->set_var('q', $q);

		$this->breadcrumbs();
		
		$this->monta_menu();

		$this->notifications($_SESSION['id']);

		echo $GLOBALS["base"]->write_design_specific('home.tpl' , 'cabecalho');
	}
	
	function footer()
	{
      
		$db = new db();


		$sql = "SELECT id, descricao FROM ca_volumes_types ORDER BY descricao ASC";
		$db->query($sql,__LINE__,__FILE__);
		$db->next_record();
		for($i = 0; $i < $db->num_rows(); $i++)
		{
                  $listagem_volumes_types .= '<option value="'.$db->f("id").'" ';
                  
                  if($db->f("id") == 6)
                     $listagem_volumes_types .= ' selected="selected" ';

                  $listagem_volumes_types .= '>'.$db->f("descricao").'</option>';
         
   		$db->next_record();
      }
      
      
      $javascript_charts = 'jQuery(document).ready(function () {ChartsAmcharts.init()});';
      
      
      if($_REQUEST["module"] == "home")
         $GLOBALS["base"]->template->set_var('init_charts' ,$javascript_charts);
      else
         $GLOBALS["base"]->template->set_var('init_charts' ,'');
      
		$GLOBALS["base"]->template->set_var('listagem_volumes_types' ,$listagem_volumes_types);
      
      
      if($_REQUEST["method"] == "step5view")
      {
         $js_signature = '<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.0/jquery-ui.min.js"></script>';
         
         
         $js_signature2 = "$(function() {
	$('#sig').signature();

	$('#sig').signature({guideline: true});
	
	
	$('#clear').click(function() {
		$('#sig').signature('clear');
		return false;
	});
	
	$('#svg').click(function() {
		
		var assinatura = $('#sig').signature('toSVG');

		var tem = assinatura.search('polyline');
		if(tem == -1)
		{
			alert(\"Preencha com sua assinatura.\");
			return false;
		}
		else
		{
			document.assinatura.submit();
			return false;	
		}
		
	});
	
});";
         
      }
      else
      {
         $js_signature2 = "";
         $js_signature = "";
      }
      
      $GLOBALS["base"]->template->set_var('js_signature' ,$js_signature);
      $GLOBALS["base"]->template->set_var('js_signature2' ,$js_signature2);
      $GLOBALS["base"]->template->set_var('avatarsJs2' ,$_SESSION['avatarsJs2']);
      $GLOBALS["base"]->template->set_var('msg2' ,"");

		$GLOBALS["base"]->template->set_var('msg_error' ,"");


		$GLOBALS["base"]->template->set_var('TITULO_SISTEMA' ,TITULO_SISTEMA);

		echo '<script language="javascript">document.getElementById("overover").style.display="none";</script>';

		echo $GLOBALS["base"]->write_design_specific('home.tpl' , 'footer');
	}

		
		/* MÉTODOS DE TRATAMENTO DE MOEDAS */
		/* MÉTODOS DE TRATAMENTO DE MOEDAS */
		/* MÉTODOS DE TRATAMENTO DE MOEDAS */
		/* MÉTODOS DE TRATAMENTO DE MOEDAS */
		
		function decimal_to_brasil_real($valor)
		{
			/* ESPERA RECEBER O FORMATO 1000.00 
				
				Converte valor de decimal (15,2) com duas casas decimais para o formato de moeda Real do Brasil (R$)
			
			*/

			$valor = number_format($valor,2);
			$valor = str_replace(",",".",$valor);
			$valor = substr($valor,0,(strlen($valor)-3)).str_replace(".",",",substr($valor,(strlen($valor)-3),1)).substr($valor,(strlen($valor)-2),2);

			return $valor;	
		}
		
		function real_brasil_to_decimal($valor)
		{
			
			/*
				ESPERA RECEBER O FORMATO 1.000,00
				
				Converte valor em real do Brasil para decimal (15,2) com duas casas decimais
			*/
			
			$v = str_replace(".","",$valor);
			$v = str_replace(",",".",$v);
			
			return $v;			
		}

		function diasemana($data) 
		{
				
			/* $data DD/MM/YYYY */	
			
			$ano =  substr("$data", 6, 4);
			$mes =  substr("$data", 4, 2);
			$dia =  substr("$data", 0, 2);
		
			$diasemana = date("w", mktime(0,0,0,$mes,$dia,$ano) );
		
			switch($diasemana) 
			{
				case"0": $diasemana = "Domingo";       break;
				case"1": $diasemana = "Segunda-feira"; break;
				case"2": $diasemana = "Terca-feira";   break;
				case"3": $diasemana = "Quarta-feira";  break;
				case"4": $diasemana = "Quinta-feira";  break;
				case"5": $diasemana = "Sexta-feira";   break;
				case"6": $diasemana = "S&aacute;bado";        break;
			}
		
		
			return $diasemana;
			//echo "$diasemana";
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
			$p6 = str_replace("SELECT"," ",$p6);

			$p7 = str_replace("<"," ",$p6);
			$p8 = str_replace(">"," ",$p7);
			$p9 = str_replace("'","",$p8);
			$p10 = str_replace(" id ","",$p9);
			$p11 = str_replace("id>","",$p10);
			$p12 = str_replace(" or ","",$p11);
			$p13 = str_replace(" and ","",$p12);
			$p14 = str_replace("<>","",$p13);
			$p15 = str_replace("> 0","",$p14);
			$p15 = str_replace("--","",$p15);

			$str = $p15;
			
			return $str;
		}
		
		function dolog($acao)
		{
			@session_start();
			$db = new db();

			$sql = "INSERT INTO log (id_usuario, acao, data) VALUES (".$_SESSION['id'].", '".$acao."', NOW())";			
			$db->query($sql,__LINE__,__FILE__);
			$db->next_record();
		}
		
		
		function breadcrumbs()
		{
			@session_start();
			$db = new db();

			$breadcrumbs = ' <li><a href="home">Dashboard</a> <i class="fa fa-angle-right"></i></li>';
			
			if(
				($_REQUEST['module'] && $_REQUEST['method']) 
				&& 
				($_REQUEST['module'] != "home")
			 )	
				{
				$linkMenu = $_REQUEST['module']."/".$_REQUEST['method'];			
			
	
				$sql = "SELECT id_area, descricao FROM menu_itens WHERE link LIKE '%".$linkMenu."%' LIMIT 1 ";
				$db->query($sql,__LINE__,__FILE__);
				$db->next_record();
				if($db->num_rows() > 0)
				{
					$menuItem = $db->f("descricao");
					$idArea = $db->f("id_area");
					
					$sql = "SELECT descricao FROM areas WHERE id = ".$idArea." ";
					$db->query($sql,__LINE__,__FILE__);
					$db->next_record();
					$area = $db->f("descricao");
					
					
					$breadcrumbs .= '<li><a href="javascript:void(0);">'.$area.'</a> <i class="fa fa-angle-right"></i></li>';
					$breadcrumbs .= '<li><a href="javascript:void(0);">'.$menuItem.'</a> <i class="fa fa-angle-right"></i></li>';
				}

			}

			$GLOBALS["base"]->template->set_var('breadcrumbs' ,$breadcrumbs);
		}

	function monta_menu()
	{
		/* Monta o menu superior de acordo com as permissÃµes do usuÃ¡rio que estÃ¡ logado */	
		@session_start();
		
		$db = new db();
		$db2 = new db();
		$db3 = new db();
		$db4 = new db();
		$db5 = new db();
		$db6 = new db();
		$db7 = new db();
		$db8 = new db();
		$db9 = new db();
		
		if($_REQUEST['module'] && $_REQUEST['method'])
			$uri = $_REQUEST['module']."/".$_REQUEST['method'];
		else
			$uri = "";
			
		$privilegios = $_SESSION['grantees'];
		$menu_itens_access = array();


		$sql = "SELECT id FROM menu_itens WHERE exibir = 1";
		$db->query($sql,__LINE__,__FILE__);
		$db->next_record();
		for($i = 0; $i < $db->num_rows(); $i++)
		{
         if(ACTIVE_GRANTEES == 1)
         {

            if(array_key_exists("area_".$db->f("id"),$_SESSION['grantees']) && $_SESSION['grantees']["area_".$db->f("id")] == "1")
            {
               array_push($menu_itens_access,$db->f("id"));
            }
         }
         else 
         {
               array_push($menu_itens_access,$db->f("id"));
            
         }

			$db->next_record();
		}
		
		$menu_itens_access = implode(",",$menu_itens_access);
		
		$area_access = array();

		$sql = "SELECT distinct(id_area) FROM menu_itens WHERE id IN (".$menu_itens_access.") AND exibir = 1";
		$db->query($sql,__LINE__,__FILE__);
		$db->next_record();
		for($i = 0; $i < $db->num_rows(); $i++)
		{
			array_push($area_access,$db->f("id_area"));
	
			$db->next_record();
		}
		
		$area_access = implode(",",$area_access);
		
		/*
		*  Monta o menu dependendo do produto selecionado
		*/
		$menu = "";
		
		if(($_REQUEST['module'] == "home" && $_REQUEST['method'] == "main") || !$_REQUEST['module'])
			$menu .= '<li class="nav-item start active">';
		else
			$menu .= '<li class="nav-item start">';	
		
		$menu .= '<a href="home" class="nav-link ">
            <i class="icon-home"></i>
            <span class="title">'.PAGINA_INICIAL.'</span>
            <span class="arrow"></span>
        </a>';
									
		
		$sql = "SELECT * FROM areas WHERE id IN (".$area_access.") ORDER BY ordem ASC";
		$db->query($sql,__LINE__,__FILE__);
		$db->next_record();
		for($f = 0; $f < $db->num_rows(); $f++)
		{


			$sql8 = "SELECT id_area, id FROM menu_itens WHERE link LIKE '%".$uri."%' AND id IN (".$menu_itens_access.") AND exibir = 1 ORDER BY id ASC";
			$db8->query($sql8,__LINE__,__FILE__);
			$db8->next_record();
			
			// BEGIN AREA ////////
			
			if($db8->f("id_area") ==  $db->f("id"))
				$menu .= '<li class="nav-item  active">';
			else
				$menu .= '<li class="nav-item  ">';
         
         
               // Exceção para deixar o menu Process aberto no Dashboard
                /*  if( $db->f("id") == 3 && (($_REQUEST['module'] == "home" && $_REQUEST['method'] == "main") || !$_REQUEST['module']))
                        $menu .= '<li class="nav-item  open">';
                  */
				
			$menu .= '<a href="javascript:;" class="nav-link nav-toggle">';
			$menu .= '<i class="'.$db->f("icon").'"></i>';
            
            $menu .= '<span class="title">'.utf8_encode($db->f("descricao")).'</span> <span class="arrow"></span></a>';
			
			// END AREA ////////

			// BEGIN NIVEL 1 ////////
			
            
                  
                           // Exceção para deixar o menu Process aberto no Dashboard
                          /* if( $db->f("id") == 3 && (($_REQUEST['module'] == "home" && $_REQUEST['method'] == "main") || !$_REQUEST['module']))
               			$menu .= '<ul class="sub-menu" style="display:block;">';
                           else
                              */
               			$menu .= '<ul class="sub-menu">';
                              

         
			$sql2 = "SELECT * FROM menu_itens WHERE nivel = 1 AND id_area = ".$db->f("id")." AND id IN (".$menu_itens_access.") AND exibir = 1";
			$db2->query($sql2,__LINE__,__FILE__);
			$db2->next_record();
			
			
			for($g = 0; $g < $db2->num_rows(); $g++)
			{

			$menu .= '<li class="nav-item  ';
         
         
			if($db8->f("id") ==  $db2->f("id"))
				$menu .= ' active ';
         

				if($db2->f("list") == 1)
					$menu .= ' nav-toggle" >';
				else
					$menu .= '" >';
				
				$menu .= ' <a href="'.$db2->f("link").'" class="nav-link ">';
						
						
							$menu .= '<span class="title">'.utf8_encode($db2->f("descricao")).' </span>';
                     
                     
                                                if($db2->f("id") == "4")
                                                {
                                                   $total_pending = $_SESSION['pending_ca'];
                                                }
                                                
                                                if($db2->f("id") == "6")
                                                {
                                                   $total_pending = $_SESSION['pending_cr'];
                                                }
                     
                                                if($db2->f("id") == "7")
                                                {
                                                   $total_pending = $_SESSION['pending_pl'];
                                                }

                                                
                                                if($db2->f("id") == "8")
                                                {
                                                   $total_pending = $_SESSION['pending_handover'];
                                                }

                                                if($db2->f("id") == "58")
                                                {
                                                   $total_pending = $_SESSION['pending_handover_checklist'];
                                                }

                                                if($db2->f("id") == "59")
                                                {
                                                   $total_pending = $_SESSION['pending_hazmat'];
                                                }

                                                if($total_pending > 0)
                                                {
                                                      $menu .= '<span class="badge badge-danger">'.$total_pending.'</span>';
                                                }
                                                  $total_pending = 0;
						
				$menu .= '</a>';
				
				
			
			$sql3 = "SELECT * FROM menu_itens WHERE nivel = 2 AND id_pai = ".$db2->f("id")." AND exibir = 1 ";
			$db3->query($sql3,__LINE__,__FILE__);
			$db3->next_record();
			$linhas3 = $db3->num_rows();
				
			if($linhas3 > 0)
				$menu .= '<ul class="sub-menu">';

				for($h = 0; $h < $db3->num_rows(); $h++)
				{


		
					$menu .= '<li class="nav-item  ';
		
						if($db3->f("list") == 1)
							$menu .= ' nav-toggle" >';
						else
							$menu .= '" >';
						
						$menu .= ' <a href="'.$db3->f("link").'" class="nav-link ">';
						
						
								
									$menu .= '<span class="title">'.$db3->f("descricao").'</span>';
								
						$menu .= '</a>';




						$sql4 = "SELECT * FROM menu_itens WHERE nivel = 3 AND id_pai = ".$db3->f("id")." AND exibir = 1 ";
						
						$db4->query($sql4,__LINE__,__FILE__);
						$db4->next_record();
						
						$linhas4 = $db4->num_rows();
						
						if($linhas4 > 0)
							$menu .= '<ul class="sub-menu">';

						for($i = 0; $i < $db4->num_rows(); $i++)
						{
							

			
							$menu .= '<li class="nav-item  ';
				
								if($db4->f("list") == 1)
									$menu .= ' nav-toggle" >';
								else
									$menu .= '" >';
								
								$menu .= ' <a href="'.$db4->f("link").'" class="nav-link ">';
								
								
										
										
											$menu .= '<span class="title">'.$db4->f("descricao").'</span>';
										
								$menu .= '</a>';
			
							$menu .= '</li>';
	
	
								$db4->next_record();
						}

						if($linhas4 > 0)
							$menu .= '</ul>';
							
							$menu .= '</li>';

	
					
					$db3->next_record();
				}

						if($linhas3 > 0)
							$menu .= '</ul>';

							$menu .= '</li>';

				
				$db2->next_record();

		
			}

				$menu .= '</ul></li>';				

				// END NIVEL 1 ////////
		
			$db->next_record();
		}
		

			$GLOBALS["base"]->template->set_var("menu",$menu);
		
	}
	
	function valida_privilegios()
	{
		@session_start();
		$db = new db();
		
		if(ACTIVE_GRANTEES == 1)
		{
			$main_module = $_REQUEST['module'];
			$main_method = $_REQUEST['method'];
			$main_url = 'index.php?module='.$main_module.'&method='.$main_method;
			
			
			$sql = "SELECT id FROM menu_itens WHERE link LIKE '%".$main_url."%' LIMIT 1";
			$db->query($sql,__LINE__,__FILE__);
			$db->next_record();
			if($db->num_rows() > 0)
			{
			
				$id_secao = $db->f("id");
						
				
				/* Método para validação de permissão por área */
				if($_SESSION['grantees']["area_".$id_secao] == 0)
				{
					header("Location: home");
					die();
				}
			}
		}
					
	}


	function email($to,$subject,$message,$anexo = "")
	{
		require_once('class.phpmailer.php');
		
		$mail = new phpmailer();
		
		$mail->Encoding      = "8bit";
		$mail->CharSet       = "iso-8859-1";
		$mail->Sender        = SENDER_EMAIL;
		$mail->FromName		 = NOME_EMAIL;   
		$mail->Host          = HOST_EMAIL;
		$mail->Helo          = "EHLO";
		$mail->SMTPAuth      = AUTH_EMAIL;
		$mail->Username      = USER_EMAIL;
		$mail->Password      = SENHA_EMAIL;
		$mail->Port          = PORT_EMAIL;
		$mail->AddReplyTo(SENDER_EMAIL, NOME_EMAIL);
		$mail->Mailer        = "smtp";
		$mail->IsHTML(true);
		$mail->AddAddress($to);
		$mail->Subject = $subject;
		$mail->Body    = $message;
		
		if($anexo != "")
			$mail->AddAttachment($anexo);

		if(!$mail->Send())
			die("erro no envio!");
      
		
	}
	
	function notifications($id_usuario)
	{
		@session_start();
		$db = new db();

		$total_pending_notifications = 0;

		$sql = "SELECT DATE_FORMAT(data,'%d/%m%/%Y %H:%i') as data,
				title,
				icon,
				link,
				label,
				status 
				FROM notifications 
				WHERE id_usuario = ".$_SESSION['id']."  
				ORDER BY id DESC";
		$db->query($sql,__LINE__,__FILE__);
		$db->next_record();
		for($i = 0; $i < $db->num_rows(); $i++)
		{
			$link = $db->f("link");
			$data = $db->f("data");
			$label = $db->f("label");
			$icon = $db->f("icon");
			$title = $db->f("title");
			$status = $db->f("status");
			$data = explode(" ",$data);
			
			if($status == "1")
			{
				$icon = 'check';
				$label = 'success';	
			}

			if($status == "0")
			{
				$icon = 'envelope';
				$label = 'danger';	
			}
			
			// mensagens do dia
			if($data[0] == date("d/m/Y"))
				$data_label = TX_HOJE." ".TX_AS.$data[1]." hs";
			elseif($data[0] == date("d/m/Y",strtotime("-1 day")))
				$data_label = TX_ONTEM." ".TX_AS.$data[1]." hs";
			elseif($data[0] == date("d/m/Y",strtotime("+1 day")))
				$data_label = TX_AMANHA." ".TX_AS.$data[1]." hs";
			else
				$data_label = $data[0]." ".TX_AS.$data[1]." hs";


			$html_notifications .= '<li>
							<a href="'.$link.'">
							<span class="details">
								<span class="label label-sm label-icon label-'.$label.'">
									<i class="fa fa-'.$icon.'"></i>
								</span> '.$title.' </span>
								<div style="background-color:#000; color:#fff; height:20px; font-size:11px; width:100px; float:right;">'.$data_label.'</div>
								</a>
								
							</li>';

			if($status == "0")	
				$total_pending_notifications++;

			$db->next_record();

		}
		
		
		
		if($total_pending_notifications > 0)
			$total_pending_notifications = ' <span class="badge badge-danger">'.$total_pending_notifications.'</span>';
		else	
			$total_pending_notifications = '';
		
		$GLOBALS["base"]->template->set_var('total_pending_notifications',$total_pending_notifications);
		$GLOBALS["base"]->template->set_var('html_notifications',$html_notifications);
		
	}
	
	function leNotification($idNotification)
	{
		@session_start();
		$db = new db();
		
		$sql = "UPDATE notifications SET status = 1 WHERE id = ".$idNotification." AND id_usuario = ".$_SESSION['id']." ";
		$db->query($sql,__LINE__,__FILE__);
		$db->next_record();
		
	}
	
      function notificacao($mensagem,$cor)
      {
         $_SESSION['msg'] = array("mensagem"=>$mensagem,"tm"=>$cor,"mt"=>"air");
      }
      
      
      function ajax_driver()
      {
         
         @session_start();

			$db = new db();

	      $id_driver = $_GET['id_driver'];


		   $sql = "SELECT photo, photo_id_1, photo_id_2 FROM drivers WHERE id = ".$id_driver;
		   $db->query($sql,__LINE__,__FILE__);
		   $db->next_record();
         
         if($db->num_rows() > 0)
         {

         
         $driver_data = '<div class="form-group">
                             <label class="col-md-3 control-label">Driver Photo</label>
                             <div class="col-md-4">
                               <div class="portlet light profile-sidebar-portlet bordered">
                              <div class="profile-userpic">
                                  <img src="'.$db->f("photo").'" class="img-responsive" alt=""> 
                              </div>                            
                           </div>
                             </div>
                         </div>                           


                              <div class="form-group">
                             <label class="col-md-3 control-label">Driver ID#1 </label>
                             <div class="col-md-4">
                               <div class="portlet light profile-sidebar-portlet bordered">
                              <div class="profile-userpic">
                                  <img src="'.$db->f("photo_id_1").'" class="img-responsive" alt=""> 
                              </div>                            
                           </div>
                             </div>
                         </div>                           
                           
                         <div class="form-group">
                             <label class="col-md-3 control-label">Matching Photo/ID #1 ?</label>
                             <div class="col-md-4">
                                 <input type="checkbox" id="switch" name="match_photo_1" value="1" checked="checked">
                                 <label class="labela" for="switch">Toggle</label>
                                 <span class="help-block"></span>
                             </div>
                         </div>
                           
                           
                              <div class="form-group">
                             <label class="col-md-3 control-label">Driver ID#2 </label>
                             <div class="col-md-4">
                               <div class="portlet light profile-sidebar-portlet bordered">
                              <div class="profile-userpic">
                                  <img src="'.$db->f("photo_id_2").'" class="img-responsive" alt=""> 
                              </div>                            
                           </div>
                             </div>
                         </div>                           
                           
                         <div class="form-group">
                             <label class="col-md-3 control-label">Matching Photo/ID #2 ?</label>
                             <div class="col-md-4">
                                 <input type="checkbox" id="switch2" name="match_photo_2" value="1" checked="checked">
                                 <label class="labela" for="switch2">Toggle</label>
                                 <span class="help-block"></span>
                             </div>
                         </div>';
         }
         else
            $driver_data = "";
         
         
         echo $driver_data;

         
      }
      
      
      function ajax_truckin_co()
      {
         
         @session_start();

			$db = new db();

	      $id_truckin_co = urldecode($_GET['id_truckin_co']);

         
         $sql = "SELECT id, driver_name FROM drivers WHERE trucking_co = '".$id_truckin_co."' ORDER BY driver_name ASC";
         $db->query($sql,__LINE__,__FILE__);
         $db->next_record();

         $trucking_co_data = '<option value="0">SELECT</option>';

         for($i = 0; $i < $db->num_rows(); $i++)
			{
            $trucking_co_data .= '<option value="'.$db->f("id").'" ';
/*            
             if(isset($_REQUEST['id']) && $_REQUEST['id'] == $db->f("id"))
               $trucking_co_data .= ' selected="selected" ';
   */            
            $trucking_co_data .= '>'.$db->f("driver_name").'</option>';
            
   			$db->next_record();
         }
         
         
         echo $trucking_co_data;
      }
      
      
      function s3_upload($field_name, $dir = "")
      {
         require_once 'S3.php';
         
          $clientS3 = S3Client::factory(array(
            'key'    => AWS_S3_KEY,
            'secret' => AWS_S3_SECRET
        ));
          
        //  $nomeArquivoRand = substr(md5(md5(time()).rand(6,9)),0,30);
         
         $tmpfile = $_FILES[$field_name]['tmp_name']; 
         $file = str_replace(" ","",$_FILES[$field_name]['name']);
         
         if (defined('AWS_S3_URL')) 
         { 
           
            
            $nomeArquivoOriginal = explode(".",$file);
            $nomeArquivo = $nomeArquivoOriginal[0];
            $extensao = $nomeArquivoOriginal[1];
            
            
            
            $exists = $clientS3->doesObjectExist(AWS_S3_BUCKET, "documents/".$dir.$file);

            if($exists)
               $finalFileName = $nomeArquivo."_".time().".".$extensao;
            else
               $finalFileName = $_FILES[$field_name]['name'];
            
            // $finalFileName = $nomeArquivoRand.".".$extensao;
               
            
            $response = $clientS3->putObject(array(
                     'Bucket' => AWS_S3_BUCKET,
                     'Key'    => "documents/".$dir.$finalFileName,
                     'SourceFile' => $_FILES[$field_name]['tmp_name'],
                 ));

            
             $s3_path = $response['ObjectURL'];
            
            
            unlink($tmpfile); 
         } 
         
         return $s3_path;
      }

      function getJsonHomolog($url)
      {
         
            
            $username = "DWSYS";
            $password = "Dwsys@2020";
            $token = "HVd6FUwPeEs6PVTMLVX8u5E6";
            
           // $params = array('HTTP_DMSTOKEN' => base64_encode($token));

            $header = array('Content-Type' => 'application/json', 
                'DMSTOKEN' => base64_encode($token), 
                'Authorization' => 'Basic '.base64_encode($username.":".$password));
            $response =  $this->request("GET", $url, $header, $params);
            
            return json_decode($response,true);
            
      }

      
      function getJson($url)
      {
         
         
            $dmstoken =  $this->getDmsToken();
            
            
            $username = "DWSYS";
            $password = "dwsys@2020";
            $token = "HJFpvTcWkq7QxnCc65BMYrMa";
            
           // $params = array('HTTP_DMSTOKEN' => base64_encode($token));

            $header = array('Content-Type' => 'application/json', 
                'DMSTOKEN' => base64_encode($token), 
                'Authorization' => 'Baerer '.$dmstoken);
            $response =  $this->request("GET",$url, $header);
            
            return json_decode($response,true);
            
      }

// method should be "GET", "PUT", etc..
      function request($method, $url, $header) 
      {
          $opts = array(
              'http' => array(
                  'method' => $method,
              ),
          );

          // serialize the header if needed
          if (!empty($header)) {
              $header_str = '';
              foreach ($header as $key => $value) {
                 
                // if($key != "0")
                  $header_str .= "$key: $value\r\n";
              }
              $header_str .= "\r\n";
              $opts['http']['header'] = $header_str;
          }
          

          $context = stream_context_create($opts);
          
         @$data = file_get_contents($url, false, $context);
/*         
var_dump($data);
$error = error_get_last();
var_dump($error);
die();
         
*/       // $data = $this->curl_get_contents($url);
          
          return $data;
      }


function curl_get_contents($url)
{
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);

    $data = curl_exec($ch);
    curl_close($ch);

    return $data;
}

   function file_get_html()
   {
      $dom = new simple_html_dom;
      $args = func_get_args();
      $dom->load(call_user_func_array('curl_get_contents', $args), true);
      return $dom;
   }
      
   
   function getShippers($url)
   {
      
     $array_shipeprs =  $this->getJson($url);

     return $array_shipeprs;
     
   }
   

    

    function getShipper($id, $tipo = "shipper")
   {
       /**
        *  usage: 
        *  $array_shipper =   $this->getShipper("3129"); 
        * 
                     $id = $item["id"]; // ID
                     $name = $item["name"]; // NAME
                     $id_number= $item["id_number"]; // ID NUMBER
                     $cityArray= $item["city"];
                        $cityId = $cityArray["id"]; // CITY ID
                        $cityName = $cityArray["name"]; // CITY NAME

                        $cityRegionArray = $cityArray["region"];
                        $cityRegionId = $cityRegionArray["id"]; // REGION ID
                        $cityRegionName = $cityRegionArray["name"]; // REGION NAME
                        $cityRegionCountryArray = $cityRegionArray["country"];

                           $cityRegionCountryid = $cityRegionCountryArray["id"]; // COUNTRY ID
                           $cityRegionCountryName = $cityRegionCountryArray["name"]; // COUNTRY NAME

                     $postal_code = $item["postal_code"]; // POSTAL CODE
                     $iata = $item["iata"]; // IATA
                     $social_contract = $item["social_contract"]; // SOCIAL CONTRACT
                     $address_line1 = $item["address_line1"]; // ADDRESS LINE 1
                     $address_line2 = $item["address_line2"]; // ADDRESS LINE 2
                     $vendor= $item["vendor"]; // VENDOR
                     $awareness = $item["awareness"]; // AWARENESS
        * 
        */
       
       $array_rotas = explode(",",SYS_ROUTES_ID);
       
       
         for($i = 0; $i < count($array_rotas); $i++)
         {
                if($i == 0)
                  $array_shippers =  $this->getJson($array_rotas[$i]."/".$id);
                else
                  $array_shippers =  $this->getJson($array_rotas[$i]."".$id);

                 if(is_array($array_shippers))
                 {
                       $i = count($array_rotas);
                       return $array_shippers;
                       
                 }
                    

         }
       
       
       /*

         for($i = 0; $i < count($array_rotas); $i++)
         {
                $array_shipeprs =  $this->getJson($array_rotas[$i]."/?".$id);


                 if(is_array($array_shipeprs))
                 {
                    
                    for($j = 0; $j < count($array_shipeprs); $j++)
                    {
                       if($array_shipeprs[$j]["id"] == $id)
                       {
                       return $array_shipeprs[$j];
                       $i = count($array_rotas);
                       
                       }
                    }
                    
                 }

         }
       */
   }
   
    function getShipperName($id)
   {
       /**
        *  usage: 
        *  $array_shipper =   $this->getShipper("3129"); 
        * 
                     $id = $item["id"]; // ID
                     $name = $item["name"]; // NAME
                     $id_number= $item["id_number"]; // ID NUMBER
                     $cityArray= $item["city"];
                        $cityId = $cityArray["id"]; // CITY ID
                        $cityName = $cityArray["name"]; // CITY NAME

                        $cityRegionArray = $cityArray["region"];
                        $cityRegionId = $cityRegionArray["id"]; // REGION ID
                        $cityRegionName = $cityRegionArray["name"]; // REGION NAME
                        $cityRegionCountryArray = $cityRegionArray["country"];

                           $cityRegionCountryid = $cityRegionCountryArray["id"]; // COUNTRY ID
                           $cityRegionCountryName = $cityRegionCountryArray["name"]; // COUNTRY NAME

                     $postal_code = $item["postal_code"]; // POSTAL CODE
                     $iata = $item["iata"]; // IATA
                     $social_contract = $item["social_contract"]; // SOCIAL CONTRACT
                     $address_line1 = $item["address_line1"]; // ADDRESS LINE 1
                     $address_line2 = $item["address_line2"]; // ADDRESS LINE 2
                     $vendor= $item["vendor"]; // VENDOR
                     $awareness = $item["awareness"]; // AWARENESS
        * 
        */
       
       $array_rotas = explode(",",SYS_ROUTES_ID);
       
       
         for($i = 0; $i < count($array_rotas); $i++)
         {

                if($i == 0)
                  $array_shippers =  $this->getJson($array_rotas[$i]."/".$id);
                else
                  $array_shippers =  $this->getJson($array_rotas[$i]."".$id);
                

                 if(is_array($array_shippers))
                 {
                       $i = count($array_rotas);
                       return $array_shippers["name"];
                 }
                    

         }
       
       
       
   }
   


   
      function s3_upload_multiple($field_name, $index ,$dir = "", $rotation = 0)
      {
         require_once 'S3.php';
         
          $clientS3 = S3Client::factory(array(
            'key'    => AWS_S3_KEY,
            'secret' => AWS_S3_SECRET
        ));
          
          //$nomeArquivoRand = substr(md5(md5(time()).rand(6,9)),0,30);
         
         $tmpfile = $_FILES[$field_name]['tmp_name'][$index]; 
         $file = str_replace(" ","",$_FILES[$field_name]['name'][$index]); 
         
         if (defined('AWS_S3_URL')) 
         { 
           
            
            $nomeArquivoOriginal = explode(".",$file);
            $nomeArquivo = $nomeArquivoOriginal[0];
            $extensao = $nomeArquivoOriginal[1];
            
            
            $exists = $clientS3->doesObjectExist(AWS_S3_BUCKET, "documents/".$dir.$file);

            if($exists)
               $finalFileName = $nomeArquivo."_".time().".".$extensao;
            else
               $finalFileName = $file;
            
            
         //   $finalFileName = $nomeArquivoRand.".".$extensao;
            
            if($rotation != 0)
            {
               $source = imagecreatefromjpeg($_FILES[$field_name]['tmp_name'][$index]);
               $rotate = imagerotate($source, ($rotation-90), 0);
               
                $filename = tempnam(sys_get_temp_dir(), "foo");
               imagejpeg($rotate, $filename);
               
                  $response = $clientS3->putObject(array(
                           'Bucket' => AWS_S3_BUCKET,
                           'Key'    => "documents/".$dir.$finalFileName,
                           'SourceFile' => $filename,
                       ));
               
            }
            else
            {
               
               $response = $clientS3->putObject(array(
                        'Bucket' => AWS_S3_BUCKET,
                        'Key'    => "documents/".$dir.$finalFileName,
                        'SourceFile' => $_FILES[$field_name]['tmp_name'][$index],
                    ));
            }
               
            

            
             $s3_path = $response['ObjectURL'];
            
            
            unlink($tmpfile); 
         } 
         
         return $s3_path;
      }
   
   function cabecalho_deslogado()
	{	


		$GLOBALS["base"]->template->set_var('ABS_LINK' ,ABS_LINK);
		$GLOBALS["base"]->template->set_var('TITULO_SISTEMA' ,TITULO_SISTEMA." - ".utf8_encode($page_title));
		$GLOBALS["base"]->template->set_var('page_title' ,utf8_encode($page_title));
		$GLOBALS["base"]->template->set_var('module_busca' ,$_REQUEST['module']);
        	$GLOBALS["base"]->write_design_specific('home.tpl' , 'cabecalho_deslogado');
	}
      
   function get_post_action($name)
   {
       $params = func_get_args();

       foreach ($params as $name) {
           if (isset($_POST[$name])) {
               return $name;
           }
       }
   }
   
   function getDmsToken()
   {
      

         $authurl = 'https://sys.dmslog.com/o/token/';

         $client_id = "kNXz7oJz6ImKpwUPZatgGwIVI6ARk8nHsaDJU0zU";
         $client_secret = "5aiJzOf7FREXuy3d3wW8T3oeQHQGxWKJ3kU29Ox5rWhx1vqhM3JXIAs8uWJj98PkxZ6axrSMj0blGInrpNZaCLGaZHYG0cSCd8bNP8tMX4YfbC6eJo2bcRrIOO0zj3Mf";
         $username = 'DWSYS';
         $password = 'dwsys@2020';

         // Creating base 64 encoded authkey
         $auth_key = $client_id.":".$client_secret;
         $encoded_Auth_Key=base64_encode($auth_key);

         $headers = array();
         $headers['Authorization'] = "Basic ".$encoded_Auth_Key;
         $headers['Content-Type'] = "application/x-www-form-urlencoded";

         $data = array(
             'grant_type' => 'password',
             'username'   => $username,
             'password'   => $password,
             'client_id'   => $client_id,
             'client_secret'   => $client_secret,
         );

         $ch = curl_init();
         curl_setopt($ch, CURLOPT_URL, $authurl);
         curl_setopt($ch, CURLOPT_POST, 1 );
         curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
         curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
         curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
         $auth = curl_exec( $ch );

         if ( curl_errno( $ch ) ){
             echo 'Erro: ' . curl_error( $ch );
         }
         curl_close($ch);

         $secret = json_decode($auth);
         $access_key = $secret->access_token; 
         $refresh_token = $secret->refresh_token; 
         $expires_in = $secret->expires_in; 
         

         return  $access_key;


   }
   
   function cronUpdateShippers()
   {
         ini_set('max_execution_time', 0);
         ini_set('memory_limit',-1);

         @session_start();
                        
         $db = new db();
         $db2 = new db();
         $db3 = new db();

      
       $array_rotas = explode(",",SYS_ROUTES);
       
       
         for($i = 0; $i < count($array_rotas); $i++)
         {
                $array_shippers =  $this->getJson($array_rotas[$i]);
                
                
         for($j = 0; $j < count($array_shippers); $j++)
         {
                 if(is_array($array_shippers[$j]))
                 {
                       $nome_shipper =  $array_shippers[$j]["name"];
                       $id_sys =  $array_shippers[$j]["id"];
                       
                       $sql = "SELECT COUNT(id) AS total FROM shippers WHERE id_sys = ".$id_sys." ";
                       $db->query($sql,__LINE__,__FILE__);
                       $db->next_record();
                       if($db->f("total") == 0)
                       {
                          $sql = "INSERT INTO shippers (shipper_name, id_sys) VALUES ('".addslashes($nome_shipper)."',".$id_sys.")";
                          $db->query($sql,__LINE__,__FILE__);
                          $db->next_record();
                       }
                       else
                       {
                           $sql = "UPDATE shippers SET shipper_name = '".addslashes($nome_shipper)."' WHERE id_sys = ".$id_sys." ";
                           $db->query($sql,__LINE__,__FILE__);
                           $db->next_record();
                       }
                       
                       
                 }
         }

         }
         
         $this->notificacao("Shippers Database successfully Updated.", "green");
         header("Location: ".ABS_LINK."index.php?module=shippers&method=main");
         
   }
   
   
    
      function s3_upload_dynamic($file_name, $file_patch, $dir = "")
      {
         require_once 'S3.php';
         
          $clientS3 = S3Client::factory(array(
            'key'    => AWS_S3_KEY,
            'secret' => AWS_S3_SECRET
        ));
         
       //   $nomeArquivoRand = substr(md5(md5(time()).rand(6,9)),0,30);
          
         if (defined('AWS_S3_URL')) 
         { 
           
            
            $nomeArquivoOriginal = explode(".",$file_name);
            $nomeArquivo = $nomeArquivoOriginal[0];
            $extensao = $nomeArquivoOriginal[1];
            
            $exists = $clientS3->doesObjectExist(AWS_S3_BUCKET, "documents/".$dir.$file_name);

            if($exists)
               $finalFileName = $nomeArquivo."_".time().".".$extensao;
            else
               $finalFileName = $file_name;
               
            
           // $finalFileName = $nomeArquivoRand.".".$extensao;
            
            $response = $clientS3->putObject(array(
                     'Bucket' => AWS_S3_BUCKET,
                     'Key'    => "documents/".$dir.$finalFileName,
                     'SourceFile' => $file_patch,
                 ));

            
             $s3_path = $response['ObjectURL'];
            
            
         } 
         
         return $s3_path;
      }
      

   
   

}

?>