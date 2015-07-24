<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\SwapModelRows;
use App\Traits\SetOrderValue;
use App\Traits\ConditionManagement;

class History extends Model {

    use SwapModelRows, SetOrderValue, ConditionManagement;

	protected $fillable = ['name', 'description', 'period', 'length', 'hidden', 'special'];

    protected $lengthFactor  = 3;
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

    /**
     * Return the total length of the period
     *
     * @return integer
     */
    public function getFullLength()
    {
        return $this->lengthFactor * $this->length;
    }

}
