<?php
require_once('config.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>User Registration</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>

<div class="container">
  <div class="form-wrapper" style="width: 400px; margin: auto;">
    <div>
      <form action="registration.php" id="registration" method="post">
        <div class="container">
          <div class="justify-content-center">
            <h1>Registration</h1>
            <p>Fill up the form</p>
          </div>

              <hr class="mb-3">
              <label for="firstname">First Name</label>
              <input class="form-control" id="firstname" type="text" name="firstname" required>

              <label for="lastname">Last Name</label>
              <input class="form-control" id="lastname"  type="text" name="lastname" required>

              <label for="email">Email Address</label>
              <input class="form-control" id="email"  type="email" name="email" required>

              <label for="phonenumber">Phone Number</label>
              <input class="form-control" id="phonenumber"  type="text" name="phonenumber" required>

              <label for="address">Address</label>
              <input class="form-control" id="address"  type="address" name="address" required>
              <div class="row g-3">
                <div class="col-sm">
                  <label for="city">City</label>
                  <input class="form-control" id="city"  type="city" name="password" required>
                </div>
                <div class="col-sm">
                  <label for="postcode">Postcode</label>
                  <input class="form-control" id="postcode"  type="tel" pattern="[0-9]{2}\-[0-9]{3}" placeholder="Zip Code" name="postcode" required>
                </div>
              </div>
              <label for="age">Age</label>
              <input class="form-control" id="age"  type="number" name="age"required>

              <label for="password">Password</label>
              <input class="form-control" id="password"  type="password" name="password" required>

              <label for="regdate">Registration Date</label>
              <input class="form-control" id="regdate"  type="date" name="regdate" required>
              <hr class="mb-3">
              <input class="btn btn-primary" type="submit" id="register" name="create" value="Sign Up">
        </div>
      </form>
    </div>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script str="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
<script src="vendor/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="vendor/jquery/dist/jquery.min.js"></script>

<script type="text/javascript">
	$(function(){
		$('#register').click(function(e){

			var valid = this.form.checkValidity();

			if(valid){

			var firstname 	= $('#firstname').val();
			var lastname	= $('#lastname').val();
			var email 		= $('#email').val();
			var phonenumber = $('#phonenumber').val();
      var age = $('#age').val();
			var password 	= $('#password').val();
      var regdate = $('#regdate').val();
      var address = $('#address').val();
      var city = $('#city').val();
      var postcode = $('#postcode').val();

				e.preventDefault();

				$.ajax({
					type: 'POST',
					url: 'process.php',
					data: {firstname: firstname,lastname: lastname,email: email,phonenumber: phonenumber,
          age: age,password: password, regdate:regdate, address:address, city:city, postcode:postcode},
					success: function(data){
					Swal.fire({
								'title': 'Successful',
								'text': data,
								'type': 'success'
								})

					},
					error: function(data){
						Swal.fire({
								'title': 'Error',
								'text': 'Data can not be saved.',
								'type': 'Error'
								})
					}
				});
			}else{
			}
		});
	});
</script>
</body>
</html>
