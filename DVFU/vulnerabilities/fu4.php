
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
       <b>Description.</b>
       <p>-Goal for this level is about to upload a file.This program only allows to upload PNG images.</p>
       <div class="card  teal lighten-1">
            <div class="card-content white-text">
              <span class="card-title">Level 4</span>
              <form enctype="multipart/form-data" action="fu4.php" method="POST">
                <input type="hidden" name="MAX_FILE_SIZE" value="100000" />
                <input name="uploadedfile" type="file" />
                <input type="submit" value="Upload File" />
              </form>

            </div>
            <div class="card-action">
              <?php
			  $folder = "uploads/";
              $files = @$_FILES["files"];
              if($_FILES['uploadedfile']['type'] != "image/png") {
                          if(isset($_FILES['uploadedfile'])){echo "Sorry, PNG only!";}
                  $fullpath = $_REQUEST["path"] . $folder .$files["name"];
                  			 // exit;
                    }
                          if (move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $uploadfile)) {
                          echo "File is valid, and was successfully uploaded.\n";
                          } else {
                          echo "File uploading failed.\n";
                          }
                  ?>
              <?php if($uploadfile!= '') { echo "<a href=\"$uploadfile\">Uploaded</a>"; } ?>
            </div>
						<?php
			echo "Mode debug info:<pre>";
			print_r($_FILES);
			echo "</pre>";
			?>
          </div>

     </div>

   </div>

</div>
  </body>
</html>
