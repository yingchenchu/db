<html>
<h1>WELCOME</h1>
<form action = "/profile/<?php echo Auth::user()->username ?>" method = "get">
   	<input type = Submit value = Profile>
</form>