<html>

   <head>
      <title>Login</title>
   </head>
   
   <p> Enter your information <p>
   
   <body>
      <form action = "/login" method = "post">
      	    <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">

         <table>
            <tr>
               <td>Username</td>
               <td><input type='text' name='username' /></td>
            </tr>
            <tr>
               <td>Password</td>
               <td><input type='password' name='password' /></td>
            </tr>

            <tr>
               <td colspan = '2'>
                  <input type = 'submit' value = "Login"/>
                  <a href = "/register">Register</a>
               </td>
            </tr>
         </table>
      
      </form>
   
   </body>
</html>