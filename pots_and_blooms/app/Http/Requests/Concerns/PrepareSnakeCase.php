<?php

namespace App\Http\Requests\Concerns;

use Illuminate\Support\Str;



trait PrepareSnakeCase {

    public function prepareSnakeCase() {
        $this->merge(
            collect($this->all())->mapWithKeys(function ($value, $key) {
                return [Str::snake($key) => $value];
            })->toArray(),
        );
    }
}

?>