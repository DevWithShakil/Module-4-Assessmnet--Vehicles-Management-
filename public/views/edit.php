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

$id = $_GET['id'];
$vm = new VehicleManager('', '', '', '');
$vehicle = $vm->viewVehicle($id);

if (!$vehicle) {
    echo "Vehicle not found.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $updatedData = [
        'name' => $_POST['name'],
        'type' => $_POST['type'],
        'price' => $_POST['price'],
        'image' => $_POST['image']
    ];
    $vm->editVehicle($id, $updatedData);

    header('Location: ../index.php');
    exit;
}

include 'header.php';
?>

<div class="container my-4">
    <h2>Edit Vehicle</h2>
    <form method="POST">
        <div class="mb-3">
            <label class="form-label">Vehicle Name</label>
            <input type="text" name="name" class="form-control"
                value="<?php echo htmlspecialchars($vehicle['name']); ?>" required />
        </div>
        <div class="mb-3">
            <label class="form-label">Type</label>
            <input type="text" name="type" class="form-control"
                value="<?php echo htmlspecialchars($vehicle['type']); ?>" required />
        </div>
        <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="number" name="price" class="form-control"
                value="<?php echo htmlspecialchars($vehicle['price']); ?>" required />
        </div>
        <div class="mb-3">
            <label class="form-label">Image URL</label>
            <input type="text" name="image" class="form-control"
                value="<?php echo htmlspecialchars($vehicle['image']); ?>" required />
        </div>
        <button type="submit" class="btn btn-primary">Update Vehicle</button>
    </form>
</div>

</body>

</html>