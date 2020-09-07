<!-- BEGIN main -->
 <script>
function ordena()
{
   return 2;
}
</script>

                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                             <div>
                                 <button class="btn green" onClick="location='index.php?module=usuarios&method=usuarionovo';">+ Add New User <i class="fa fa-plus"></i></button>
                                   
                              </div>
                              <br>

                            <div class="portlet light bordered">
                            
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <i class="icon-list font-dark"></i>
                                        <span class="caption-subject bold uppercase">User List</span>
                                    </div>
                                    
                                   
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
                                    <table class="table table-striped table-bordered table-hover" id="sample_1">
                                        <thead>
                                            <tr>
                                                <th>Name</th> 
                                                <th>Email</th> 
                                                <th>Group</th> 
                                                <th>&nbsp;</th> 
                                                <th>&nbsp;</th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                         				{usuarios_listagem}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
                    </div>
<!-- END main -->


<!-- BEGIN edita_usuario -->
<script language="javascript">
   
   function changePermissions(idGrupo)
   {
      
      var itens = '{listagemGrupos}';
      var res = itens.split("|");
      var objeto; 
      var grupo; 
      var id_menu; 
      var permissao; 
      
      var inputs = $('input[type=checkbox]');

      inputs.attr('checked', false);
      inputs.prop('checked', false);      
      
      for(var i = 0; i < res.length; i++)
      {
         objeto = res[i].split(",");
         
         grupo = objeto[0];
         id_menu = objeto[1];
         permissao = objeto[2];

         if(grupo == idGrupo)
         {
            
            if(permissao == "1")
            {
               document.getElementById('produtos_'+id_menu).checked = true;
            }
            else
            {
               document.getElementById('produtos_'+id_menu).checked = false;
            }
         }
         
      }
   }
   </script>

                                        <div class="portlet box blue-dark">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="fa fa-user"></i>Edit User </div>
                                                    <!--
                                                <div class="tools">
                                                    <a href="javascript:;" class="collapse"> </a>
                                                    <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                                    <a href="javascript:;" class="reload"> </a>
                                                    <a href="javascript:;" class="remove"> </a>
                                                </div>
                                                -->
                                            </div>
                                            <div class="portlet-body form">
                                                <!-- BEGIN FORM-->
                                                <form action="index.php?module=usuarios&method=update" method="post" name="editar"  class="form-horizontal" enctype="multipart/form-data">
                                                   
                                                   <input type="hidden" name="id" value="{id}" />
                                                    <input type="hidden" name="senha_old" value="{senha}" />
                                                    <input type="hidden" name="exception" value="{excpt_value}" />
                                                    
                                                    <div class="form-body">
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">Name</label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control" placeholder="" name="nome" value="{nome}" required>
                                                                <span class="help-block">  </span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">Email </label>
                                                            <div class="col-md-4">
                                                                <div class="input-group">
                                                                    
                                                                    <input type="email" name="email" class="form-control" placeholder="" value="{email}"  required>                                                                   
                                                                    <span class="input-group-addon input-circle-right">
                                                                        <i class="fa fa-envelope"></i>
                                                                    </span>
                                                                  </div>
                                                                   <span class="help-block"> (login) </span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">Passowrd</label>
                                                            <div class="col-md-4">
                                                                <div class="input-group">
                                                                    <input type="password" name="senha" class="form-control" placeholder="Senha" value="{senha}"  required>
                                                                    <span class="input-group-addon input-circle-right">
                                                                        <i class="fa fa-key"></i>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">Re-type password</label>
                                                            <div class="col-md-4">
                                                                <div class="input-group">
                                                                    <input type="password" name="senha2" class="form-control" placeholder="Confirm password" value="{senha}"  required>
                                                                    <span class="input-group-addon input-circle-right">
                                                                        <i class="fa fa-key"></i>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        

                                                        

                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">Phone</label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control" placeholder="" name="telefone" value="{telefone}">
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">Photo</label>
                                                            <div class="col-md-4">
                                                            <img src="{avatar}" border="0" width="200" height="200" />
                                                               <input type="file" name="avatar" />
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>

                                                          <div class="form-group">
                                                            <label class="col-md-3 control-label">User Group</label>
                                                            <div class="col-md-4">
                                                                <div class="input-group">
                                                                   <select name="grupo" id="grupo"  class="form-control" onChange="changePermissions(this.value)">
                                                               {listagem_grupos}
                                                           </select>
                                                                </div>
                                                            </div>
                                                        </div>

                     									 <div class="form-group">
                                                            <label class="col-md-3 control-label">Access Levels</label>
                                                            <div class="col-md-8">
                                                			{listagem_privilegios}
                                                            </div>
                                                        </div>


                                                    </div>

                                                    <div class="form-actions">
                                                        <div class="row">
                                                            <div class="col-md-offset-3 col-md-9">
                                                                <button type="submit" class="btn green">Save</button>
                                                                <button type="button" class="btn grey-salsa btn-outline">Cancel</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                                <!-- END FORM-->
                                            </div>
                                        </div>
	<script type="text/javascript">
      /*
    $(document).ready(function(){
    $('#estados').change(function(){
    $('#cidades').load('index.php?module=meus_dados&method=ajax_cidade&estado='+$('#estados').val() );
    
    });
    });
    
*/    </script>

                                        
<!-- END edita_usuario -->



