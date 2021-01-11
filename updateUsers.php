<?php
$q = "allEmployees";
set_time_limit(0);
header('Content-Type: text/html; charset=UTF-8');
$json = file_get_contents('http://localhost/pds/admin/getAllUsers');
$json = "[" . $json . "]";
$k = json_decode($json, true);
$data = $k[0]["data"];

/*print function*/
$printTable = function ($i, $obj) {
    if ($obj->originalDesignation == 'Assistant Programmer') {
        if (!key_exists("email", $obj)) {
            $obj->email = '';
        }
        echo "<tr style='color:black;'>";
        echo "<td>" . ($i + 1) . "</td>";
        echo "<td>" . $obj->nameEnglish . "</td>";
        echo "<td>" . $obj->originalDesignation . "</td>";
        echo "<td>" . $obj->presentWorkingPlace . "</td>";
        echo "<td><a href='tel:" . $obj->mobile . "'> " . $obj->mobile . "</a></td>";
        echo "<td>" . "<a href=\"update-employee.php?id=" . $obj->empID . "\"> <button type=\"submit\" name=\"submit\" class=\"btn btn-success btn-labeled\">Update<span class=\"btn-label btn-label-right\"><i class=\"fa fa-arrow-circle-right\"></i></span></button></a>" . "</td>";

    }
};
/*print function*/

$sl = 0;
$tmpArr = [];
$individualEmployee = new stdClass();
for ($i = 0; $i < sizeof($data); $i++) {
    $insideJson = $data[$i]["DATA"];
    $parsedInsideJson = json_decode($insideJson);

    if ($q == 'allEmployees') {
        array_push($tmpArr, $parsedInsideJson);

    } elseif ($q == 'individual') {
        if (isset($_GET['id'])) {
            if ($parsedInsideJson->empID == $_GET['id']) {
                $individualEmployee = $parsedInsideJson;
                break;
            }
        }
    }
}
//    var_dump($individualEmployee);

if ($q == 'allEmployees') {
    function cmp($a, $b)
    {
        return strcmp($a->empID, $b->empID);
    }

    usort($tmpArr, "cmp");
    for ($i = 0; $i < sizeof($tmpArr); $i++) {
        $printTable($sl, $tmpArr[$i]);
        $sl++;
    }
}
?>