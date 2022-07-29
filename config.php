<?php 
/*
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
*/
error_reporting(E_ERROR);

$connection_type = 1; // 1 - Database, 2 - LDAP


$baseUrl = "/papayav5/";
define("BASE_URL",$baseUrl);
define("SESSION_KEY",'43628bbbb8613ac94fd61bd46aab5a45314s');


/* CONFIGURAÇÕES DE BANCO DE DADOS */
$host = "localhost"; // servidor
$user = "root"; // usuario
$password = ""; // senha
$database = "papaya"; // banco de dados
$dbdriver = "mysql"; // tipo do banco mysql


/* CONFIGURAÇÕES DE LDAP*/ 

// Habilitar  ;extension=php_ldap.dll no php.ini

$ldap_server = "";
$ldap_dominio = "@dominio"; //Dominio local ou global
$ldap_user = "usuario".$dominio;
$ldap_porta = "389";
$ldap_pass   = "";
$ldapcon = ldap_connect($ldap_server, $ldap_porta) or die("Could not connect to LDAP server.");


// Chave para acesso externo ao Json das imagens
define("EXT_KEY","52182344187793218157938748930643989076532663065648");

/* CONFIGURAÇÕES GERAIS */

define("TITULO_SISTEMA","Papaya 5.0"); /* Titulo do sistema/serviço */
define("HTTPS",0); /* HTTPS 1 ou 0 */
define("CONFIG_SCRIPT_PATH" , "/");
define("CONFIG_DEBUG" , 0); /* Debug ativo? */
define("CONFIG_ENVIRONMENT_FRAMESET" , 1);
define("LOADING_BAR" , 1); /* Barra de loading ativa ou não */
define("ACTIVE_GRANTEES" , 1); /* Permissionamento ativo ou não */
define("USE_AVATAR" , 1); /* Avatar de usuário ativo ou não */
define("DB_USED" , 1); /* MySql = 1 Oracle = 2 Sql Server = 3 */
define("MYSQL_SHOW_ERROR" , 1); /* Show mysql error? */

/* CÓDIGO DE RASTREIO DO GOOGLE ANALYTICS */
$analytics_code = "";


/* CONFIGURAÇÕES DO S3 */

define('AWS_S3_KEY', 'AKIAXODJZPSMQ5NTCJMH'); 
define('AWS_S3_SECRET', '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'); 
define('AWS_S3_REGION', 'us-east-1'); 
define('AWS_S3_BUCKET', 'dms-dws'); 
define('AWS_S3_URL', 'http://s3.'.AWS_S3_REGION.'.amazonaws.com/'.AWS_S3_BUCKET.'/');

/* CONFIGURAÇÕES DE SMTP  */

define("USER_EMAIL","archasys@gmail.com"); // Email de autenticação
define("SENHA_EMAIL","trinityn3o@"); // Senha do email
define("HOST_EMAIL","ssl://smtp.gmail.com"); // Servidor de autenticação

define("SENDER_EMAIL","archasys@gmail.com"); // Remetente
define("NOME_EMAIL","Global Soft Union"); // Nome do remetente
define("PORT_EMAIL","465"); // Porta de autenticação
define("AUTH_EMAIL",true); // Autenticação no envio (true ou false)


if(isset($_SESSION['idioma']))
	define("CONFIG_LANG" , $_SESSION['idioma']); /* Idioma padrão do usuário */ 
else
	define("CONFIG_LANG" , "pt_br"); /* Idioma padrão do sistema */ 




/*********************************************** NÃO MEXER A PARTIR DAQUI ************************************************/
$path = (getcwd());


define("ANALYTICS" , $analytics_code);
define("CONFIG_PATH" , $path);

if(HTTPS == 1)
define("ABS_LINK" , "https://".$_SERVER['HTTP_HOST'].$baseUrl);
else
define("ABS_LINK" , "http://".$_SERVER['HTTP_HOST'].$baseUrl);

/*MYSQL CONFIG*/
define("MYSQL_CONFIG_HOST"     , $host);
define("MYSQL_CONFIG_DATABASE" , $database);
define("MYSQL_CONFIG_USERNAME" , $user);
define("MYSQL_CONFIG_PASSWORD" , $password);


/*ORACLE CONFIG*/
define("ORACLE_CONFIG_HOST"     , $host);
define("ORACLE_CONFIG_DATABASE" , $database);
define("ORACLE_CONFIG_USERNAME" , $user);
define("ORACLE_CONFIG_PASSWORD" , $password);

/*SQL SERVER CONFIG*/
define("SQLSERVER_CONFIG_HOST"     , $host);
define("SQLSERVER_CONFIG_DATABASE" , $database);
define("SQLSERVER_CONFIG_USERNAME" , $user);
define("SQLSERVER_CONFIG_PASSWORD" , $password);

?>