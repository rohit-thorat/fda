
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
                                  
                                    
                                  		<?php

$updated = mysql_query("SELECT * FROM `main`");
$i=1;
while($row = mysql_fetch_array($updated))
{
	if (isset($_GET['seid'])) 
{
	 $usid=$_GET['seid'];
}
else
{
	$usid=0;
}
 $updated1 = mysql_query("SELECT * FROM `menup` where menuid=".$row['id']." and menup.uid='$usid' and mtype='MM'");
 $row1 = mysql_fetch_array($updated1);
  $m=$row1['menuid'];
                                      echo " <th><label class='checkbox-inline'>
                                             <input  class='chk' type='checkbox' id=".$i." value=".$row['id']." 
											 onclick='check(".$row['id'].")' ";
												if($m==$row['id'])
												{ 
													echo 'checked'; 
												}
												echo "/>".$row['name']."</label> </th>";
										if($i%4==0)
										{
											echo"</tr><tr>";
										}
										
  $i++;
}
?>
                        </tr>
						</tbody>
					
								</table>
                                </div>
                                
				 
                        </div></div>
                    </div>
<script>
function check(x)
{
	
	var menu=x;
	var uid=$('#us').val();

	var main=0;
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
					data: {main:main,uid:uid,menu:menu},
					dataType: 'json',
					success:function(result)
					{
						
						
						//var m=$("#us").value(result.uid);
						//$('#us').val(result.uid);
						//alert('k');
					//$("#main").load('menup.php');
								
					$("#main").empty();
  var an="<option value=0>--Select--</option>";
					 $(an).appendTo("#main");
				    $.each(result,function(i,value) {
							
							  var ap="<option value="+value.id+">"+value.name+"</option>";
							
							 
							  $(ap).appendTo("#main");

					 });
					}

           });
	
}
}
function selsub()
{
	
	var mid=$('#main').val();

	var selsub=0;
	$.ajax({
					url: 'addmenup.php',
					type: 'POST',
					data: {selsub:selsub,mid:mid},
					dataType: 'json',
					success:function(result)
					{
						
						
						
					$("#smain").empty();
					var an="<option value=0>--Select--</option>";
					 $(an).appendTo("#smain");
				    $.each(result,function(i,value) {
							
						
							
							  var ap="<option value="+value.sid+" >"+value.name+"</option>";
							
							 
							  $(ap).appendTo("#smain");

					 });
					}

           });
	
}
function selside()
{
	
	var smid=$('#smain').val();

	var selside=0;
	$.ajax({
					url: 'addmenup.php',
					type: 'POST',
					data: {selside:selside,smid:smid},
					dataType: 'json',
					success:function(result)
					{
						
						
						$("#chb").empty();
			
				    $.each(result,function(i,value) {
							
								var ap="<label class='checkbox-inline'><input type='checkbox' value="+value.sid+" onclick='access("+value.sid+")'/>"+value.name+"</label>";
							
							  //var ap="<option value="+value.sid+">"+value.name+"</option>";
							
							 
							  $(ap).appendTo("#chb");

					 });
					}

           });
	
}
function access(x)
{
	
	var slm=x;
	var mmid=$('#main').val();
	var smid=$('#smain').val();
	var uid=$('#us').val();
	var sssm=0;
	
	alert(uid);
	alert(mmid);
	alert(smid);
	alert(x);
		$.ajax({
					url: 'addmenup.php',
					type: 'POST',
					data: {sssm:sssm,main:main,uid:uid,menu:menu},
					dataType: 'json',
					success:function(result)
					{
						
			
					}

           });
	
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
function sels()
{
	
	 var uid=$('#us').val();
	 var smid=$('#smain').val();
	 var mmid=$('#main').val();
	// var uval=<?php echo $usid; ?>;
	 var lid=<?php echo $_GET['link']; ?>;
	 var sid=<?php echo $_GET['sid']; ?>;
	 var mid=<?php echo $_GET['mid']; ?>;
	
	 window.location = '?link='+lid+'&sid='+sid+'&mid='+mid+'&seid='+uid+'&smid='+smid+'&mmid='+mmid;
	
}
<?php
	if (isset($_GET['seid'])) 
{
?>
var uval=<?php echo $usid; ?>;
 document.getElementById("us").value=uval;
    element.options[element.selectedIndex].value=uval;
<?php 
}
?>
<?php
	if (isset($_GET['smid'])) 
{
	$smid=$_GET['smid'];
	$mmid=$_GET['mmid'];
?>
var mval=<?php echo $mmid; ?>;
var sval=<?php echo $smid; ?>;
 document.getElementById("main").value=mval;
 document.getElementById("smain").value=sval;
    element.options[element.selectedIndex].value=uval;
<?php 
}
?>


</script>
		