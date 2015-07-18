<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\SwapModelRows;
use App\Traits\SetOrderValue;
use App\Traits\ConditionManagement;

class Language extends Model {

    protected $fillable = ['name', 'rank', 'hidden'];

    use SwapModelRows, SetOrderValue, ConditionManagement;
}
