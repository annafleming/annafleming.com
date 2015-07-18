<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Work extends Model {

    protected $imagePublicPath = '/uploads/';

    protected $fillable = ['link', 'name', 'description', 'my_role', 'hidden'];

    /**
     * Select resources with hidden=0
     *
     * @param  $query
     * @return
     */
    public function scopeVisible($query)
    {
        return $query->where('hidden', '=', 0);
    }

    /**
     * Returns image path from public directory
     *
     * @return string
     */
    public function getImagePath()
    {
        return $this->imagePublicPath . '/'. $this->image;
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
    public function deleteImage()
    {
        if ($this->image)
            File::delete($this->getImageRealPath().$this->image);
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
    public function isImageExists()
    {
        return File::exists($this->getImageRealPath() . $this->image) && $this->image;
    }

    /**
     * Saves the new image
     *
     * @return Model
     */
    public function manageWorkImage($file)
    {
        if (null != $file){
            if ($this->image){
                $this->deleteImage();
            }
            $this->image = $this->generateNewFileName($file->getClientOriginalName());
            $file->move($this->getImageRealPath(), $this->image);
        }
    }


}
