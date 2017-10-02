<?php 
// ++++ Change: Adjusted indentation 9/7 KM ++++
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_headers/facultyHeader.php');
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/facultyNav.php');
// ++++ Change: Moved to this procedure to class_assign_do (previously part of stu_do) 9/5 KM ++++
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/class_assign_do.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/group_assign_do.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_models/group_assign_model.php');
?>
<!-- Main Content Section-->
<div class="wrapper">
	<main>
		<?php 
		// Catch for not logged in and ClassID missing
		if(isset($_GET['cid'])){$ClassID = $_GET['cid'];}
		if(empty($ClassID)){
		// Missing ClassID Error msg.
			echo '<div class="error">Uhoh problem getting user login or ClassID</div>';
		}
		else{
			if(empty($_SESSION['LoginID'])){ echo '<a href="/login.php"'.'>Please Login</a>'; }
			else{
				// --------------- Class Information -------------
				// ++++ Change: Created Reusable Module to list class info 9/30 KM ++++
				?>
				<div class ="ctrPg">
				<?php include($_SERVER['DOCUMENT_ROOT'].'/_templates/_read/class_information.php');?>	
				<div>
				<div class="clear"></div>
					<br/>
					<br/>		
							<?php 
								//Update and Delete class links.
								echo '<span class="two"><a href="delete_class.php?cid='.$value['ClassID'].'">';
								echo 	'<img class ="med_icon" src="../_images/delete_class.png" alt="Delete"></a>'; // delete class
								echo '<br/><a href="delete_class.php?cid='.$value['ClassID'].'"'.'>Delete Class</a></span>';
							?>	
							<!-------------------------------------------------------------------->
							<?php
								echo '<span class="two"><a href="update_class.php?cid='.$value['ClassID'].'">';
								echo 	'<img class ="med_icon" src="../_images/update.png" alt="Update"></a>'; // update class
								echo '<br/><a href="update_class.php?cid='.$value['ClassID'].'"'.'>Update Class</a></span>';
							?>
							<?php // ++++ Change: Add 'Add Students' Button 9/29 KM ++++
								echo '<span class="two"><a href="assign_students.php?cid='.$value['ClassID'].'">';
								echo 	'<img class ="med_icon" src="../_images/person_add.png" alt="Enroll Students"></a>'; // enroll students
								echo '<br/><a href="assign_students.php?cid='.$value['ClassID'].'"'.'>Enroll Students</a></span>';
							?>
				<div class="clear"></div>
				</div>
				<br/>
				<br/>
				<?php 			
					// Lists student's assigned to a class. Hides table if empty. 
					// ++++ Change: Created Reusable Module to list students 9/30 KM ++++
					include($_SERVER['DOCUMENT_ROOT'].'/_templates/_read/enrolled_students.php');
				?>

			<?php }} // End else LoginID && ClassID 
		?>	
		</main>
</div><!--End Wrapper -->
<?php include($_SERVER['DOCUMENT_ROOT'].'/_templates/_footers/facfooter.php');?>
</body>
</html>