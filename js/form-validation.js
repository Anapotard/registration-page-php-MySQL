<script src="js/form-validation.js"></script>

$(function() {
  // var $registerForm = $("#registration");
  // if($registerForm.length){
    $("form[name='registration']").validate({
      rules: {
          age: {
              required: true,
              min: 18,
              number: true
          }
      },
      messages:{
        age:{
          required: "Please enter your age",
          number: "Please enter your age as a numerical value",
          min: "You must be at least 18 years old"
        }
      },
      submitHandler: function(form){
        form.submit();
      }
    })
  // }
})
