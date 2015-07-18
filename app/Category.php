<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\SwapModelRows;
use App\Traits\SetOrderValue;
use App\Traits\ConditionManagement;

class Category extends Model {

    use SwapModelRows, SetOrderValue, ConditionManagement;

    protected $fillable = ['name', 'hidden'];

    /**
     * Skills of the current category
     *
     * @return
     */
    public function skills()
    {
        return $this->hasMany('App\Skill', 'category_id')->orderBy('order', 'asc');
    }
}
