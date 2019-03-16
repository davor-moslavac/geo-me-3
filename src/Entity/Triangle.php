<?php

namespace App\Entity;

/**
 * Class Triangle
 * @package App\Entity
 */
class Triangle implements ShapeInterface
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $type = "triangle";

    /**
     * @var float
     * @Serializer\Type("float")
     */
    private $a;

    /**
     * @var float
     * @Serializer\Type("float")
     */
    private $b;

    /**
     * @var float
     * @Serializer\Type("float")
     */
    private $c;

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
     * Triangle constructor.
     * @param float $a
     * @param float $b
     * @param float $c
     * @throws \Exception
     */
    public function __construct(
        float $a,
        float $b,
        float $c
    ) {
        if (!$this->isTriangle($a, $b, $c)) {
            throw new \Exception("Not a triangle!");
        }

        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
    }

    /**
     * @return float
     */
    public function surface(): float
    {
        $this->surface = (($this->a + $this->b + $this->c) / 2);

        return $this->surface;
    }

    /**
     * @return float
     */
    public function circumference(): float
    {
        $this->circumference = ($this->a + $this->b + $this->c);

        return $this->circumference;
    }

    /**
     * @return float
     */
    public function getA(): float
    {
        return $this->a;
    }

    /**
     * @return float
     */
    public function getB(): float
    {
        return $this->b;
    }

    /**
     * @return float
     */
    public function getC(): float
    {
        return $this->c;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Determine If Three Values Form A Triangle
     * @param float $a
     * @param float $b
     * @param float $c
     * @return boolean
     */
    function isTriangle(float $a, float $b, float $c)
    {
        return (($a + $b > $c) && ($a + $c > $b) && ($c + $b > $a));
    }
}
