<?php
namespace TeamAlpha\Web;

// HTTP headers for response
header('Access-Control-Allow-Orgin: *');
header("Access-Control-Allow-Methods: GET");
header('Content-Type: application/json; charset=UTF-8');

require $_SERVER['DOCUMENT_ROOT'] . '/api/models/trip.php';

// Check if request method is correct
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    // Reply with error response
    header('HTTP/1.1 405 Method Not Allowed');
    echo json_encode(array('message' => 'Request method is not allowed.'));
    return;
}

$id = 0;
$stage = 'All';

// Extract request query string
if (array_key_exists('id', $_GET)) {
    $id = intval($_GET['id']);
}
if (array_key_exists('stage', $_GET)) {
    $stage = $_GET['stage'];
}

if ($id === 0) {
    // Id was not given
    // Return trips based on conditions

    // TO DO: Return of actual trips

    $response = array();

    if ($stage === 'All' || $stage === 'Requested') {
        $trip1 = new Trip();
        $trip1->id = 1;
        $trip1->vehicleId = 1;
        $trip1->passengerId = 1;
        $trip1->source = 'Don Pablo Bldg, 114 Amorsolo Street, Legazpi Village, Makati, Kalakhang Maynila, Philippines';
        $trip1->sourceLat = 14.556764;
        $trip1->sourceLong = 121.014685;
        $trip1->destination = 'San Agustin Church, General Luna St, Manila, Metro Manila, Philippines';
        $trip1->destinationLat = 14.588990;
        $trip1->destinationLong = 120.975238;
        $trip1->stage = 'Requested';
        $trip1->dateStart = null;
        $trip1->dateEnd = null;
        $trip1->datecreated = date('Y-m-d H:i:s', strtotime('-7 minutes'));
        $trip1->datemodified = date('Y-m-d H:i:s', strtotime('-7 minutes'));
        array_push($response, $trip1);
    }

    if ($stage === 'All' || $stage === 'Allocated') {
        $trip2 = new Trip();
        $trip2->id = 2;
        $trip2->vehicleId = 2;
        $trip2->passengerId = 2;
        $trip2->source = '1883 Eusebio, Pasig, Metro Manila, Philippines';
        $trip2->sourceLat = 14.571438;
        $trip2->sourceLong = 121.097039;
        $trip2->destination = '252 Doña Soledad Ave, Parañaque, 1709 Metro Manila, Philippines';
        $trip2->destinationLat = 14.489057;
        $trip2->destinationLong = 121.020372;
        $trip2->stage = 'Allocated';
        $trip2->dateStart = null;
        $trip2->dateEnd = null;
        $trip2->datecreated = date('Y-m-d H:i:s', strtotime('-4 minutes'));
        $trip2->datemodified = date('Y-m-d H:i:s', strtotime('-2 minutes'));
        array_push($response, $trip2);
    }

    if ($stage === 'All' || $stage === 'Ongoing') {
        $trip3 = new Trip();
        $trip3->id = 3;
        $trip3->vehicleId = 3;
        $trip3->passengerId = 3;
        $trip3->source = '27 Pres M L Quezon, Taguig, 1637 Metro Manila, Philippines';
        $trip3->sourceLat = 14.517339;
        $trip3->sourceLong = 121.073150;
        $trip3->destination = '975 Mindanao Ave, Novaliches, Quezon City, Metro Manila, Philippines';
        $trip3->destinationLat = 14.724520;
        $trip3->destinationLong = 121.055880;
        $trip3->stage = 'Ongoing';
        $trip3->dateStart = date('Y-m-d H:i:s', strtotime('-10 minutes'));
        $trip3->dateEnd = null;
        $trip3->datecreated = date('Y-m-d H:i:s', strtotime('-15 minutes'));
        $trip3->datemodified = date('Y-m-d H:i:s', strtotime('-2 minutes'));
        array_push($response, $trip3);
    }

    if ($stage === 'All' || $stage === 'Completed') {
        $trip4 = new Trip();
        $trip4->id = 4;
        $trip4->vehicleId = 4;
        $trip4->passengerId = 4;
        $trip4->source = 'Tecno Hub, Commonwealth Ave, Diliman, Quezon City, Metro Manila, Philippines';
        $trip4->sourceLat = 14.657489;
        $trip4->sourceLong = 121.057913;
        $trip4->destination = 'Festival Supermall, Alabang, Muntinlupa, 1781 Kalakhang Maynila, Philippines';
        $trip4->destinationLat = 14.416753;
        $trip4->destinationLong = 121.040746;
        $trip4->stage = 'Completed';
        $trip4->dateStart = date('Y-m-d H:i:s', strtotime('-40 minutes'));
        $trip4->dateEnd = date('Y-m-d H:i:s');
        $trip4->datecreated = date('Y-m-d H:i:s', strtotime('-45 minutes'));
        $trip4->datemodified = date('Y-m-d H:i:s');
        array_push($response, $trip4);
    }

    if ($stage === 'All' || $stage === 'Cancelled') {
        $trip5 = new Trip();
        $trip5->id = 5;
        $trip5->vehicleId = 5;
        $trip5->passengerId = 5;
        $trip5->source = '29-3 Colossians St, Marikina, 1800 Metro Manila, Philippines';
        $trip5->sourceLat = 14.645332;
        $trip5->sourceLong = 121.108480;
        $trip5->destination = 'Tektite Tower East, Exchange Rd, San Antonio, Pasig, Metro Manila, Philippines';
        $trip5->destinationLat = 14.582573;
        $trip5->destinationLong = 121.062169;
        $trip5->stage = 'Cancelled';
        $trip5->dateStart = null;
        $trip5->dateEnd = null;
        $trip5->datecreated = date('Y-m-d H:i:s', strtotime('-5 minutes'));
        $trip5->datemodified = date('Y-m-d H:i:s', strtotime('-3 minutes'));
        array_push($response, $trip5);
    }

    // Reply with successul response
    header('HTTP/1.1 200 OK');
    echo json_encode($response);
} else {
    // TO DO: Actual check if trip exists
    if ($id === 404) {
        // Sample not found
        // Reply with error response
        header('HTTP/1.1 404 Not Found');
        echo json_encode(array('message' => 'trip not found.'));
    } else {
        // trip was found

        // TO DO: Return of actual trip

        $trip = new Trip();
        $trip->id = $id;
        $trip->vehicleId = 1;
        $trip->passengerId = 1;
        $trip->source = 'Don Pablo Bldg, 114 Amorsolo Street, Legazpi Village, Makati, Kalakhang Maynila, Philippines';
        $trip->sourceLat = 14.556764;
        $trip->sourceLong = 121.014685;
        $trip->destination = 'San Agustin Church, General Luna St, Manila, Metro Manila, Philippines';
        $trip->destinationLat = 14.588990;
        $trip->destinationLong = 120.975238;
        $trip->stage = 'Requested';
        $trip->dateStart = null;
        $trip->dateEnd = null;
        $trip->datecreated = date('Y-m-d H:i:s', strtotime('-5 minutes'));
        $trip->datecreated = date('Y-m-d H:i:s', strtotime('-5 minutes'));

        // Reply with successful response
        header('HTTP/1.1 200 OK');
        echo json_encode($trip);
    }
}
