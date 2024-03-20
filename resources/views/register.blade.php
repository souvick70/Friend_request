<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">

<article class="bg-warning mb-3">  
    <div class="card-body text-center">
        <h3 class="text-white mt-3">Registration Form</h3>
    
    </div>
    <br><br>
    </article>
<div class="container">
    
<hr>


<div class="row justify-content-center">
<div class="col-md-12">
<div class="card">
<header class="card-header">
	
	<h4 class="card-title mt-2">Create Your New Account</h4>
</header>
<article class="card-body">
<form id="MyForm" action="{{route('store-data')}}" method="POST" enctype="multipart/form-data" >
    @csrf
	<div class="form-row">
		<div class="col form-group">
			<label>First name </label>   
		  	<input type="text" name="fname" id="fname" class="form-control"    placeholder="Enter Your First Name">
            <span id="xx"></span>
          </div> <!-- form-group end.// -->
        
		<div class="col form-group">
			<label>Last name</label>
		  	<input type="text" name="lname" id="lname" class="form-control"   placeholder="Enter Your Last Name">
            <span id="yy"></span>
        </div> <!-- form-group end.// -->
	</div> <!-- form-row end.// -->
	<div class="form-group">
		<label>Email address</label>
		<input type="text" name="email" id="email" class="form-control"    placeholder="Enter Your Email">
		<span id="zz" style="color:red;"></span>
	</div> <!-- form-group end.// -->
    <div class="form-row">
		<div class="col form-group">
			<label>Password</label>   
		  	<input type="text" name="password" id="password" class="form-control" onkeyup="validatePassword(this.value);"  placeholder="Enter Your Pasword">
              <span id="aa" style="color:red;"></span>
              <div class="validationRules mt-5 text-secondary">                
                <ul>
                    <li style="color:red">* Note</li>
                     <li>Must be between 6 to 12 character</li>
                     <li>Must contain at least one character uppercase</li>
                     <li>Must contain at least one character lowsercase</li>
                     <li>Must contain at least one specaial character</li>
                     <li>Must contain at least a number</li>
                 </ul> 
             </div>
        </div> <!-- form-group end.// -->
     
       
		<div class="col form-group">
			<label>Confirm Password</label>
		  	<input type="text" name="cpassword" id="cpassword" class="form-control" onkeyup="CPassword(this.value);" placeholder="Enter Confirm Password Again ">
              <span id="bb" style="color:red;"></span>
              
		</div> <!-- form-group end.// -->

	</div> <!-- form-row end.// -->


    <div class="md-form">
    <label for="form10">Address</label>
  <i class="fas fa-pencil-alt prefix"></i>
  <textarea id="address" name="address" class="md-textarea form-control" rows="3"></textarea>
  <span id="cc" style="color:red;"></span>
</div>
<label for="form10">Gender </label>
	<div class="form-group">
    <input type="radio" id="gender" name="gender" value="Male"> Male
    <input type="radio" id="gender" name="gender" value="FeMale"> Female
    <input type="radio" id="gender" name="gender" value="Transgender"> Transgender
      <span id="error-message" style="color:red;"></span>
	</div> <!-- form-group end.// -->
<label  for="checkbox">Why You Are Here/Interest</label>
    <div class="custom-control custom-checkbox">
        <input type="checkbox" name="subject[]" class="subject" value="Friendships">
        <label for="subject1"> Friendships</label>&nbsp;&nbsp;
        <input type="checkbox" name="subject[]" class="subject" value="Dating">
        <label for="subject2"> Dating</label>&nbsp;&nbsp;
        <input type="checkbox" name="subject[]" class="subject"value="Fun">
        <label for="subject3"> Fun</label>&nbsp;&nbsp;
        <input type="checkbox" id="check_all"value="All">
        <label for="subject4"> All</label><br><br>
        <span id="rr"></span>
	<div class="form-row">
		<div class="form-group col-md-6">
		  <label>Phone Number</label>
		  <input type="text" name="phone" id="phone" class="form-control">
          <span id="gg"></span>
		</div> <!-- form-group end.// -->

		<div class="form-group col-md-6">
		  <label>City</label>
		  <select id="city_id" name="city_id" class="form-control">
		    <option selected="true" disabled="disabled"> Select Your City...</option>
        
            @foreach ($all_city as $user )
            <option value="{{ $user->id }}">{{ $user->city_name }}</option>
            @endforeach
            <span id="ss"></span>
		  </select>
         
		</div> <!-- form-group end.// -->
	</div> <!-- form-row.// -->


    <!--Image Upload code-->
    <div class="mb-3 mt-3">
        <input type="file" name="image" class="form-control" id="image"><span id="file_error"></span>

        </p>
    </div>
    <div class="form-group col-md-6 mb-3">
        <label for="example-fileinput" class="form-label"> </label>
        <img id="showImage" src="{{ url('upload/no_image.jpg') }}" class="img-thumbnail" alt="profile-image">
        
    </div>
	
    <div class="form-group">
        <input type="submit" name="submit" value="submit" id="submit" class="btn btn-primary btn-block">
    </div> <!-- form-group// -->      
                                             
