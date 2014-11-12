<?php

/**
 * Class Upload
 */
abstract class Upload
{
    protected $dir;
    protected $mine_types = array();

    /**
     * Verify the security of uploaded file
     *
     * @param $file
     *
     * @return bool
     */
    public function uploadFile($file)
    {
        if (!$this->isSecurity($file)) {
            return false;
        }
        $uploadfile = $this->dir."/".$file["name"]; //Specifies the directory and file name which will be loaded
        return move_uploaded_file($file["tmp_name"], $uploadfile);
    }

    /**
     * Verify the forbidden extensions
     *
     * @param $file
     *
     * @return bool
     */
    protected function isSecurity($file)
    {
        $blacklist = array(".php", ".php3", ".php4", ".html", ".htm");
        foreach ($blacklist as $item) {
            if (preg_match("/$item\$/i", $file["name"])) {
                return false;
            }
        }
        //Verify permissions mime_types
        if (!in_array($file["type"], $this->mime_types)) {
            return false;
        }

        //Verify the file-size
        $size = $file["size"];
        if ($size > 2048000) {
            return false;
        }
        return true;
    }
}

