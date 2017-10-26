<?php
// ++++ Change: Added Title 10/25 KM ++++
$title = 'Your Surveys';
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_headers/studentHeader.php');
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/studentNav.php');
?>
<main>
	<div class="wrapper">
	<div class="col-md-12 col-centered">
				<table class="table table-striped">
				<thead>
				<legend><h1> <?php if(isset($title)){echo $title;} ?></h1></legend>
					<tr>
						<!-- Row 1 -->
						<th>Survey Title</th>
						<th>Class</th>
						<th>Semester</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<!-- Row 2 -->
						<td><a href="studentEval.php">1Group Member Evaluation</a></td>
						<td>ONLINE Senior Capstone</td>
						<td>Spring 2017</td>
					</tr>
					<!-- Row 3-->
					<tr>
						<td><a href="#">Group Member Evaulation</a></td>
						<td>ONLINE Senior Capstone</td>
						<td>Summer 2017</td>
					</tr>
					<!-- Row 4-->
					<tr>
						<td><a href="#">Group Member Evaulation</a></td>
						<td>ONLINE Senior Capstone</td>
						<td>Fall 2017</td>
					</tr>
					<!-- Row 5-->
					<tr>
						<td><a href="#">Placeholder</a></td>
						<td>Placeholder</td>
						<td>Placeholder</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</main>
</body>
</html>