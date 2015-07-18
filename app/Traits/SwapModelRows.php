<?php namespace App\Traits;


trait SwapModelRows {

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