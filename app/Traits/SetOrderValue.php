<?php namespace App\Traits;

/*
 *  You must include ConditionManagement trait
 *
 */
trait SetOrderValue{

    /**
     * Sets order for the resource
     *
     */
    public function setOrder()
    {
        $this->setOrderValue();
    }

    /**
     * Returns the last order value from all the resources
     *
     * @param array $conditions
     * @return int
     */
    protected function getLastOrderValue($conditions)
    {
        $last = $this->orderBy('order', 'desc');
        $last = $this->addConditions($last, $conditions)->first();
        return ($last) ? $last->order : 0;
    }

    /**
     * Sets order for the resource
     *
     * @param array $conditions
     */
    protected function setOrderValue($conditions = array())
    {
        $this->order = $this->getLastOrderValue($conditions) + 1;
    }
}