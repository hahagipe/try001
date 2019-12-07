<?php
//若要使用section一定要在第一行加入此php語法
	session_start();
	if (!isset($_SESSION["Username"])) {
		header("location:http://192.168.60.69/webdesign/20190826_member/login.php");
	}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- 此網址會隨版本改變 改成下載下來的檔案-->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>Hello, world!</title>
  </head>
  <body>
	<nav class="navbar navbar-expand-lg navbar-light bg-primary text-light">
	  <a class="navbar-brand text-white" href="#">Navbar</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item active">
	        <a class="nav-link text-white" href="#">Home <span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link text-white" href="#">Link</a>
	      </li>
	    </ul>
	    <ul class="navbar-nav">
	    	<li>
		    	<!-- 加入php section語法:直接從後端(api)呼叫:$_SESSION["Username"] -->
		        <a class="nav-link text-light">Hello: <?php echo $_SESSION["Username"]; ?></a>
	        </li>
	        <li>
		        <a class="nav-link text-light" href="http://192.168.60.69/webdesign/20190826_member/logout_api.php">登出</a>
	        </li>
	    </ul>      
	  </div>
	</nav>
	<div class="container">
		<div class="row">
			<div class="col-sm-12 text-primary text-center">
				<h3>登入後主畫面</h3>
			</div>
		</div>
	</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <!-- 下載下來的檔案 -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>