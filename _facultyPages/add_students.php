<?php 
// ++++ Change: Added as a stub page 9/24 KM ++++
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_headers/facultyHeader.php');
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/facultyNav.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/class_do.php');	
require($_SERVER['DOCUMENT_ROOT'].'/_php/_models/class_model.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/class_assign_do.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_models/class_assign_model.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/drop_do.php');
?>
<div class="wrapper">
	<main>
	<p> You have landed on the add_student page.<br/> Currently being Edited.</p>	
	<?php	if(isset($_GET['cid'])){$ClassID = $_GET['cid'];}
		if(empty($ClassID)){
			//-- ++++ Change: Added error msg. 9/8 KM ++++ -->
				echo '<div class="error">Uhoh problem getting user login or ClassID</div>';
			}
			else{
				if(empty($_SESSION['LoginID'])){ echo '<a href="/login.php"'.'>Please Login</a>'; }
				else{
					?>
					<h2>Create New Student</h2>
					<form name ="create-profile" method = "POST" action="#">	
							<?php 					
								$Role = 'Student';
								$Password = 'GetRandom';
								$Subj = 0;
								include($_SERVER['DOCUMENT_ROOT'].'/_templates/_create/add_profile.php');
				}
			}		
			?>
	</main>

</div><!--End Wrapper -->
<?php include($_SERVER['DOCUMENT_ROOT'].'/_templates/_footers/facfooter.php');?>
</body>
</html>
