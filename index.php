<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');

// Определяем константу единой точки входа в приложение
define("APP_ENTRY", true);

// Подключение простого автолоадера
require_once 'simple_autoloader.php';

use App\Figure\FunctionPowX2;

$message = '';

try {
    $x1 = !empty($_GET["x1"]) ? (float) $_GET["x1"] : 5;
    $x2 = !empty($_GET["x2"]) ? (float) $_GET["x2"] : 25;

    // Since PHP 7.4
    foreach ([$x1, $x2] as $x){
        if (filter_var($x, FILTER_VALIDATE_FLOAT, ["options" => ["min_range" => 0, "max_range"=> 10000]]) === false) {
            throw new Exception("Не пройдена валидация входящих данных");
        }
    }

    $obj = new FunctionPowX2();
    $square = round($obj->getSquare($x1, $x2), 4);
    $message = "Площадь криволинейной трапеции: $square";

} catch (Throwable $error) {
    $message = $error->getMessage();
}
?>
<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <div>
            <?php echo $message;?>
        </div>
    </body>
</html>
