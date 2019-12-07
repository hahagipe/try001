<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- 此網址會隨版本改變 改成下載下來的檔案-->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>reg</title>
  </head>
  <body>
    <div class="container">
    	<div class="row">
    		<div class="col-sm-8 offset-2">
    			<!-- card -->
    			<div class="card">
    				<div class="card-header bg-info text-center text-white">會員註冊</div>
    				<div class="card-body">
    					<form>
						  <div class="form-group">
						    <label for="username">帳號</label>
						    <input type="text" class="form-control" id="username" placeholder="請輸入帳號">
						    <small id="uni_check" class="form-text"></small>
						  </div>
						  <div class="form-group">
						    <label for="password">密碼</label>
						    <input type="password" class="form-control" id="password" placeholder="請輸入密碼">
						    <small id="psd_check" class="form-text"></small>
						  </div>
						  <button type="button" class="btn btn-primary mr-3" id="btn_reg">註冊</button>
						  <button type="button" class="btn btn-outline-secondary" id="btn_cnl">取消</button>
						</form>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <!-- 下載下來的檔案 -->
    <script src="js/bootstrap.min.js"></script>

	<script>
		var flag_username=false;
		var flag_password=false;

		$(function(){
			//即時監聽 username
			$("#username").bind("input propertychange",function(){
				$.ajax({
					type:"POST",
					url:"http://192.168.60.69/webdesign/20190826_member/check_uni_api.php",
					data:{uni_username:$("#username").val()},
					success:check_uni,
					error:function(){
						alert("check_uni_api_ERROR");
					}
				});
			});
			//即時監聽 password
			$("#password").bind("input propertychange",function(){
				if ($(this).val().length < 8) {
					$("#psd_check").html("密碼需大於8個字");
					$("#psd_check").addClass("text-danger");
					flag_password=false;
				}else{
					$("#psd_check").html("");
					flag_password=true;
				}
			});
			//註冊按鈕
			$("#btn_reg").bind('click',function(){
				if (flag_username && flag_password) {
					$.ajax({
						type:"POST",
						url:"http://192.168.60.69/webdesign/20190826_member/reg_api.php",
						data:{Username:$("#username").val(),Password:$("#password").val()},
						success:show,
						error:function(){
							alert("reg_api_ERROR");
						}
					});
				}else{
					alert("欄位錯誤")
				}
			});
		});
		function show(data){
			if (data) {
				alert("註冊成功");
				location.href="http://192.168.60.69/webdesign/20190826_member/login.php";
			}else{
				alert("註冊失敗");
			}
		}
		function check_uni(uni_data){
			if (uni_data) {
				//帳號重複
				$("#uni_check").html("此帳號已有人使用");
				$("#uni_check").addClass("text-danger");
				flag_username=false;
			}else{
				//帳號無重複
				$("#uni_check").html("此帳號可使用");
				$("#uni_check").removeClass("text-danger");
				$("#uni_check").addClass("text-primary");
				flag_username=true;
			}
		}
	</script>

  </body>
</html>