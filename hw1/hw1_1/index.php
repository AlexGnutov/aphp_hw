<?php

declare(strict_types=1);
require_once('autoload.php');

use Electronics\Tv as Tv;
use Transport\Car as Car;
use People\Student as Student;


echo "TV information";
echo PHP_EOL;
$newTV = new Tv('Panasonic', 25, 'colour', 300);
$newTV->printSpecification();

$newTV2 = new Tv('Rubin', 72, 'colour', 2790);
$newTV2->printSpecification();

$newTV3 = new Tv('Sony', 14, 'black-and-white', 120);
$newTV3->printSpecification();

Tv::printCurrentLimits();
echo PHP_EOL;
echo PHP_EOL;


echo "Car information";
echo PHP_EOL;

$myCar = new Car('Toyota', 'Supra Turbo', 'Sport Couple', 'Carolinian Red');
$myCar->setYearOfManufacture(1992);
$myCar->printSpecification();
echo PHP_EOL;
echo PHP_EOL;


echo "Student information";
echo PHP_EOL;

$student = new Student('Lena', 'Paul', 1992);
$student->setGroupName('bphp-25');
$student->setStatus(1);
echo $student->getStatus() . PHP_EOL;
echo PHP_EOL;

echo "Student - class information";
Student::printClassInfo();
echo PHP_EOL;
echo PHP_EOL;