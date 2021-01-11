<?php

//header('Content-Type: application/json; charset=UTF-8');

$json = file_get_contents('getAllUsers.json');
$json1 = file_get_contents('grade_wise_designation.json');
$k = json_decode($json, true);
$data = $k[0]["data"];

$gradeData = json_decode($json1, true);
$gradeDateFetched = $gradeData["data"];

$sl = 0;
$genderwise = new stdClass();
$genderwise->male = [];
$genderwise->female = [];
$marritalWise = new stdClass();
$marritalWise->married = [];
$marritalWise->unmarried = [];
$locationWise = new stdClass();
$locationWise->headoffice = [];
$locationWise->uitrce = [];
$gradeWise = [];
$designationWise = [];
for ($i = 0; $i < sizeof($data); $i++) {
    $insideJson = $data[$i]["DATA"];
    $parsedInsideJson = json_decode($insideJson);
    $obj = new stdClass();
    $empId = $parsedInsideJson->empID;

    if ($parsedInsideJson->gender == 'Male') {
        array_push($genderwise->male, $empId);
    }
    if ($parsedInsideJson->gender == 'Female') {
        array_push($genderwise->female, $empId);
    }
    if ($parsedInsideJson->marritalStatus == 'Married') {
        array_push($marritalWise->married, $empId);
    }
    if ($parsedInsideJson->marritalStatus == 'Unmarried') {
        array_push($marritalWise->unmarried, $empId);
    }
    if ($parsedInsideJson->presentWorkingPlace == 'Head Office') {
        array_push($locationWise->headoffice, $empId);
    }
    if ($parsedInsideJson->presentWorkingPlace != 'Head Office') {
        array_push($locationWise->uitrce, $empId);
    }
    array_push($designationWise, $parsedInsideJson->presentDesignation);
//    array_push($gradeWise, $parsedInsideJson->presentDesignation);
}
$designationWise = array_count_values($designationWise);
//var_dump($designationWise);exit;
$gradeWiseData = [];

for ($j = 0; $j < sizeof($gradeDateFetched); $j++) {
    $flag = false;
    foreach ($designationWise as $key => $val) {
        if ($gradeDateFetched[$j]["designation"] == $key) {
            $flag = true;
            if (array_key_exists($gradeDateFetched[$j]["grade"], $gradeWiseData)) {
                $gradeWiseData[$gradeDateFetched[$j]["grade"]] = $gradeWiseData[$gradeDateFetched[$j]["grade"]] + $val;
            } else {
                $gradeWiseData[$gradeDateFetched[$j]["grade"]] = $val;
            }
        }
    }
//    if($flag == false && $gradeDateFetched[$j]["grade"] != 0){
//        $gradeWiseData[$gradeDateFetched[$j]["grade"]] = 0;
//    }
}
//var_dump($gradeWiseData);exit;

?>