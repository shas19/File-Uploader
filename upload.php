<?php session_start(); ?>

<?php

 echo "HELLO ".$_POST["Name"];

move_uploaded_file($_FILES["myfile"]["tmp_name"],"images/new.jpg");

?>
<body>
<br><br>
<img src="images/new.jpg" width="400" height="300">
</body>