<!-- BEGIN usuario_novo -->
<script language="javascript">
   
   function changePermissions(idGrupo)
   {
      
      var itens = '{listagemGrupos}';
      var res = itens.split("|");
      var objeto; 
      var grupo; 
      var id_menu; 
      var permissao; 
      
      var inputs = $('input[type=checkbox]');

      inputs.attr('checked', false);
      inputs.prop('checked', false);      
      
      for(var i = 0; i < res.length; i++)
      {
         objeto = res[i].split(",");
         
         grupo = objeto[0];
         id_menu = objeto[1];
         permissao = objeto[2];

         if(grupo == idGrupo)
         {
            
            if(permissao == "1")
            {
               document.getElementById('produtos_'+id_menu).checked = true;
            }
            else
            {
               document.getElementById('produtos_'+id_menu).checked = false;
            }
         }
         
      }
   }
   </script>

                                        <div class="portlet box blue-dark">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="fa fa-user"></i>New User </div>
                                                    <!--
                                                <div class="tools">
                                                    <a href="javascript:;" class="collapse"> </a>
                                                    <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                                    <a href="javascript:;" class="reload"> </a>
                                                    <a href="javascript:;" class="remove"> </a>
                                                </div>
                                                -->
                                            </div>
                                            <div class="portlet-body form">
                                                <!-- BEGIN FORM-->
                                                <form action="index.php?module=usuarios&method=insere" method="post" name="editar"  class="form-horizontal" enctype="multipart/form-data">
                                                    <div class="form-body">
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">Name</label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control" placeholder="" name="nome"  required>
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">Email </label>
                                                            <div class="col-md-4">
                                                                <div class="input-group">
                                                                    
                                                                    <input type="email" name="email" class="form-control" placeholder=""  required>                                                                   
                                                                    <span class="input-group-addon input-circle-right">
                                                                        <i class="fa fa-envelope"></i>
                                                                    </span>
                                                                  </div>
                                                                   <span class="help-block"> (login) </span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">Password</label>
                                                            <div class="col-md-4">
                                                                <div class="input-group">
                                                                    <input type="password" name="senha" class="form-control" placeholder="Senha"  required>
                                                                    <span class="input-group-addon input-circle-right">
                                                                        <i class="fa fa-key"></i>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">Re-type Password</label>
                                                            <div class="col-md-4">
                                                                <div class="input-group">
                                                                    <input type="password" name="senha2" class="form-control" placeholder="Confirm password"  required>
                                                                    <span class="input-group-addon input-circle-right">
                                                                        <i class="fa fa-key"></i>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>



                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">Phone</label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control" placeholder="" name="telefone">
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">Photo</label>
                                                            <div class="col-md-4">
                                                               <input type="file" name="avatar" />
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>

                                                          <div class="form-group">
                                                            <label class="col-md-3 control-label">User Group</label>
                                                            <div class="col-md-4">
                                                                <div class="input-group">
                                                           <select name="grupo" id="grupo"  class="form-control"  onChange="changePermissions(this.value)">
                                                              <option value="0">SELECT</option>
                                                               {listagem_grupos}
                                                           </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                           
                                                           
                     									 <div class="form-group">
                                                            <label class="col-md-3 control-label">Access Levels</label>
                                                            <div class="col-md-8">
                                                			{listagem_privilegios}
                                                            </div>
                                                        </div>


                                                    </div>

                                                    <div class="form-actions">
                                                        <div class="row">
                                                            <div class="col-md-offset-3 col-md-9">
                                                                <button type="submit" class="btn green">Save</button>
                                                                <button type="button" class="btn grey-salsa btn-outline">Cancel</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                                <!-- END FORM-->
                                            </div>
                                        </div>
	<script type="text/javascript">
    $(document).ready(function(){
    $('#estados').change(function(){
    $('#cidades').load('index.php?module=meus_dados&method=ajax_cidade&estado='+$('#estados').val() );
    
    });
    });
    
    </script>

<!-- END usuario_novo -->

<!-- BEGIN blank -->

                                       <!-- INICIO BOX CINZA -->
                                        <div class="portlet box blue-dark">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="fa fa-user"></i>TITULO </div>
                                                    <!--
                                                <div class="tools">
                                                    <a href="javascript:;" class="collapse"> </a>
                                                    <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                                    <a href="javascript:;" class="reload"> </a>
                                                    <a href="javascript:;" class="remove"> </a>
                                                </div>
                                                -->
                                            </div>
                                            <div class="portlet-body">
                                             <!-- INICIO CONTEUDO -->

                                             
                                             
                                             
                                             
                                             
                                             
                                             
                                             
                                             <!-- FIM CONTEUDO -->
                                            </div>
                                        </div> 
                                       <!-- FIM BOX CINZA -->
                                       
                                       
	<script type="text/javascript">
    $(document).ready(function(){
    $('#estados').change(function(){
    $('#cidades').load('index.php?module=meus_dados&method=ajax_cidade&estado='+$('#estados').val() );
    
    });
    });
    
    </script>

