<?php
require_once "upload_class.php";

/**
 * Class UploadImage
 */
class UploadImage extends Upload
{
    protected $dir = "images";
    protected $mime_types = array("image/jpeg", "image/png", "image/gif");
}
