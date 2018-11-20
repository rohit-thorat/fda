<div class="row">
<div class="col-lg-12" id="scs">
			        <!-- begin panel -->
                     <div class="panel panel-inverse" data-sortable-id="form-stuff-1">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                            </div>
                            <h4 class="panel-title">Main Menu</h4>
                        </div>
						
                         <div class="panel-body p-t-10">
                        	<div class="row row-space-10">
                        		<div class="col-md-6">
                            
								
                               
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">ID</label>
                                        <input type="text" class="form-control" id="ID" placeholder="Id" disabled="disabled"/>
                                    </div>
                                    <div class="form-group">
									
                                        <label for="exampleInputPassword1">Name *</label>
                                        <input type="text" class="form-control" id="NAME" placeholder="Name" autofocus/>
										
                                    </div>
									 <div class="form-group">
									
                                        <label for="exampleInputPassword1">Link *</label>
                                        <input type="text" class="form-control" id="LINK" placeholder="Link" />
                                    </div>
									
									
								</div>
								<div class="col-md-6">
								
                              
								
									<div class="form-group">
									
                                        <label for="exampleInputPassword1">Tooltip</label>
                                        <input type="text" class="form-control" id="TOOLTIP" placeholder="Tooltip" />
                                    </div>
									<div class="form-group">
									
                                        <label for="exampleInputPassword1">Priority *</label>
                                        <input type="text" class="form-control" id="PRIORITY" placeholder="Priority"  />
										 <span id="name_status" style="color:red"></span>
                                    </div>
									<div class="form-group">
									
                                        <label for="exampleInputPassword1">Marathi Name *</label>
                                        <input type="text" class="form-control" id="MARATHI_NAME" placeholder="Marathi Name" />
                                    </div>
									<div class="pull-right">
									<button type="button" id="save" onclick="add()" class="btn btn-sm btn-primary m-r-5">Save</button>
                                    <button  type="button" id="update" onclick="update()" class="btn btn-sm btn-primary m-r-5">Update</button>
                                    <button type="reset" class="btn btn-sm btn-default">Cancel</button>
									</div>
								
								
							
									</div>
								</div>
								</div>
									
								
								
                    </div>
					
                    <!-- end panel -->
                </div>
				</div>
				
				<div class="row">
					 
                     
                   <?php include('MainMenuTable.php'); ?>
				
			 
			    </div>
				 <!-- begin Page Script -->
				<script>
				
				
				function Required()
				{
				
					var number = /^[0-9]+$/;
					var name= $('#NAME').val();
                    var link= $('#LINK').val();
					var tooltip= $('#TOOLTIP').val();
					var priority= $('#PRIORITY').val();
					var marathiName= $('#MARATHI_NAME').val();
					
					if(name=='' || link=='' || priority=='' || marathiName=='')
					{
					
						$('#NAME').attr('placeholder','* This Field Is Required');
						$('#NAME').css('background-color', '#ffdedd');
						
						$('#LINK').attr('placeholder','* This Field Is Required');
						$('#LINK').css('background-color', '#ffdedd');
						
						$('#PRIORITY').attr('placeholder','* This Field Is Required');
						$('#PRIORITY').css('background-color', '#ffdedd');
						
						$('#MARATHI_NAME').attr('placeholder','* This Field Is Required');
						$('#MARATHI_NAME').css('background-color', '#ffdedd');
						
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
					var name= $('#NAME').val();
                    var link= $('#LINK').val();
					var tooltip= $('#TOOLTIP').val();
					var priority= $('#PRIORITY').val();
					var marathiName= $('#MARATHI_NAME').val();
					
					var insert=1;
    
			   if(name=='' || link=='' || priority=='' || marathiName=='')
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
					
					$('#MARATHI_NAME').attr('placeholder','Marathi Name');
					$('#MARATHI_NAME').css('background-color', 'white');
					
					
                     $.ajax({
                                  url: 'AddMainMenu.php',
                                  type: 'POST',
                                  data:  {insert:insert,name:name,link:link,tooltip:tooltip,marathiName:marathiName,priority:priority},
                                  dataType: 'json',
                        				 success:function(result)
															{
                                       
									$("#sc").load('MainMenuTable.php');
                                                      
															}

                                  });
							alert('Inserted Successfully');
							
							$('#NAME').val('');
							$('#LINK').val('');
							$('#TOOLTIP').val('');
							$('#PRIORITY').val('');
							$('#MARATHI_NAME').val('');     
						 
				}	 
				

				}
	
					function update()
				{
				
						var number = /^[0-9]+$/;
						var id= $('#ID').val();
						var name= $('#NAME').val();
						var link= $('#LINK').val();
						var tooltip= $('#TOOLTIP').val();
						var priority= $('#PRIORITY').val();
						var marathiName= $('#MARATHI_NAME').val();
						var update=1;
						
				if(name=='' || link=='' || priority=='' || marathiName=='')
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
					
					$('#MARATHI_NAME').attr('placeholder','Marathi Name');
					$('#MARATHI_NAME').css('background-color', 'white');
					
						
								$.ajax({
									  url: 'AddMainMenu.php',
									  type: 'POST',
									  data: {update:update,id:id,name:name,link:link,tooltip:tooltip,marathiName:marathiName,priority:priority},
									  dataType: 'json',
											 success:function(result)
														{
										$("#sc").load('MainMenuTable.php');
														}

									  });
								alert('Updated Successfully');
								$('#ID').val('');
								$('#NAME').val('');
								$('#LINK').val('');
								$('#TOOLTIP').val('');
								$('#PRIORITY').val('');
								$('#MARATHI_NAME').val('');
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
                                  url: 'AddMainMenu.php',
                                  type: 'POST',
                                  data: {id:id,select:select},
                                  dataType: 'json',
                        				 success:function(result)
										 {
											
											$('#ID').val(result.id);
											$('#NAME').val(result.name);
											$('#LINK').val(result.path);
											$('#TOOLTIP').val(result.toolteep);
											$('#PRIORITY').val(result.priority);
											$('#MARATHI_NAME').val(result.marathiname);
												
                                          }

                                  });
							//alert('Done');
							
						 
						 
				}
				
				function deletes(x)
				{
					var id= x;
					var deletes=1;
           
                          $.ajax({
                                  url: 'AddMainMenu.php',
                                  type: 'POST',
								  data: {id:id,deletes:deletes},
                                  dataType: 'json',
                        		success:function(result)
															{
                                       
										 $("#sc").load('MainMenuTable.php');
                                                      
															}

                                  });
							alert('Deleted Successfully');
			 
				 }
				


				
					 				
						 
	
				</script>
				
				
	 


