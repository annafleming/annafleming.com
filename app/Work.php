<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Work extends Model {

    protected $imagePublicPath = '/uploads/';

    protected $fillable = ['image', 'link', 'name', 'description', 'my_role', 'hidden'];

    public function scopeVisible($query)
    {
        return $query->where('hidden', '=', 0);
    }

    public function getImagePath()
    {
        return $this->imagePublicPath . '/'. $this->image;
    }

    public function deleteImage()
    {
        if ($this->image)
            File::delete($this->getImageRealPath().$this->image);
    }

    public function getImageRealPath()
    {
        return public_path() . $this->imagePublicPath;
    }

    public function generateNewFileName($oldFileName)
    {
        return time() . '-' . $oldFileName;
    }

    public function manageWorkImage($workRequest)
    {
        $this->fill($workRequest->all());
        if ($workRequest->hasFile('image')){
            if ($this->image){
                $this->deleteImage();
            }
            $file = $workRequest->file('image');
            $this->image = $this->generateNewFileName($file->getClientOriginalName());
            $file->move($this->getImageRealPath(), $this->image);

        }
        return $this;
    }

    public function isImageExists()
    {
        return File::exists($this->getImageRealPath() . $this->image) && $this->image;
    }
}
