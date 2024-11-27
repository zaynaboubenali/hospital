<?php
require '../db.php';
require '../includes/smarty_setup.php';

// Fetch doctors for the dropdown
$query = $pdo->query('SELECT * FROM doctors');
$doctors = $query->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $doctor_id = $_POST['doctor_id'];

    // Insert new patient into the database
    $stmt = $pdo->prepare('INSERT INTO patients (name, doctor_id) VALUES (:name, :doctor_id)');
    $stmt->execute(['name' => $name, 'doctor_id' => $doctor_id]);

    // Redirect to patient list
    header('Location: index.php');
    exit;
}

$smarty->assign('doctors', $doctors);
$smarty->assign('title', 'Add Patient');
$smarty->display('patient/form.tpl');
