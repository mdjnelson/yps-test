<?php

namespace App\Models;

class Beer
{
    public string $name;

    public string $tagline;

    public string $description;

    public float $abv;

    public ?float $ibu;

    public array $foodPairing;

    public ?string $imageUrl;

    public array $ingredients;

    public function __construct($name, $tagline, $description, $abv, $ibu, $foodPairing, $imageUrl, $ingredients)
    {
        $this->name = $name;
        $this->tagline = $tagline;
        $this->description = $description;
        $this->abv = $abv;
        $this->ibu = $ibu;
        $this->foodPairing = $foodPairing;
        $this->imageUrl = $imageUrl;
        $this->ingredients = $ingredients;
    }

    public function toArray(): array
    {
        $ingredients = [];
        foreach ($this->ingredients['malt'] as $malt) {
            $ingredients[] = "Malt: " . $malt['name'];
        }
        foreach ($this->ingredients['hops'] as $hop) {
            $ingredients[] = "Hop: " . $hop['name'];
        }
        $ingredients[] = "Yeast: " .$this->ingredients['yeast'];

        return [
            'name' => $this->name,
            'tagline' => $this->tagline,
            'description' => $this->description,
            'abv' => $this->abv,
            'ibu' => $this->ibu,
            'foodPairing' => $this->foodPairing,
            'imageUrl' => $this->imageUrl,
            'ingredients' => $ingredients,
        ];
    }
}
