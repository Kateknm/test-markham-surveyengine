<?php
if(isset($_SESSION['LoginID'])){
	if(!empty($_SESSION['LoginID'])){ 
		$LoginID = $_SESSION['LoginID']; // Current User
	}
}
else{
	
}

if(isset($_GET['stid'])){
	if(!empty($_GET['stid'])){
		$Subj = $_GET['stid']; // Student ID
		$StID = $_GET['stid'];
		$Role = 'Student';
	}	
}

if(isset($_GET['fid'])){	
	if(!empty($_GET['fid'])){
		$Subj = $_GET['fid']; // Faculty ID
		$FID = $_GET['fid'];
		$Role = 'Faculty';
	}
}

if(isset($_GET['cid'])){
	if(!empty($_GET['cid'])){
		$ClassID = $_GET['cid']; // Current Class ID
	}
}

?>
	
	