</form>
</article> <!-- card-body end .// -->
<div class="border-top card-body text-center">Have an account? <a href="{{route('index')}}">Log In</a></div>
</div> <!-- card.// -->
</div> <!-- col.//-->

</div> <!-- row.//-->


</div> 
<!--container end.//-->

<br><br>
<article class="bg-secondary mb-3">  
<div class="card-body text-center">
    <h3 class="text-white mt-3">We Are Waiting For Your Account</h3>

</div>
<br><br>
</article>


<!-- validation start -->
<script>
//Fname validation function //

$(function () {
            $("#fname").keypress(function (e) {
                var keyCode = e.keyCode || e.which;
                //Regex for Valid Characters i.e. Alphabets.
                var regex = /^[A-Za-z]+$/;
                $(".error").remove();
                //Validate TextBox value against the Regex.
                var isValid = regex.test(String.fromCharCode(keyCode));
                if (!isValid) {
                    $('#xx').after('<span class="error" style="color:red;"><i class="fa fa-times" aria-hidden="true"></i>  Wrong Input(only Alphabate allow) </span>');
                    event.preventDefault();
                }
                else{
                    $('#xx').after('<span class="error" style="color:green;"><i class="fa fa-check" aria-hidden="true"></i>  Wright Input </span>');
                   
                }

                return isValid;
            });
        });


  //Fname End validation function //
 //Lname  validation function //
 $(function () {
            $("#lname").keypress(function (e) {
                var keyCode = e.keyCode || e.which;
                //Regex for Valid Characters i.e. Alphabets.
                var regex = /^[A-Za-z]+$/;
                $(".error").remove();
                //Validate TextBox value against the Regex.
                var isValid = regex.test(String.fromCharCode(keyCode));
                if (!isValid) {
                    $('#yy').after('<span class="error" style="color:red;"><i class="fa fa-times" aria-hidden="true"></i>  Wrong Input(only Alphabate allow) </span>');
                    event.preventDefault();
                }
                else{
                    $('#yy').after('<span class="error" style="color:green;"><i class="fa fa-check" aria-hidden="true"></i>  wright Input </span>');
                   
                }

                return isValid;
            });
        });





  //Lname End validation function //

   //Email  validation function //

   $('#email').keypress(function() {
    var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
    $(".error").remove();
    if (testEmail.test(this.value))
    {
    $('#zz').after('<span class="error" style="color:green;"><i class="fa fa-check" aria-hidden="true"></i>  wright Input </span>');
     } else {
        $('#zz').after('<span class="error" style="color:red;"><i class="fa fa-times" aria-hidden="true"></i>  wright Input </span>');
     }
});
    //Email End validation function //

   //Password  validation function //
   
   function validatePassword(password) {
                
                // It will not show anything when the length of password will be zero.
                if (password.length === 0) {
                    document.getElementById("aa").innerHTML = "";
                    return;
                }
                // Creation of new array and push all possible values in password
                var T4Tutorials = new Array();
                T4Tutorials.push("[$@$!%*#?&]"); // Special Charector
                T4Tutorials.push("[A-Z]");      // Uppercase Alpabates
                T4Tutorials.push("[0-9]");      // Numbers
                T4Tutorials.push("[a-z]");     // Lowercase Alphabates
                var ctr = 0;
                for (var i = 0; i < T4Tutorials.length; i++) {
                    if (new RegExp(T4Tutorials[i]).test(password)) {
                        ctr++;
                    }
                }
                // Display it
                var color = "";
                var strength = "";
                switch (ctr) {
                    case 0:
                    case 1:
                    case 2:
                        strength = "<br>Very Weak in length Password";
                        color = "red";
                        break;
                    case 3:
                        strength = "<br>Medium in length Password";
                        color = "orange";
                        break;
                    case 4:
                        strength = "<br>Strong Password";
                        color = "green";
                        break;
                }
                document.getElementById("aa").innerHTML = strength;
                document.getElementById("aa").style.color = color;
            }

    //Password End validation function //

 //Confirm Password  validation function //
   
 function CPassword(cpassword) {
                
                // It will not show anything when the length of password will be zero.
                if (cpassword.length === 0) {
                    document.getElementById("bb").innerHTML = "";
                    return;
                }
                // Creation of new array and push all possible values in password
                var T4Tutorials = new Array();
                T4Tutorials.push("[$@$!%*#?&]"); // Special Charector
                T4Tutorials.push("[A-Z]");      // Uppercase Alpabates
                T4Tutorials.push("[0-9]");      // Numbers
                T4Tutorials.push("[a-z]");     // Lowercase Alphabates
                var ctr = 0;
                for (var i = 0; i < T4Tutorials.length; i++) {
                    if (new RegExp(T4Tutorials[i]).test(cpassword)) {
                        ctr++;
                    }
                }
                // Display it
                var color = "";
                var strength = "";
                switch (ctr) {
                    case 0:
                    case 1:
                    case 2:
                        strength = "<br>Very Weak in length Password";
                        color = "red";
                        break;
                    case 3:
                        strength = "<br>Medium in length Password";
                        color = "orange";
                        break;
                    case 4:
                        strength = "<br>Strong Password";
                        color = "green";
                        break;
                }
                document.getElementById("bb").innerHTML = strength;
                document.getElementById("bb").style.color = color;
            }

    //Confirm Password End validation function //

