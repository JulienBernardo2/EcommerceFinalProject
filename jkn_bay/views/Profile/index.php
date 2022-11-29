<!doctype html>
<html lang="en">
	<link rel="stylesheet" href="/css/login.css"/>

	<head>
		<!-- Scripts -->
    		<script type="text/javascript" src="/js/popUp.js"></script>

        <!-- Message Pop ups -->
			<?php
				if(isset($_GET['error'])){ ?>
					<div class="alert alert-danger" id="alert-message">
  						<a href="#" id='alert-message' class="close" data-dismiss="alert" aria-label="close">&times;</a>
  						<?= $_GET['error'] ?>
					</div>
			<?php  }
				if(isset($_GET['message'])){ ?>
					<div class="alert alert-success" id="alert-message">
  						<a href="#"  class="close" data-dismiss="alert" aria-label="close">&times;</a>
  						<?= $_GET['message'] ?>
					</div>
			<?php  }
			?>
		<!-- Jquery -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

		<!-- Bootstrap CSS --> 
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/
		bootstrap.min.css" integrity="sha384-Vkoo8×4CGsO3+Hhxv8T/
		Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

		<!-- Bootstrap JS -->
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
		integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
		crossorigin="anonymous"></script>
		<title>Log in Page</title>

	</head>
	
	<body onload="timeout()">
		<!-- This is the navbar -->
		<div class="navbar"> 
			<a class="active" href ="/Product/indexBuyer">Home</a>
		  <img src="/jknimage.png" alt="JKN" />	
		</div>

        <!-- Form to allow user to edit profile-->
        <form action='' method='post'>
            <div id="main" class='float-container' style="margin-top: 5%;">
              <div class='float-child'>
                <h2 style="margin-bottom: 3%;">Login</h2>

                <label>Username</label>
                <input type="text" name='username' class="form-control" style='max-width: 60%;  margin-bottom: 5%; '/>
                  
                <label>Password</label>
                <input type="password" name='password' class="form-control" style='max-width:60%;  margin-bottom: 5%;'/>

              </div>

              <div class='float-child'>
                <h2>Welcome to JKN Bay</h2>
	                <p>
					The company, which caters to individual sellers and small businesses, is a market leader in e-commerce worldwide. JKN-Bay is headquartered in Montreal, Canada. Customers can participate in Web sites set up within their own country or use one of the company's international sites.
					<br></br>
					The company, which caters to individual sellers and small businesses, is a market leader in e-commerce worldwide. JKN-Bay is headquartered in Montreal, Canada. Customers can participate in Web sites set up within their own country or use one of the company's international sites.
				</p>
              </div>
            </div>
            <button type="submit" name='action' class='btn btn-primary'  style='margin-left: 48%;' value='Login'>Login</button>
        </form> 
	</body>
</html>
</html>

