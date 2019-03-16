<?php

namespace App\Service;

/**
 * Class GeometryService
 * @package App\Service
 */
class GeometryService
{
    /**
     * @param array $shapes
     * @return float
     */
    public function calculateSurface(array $shapes)
    {
        $result = 0;

        foreach ($shapes as $s) {
            $result += $s->surface();
        }

        return $result;
    }

    /**
     * @param array $shapes
     * @return float
     */
    public function calculateCircumference(array $shapes)
    {
        $result = 0;

        foreach ($shapes as $s) {
            $result += $s->circumference();
        }

        return $result;
    }
}
