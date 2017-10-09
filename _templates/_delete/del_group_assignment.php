<?php	
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/group_assign_do.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_models/group_assign_model.php');

// Change: Added Group Removal with Class Removal Students 10/8 KM ++++
//If sending page is delete_class_assignment
if($P == 'del_class_assignment'){
	$gado = new GA_DO();
	$rows=$gado->groupsByLogin($Subj, $ClassID);
	//if group assignment exists
	foreach ($rows as $value){
		$LoginID = $_SESSION['LoginID'];
		$Subj = $value['LoginID'];
		$GroupID = $value['GroupID'];
		echo $LoginID;
		echo $Subj;
		echo $GroupID;
		
		$DeleteGroupA = new Group_Assign(array(
		'Subj' => $Subj, 
		'LoginID' => $LoginID, 
		'GroupID' => $GroupID));	
		$DeleteGroupA->delGroupA();
	}
}

// Change: Separated remove group only from remove group with class remove. 10/8 KM
//If sending page is not delete_class_assignment
if($P != 'del_class_assignment'){
	// Supports stud_mgmt_pg
	include($_SERVER['DOCUMENT_ROOT'].'/_php/config.php');
	include($_SERVER['DOCUMENT_ROOT'].'/_templates/_headers/facultyHeader.php');
	include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/facultyNav.php');	
	
	$StID = $_GET['stid']; // Student
	$LoginID = $_SESSION['LoginID']; // Current User
	$GroupID = $_GET['gid'];

	$DeleteGroupA = new Group_Assign(array(
		'Subj' => $StID, 
		'LoginID' => $LoginID, 
		'GroupID' => $GroupID));	
	$DeleteGroupA->delGroupA();

		//Directs back to stud_mgmt_pg with StID
		echo "<script>window.open('../../../_facultyPages/stud_mgmt_pg.php?stid=$StID', '_self') </script>";	
}
?>