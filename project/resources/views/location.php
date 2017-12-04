<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Elements</title>

</head>
<form action = "/province" method = "post">
   <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
<select onchange="elements(this,H,B)" name="province">
<option value="Quebec">Quebec</option> 
<option value="Ontario">Ontario</option>
</select>

<select id="H" style="display:none;" name="Hydrogen">
<option value="Montreal">Montreal</option>
<option value="Laval">Laval</option>
</select>

<select id="B" style="display:none;" name="Boron">
<option value="Toronto">Toronto</option>
<option value="Ottawa">Ottawa</option>
</select>
<input type = Submit value = Save>
</form>
</html>