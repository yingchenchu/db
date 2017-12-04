<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">

<form action = "/city" method = "post">
   <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
<select  name="city">
<option value="Toronto">Toronto</option>
<option value="Ottawa">Ottawa</option>
</select>
<input type = Submit value = Save>
</form>

</head>
</html>
