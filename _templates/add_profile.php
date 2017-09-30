<?php 
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/profile_do.php');	
require($_SERVER['DOCUMENT_ROOT'].'/_php/_models/profile_model.php');	

if(isset($_SESSION['LoginID'])){$LoginID = $_SESSION['LoginID'];}
else{$LoginID = 0;}
if($LoginID != 0){ // Faculty (Role Check in DO)
?>
		<!-- ++++ Change: Created Reusable Module to add profiles 9/30 KM ++++ -->
	<form name ="create-profile" method = "POST" action="#">
			<table>
				<tr>
					<th><label>Name: </label></th>
					<td>
						<input type="text" name="FName" id="FName"> 
						<input type="text" name="LName" id="LName">
					</td>
				</tr>
				<tr>
					<th><label for="Email">Email: </label></th>
					<td>
						<input type="text" name="Email" id="Email">
					</td>
				</tr>
				<?php 
					if($Password != 'GetRandom'){
					?>	
						<tr>
							<th><label for="Password"> Password: </label></th>
							<td>
								<input type="text" name="Password" id="Password">
							</td>
						</tr>
			<?php }?>
					
				<tr>
				<th><label for="Role">Role: </label></th>
					<td>
						<input type="text" name="Email" id="Email" <?php if(!empty($Role)){echo 'value = "'.$Role.'"';} ?>>
					</td>
				</tr>

			</table>
			<br/>
			<input type="submit" value="Add Profile" name="AddProfile" id="AddProfile">
	</form>
	 <?php 
}//End If LoginID 
else{
	echo "Building New Profile coming soon...";
}

	?> 