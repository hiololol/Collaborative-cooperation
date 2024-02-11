<!DOCTYPE html>
<head runat="server">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" constant="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log_in</title>
    <style type="text/css">
        @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        html,body{
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: #243b55;
        }

        .text1{
            outline: none;
            font-size: 38px;
            text-align: center;
            font-weight: 800;
            text-transform: uppercase;
            background: linear-gradient(135deg, #ba4c66 0%,#593898 25%,#3d2faa 50%,#730e81 75%,#2585a0 100% );
            background-size: 800%;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: animate  10s linear infinite;
        }

        @keyframes animate {
          100%{
            background-position: 400%;
          }
        }

        .wrapper{
            width: 420px;
            background: rgba(0, 0, 0, .5);
            color: #000;
            box-shadow: 0 15px 25px rgba(0, 0, 0, .5);
            border-radius: 35px;
            padding: 30px 40px;
        }

        .wrapper .input-box{
            position: relative;
            width: 100%;
            height: 50px;
            margin: 30px 0;
        }

        .input-box input{
            width: 100%;
            height: 100%;
            background: transparent;
            border: none;
            outline: none;
            border: 2px solid rebeccapurple;
            border-radius: 40px;
            font-size: 16px;
            color: aliceblue;
            padding: 20px 45px 20px 20px;
        }

        .input-box i{
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 25px;

        }
        
        .wrapper .remember-forgot{
            display: flex;
            justify-content: space-between;
            font-size: 14.5px;
            margin: -15px 0 15px;
            color: #FFFFFF;
        }

        .remember-forgot label input{
            accent-color: #fff;
            margin-right: 3px;
        }

        .remember-forgot a{
            color: #fff;
        }

        .remember-forgot a:hover{
            text-decoration: underline;
        }

        .wrapper .btn{
            width: 100%;
            height: 45px;
            background: #fff;
            border: none;
            outline: none;
            border-radius: 40px;
            box-shadow: 0 0 10px rgba(0, 0, 0, .1);
            cursor: pointer;
            font-size: 16px;
            color: #333;
            font-weight: 600;
        }

        .btn:hover{
            background-color:  rgb(181, 178, 178);
            transform: scale(1.04);
        }

        .auto-style1 {
            color: #FFFFFF;
        }

    </style>
    
</head>
<body>
    <div class="wrapper">
        <form id="form1" runat="server">
        
            <!--اسم الشركة الخيالي-->
            <div class="text1">التدريب التعاوني</div>
        
            <!--لادخال اسم المستخدم-->
            <div class="input-box">
                <input type="text" id="username" name="username" placeholder="Username" required>
                <i class='bx bxs-user'></i>
            </div>
        
             <!--لادخال كلمة المرور-->
             <div class="input-box">
                <input type="password" id="password" name="password" placeholder="password" required>
                <i class='bx bxs-lock-alt'></i>
            </div>

            <!--رابط التسجيل جديد-->
            <div class="remember-forgot">
                <label><input type="checkbox" id="checkbox"> هل البيانات صحيحه </label>
                <a href="new_account.php">انشاء حساب جديد؟</a>
            </div>

            <!--زر الصفحة لينقلنا الى صفحة اخرا-->
            <button type="submit" class="btn" onclick="login()">تسجيل دخول</button>
        </form>

        <script>
            function login() {
                var username = document.getElementById("username").value;
                var password = document.getElementById("password").value;

                // فحص إذا كانت فيه الحقول فارغة
                if (isEmpty(username) || isEmpty(password)) {
                    alert("يوجد لديك حقل فارغ");
                    return;
                }

                //الاختيارcheckbox التحقق من تحديد خانة
                if (!checkbox) {
                    alert("يجب عليك تحديد أن البيانات صحيحة");
                    return;
                }

                //  لتأكيد اسم المستخدم وكلمة المرور
                alert("تم تسجيل الدخول بنجاح!");
            }

            function isEmpty(value) {
                return value.trim() === "";
            }
        </script>
    </div>
        </form>

    </div>
<!-- Code injected by live-server -->
<script>
	// <![CDATA[  <-- For SVG support
	if ('WebSocket' in window) {
		(function () {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					var parent = elem.parentElement || head;
					parent.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					parent.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
</script>
</body>
</html>