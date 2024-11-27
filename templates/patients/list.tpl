{extends file="layouts/base.tpl"}

{block name="content"}
<div class="container mt-4">
    <h1>Patient List</h1>
    <a href="patients.php?action=add" class="btn btn-primary mb-3">Add Patient</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Mobile</th>
                <th>Appointment Date</th>
                <th>Doctor</th>
                <th>Department</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            {foreach $patients as $patient}
            <tr>
                <td>{$patient.id}</td>
                <td>{$patient.name}</td>
                <td>{$patient.mobile}</td>
                <td>{$patient.appointment_date}</td>
                <td>{$patient.doctor_name}</td>
                <td>{$patient.department_name}</td>
                <td>
                    <a href="patients.php?action=edit&id={$patient.id}" class="btn btn-warning btn-sm">Edit</a>
                    <a href="patients.php?action=delete&id={$patient.id}" class="btn btn-danger btn-sm">Delete</a>
                </td>
            </tr>
            {/foreach}
        </tbody>
    </table>
</div>
{/block}
