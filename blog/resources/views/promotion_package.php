<!DOCTYPE html>
<html>
<body>

<h><b> Select a Promotion Package</b></h>
<p> - Buying a promotion package will increases the rank of your ad  </h>
<p> <p>

<script>
 	// alert("hello1");
	$("#promotion_package").change(function() {
	  var action = $(this).val() == "30 days" ? "1" : "4";
	  document.write(action); 
	  $("#search-form").prop("action", "/search/" + action);
	});
 </script>

 <p id="demo"></p>



 <script>
	document.cookie = "myJavascriptVar = 7 days" + 


	function myFunction() {
	    var x = document.querySelector('input[name="promotion_package"]:checked').value;
	    document.getElementById("demo").innerHTML = "You selected: " + x;
	    document.cookie = "myJavascriptVar = " + x

	}

</script>

<?php 
	if(isset( $_COOKIE['myJavascriptVar'])){
   		$phpVar =  $_COOKIE['myJavascriptVar'];
		echo $phpVar;
	}
	else{
		$phpVar = "7 days";
	}

?>



<form class ="search-form" id="search-form" form action="/ad_<?php echo $id ?>/promo_package/payment" onchange="myFunction()" onsubmit="setFormAction()" method="get">
  <input type="radio" name="promotion_package" value="7 days"> 7 days promotion 10$ - Your ad's rank will be increased for 7 days <br>
  <input type="radio" name="promotion_package" value="30 days" checked="checked"> 30 days - 50$ - Your ad's rank will be increased for 7 days <br>
  <input type="radio" name="promotion_package" value="60 days" checked="checked"> 60 days - 90$ - Your ad's rank will be visible for 60 days <br><br>
  <input type="submit" value="Proceed to pay" onclick='this.form.action="/ad_<?php echo $id ?>/promo_package_<?php echo $phpVar ?>/payment";'/>
</form>

<p> </p>

<form action="/ChosenAd/<?php echo $id ?>" method = "get">
	 <input type="submit" value="Go back" />
</form>


  <script>
  // Shorthand for $(document).ready();
  $(function() {
   $('#myform').submit(function(){
     var car = $('#promotion_package').val();
     $(this).attr('action', "http://www.mysite.com/" + car + ".html");
   });
  });
 </script>


<script type='text/javascript'>
function getdata(){
      var opt1 = document.getElementById('promotion_package').value;
      var response=confirm("Are you sure? option1="+opt1+" option2="+opt2);
        return response;

      // Do Something 
}
</script>





</body>
</html>
