<?php


$getString = "allEmployees";

header('Content-Type: text/html; charset=UTF-8');

$json = file_get_contents('getAllUsers.json');
$json1 = file_get_contents('grade_wise_designation.json');

$k = json_decode($json, true);
$data = $k[0]["data"];

$gradeData = json_decode($json1, true);
$gradeDateFetched = $gradeData["data"];



/*print function*/
echo "<table border='1'><thead>
<th>SL</th>
<th>Name</th>
<th>Designation</th>
<th>Grade</th>
<th>Working place</th>
<th>Date of Birth</th>
<th>Present Age (Years)</th>
<th>Present Age (Months)</th>
<th>Present Age (Days)</th>
<th>Date of Joining</th>
<th>Date of PRL</th>
<th>Service Length</th>
</thead><tbody>";

$printTable = function ($i, $obj, $gradeDateFetched){
    $gradeFunction = function ($gradeDateFetched, $designation){
        $grade = 0;
        for($i=0;$i<sizeof($gradeDateFetched);$i++){
            if($designation == $gradeDateFetched[$i]["designation"]){
                $grade = $gradeDateFetched[$i]["grade"];
                break;
            }
        }
        return $grade;
    };
    echo "<tr style='color:black;'>";
    echo "<td>".($i+1)."</td>";
    echo "<td>".$obj->name."</td>";
    echo "<td>".$obj->designation."</td>";
    echo "<td>".$gradeFunction($gradeDateFetched,$obj->designation)."</td>";
    echo "<td>".$obj->presentWorkingPlace."</td>";
    echo "<td>".$obj->dob."</td>";
    echo "<td>".$obj->presentAge->year."</td>";
    echo "<td>".$obj->presentAge->month."</td>";
    echo "<td>".$obj->presentAge->day."</td>";
    echo "<td>".$obj->joiningDate."</td>";
    echo "<td>".$obj->prlDate."</td>";
    echo "<td>".$obj->service->year." Years<br>".$obj->service->month." Months<br>".$obj->service->day." Days</td>";
    echo "</tr>";

};
/*print function*/

$sl = 0;
for ($i = 0; $i < sizeof($data); $i++) {
    $insideJson = $data[$i]["DATA"];
    $parsedInsideJson = json_decode($insideJson);
    $obj = new stdClass();
    $obj->empId = $parsedInsideJson->empID;
    $obj->name = $parsedInsideJson->nameEnglish;
    $obj->designation = $parsedInsideJson->originalDesignation;
    $obj->mobile = $parsedInsideJson->mobile;
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

    $presentAge = date_diff(new DateTime(), new DateTime(date_format(date_create($parsedInsideJson->dob), 'Y-m-d')));
    $obj->presentAge = new stdClass();
    $obj->presentAge->year = $presentAge->y;
    $obj->presentAge->month = $presentAge->m;
    $obj->presentAge->day = $presentAge->d;
    $obj->presentAge->days = $presentAge->days;

    $prlDateFormat = $obj->prlDate;
    $obj->prlDate = date_format($obj->prlDate, 'd/m/Y');

    if ($getString == 'allEmployees') {
        $printTable($sl, $obj, $gradeDateFetched);
        $sl++;
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

?>