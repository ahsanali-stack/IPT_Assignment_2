<?php

function sort_objects_by_total($a, $b) {
	if($a->obtainedMarks == $b->obtainedMarks){ return 0 ; }
	return ($a->obtainedMarks < $b->obtainedMarks) ? -1 : 1;
}

// Takes raw data from the request
// $json = file_get_contents('php://input');

$json = $_GET['request'];

// Converts it into a PHP object
$marksList = json_decode($json);


usort($marksList, 'sort_objects_by_total');
// echo json_encode($marksList);

function calculatePercentage($list)
{
    $marks = 0;
    $i=0;
    foreach ($list as $key => $element) {   
        //code to be executed 
        $marks += $element->obtainedMarks;
        $i++;
    }
    return ($marks/($i*100)*100);
}

$response = array();
$response["minMarks"] = $marksList[0]->obtainedMarks;
$response["maxMarks"] = $marksList[sizeof($marksList)-1]->obtainedMarks;
$response["minMarksSubject"] = $marksList[0]->name;
$response["maxMarksSubject"] = $marksList[sizeof($marksList)-1]->name;
$response["percentage"] = calculatePercentage($marksList);


header('Access-Control-Allow-Headers *');
echo json_encode($response);



// echo sizeof($marksList);




?>