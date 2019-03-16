<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use App\Service\GeometryService;
use App\Entity\Triangle;
use App\Entity\Circle;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class TestController
 * @package App\Controller
 */
class TestController
{
    /**
     * @var GeometryService
     */
    private $service;

    /**
     * IndexController constructor.
     * @param GeometryService $service
     */
    public function __construct(GeometryService $service)
    {
        $this->service = $service;
    }

    /**
     * @Route("/test/surface", methods={"GET"})
     */
    public function testSurface()
    {
        $a = new Triangle(11.5, 10.917, 11);
        $b = new Triangle(8, 9, 11);
        $c = new Circle(3);

        $result = $this->service->calculateSurface([$a, $b, $c]);

        return new JsonResponse([
            "result"    => number_format($result, 2, ".", "")
        ]);
    }

    /**
     * @Route("/test/circumference", methods={"GET"})
     */
    public function testCircumference()
    {
        $a = new Triangle(11.5, 10.917, 11);
        $b = new Triangle(8, 9, 11);
        $c = new Circle(3);

        $result = $this->service->calculateCircumference([$a, $b, $c]);

        return new JsonResponse([
            "result"    => number_format($result, 2, ".", "")
        ]);
    }
}
