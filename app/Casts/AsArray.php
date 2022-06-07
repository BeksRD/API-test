<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use App\Helper\ArrayConvert;

class AsArray implements CastsAttributes
{
    use ArrayConvert;

    public function get($model, string $key, $value, array $attributes)
    {
        $res = str_replace(['{','}','"'],"",(string)$value);
        return explode(',',$res);
    }

    public function set($model, string $key, $value, array $attributes)
    {
        // TODO: Implement set() method.
    }
}
