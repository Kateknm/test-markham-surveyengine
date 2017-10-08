<?php 
// ++++ Change: Added Delete Profile Module 10/7 KM ++++ 
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_headers/facultyHeader.php');
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/facultyNav.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/profile_do.php');	
require($_SERVER['DOCUMENT_ROOT'].'/_php/_models/profile_model.php');
?>
<!-- Main Content Section-->
<div class="wrapper">
	<main>
		<?php	
		//----------------- Get Class Info --------------->	

		if(isset($_GET['stid'])){$Subj = $_GET['stid'];}
		if(isset($_GET['cid'])){$ClassID = $_GET['cid'];}
		if(isset($_GET['fid'])){$Subj = $_GET['fid'];}
		if(!empty($_SESSION['LoginID'] && !empty($Subj ))){
			// ++++ Change: Added Check for sending page 10/5/17 KM ++++
			if(!empty($_GET['p'])){
			$returnME= $_GET['p']; // Sending Page
			}
			//calls class data object and loads table data by ClassID
			$thisStud = new Profile_DO($Subj);
			$rows=$thisStud->listProfile($Subj);
			foreach ($rows as $value){
				$Subj = $Subj;
				$Email = $value['Email'];
				$FName = $value['FName'];
				$LName = $value['LName'];
			}				
		?>	<!---------------- Show Class Info -------------->
		<table>
			<h1> Deleting Profile?</h1>
			<tr><th>ID: </th><td><?php echo $Subj;?></td></tr>
			<tr><th>Name</th><td><?php echo $FName. ' '.$LName;?></td></tr>
			<tr><th>Email: </th><td> <?php echo $Email;?></td></tr>
			<tr></tr>
		</table>

		<form name="DeleteProfile" method="POST">
			<div>	
				<br/>
				<input type="submit" value="Delete Profile" name="DeleteProfile" id="DeleteProfile">
			</div>
			<?php 
				// -----------------Delete Class --------------------
				if(isset($_POST['DeleteProfile'])){
					$delProfile = new Profile(array(
						'LoginID' => $_SESSION['LoginID'],
						'Role' => 'Student',
						'Password' => 'Password',
						'Subj' => $Subj,
						'Email' => $Email,
						'FName' => $FName,
						'LName' => $LName));
					$delProfile->deleteProfile($LoginID);
					if($delProfile){
						if($LoginID == $Subj){echo "<script>window.open('../../../logout.php','_self') </script>";} 
						if($LoginID != $Subj){
							//echo '<br/>Success! <br/>You have deleted '.$FName. ' ' .$LName."'s".' profile.';
							//echo '<br/>Do not resubmit the form.</br>';
							if(!empty($ClassID)&&!empty($returnME)){
								echo "<script>window.open('../../../_facultyPages/".$returnME.".php?stid=".$Subj."&cid=".$ClassID."', '_self') </script>";}
								echo "<script>window.open('../../../_facultyPages/".$returnME.".php?stid=".$Subj."&cid=".$ClassID."', '_self') </script>";}
							if(empty($ClassID)&&!empty($returnME)){
								if(!empty($_GET['stid'])){echo "<script>window.open('../../../_facultyPages/".$returnME.".php?stid=".$Subj."', '_self') </script>";}	
								if(!empty($_GET['fid'])){echo "<script>window.open('../../../_facultyPages/".$returnME.".php?fid=".$Subj."','_self') </script>";}
							}	
						else{echo "<script>window.open('../../_facultyPages/all_students.php','_self') </script>";}
					}
				}
		}//End If !empty LoginID & ClassID
		else{
			echo '<div class="error">Uhoh problem getting user login or Profile ID</div>';
		}
		?> 		
		</form>
	</main>
</div> <!-- End Wrapper -->
<?php include($_SERVER['DOCUMENT_ROOT'].'/_templates/_footers/facfooter.php');?>
</body>
</html>