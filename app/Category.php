<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\SwapModelRows;
use App\Traits\SetOrderValue;
use App\Traits\ConditionManagement;
use DB;

class Category extends Model {

    use SwapModelRows, SetOrderValue, ConditionManagement;

    protected $fillable = ['name', 'hidden'];

    /**
     * Select resources with hidden=0
     *
     * @param  $query
     * @return
     */
    public function scopeVisible($query)
    {
        return $query->where('hidden', '=', 0);
    }

    /**
     * Skills of the current category
     *
     * @return
     */
    public function skills()
    {
        return $this->hasMany('App\Skill', 'category_id')->orderBy('order', 'asc');
    }

    /**
     * Visible Skills of the current category
     *
     * @return
     */
    public function visibleSkills()
    {
        return $this->skills()->where('hidden', '0');
    }

    /**
     * Splits categories into two equal parts
     *
     * @return array
     */
    static function splitInHalf()
    {
        $totalVisibleSkills = Skill::visible()->count();
        $all = self::visible()->get();
        $splitted = [[],[]];
        $currentSkillsCount = 0;
        $currentArray = &$splitted[0];
        foreach ($all as $category)
        {
            $skills = $category->visibleSkills()->count();
            array_push($currentArray, $category);
            $currentSkillsCount+=$skills;
            if($currentSkillsCount > $totalVisibleSkills/2 && empty($splitted[1])) {
                $currentArray = &$splitted[1];
            }
        }
        return $splitted;
    }


}
