<?php
require_once __DIR__ . '/../app/Classes/VehicleBase.php';
require_once __DIR__ . '/../app/Classes/VehicleActions.php';
require_once __DIR__ . '/../app/Classes/FileHandler.php';
require_once __DIR__ . '/../app/Classes/VehicleManager.php';

use App\Classes\VehicleManager;

$vehicleManager = new VehicleManager('', '', '', '');
$vehicles = $vehicleManager->getVehicles();


include __DIR__ . '/views/header.php';
?>

<div class="container my-4">
    <h1>Vehicle Listing</h1>
    <a href="./views/add.php" class="btn btn-success mb-4">Add Vehicle</a>
    <div class="row">
        <?php if (!empty($vehicles)): ?>
        <?php foreach ($vehicles as $vehicle): ?>
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="<?php echo htmlspecialchars($vehicle['image']); ?>" class="card-img-top"
                    alt="<?php echo htmlspecialchars($vehicle['name']); ?>" style="height: 200px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo htmlspecialchars($vehicle['name']); ?></h5>
                    <p class="card-text">Type: <?php echo htmlspecialchars($vehicle['type']); ?></p>
                    <p class="card-text">Price: $<?php echo htmlspecialchars($vehicle['price']); ?></p>
                    <a href="./views/edit.php?id=<?php echo $vehicle['id']; ?>" class="btn btn-primary">Edit</a>
                    <a href="./views/delete.php?id=<?php echo $vehicle['id']; ?>" class="btn btn-danger"
                        onclick="return confirm('Are you sure you want to delete this vehicle?');">Delete</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        <?php else: ?>
        <div class="col">
            <p>No vehicles found. Add one!</p>
        </div>
        <?php endif; ?>
    </div>
</div>

</body>

</html>