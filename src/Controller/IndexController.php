<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use App\Representation\Representation;
use App\Entity\Circle;
use Assert\Assert;
use App\Entity\Triangle;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class IndexController
 * @package App\Controller
 */
class IndexController
{
    /**
     * @var Representation
     */
    private $representation;

    /**
     * IndexController constructor.
     * @param Representation $representation
     */
    public function __construct(Representation $representation)
    {
        $this->representation = $representation;
    }

    /**
     * @param string $radius
     * @Route("/circle/{radius}", methods={"GET"})
     * @return JsonResponse
     */
    public function circleAction(string $radius)
    {
        Assert::lazy()
            ->that($radius, null)
            ->numeric()
            ->greaterThan(0)
            ->verifyNow();

        $circle = new Circle(floatval($radius));

        $representation = $this->representation->circle($circle);

        return $representation;
    }

    /**
     * @param string $a
     * @param string $b
     * @param string $c
     * @return JsonResponse
     * @throws \Exception
     * @Route("/triangle/{a}/{b}/{c}", methods={"GET"})
     */
    public function triangleAction(string $a, string $b, string $c)
    {
        Assert::lazy()
            ->tryAll()
            ->that($a, null)
            ->numeric()
            ->greaterThan(0)
            ->that($b, null)
            ->numeric()
            ->greaterThan(0)
            ->that($c, null)
            ->numeric()
            ->greaterThan(0)
            ->verifyNow();


        $triangle = new Triangle(floatval($a), floatval($b), floatval($c));

        $representation = $this->representation->triangle($triangle);

        return $representation;
    }
}
