<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class PracticalSkill extends Model {

    protected $fillable = ['name', 'rank', 'hidden'];

    public function setOrder()
    {
        $order = $this->getLastOrderValue();
        $this->order = ++$order;
    }
    protected function getLastOrderValue()
    {
        return $this->orderBy('order', 'desc')->first()->order;
    }

    public function up()
    {
        return 'up';
    }

    public function down()
    {
        return 'down';
    }

}
