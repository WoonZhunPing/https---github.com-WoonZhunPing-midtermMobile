<?php

// if (!isset($_GET)) {
//     $response = array('status' => 'failed', 'data' => null);
//     sendJsonResponse($response);
//     die();
// }
// include_once("dbconnect.php");

// $userId = $_GET['userId'];

// $sqlroom = "SELECT * FROM room WHERE room.userId = '$userId' ORDER BY roomRegDate DESC";
// try {
//     $result = $conn->query($sqlroom);
//         if ($result->num_rows > 0) {
//                 $roomarray["room"] = array();
//             while ($row = $result->fetch_assoc()) {
//                     $roomlist = array();
//                     $roomlist['roomId'] = $row['roomId'];
//                     $roomlist['roomName'] = $row['roomName'];
//                     $roomlist['roomDesc'] = $row['roomDesc'];
//                     $roomlist['roomCategory'] = $row['roomCategory'];
//                     $roomlist['roomPropety'] = $row['roomPropety'];
//                     $roomlist['roomPrice'] = $row['roomPrice'];
//                     $roomlist['roomState'] = $row['roomState'];
//                     $roomlist['roomLocality'] = $row['roomLocality'];
//                     $roomlist['roomLatitude'] = $row['roomLatitude'];
//                     $roomlist['roomLongitude'] = $row['roomLongitude'];
//                     $roomlist['roomRegDate'] = $row['roomRegDate'];
//                     $roomlist['userId'] = $row['userId'];


//                     array_push($roomarray["rooms"],$roomlist);
//             }
//         $response = array('status' => 'success', 'data' => $roomarray);
//         print($response);
//         sendJsonResponse($response);
//     } else {
//         $response = array('status' => 'failed', 'data' => null);
//         sendJsonResponse($response);
//     }
// } catch (Exception $e) {
//     $response = array('status' => 'error', 'data' => null);
//     sendJsonResponse($response);
// }
// $conn->close();

// function sendJsonResponse($sentArray)
// {
//     header('Content-Type: application/json');
//     echo json_encode($sentArray);
// }
error_reporting(0);
if (!isset($_GET['userid'])) {
    $response = array('status' => 'failed', 'data' => null);
    sendJsonResponse($response);
    die();
}
$userId = $_GET['userid'];
include_once("dbconnect.php");
$sqlroom = "SELECT * FROM room WHERE userId = '$userId'";

$result = $conn-> query($sqlroom);

if ($result->num_rows > 0) {
    $roomarray["rooms"] = array();
    while ($row = $result->fetch_assoc()) {
        $roomlist = array();
        $roomlist['roomId'] = $row['roomId'];
        $roomlist['roomName'] = $row['roomName'];
        $roomlist['roomDesc'] = $row['roomDesc'];
        $roomlist['roomCategory'] = $row['roomCategory'];
        $roomlist['roomProperty'] = $row['roomProperty'];
        $roomlist['roomPrice'] = $row['roomPrice'];
        $roomlist['roomState'] = $row['roomState'];
        $roomlist['roomLocality'] = $row['roomLocality'];
        $roomlist['roomLatitude'] = $row['roomLatitude'];
        $roomlist['roomLongitude'] = $row['roomLongitude'];
        $roomlist['roomRegDate'] = $row['roomRegDate'];
        $roomlist['userId'] = $row['userId'];
        array_push($roomarray["rooms"], $roomlist);
    }
    $response = array('status' => 'success', 'data' => $roomarray);
    sendJsonResponse($response);
} 
else {
    $response = array('status' => 'failed', 'data' => null);
    sendJsonResponse($response);
}

function sendJsonResponse($sentArray)
{
    header('Content-Type: application/json');
    echo json_encode($sentArray);
}
