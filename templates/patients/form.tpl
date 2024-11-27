{extends file="layouts/base.tpl"}

{block name="content"}
<div class="container mt-4">
    <h1>{if isset($patient.id)}Edit Patient{else}Add Patient{/if}</h1>
    
    {if $errors}
    <div class="alert alert-danger">
        <ul>
            {foreach $errors as $error}
            <li>{$error}</li>
            {/foreach}
        </ul>
    </div>
    {/if}

    <form method="POST">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{$patient.name|default:''}" required>
        </div>
        <div class="form-group">
            <label for="mobile">Mobile</label>
            <input type="text" name="mobile" id="mobile" class="form-control" value="{$patient.mobile|default:''}">
        </div>
        <div class="form-group">
        <label for="appointment_date">Appointment Date</label>
        <input type="datetime-local" name="appointment_date" id="appointment_date" class="form-control" value="{$patient.appointment_date|default:''}" required>
        </div>
        <div class="form-group">
            <label for="doctor_id">Doctor</label>
            <select name="doctor_id" id="doctor_id" class="form-control" required>
                {foreach $doctors as $doctor}
                <option value="{$doctor.id}" {if isset($patient.doctor_id) && $patient.doctor_id == $doctor.id}selected{/if}>{$doctor.name}</option>
                {/foreach}
            </select>
        </div>
        <div class="form-group">
            <label for="department_id">Department</label>
            <select name="department_id" id="department_id" class="form-control" required>
                {foreach $departments as $department}
                <option value="{$department.id}" {if isset($patient.department_id) && $patient.department_id == $department.id}selected{/if}>{$department.name}</option>
                {/foreach}
            </select>
        </div>
        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
{/block}
