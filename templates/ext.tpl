<!-- BEGIN handover -->
<style type="text/css">
 input[type=checkbox]{
	height: 0;
	width: 0;
	visibility: hidden;
}

.labela {
	cursor: pointer;
	text-indent: -9999px;
	width: 60px;
	height: 31px;
	background: grey;
	display: block;
	border-radius: 100px !important;
	position: relative;
}

.labela:after {
	content: '';
	position: absolute;
	top: 2.5px;
	left: 5px;
	width: 25px;
	height: 25px;
	background: #fff;
	border-radius: 25px;
	transition: 0.3s;
}

input:checked + .labela {
	background: #bada55;
}

input:checked + .labela:after {
	left: calc(100% - 5px);
	transform: translateX(-100%);
}

.labela:active:after {
	width: 30px;
}



</style>

    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light bordered">
                            
                              <!--  <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <span class="caption-subject bold uppercase"></span>
                                    </div>
                                </div> -->
                                <div class="portlet-body">
                                   <form action="index.php?module=ext&method=handover&q=1" method="post" name="forms" class="form-horizontal" enctype="multipart/form-data">
                                                <div class="col-md-2">
                                                   WR #: <br><input type="text" name="number"  class="form-control" value="{wr_number}">
                                                 </div>                                      
                                                <div class="col-md-2">
                                                   Date: <input  type="date" placeholder='DD/MM/YYYY' pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))" name="data_de" maxlength="10"  class="form-control form-control-inline" id="data_de" value="{data_de}" >
                                                 </div>                                      
                                                <div class="col-md-2" >
                                                   To:<input  type="date" placeholder='DD/MM/YYYY' pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))" name="data_ate" maxlength="10"  class="form-control form-control-inline" id="data_ate"  value="{data_ate}" >
                                                 </div>
                                      
                                                <div class="col-md-1" >
                                                   IBEC Cargo:<br>
                                                  <input type="checkbox" name="ibec_cargo" id="ibec_cargo" value="1"><label class="labela" for="ibec_cargo">Toggle</label>
                                                 </div>
                                                   
                                                 <div class="col-md-1" ><br>
                                                   <button type="submit" class="btn green">Filter Results</button>
                                                     </div>       
                                                   
                                   </form>
                                   <br><br><br><br>
                                   
                                   
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
                    </div>





                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                              <br>

                            <div class="portlet light bordered">
                            
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <i class="icon-list font-dark"></i>
                                        <span class="caption-subject bold uppercase">New Handovers</span>
                                    </div>
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
                                    <table class="table table-striped table-bordered table-hover nowrap" id="sample_1">
                                        <thead>
                                            <tr>
                                                <th>Details</th>
                                                <th>Tracking #</th> 
                                                <th>P.O. #</th> 
                                                <th>WR#</th> 
                                                <th>Shipper</th> 
                                                <th>Consignee</th> 
                                                <th>Date</th> 
                                                <th>Total Gross Weight (kg)</th> 
                                                <th>&nbsp;</th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                         				{listagem}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
                    </div>
                                        
                                        
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                              <br>

                            <div class="portlet light bordered">
                            
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <i class="icon-list font-dark"></i>
                                        <span class="caption-subject bold uppercase">Pending Handovers (on Hold)</span>
                                    </div>
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
                                    <table class="table table-striped table-bordered table-hover nowrap" id="sample_2">
                                        <thead>
                                            <tr>
                                                <th>Details</th>
                                                <th>Tracking #</th> 
                                                <th>P.O. #</th> 
                                                <th>WR#</th> 
                                                <th>Shipper</th> 
                                                <th>Consignee</th> 
                                                <th>Date</th> 
                                                <th>Total Gross Weight (kg)</th> 
                                                <th>&nbsp;</th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                         				{listagem_hold}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
                    </div>
                                        
<script>
   
function ordena()
{
   return 1;
} 
</script>                                        
<!-- END handover -->


