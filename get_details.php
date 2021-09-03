<?php
session_start();
require('./inc/constant.inc.php');
require('./inc/connection.inc.php');
require('./inc/function.inc.php');
$from=$_POST['from'];
//SELECT route.*, bus_list.name from route, bus_list WHERE route.bus_id=bus_list.id and status=1 order by `to` asc
$sql="SELECT place.id as place_id ,route.*, place.name from route,place WHERE route.`from`=$from AND route.to=place.id and route.status=1 order by place.name asc";
$res=mysqli_query($con,$sql);
if(mysqli_num_rows($res)>0){
	$html='';
	while($row=mysqli_fetch_assoc($res)){
			$html.="<option value='".$row['place_id']."'>".$row['name']."</option>";
	}
	echo $html;
}else{
	echo "<option value=''>No route found</option>";
}
?>