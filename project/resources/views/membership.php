<!DOCTYPE html>
<html>
<body>

<h><b> Select a Membership Plan</b></h>
<p> - Buying a membership plan will give you access to publishing an ad  </h>
<p> <p>

<form action="/profile_<?php echo $id ?>/membership/payment" method="get">
  <input type="radio" name="membership_plan" value="normal plan"> Normal Plan 3$ - Your ads will be visible for 7 days <br>
  <input type="radio" name="membership_plan" value="silver plan" checked="checked"> Silver Plan 5$ - Your ads will be visible for 14 days <br>
  <input type="radio" name="membership_plan" value="premium plan" checked="checked"> Premium Plan 10$ - Your ads will be visible for 30 days <br><br>
  <input type="submit" value="Proceed to pay">
</form>

<p> </p>


</body>
</html>