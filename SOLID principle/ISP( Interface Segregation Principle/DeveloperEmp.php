<?php 
    include_once "./DeveloperInterface.php";
    include_once "./EmployeeInterface.php";

    class DeveloperEmp implements Developer, Employee {
        public function coding() {
            return "Build a code";
        }

        public function work() {
            return "Working on projects";
        }
    }

?>