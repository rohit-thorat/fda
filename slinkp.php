
				
					   <div class="col-md-12" id="asc">
                    <div class="panel panel-inverse">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand" ><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload" onclick="load()"> <i class="fa fa-repeat"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove" ><i class="fa fa-times"></i></a>
                            </div>
                            <h4 class="panel-title">Menu Permission Table</h4>
                        </div>
						 <div class="panel-body">
						 <form class="form-horizontal">
                <div class='form-group' id="chk">
                                          <table id="" class="table table-striped table-bordered">
                                <thead>
<tr><div class="col-md-4" id="" style="margin-left: 15px;"> <div class="form-group">
                                        <label for="exampleInputEmail1">Select User</label>
                                     
								
									    <select class="form-control" id="us" data-size="10" data-live-search="true" data-style="btn-white" onchange="sel()">
                                            <option value="0" >--Select--</option>
                                 <?php	$query = "SELECT * FROM  `dbo.muser`";
$result = mysql_query($query) or die(mysql_error());

while($row = mysql_fetch_assoc($result)) {

$dropdown .= "\r\n<option value='{$row['UserCode']}'>{$row['name']}</option>";

}

echo $dropdown;
?>
                                            
                                        </select>
									
								
                                    </div>                                  
                                    </div></tr>     
</thead> 	
<tbody>								
								   <tr>
								   <th>Page</th>
								   <th>Access</th>
								   
                                  
                                    
                                  		<?php


	if (isset($_GET['seid'])) 
{
	 $usid=$_GET['seid'];
}
else
{
	$usid=0;
}
$updated = mysql_query("SELECT sidemenu.name, sidemenu.sid
FROM menup, sidemenu, smain
WHERE sidemenu.smid = smain.sid
AND smain.sid = menup.menuid
AND menup.mtype = 'SM'
AND menup.uid = '$usid' order by sidemenu.sid");
$i=1;
while($row = mysql_fetch_array($updated))
{

 $updated1 = mysql_query("SELECT * FROM `menup` where menuid=".$row['sid']." and menup.uid='$usid' and mtype='LM'");
 $row1 = mysql_fetch_array($updated1);
  $m=$row1['menuid'];
                                      echo "<tr> <td><label class='checkbox-inline'>
                                             <input  class='chk' type='checkbox' id=".$i." value='1' 
											 onclick='check1(".$row['sid'].")' ";
												if($m==$row['sid'])
												{ 
													echo 'checked'; 
												}
												echo "/>".$row['name']."</label> </td>";
											
												
$adds = mysql_query("SELECT * FROM `access` where linkid='$m' and userid='$usid'");
$add1 = mysql_fetch_array($adds);
$add=$add1['adds'];
$delete=$add1['deletes'];
$edit=$add1['edits'];
$view=$add1['shows'];
$pass=$add1['passs'];
					 echo "  <td><label class='checkbox-inline'>
                                             <input  class='chk' type='checkbox' id=".$i." value='1' 
											 onclick='check(".$row['sid'].",1)' ";
												if($add==1)
												{ 
													echo 'checked'; 
												}
												echo "/>Add</label> ";
												
									echo	"<label class='checkbox-inline'>
                                             <input  class='chk' type='checkbox' id=".$i." value='1' 
											 onclick='check(".$row['sid'].",2)' ";
												if($edit==1)
												{ 
													echo 'checked'; 
												}
												echo "/>Edit</label> ";
												
												echo	"<label class='checkbox-inline'>
                                             <input  class='chk' type='checkbox' id=".$i." value='1' 
											 onclick='check(".$row['sid'].",3)' ";
												if($delete==1)
												{ 
													echo 'checked'; 
												}
												echo "/>Delete</label> ";
												
												echo	"<label class='checkbox-inline'>
                                             <input  class='chk' type='checkbox' id=".$i." value='1' 
											 onclick='check(".$row['sid'].",4)' ";
												if($view==1)
												{ 
													echo 'checked'; 
												}
												echo "/>View</label> ";
												
												echo	"<label class='checkbox-inline'>
                                             <input  class='chk' type='checkbox' id=".$i." value='1' 
											 onclick='check(".$row['sid'].",5)' ";
												if($pass==1)
												{ 
													echo 'checked'; 
												}
												echo "/>Pass</label> ";
												
											echo"	</td></tr>";

										
  $i++;
}
?>
                       
						</tbody>
					
								</table>
                                </div>
                                

                        </div></div>
                    </div>
<script>
function check(x,y)
{
	
	var menu=x;
	//alert(x);
	//alert(y);
	
	var uid=$('#us').val();
	//alert(uid);
var acid=y;
	var sideaccess=0;
if(uid<=0)
{
	alert('Select User First');
	$('#us').css('background-color', '#ffdedd');

	 $(".chk").prop("checked", false);
}
else
{
	

	$.ajax({
					url: 'addmenup.php',
					type: 'POST',
					data: {sideaccess:sideaccess,uid:uid,menu:menu,acid:acid},
					dataType: 'json',
					success:function(result)
					{
						

					}

           });
	
}
}
function check1(x)
{
	
	var menu=x;
	//alert(x);
	var uid=$('#us').val();

	var sidem=0;
if(uid<=0)
{
	alert('Select User First');
	$('#us').css('background-color', '#ffdedd');

	 $(".chk").prop("checked", false);
}
else
{
	

	$.ajax({
					url: 'addmenup.php',
					type: 'POST',
					data: {sidem:sidem,uid:uid,menu:menu},
					dataType: 'json',
					success:function(result)
					{
						//alert(x);

					}

           });
	
}
}
function sel()
{
	
	 var uid=$('#us').val();
	 
	// var uval=<?php echo $usid; ?>;
	 var lid=<?php echo $_GET['link']; ?>;
	 var sid=<?php echo $_GET['sid']; ?>;
	 var mid=<?php echo $_GET['mid']; ?>;
	
	 window.location = '?link='+lid+'&sid='+sid+'&mid='+mid+'&seid=' + uid;
	
}

<?php
	if (isset($_GET['seid'])) 
{
?>
var uval=<?php echo $usid; ?>;
 document.getElementById("us").value=uval;
    //element.options[element.selectedIndex].value=uval;
	
<?php 
}
?>



</script>
		