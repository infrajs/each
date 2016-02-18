<?php
namespace infrajs\each;
if (!is_file('vendor/autoload.php')) {
    chdir('../../../'); //Согласно фактическому расположению файла
    require_once('vendor/autoload.php');
}

// Проверка на ассоциативный массив
$elements = ['9' => '42', 8, 4, 5, 3];
assert(true === Each::isAssoc($elements));
$elements = 10;
assert(null === Each::isAssoc($elements));
$elements = [9, 8, 4, 5, 3];
assert(false === Each::isAssoc($elements));

// Проверка на число
$el = '';
assert(false === Each::isInt($el));
/*
assert(0 === Each::isInt($el));
*/
$el = 12;
assert(true === Each::isInt($el));
$el = '12';
assert(true === Each::isInt($el));
$el = '12 ';
assert(false === Each::isInt($el));

// Проверка ссылок друг на друга
$a = 1;
$b = 1;
assert(false === Each::isEqual($a, $b));
$a = 1;
$b = $a;
assert(false === Each::isEqual($a, $b));
$a = 1;
$b = &$a;
assert(true === Each::isEqual($a, $b));

/*
 * Проверяем, что при передаче любых значений (будь то текст, число, булево, массив и т.д.) на выходе мы гарантировано
 * получим массив.
 */
$el = '2';
Each::exec($el, function ($b) use (&$el) {$el = $b;});
var_dump($el);
exit();