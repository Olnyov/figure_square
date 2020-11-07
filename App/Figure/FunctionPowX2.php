<?php

namespace App\Figure;

/**
 * Класс для работы с функцией pow($x, 2)
 * Class FunctionPowX2
 */
class FunctionPowX2 implements FigureInterface
{
    public function getSquare(float $x1, float $x2): float
    {
        return abs((1/3)*(pow($x2, 3) - pow($x1, 3)));
    }
}