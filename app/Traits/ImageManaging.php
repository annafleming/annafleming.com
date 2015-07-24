<?php namespace App\Traits;

use Illuminate\Support\Facades\File;

trait ImageManaging{

    protected $imagePublicPath = '/uploads/';

    /**
     * Returns image path from public directory
     *
     * @return string
     */
    public function getImagePath($fieldName = 'image')
    {
        return $this->imagePublicPath . '/'. $this->$fieldName;
    }

    /**
     * Returns image path from root
     *
     * @return string
     */
    public function getImageRealPath()
    {
        return public_path() . $this->imagePublicPath;
    }

    /**
     * Deletes image file
     *
     */
    public function deleteImage($fieldName = 'image')
    {
        if ($this->$fieldName)
            File::delete($this->getImageRealPath().$this->$fieldName);
    }

    /**
     * Generate new image file name
     *
     * @param string $oldFileName
     * @return string
     */
    public function generateNewFileName($oldFileName)
    {
        return time() . '-' . $oldFileName;
    }

    /**
     * Checks if image file exists
     *
     * @return boolean
     */
    public function isImageExists($fieldName = 'image')
    {
        return File::exists($this->getImageRealPath() . $this->$fieldName) && $this->$fieldName;
    }

    /**
     * Saves the new image
     *
     * @return Model
     */
    public function manageImage($file, $fieldName = 'image')
    {
        if (null != $file){
            if ($this->$fieldName){
                $this->deleteImage();
            }
            $this->$fieldName = $this->generateNewFileName($file->getClientOriginalName());
            $file->move($this->getImageRealPath(), $this->$fieldName);
        }
    }

}