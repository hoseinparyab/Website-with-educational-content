<?php
if (!isset($_SESSION['role'])) {
    echo '<script>window.location="../index.php";</script>';
}elseif ($_SESSION['role'] != 3) {
    echo '<script>window.location="../index.php";</script>';
}
