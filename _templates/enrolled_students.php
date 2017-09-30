<?php 
// ++++ Change: Added Reusable Module to list students. 9/30 KM ++++
// CA_DO is called from originating page.
?>	

<?php	
	// Lists student's assigned to a class.
	// ++++ Change: Moved to class_assign_do from stu_do 9/5 KM ++++
	// ++++ Change: Added if statement to hide table if empty 9/24 KM ++++
	if(isset($_GET['cid'])){$ClassID = $_GET['cid'];}
	if(isset($_SESSION['LoginID'])){
		 if(!empty($ClassID )){
		
			$cado = new CA_DO();
			$rows=$cado->listClassStuds($ClassID);
			if(!empty($rows)){
?>				<table>
					<th>Student Name</th><th>Email</th><th>Group</th></tr>
					<?php 		
						foreach ($rows as $value){
							echo '<tr>';
								// ++++ Change: Took out id & linked student_mgt_pg to Name 9/5 KM ++++ 
								echo '<td>' . '<a href="stud_mgmt_pg.php?stid=' . $value['LoginID'] . '">' . $value['FName'] . ' ' . $value['LName'] . '</a></td>'; // links to student_mgt_pg for this student
								// ++++ Change: Added mail to email link 9/5 KM ++++ 
								echo '<td>' . '<a href="mailto:' . $value['Email'].'">' . $value['Email'] . '</a></td>';
								// ++++ Change: Added group linked to class_group stub (to be developed soon) 9/5 KM ++++ 
								echo '<td>' . '<a href="class_group.php?gid='.$value['GroupID'].'&gname='.$value['GroupName'].'">' . $value['GroupName'] . '</a></td>'; // links to group page for this group
							echo '</tr>';
						}	
					?>
				</table>
		  <?php } // End IF rows ?>
	 <?php }}// End IF Login && ClassID 
	if(empty($ClassID)){echo "No ClassID Found.";}
	if(empty($_SESSION['LoginID'])){ echo '<a href="/login.php"'.'>Please Login</a>';}?>

	