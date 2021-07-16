<?php


 if(isset($_POST["btnsub"]))
 {
	 $filename = explode(".",$_FILES['imageupload']['name']);
	 $extension = $filename[1];
	 if(($extension == "jpg" || $extension == "png" || $extension == "gif"))
	 {
		$imagename = time().'_'.random(10000,99999).'_'.$extension;
		$sourcepath = $_FILES['imageupload']['temp_name'];
		$destpath = $_FILES['imageupload']['../uploadimages/.$imagename'];
		move_uploaded_file($sourcepath,$destpath);
	    echo "image upload successfully";
	 }
	 else
	 {
		 echo "Please choose imagefile";
	 }
	 
 }

?>



<html>
<head>
</head>
<body>
<form method="post" enctype="multipart/form-data">
select image:<input type="file" name="file1"><br/>
<input type="submit" name="btnsub" value="upload image">
</form>
</body>
</html>