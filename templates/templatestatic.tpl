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
                                 <button class="btn green" onClick="location='index.php?module=templatestatic&method=novo';">+ Add New User <i class="fa fa-plus"></i></button>
                                   
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
                         				{listagem}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
                    </div>

<!-- END main -->


<!-- BEGIN novo -->
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
                                                <form action="index.php?module=usuarios&method=insere" method="post" name="novo"  class="form-horizontal" enctype="multipart/form-data">
                                                    <div class="form-body">
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">Name</label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control" placeholder="" name="nome"  required>
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
<!-- END novo -->


<!-- BEGIN edita -->
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
                                                <form action="index.php?module=templatestatic&method=update" method="post" name="editar"  class="form-horizontal" enctype="multipart/form-data">
                                                   
                                                   <input type="hidden" name="id" value="{id}" />
                                                    
                                                    <div class="form-body">
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">Name</label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control" placeholder="" name="nome" value="{nome}" required>
                                                                <span class="help-block">  </span>
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

<!-- END edita -->
