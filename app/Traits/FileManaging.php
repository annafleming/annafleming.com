<?php namespace App\Traits;

use Illuminate\Support\Facades\File;

trait FileManaging{

    protected $filePublicPath = '/uploads/';

    protected $imageTypes = [IMAGETYPE_GIF, IMAGETYPE_JPEG, IMAGETYPE_PNG, IMAGETYPE_BMP];
    /**
     * Returns file path from public directory
     *
     * @return string
     */
    public function getFilePath($fieldName = 'image')
    {
        return $this->filePublicPath . '/'. $this->$fieldName;
    }

    /**
     * Returns file path from root
     *
     * @return string
     */
    public function getFileRealPath()
    {
        return public_path() . $this->filePublicPath;
    }

    /**
     * Deletes file
     *
     */
    public function deleteFile($fieldName = 'image')
    {
        if ($this->$fieldName && $this->isFileExists($fieldName))
            File::delete($this->getFileRealPath().$this->$fieldName);
    }

    /**
     * Generate a new file name
     *
     * @param string $oldFileName
     * @return string
     */
    public function generateNewFileName($oldFileName)
    {
        return time() . '-' . $oldFileName;
    }

    /**
     * Checks if file exists
     *
     * @return boolean
     */
    public function isFileExists($fieldName = 'image')
    {
        return File::exists($this->getFileRealPath() . $this->$fieldName) && $this->$fieldName;
    }

    /**
     * Saves the new file
     *
     * @return Model
     */
    public function manageFile($file, $fieldName = 'image')
    {
        if (null != $file){
            if ($this->$fieldName){
                $this->deleteFile();
            }
            $this->$fieldName = $this->generateNewFileName($file->getClientOriginalName());
            $file->move($this->getFileRealPath(), $this->$fieldName);
        }
    }

    /**
     * Checks if the file is Image
     *
     * @param string
     * @return boolean
     */
    public function isImageFile($fieldName = 'image')
    {

        if ($this->isFileExists($fieldName)){
            $type = exif_imagetype($this->getFileRealPath().$this->$fieldName);
            if(in_array($type, $this->imageTypes))
                return true;
        }
        return false;
    }

}