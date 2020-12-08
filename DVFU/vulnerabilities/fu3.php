
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
       <p>-Goal for this level is about to upload a file.This program restriced php files but forget something to restrict!</p>
		<div class="card grey darken-3">
		<div class="card-content white-text">
              <span class="card-title"><h5>Level 3</h5></span><br/>
              <?php
					$status = "bad";
					$folder = "uploads/";
                    $files = @$_FILES["files"];
                    $info = new SplFileInfo($files["name"]);
                    $extension=($info->getExtension());
                    if ($files["name"] != '' && $extension != "php" && $extension != "shtml" && $extension != "php3" && $extension != "php4" && $extension != "phtml") {
                    $fullpath = $_REQUEST["path"] . $folder . $files["name"];
                    if (move_uploaded_file($files['tmp_name'], $fullpath)) {
                        $status = "ok";
                    }

                    }
                    echo '<form method=POST enctype="multipart/form-data" action=""><input type="file" name="files"><br/><br/><input type=submit value="Upload File"></form><br/><br/>';
                ?>
            <div class="card-action">
              <?php if (isset($files["name"])) { if($status == "ok") { echo "File is valid, and was successfully uploaded <a href=\"$fullpath\">Uploaded</a>"; } else { echo "<br/>Format not support!<br/>";} } ?>
            </div>
			<?php
			if (isset($_FILES)) {
			echo "Mode debug info:<pre>";
			print_r($_FILES);
			echo "</pre>";
			}
			?>
			</div>
		  </div>
     </div>
	 

   </div>


</div>
  </body>
</html>
