<?php

namespace App\Entity;

/**
 * Class Circle
 * @package App\Entity
 */
class Circle implements ShapeInterface
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $type = "circle";

    /**
     * @var float
     * @Serializer\Type("float")
     */
    private $radius;

    /**
     * @var float
     * @Serializer\Type("float")
     */
    private $surface;

    /**
     * @var float
     * @Serializer\Type("float")
     */
    private $circumference;

    /**
     * Circle constructor.
     * @param float $radius
     */
    public function __construct(float $radius)
    {
        $this->radius = $radius;
    }

    /**
     * @return float
     */
    public function surface(): float
    {
        $this->surface = pow($this->radius, 2) * pi();

        return $this->surface;
    }

    /**
     * @return float
     */
    public function circumference(): float
    {
        $this->circumference = $this->radius * 2 * pi();

        return $this->circumference;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return float
     */
    public function getRadius(): float
    {
        return $this->radius;
    }
}
