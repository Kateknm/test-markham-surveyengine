<?php 
// ++++ Change: Added Title 10/25 KM ++++

$title = 'Your Classes';
include($_SERVER['DOCUMENT_ROOT'].'_php/config.php');
include($_SERVER['DOCUMENT_ROOT'].'_templates/_headers/studentHeader.php');
include($_SERVER['DOCUMENT_ROOT'].'_templates/_nav/studentNav.php');
require($_SERVER['DOCUMENT_ROOT'].'_php/_objects/class_do.php');	
?>


<!-- Builds table for classes. If classes have Expired the are not pulled. KM 9/2/17 -->
<main>
	<!-- Main Content Section-->
	<div class="wrapper">
	<h2 class="center">Your Classes</h2>
	  
	<?php
	if(isset($_SESSION['LoginID'])){
	$classdo = new Class_DO();
	}
	?>

	<table>
		<tr>
			<th>Class ID</th>
			<th>Class Number</th>
			<th>Class Name</th>
			<th>Semester</th>
			<th>Class Expire Date</th>
		</tr>

	<?php
	//calls class data object and loads table data by LoginID
	$rows=$classdo->loadByLoginID($_SESSION['LoginID']);

	//builds table with class data	
	foreach ($rows as $value){
		echo "<tr><td>".$value['ClassID']."</td>";
		echo "<td>".$value['ClassNO']."</td><td>".$value['ClassName']."</td>";
		echo "<td>".$value['SemesterName']. " ".$value['Year']."</td>";
		echo "<td>". $value['ExpDate']."</td></tr>";
	}
	?>		

	</table>
	</div>
</main>
	
<?php include("../_templates/footer.php");?>
</body>
</html>