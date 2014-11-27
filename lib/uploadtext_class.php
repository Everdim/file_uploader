<?php
/**
 * Upload text class file
 *
 * @version 1.0
 * @author  Dmitry Balandin <dmitry.balandin.1990@gmail.com>
 */

require_once "upload_class.php";

/**
 * Class UploadText
 */
class UploadText extends Upload
{
    /**
     * @var string - dir for text files
     */
    protected $dir = "text";
    /**
     * @var array - list of allow text types
     */
    protected $mime_types = array("text/plain");
}