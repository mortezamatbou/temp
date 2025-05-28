<?php

namespace App\Traits;

trait FirstTrait
{
    public function get_user() {
        return request()->user()->id;
    }
}
