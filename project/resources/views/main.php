<html>
<h1>WELCOME</h1>
<form action = "/profile/<?php echo Auth::user()->username ?>" method = "get">
   	<input type = Submit value = Profile>
</form>
<form action = "/addStore" method = "get">
   	<input type = Submit value = "Add Store">
</form>
<form action = "/rentStore" method = "get">
   	<input type = Submit value = "Rent Store">
</form>

<form action = "paymentList" method = "get">
   	<input type = Submit value = "Payment Management System">
</form>

<form action = "/AllAds" method = "get">
   	<input type = Submit value = "See all the ads">
</form>
<form action = "/reports" method = "get">
   	<input type = Submit value = "See the reports">
</form>
