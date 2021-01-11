<?php
$json = file_get_contents('getAllUsers.json');
$k = json_decode($json, true);
$data = $k[0]["data"];
date_default_timezone_set('Asia/Dhaka');
$sl = 0;
$thisMonth = 0;
$nextMonth = 0;
$nextToNextMonth = 0;
$thisYear = 0;
$nextYear = 0;
$nextToNextYear = 0;
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

    $currentDate = getdate();
    $targetDate = explode("/", $obj->prlDate);
    if ($currentDate["year"] == $targetDate[2] && $currentDate["month"] == $targetDate[1]) {
        $thisMonth++;
    }
    if ($currentDate["year"] == $targetDate[2] && $currentDate["month"] + 1 == $targetDate[1]) {
        $nextMonth++;
    }
    if ($currentDate["year"] == $targetDate[2] && $currentDate["month"] + 2 == $targetDate[1]) {
        $nextToNextMonth++;
    }
    if ($currentDate["year"] == $targetDate[2]) {
        $thisYear++;
    }
    if ($currentDate["year"] + 1 == $targetDate[2]) {
       $nextYear++;
    }
    if ($currentDate["year"] + 2 == $targetDate[2]) {
       $nextToNextYear++;
    }
}

?>