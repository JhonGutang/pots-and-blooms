<?php

namespace App\Services;

use App\Models\Flower;

class FlowerService {


    public function store ($validatedData) {
        if (isset($validatedData['image']))  {
              $imagePath = $validatedData['image']->store('flowers', 'public');
              unset($validatedData['image']);
              $validatedData['image_path'] = $imagePath;
        }

        return Flower::create($validatedData);

    }
}

?>