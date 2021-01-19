<?php include_once 'header.php'; ?>

<!-- <div id="drop_file_zone" ondrop="upload_file(event)" ondragover="return false">
    <div id="drag_upload_file">
        <p>Drop file(s) here</p>
        <p>or</p>
        <p><input type="button" value="Select File(s)" onclick="file_explorer();"></p>
        <input type="file" id="selectfile" multiple>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="js/draganddrop.js"></script> -->

<div class="container">
	<h2>Example: Drag and Drop File Upload using jQuery and PHP</h2>	
	<div class="file_upload">
		<form action="file_upload.php" class="dropzone">
			<div class="dz-message needsclick">
				<strong>Drop files here or click to upload.</strong><br />
				<span class="note needsclick">(This is just a demo. The selected files are <strong>not</strong> actually uploaded.)</span>
			</div>
		</form>		
	</div>
</div>

























<?php include_once 'footer.php';?>