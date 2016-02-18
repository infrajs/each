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
 * Проверяем, количество вызовов.
 */
$counter=0;
$el = ['oduvanio', 'mail'];
Each::exec($el, function () use (&$counter) {$counter++;});
assert(2 === $counter);