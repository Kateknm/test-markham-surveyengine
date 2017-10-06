<?php 
// ++++ Change: Added as a stub page 9/24 KM ++++
// ++++ Change: Added content 10/1 KM ++++
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_headers/facultyHeader.php');
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/facultyNav.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/class_assign_do.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_models/class_assign_model.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/stud_do.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/group_assign_do.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_models/group_assign_model.php');
?>
<div class="wrapper">
	<main>
	<p> You have landed on the assign_student page.<br/> Currently being Edited.</p>
		<?php 	
		if(isset($_GET['cid'])){$ClassID = $_GET['cid'];}
		if(empty($ClassID)){
			//-- ++++ Change: Added error msg. 9/8 KM ++++ -->
				echo '<div class="error">Uhoh problem getting user login or ClassID</div>';
			}
		else{
			if(empty($_SESSION['LoginID'])){ echo '<a href="/login.php"'.'>Please Login</a>'; }
		?>
			<div>
			<?php include($_SERVER['DOCUMENT_ROOT'].'/_templates/_read/student_info.php'); ?>
			</div>
			<br/>

		<?php }	//End If LoginID && ClassID 
		?> 
	</main>
</div><!--End Wrapper -->
<?php include($_SERVER['DOCUMENT_ROOT'].'/_templates/_footers/facfooter.php');?>
</body>
</html>
