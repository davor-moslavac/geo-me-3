<?php

namespace App\Entity;

/**
 * Interface ShapeInterface
 * @package App\Entity
 */
interface ShapeInterface
{
    /**
     * @return float
     */
    public function surface(): float;

    /**
     * @return float
     */
    public function circumference(): float;
}
