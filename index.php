<?php
require_once("config.php");

require_once __DIR__ . '/vendor/autoload.php';

require_once("routes.php");


/*
if(HTTPS == 1)
{
	if (! isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off' ) {
		$redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		header("Location: $redirect_url");
		exit();
	}
}
*/
///////////////////////////////////////////////////////////////////////////////////////////////
if(LOADING_BAR == 1)
	ob_start();


require_once(CONFIG_PATH."/inc/base.php");
require_once(CONFIG_PATH."/int/".CONFIG_LANG.".php");




if(!$_REQUEST['module'] && $_SESSION['logged'] == SESSION_KEY)
{
		header("Location: index.php?module=home&method=main");
}

/**
*	Papaya FrameWork by Global Soft Union
*			
*	 @version V5.0  
*	 @data Set 2020   
*	 @author Raphael Cozzi
*	 
*
*	* O index.php chama o modulo correspondente, dizendo qual método dele será chamado
*	* em seguida o modulo chama as o método que pode chamar outros métodos, caso necessário.
*	* Os métodos setam variaveis para os htmls em /templates.
*/

		// VERIFICA SE O USUÁRIO ESTÁ LOGADO

		if($_REQUEST['module'] && $_REQUEST['method'])
			if($_REQUEST['module'] != "login")
			{

		    if($_REQUEST['module'] != "cadastro" 
                    && $_REQUEST['module'] != "ext" 
                    && $_REQUEST['method'] != "cron")
				{

						require_once("modules/login.php");
						$check = new login();
						$check->check_login();
				}
			}


	/***************************************************************************/
	//                                                                                           //
	//                                MÓDULO                                             //
	//                                                                                           //
	//*************************************************************************/
	/* Pega o parametro que foi passado em module que vai definir qual modulo sera usado */
	if($_REQUEST['module'])
		$module = $_REQUEST['module']; 
	else
		$module = "login";
	/***************************************************************************/
      //                                                                                              //
	//                                MÉTODO                                               //
	//                                                                                              //
	//*************************************************************************/
	/* Pega o parametro que foi passado que define o método que será usado do módulo */
	if($_REQUEST['method'])
		$method = $_REQUEST['method'];
	else
		$method = "main";	
   
   

	/* Primeiro verifica se o arquivo que contem o modulo realmente existe */
	if(file_exists("modules/".$module.".php"))
      {
			include("modules/".$module.".php");
        	eval('$obj = new '.($module).'();');
      }
      if(method_exists($obj,$method))
      {
         	eval('$obj->'.($method).'();');
      }


?>