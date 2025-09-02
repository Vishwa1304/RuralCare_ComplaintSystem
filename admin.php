<?php
session_start();
if(!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin'){
    header("Location: ../index.php");
    exit();
}
include '../includes/header.php';
?>

<div class="container my-5">
    <h1 class="display-5">Welcoming you, <?php echo $_SESSION['name']; ?> (Admin)</h1>
    <p>RuralCare – VillageSupport Portal Dashboard</p>
</div>

<?php include '../includes/footer.php'; ?>
