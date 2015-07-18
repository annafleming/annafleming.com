<?php namespace App\Traits;


trait ConditionManagement{

    /**
     * Adds conditions from the array
     *
     * @param  array  $model
     * @param  array  $conditions
     * @return Model
     */
    protected function addConditions($model, $conditions)
    {
        if (!empty($conditions)) {
            foreach ($conditions as $condition) {
                $newCondition = $this->normalizeCondition($condition);
                $model->where($newCondition[0], $newCondition[1], $newCondition[2]);
            }
        }
        return $model;
    }

    /**
     * Normalizes array of condition so it has 3 elements, not 2
     *
     * @param  array  $conditions
     * @return array
     */
    protected function normalizeCondition($condition)
    {
        if (2 == count($condition))
        {
            $buffer = $condition[1];
            $condition[1] = '=';
            $condition[2] = $buffer;
        }
        return $condition;
    }
}