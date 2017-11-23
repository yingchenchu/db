<html>

   <head>
      <title>Payment Page</title>
   </head>
   
   <p> Purchase Information <p>

   <?php  
      $ad =DB::table('ads')->first();
   ?>         

   <!-- add checks depending on if it's from a physical store -->
   <p> Total price: <p>

   <body>
      <form action = "/paymentConfirmation" method = "post">
         <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">

         <table>
            <tr>
               <td>Card Type</td>
               <td><input type='text' name='card_type' /></td>
            </tr>
            <tr>
               <td>Card Number</td>
               <td><input type='text' name='card_nbr' /></td>
            </tr>
            <tr>
               <td>Card Expiry Date</td>
               <td><input type='text' name='card_expiry_date' /></td>
            </tr>
            <tr>
               <td>Card CVV</td>
               <td><input type='text' name='card_cvv' /></td>
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
