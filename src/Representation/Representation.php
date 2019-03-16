<?php

namespace App\Representation;

use App\Entity\Circle;
use App\Entity\Triangle;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class Representation
 * @package App\Representation
 */
class Representation
{
    /**
     * @param Triangle $triangle
     * @return JsonResponse
     */
    public function triangle(Triangle $triangle): JsonResponse
    {
        return new JsonResponse([
            "type"          => $triangle->getType(),
            "a"             => $triangle->getA(),
            "b"             => $triangle->getB(),
            "c"             => $triangle->getC(),
            "surface"       => $triangle->surface(),
            "circumference" => $triangle->circumference()
        ]);
    }

    /**
     * @param Circle $circle
     * @return JsonResponse
     */
    public function circle(Circle $circle): JsonResponse
    {
        return new JsonResponse([
            "type"          => $circle->getType(),
            "radius"        => $circle->getRadius(),
            "surface"       => $circle->surface(),
            "circumference" => $circle->circumference()
        ]);
    }
}
