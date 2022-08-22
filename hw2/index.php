<?php

declare(strict_types=1);
require_once('autoload.php');

use Units\Company;
use Units\Department;
use Staff\Director;
use Staff\Manager;
use Staff\Programmer;
use Staff\Tester;

$company = new Company('Mars');
try {
    $company->setOwnensType('state');
} catch (Exception $e) {
    echo $e->getMessage();
}
$director = new Director('Oligzey', 'Gnutvo', true);
$manager1 = new Manager('John', 'First', true);
$manager2 = new Manager('John', 'Second', false);

$dep1 = new Department('Small Software');
$programmer11 = new Programmer('Dan', 'Prog', true);
$programmer12 = new Programmer('Dan', 'Frog', false);
$programmer13 = new Programmer('Dan', 'Smog', true);
$tester11 = new Tester('Maksim', 'Smetana', false);
$dep1->setManager($manager1);
$dep1->addEmployee($programmer11);
$dep1->addEmployee($programmer12);
$dep1->addEmployee($programmer13);
$dep1->addEmployee($programmer13);
$dep1->addEmployee($tester11);

$dep2 = new Department('Medium Software');
$programmer12 = new Programmer('Dan', 'Prog', true);
$programmer22 = new Programmer('Dan', 'Frog', false);
$tester21 = new Tester('Maksim', 'Smetana', false);
$dep2->setManager($manager2);
$dep2->addEmployee($programmer12);
$dep2->addEmployee($programmer22);
$dep2->addEmployee($tester21);

$dep1->printDepartmentInfo();
$dep2->printDepartmentInfo();

$company->addDepartment($dep1);
$company->addDepartment($dep2);

$company->printCompanyInformation();
