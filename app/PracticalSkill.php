<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\SwapModelRows;
use App\Traits\SetOrderValue;
use App\Traits\ConditionManagement;

class PracticalSkill extends Model {

    use SwapModelRows, SetOrderValue, ConditionManagement;

    protected $fillable = ['name', 'rank', 'hidden'];

}
