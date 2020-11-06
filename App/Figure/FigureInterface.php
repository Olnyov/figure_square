<?php

namespace App\Figure;

interface FigureInterface
{
    /**
     * Расчет площади криволинейной трапеции от подынтегральной функции
     * @param float $x1 - первая точка на оси абсцисс
     * @param float $x2 - вторая точка на оси абсцисс
     * @return float - площадь криволинейной трапеции
     */
    public function getSquare(float $x1, float $x2): float;
}