//////address validation//////////


$('#address').keypress(function() {
    var testAddress = /^(\d[^\s]{0,9}[^\s])+[a-zA-Z\s]+?[a-zA-Z][^\s]+(\,)? [a-zA-Z][^\s]+(\,)? [a-zA-Z][^\s]+(\,)?[^\s]{0,9}[^\s]$/i;
    $(".error").remove();
    if (testAddress.test(this.value))
    {
    $('#cc').after('<span class="error" style="color:green;"><i class="fa fa-check" aria-hidden="true"></i>  wright Input </span>');
     } else {
        $('#cc').after('<span class="error" style="color:red;"><i class="fa fa-times" aria-hidden="true"></i>  wright Input </span>');
     }
});

////address validation end/////


////Phone number validation star//
$(function () {
            $("#phone").keypress(function (e) {
                var keyCode = e.keyCode || e.which;
                //Regex for Valid Characters i.e. Alphabets.
                var regex = /^[0-9]+$/;
                $(".error").remove();
                //Validate TextBox value against the Regex.
                var isValid = regex.test(String.fromCharCode(keyCode));
                if (!isValid) {
                    $('#gg').after('<span class="error" style="color:red;"><i class="fa fa-times" aria-hidden="true"></i>  Wrong Input(only Digit allow) </span>');
                    event.preventDefault();
                }
                else{
                    $('#gg').after('<span class="error" style="color:green;"><i class="fa fa-check" aria-hidden="true"></i>  Wright Input </span>');
                   
                }

                return isValid;
            });
        });

