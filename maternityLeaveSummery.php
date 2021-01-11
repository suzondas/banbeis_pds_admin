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
    for($j = 0; $j<sizeof($parsedInsideJson->leaveParticulars);$j++){
        if($parsedInsideJson->leaveParticulars[$j]->type == "Maternity Leave"){
            if($parsedInsideJson->leaveParticulars[$j]->from != '' && $parsedInsideJson->leaveParticulars[$j]->to != ''){
                $obj = new stdClass();
                $obj->empId = $parsedInsideJson->empID;
                $obj->name = $parsedInsideJson->nameEnglish;
                $obj->designation = $parsedInsideJson->originalDesignation;
                $obj->empPhoto = $parsedInsideJson->empPhoto;
                $obj->presentWorkingPlace = $parsedInsideJson->presentWorkingPlace;
                $obj->maternityLeaveFrom = date('Y-m-d', strtotime($parsedInsideJson->leaveParticulars[$j]->from));
                $obj->maternityLeaveTo = date('Y-m-d', strtotime($parsedInsideJson->leaveParticulars[$j]->to));
                array_push($MaternityLeaveArr, $obj);
            }
        }
    }
}
//var_dump($arr);

?>