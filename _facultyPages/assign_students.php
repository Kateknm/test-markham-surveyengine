<?php 
// ++++ Change: Added as a stub page 9/24 KM ++++
include($_SERVER['DOCUMENT_ROOT'].'/_templates/facultyHeader.php');
include($_SERVER['DOCUMENT_ROOT'].'/_templates/facultyNav.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/class_do.php');	
require($_SERVER['DOCUMENT_ROOT'].'/_php/_models/class_model.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/class_assign_do.php');
?>
<div class="wrapper">
	<main>
	<p> You have landed on the add_student page.<br/> Currently being Edited.</p>
	
		<?php 	
	if(isset($_GET['cid'])){$ClassID = $_GET['cid'];}
	if(isset($_SESSION['LoginID'])){
		 if(!empty($ClassID )){
		?>
		
		<!-- ++++ Change: Created Reusable Module to list students 9/30 KM ++++ -->
			<?php include($_SERVER['DOCUMENT_ROOT'].'/_templates/enrolled_students.php'); ?>
			
			
		 <?php }}	//End If LoginID && ClassID 
		if(empty($ClassID)){echo "No ClassID Found.";}
		if(empty($_SESSION['LoginID'])){ echo '<a href="/login.php"'.'>Please Login</a>';}
		?> 
	</main>
</div><!--End Wrapper -->
<?php include($_SERVER['DOCUMENT_ROOT'].'/_templates/facfooter.php');?>
</body>
</html>
