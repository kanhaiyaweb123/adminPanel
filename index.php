
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    
    <style>

        
@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,400;0,500;0,600;0,700;1,100;1,200;1,300&display=swap');
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;

}
body{
    background: #6a62d2;
}

.login-page {
    height: 100vh;
    width: 100%;
    align-items: center;
    display: flex;
    justify-content: center;
}

.form {
  position: relative;
  filter:drop-shadow(0 0 2px #000000);
  border-radius: 5px;
  width: 360px;
  height: 420px;
  background-color: #ffffff;
  padding:40px;
}

.form img {
    position: absolute;
    height: 20px;
    top: 230px;
    right: 60px;
    cursor: pointer;
}

.form input {
    outline: 0;
    background: #f2f2f2;
    border-radius: 4px;
    width: 100%;
    border: 0;
    margin: 15px 0;
    padding: 15px;
    font-size: 14px;
}

.form input:focus {
    box-shadow: 0 0 5px 0 rgba(106, 98, 210);
}

span {
    color: red;
    margin: 10px 0;
    font-size: 14px;
}

.form button {
    outline: 0;
    background: #6a62d2;
    width: 100%;
    border: 0;
    margin-top: 10px;
    border-radius: 3px;
    padding: 15px;
    color: #FFFFFF;
    font-size: 15px;
    -webkit-transition: all 0.3 ease;
    transition: all 0.4s ease-in-out;
    cursor: pointer;
}

.form button:hover,
.form button:active,
.form button:focus {
    background: black;
    color: #fff;

}

.message{
    margin: 15px 0;
    text-align: center;

}
.form .message a {
    font-size: 14px;
    color: #6a62d2;
    text-decoration: none;
}
    </style>
</head>
<body>
<div class="login-page">
        <div class="form">
            <form class="login-form " id ="loginForm">
                <h2>ADMIN ACCOUNT</h2>
                <input type="email" required placeholder="email" id="user" name="email" autocomplete="off" />
                <input type="password" required placeholder="Password" id="password" name="password" autocomplete="off" />
                <!-- <img src="https://cdn2.iconfinder.com/data/icons/basic-ui-interface-v-2/32/hide-512.png"
                    onclick="show()" id="showimg"> -->
                <span id="error-message"></span>
                <button type="submit" id= "login_user">SIGN IN</button>
                <!-- <p class="message"><a href="#">Forgot your password?</a></p> -->
            </form>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script>


$(document).ready(function() {
    $('#loginForm').submit(function(e) {
        // alert('Hi');
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'login.php',
            data: $(this).serialize(),
            success: function(response) {
                // alert(response);
                if (response.includes("Login successful")) {
                    window.location.href = "dashboard.php";
                }else {
                    $('#error-message').text(response);
                }
            }
        });
    });
});
    

</script>


</html>