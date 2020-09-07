<?php 
/*
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
*/
/* CONFIGURAÇÕES DE BANCO DE DADOS */

$baseUrl = "/dev/papaya/";

$host = "localhost"; // servidor
$user = "root"; // usuario
$password = ""; // senha
$database = "papaya"; // banco de dados
$dbdriver = "mysql"; // tipo do banco mysql



// Chave para acesso externo ao Json das imagens
define("EXT_KEY","52182344187793218157938748930643989076532663065648");


/* DADOS DO S3 */

define('AWS_S3_KEY', 'AKIAXODJZPSMQ5NTCJMH'); 
define('AWS_S3_SECRET', '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'); 
define('AWS_S3_REGION', 'us-east-1'); 
define('AWS_S3_BUCKET', 'dms-dws'); 
define('AWS_S3_URL', 'http://s3.'.AWS_S3_REGION.'.amazonaws.com/'.AWS_S3_BUCKET.'/');

/* CONFIGURAÇÕES DE EMAIL PADRÃO */

define("USER_EMAIL","warehousesystem@dmslog.com"); // Email de autenticação
define("SENHA_EMAIL","DMSlog@20"); // Senha do email
define("HOST_EMAIL","ssl://smtp.gmail.com"); // Servidor de autenticação

define("SENDER_EMAIL","warehouse.mia@dmslog.com"); // Remetente
define("NOME_EMAIL","DMS Logistics"); // Nome do remetente
define("PORT_EMAIL","465"); // Porta de autenticação
define("AUTH_EMAIL",true); // Autenticação no envio (true ou false)

/* CONFIGURAÇÕES GERAIS */

define("TITULO_SISTEMA","Papaya 5.0"); /* Titulo do sistema/serviço */
define("HTTPS",0); /* HTTPS 1 ou 0 */
define("CONFIG_SCRIPT_PATH" , "/");
define("CONFIG_DEBUG" , 0); /* Debug ativo? */
define("CONFIG_ENVIRONMENT_FRAMESET" , 1);

if(isset($_SESSION['idioma']))
	define("CONFIG_LANG" , $_SESSION['idioma']); /* Idioma padrão do usuário */ 
else
	define("CONFIG_LANG" , "pt_br"); /* Idioma padrão do sistema */ 

define("LOADING_BAR" , 1); /* Barra de loading ativa ou não */
define("ACTIVE_GRANTEES" , 1); /* Permissionamento ativo ou não */
define("USE_AVATAR" , 1); /* Avatar de usuário ativo ou não */
define("DB_USED" , 1); /* MySql = 1 Oracle = 2 Sql Server = 3 */
define("MYSQL_SHOW_ERROR" , 1); /* Show mysql error? */


/* CÓDIGO DE RASTREIO DO GOOGLE ANALYTICS */

$analytics_code = "";


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