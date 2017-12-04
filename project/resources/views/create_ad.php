<html>
   <head>
      <title>Create Advertisement</title>
   </head>
   <body>
      <title>Advertisement Information</title>
      <form action = "/profile/ReviewAd" method = "post">
         <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
         <table>
            <span style="font-weight:bold; font-size:150%;">Advertisement information</span>
             <tr>
               <td>Ad Name</td>
               <td>
                <textarea name='name' id='name' style="width: 300px;" maxlength="50")" required="true"></textarea>
               </td>
            </tr>

            <tr>
               <td>Categories</td>
               <td>
                  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
                  <select name='category' id="category" )" required="true">
                     <option value=""         id="0">Please Choose a Category</option>
                     <option value="Buy"      id="1">Buy</option>
                     <option value="Sell"     id="1">Sell</option>
                     <option value="Service"  id="2">Service</option>
                     <option value="Rent"     id="3">Rent</option>
                  </select>
               </td>
            </tr>

            <tr>
               <td>Product/Service</td>
               <td>
                  <select name="product" id="product" )" required="true">
                    <option value=""                          >Choose Product/Service</option>

                    <option value="Clothing"            id="1">Clothing</option>
                    <option value="Books"               id="1">Books</option>
                    <option value="Electronics"         id="1">Electronics</option>
                    <option value="Musical Instruments" id="1">Musical Instruments</option>

                    <option value="Tutors"              id="2">Tutors</option>
                    <option value="Event Planners"      id="2">Event Planners</option>
                    <option value="Photographers"       id="2">Photographers</option>
                    <option value="Personal Trainers"   id="2">Personal Trainers</option>

                    <option value="Electronics"         id="3">Electronics</option>
                    <option value="Car"                 id="3">Car</option>
                    <option value="Apartments"          id="3">Apartments</option>
                    <option value="Wedding - Dresses"   id="3">Wedding - Dresses</option>
                  </select>
               </td>
            </tr>

            <tr>
               <td>Store Type</td>
               <td>
                  <select name='store_type' id='store_type' required="true">
                     <option value=""              id="0">Please Choose Store Type</option>
                     <option value="Physical"      id="1">Physical</option>
                     <option value="Online"        id="2">Online</option>
                     <option value="Physical and Online"          id="3">Physical and Online</option>
                  </select>
               </td>
            </tr>

            <tr>
              <td>Description</td>
              <td>
                <textarea name='description' id='description' value="" style="width: 300px; height: 150px;" maxlength="500" ) required="true"></textarea>
              </td>
            </tr>

            <tr>
               <td>Sale By</td>
               <td>
                  <select name="saleby" id="saleby">
                    <option value="Owner">Owner</option>
                    <option value="Business">Business</option>
                 </select>
              </td>
           </tr>

            <tr>
               <td>Price</td>
               <td><input type='number' name='price' id='price' value="0"/></td>
            </tr>
            <title>Contact Information</title>
            <tr>
              <td>Email</td>
              <td><input name='email' id='email'></input></td>
            </tr>
            <tr>
              <td>Phone Number</td>
              <td><input type='tel' name='phonenumber' id='phonenumber' maxlength="10"></input></td>
            </tr>
            <tr>
              <td>Address</td>
              <td><input name='address' id='address'></input></td>
            </tr>
            <tr>
               <td colspan = '2'>
                  <button onclick="return confirm('Are you sure you want to create?')" type="Create">Create</button>
                  <button onclick="return confirm('Are you sure you want to cancel?')" type="Cancel">Cancel</button>
               </td>
            </tr>

          <script>
            $("#category").change(function() {
              if ($(this).data('options') === undefined)
              {
                $(this).data('options', $('#product option').clone());
              }
              var id = $(this).val();
              var idNumb;
              if(id === "Sell" || id === "Buy"){
               idNumb = 1;
              }
              else if(id === "Service"){
               idNumb = 2;
              }
              else if(id === "Rent"){
               idNumb = 3;
              }
              else{
               idNumb = 0;
              }
              var options = $(this).data('options').filter('[id=' + idNumb + ']');
              $('#product').html(options);
            });
            $('#input-area textarea').fadeIn().html('').css("border","1px solid red");
         </script>
         </table>
      </form>
      
   </body>
</html>