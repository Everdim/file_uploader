<?php
/**
 * Upload class file
 *
 * @version 1.0
 * @author  Dmitry Balandin <dmitry.balandin.1990@gmail.com>
 */

/**
 * Class Upload
 */
abstract class Upload
{
    /**
     * @var string - dir name
     */
    protected $dir;
    /**
     * @var array - mime types
     */
    protected $mime_types = array();

    /**
     * Upload file it it's secure
     *
     * @param string $file - file extension
     *
     * @return bool
     */
    public function uploadFile($file)
    {
        if (!$this->isSecurity($file)) {
            return false;
        }
        $uploadfile = $this->dir."/".$file["name"]; // file will be saved here
        return move_uploaded_file($file["tmp_name"], $uploadfile);
    }

    /**
     * Security file check
     *
     * @param string $file - file extension
     *
     * @return bool
     */
    protected function isSecurity($file)
    {
        //forbidden extensions
        $blacklist = array(".php", ".phtml", ".php3", ".php4", ".html", ".htm");
        foreach ($blacklist as $item) {
            if (preg_match("/$item\$/i", $file["name"])) {
                return false;
            }
        }
        //check allowed mime types
        if (!in_array($file["type"], $this->mime_types)) {
            return false;
        }
        //check file-size (not more then 2mb)
        $size = $file["size"];
        if ($size > 2048000) {
            return false;
        }
        return true;
    }
}