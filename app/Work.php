<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use App\Traits\ImageManaging;

class Work extends Model {

    use ImageManaging;

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
}
