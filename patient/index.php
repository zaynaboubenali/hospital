<?php
require '../db.php';  // Include your database connection
require '../includes/smarty_setup.php';  // Include Smarty setup

// SQL Query to fetch patient data along with doctor and department
$query = $pdo->query('
    SELECT 
        patients.id, 
        patients.name AS patient_name, 
        patients.mobile, 
        patients.appointment_date, 
        doctors.name AS doctor_name, 
        departments.name AS department_name
    FROM patients
    JOIN doctors ON patients.doctor_id = doctors.id
    JOIN departments ON doctors.department_id = departments.id
');

$patients = $query->fetchAll(PDO::FETCH_ASSOC);  // Fetch all results as an associative array

// Assign fetched data to Smarty
$smarty->assign('patients', $patients);

// Display the template
$smarty->display('patient/list.tpl');
