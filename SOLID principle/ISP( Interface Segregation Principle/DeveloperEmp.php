<?php 
use emp\Employee;
use emp\EmployeeInterface;
include "DeveloperInterface.php";
include "EmployeeInterface.php";
    class DeveloperEmp implements Developer,Employee{
        public function coding()
        {
            return "Build a code";
        }

        public function work()
        {
            return "Working on projects";
        }
    }
?>