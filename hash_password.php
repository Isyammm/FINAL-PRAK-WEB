<?php
$password_baru = 'admin123';
$hash_baru = password_hash($password_baru, PASSWORD_DEFAULT);
echo "Hash baru: " . $hash_baru;
?>
