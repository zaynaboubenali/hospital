<?php
require '../db.php';
require '../includes/smarty_setup.php';

$id = $_GET['id'];

// Fetch patient details
$stmt = $pdo->prepare('SELECT * FROM patients WHERE id = :id');
$stmt->execute(['id' => $id]);
$patient = $stmt->fetch(PDO::FETCH_ASSOC);

// Fetch doctors for the dropdown
$query = $pdo->query('SELECT * FROM doctors');
$doctors = $query->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $doctor_id = $_POST['doctor_id'];

    // Update patient details
    $stmt = $pdo->prepare('UPDATE patients SET name = :name, doctor_id = :doctor_id WHERE id = :id');
    $stmt->execute(['name' => $name, 'doctor_id' => $doctor_id, 'id' => $id]);

    // Redirect to patient list
    header('Location: index.php');
    exit;
}

$smarty->assign('patient', $patient);
$smarty->assign('doctors', $doctors);
$smarty->assign('title', 'Edit Patient');
$smarty->display('patient/form.tpl');
