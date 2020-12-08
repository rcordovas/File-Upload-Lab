
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
		<div class="wrapper">
		  <div class="container">
			<h1>Level 3</h1>
			<div class="upload-container">
			  <div class="border-container">
				<div class="icons fa-4x">
				  <i class="fas fa-file-image" data-fa-transform="shrink-3 down-2 left-6 rotate--45"></i>
				  <i class="fas fa-file-alt" data-fa-transform="shrink-2 up-4"></i>
				  <i class="fas fa-file-pdf" data-fa-transform="shrink-3 down-2 right-6 rotate-45"></i>
				</div>
				<!--<input type="file" id="files">-->
				<p>Drag and drop files here, or 
				  <a href="#" id="files">browse</a> your computer.</p>
			  </div>
			</div>
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
                    echo '<form method=POST enctype="multipart/form-data" action=""><label for="file-upload" class="custom-file-upload"><i class="fa fa-cloud-upload"></i> Custom Upload</label><input type="file" name="file-browser"></form><br/><br/>';
                ?>
            <div class="card-action">
              <?php if (isset($files["name"])) { if($status == "ok") { echo "File is valid, and was successfully uploaded <a href=\"$fullpath\">Uploaded</a>"; } else { echo "<br/>Format not support!<br/>";} } ?>
            </div>
     </div>
   </div>
</div>
				<style>
				* {
				  box-sizing: border-box;
				  -moz-box-sizing: border-box;
				  -webkit-box-sizing: border-box;
				}

				.wrapper {
				  margin: auto;
				  max-width: 640px;
				  padding-top: 60px;
				  text-align: center;
				}

				.container {
				  background-color: #f9f9f9;
				  padding: 20px;
				  border-radius: 10px;
				  /*border: 0.5px solid rgba(130, 130, 130, 0.25);*/
				  /*box-shadow: 0 2px 3px rgba(0, 0, 0, 0.1), 
							  0 0 0 1px rgba(0, 0, 0, 0.1);*/
				}

				h1 {
				  color: #130f40;
				  font-family: 'Varela Round', sans-serif;
				  letter-spacing: -.5px;
				  font-weight: 700;
				  padding-bottom: 10px;
				}

				.upload-container {
				  background-color: rgb(239, 239, 239);
				  border-radius: 6px;
				  padding: 10px;
				}

				.border-container {
				  border: 5px dashed rgba(198, 198, 198, 0.65);
				  border-radius: 6px;
				  padding: 20px;
				}

				.border-container p {
				  color: #130f40;
				  font-weight: 600;
				  font-size: 1.1em;
				  letter-spacing: -1px;
				  margin-top: 30px;
				  margin-bottom: 0;
				  opacity: 0.65;
				}

				#file-browser {
				  text-decoration: none;
				  color: rgb(22,42,255);
				  border-bottom: 3px dotted rgba(22, 22, 255, 0.85);
				}

				#file-browser:hover {
				  color: rgb(0, 0, 255);
				  border-bottom: 3px dotted rgba(0, 0, 255, 0.85);
				}

				.icons {
				  color: #95afc0;
				  opacity: 0.55;
				}
				</style>
				<script type="text/javascript">
					$("#file-upload").css("opacity", "0");
					$("#file-browser").click(function(e) {
					  e.preventDefault();
					  $("#file-upload").trigger("click");
					});			
				</script>
</body>
</html>
