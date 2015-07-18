<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model {

    protected $fillable = ['name', 'rank', 'hidden'];

    public function setOrder()
    {
        $order = $this->getLastOrderValue();
        $this->order = ++$order;
    }
    protected function getLastOrderValue()
    {
        return ($first = $this->orderBy('order', 'desc')->first()) ? $first->order : 0;
    }

    public function up()
    {
        $prev = $this->orderBy('order', 'desc')->where('order', '<', $this->order)->first();
        return $this->swap($prev, $this);
    }

    public function down()
    {
        $post = $this->orderBy('order', 'asc')->where('order', '>', $this->order)->first();
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
