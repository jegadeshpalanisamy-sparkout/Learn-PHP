<?php
    include_once "ManagerInterface.php";
    include_once "EmployeeInterface.php";

    class ManagerEmp implements Manager, Employee {
        public function manageTeam() {
            return "Manage all team";
        }

        public function work() {
            return "also managing tasks";
        }
    }
?>