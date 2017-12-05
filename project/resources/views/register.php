<html>

   <head>
      <title>Sign Up</title>
   </head>
   
   <p> Enter your information <p>
        

   <!-- add checks depending on if it's from a physical store -->
   
   <body>
      <form action = "/register" method = "post">
            <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">

         <table>
            <tr>
               <td>Username</td>
               <td><input type='text' name='username' required></td>
            </tr>
            <tr>
               <td>Password</td>
               <td><input type='password' name='password' required></td>
            </tr>
            <tr>
               <td>Repeat Password</td>
               <td><input type='password' name='password-repeat' required></td>
            </tr>
            <tr>
               <td colspan = '2'>
                  <input type = 'submit' value = "Sign Up"/>
               </td>
            </tr>
         </table>
      
      </form>
   
   </body>
</html>