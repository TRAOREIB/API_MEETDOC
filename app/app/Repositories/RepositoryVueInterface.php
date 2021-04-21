<?php

namespace App\Repositories;

use Illuminate\Http\Request;

/**
 *
 * @author pc
 */
interface RepositoryVueInterface {

    public function allvue($vue);

    public function showvue($vue,$id);
}
