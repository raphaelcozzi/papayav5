<!-- BEGIN main_home -->
<!-- END main_home -->
<!-- BEGIN cabecalho -->
<!DOCTYPE html>
<!--[if IE 8]> 
<html lang="en" class="ie8 no-js">
   <![endif]-->
   <!--[if IE 9]> 
   <html lang="en" class="ie9 no-js">
      <![endif]-->
      <!--[if !IE]><!-->
      <html lang="en">
         <!--<![endif]-->
         <!-- BEGIN HEAD -->
         <head>
            <meta charset="utf-8" />
            <title>{TITULO_SISTEMA}</title>
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta content="width=device-width, initial-scale=1" name="viewport" />
            <meta name="apple-mobile-web-app-capable" content="yes">
            <meta content="" name="description" />
            <meta content="" name="author" />
            <base href="{ABS_LINK}" />
            <!-- BEGIN GLOBAL MANDATORY STYLES -->
            <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
            <link href="assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
            <link href="assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
            <link href="assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
            <link href="assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
            <!-- END GLOBAL MANDATORY STYLES -->
            <!-- BEGIN THEME GLOBAL STYLES -->
            <link href="assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
            <link href="assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
            <!-- END THEME GLOBAL STYLES -->
            <!-- BEGIN THEME LAYOUT STYLES -->
            <link href="assets/layouts/layout4/css/layout.min.css" rel="stylesheet" type="text/css" />
            <link href="assets/layouts/layout4/css/themes/light.min.css" rel="stylesheet" type="text/css" id="style_color" />
            <link href="assets/layouts/layout4/css/custom.min.css" rel="stylesheet" type="text/css" />
            <!-- END THEME LAYOUT STYLES -->
            <link href="assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
            <link href="assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
            <link href="assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
            <link href="assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
            <link href="assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
            <link href="assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css" rel="stylesheet" type="text/css" />
            <link href="assets/global/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css" rel="stylesheet" type="text/css" />
            <link href="assets/global/plugins/dropzone/dropzone.min.css" rel="stylesheet" type="text/css" />
            <link href="assets/global/plugins/dropzone/basic.min.css" rel="stylesheet" type="text/css" />
            <link href="assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
            <link href="assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
            <link href="assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
            <link href="assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
            <link href="assets/global/plugins/clockface/css/clockface.css" rel="stylesheet" type="text/css" />
            <link href="assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
            <link href="assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
            <link href="assets/global/plugins/fullcalendar/fullcalendar.css" rel="stylesheet" />
            <link rel='stylesheet' type='text/css' href='assets/global/plugins/fullcalendar/fullcalendar.print.css' media='print' />
            <link href="assets/global/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" type="text/css" />
            <link rel="shortcut icon" href="favicon.ico" />
         </head>
         <!-- END HEAD -->
         <body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo">
            <!-- BEGIN HEADER -->
            <div class="page-header navbar navbar-fixed-top">
               <!-- BEGIN HEADER INNER -->
               <div class="page-header-inner ">
                  <!-- BEGIN LOGO -->
                  <div class="page-logo">
                     <a href="home">
                     <img src="images/logo-light.png" alt="logo" class="logo-default" style="margin-top:20px;" /> </a>
                     <div class="menu-toggler sidebar-toggler">
                        <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
                     </div>
                  </div>
                  <!-- END LOGO -->
                  <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                  <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
                  <!-- END RESPONSIVE MENU TOGGLER -->
                  <!-- BEGIN PAGE TOP -->
                  <div class="page-top">
                     <!-- BEGIN HEADER SEARCH BOX -->
                     <!-- DOC: Apply "search-form-expanded" right after the "search-form" class to have half expanded search box -->
                     <!-- END HEADER SEARCH BOX -->
                     <!-- BEGIN TOP NAVIGATION MENU -->
                     <div class="top-menu">
                        <ul class="nav navbar-nav pull-right">
                           <li class="separator hide"> </li>
                           <!-- BEGIN NOTIFICATION DROPDOWN -->
                           <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                           <li class="dropdown dropdown-extended dropdown-notification dropdown-dark" id="header_notification_bar">
                              <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                              <i class="icon-envelope-open"></i>
                              {total_pending_notifications} 
                              </a>
                              <ul class="dropdown-menu">
                                 <li class="external">
                                    <h3>
                                       <span class="bold">{total_pending_notifications} notifica&ccedil;&otilde;es</span> novas
                                    </h3>
                                    <!-- <a href="page_user_profile_1.html">ver tudo</a>-->
                                 </li>
                                 <li>
                                    <ul class="dropdown-menu-list scroller" style="height: 450px;" data-handle-color="#637283">
                                       {html_notifications}
                                    </ul>
                                 </li>
                              </ul>
                           </li>
                           <!-- END NOTIFICATION DROPDOWN -->
                           <li class="separator hide"> </li>
                           <!-- BEGIN USER LOGIN DROPDOWN -->
                           <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                           <li class="dropdown dropdown-user dropdown-dark">
                              <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                 <span class="username username-hide-on-mobile"> {usuario_nome} </span>
                                 <!-- DOC: Do not remove below empty space(&nbsp;) as its purposely used -->
                                 {avatar} 
                              </a>
                              <ul class="dropdown-menu dropdown-menu-default">
                                 <li>
                                    <a href="meusdados">
                                    <i class="icon-user"></i> Profile </a>
                                 </li>
                                 <li class="divider"> </li>
                                 <li>
                                    <a href="login/logout">
                                    <i class="icon-key"></i> Logout </a>
                                 </li>
                              </ul>
                           </li>
                           <!-- END USER LOGIN DROPDOWN -->
                           <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                           <!-- END QUICK SIDEBAR TOGGLER -->
                        </ul>
                     </div>
                     <!-- END TOP NAVIGATION MENU -->
                  </div>
                  <!--<div style="float:left; margin-top: 0px;"><h2>TITULO CABCEÇALHO</h2></div>-->           
                  <!-- END PAGE TOP -->
               </div>
               <!-- END HEADER INNER -->
            </div>
            <!-- END HEADER -->
            <!-- BEGIN HEADER & CONTENT DIVIDER -->
            <div class="clearfix"> </div>
            <!-- END HEADER & CONTENT DIVIDER -->
            <!-- BEGIN CONTAINER -->
            <div class="page-container">
            <div class="page-sidebar-wrapper">
               <div class="page-sidebar navbar-collapse collapse">
                  <ul class="page-sidebar-menu   " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                     {menu}
                  </ul>
               </div>
               <!-- END SIDEBAR -->
            </div>
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
            <!-- BEGIN CONTENT BODY -->
            <div class="page-content">
               <!-- BEGIN PAGE HEAD-->
               <div class="page-head">
                  <!-- BEGIN PAGE TITLE -->
                  <div class="page-title">
                     <h1>
                        {page_title}
                        <!-- <small>blank page layout</small> -->
                     </h1>
                  </div>
               </div>
               <!-- END PAGE HEAD-->
               <!-- BEGIN PAGE BREADCRUMB -->
               <ul class="page-breadcrumb breadcrumb">
                  {breadcrumbs}
               </ul>
               <!-- END PAGE BREADCRUMB -->
               {msg}               
               <!-- END cabecalho -->
               <!-- BEGIN footer -->
            </div>
            <!-- END CONTAINER -->
            <!-- BEGIN FOOTER -->
            <div class="page-footer">
               <div class="page-footer-inner"> 2010 - {anoatual} &copy; {TITULO_SISTEMA}.
               </div>
               <div class="scroll-to-top">
                  <i class="icon-arrow-up"></i>
               </div>
            </div>
            <!-- END FOOTER -->
            <!--[if lt IE 9]>
            <script src="assets/global/plugins/respond.min.js"></script>
            <script src="assets/global/plugins/excanvas.min.js"></script> 
            <![endif]-->
            <!-- BEGIN CORE PLUGINS -->
            <script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
            <script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
            <script src="assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
            <script src="assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
            <script src="assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
            <script src="assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
            <script src="assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
            <!-- END CORE PLUGINS -->
            <!-- BEGIN THEME GLOBAL SCRIPTS -->
            <script src="assets/global/scripts/app.min.js" type="text/javascript"></script>
            <!-- END THEME GLOBAL SCRIPTS -->
            <!-- BEGIN THEME LAYOUT SCRIPTS -->
            <script src="assets/layouts/layout4/scripts/layout.min.js" type="text/javascript"></script>
            <script src="assets/layouts/layout4/scripts/demo.min.js" type="text/javascript"></script>
            <script src="assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
            <!-- END THEME LAYOUT SCRIPTS -->
            <script src="assets/global/scripts/datatable.js" type="text/javascript"></script>
            <script src="assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
            <script src="assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
            <script src="assets/pages/scripts/table-datatables-colreorder.min.js" type="text/javascript"></script>
            <script src="assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
            <script src="assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
            <script src="assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
            <script src="assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
            <script src="assets/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js" type="text/javascript"></script>
            <script src="assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js" type="text/javascript"></script>
            <script src="assets/global/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
            <script src="assets/global/plugins/bootstrap-markdown/lib/markdown.js" type="text/javascript"></script>
            <script src="assets/global/plugins/bootstrap-markdown/js/bootstrap-markdown.js" type="text/javascript"></script>
            <script src="assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
            <script src="assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
            <script src="assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
            <script src="assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
            <script src="assets/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js" type="text/javascript"></script>
            <script src="assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js" type="text/javascript"></script>
            <script src="assets/global/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
            <script src="assets/global/plugins/bootstrap-markdown/lib/markdown.js" type="text/javascript"></script>
            <script src="assets/global/plugins/bootstrap-markdown/js/bootstrap-markdown.js" type="text/javascript"></script>
            <script src="assets/global/plugins/dropzone/dropzone.min.js" type="text/javascript"></script>
            <script src="assets/pages/scripts/form-dropzone.min.js" type="text/javascript"></script>
            <script src="assets/global/plugins/amcharts/amcharts/amcharts.js" type="text/javascript"></script>
            <script src="assets/global/plugins/amcharts/amcharts/serial.js" type="text/javascript"></script>
            <script src="assets/global/plugins/amcharts/amcharts/pie.js" type="text/javascript"></script>
            <script src="assets/global/plugins/amcharts/amcharts/radar.js" type="text/javascript"></script>
            <script src="assets/global/plugins/amcharts/amcharts/themes/light.js" type="text/javascript"></script>
            <script src="assets/global/plugins/amcharts/amcharts/themes/patterns.js" type="text/javascript"></script>
            <script src="assets/global/plugins/amcharts/amcharts/themes/chalk.js" type="text/javascript"></script>
            <script src="assets/global/plugins/amcharts/ammap/ammap.js" type="text/javascript"></script>
            <script src="assets/global/plugins/amcharts/ammap/maps/js/worldLow.js" type="text/javascript"></script>
            <script src="assets/global/plugins/amcharts/amstockcharts/amstock.js" type="text/javascript"></script>
            <script src="assets/global/plugins/bootstrap-select/js/bootstrap-select.min.js" type="text/javascript"></script>
            <script src="assets/pages/scripts/components-bootstrap-select.min.js" type="text/javascript"></script>
            <!-- <script src="assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>-->
            <script src="assets/global/plugins/moment.min.js" type="text/javascript"></script>
            <script src="assets/global/plugins/fullcalendar/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
            <script src="assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
            <script src="assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
            <script src="assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
            <script src="assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
            <script src="assets/global/plugins/clockface/js/clockface.js" type="text/javascript"></script>
            <script src="assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>
            <script src="assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
            <script src="assets/pages/scripts/components-select2.min.js" type="text/javascript"></script>
            <script src="assets/global/plugins/bootstrap-tabdrop/js/bootstrap-tabdrop.js" type="text/javascript"></script>
            <script src="assets/global/scripts/jquery.maskMoney.js" type="text/javascript"></script>
            <script src="assets/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js" type="text/javascript"></script>
            <link href="3rd_party/jquery.signature.css" rel="stylesheet">
            <script type="text/javascript" src="3rd_party/jquery.ui.touch-punch.min.js"></script>
            <script src="3rd_party/jquery.signature.js"></script>
            <script>
               {init_charts}   
               
               function MascaraDecimal(objTextBox, SeparadorMilesimo, SeparadorDecimal, e){
                var sep = 0;
                var key = '';
                var i = j = 0;
                var len = len2 = 0;
                var strCheck = '0123456789';
                var aux = aux2 = '';
                var whichCode = (window.Event) ? e.which : e.keyCode;
                if (whichCode == 13) return true;
                key = String.fromCharCode(whichCode); // Valor para o código da Chave
                if (strCheck.indexOf(key) == -1) return false; // Chave inválida
                len = objTextBox.value.length;
                for(i = 0; i < len; i++)
                    if ((objTextBox.value.charAt(i) != '0') && (objTextBox.value.charAt(i) != SeparadorDecimal)) break;
                aux = '';
                for(; i < len; i++)
                    if (strCheck.indexOf(objTextBox.value.charAt(i))!=-1) aux += objTextBox.value.charAt(i);
                aux += key;
                len = aux.length;
                if (len == 0) objTextBox.value = '';
                if (len == 1) objTextBox.value = '0'+ SeparadorDecimal + '0' + aux;
                if (len == 2) objTextBox.value = '0'+ SeparadorDecimal + aux;
                if (len > 2) {
                    aux2 = '';
                    for (j = 0, i = len - 3; i >= 0; i--) {
                        if (j == 3) {
                            aux2 += SeparadorMilesimo;
                            j = 0;
                        }
                        aux2 += aux.charAt(i);
                        j++;
                    }
                    objTextBox.value = '';
                    len2 = aux2.length;
                    for (i = len2 - 1; i >= 0; i--)
                    objTextBox.value += aux2.charAt(i);
                    objTextBox.value += SeparadorDecimal + aux.substr(len - 2, len);
                }
                return false;
               }
               
               function MascaraMoeda(objTextBox, SeparadorMilesimo, SeparadorDecimal, e){
                var sep = 0;
                var key = '';
                var i = j = 0;
                var len = len2 = 0;
                var strCheck = '0123456789';
                var aux = aux2 = '';
                var whichCode = (window.Event) ? e.which : e.keyCode;
                if (whichCode == 13 || whichCode == 8 || whichCode == 0) return true;
                key = String.fromCharCode(whichCode); // Valor para o cï¿½digo da Chave
                if (strCheck.indexOf(key) == -1) return false; // Chave invï¿½lida
                len = objTextBox.value.length;
                for(i = 0; i < len; i++)
                    if ((objTextBox.value.charAt(i) != '0') && (objTextBox.value.charAt(i) != SeparadorDecimal)) break;
                aux = '';
                for(; i < len; i++)
                    if (strCheck.indexOf(objTextBox.value.charAt(i))!=-1) aux += objTextBox.value.charAt(i);
                aux += key;
                len = aux.length;
                if (len == 0) objTextBox.value = '';
                if (len == 1) objTextBox.value = '0'+ SeparadorDecimal + '0' + aux;
                if (len == 2) objTextBox.value = '0'+ SeparadorDecimal + aux;
                if (len > 2) {
                    aux2 = '';
                    for (j = 0, i = len - 3; i >= 0; i--) {
                        if (j == 3) {
                            aux2 += SeparadorMilesimo;
                            j = 0;
                        }
                        aux2 += aux.charAt(i);
                        j++;
                    }
                    objTextBox.value = '';
                    len2 = aux2.length;
                    for (i = len2 - 1; i >= 0; i--)
                    objTextBox.value += aux2.charAt(i);
                    objTextBox.value += SeparadorDecimal + aux.substr(len - 2, len);
                }
                return false;
               }
               
               
               
               $(function(){
                $("#upload_link").on('click', function(e){
                    e.preventDefault();
                    $("#uploadavatar:hidden").trigger('click');
                });
               
                $("#upload_link2").on('click', function(e){
                    e.preventDefault();
                    $("#uploadavatar:hidden").trigger('click');
                });
               
                $("#upload_link3").on('click', function(e){
                    e.preventDefault();
                    $("#uploadavatar2:hidden").trigger('click');
                });
               
                $("#upload_link4").on('click', function(e){
                    e.preventDefault();
                    $("#uploadavatar2:hidden").trigger('click');
                });
               
                $("#upload_link5").on('click', function(e){
                    e.preventDefault();
                    $("#uploadavatar3:hidden").trigger('click');
                });
               
                $("#upload_link6").on('click', function(e){
                    e.preventDefault();
                    $("#uploadavatar3:hidden").trigger('click');
                });
               
                  {avatarsJs2}
                  
               $("#upload_link_1a").on('click', function(e){e.preventDefault(); $("#uploadavatar_1a:hidden").trigger('click');});
               $("#upload_link_2a").on('click', function(e){e.preventDefault(); $("#uploadavatar_2a:hidden").trigger('click');});
               $("#upload_link_3a").on('click', function(e){e.preventDefault(); $("#uploadavatar_3a:hidden").trigger('click');});
               $("#upload_link_4a").on('click', function(e){e.preventDefault(); $("#uploadavatar_4a:hidden").trigger('click');});
               $("#upload_link_5a").on('click', function(e){e.preventDefault(); $("#uploadavatar_5a:hidden").trigger('click');});
               $("#upload_link_6a").on('click', function(e){e.preventDefault(); $("#uploadavatar_6a:hidden").trigger('click');});
               $("#upload_link_7a").on('click', function(e){e.preventDefault(); $("#uploadavatar_7a:hidden").trigger('click');});
               $("#upload_link_8a").on('click', function(e){e.preventDefault(); $("#uploadavatar_8a:hidden").trigger('click');});
               $("#upload_link_9a").on('click', function(e){e.preventDefault(); $("#uploadavatar_9a:hidden").trigger('click');});
               $("#upload_link_10a").on('click', function(e){e.preventDefault(); $("#uploadavatar_10a:hidden").trigger('click');});
               $("#upload_link_11a").on('click', function(e){e.preventDefault(); $("#uploadavatar_11a:hidden").trigger('click');});
               $("#upload_link_12a").on('click', function(e){e.preventDefault(); $("#uploadavatar_12a:hidden").trigger('click');});
               $("#upload_link_13a").on('click', function(e){e.preventDefault(); $("#uploadavatar_13a:hidden").trigger('click');});
               $("#upload_link_14a").on('click', function(e){e.preventDefault(); $("#uploadavatar_14a:hidden").trigger('click');});
               $("#upload_link_15a").on('click', function(e){e.preventDefault(); $("#uploadavatar_15a:hidden").trigger('click');});
               $("#upload_link_16a").on('click', function(e){e.preventDefault(); $("#uploadavatar_16a:hidden").trigger('click');});
               $("#upload_link_17a").on('click', function(e){e.preventDefault(); $("#uploadavatar_17a:hidden").trigger('click');});
               $("#upload_link_18a").on('click', function(e){e.preventDefault(); $("#uploadavatar_18a:hidden").trigger('click');});
               $("#upload_link_19a").on('click', function(e){e.preventDefault(); $("#uploadavatar_19a:hidden").trigger('click');});
               $("#upload_link_20a").on('click', function(e){e.preventDefault(); $("#uploadavatar_20a:hidden").trigger('click');});
                
               
               
               
               
               
               });        
               
               
               
               
               
               document.getElementById("uploadavatar").onchange = function () {
                var reader = new FileReader();
               
                reader.onload = function (e) {
                    // get loaded data and render thumbnail.
                    document.getElementById("theavatar").src = e.target.result;
                };
               
                // read the image file as a data URL.
                reader.readAsDataURL(this.files[0]);
               };
               
               
               document.getElementById("uploadavatar2").onchange = function () {
                var reader = new FileReader();
               
                reader.onload = function (e) {
                    // get loaded data and render thumbnail.
                    document.getElementById("theavatar2").src = e.target.result;
                };
               
                // read the image file as a data URL.
                reader.readAsDataURL(this.files[0]);
               };
               
               
               document.getElementById("uploadavatar3").onchange = function () {
                var reader = new FileReader();
               
                reader.onload = function (e) {
                    // get loaded data and render thumbnail.
                    document.getElementById("theavatar3").src = e.target.result;
                };
               
                // read the image file as a data URL.
                reader.readAsDataURL(this.files[0]);
               };
               
               
               
               
               $(document).ready(function(){
               
                  
                $('#driver').change(function(){
                $('#driver_data').load('index.php?module=home&method=ajax_driver&id_driver='+$('#driver').val() );
                
                });
               
               
                $('#trucking_co').change(function(){
                $('#driver').load('index.php?module=home&method=ajax_truckin_co&id_truckin_co='+encodeURI($('#trucking_co').val()) );
                
                });
               
               
               
               $("#add_servico").blur(function(){
               
                    // $('#listagem_details').append('<tr><td></td><td></td><td></td><td></td><td></td></tr>');
                  var totalDetails = document.getElementById("add_servico").value;
                    
               $("#listagem_details").empty();
               
                  for(var i = 0; i < totalDetails; i++)
                  {
                     if(i == 0)
                     {
                       $('#listagem_details').append('<tr><td><select class="form-control" name="id_ca_volumes_types[]">{listagem_volumes_types}</select></td><td><input type="text" name="weight[]" id="weight_'+i+'" class="form-control" onKeyPress="return(MascaraDecimal(this,\'\',\'.\',event))"></td><td><input type="text" name="tracking_number[]" id="tracking_number_'+i+'" class="form-control" tabindex="'+(i+100)+'"></td><td><input type="number"  min="0"  name="subvolumes[]" id="subvolumes_'+i+'" class="form-control" value="0"></td><td><input type="checkbox" name="commat[]" value="1" id="switch'+(i+100)+'"><label class="labela" for="switch'+(i+100)+'">Toggle</label></td><td><a href="#" class="remover_campo">Remove</a></td><td><a href="javascript:void(0);" class="applyToAll" onClick="applyToAll('+(i+100)+')">Apply to All</a></td></tr>');
                   }
                     else
                     {
                        $('#listagem_details').append('<tr><td><select class="form-control" name="id_ca_volumes_types[]">{listagem_volumes_types}</select></td><td><input type="text" name="weight[]" id="weight_'+i+'" class="form-control"  onKeyPress="return(MascaraDecimal(this,\'\',\'.\',event))"></td><td><input type="text" name="tracking_number[]" id="tracking_number_'+i+'" class="form-control"  tabindex="'+(i+100)+'"></td><td><input type="number"  min="0"  name="subvolumes[]" id="subvolumes_'+i+'" class="form-control" value="0"></td><td><input type="checkbox" name="commat[]" value="1" id="switch'+(i+100)+'"><label class="labela" for="switch'+(i+100)+'">Toggle</label></td><td><a href="#" class="remover_campo">Remove</a></td><td><a href="javascript:void(0);" class="clone_campo" onClick="cloneCampo('+(i+100)+')">Clone</a></td></tr>');
                     }
                  }
                     
                
                });
                
                
               $('#listagem_details').on("click",".remover_campo",function(e) {
                            e.preventDefault();
                            $(this).parent().parent().remove();
                    });
                
                
               });
               
               
               function cloneCampo(campoAtual)
               {
                  if(campoAtual > 0)
                  {
                     var j = parseInt(campoAtual)-parseInt(1);
                     
                     document.getElementById("weight_"+campoAtual).value = document.getElementById("weight_"+j).value;
                     document.getElementById("tracking_number_"+campoAtual).value = document.getElementById("tracking_number_"+j).value;
                     document.getElementById("subvolumes_"+campoAtual).value = document.getElementById("subvolumes_"+j).value;
                  }
               }
               
               function applyToAll()
               {
                
                  var totalDetails = document.getElementById("add_servico").value;
               
                  for(var i = 1; i <= totalDetails; i++)
                  {
                     document.getElementById("weight_"+i).value = document.getElementById("weight_0").value;
                     document.getElementById("tracking_number_"+i).value = document.getElementById("tracking_number_0").value;
                     document.getElementById("subvolumes_"+i).value = document.getElementById("subvolumes_0").value;
                     
                  }
                
               }
               
               
               function duplicateFromAbove(campoAtual)
               {
                  if(campoAtual > 0)
                  {
                     var j = parseInt(campoAtual)-parseInt(1);
                     
                    // document.getElementById("tracking_number_"+campoAtual).value = document.getElementById("tracking_number_"+j).value;
                     
                     var ca_volume_type = document.getElementById("id_ca_volumes_types_"+j).selectedIndex;
                     
                     document.getElementById("id_ca_volumes_types_"+campoAtual).selectedIndex = ca_volume_type;
                     
                     
                     document.getElementById("weight_"+campoAtual).value = document.getElementById("weight_"+j).value;
                     document.getElementById("length_"+campoAtual).value = document.getElementById("length_"+j).value;
                     document.getElementById("width_"+campoAtual).value = document.getElementById("width_"+j).value;
                     document.getElementById("height_"+campoAtual).value = document.getElementById("height_"+j).value;
                     document.getElementById("subvolumes_"+campoAtual).value = document.getElementById("subvolumes_"+j).value;
                     document.getElementById("description_"+campoAtual).value = document.getElementById("description_"+j).value;
                     document.getElementById("location_"+campoAtual).value = document.getElementById("location_"+j).value;
                  
                  }
               }
               
               
               $(function(){
                
                $("#invoice_valor").maskMoney({symbol:"", decimal:",", thousands:"."});
                $("#currency").maskMoney();
                $("#valor").maskMoney({symbol:"R$", decimal:",", thousands:"."});
                $("#precision").maskMoney({precision:3})
                $("#saldo_").maskMoney({symbol:"R$", decimal:",", thousands:"."});
                $("#limite_").maskMoney({symbol:"R$", decimal:",", thousands:"."});
                $("#chequeEspecial").maskMoney({symbol:"R$", decimal:",", thousands:"."});
               
               })
               function removeMask(){
                $("#currency").unmaskMoney();
               }
            </script><!-- BEGIN HEAD -->
         </body>
      </html>
      <!-- END footer -->
      <!-- BEGIN cabecalho_deslogado -->
      <!DOCTYPE html>
      <!--[if IE 8]> 
      <html lang="en" class="ie8 no-js">
         <![endif]-->
         <!--[if IE 9]> 
         <html lang="en" class="ie9 no-js">
            <![endif]-->
            <!--[if !IE]><!-->
            <html lang="en">
               <!--<![endif]-->
               <!-- BEGIN HEAD -->
               <head>
                  <meta charset="utf-8" />
                  <title>{TITULO_SISTEMA}</title>
                  <meta http-equiv="X-UA-Compatible" content="IE=edge">
                  <meta content="width=device-width, initial-scale=1" name="viewport" />
                  <meta content="" name="description" />
                  <meta content="" name="author" />
                  <base href="{ABS_LINK}" />
                  <!-- BEGIN GLOBAL MANDATORY STYLES -->
                  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
                  <link href="assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
                  <link href="assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
                  <link href="assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
                  <link href="assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
                  <!-- END GLOBAL MANDATORY STYLES -->
                  <!-- BEGIN THEME GLOBAL STYLES -->
                  <link href="assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
                  <link href="assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
                  <!-- END THEME GLOBAL STYLES -->
                  <!-- BEGIN THEME LAYOUT STYLES -->
                  <link href="assets/layouts/layout4/css/layout.min.css" rel="stylesheet" type="text/css" />
                  <link href="assets/layouts/layout4/css/themes/light.min.css" rel="stylesheet" type="text/css" id="style_color" />
                  <link href="assets/layouts/layout4/css/custom.min.css" rel="stylesheet" type="text/css" />
                  <!-- END THEME LAYOUT STYLES -->
                  <link href="assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
                  <link href="assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
                  <link href="assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
                  <link href="assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
                  <link href="assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
                  <link href="assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css" rel="stylesheet" type="text/css" />
                  <link href="assets/global/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css" rel="stylesheet" type="text/css" />
                  <link href="assets/global/plugins/dropzone/dropzone.min.css" rel="stylesheet" type="text/css" />
                  <link href="assets/global/plugins/dropzone/basic.min.css" rel="stylesheet" type="text/css" />
                  <link href="assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
                  <link href="assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
                  <link href="assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
                  <link href="assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
                  <link href="assets/global/plugins/clockface/css/clockface.css" rel="stylesheet" type="text/css" />
                  <link href="assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
                  <link href="assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
                  <link href="assets/global/plugins/fullcalendar/fullcalendar.css" rel="stylesheet" />
                  <link rel='stylesheet' type='text/css' href='assets/global/plugins/fullcalendar/fullcalendar.print.css' media='print' />
                  <link href="assets/global/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" type="text/css" />
                  <link rel="shortcut icon" href="favicon.ico" />
               </head>
               <!-- END HEAD -->
               <body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo">
                  <!-- BEGIN HEADER -->
                  <div class="page-header navbar navbar-fixed-top">
                     <!-- BEGIN HEADER INNER -->
                     <div class="page-header-inner ">
                        <!-- BEGIN LOGO -->
                        <div class="page-logo">
                           <a href="home">
                           <img src="images/logo-light.png" alt="logo" class="logo-default" style="margin-top:0px;"  /> </a>
                           <div class="menu-toggler sidebar-toggler hide">
                              <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
                           </div>
                        </div>
                        <!-- END LOGO -->
                        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
                        <!-- END RESPONSIVE MENU TOGGLER -->
                        <!-- BEGIN PAGE TOP -->
                        <div class="page-top">
                           <!-- BEGIN HEADER SEARCH BOX -->
                           <!-- DOC: Apply "search-form-expanded" right after the "search-form" class to have half expanded search box -->
                           <!-- END HEADER SEARCH BOX -->
                           <!-- BEGIN TOP NAVIGATION MENU -->
                           <div class="top-menu">
                              <ul class="nav navbar-nav pull-right">
                                 <li class="separator hide"> </li>
                                 <!-- BEGIN NOTIFICATION DROPDOWN -->
                                 <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                                 <!-- END NOTIFICATION DROPDOWN -->
                                 <li class="separator hide"> </li>
                                 <!-- BEGIN USER LOGIN DROPDOWN -->
                                 <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                                 <!-- END USER LOGIN DROPDOWN -->
                                 <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                                 <!-- END QUICK SIDEBAR TOGGLER -->
                              </ul>
                           </div>
                           <!-- END TOP NAVIGATION MENU -->
                        </div>
                        <!--<div style="float:left; margin-top: 0px;"><h2>TITULO CABEÇALHO</h2></div>-->           
                        <!-- END PAGE TOP -->
                     </div>
                     <!-- END HEADER INNER -->
                  </div>
                  <!-- END HEADER -->
                  <!-- BEGIN HEADER & CONTENT DIVIDER -->
                  <div class="clearfix"> </div>
                  <!-- END HEADER & CONTENT DIVIDER -->
                  <!-- BEGIN CONTAINER -->
                  <div class="page-container">
                  <div class="page-sidebar-wrapper">
                     <div class="page-sidebar navbar-collapse collapse">
                     </div>
                     <!-- END SIDEBAR -->
                  </div>
                  <!-- END SIDEBAR -->
                  <!-- BEGIN CONTENT -->
                  <div class="page-content-wrapper">
                  <!-- BEGIN CONTENT BODY -->
                  <div class="page-content">
                  <!-- BEGIN PAGE HEAD-->
                  <div class="page-head">
                     <!-- BEGIN PAGE TITLE -->
                     <div class="page-title">
                        <h1>
                           {page_title}
                           <!-- <small>blank page layout</small> -->
                        </h1>
                     </div>
                  </div>
                  <!-- END PAGE HEAD-->
                  <!-- BEGIN PAGE BREADCRUMB -->
                  <!-- END PAGE BREADCRUMB -->
                  <!-- END cabecalho_deslogado -->