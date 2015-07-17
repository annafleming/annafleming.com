<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model {

	protected $fillable = ['name', 'category_id', 'hidden'];

    public function setOrder()
    {
        $order = $this->getLastOrderValue();
        $this->order = ++$order;
    }
    protected function getLastOrderValue()
    {
        $last = $this->orderBy('order', 'desc')
                     ->where('category_id', $this->category_id)
                     ->first();
        return ($last) ? $last->order : 0;
    }

    public function category()
    {
        return $this->belongsTo('App\SkillCategory', 'category_id');
    }

    public function categoryList()
    {
        return SkillCategory::lists('name', 'id');
    }

    public function up()
    {
        $prev = $this->orderBy('order', 'desc')
                     ->where('order', '<', $this->order)
                     ->where('category_id', $this->category_id)
                     ->first();
        return $this->swap($prev, $this);
    }

    public function down()
    {
        $post = $this->orderBy('order', 'asc')
                     ->where('order', '>', $this->order)
                     ->where('category_id', $this->category_id)
                     ->first();
        return $this->swap($post, $this);
    }

    protected function swap($modelA, $modelB)
    {
        if ($modelA && $modelB)
        {
            $currentOrder = $modelA->order;
            $modelA->order = $modelB->order;
            $modelB->order = $currentOrder;
            if ($modelA->update() && $modelB->update())
                return 1;
        }
        return 0;
    }
}
