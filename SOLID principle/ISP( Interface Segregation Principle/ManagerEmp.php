<?php
use manage\Manager;
use emp\Employee;
include "ManagerInterface.php";
include "EmployeeInterface.php";
    class ManagerEmp implements Manager,Employee{
        public function manageTeam()
        {
            return "Manage all team";
        }
        public function work()
        {
            return "Managing task";
        }
    }
?>