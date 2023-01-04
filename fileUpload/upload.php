<?php
define('UPLOAD_DIRECTORY', '/var/php_uploaded_files/');
define('MAXSIZE', 52428800);

$ALLOWED_EXTENSIONS = array('pdf', 'doc', 'docx', 'odt');
$ALLOWED_MIMES = array(
	'application/pdf',
	'application/msword',
	'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
	'application/vnd.oasis.opendocument.text'
);

function validFileType($uploadedTempFile, $destFile) {
	global $ALLOWED_EXTENSIONS, $ALLOWED_MIMES;
	
	$fileExtension = pathinfo($destFilePath, PATHINFO_EXTENSION);
	$fileMime = mime_content_type($uploadedTempFile);
	
	$validFileExtension = in_array($fileExtension, $ALLOWED_EXTENSIONS);
	$validFileMime = in_array($fileMime, $ALLOWED_MIMES);
	
	$validFileType = $validFileExtension && $validFileMime;
	
	return $validFileType;
}

function handleUpload(){
	$uploadedTempFile = $_FILES['file']['tmp_name'];
	$filename = $_FILES['file']['name'];
	$destFile = UPLOAD_DIRECTORY.$filename;
	
	$isUploadedFile = is_uploaded_file($uploadedTempFile);
	$validSize = $_FILES['file']['size'] <= MAXSIZE && $_FILES['file']['size'] >= 0;
	
	if ($isUploadedFile && $validSize && $validFileType($uploadedTempFile, $destFile)) {
		$success = move_uploaded_file($uploadedTempFile, $destFile);
		
		if ($success) {
			$response = "The file was uploaded successfully!";
		} else {
			$response = "An unexpected error occurred; Sorry the file could not be uploaded! ";
		}
	} else {
		$response = "Error! The file could not be uploaded<br />Please check file type and size!";
	}
		
		return $response;
}

$validFormSubmission = !empty($_FILES);

if ($validFormSubmission) {
	$error = $_FILES[’file’][’error’];
	switch($error) {
		case UPLOAD_ERR_OK:
			$response = handleUpload();
			break;
		case UPLOAD_ERR_INI_SIZE:
			$response = ’Error: file size is bigger than allowed.’;
			break;
		case UPLOAD_ERR_PARTIAL:
			$response = ’Error: the file was only partially uploaded.’;
			break;
		case UPLOAD_ERR_NO_FILE:
			$response = ’Error: no file could have been uploaded.’;
			break;
		case UPLOAD_ERR_NO_TMP_DIR:
			$response = ’Error: no temp directory! Contact the administrator.’;
			break;
		case UPLOAD_ERR_CANT_WRITE:
			$response = ’Error: it was not possible to write in the disk. Contact the administrator.’;
			break;
		case UPLOAD_ERR_EXTENSION:
			$response = ’Error: a PHP extension stopped the upload. Contact the dministrator.’;
			break;
		default:
			$response = ’An unexpected error occurred; the file could not be uploaded.’;
			break;
	}
} else {
	$response = ’Error: the form was not submitted correctly - did you try to access the action url directly?’;
}

echo $response;