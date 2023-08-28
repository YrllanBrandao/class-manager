<?php

$logged = isset($_SESSION['role']);

if (!$logged) {
    header('Location: /login?error=403');
    exit;
}