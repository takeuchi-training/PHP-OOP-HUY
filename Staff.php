<?php 

abstract class Staff {
    protected $staffID;
    protected $name; 
    protected $dayStar , $daysOff;
    protected Department $department; 
    

    protected function setConstruct(int $staffID, string $name,  $dayStar , $daysOff  ,Department $department)
    {
        $this->staffID = $staffID;
        $this->name = $name;
        $this->dayStar = $dayStar;
        $this->daysOff = $daysOff;
        $this->department = $department;
    }

    public function getStaffID()
    {
        return $this->staffID;
    }

    public function setStaffID($staffID)
    {
        $this->staffID = $staffID;

        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getDayStar()
    {
        return $this->dayStar;
    }

 
    public function setDayStar($dayStar)
    {
        $this->dayStar = $dayStar;

        return $this;
    }


    public function getDaysOff()
    {
        return $this->daysOff;
    }

    public function setDaysOff($daysOff)
    {
        $this->daysOff = $daysOff;

        return $this;
    }

    public function getDepartment()
    {
        return $this->department;
    }


    public function setDepartment($department)
    {
        $this->department = $department;

        return $this;
    }

};

interface ICalculator {
    public function calculateSalary();
}


class Employee extends Staff implements ICalculator  {
    private $overtime;
    const COEFFICIENTS_EMPLOYEE = 1;

    public function __construct (int $staffID, string $name , $dayStar , $daysOff  ,Department $department, int $overtime ) {
        Staff::setConstruct($staffID, $name ,$dayStar , $daysOff  ,$department);
        $this->overtime = $overtime;
    }


    public function calculateSalary() {
        $coefficientsSalary = self::COEFFICIENTS_EMPLOYEE;
        $salary = $coefficientsSalary * 5000000 + 5000000*($this->daysOff - $this->dayStar + $this->overtime) ;
        return $salary;
    }
};

class Manager extends Staff implements ICalculator {
    private $position;
    const COEFFICIENTS_BL = 3;
    const COEFFICIENTS_PL = 2;
    const COEFFICIENTS_TL = 1.5;

    public function __construct (int $staffID, string $name , $dayStar , $daysOff  ,Department $department,int $position ) {
        Staff::setConstruct($staffID, $name ,$dayStar , $daysOff  ,$department);
        $this->position = $position;
    }
    
    public function calculateSalary() {
        $coefficientsSalary = 0;
        if($this->position == 1){
            $coefficientsSalary = self::COEFFICIENTS_TL;
        } elseif($this->position == 2){
            $coefficientsSalary = self::COEFFICIENTS_PL;
        } else {
            $coefficientsSalary = self::COEFFICIENTS_BL;
        }
        
        $salary = $coefficientsSalary * 5000000 +  5000000*($this->daysOff - $this->dayStar);
        return $salary;
    }

    public function displayInformation() {
        if($this->position == 1){
            return "Technical Leader";
        } elseif($this->position == 2){
            return "Project Leader";
        } else {
            return "Business Leader";
        }
    }

    public function getOvertime()
    {
        return $this->overtime;
    }


    public function setOvertime($overtime)
    {
        $this->overtime = $overtime;

        return $this;
    }
};


class Department {
    private $departmentID;
    private $departmentName;
    private $amount;

    public function __construct (int $departmentID , string $departmentName, int $amount) {
        $this->departmentID = $departmentID;
        $this->departmentName = $departmentName;
        $this->amount = $amount;
    }

    public function __toString()
    {
        return "Mã bộ phận: " .$this->departmentID. " Tên bộ phận: " .$this->departmentName. " Số lượng nhân viên: " .$this->amount;
    }


    public function getAmount()
    {
        return $this->amount;
    }


    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }


    public function getDepartmentName()
    {
        return $this->departmentName;
    }


    public function setDepartmentName($departmentName)
    {
        $this->departmentName = $departmentName;

        return $this;
    }


    public function getDepartmentID()
    {
        return $this->departmentID;
    }

    public function setDepartmentID($departmentID)
    {
        $this->departmentID = $departmentID;

        return $this;
    }

}
