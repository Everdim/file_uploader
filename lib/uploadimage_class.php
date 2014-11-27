<?php
/**
 * Upload image class file
 *
 * @version 1.0
 * @author  Dmitry Balandin <dmitry.balandin.1990@gmail.com>
 */

require_once "upload_class.php";

/**
 * Class UploadImage
 */
class UploadImage extends Upload
{
    /**
     * @var string - dir for image files
     */
    protected $dir = "images";
    /**
     * @var array - list of allow image types
     */
    protected $mime_types = array("image/jpeg", "image/png", "image/gif");
}