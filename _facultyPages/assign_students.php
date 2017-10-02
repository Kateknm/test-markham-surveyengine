<?php 
// ++++ Change: Added as a stub page 9/24 KM ++++
// ++++ Change: Added content 10/1 KM ++++
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_headers/facultyHeader.php');
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/facultyNav.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/class_assign_do.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_models/class_assign_model.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/drop_do.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/group_assign_do.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_models/group_assign_model.php');
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
			<div>
			<?php // ++++ Change: Add 'Add Students' Button 9/29 KM ++++
				echo '<span class="two"><a href="add_students.php?cid='.$ClassID.'">';
				echo 	'<img class ="med_icon" src="../_images/person_add_new.png" alt="Add New Student"></a>'; // Add New student
				echo '<br/><a href="add_students.php?cid='.$ClassID.'"'.'>New Student</a></span>';
			?>
			</div>
			<div class="clear"></div>
			<br/>
			
			<div>
			<h2>Enroll Existing Student</h2>
			<?php  include($_SERVER['DOCUMENT_ROOT'].'/_templates/_create/studdb_assign.php'); ?>
			</div>
			<br/>
			<div>
			<?php include($_SERVER['DOCUMENT_ROOT'].'/_templates/_read/enrolled_students.php'); ?>
			</div>
			<br/>

		<?php }}	//End If LoginID && ClassID 
		if(empty($ClassID)){echo "No ClassID Found.";}
		if(empty($_SESSION['LoginID'])){ echo '<a href="/login.php"'.'>Please Login</a>';}
		?> 
	</main>
</div><!--End Wrapper -->
<?php include($_SERVER['DOCUMENT_ROOT'].'/_templates/_footers/facfooter.php');?>
</body>
</html>
