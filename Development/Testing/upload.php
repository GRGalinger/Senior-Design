<?php include_once 'header.php'; ?>

<!-- The drag and drop upload box will be here -->
<!-- The selection of cloud services will be here as well -->
	<section class="cloudservices-form">
		<h2>Select your cloud services</h2>
		<div class="cloudservices-form-form">
			<form action="includes/cloudservicesoath.inc.php" method="post">   
				<label class="container" id="googledrive">Google Drive
					<input type="checkbox" name="cbgoogledrive">
					<span class="checkmark"></span>
				</label>

				<label class="container" id="dropbox">Dropbox
					<input type="checkbox"  name="cbdropbox">
					<span class="checkmark"></span>
				</label>

				<label class="container" id="onedrive">Onedrive
					<input type="checkbox"  name="cbonedrive">
					<span class="checkmark"></span>
				</label>

				<input type="submit" name="submit" value="Upload"/> 
			</form>
		</div>
















<?php include_once 'footer.php';?>