///phone no valdation end ///

   
    $(document).ready(function() {
        $('#MyForm').submit(function() {
            $(".error").remove();
        var fname = $('#fname').val();
        var lname = $('#lname').val();
        var email = $('#email').val();
        var password = $("#password").val();
        var cpassword = $("#cpassword").val();
        var address = $("#address").val();
        var gender = $("#gender").val();
        var subject = $('#subject').val();
        var phone = $('#phone').val();
        var city_id = $('#city_id').val();
        var image = $('#image').val();
        var minLength = 3;
        var maxLength = 10;
   
    if (fname == '') {
        $('#xx').after('<span class="error" style="color:red;">This First Name is Blank. </span>');
        event.preventDefault();
    }
     else if(fname.length < minLength)
     {
        $('#xx').after('<span class="error" style="color:red;">Name should be above 3 words. </span>');
        event.preventDefault();
    }
    
    else if(fname.length > maxLength){
        $('#xx').after('<span class="error" style="color:red;">Name should be under 10 words. </span>');
       
         event.preventDefault();
    }


    ///Lname//

    if (lname == '') {
        $('#lname').after('<span class="error" style="color:red;">This LastName is Blank. </span>');
        event.preventDefault();
    }else if(lname.length < minLength){
        $('#yy').after('<span class="error" style="color:red;">LastName should be above 3 words. </span>');
        event.preventDefault();
    }else if(lname.length > maxLength){
        $('#yy').after('<span class="error" style="color:red;">LastName should be under 10 words. </span>');
        event.preventDefault();
    }
//lname end//


//email validation start//

                
                // Regular expression for email validation
                var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
                // Function to validate email
                function isValidEmail(email) {

                    return emailPattern.test(email);
                }

                if (isValidEmail(email)) {
                    $('#email').after(
                        '<span class="error" style="color:green;"><br>Valid email id </span>'
                    ); // You can replace this with your desired action
                    

                } 
                else if ($('#email').val() == "") {
                    $('#email').after(
                        '<span class="error" style="color:red;"><br>your email blank </span>');
                        event.preventDefault();

                }
                else {
                    $('#email').after(
                        '<span class="error" style="color:red;"><br>Please Enter Your Email proper way </span>'
                    );
                    event.preventDefault();
                }

//email validation end//

                

                if(password == ''){
                    $('#aa').after(
                    '<span class="error" style="color:red;"><br>Password Field is blank</span>');
                    event.preventDefault();
                }else if(password.length < 8){
                    $('#aa').after(
                    '<span class="error" style="color:red;"><br>**Password length must be atleast 8 characters</span>');
                    event.preventDefault();
                }else if(password.length >15){
                    $('#aa').after(
                    '<span class="error" style="color:red;"><br>**Password length must not exceed 15 characters</span>');
                    event.preventDefault();
                }else{
                    $('#aa').after(
                    '<span class="error" style="color:green;"><br>**Password Correct</span>');
                    
                }

                if(cpassword == ''){
                    $('#bb').after(
                    '<span class="error" style="color:red;"><br>Confirm Password Field is blank</span>');
                    event.preventDefault();
                }
                else if(cpassword.length < 8){
                    $('#bb').after(
                    '<span class="error" style="color:red;"><br>**Confirm Password length must be atleast 8 characters</span>');
                    event.preventDefault();
                }else if(cpassword.length >15){
                    $('#bb').after(
                    '<span class="error" style="color:red;"><br>**Confirm Password length must not exceed 15 characters</span>');
                    event.preventDefault();
                }else                
                if (password != cpassword) {
                    $('#bb').after('<span class="error" style="color:red;"><br>Password and Confirm Password Do not Match</span>');
                    event.preventDefault();
                }else{
                    $('#bb').after('<span class="error" style="color:green;"><br>Password and Confirm Password Match</span>');
                    
                }

                if(address == ''){
                    $('#cc').after('<span class="error" style="color:red;"><br>Address Is Blank (* 10,Noapara kalibari Road, kolkata,700124)</span>');
                    event.preventDefault();

                    //Demo//10,Noapara kalibari Road, kolkata,700124
                }
               

                if ($("#gender:checked").length == 0){
                    $('#error-message').after('<span class="error" style="color:red;"><br>Gender Is Null Fill It First</span>');
                    event.preventDefault();
                }

                
                if ($('.subject').is(":checked")) {
                    $('#rr').after('<span class="error" style="color:green;">Ok checked </span>');

                } else {
                    $('#rr').after(
                        '<span class="error" style="color:red;">You Should At List One Checked </span>'
                    );
                    event.preventDefault();
                }
                if(phone == ''){
                    $('#gg').after('<span class="error" style="color:red;">Phone No Is Blank</span>');
                    event.preventDefault();

                    //Demo//10,Noapara kalibari Road, kolkata,700124
                }else if (phone.length>10)
                {
                    $('#gg').after('<span class="error" style="color:red;">Phone No Is Maximum 10 Digit</span>');
                    event.preventDefault();
                }

                if(city_id==null){
                    $('#city_id').after('<span class="error" style="color:red;">City IS Required  </span>');
                    event.preventDefault();
                }

                var image = $('#image').val();
                
                if (document.getElementById("image").files.length == 0) {
                    $('#file_error').after(
                        '<span class="error" style="color:red;"> No file selcted </span>');
                        event.preventDefault();
                }
                else{
                    
                }

                $("#file_error").html("");
                $("#image").css("border-color", "#F0F0F0");
                var file_size = $('#image')[0].files[0].size;
                var fileInput = document.getElementById('image');
                var filePath = fileInput.value;
                var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;

                if (file_size > 2097152) {
                    $('#image').after(
                        '<span class="error" style="color:red;"><br> File Size is more than 2 Mb </span>'
                    );
                    event.preventDefault();

                }
                if (!allowedExtensions.exec(filePath)) {
                    $('#image').after(
                        '<span class="error" style="color:red;"><br> Please upload file having extensions .jpeg/.jpg/.png/.gif only.</span>'
                    );
                    event.preventDefault();

                }


            });

});




</script>

<script>
    $(document).ready(function() {
        $('#check_all').click(function() {
            $('.subject').prop('checked', this.checked);
        });

        $('.subject').change(function() {
            var check = ($('.subject').filter(":checked").length == $('.subject').length);
            $('#check_all').prop("checked", check);
        });
    });

    $(document).ready(function() {
        $('#image').change(function(e) {
            var show = new FileReader();
            show.onload = function(e) {
                $('#showImage').attr('src', e.target.result);
            }
            show.readAsDataURL(e.target.files['0']);
        });
    });
</script>

