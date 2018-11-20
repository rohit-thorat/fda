 <div class="row">
<div class="col-lg-12" id="scs">
			        <!-- begin panel -->
                    <div class="panel panel-inverse" data-sortable-id="form-validation-1">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                            </div>
                            <h4 class="panel-title">Side Menu</h4>
                        </div>
						
                        <div class="panel-body p-t-10">
                        	<div class="row row-space-10">
                                
						<div class="col-md-6">
                            
								
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">ID</label>
                                        <input type="text" class="form-control" id="ID" placeholder="Id" disabled="disabled"/>
                                    </div>
									<div class="form-group">
                                        <label for="exampleInputPassword1">Sub Menu</label>
                                        <?php
							  ob_start();
							  $sql = "SELECT `sid`,`name` FROM `smain`";
							 $result = mysql_query($sql)or die("Problem");

								 $dropdown= "<select name='SMainMenuId' id='SMainMenuId'  class='select2 form-control'  data-parsley-required='true' ;>
								 <option value=''>--Select--</option>";
								 while ($row = mysql_fetch_array($result)) 
								  {
									  //echo "<option value='" . $row['sid'] ."'>" . $row['name'] ."</option>";
								  $dropdown .= "\r\n<option value='{$row['sid']}'>{$row['name']}</option>";
								  }
									  $dropdown .= "\r\n</select>";
								echo $dropdown;
							  ob_end_flush();
					    ?>
						
						
                                    </div>
                                    <div class="form-group">
									
                                        <label for="exampleInputPassword1">Name</label>
                                        <input type="text" class="form-control" id="NAME" placeholder="Name" />
                                    </div>
									 <div class="form-group">
									
                                        <label for="exampleInputPassword1">Link</label>
                                        <input type="text" class="form-control" id="LINK" placeholder="Link" />
                                    </div>
									
									
									
									
							
                                
									
								</div>
								<div class="col-md-6">
								<div class="form-group">
									
                                        <label for="exampleInputPassword1">Marathi Name</label>
                                        <input type="text" class="form-control" id="MARATHI_NAME" placeholder="Marathi Name" />
                                    </div>
									<div class="form-group">
									
                                        <label for="exampleInputPassword1">Tooltip</label>
                                        <input type="text" class="form-control" id="TOOLTIP" placeholder="Tooltip" />
                                    </div>
									<div class="form-group">
									
                                        <label for="exampleInputPassword1">Priority</label>
                                        <input type="text" class="form-control" id="PRIORITY" placeholder="Priority" />
                                    </div>
									<div class="form-group">
									<label for="exampleInputPassword1"></label>
									<div class="pull-right">
									<button type="button" id="save" onclick="add()" class="btn btn-sm btn-primary m-r-5">Save</button>
                                    <button  type="button" id="update" onclick="update()" class="btn btn-sm btn-primary m-r-5" onclick="update()">Update</button>
                                    <button type="reset" class="btn btn-sm btn-default">Cancel</button>
									</div>
									</div>
								</div>
							
                          
								</div>
                        </div>
                    </div>
					
                    <!-- end panel -->
                </div>
                </div>
				
					   
                    <div class="row">
                       
                      <?php include('SideMenuTable.php'); ?>
                    </div>
			
				 <!-- begin Page Script -->
				<script>
				function Required()
				{
				
					var number = /^[0-9]+$/;
					var SMainMenuId= $('#SMainMenuId').val();
					var name= $('#NAME').val();
                    var link= $('#LINK').val();
					var tooltip= $('#TOOLTIP').val();
					var priority= $('#PRIORITY').val();
					var marathiName= $('#MARATHI_NAME').val();
					
					if(name=='' || link==''  || priority==''|| marathiName=='' || SMainMenuId=='--Select--' )
						{
						
							$('#NAME').attr('placeholder','* This Field Is Required');
							$('#NAME').css('background-color', '#ffdedd');
							$('#LINK').attr('placeholder','* This Field Is Required');
							$('#LINK').css('background-color', '#ffdedd');
							$('#PRIORITY').attr('placeholder','* This Field Is Required');
							$('#PRIORITY').css('background-color', '#ffdedd');
							$('#MARATHI_NAME').attr('placeholder','* This Field Is Required');
							$('#MARATHI_NAME').css('background-color', '#ffdedd');
							$('#SMainMenuId').attr('placeholder','* This Field Is Required');
							$('#SMainMenuId').css('background-color', '#ffdedd');
							
							
							
							
							
						}
					else if (number.test(priority) == false) 
						{
							$('#PRIORITY').val('');
							$('#PRIORITY').attr('placeholder','* Invalid Number');
							$('#PRIORITY').css('background-color', '#ffdedd');
							
						}
				}
				function add()
				{
					var number = /^[0-9]+$/;
					var SMainMenuId= $('#SMainMenuId').val();
					var name= $('#NAME').val();
                    var link= $('#LINK').val();
					var tooltip= $('#TOOLTIP').val();
					var priority= $('#PRIORITY').val();
					var marathiName= $('#MARATHI_NAME').val();
					var insert=1;
    
			   if(name=='' || link==''  || priority==''|| marathiName=='' || SMainMenuId=='--Select--' )
				{
				Required();
					
				}
				else if (number.test(priority) == false) 
				{
					Required();
				}
				else
				{
					$('#NAME').attr('placeholder','Name');
					$('#NAME').css('background-color', 'white');
					
					$('#LINK').attr('placeholder','Link');
					$('#LINK').css('background-color', 'white');
					$('#PRIORITY').attr('placeholder','Priority');
					$('#PRIORITY').css('background-color', 'white');
					$('#SMainMenuId').attr('placeholder','Priority');
					$('#SMainMenuId').css('background-color', 'white');
					$('#MARATHI_NAME').attr('placeholder','Marathi Name');
					$('#MARATHI_NAME').css('background-color', 'white');
					
					
                          $.ajax({
                                  url: 'AddSideMenu.php',
                                  type: 'POST',
                                  data:  {insert:insert,SMainMenuId:SMainMenuId,name:name,link:link,marathiName:marathiName,tooltip:tooltip,priority:priority},
                                  dataType: 'json',
                        				 success:function(result)
															{
                                       
									$("#sc").load('SideMenuTable.php');
                                                      
															}

                                  });
							alert('Inserted Successfully');
							
							$('#NAME').val('');
							$('#LINK').val('');
							$('#TOOLTIP').val('');
							$('#PRIORITY').val('');
							$('#MARATHI_NAME').val('');
							$('#SMainMenuId').val('');
				}	 
				

				}
	
					function update()
				{
						
					var number = /^[0-9]+$/
					var id= $('#ID').val();
					var smid= $('#SMainMenuId').val();
					var name= $('#NAME').val();
                    var link= $('#LINK').val();
					var marathiName= $('#MARATHI_NAME').val();
					var tooltip= $('#TOOLTIP').val();
					var priority= $('#PRIORITY').val();
					var update=1;
					if(name=='' || link==''  || priority==''|| marathiName=='' || SMainMenuId=='--Select--' )
				{
				Required();
					
				}
				else if (number.test(priority) == false) 
				{
					Required();
				}
				else
				{
					$('#NAME').attr('placeholder','Name');
					$('#NAME').css('background-color', 'white');
					
					$('#LINK').attr('placeholder','Link');
					$('#LINK').css('background-color', 'white');
					$('#PRIORITY').attr('placeholder','Priority');
					$('#PRIORITY').css('background-color', 'white');
					$('#SMainMenuId').attr('placeholder','Priority');
					$('#SMainMenuId').css('background-color', 'white');
					$('#MARATHI_NAME').attr('placeholder','Marathi Name');
					$('#MARATHI_NAME').css('background-color', 'white');
					
							$.ajax({
                                  url: 'AddSideMenu.php',
                                  type: 'POST',
                                  data: {update:update,id:id,smid:smid,name:name,link:link,marathiName:marathiName,tooltip:tooltip,priority:priority},
                                  dataType: 'json',
                        				 success:function(result)
													{
									$("#sc").load('SideMenuTable.php');
                                                    }

                                  });
							alert('Updated Successfully');
							$('#ID').val('');
							$('#NAME').val('');
							$('#LINK').val('');
							$('#TOOLTIP').val('');
							$('#PRIORITY').val('');
							$('#MARATHI_NAME').val('');
							$('#SMainMenuId').val('');
							$('#save').show();
							$('#update').hide();
				}	 
						 
				}
				
				function select(x)
				{
				
					$('#save').hide();
					$('#update').show();
				var id=x;
				var select=1;
				
                          $.ajax({
                                  url: 'AddSideMenu.php',
                                  type: 'POST',
                                  data: {id:id,select:select},
                                  dataType: 'json',
                        				 success:function(result)
										 {
											
											$('#ID').val(result.sid);
											$('#SMainMenuId').val(result.smid);
											$('#NAME').val(result.name);
											$('#LINK').val(result.pathmn);
											
											$('#MARATHI_NAME').val(result.mname);
											$('#TOOLTIP').val(result.tooltip);
											$('#PRIORITY').val(result.priority);
                                          }

                                  });
							//alert('Done');
							
						 
						 
				}
				
				function deletes(x)
				{
					var id= x;
					var deletes=1;
           
                          $.ajax({
                                  url: 'AddSideMenu.php',
                                  type: 'POST',
								  data: {id:id,deletes:deletes},
                                  dataType: 'json',
                        		success:function(result)
															{
                                   $("#sc").load('SideMenuTable.php');
                                                      
															}

                                  });
							alert('Deleted Successfully');
			 
				 }
					 
						 
	
				</script>