<!-- BEGIN novohandover -->


         <div class="portlet light bordered">
             <div class="portlet-title">
                 <div class="caption">
                     <i class="fa fa-list"></i>New Handover </div>
             </div>
             <div class="portlet-body form">
                 <!-- BEGIN FORM-->
                 <form action="index.php?module=ext&method=inserehandover" method="post" name="editar"  class="form-horizontal" enctype="multipart/form-data">
                    <input type="hidden" name="datacliente" id="datacliente">
                    <input type="hidden" name="id_wr" value="{id_wr}">
                     <div class="form-body">
                        
                         <div class="form-group">
                             <label class="col-md-3 control-label">Shipper</label>
                             <div class="col-md-4">
                                 <input type="text" class="form-control" placeholder="" name="shipper" readonly value="{shipper_name}">
                                 <span class="help-block"></span>
                             </div>
                         </div>
                                 
                                 
                         <div class="form-group">
                             <label class="col-md-3 control-label">Consignee</label>
                             <div class="col-md-4">
                                 <input type="text" class="form-control" placeholder="" name="consignee" readonly value="{consignee_name}">
                                 <span class="help-block"></span>
                             </div>
                         </div>
                                 
                                 
                         <div class="form-group">
                             <label class="col-md-3 control-label">WR Number</label>
                             <div class="col-md-4">
                                 <input type="text" class="form-control" placeholder="" name="number" readonly value="{number}">
                                 <span class="help-block"></span>
                             </div>
                         </div>
                                 
                         <div class="form-group">
                             <label class="col-md-3 control-label">Known/Unknown Shipper</label>
                             <div class="col-md-4">
                                 <input type="text" class="form-control" placeholder="" name="known" readonly value="{known}">
                                 <span class="help-block"></span>
                             </div>
                         </div>
                                 

                         <div class="form-group">
                             <label class="col-md-3 control-label">Date</label>
                             <div class="col-md-4">
                                 <input type="date" class="form-control" placeholder="" name="date" value="{wr_date}" id="date_c" readonly>
                                 <span class="help-block"></span>
                             </div>
                         </div>

                         <div class="form-group">
                             <label class="col-md-3 control-label">Time</label>
                             <div class="col-md-4">
                                 <input type="time" class="form-control" placeholder="" name="time" value="{wr_time}" id="time_c" readonly>
                                 <span class="help-block"></span>
                             </div>
                         </div>
                                 
                         <div class="form-group">
                             <label class="col-md-3 control-label">DMS Number</label>
                             <div class="col-md-4">
                                 <input type="text" class="form-control" placeholder="" name="dmsorder" id="dmsorder" required value="{dmsorder}">
                                 <span class="help-block"></span>
                             </div>
                             <button type="submit" name="btn_dmsorder" class="btn blue">Load Volume Items</button>
                         </div>
                                 
                            
                                 {items}
                            
                     </div>
                            
                            
                            <div class="row">
                              
                                <div class="col-md-6">
                                <div class="portlet light bordered">
                            
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <i class="icon-list font-dark"></i>
                                        <span class="caption-subject bold uppercase">Compliance Checklist</span>
                                    </div>
                                    
                                   
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
                                    <table class="table table-striped table-bordered table-hover nowrap" id="sample_100">
                                        <thead>
                                            <tr>
                                                <th>Item</th> 
                                                <th>Answer</th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                         				{listagem_checklist}
                                        </tbody>
                                    </table>
                                        
                                </div>
                            </div>
                                </div>
                                        
                                        
                                        <div class="col-md-6">

                           <div class="portlet light bordered">
                            
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <i class="icon-list font-dark"></i>
                                        <span class="caption-subject bold uppercase">Warehouse Receipt Reference Links</span>
                                    </div>
                                    
                                   
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
                                    <table class="table table-striped table-bordered table-hover nowrap" id="sample_10">
                                        <thead>
                                            <tr>
                                                <th>Name</th> 
                                                <th>View/Download</th> 
                                            </tr>
                                        </thead>
                                        <tbody id="listagem_details">
                         				{listagem_details}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                                        </div>
                            </div>                                        
                                        
                     <div class="form-actions">
                         <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                               <div  id="holdbutton" style="display:none;">
                                   <button type="button"onClick="enviaDireto()" class="btn yellow" style="width:300px;">Hold Handover</button>
                               </div>
                               <div  id="finalizebutton">
                                   <button type="button" onClick="{validacao_envio}()" class="btn green" style="width:300px;">Finalize Handover</button>
                               </div><br>
                                   <a href="javascript:void(0);" onclick="history.back()"><button type="button" class="btn red"  style="width:300px;">Cancel</button></a>
                             </div>
                         </div>
                     </div>
                 </form>
                 <!-- END FORM-->
             </div>
         </div>
                                   <a data-toggle="modal" href="#shipper_confirm" onclick="javascript:void(0);" style="display: none;" id="modal_trigger"></a>
{modal_confirm_shipper}
                                        
