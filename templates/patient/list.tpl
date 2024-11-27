{include file="../header.tpl"}
<h2>Patient List</h2>
<a href="create.php" class="btn btn-primary mb-3">Add Patient</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Doctor</th>
            <th>Department</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        {foreach from=$patients item=patient}
        <tr>
            <td>{$patient.id}</td>
            <td>{$patient.patient_name}</td>
            <td>{$patient.doctor_name}</td>
             <td>{$patient.department_name}</td>
            <td>
                <a href="update.php?id={$patient.id}" class="btn btn-sm btn-warning">Edit</a>
                <a href="delete.php?id={$patient.id}" class="btn btn-sm btn-danger">Delete</a>
            </td>
        </tr>
        {/foreach}
    </tbody>
</table>
{include file="../footer.tpl"}
