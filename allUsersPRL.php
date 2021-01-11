<?php

$getString = $_GET['q'];

//header('Content-Type: text/html; charset=UTF-8');

$json = file_get_contents('getAllUsers.json');
$k = json_decode($json, true);
$data = $k[0]["data"];
date_default_timezone_set('Asia/Dhaka');

/*print function*/
$printTable = function ($i, $obj){
    echo "<tr style='color:black;'>";
    echo "<td>".($i+1)."</td>";
    echo "<td>".$obj->name."</td>";
    echo "<td>".$obj->designation."</td>";
    echo "<td>".$obj->presentWorkingPlace."</td>";
    echo "<td>".$obj->joiningDate."</td>";
    echo "<td>".$obj->dob."</td>";
    echo "<td>".$obj->prlDate."</td>";
    echo "<td>".$obj->service->year." Years<br>".$obj->service->month." Months<br>".$obj->service->day." Days</td>";
};
/*print function*/

$sl = 0;
$tmpArr = [];

for ($i = 0; $i < sizeof($data); $i++) {
    $insideJson = $data[$i]["DATA"];
    $parsedInsideJson = json_decode($insideJson);
    $obj = new stdClass();
    $obj->empId = $parsedInsideJson->empID;
    $obj->name = $parsedInsideJson->nameEnglish;
    $obj->designation = $parsedInsideJson->originalDesignation;
    $obj->presentWorkingPlace = $parsedInsideJson->presentWorkingPlace;
    $obj->joiningDate = date('d/m/Y', strtotime($parsedInsideJson->dateOfJoining));
    $obj->dob = date('d/m/Y', strtotime($parsedInsideJson->dob));
    $obj->prlDate = date_create($parsedInsideJson->dob);
    date_add($obj->prlDate, date_interval_create_from_date_string('59 years'));
    date_add($obj->prlDate, date_interval_create_from_date_string('-1 day'));
    $serviceLength = date_diff(new DateTime(date_format($obj->prlDate, 'Y-m-d')), new DateTime(date_format(date_create($parsedInsideJson->dateOfJoining), 'Y-m-d')));
    $obj->service = new stdClass();
    $obj->service->year = $serviceLength->y;
    $obj->service->month = $serviceLength->m;
    $obj->service->day = $serviceLength->d;
    $obj->service->days = $serviceLength->days;
    $prlDateFormat = $obj->prlDate;
    $obj->prlDate = date_format($obj->prlDate, 'd/m/Y');

    if ($getString == 'allEmployees') {
        array_push($tmpArr, $obj);
    } elseif ($getString == 'thisMonth') {
        $currentDate = getdate();
        $targetDate = explode("/",$obj->prlDate);
        if ($currentDate["year"] == $targetDate[2] && $currentDate["month"] == $targetDate[1]) {
            $printTable($sl, $obj);
            $sl++;
        }
    } elseif ($getString == 'nextMonth') {
        $currentDate = getdate();
        $targetDate = explode("/",$obj->prlDate);
        if ($currentDate["year"] == $targetDate[2] && $currentDate["month"]+1 == $targetDate[1]) {
            $printTable($sl, $obj);
            $sl++;
        }
    } elseif ($getString == 'nextToNextMonth') {
        $currentDate = getdate();
        $targetDate = explode("/",$obj->prlDate);
        if ($currentDate["year"] == $targetDate[2] && $currentDate["month"]+2 == $targetDate[1]) {
            $printTable($sl, $obj);
            $sl++;
        }
    } elseif ($getString == 'thisYear') {
        $currentDate = getdate();
        $targetDate = explode("/",$obj->prlDate);
        if ($currentDate["year"] == $targetDate[2]) {
            $printTable($sl, $obj);
            $sl++;
        }
    } elseif ($getString == 'nextYear') {
        $currentDate = getdate();
        $targetDate = explode("/",$obj->prlDate);
        if ($currentDate["year"]+1 == $targetDate[2]) {
            $printTable($sl, $obj);
            $sl++;
        }
    } elseif ($getString == 'nextToNextYear') {
        $currentDate = getdate();
        $targetDate = explode("/",$obj->prlDate);
        if ($currentDate["year"]+2 == $targetDate[2]) {
            $printTable($sl, $obj);
            $sl++;
        }
    }
}
if ($getString == 'allEmployees') {
    function cmp($a, $b)
    {
        return strcmp($a->empId, $b->empId);
    }

    usort($tmpArr, "cmp");
    for ($i = 0; $i < sizeof($tmpArr); $i++) {
        $printTable($sl, $tmpArr[$i]);
        $sl++;
    }
}

?>