<script>
 /*
function carregaVolume()
{
   var dmsorder = document.getElementById("dmsorder").value;
   const urlItems = 'http://localhost/dev/dmsws/index.php?module=ext&method=loadJsonItems&dmsorder='+dmsorder;
   const Http = new XMLHttpRequest();
   Http.open("GET", urlItems);
   Http.send();
}
*/
   function activateFinalize()
 {

      var restricted = "0";
      var restricted1 = "0";
      var restricted2 = "0";

   var radios = document.getElementsByName('ac_3');

   for (var i = 0, length = radios.length; i < length; i++) {

   if(radios[i].checked)
   {
       if(radios[i].value == "1")
      {
            restricted = "0";
      }
      if(radios[i].value == "0")
      {
            restricted = "1";
      }
      break;
   }

   }  
   
   var   radios1 = document.getElementsByName('ac_4');

   for (var i = 0, length = radios1.length; i < length; i++) {

   if(radios1[i].checked)
   {
      if(radios1[i].value == "1")
      {
            restricted1 = "0";
      }
      if(radios1[i].value == "0")
      {
            restricted1 = "1";
      }
      break;
   }

   }    
   /*
   
     var  radios2 = document.getElementsByName('ac_5');

   for (var i = 0, length = radios2.length; i < length; i++) {

   if(radios2[i].checked)
   {
      if(radios2[i].value == "1")
      {
            restricted2 = "0";
      }
      if(radios2[i].value == "0")
      {
            restricted2 = "1";
      }
      break;
   }

   }    
*/   

      if(restricted == "1" || restricted1 == "1")
      {
         document.getElementById("finalizebutton").style.display = "none";
         document.getElementById("holdbutton").style.display = "block";
      }
      else
      {
         document.getElementById("finalizebutton").style.display = "block";
         document.getElementById("holdbutton").style.display = "none";

      }
   
 }

  
    function validaEnvioShipper()
  {
       document.getElementById('modal_trigger').click();
  }
  
  function enviaDireto()
  {
       document.editar.submit();
  }
  
  function validaEnvio()
  {
     if(document.getElementById("dmsorder").value=="")
     {
        alert("Fill the Order Number!");
     }
     else
     {
       document.editar.submit();
    }
  }

  
 function showException(campo)
 {
    
    if(campo == 4)
       document.getElementById("exception").style.display = "block";
    else
       document.getElementById("exception").style.display = "none";
       
 }

  function hideException()
 {
    document.getElementById("exception").style.display = "none";
 }

   
function ordena()
{
   return 1;
} 
</script>                                        
<style type="text/css">
#uploadavatar{
    display:none;
}
#uploadavatar2{
    display:none;
}
#uploadavatar3{
    display:none;
}

   
   input[type=checkbox]{
	height: 0;
	width: 0;
	visibility: hidden;
}

