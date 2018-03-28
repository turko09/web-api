<?php
namespace TeamAlpha\Web;

// Require classes
require $_SERVER['DOCUMENT_ROOT'] . '/api/utils/db.php';
require $_SERVER['DOCUMENT_ROOT'] . '/api/utils/http.php';
require $_SERVER['DOCUMENT_ROOT'] . '/api/models/vehicle.php';
require $_SERVER['DOCUMENT_ROOT'] . '/api/models/vehiclelistitem.php';

// Declare use on objects to be used
use Exception;
use PDOException;

// HTTP headers for response
Http::SetDefaultHeaders('GET');

// Check if request method is correct
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    Http::ReturnError(405, array('message' => 'Request method is not allowed.'));
    return;
}

$id = 0;
$driverid = 0;

// Extract request query string
if (array_key_exists('id', $_GET)) {
    $id = intval($_GET['id']);
}
if (array_key_exists('driverid', $_GET)) {
    $driverid = intval($_GET['driverid']);
}

if ($id === 0 && $driverid === 0) {
    Http::ReturnError(400, array('message' => 'Vehicle id or driver id was not provided.'));
    return;
}

try {
    if ($id === 0) {
        // Id was not given
        // Return all vehicles for a driver

        // Create Db object
        $db = new Db('SELECT * FROM `vehicle` WHERE driverid = :driverid');

        // Bind parameters
        $db->bindParam(':driverid', $driverid);

        $response = array();

        // Execute
        if ($db->execute() > 0) {
            // Drivers were found
            $records = $db->fetchAll();
            foreach ($records as &$record) {
                $vehicle = new VehicleListItem($record);
                array_push($response, $vehicle);
            }
        }

        // Reply with successful response
        Http::ReturnSuccess($response);
    } else {
        // Create Db object
        $db = new Db('SELECT * FROM `vehicle` WHERE id = :id LIMIT 1');

        // Bind parameters
        $db->bindParam(':id', $id);

        // Execute
        if ($db->execute() === 0) {
            Http::ReturnError(404, array('message' => 'Vehicle not found.'));
        } else {
            // Driver document was found
            $record = $db->fetchAll()[0];
            $vehicle = new Vehicle($record);

            // Reply with successful response
            Http::ReturnSuccess($vehicle);
        }
    }
} catch (PDOException $pe) {
    Db::ReturnDbError($pe);
} catch (Exception $e) {
    Http::ReturnError(500, array('message' => 'Server error: ' . $e->getMessage() . '.'));
}
