<?php

define('UPLOAD_PATH', $_SERVER['DOCUMENT_ROOT'] . '/eshop_images/');
define('DISPLAY_PATH', '/eshop_images/');
define('MAX_FILE_SIZE', 2000000);
$permitted = array('image/jpeg', 'image/pjpeg', 'image/png', 'image/gif');

if (isset($_POST['upload'])) {

	$fileName = $_FILES['userfile']['name'];
	$tmpName = $_FILES['userfile']['tmp_name'];
	$fileSize = $_FILES['userfile']['size'];
	$fileType = $_FILES['userfile']['type'];

	// get the file extension 
	$ext = substr(strrchr($fileName, "."), 1);
	// generate the random file name
	$randName = md5(rand() * time());

	// image name with extension
	$myfile = $randName . '.' . $ext;
	// save image path
	$path = UPLOAD_PATH . $myfile;

	if (in_array($fileType, $permitted) && $fileSize > 0 && $fileSize <= MAX_FILE_SIZE) {
		//store image to the upload directory
		$result = move_uploaded_file($tmpName, $path);

		if (!$result) {
			echo "Error uploading image file";
			exit;
		} else {
			$db = new mysqli(<host>, <user>, <passw>, <db>);

			if (mysqli_connect_errno()) {
				printf("Connect failed: %s<br/>", mysqli_connect_error());
			}

			$query =
			  "INSERT INTO my_image(name, size, type, file_path) VALUES(?,?,?,?)";
			$conn = $db->prepare($query);
			if ($conn == TRUE) {
				$conn->bind_param("siss", $myfile, $fileSize, $fileType, $path);
				if (!$conn->execute()) {
					echo 'error insert';
				} else {
					echo 'Success!<br/>';
					echo '<img src="' . DISPLAY_PATH . $myfile . '"/>';
				}
			} else {
				die("Error preparing Statement");
			}
		}
	} else {
		echo 'error upload file';
	}
} else {
	echo 'error';
}
?>