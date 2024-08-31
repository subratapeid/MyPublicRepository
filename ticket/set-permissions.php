<?php
// Required permission for this page
$requiredPermission = 'Common';
include 'include/navbar.php';

// Check if the user has the required permission
if (!hasPermission($requiredPermission)) {
    echo '<script>window.location.href = "unauthorized.html";</script>';
    exit;
}
$userPermissions = getUserPermissions();

// Fetch roles from the database
$stmtRoles = $pdo->prepare('SELECT id, role_name FROM roles WHERE can_edit = 1');
$stmtRoles->execute();
$rolesData = $stmtRoles->fetchAll(PDO::FETCH_KEY_PAIR);

$permissions = [];

// Fetch permissions from the database
$stmtPermissions = $pdo->prepare('SELECT id, permission_name FROM permissions');

$stmtPermissions->execute();
$permissionsData = $stmtPermissions->fetchAll(PDO::FETCH_KEY_PAIR);

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $role = $_POST['role'];
    $selectedPermissions = isset($_POST['permissions']) ? $_POST['permissions'] : [];

    // Clear existing permissions for the role
    $stmtDelete = $pdo->prepare('DELETE FROM role_permissions WHERE role_id = ?');
    $stmtDelete->execute([$role]);

    // Insert new permissions for the role
    foreach ($selectedPermissions as $permissionId) {
        if (isset($permissionsData[$permissionId])) {
            $stmtInsert = $pdo->prepare('INSERT INTO role_permissions (role_id, permission_id) VALUES (?, ?)');
            $stmtInsert->execute([$role, $permissionId]);
        }
    }

    echo 'Configuration saved successfully.';
    exit;
}
?>

<h2>Role-Based Access Control Configuration</h2>

<form id="roleForm">
    <label for="role">Select Role:</label>
    <select id="role" name="role">
        <?php foreach ($rolesData as $id => $name): ?>
            <option value="<?php echo htmlspecialchars($id); ?>"><?php echo htmlspecialchars($name); ?></option>
        <?php endforeach; ?>
    </select><br><br>

    <label>Permissions:</label><br>
    <?php foreach ($permissionsData as $id => $name): ?>
        <input type="checkbox" name="permissions[]" value="<?php echo htmlspecialchars($id); ?>"> <?php echo htmlspecialchars($name); ?><br>
    <?php endforeach; ?>
    
    <input type="submit" value="Save Configuration">
</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
// Handle form submission using JavaScript
document.getElementById('roleForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    // Implement AJAX call to save role-permission configuration
    $.ajax({
        type: 'POST',
        url: 'set-permissions.php',
        data: $('#roleForm').serialize(),
        success: function(response) {
            alert('Configuration saved successfully.');
            // Optionally, you can redirect or reload the page
            // window.location.reload();
        },
        error: function(error) {
            alert('Error saving configuration.');
        }
    });
});
</script>

<?php include 'include/footer.php'; ?>
