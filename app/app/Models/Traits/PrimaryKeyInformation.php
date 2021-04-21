<?php

namespace App\Models\Traits;

trait PrimaryKeyInformation
{
    public function hasCompositeIndex()
    {
        return is_array($this->primaryKey);
    }
}