<!-- END blank -->

<!-- BEGIN grupos -->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                             <div>
                                 <button class="btn green" onClick="location='index.php?module=usuarios&method=novoGrupo';">Create new user group <i class="fa fa-plus"></i></button>
                                   
                              </div>
                              <br>

                            <div class="portlet box blue-dark">
                            
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <i class="icon-list font-dark"></i>
                                        <span class="caption-subject bold uppercase">User Groups</span>
                                    </div>
                                    
                                   
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
                                    <table class="table table-striped table-bordered table-hover" id="sample_1">
                                        <thead>
                                            <tr>
                                                <th>Name</th> 
                                                <th>&nbsp;</th> 
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
<!-- END grupos -->

<!-- BEGIN novoGrupo -->
<script language="javascript">
   
   function changePermissions(idGrupo)
   {
      
      var itens = '{listagemGrupos}';
      var res = itens.split("|");
      var objeto; 
      var grupo; 
      var id_menu; 
      var permissao; 
      
      var inputs = $('input[type=checkbox]');

      inputs.attr('checked', false);
      inputs.prop('checked', false);      
      
      for(var i = 0; i < res.length; i++)
      {
         objeto = res[i].split(",");
         
         grupo = objeto[0];
         id_menu = objeto[1];
         permissao = objeto[2];

         if(grupo == idGrupo)
         {
            
            if(permissao == "1")
            {
               document.getElementById('produtos_'+id_menu).checked = true;
            }
            else
            {
               document.getElementById('produtos_'+id_menu).checked = false;
            }
         }
         
      }
   }
   </script>

                                        <div class="portlet box blue-dark">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="fa fa-user"></i>New User Group </div>
                                            </div>
                                            <div class="portlet-body form">
                                                <!-- BEGIN FORM-->
                                                <form action="index.php?module=usuarios&method=insereGrupo" method="post" name="editar"  class="form-horizontal" enctype="multipart/form-data">
                                                   
                                                    
                                                    <div class="form-body">
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">Name</label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control" placeholder="" name="nome">
                                                                <span class="help-block"> User Group Name. </span>
                                                            </div>
                                                        </div>
                     									 <div class="form-group">
                                                            <label class="col-md-3 control-label">Group Roles</label>
                                                            <div class="col-md-8">
                                                			{listagem_privilegios}
                                                            </div>
                                                        </div>
                                                       

                                                    <div class="form-actions">
                                                        <div class="row">
                                                            <div class="col-md-offset-3 col-md-9">
                                                                <button type="submit" class="btn green">Save</button>
                                                                <button type="button" class="btn grey-salsa btn-outline">Cancel</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                                <!-- END FORM-->
                                            </div>
                                        </div>

                                        
<!-- END novoGrupo -->


<!-- BEGIN editaGrupo -->
<script language="javascript">
   
   function changePermissions(idGrupo)
   {
      
      var itens = '{listagemGrupos}';
      var res = itens.split("|");
      var objeto; 
      var grupo; 
      var id_menu; 
      var permissao; 
      
      var inputs = $('input[type=checkbox]');

      inputs.attr('checked', false);
      inputs.prop('checked', false);      
      
      for(var i = 0; i < res.length; i++)
      {
         objeto = res[i].split(",");
         
         grupo = objeto[0];
         id_menu = objeto[1];
         permissao = objeto[2];

         if(grupo == idGrupo)
         {
            
            if(permissao == "1")
            {
               document.getElementById('produtos_'+id_menu).checked = true;
            }
            else
            {
               document.getElementById('produtos_'+id_menu).checked = false;
            }
         }
         
      }
   }
   </script>

                                        <div class="portlet box blue-dark">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="fa fa-user"></i>Edit User Group </div>
                                            </div>
                                            <div class="portlet-body form">
                                                <!-- BEGIN FORM-->
                                                <form action="index.php?module=usuarios&method=updateGrupo" method="post" name="editar"  class="form-horizontal" enctype="multipart/form-data">
                                                    <input type="hidden" name="id" value="{id}" />
                                                  
                                                    <div class="form-body">
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">Name</label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control" placeholder="" name="nome" value="{nome}">
                                                                <span class="help-block"> User Group Name. </span>
                                                            </div>
                                                        </div>
                     									 <div class="form-group">
                                                            <label class="col-md-3 control-label">Group Roles</label>
                                                            <div class="col-md-8">
                                                			{listagem_privilegios}
                                                            </div>
                                                        </div>
                                                       

                                                    <div class="form-actions">
                                                        <div class="row">
                                                            <div class="col-md-offset-3 col-md-9">
                                                                <button type="submit" class="btn green">Save</button>
                                                                <button type="button" class="btn grey-salsa btn-outline">Cancel</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                                <!-- END FORM-->
                                            </div>
                                        </div>

                                        
<!-- END editaGrupo -->
