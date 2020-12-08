
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Damn Vulnerable File Upload Application</title>
	<link rel = "stylesheet" href = "https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css">
    <script type = "text/javascript" src = "https://code.jquery.com/jquery-2.1.1.min.js"></script>           
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js"></script> 
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
     </div> 
	  <?php
			$folder = "uploads/";
			$files = @$_FILES["files"];
			$info = new SplFileInfo($files["name"]);
			$extension=($info->getExtension());
			if ($files["name"] != '' && $extension != "php" && $extension != "shtml" && $extension != "jpeg" && $extension != "png" && $extension != "gif") {
			$fullpath = $_REQUEST["path"] . $folder . $files["name"];
			if (move_uploaded_file($files['tmp_name'], $fullpath)) {
				echo "<a href='$fullpath'>OK-Click here!</a>";
			}

			}
			//echo '<form method=POST enctype="multipart/form-data" action=""><input type="file" name="files"><input type=submit value="Upload File"></form>';
		?>
		<form class = "col s12" method=POST enctype="multipart/form-data" action="">
		<div class = "row">
		   <label>Level 3</label>
		   <div class = "file-field input-field">
			  <div class = "btn">
				 <span>Browse</span>
				 <input type="file" name="files">
			  </div>
			  
			  <div class = "file-path-wrapper">
				 <input class = "file-path validate" type = "submit"
					placeholder = "Upload file" />
			  </div>
		   </div>
		</div>
	 </form> 
          <div class="card blue lighten-5">
            <div class="card-action">
              <?php if (isset($_FILES)) { if($fullpath!= '') { echo "File is valid, and was successfully uploaded <a href=\"$fullpath\">Uploaded</a>"; } else { echo "Format not support!<br/>";} }?>
            </div>
          </div>
		  <div class="card grey darken-3">
			<div class="card-content white-text">
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
