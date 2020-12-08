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



<!-- Navbar goes here -->

   <!-- Page Layout here -->
   <div class="row">

     <div class="col s3">
       <?php include("nav.php"); ?>
     </div>

     <div class="col s9">
       <h3>Damn Vulnerable File Upload</h3>
       <p>Damn Vulnerable File Upload designed to practice File Upload Vulnerabilities. Unrestricted file 
       upload is really dangerous for Web Applications. We can upload php web shell or other malicious file through this vulnerability. You can use this lab for your teaching programs.</p>
       <b>Objectives</b>
       <p>All objectives are need to upload php file. You can use "phpinfo()" or "backdoor" for POC.</p>
       <b>Disclaimer</b>
       <p>Do not host this application on real world! If you have something new for file upload, let me know for future challenges. </p>
     </div>

   </div>

<?php include("footer.php"); ?>
</div>
  </body>
</html>
