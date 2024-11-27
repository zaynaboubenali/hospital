{include file="../header.tpl"}
<h2>{$title}</h2>
<form method="POST">
    <div class="mb-3">
        <label for="name" class="form-label">Patient Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{$patient.name|default:''}" required>
    </div>
    <div class="mb-3">
        <label for="doctor" class="form-label">Doctor</label>
        <select name="doctor_id" id="doctor" class="form-control" required>
            {foreach from=$doctors item=doctor}
            <option value="{$doctor.id}" >{$doctor.name}</option>
            {/foreach}
        </select>
    </div>
    <button type="submit" class="btn btn-success">Submit</button>
</form>
{include file="../footer.tpl"}
