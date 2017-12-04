<html>

   <head>
      <title>Payment Page</title>
   </head>
   
   <p> Purchase Information <p>

   <?php echo "<p>
      <span>$whichItemBuying $promo_or_membership</span>
      </p>"; ?>

   <?php  
      if($whichItemBuying!="Buying membership plan: "){
      $ad =DB::table('ads')->where('ad_id', $id)->first();
         if($ad!= NULL){
           echo "   <p>
               <span style='font-weight:bold;'>Advertisement Name: </span>
               <span>$ad->ad_name</span>
            </p>
            <p>
               <span style='font-weight:bold;'>Category: </span>
               <span>$ad->category</span>
            </p>
            <p>
               <span style='font-weight:bold;'>Store Type: </span>
               <span>$ad->store_type</span>
            </p>
            <p>
               <span style='font-weight:bold;'>Product: </span>
               <span>$ad->product</span>
            </p>
            <p>
               <span style='font-weight:bold;'>Description: </span>
               <span>$ad->description</span>
            </p>
            <p>
               <span style='font-weight:bold;'>Sale By: </span>
               <span>$ad->saleby</span>
            </p>
            <p>
               <span style='font-weight:bold;'>Price: </span>
               <span>$ad->price</span>
            </p>
            <p>
               <span style='font-weight:bold;'>Posted Date: </span>
               <span>$ad->post_date</span>
            </p>";
         }
       }

   $current_user_id = 1;
   //Auth::user()->username;

   if($whichItemBuying=="Buying promotion package: "){
      $paymentConfirmationRoute = "/ad_" . $ad->ad_id . "/promo_" . $promo_or_membership . "/paymentConfirmation";

        if($promo_or_membership=="7 days"){
                $promo_id = 1;
        }
        else if($promo_or_membership=="30 days")
                $promo_id = 2;

        else{
                $promo_id = 3;
        }

        $total = DB::table('promotion_packages')->where('promotion_id', $promo_id)->value('price');

   }
   else if($whichItemBuying=="Buying membership plan: "){
      $paymentConfirmationRoute = "/user_" . $current_user_id . "/membership_" . $promo_or_membership ."/paymentConfirmation";

       $total = DB::table('membership_plans')->where('plan_type', $promo_or_membership)->value('price');
   }
   else{ //if neither of promo package or membership, must be buying an item from an add
            // $whichItemBuying = "Buying item from ad: ";
       $paymentConfirmationRoute = "/ad_" . $ad->ad_id . "/paymentConfirmation";
       
       $total = $ad->price;

   }

// In addition to this, all the buyers in the store can make payments with credit/debit cards
// which cost 1% of the total transaction for debit payments, and 3% of the total transaction
// for credit payments

   if(isset( $_COOKIE['myJavascriptVar'])){
         $new_total =  $_COOKIE['myJavascriptVar'];
      // echo $phpVar;
   }
   else{
      $new_total = $total;
   }

   ?>

<!--    <p><b>  Total: <?php echo $total ?>$ <b><p>
 -->
<p id="final_total"><b><font size="6"> Total: <?php echo $total ?>$ <b></p>

<script>
function cardType() {
      if("<?php echo $ad->store_type ?>" == "Physical"){


       var cardTypeChosen = document.getElementById("card_type").value;
       if (cardTypeChosen=="visa"){
          var x = "<?php echo $total ?>";
          var new_total = x*1.03; 
       }
       else if (cardTypeChosen=="debit"){
          var x = "<?php echo $total ?>";
          var new_total = x*1.01; 

       }
       document.getElementById("final_total").innerHTML = "Total: " + new_total +"$";
       document.cookie = "myJavascriptVar = " + new_total
   }
}
</script>

   <body>
      <form action = "<?php echo $paymentConfirmationRoute ?>" method = "post">
         <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">

         <table>
             <tr>
               <td>Card Type</td>
               <td>
                  <select name='card_type' id="card_type" onchange="cardType()">
                     <option value="">Please choose a card type</option>
                     <option value="visa">Credit</option>
                     <option value="debit">Debit</option>
                  </select>
               </td>
            </tr>
            <tr>
               <td>Card Number</td>
               <td><input type='text' minlength="16" maxlength="16" name='card_nbr' /></td>
            </tr>
            <tr>
               <td>Card Expiry Date</td>
               <td><input type='date' name='card_expiry_date' min="<?php echo date('d-m-Y'); ?>" /></td>
            </tr>
            <tr>
               <td>Card CVV</td>
               <td><input type='text' minlength="3" maxlength="3" name='card_cvv' /></td>
            </tr>
            <tr>
               <td colspan = '2'>
                  <input type = 'submit' value = "Submit Payment"/>
               </td>
            </tr>
         </table>
      
      </form>


   
   </body>
</html>
