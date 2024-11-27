<?php
require 'db.php';  // Database connection

try {
    // Start transaction
    $pdo->beginTransaction();

    // Insert default departments first
    $departments = [
        'Cardiology',
        'Neurology',
        'Orthopedics',
        'Pediatrics'
    ];

    foreach ($departments as $department) {
        $stmt = $pdo->prepare('INSERT INTO departments (name) VALUES (:name)');
        $stmt->execute(['name' => $department]);
    }

    // Insert default doctors only after departments are inserted
    // Fetch department ids
    $stmt = $pdo->query('SELECT id, name FROM departments');
    $departmentsData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $departmentMap = array_column($departmentsData, 'id', 'name');

    $doctors = [
        ['name' => 'Dr. John Smith', 'department_name' => 'Cardiology'],
        ['name' => 'Dr. Emily Johnson', 'department_name' => 'Neurology'],
        ['name' => 'Dr. Michael Brown', 'department_name' => 'Orthopedics'],
        ['name' => 'Dr. Sarah White', 'department_name' => 'Pediatrics']
    ];

    foreach ($doctors as $doctor) {
        $departmentId = $departmentMap[$doctor['department_name']];
        $stmt = $pdo->prepare('INSERT INTO doctors (name, department_id) VALUES (:name, :department_id)');
        $stmt->execute(['name' => $doctor['name'], 'department_id' => $departmentId]);
    }

    // Insert default patients after doctors are inserted
    $patients = [
        ['name' => 'Alice Green', 'mobile' => '1234567890', 'appointment_date' => '2024-11-27', 'doctor_name' => 'Dr. John Smith', 'department_name' => 'Cardiology'],
        ['name' => 'Bob Adams', 'mobile' => '9876543210', 'appointment_date' => '2024-11-28', 'doctor_name' => 'Dr. Emily Johnson', 'department_name' => 'Neurology'],
        ['name' => 'Charlie Davis', 'mobile' => '5551234567', 'appointment_date' => '2024-11-29', 'doctor_name' => 'Dr. Michael Brown', 'department_name' => 'Orthopedics'],
        ['name' => 'Diana Clark', 'mobile' => '7771234567', 'appointment_date' => '2024-12-01', 'doctor_name' => 'Dr. Sarah White', 'department_name' => 'Pediatrics']
    ];

    // Fetch doctor ids
    $stmt = $pdo->query('SELECT id, name FROM doctors');
    $doctorsData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $doctorMap = array_column($doctorsData, 'id', 'name');

    foreach ($patients as $patient) {
        $doctorId = $doctorMap[$patient['doctor_name']];
        $departmentId = $departmentMap[$patient['department_name']];

        $stmt = $pdo->prepare('
            INSERT INTO patients (name, mobile, appointment_date, doctor_id, department_id, created_at, updated_at) 
            VALUES (:name, :mobile, :appointment_date, :doctor_id, :department_id, NOW(), NOW())
        ');
        $stmt->execute([
            'name' => $patient['name'],
            'mobile' => $patient['mobile'],
            'appointment_date' => $patient['appointment_date'],
            'doctor_id' => $doctorId,
            'department_id' => $departmentId
        ]);
    }

    // Commit transaction
    $pdo->commit();
    echo "Default data inserted successfully!";
} catch (Exception $e) {
    // Rollback transaction in case of error
    $pdo->rollBack();
    echo "Failed to insert data: " . $e->getMessage();
}
?>
