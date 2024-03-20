<!DOCTYPE html>
<html>

<head>
	<title>Facebook Registration</title>
    <!-- /*style.css*/ -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
<style>
   
body {
	display: flex;
	align-items: center;
	justify-content: center;
	font-family: sans-serif;
	line-height: 1.5;
	min-height: 100vh;
	background: #f3f3f3;
	flex-direction: column;
	margin: 0;
}

.main {
	background-color: #fff;
	border-radius: 15px;
	box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
	padding: 10px 20px;
	transition: transform 0.2s;
	width: 500px;
	text-align: center;
}

h1 {
	color: #4CAF50;
}

label {
	display: block;
	width: 100%;
	margin-top: 10px;
	margin-bottom: 5px;
	text-align: left;
	color: #555;
	font-weight: bold;
}


input {
	display: block;
	width: 100%;
	margin-bottom: 15px;
	padding: 10px;
	box-sizing: border-box;
	border: 1px solid #ddd;
	border-radius: 5px;
}

button {
	padding: 15px;
	border-radius: 10px;
	margin-top: 15px;
	margin-bottom: 15px;
	border: none;
	color: white;
	cursor: pointer;
	background-color: #4CAF50;
	width: 100%;
	font-size: 16px;
}

.wrap {
	display: flex;
	justify-content: center;
	align-items: center;
}
</style>
</head>

<body>
	<div class="main">
		<h1>Login Form</h1>
		<h3>Enter your login credentials</h3>
		<form id="LoginForm" action="{{route('login')}}" method="POST" enctype="multipart/form-data">
            @csrf
			<label for="first">
				Email:
			</label>
			<div align="left">
			<input type="text" id="email" name="email" placeholder="Enter your Email" >
			<span id="kk" style="color:red;" ></span>
			</div>
			<label for="password">
				Password:
			</label>
			<div align="left">
			<input type="password" id="password" name="password"placeholder="Enter your Password" >
			<span id="dd" style="color:red;" align="left"></span>
		
			</div>
			
			<div class="wrap">
				<input type="submit" name="submit" class="btn btn-primary btn-block">
			</div>
		</form>
		<p>Not registered? 
			<a href="{{route('register')}}" style="text-decoration: none;">	Create an account</a>
		</p>
	</div>
</body>

</html>
<script>


$('#email').keypress(function() {
    var testEmail = /^[A-Za-z0-9._%+-]+@([A-Za-z0-9-]+\.)+[A-Za-z]{2,4}$/i;
    $(".error").remove();
    if (testEmail.test(this.value))
    {
    $('#kk').after('<span class="error" style="color:green;><i class="fa fa-check" aria-hidden="true"></i>  wright Input </span>');
     } else {
        $('#kk').after('<span class="error" style="color:red;"><i class="fa fa-times" aria-hidden="true"></i>  wrong Input </span>');
     }
 });


$(document).ready(function() {
	$('#LoginForm').submit(function() {
		$(".error").remove();
	
	var email = $('#email').val();
	var password = $("#password").val();
	$(".error").remove();
	if ($('#email').val() == "") {
        $('#kk').after('<span class="error" style="color:red;">Your email is blank Fill It First </span>');
           event.preventDefault();
		   
     }

	 if(password == ''){
       $('#dd').after('<span class="error" style="color:red;">Password Field is blank</span>');
                    event.preventDefault();
        }else if(password.length < 8){
        $('#dd').after('<span class="error" style="color:red;">**Password length must be atleast 8 characters</span>');
                    event.preventDefault();
        }else if(password.length >15){
		$('#dd').after('<span class="error" style="color:red;">**Password length must not exceed 15 characters</span>');
                    event.preventDefault();
		}
});
});
</script>