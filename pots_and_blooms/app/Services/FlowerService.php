<?php

namespace App\Services;

use App\Models\Flower;
use Carbon\Carbon;

class FlowerService {

    public function fetchAll () {
        $flowers = Flower::all();
        foreach ($flowers as $flower) {
            $flower->created_at_formatted = $this->formatDate($flower->created_at);
            unset($flower->created_at, $flower->updated_at);
        }
        return $flowers;
    }

    public function store ($validatedData) {
        if (isset($validatedData['image']))  {
            $imagePath = $validatedData['image']->store('flowers', 'public');
            unset($validatedData['image']);
            $validatedData['image_path'] = $imagePath;
        }

        return Flower::create($validatedData);
    }

    private function formatDate($date) {
         return Carbon::parse($date)->format('m/d/y');
    }
}
