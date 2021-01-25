<?php include_once 'header.php'; ?>

<!-- The drag and drop upload box will be here -->
<!-- The selection of cloud services will be here as well -->

<section class="cloudservices-form">
	<h2>Select your cloud services</h2>
	<div class="cloudservices-form-form">
		<form action="includes/cloudservicesoauth.inc.php" method="post">   
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
</section>

<div class="container" >
	<div class='content'>
		<form action="includes/upload.inc.php" class="dropzone" id="myAwesomeDropzone"> </form>  
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="js/dropzone.js" type="text/javascript"></script>
	</div> 
</div>

<!-- Script -->
<script type='text/javascript'>
	Dropzone.autoDiscover = false;
	$(".dropzone").dropzone({
		addRemoveLinks: true,
		removedfile: function(file) {
			var name = file.name;    
			$.ajax({
				type: 'POST',
				url: 'includes/upload.inc.php',
				data: {name: name,request: 2},
				sucess: function(data){
					console.log('success: ' + data);
				}
			});
			var _ref;
			return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
		}
	});
</script>




<?php include_once 'footer.php';?>