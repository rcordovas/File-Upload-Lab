
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
       <p>-Goal for this level is about to upload a file. We are filterd php and html files.</p>
		<div class="card grey darken-3">
		<div class="card-content white-text">
              <span class="card-title"><h5>Level 5</h5></span><br/>
              <?php
					$files = @$_FILES["files"];
					$status = "bad";
					$folder = "uploads/";
					$blacklist = array(".php",".html",".shtml",".phtml", ".php3", ".php4",".php7");
					foreach ($blacklist as $item) {
						if(preg_match("/$item\$/", $_FILES['files']['name'])) {
							if(isset($_FILES['files'])){$status = "bad"; //echo "We do not allow HTML , PHP files\n";}
							//exit;
						} else {
							$fullpath = $_REQUEST["path"] . $folder . $files["name"];
							if (move_uploaded_file($files['tmp_name'], $fullpath)) {
								$status = "ok";
							}
						}
                    }
            ?>
			<form enctype="multipart/form-data" action="fu5.php" method="POST">
                <input name="files" type="file" class="custom-file-input"/><br/><br/>
                <input type="submit" value="Upload File"/>
			</form>
			<br/><br/>
            <div class="card-action">
              <?php if (isset($files["name"])) { if($status == "ok") { echo "File is valid, and was successfully uploaded <a href=\"$fullpath\" target=\"_blank\">Uploaded</a>"; } else { echo "<br/>We do not allow HTML , PHP files!<br/>";} ?>
            </div>
			<div class="card grey darken-3">
				<div class="card-content white-text">
				<?php
				if (isset($_FILES)) {
				echo "Mode debug info:<pre>";
				print_r($_FILES);
				echo "</pre>";
				} }
				?>

				</div>
		  </div>
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
