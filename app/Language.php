<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\SwapModelRows;
use App\Traits\SetOrderValue;
use App\Traits\ConditionManagement;
use App\Traits\FileManaging;

class Language extends Model{

    protected $fillable = ['name', 'hidden'];

    use SwapModelRows, SetOrderValue, ConditionManagement, FileManaging;

    /**
     * Select resources with hidden=0
     *
     * @param  $query
     * @return
     */
    public function scopeVisible($query)
    {
        return $query->where('hidden', '=', 0)->orderBy('order', 'asc');
    }
}
