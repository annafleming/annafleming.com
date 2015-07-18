<?php namespace App\Traits;

/*
 *  You must include ConditionManagement trait
 *
 */
trait SwapModelRows {

    /**
     * Swaps the current resource with the previous one
     *
     * @return int
     */
    public function up()
    {
        return $this->moveUp();
    }

    /**
     * Swaps the current resource with the next one
     *
     * @return int
     */
    public function down()
    {
        return $this->moveDown();
    }

    /**
     * Swaps two resources
     *
     * @return int
     */
    protected function swap($modelA, $modelB = null)
    {
        $modelB =  (null === $modelB) ? $this : $modelB;
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

    /**
     * Swaps the current resource with the previous one
     *
     * @param  array  $conditions
     * @return int
     */
    protected function moveUp($conditions = array())
    {
        $prev = $this->orderBy('order', 'desc')->where('order', '<', $this->order);
        $prev = $this->addConditions($prev, $conditions)->first();
        return $this->swap($prev);
    }

    /**
     * Swaps the current resource with the next one
     *
     * @param  array  $conditions
     * @return int
     */
    protected function moveDown($conditions = array())
    {
        $post = $this->orderBy('order', 'asc')->where('order', '>', $this->order);
        $post = $this->addConditions($post, $conditions)->first();
        return $this->swap($post);
    }

}