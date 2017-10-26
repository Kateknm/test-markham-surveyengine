<?php
// ++++ Change: Added Title 10/25 KM ++++
$title = 'Student Settings';
 include($_SERVER['DOCUMENT_ROOT'].'/_templates/_headers/studentHeader.php');
	//-- Sets up data for the side navigation bar. --
 include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/studentNav.php');
 $P='studentSettings';
 $Subj = $LoginID;
 ?>
<main>
	<div class="wrapper">
		<div class="col-md-12">
		<div class="row">
			<div class="col-md-12 col-centered">
				<?php include($_SERVER['DOCUMENT_ROOT'].'/_templates/_update/updateProfile.php'); ?>
				<?php include($_SERVER['DOCUMENT_ROOT'].'/_templates/_update/updatePassword.php'); ?>
				<?php // ---------------- Password Reset via Emai ------------->
				include($_SERVER['DOCUMENT_ROOT'].'/_templates/forgotpassword.php');
				?>
			</div>
		</div>
	</div>
</main>

</body>
</html>


