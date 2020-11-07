<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');

// Определяем константу единой точки входа в приложение
define("APP_ENTRY", true);

// Подключение простого автолоадера
require_once 'simple_autoloader.php';

// Подключение файла констант
require_once 'constants.php';

use App\Figure\FunctionPowX2;

$message = '';

try {
    $x1 = isset($_GET["x1"]) ? (float) $_GET["x1"] : DEFAULT_X1;
    $x2 = isset($_GET["x2"]) ? (float) $_GET["x2"] : DEFAULT_X2;

    // Since PHP 7.4
    foreach ([$x1, $x2] as $x){
        $isValidParameter = filter_var(
            $x,
            FILTER_VALIDATE_FLOAT,
            [
                "options" => [
                    "min_range" => VALIDATION_MIN_RANGE,
                    "max_range"=> VALIDATION_MAX_RANGE
                ]
            ]
        );

        if ($isValidParameter === false) {
            throw new Exception("Не пройдена валидация входящих данных");
        }
    }

    $obj = new FunctionPowX2();
    $square = round($obj->getSquare($x1, $x2), SQUARE_ROUND_PRECISION);
    $message = "Площадь криволинейной трапеции: $square";

} catch (Throwable $error) {
    $message = $error->getMessage();
}
?>
<!DOCTYPE html>
<html lang="ru">
    <head>
        <title>Определение площади криволинейной трапеции</title>
        <meta charset="utf-8">
    </head>
    <body>
        <div>
            <?php echo $message;?>
        </div>
    </body>
</html>
