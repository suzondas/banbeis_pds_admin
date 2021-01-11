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
$MaternityLeaveArr = [];
for ($i = 0; $i < sizeof($data); $i++) {
    $insideJson = $data[$i]["DATA"];
    $parsedInsideJson = json_decode($insideJson);
    for($j = 0; $j<sizeof($parsedInsideJson);$j++){
                $obj = new stdClass();
                $obj->empId = $parsedInsideJson->empID;
                $obj->name = $parsedInsideJson->nameEnglish;
                $obj->designation = $parsedInsideJson->originalDesignation;
                $obj->empPhoto = $parsedInsideJson->empPhoto;
                $obj->presentWorkingPlace = $parsedInsideJson->presentWorkingPlace;
                $obj->dob = date('Y-m-d', strtotime($parsedInsideJson->dob));
                $obj->dobCustom = explode("/", $parsedInsideJson->dob);
                if(sizeof($obj->dobCustom) == 3){
                    $obj->dobCustom = date("Y")."-". $obj->dobCustom[0]."-". $obj->dobCustom[1];
                    array_push($MaternityLeaveArr, $obj);
                }

    }
}
//var_dump($MaternityLeaveArr);

?>