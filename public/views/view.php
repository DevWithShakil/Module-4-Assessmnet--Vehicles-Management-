<?php
require_once __DIR__ . '/../../app/Classes/VehicleManager.php';
use App\Classes\VehicleManager;

$vm = new VehicleManager('', '', '', '');

if (!isset($_GET['id'])) {
    echo "Invalid vehicle ID.";
    exit;
}

$vehicle = $vm->viewVehicle($_GET['id']);

include 'header.php';
?>

<div class="container my-4">
    <?php if ($vehicle): ?>
    <h2><?php echo htmlspecialchars($vehicle['name']); ?></h2>
    <p><strong>Type:</strong> <?php echo htmlspecialchars($vehicle['type']); ?></p>
    <p><strong>Price:</strong> $<?php echo htmlspecialchars($vehicle['price']); ?></p>
    <img src="<?php echo htmlspecialchars($vehicle['image']); ?>" alt="" class="img-fluid">
    <?php else: ?>
    <p>Vehicle not found.</p>
    <?php endif; ?>
</div>
</body>

</html>