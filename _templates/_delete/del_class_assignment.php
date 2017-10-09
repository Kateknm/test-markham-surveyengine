<?php	

// Supports stud_mgmt_pg, class_page
include($_SERVER['DOCUMENT_ROOT'].'/_php/config.php');
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_headers/facultyHeader.php');
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/facultyNav.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/class_assign_do.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_models/class_assign_model.php');
$P = 'del_class_assignment';

// ++++ Change: Added Check for sending page 10/5/17 KM ++++
if(!empty($_GET['p'])){
$returnME= $_GET['p']; // Send Page
}

// ++++ Change: If statements to distinguish between faculty and student un-assign.php 9/29 KM ++++
if(!empty($_GET['stid'])){
	$Subj= $_GET['stid']; // Student
	}	
if(!empty($_GET['fid'])){
	$Subj= $_GET['fid']; // Faculty
}
$LoginID = $_SESSION['LoginID']; // Current User
$ClassID = $_GET['cid']; // Current Class
// ++++ Change: Remove Group Assignment while removing student from class 10/8 KM ++++
//Check for Group Assignment & Remove each group_assignment for students only.
if(!empty($_GET['stid'])){	
		//include del_group_assignment
		include($_SERVER['DOCUMENT_ROOT'].'/_templates/_delete/del_group_assignment.php');
	}

$DeleteClassA = new Class_Assign(array( 
	'Subj' => $Subj, 
	'LoginID' => $LoginID, 
	'ClassID' => $ClassID));	
$DeleteClassA->delClassA();

if($returnME){
	// ++++ Change: If statements to distinguish between faculty and student to reload sending page.php 9/29 KM ++++
	if(!empty($_GET['stid'])){echo "<script>window.open('../../../_facultyPages/".$returnME.".php?stid=".$Subj."&cid=".$ClassID."', '_self') </script>";}	
	if(!empty($_GET['fid'])){echo "<script>window.open('../../../_facultyPages/".$returnME.".php?fid=".$Subj."&cid=".$ClassID."','_self') </script>";}
}
else{
	echo '<div>No sending page info.</div>';
	//Default Return to Classes Page if instructor was removed.
	if(!empty($_GET['fid'])){echo "<script>window.open('../../../_facultyPages/classes.php','_self') </script>";}
	//Default Return to all_students if student was removed.
	if(!empty($_GET['stid'])){echo "<script>window.open('../../../_facultyPages/all_students.php','_self') </script>";}	
}
?>