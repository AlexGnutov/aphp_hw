<?php

namespace Units;

use Common\Utils;
use Staff\Director as Director;

interface CompanyInterface {
    public function setDirector(Director $director):void;
    public function setOwnensType(string $typeDescription):void;
    public function addDepartment(Department $department):void;

    public function printCompanyInformation(bool $detailed):void;
}

class Company implements CompanyInterface {
    private string $name;
    private static array $allowedCompanyTypes = ['private', 'state'];
    private string|null $type = null;
    private array $departments = [];
    private Director|null $director = null;

    function __construct(string $companyName) {
        $this->name = $companyName;
        echo "Company named $this->name successfully created" . PHP_EOL;
    }

    public function setDirector(Director $director): void {
        $this->director = $director;
    }

    public function setOwnensType(string $typeDescription):void {
        if (in_array($typeDescription, Company::$allowedCompanyTypes)) {
            $this->type = $typeDescription;
        } else {
            throw new \Exception('Wrong company ownens type');
        }
    }

    public function addDepartment(Department $department):void {
        $this->departments[] = $department;
    }

    public function printCompanyInformation(bool $detailed = true):void {
        echo PHP_EOL;
        echo "****" . PHP_EOL;
        echo "Company name: $this->name" . PHP_EOL;
        echo "Company type: $this->type" . PHP_EOL;
        echo "Director name: $this->director" . PHP_EOL;
        if ($detailed) {
            $this->printCompanyStructureReport();
            $this->printCompanyStaffReport();
        }
    }

    private function printCompanyStructureReport(): void {
        echo "Company departments: " . PHP_EOL;
        if (count($this->departments) > 0) {
            $k = 1;
            foreach ($this->departments as $dep ) {
                echo "  $k. " . $dep->name . PHP_EOL;
                $k++;
            }
        } else {
            echo "Company structure is empty" . PHP_EOL;
        }
    }

    private function printCompanyStaffReport(): void {
        echo "Company staff information: " . PHP_EOL;
        $departmentsCount = count($this->departments);
        $companyStaff = [];
        foreach ($this->departments as $dep) {
            array_push($companyStaff, ...$dep->getDepartmentStaff());
        }
        $companyPositions = Utils::collectMentionsByFieldName($companyStaff, 'position');
        Utils::printList($companyPositions);
        echo "Total departments number: $departmentsCount" . PHP_EOL;
    }

}
