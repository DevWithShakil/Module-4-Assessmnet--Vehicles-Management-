<?php
require_once __DIR__ . '/../../app/Classes/VehicleBase.php';
require_once __DIR__ . '/../../app/Classes/VehicleActions.php';
require_once __DIR__ . '/../../app/Classes/FileHandler.php';
require_once __DIR__ . '/../../app/Classes/VehicleManager.php';

use App\Classes\VehicleManager;

if (!isset($_GET['id'])) {
    echo "Invalid request.";
    exit;
}

$vm = new VehicleManager('', '', '', '');
$vm->deleteVehicle($_GET['id']);

header('Location: ../index.php');
exit;