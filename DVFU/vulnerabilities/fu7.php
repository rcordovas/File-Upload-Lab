
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Damn Vulnerable File Upload Application</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    </script>
  </head>
  <body>
<div class="container">

  <?php error_reporting(0); ?>

<!-- Navbar goes here -->

   <!-- Page Layout here -->
   <div class="row">

     <div class="col s3">
       <?php include("nav1.php"); ?>
     </div>

     <div class="col s9">
       <h3>Damn Vulnerable File Upload</h3>
       <b>Description</b>
       <p>-Goal for this level is about to upload a file txt. You can see the content of the uploaded file.</p>
		<div class="card grey darken-3">
		<div class="card-content white-text">
              <span class="card-title"><h5>Level 7</h5></span><br/>
              <?php
					$status = "bad";
					$folder = "uploads/";
                    $files = @$_FILES["files"];
                    $info = new SplFileInfo($files["name"]);
                    $extension=($info->getExtension());
                    if($_FILES['files']['type'] == "text/plain" && $extension == "txt") {
						$fullpath = $_REQUEST["path"] . $folder . $files["name"];
						if (move_uploaded_file($files['tmp_name'], $fullpath)) {
							$status = "ok";
						}
					}
            ?>
			<form enctype="multipart/form-data" action="fu7.php" method="POST">
				<input type="hidden" name="MAX_FILE_SIZE" value="1000000" /> <!---bytes--->
                <input name="files" type="file" class="custom-file-input" accept="text/plain"/><br/><br/>
                <input type="submit" value="Upload File"/>
			</form>
			<br/><br/>
            <div class="card-action">
              <?php if (isset($files["name"])) { if($status == "ok") { echo "File is valid, You can see the content of the uploaded file <a href=\"?file=./uploads/".$files["name"]."\">here</a>"; } else { echo "<br/>Format not support!<br/>";} ?>
            </div>
			<div class="card grey darken-3">
				<div class="card-content white-text">
				<?php
				if (isset($_FILES)) {
				echo "Mode debug info:<pre>";
				print_r($_FILES);
				echo "</pre>";
				} }
				if (isset($_GET['file'])) {	
				?>
				</div>
			</div>
				<?php
					echo $_GET['file'] . "<br/>";
					print_r(file_get_contents($_GET['file'] , FILE_USE_INCLUDE_PATH));
				}
				?>
     </div>
   </div>
</div>
<style>
	.custom-file-input::-webkit-file-upload-button {
		visibility: hidden;
	}

	.custom-file-input::before {
		content: 'Select some files';
		background-color: #4CAF50; /* Green */
		border: none;
		color: white;
		padding: 15px 32px;
		text-align: center;
		text-decoration: none;
		display: inline-block;
		font-size: 14px;
		border-radius: 4px;
	}

	.custom-file-input::before  {
		transition-duration: 0.4s;
	}

	.custom-file-input:hover::before {
		background-color: white; /* Green */
		color: #4CAF50;
	}
	
	input[type=submit] {
		content: 'Select some files';
		background-color: #4CAF50; /* Green */
		border: none;
		color: white;
		padding: 15px 32px;
		text-align: center;
		text-decoration: none;
		display: inline-block;
		font-size: 14px;
		border-radius: 4px;
		transition-duration: 0.4s;
	}

	input[type=submit]:hover {
		background-color: white; /* Green */
		color: #4CAF50;
	}
</style>
</body>
</html>
