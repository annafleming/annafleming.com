<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\SwapModelRows;

class PracticalSkill extends Model {

    use SwapModelRows;

    protected $fillable = ['name', 'rank', 'hidden'];

    /**
     * Sets order for the resource
     *
     */
    public function setOrder()
    {
        $this->order = $this->getLastOrderValue() + 1;
    }

    /**
     * Returns the last order value from all the resources
     *
     * @return int
     */
    protected function getLastOrderValue()
    {
        return ($last = $this->orderBy('order', 'desc')->first()) ? $last->order : 0;
    }

    /**
     * Swaps the current resource with the previous one
     *
     * @return int
     */
    public function up()
    {
        $prev = $this->orderBy('order', 'desc')->where('order', '<', $this->order)->first();
        return $this->swap($prev, $this);
    }

    /**
     * Swaps the current resource with the next one
     *
     * @return int
     */
    public function down()
    {
        $post = $this->orderBy('order', 'asc')->where('order', '>', $this->order)->first();
        return $this->swap($post, $this);
    }

}
