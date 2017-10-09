<?php ?>
<!-- ++++ Change: Created list module for reuse 10/1 KM ++++ -->
<div class="container-fluid" style="padding: 20px 0px 15px 0px;">
	<?php
	if(isset($_GET['cid'])){$ClassID = $_GET['cid'];}
	if(isset($_SESSION['LoginID'])){
		$FID = $_SESSION['LoginID'];
		$studo = new Stud_DO($FID);
		$rows=$studo->listAll($FID);
	?>

	<div class="row">
		<div class="col-md-7 col-centered">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Student ID</th>
						<th>Student Name</th>
						<th>Email</th>
						<th></th>
						
					</tr>
				</thead>
				<tbody>			
					<?php
					// ++++ Change: Added Delete Student Button 10/8 KM ++++
						foreach ($rows as $value){
							echo '<tr>';
								echo '<td>';
									echo '<a href="../_facultyPages/stud_mgmt_pg.php?stid='.$value['LoginID'].'">'.$value['LoginID'].'</a>';// link to class_page
								echo '</td>'; 
								echo '<td>'.$value['FName'].' '.$value['LName'].'</td>';
								echo '<td>'.$value['Email'].'</td>';
								echo '<td>';
									echo '<a href="../../_templates/_delete/delete_profile.php?stid='.$value['LoginID'].'&p='.$P.'">';
									echo '<img class ="small_icon" src="../_images/delete.png" alt="Delete Student"></a>';// delete student
								echo '</td>'; 
							echo '</tr>';	
						}?>			   
			   </tbody>
			</table>
		<?php
		} // End if faculty logged in.
		else{
			echo '<div class = "error"> Only faculty can view this page. <br/> Please log in... </div>';
		}
		?>
		</div>
	</div>
</div>
