<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\SwapModelRows;
use App\Traits\SetOrderValue;
use App\Traits\ConditionManagement;

class Skill extends Model {

    use SwapModelRows, SetOrderValue, ConditionManagement;

	protected $fillable = ['name', 'category_id', 'hidden'];

    /**
     * Select resources with hidden=0
     *
     * @param  $query
     * @return
     */
    public function scopeVisible($query)
    {
        return $query->where('skills.hidden', '=', 0)
            ->join('categories', 'categories.id', '=', 'category_id')
            ->where('categories.hidden', '=', 0);
    }

    /**
     * Sets order for the resource
     *
     */
    public function setOrder()
    {
        $this->setOrderValue([['category_id', $this->category_id]]);
    }

    /**
     * Category of the current skill
     *
     * @return
     */
    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }

    /**
     * List of all the categories
     *
     * @return array
     */
    public function categoryList()
    {
        return Category::lists('name', 'id');
    }

    /**
     * Swaps the current resource with the previous one
     *
     * @return int
     */
    public function up()
    {
        return $this->moveUp([['category_id', $this->category_id]]);
    }

    /**
     * Swaps the current resource with the next one
     *
     * @return int
     */
    public function down()
    {
        return $this->moveDown([['category_id', $this->category_id]]);
    }

    static function countVisibleSkills()
    {
        return self::visible()->count();
    }
}
