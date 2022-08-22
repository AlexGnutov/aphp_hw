<?php

namespace Units;

use Common\Utils;
use Staff\Director;
use Staff\Manager as Manager;
use Staff\Programmer;
use Staff\Tester;

interface DepartmentInterface {
    public function setManager(Manager $manager):void;
    public function addEmployee(Programmer|Tester $employee):void;
    public function printDepartmentInfo():void;
    public function getDepartmentStaff():array;
}

class Department implements DepartmentInterface {
    public readonly string $name;
    private Manager|null $departmentManager = null;
    private array $departmentStaff = [];

    function __construct(string $depName)
    {
        $this->name = ucfirst($depName);
    }

    public function setManager(Manager $manager): void
    {
        $this->departmentManager = $manager;
        $this->departmentStaff[] = $manager;
    }

    public function addEmployee(Tester|Programmer $employee): void
    {
        $this->departmentStaff[] = $employee;
    }

    function getDepartmentStaff(): array {
        return $this->departmentStaff;
    }

    public function printDepartmentInfo(): void
    {
        echo "***". PHP_EOL;
        echo "Dep. name: $this->name". PHP_EOL;

        $depManager = $this->departmentManager;
        echo "Manager: $depManager->fullName". PHP_EOL;
        $this->printDepartmentPositions();
    }

    private function printDepartmentPositions():void {
        $positions = array_count_values(
            array_map(
                function($employee) {
                    return $employee->position;
                },
                $this->departmentStaff
            )
        );
        Utils::printList($positions);
    }
}