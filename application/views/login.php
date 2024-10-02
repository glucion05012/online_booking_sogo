<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>HOTEL SOGO BOOKING</title>

</head>

<style>
    @import url("https://fonts.googleapis.com/css?family=Lato:400,700");
#bg {
  background-image: linear-gradient(#FFCCCB, grey);
  position: fixed;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background-size: cover;
  /* filter: blur(5px); */
}

body {
  font-family: 'Lato', sans-serif;
  color: #4A4A4A;
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  overflow: hidden;
  margin: 0;
  padding: 0;
}

form {
  width: 350px;
  position: relative;
  padding-top: 5rem;
}
form .form-field::before {
  font-size: 20px;
  position: absolute;
  left: 15px;
  top: 17px;
  color: #888888;
  content: " ";
  display: block;
  background-size: cover;
  background-repeat: no-repeat;
}
form .form-field:nth-child(2)::before {
  background-image: url(<?php echo base_url()."assets/login/user-icon.png"; ?>);
  width: 20px;
  height: 20px;
  top: 15px;
}
form .form-field:nth-child(3)::before {
  /* background-image: url(<?php echo base_url()."assets/login/lock-icon.png"; ?>); */
  width: 16px;
  height: 16px;
}
form .form-field {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: justify;
  -ms-flex-pack: justify;
  justify-content: space-between;
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  margin-bottom: 1rem;
  position: relative;
}
form input {
  font-family: inherit;
  width: 100%;
  outline: none;
  background-color: #fff;
  border-radius: 4px;
  border: none;
  display: block;
  padding: 0.9rem 0.7rem;
  box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.16);
  font-size: 17px;
  color: #4A4A4A;
  text-indent: 40px;
}
form .btn {
  outline: none;
  border: none;
  cursor: pointer;
  display: inline-block;
  margin: 0 auto;
  padding: 0.9rem 2.5rem;
  text-align: center;
  background-color: #47AB11;
  color: #fff;
  border-radius: 4px;
  box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.16);
  font-size: 17px;
}
</style>
<body>
<!-- partial:index.partial.html -->
<div id="bg"></div>
<form action="<?= base_url('admin'); ?>" method="post" accept-charset="utf-8">

<h1 style="text-align: center; color:white"><img src="<?php echo base_url()."assets/"; ?>sogologo.jpg" alt="Logo" class="brand-image "
           style="opacity: .8; height:100px; width: 300px;"><br>SOGO HOTEL <br>Online Booking System</h1>
    <div style='color:red'>
        <?php if($this->session->flashdata('errormsg')): ?> 
            <p><?php echo $this->session->flashdata('errormsg'); ?></p>
        <?php endif; ?>
    </div>

    <div class="form-field">
        <input type="text" name="username" placeholder="Username" required/>
    </div>
    
    <div class="form-field">
        <input type="password" name="password" placeholder="Password" required/>                         
    </div>
    
    <div class="form-field">
        <button class="btn" type="submit">Log in</button>
    </div>
</form>
<!-- partial -->
  
</body>
</html>
