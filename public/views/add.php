<?php
require_once __DIR__ . '/../../app/Classes/VehicleBase.php';
require_once __DIR__ . '/../../app/Classes/VehicleActions.php';
require_once __DIR__ . '/../../app/Classes/FileHandler.php';
require_once __DIR__ . '/../../app/Classes/VehicleManager.php';

use App\Classes\VehicleManager;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'name' => $_POST['name'],
        'type' => $_POST['type'],
        'price' => $_POST['price'],
        'image' => $_POST['image']
    ];

    $vm = new VehicleManager($data['name'], $data['type'], $data['price'], $data['image']);
    $vm->addVehicle($vm->getDetails());

    header('Location: ../index.php');
    exit;
}

include 'header.php';
?>

<div class="container my-4">
    <h2>Add Vehicle</h2>
    <form method="POST">
        <div class="mb-3">
            <label class="form-label">Vehicle Name</label>
            <input type="text" name="name" class="form-control" required />
        </div>
        <div class="mb-3">
            <label class="form-label">Type</label>
            <input type="text" name="type" class="form-control" required />
        </div>
        <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="number" name="price" class="form-control" required />
        </div>
        <div class="mb-3">
            <label class="form-label">Image URL</label>
            <input type="text" name="image" class="form-control" required />
        </div>
        <button type="submit" class="btn btn-success">Add Vehicle</button>
    </form>
</div>

</body>

</html>