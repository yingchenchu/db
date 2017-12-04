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
   ?>  

   <!-- add checks depending on if it's from a physical store -->
  <!--  <p> Total price: <p> -->
   <?php

   $current_user_id = 1;
   //Auth::user()->username;

   if($whichItemBuying=="Buying promotion package: "){
            $paymentConfirmationRoute = "/ad_" . $ad->ad_id . "/promo_" . $promo_or_membership . "/paymentConfirmation";

   }
   else if($whichItemBuying=="Buying membership plan: "){
      $paymentConfirmationRoute = "/user_" . $current_user_id . "/membership_" . $promo_or_membership ."/paymentConfirmation";

   }
   else{ //if neither of promo package or membership, must be buying an item from an add
            // $whichItemBuying = "Buying item from ad: ";
      $paymentConfirmationRoute = "/ad_" . $ad->ad_id . "/paymentConfirmation";

   }

   ?>


   <body>
      <form action = "<?php echo $paymentConfirmationRoute ?>" method = "post">
         <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">

         <table>
             <tr>
               <td>Card Type</td>
               <td>
                  <select name='card_type' onchange="selectedCategory()">
                     <option value="">Please choose a card type</option>
                     <option value="visa">Visa</option>
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
