<html>

   <head>
      <title>Add New Store</title>
   </head>
   
        

   <p> Total price: <p>

   <body>
      <form action = "/saveStore" method = "post">
         <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">

         <table>
            <tr>
               <td>Store Name</td>
               <td><input type='text' name='Store Name' /></td>
            </tr>
            <tr>
               <td>Store Owner</td>
               <td><input type='text' name='Store Owner' /></td>
            </tr>
            <tr>
               <td>Store Location</td>
               <td><input type='text' name='sl' /></td>
            </tr>
            <tr>
               <td colspan = '2'>
                  <input type = 'submit' value = "Save Store"/>
               </td>
            </tr>
         </table>
      
      </form>
   
   </body>
</html>