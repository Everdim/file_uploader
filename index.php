<?php
require_once "lib/uploadtext_class.php";
require_once "lib/uploadimage_class.php";
if ($_POST["upload"]) {
    $upload_text   = new UploadText();
    $upload_image  = new UploadImage();
    $success_text  = $upload_text->uploadFile($_FILES["text"]);
    $success_image = $upload_image->uploadFile($_FILES["image"]);
}
?>

<html>
<head>
    <title>File uploader</title>
</head>
<body>
<h1>Upload the file</h1>
<?
if ($_POST["upload"]) {
    if ($success_text) {
        echo "The text file is loaded";
    } else {
        echo "Error loading the text file";
    }
    echo "<br />";
    if ($success_image) {
        echo "The picture is loaded";
    } else {
        echo "Error loading the picture";
    }
}
?>
<form name="myform" action="index.php" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>Picture:</td>
            <td>
                <input type="file" name="image"/>
            </td>
        </tr>
        <tr>
            <td>Text file:</td>
            <td>
                <input type="file" name="text"/>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" name="upload" value="Upload"/>
            </td>
        </tr>
    </table>
</form>
</body>
</html>