<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    include "Staff.php";

    $IT = new Department(1, "IT", 20);
    $XD = new Department(2, "XÂY DỰNG", 15);
    $NS = new Department(3, "NHÂN SỰ", 10);

    $DPM = [$IT, $XD, $NS];

    $nhanVien1 = new Employee(1, "Huy",  strtotime("16/5/2022"),  strtotime("16/5/2022"), $IT, 1);
    $nhanVien2 = new Employee(2, "Truong",  strtotime("16/5/2022"),  strtotime("16/5/2022"), $IT, 2);
    $nhanVien3 = new Employee(3, "Thang",  strtotime("16/5/2022"),  strtotime("16/5/2022"), $IT, 3);
    $nhanVien4 = new Employee(4, "Hung",  strtotime("16/5/2022"),  strtotime("16/5/2022"), $IT, 4);

    $NV = [$nhanVien1, $nhanVien2, $nhanVien3, $nhanVien4];


    $quanly1 = new Manager(1, "Nhung", strtotime("16/5/2022"), strtotime("16/5/2022"), $IT, 3);
    $quanly2 = new Manager(2, "Minh", strtotime("16/5/2022"), strtotime("30/5/2022"), $XD, 1);
    $quanly3 = new Manager(3, "Linh", strtotime("16/5/2022"), strtotime("30/5/2022"), $NS, 2);
    $quanly4 = new Manager(4, "Lan", strtotime("16/5/2022"), strtotime("30/5/2022"), $IT, 3);
    $quanly5 = new Manager(5, "Lan1", strtotime("16/5/2022"), strtotime("30/5/2022"), $IT, 3);

    $QL = [$quanly1, $quanly2, $quanly3, $quanly4,$quanly5];


    ?>

    <div>THÔNG TIN PHÒNG BAN</div>
    <?php
    foreach ($DPM as $value) {
        echo "<div>" . $value->__toString() . "</div></br>";
    }
    ?>
    </br>
    </br>
    <div>THÔNG TIN NHÂN VIÊN</div>
    </br>
    <?php
    foreach ($NV as $value) {
        echo "<div> Mã Nhân viên: " . $value->getStaffID() . " </div></br>";
        echo "<div> Nhân viên: " . $value->getName() . " </div></br>";
        echo "<div> Ngày vào làm: " . $value->getDayStar() . " </div></br>";
        echo "<div> Ngày nghỉ: " . $value->getDaysOff() . " </div></br>";
        echo "<div> Phòng ban: " . $value->getDepartment()->getDepartmentName() . " </div></br>";
        echo "<div> Lương: " . $value->calculateSalary() . " </div></br>";
        echo "</br>";
    }
    ?>

    <div>THÔNG TIN Quản lí</div>
    <?php
    foreach ($QL as $value) {
        echo "<div> Mã Quản lí: " . $value->getStaffID() . " </div></br>";
        echo "<div> Quản lí: " . $value->getName() . " </div></br>";
        echo "<div> Ngày vào làm: " . $value->getDayStar() . " </div></br>";
        echo "<div> Ngày nghỉ: " . $value->getDaysOff() . " </div></br>";
        echo "<div> Phòng ban: " . $value->getDepartment()->getDepartmentName() . " </div></br>";
        echo "<div> Vị trí: " . $value->displayInformation() . " </div></br>";
        echo "<div> Lương: " . $value->calculateSalary() . " </div></br>";
        echo "</br>";
    }
    ?>

</body>

</html>