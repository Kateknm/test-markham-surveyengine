<?php 
// ++++ Change: Adjusted indentation 9/7 KM ++++
include($_SERVER['DOCUMENT_ROOT'].'/_templates/facultyHeader.php');
include($_SERVER['DOCUMENT_ROOT'].'/_templates/facultyNav.php');
// ++++ Change: Moved to this procedure to class_assign_do (previously part of stu_do) 9/5 KM ++++
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/class_assign_do.php');
?>
<!-- Main Content Section-->
<div class="wrapper">
	<main>
		<?php 
		// ++++ Change: Added Catch for not logged in and ClassID missing 9/30 KM ++++
		if(isset($_GET['cid'])){$ClassID = $_GET['cid'];}
		if(empty($ClassID)){
		//-- ++++ Change: Added error msg. 9/8 KM ++++ -->
			echo '<div class="error">Uhoh problem getting user login or ClassID</div>';
		}
		else{
			if(empty($_SESSION['LoginID'])){ echo '<a href="/login.php"'.'>Please Login</a>'; }
			else{
				// --------------- Class Information -------------
				// ++++ Change: Created Reusable Module to list class info 9/30 KM ++++
				include($_SERVER['DOCUMENT_ROOT'].'/_templates/class_information.php');	
		?>	
					<br/>
					<br/>		
							<?php 
								//Update and Delete class links.
								echo '<span class="two"><a href="delete_class.php?cid='.$value['ClassID'].'"'.'><img class ="med_icon" src="../_images/delete_class.png" alt="Delete"></a>'; // delete class
								echo '<br/><a href="delete_class.php?cid='.$value['ClassID'].'"'.'>Delete Class</a></span>';
							?>	
							<!-------------------------------------------------------------------->
							<?php
								echo '<span class="two"><a href="update_class.php?cid='.$value['ClassID'].'">'.'<img class ="med_icon" src="../_images/update.png" alt="Update"></a>'; // update class
								echo '<br/><a href="update_class.php?cid='.$value['ClassID'].'"'.'>Update Class</a></span>';
							?>
							<?php // ++++ Change: Add 'Add Students' Button 9/29 KM ++++
								echo '<span class="two"><a href="add_students.php?cid='.$value['ClassID'].'">'.'<img class ="med_icon" src="../_images/person_add.png" alt="Update"></a>'; // update class
								echo '<br/><a href="add_students.php?cid='.$value['ClassID'].'"'.'>Add Students</a></span>';
							?>
				<div class="clear"></div>
				</div>
				<br/>
				<br/>
				<?php 			
					// Lists student's assigned to a class.
					// ++++ Change: Moved to class_assign_do from stu_do 9/5 KM ++++
					// ++++ Change: Added if statement to hide table if empty 9/24 KM ++++
					// ++++ Change: Created Reusable Module to list students 9/30 KM ++++
					include($_SERVER['DOCUMENT_ROOT'].'/_templates/enrolled_students.php');
				?>

			<?php }} // End else LoginID && ClassID 
		?>	
		</main>
</div><!--End Wrapper -->
<?php include($_SERVER['DOCUMENT_ROOT'].'/_templates/facfooter.php');?>
</body>
</html>