.labela {
	cursor: pointer;
	text-indent: -9999px;
	width: 60px;
	height: 31px;
	background: grey;
	display: block;
	border-radius: 100px !important;
	position: relative;
}

.labela:after {
	content: '';
	position: absolute;
	top: 2.5px;
	left: 5px;
	width: 25px;
	height: 25px;
	background: #fff;
	border-radius: 25px;
	transition: 0.3s;
}

input:checked + .labela {
	background: #bada55;
}

input:checked + .labela:after {
	left: calc(100% - 5px);
	transform: translateX(-100%);
}

.labela:active:after {
	width: 30px;
}




</style>                                        
 <script>
 
   
var today = new Date();
var currenttime = new Date();

var dd = today.getDate();
var mm = today.getMonth() + 1; //January is 0!
var yyyy = today.getFullYear();
var seconds = currenttime.getSeconds();
var minutes = currenttime.getMinutes();
var hour = currenttime.getHours();

if (dd < 10) {
  dd = '0' + dd
}

if (mm < 10) {
  mm = '0' + mm
}

today = `${yyyy}-${mm}-${dd}`;
currenttime = `${hour}:${minutes}`;

document.getElementById('datacliente').value = today+' '+currenttime;

  

</script>

<!-- END novohandover -->

<!-- BEGIN confirmedhandover -->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                             

                            <div class="portlet light bordered">
                            
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <i class="icon-list font-dark"></i>
                                        <span class="caption-subject bold uppercase">Handover Complete!</span>
                                    </div>
                                    
                                   
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
                                   <span> <h4>This process now is ready to ship.</h4> <span><br>
                                  <h3 style="font-weight:bold;">WR#: {wr_number}</h3><br>
                                  <h4>{msg_continue}</h4>
                                      <a href="index.php?module=ext&method=handover&j=YsCwvpx87CeTgAnv"><button type="button" class="btn green" style="width:300px;">Start New Handover</button></a>
                                   
                                   
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
                    </div>

<!-- END confirmedhandover -->


<!-- BEGIN error -->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                             

                            <div class="portlet light bordered">
                            
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <i class="icon-list font-dark"></i>
                                        <span class="caption-subject bold uppercase">WARNING!</span>
                                    </div>
                                    
                                   
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
                                   <span> <h4>Handover could not be completed due to the following issues:</h4> <span><br>
                                         <span><h4><strong>{handover_restrito_motivo}</strong></h4></span>    <br><br>
                                         
                                         <span><h4><strong>{hold_message}</strong></h4></span>    <br><br>
                                         
                                      <a href="index.php?module=ext&method=novohandover&id_wr={id_wr}"><button type="button" class="btn red" style="width:300px;">Back to Handover</button></a>
                                   
                                      <a href="index.php?module=ext&method=handover&j=YsCwvpx87CeTgAnv&code={code}"><button type="button" class="btn blue" style="width:300px;">Back to New Handovers List</button></a>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
                    </div>

<!-- END error -->

<!-- BEGIN appeal -->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                             

                            <div class="portlet light bordered">
                            
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <i class="icon-list font-dark"></i>
                                        <span class="caption-subject bold uppercase">WARNING!</span>
                                    </div>
                                    
                                   
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
                                   <span> <h4>Handover Appeal: You checked  the handover as "Appeal". An email was sent to the responsible person to verify this information within 24 hours.</h4> <span><br>
                                      <a href="index.php?module=ext&method=novohandover&id_wr={id_wr}"><button type="button" class="btn red" style="width:300px;">Back to Handover</button></a>
                                   
                                          <a href="index.php?module=ext&method=handover&j=YsCwvpx87CeTgAnv&code={code}"><button type="button" class="btn blue" style="width:300px;">Back to New Handovers List</button></a>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
                    </div>

<!-- END appeal -->