<title>Main Menu Data</title>
		   <div class="col-md-12" id="sc">
                    <div class="panel panel-inverse">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand" ><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload" onclick="load()"> <i class="fa fa-repeat"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove" ><i class="fa fa-times"></i></a>
                            </div>
                            <h4 class="panel-title">Main Menu Data</h4>
                        </div>
                        <div class="panel-body" >
                            <table id="data-table-combine" class="table table-striped table-bordered">
							<thead>
                                    <tr>
                                        <th  class="text-nowrap">ID</th>
                                        <th  class="text-nowrap">Name</th>
                                        <th  class="text-nowrap">Link</th>
                                        <th  class="text-nowrap">Tooltip</th>
										<th  class="text-nowrap">Priority</th>
										<th  class="text-nowrap">Marathi Name</th>
                                        
                                        <th>Update</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody id="tebleitem">
                                  		<?php
ob_start();
include("db.php"); 
$updated = mysql_query("SELECT * FROM `main` WHERE `main`.`flag`!='Y'");
$i=1;
while($row = mysql_fetch_array($updated))
{
  echo "<tr>";
  echo "<td>" . $i . "</td>";
   
  echo "<td>" . $row['name'] . "</td>";
  echo "<td>" . $row['path'] . "</td>";
  echo "<td>" . $row['toolteep'] . "</td>";
  echo "<td>" . $row['priority'] . "</td>";
   echo "<td>" .$row['marathiname'] . "</td>";
  
  echo "<td ><a href='#' onclick=select(".$row['id'].")><span class='badge bg-green'>Update</span></td>";
  echo "<td ><a href='#' onclick=deletes(".$row['id'].")><span class='badge bg-red'>Delete</span></td>";
  echo "</tr>";
  $i++;
}?>
                       
                                </tbody>
                            </table>
                        </div>
                    </div>
			    </div>
				 <!-- begin Page Script -->
				
				<script>
		$(document).ready(function() {
			App.init();
			TableManageCombine.init();
		});
	</script>	