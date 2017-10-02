<!-- ------------- Class Assignment Selection ----------->
<div>
	<?php 
	$cadd = new Drop_DO();
	$rows=$cadd->allClasses();
	echo '<select name="NewClassID" required>'; // Open
	echo '<option value="none" selected>Select A Class</option>';
	foreach ($rows as $caddo) {
	  echo '<option value="'.$caddo['ClassID'].'">';
	  echo 		$caddo['ClassID'].' '.$caddo['ClassNO'].' '.$caddo['ClassName'];
	  echo '</option>';
	}
	echo '</select>';
	?>
	<input type="submit" value="Assign Class" name="ANewClass" id="ANewClass">
</div>
</form>
<!-- ------------- Add Class Assignments ----------->	
<?php
$errorMsg ='';
$newClassA = new CA_DO();
if(isset($_POST['ANewClass']) && $_POST['NewClassID']!='none'){	
	$newClassA = new Class_Assign(array( 
	'Subj' => $StID, // Student Assignment
	'LoginID' => $_SESSION['LoginID'], // Current User
	'ClassID' => $_POST['NewClassID']));	
	$newClassA->assignClass();
	echo "<script>window.open('stud_mgmt_pg.php?stid=$StID','_self') </script>"; // reloads page to show updated information
}
else if(isset($_POST['ANewClass']) && $_POST['NewClassID']=='none'){
	$errorMsg = 'Please select a class.'; 
	echo '<div class = "error">'.$errorMsg.'</div>';
}
?>
				