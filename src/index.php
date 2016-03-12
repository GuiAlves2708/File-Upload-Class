<?php

require './includes/configs/Configs.php';
require './includes/autoload/autoload.php';

$up = new Upload();
?>

<form method="post" enctype="multipart/form-data">
    <input type="file" name="upload">
    <input type="submit" value="Upload Image" name="submit">
</form>

<?php

$up = new Upload();

if (isset($_POST['submit'])) {
	$file = $_FILES['upload'];

	if ($up->upload_file($file)) {
		echo 'successo';
	} else {
		echo 'Apenas extensões (png, jpg, jpeg) podem serem enviadas, verifique o tamanho máximo do arquivo que é de 2MB';
	}
}