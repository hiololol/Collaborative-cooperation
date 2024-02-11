<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <meta charset="utf-8">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>new_account</title>
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
            box-shadow: 0 0 10px rgba(109, 19, 19, 0.1);
            cursor: pointer;
            font-size: 16px;
            color: #333;
            font-weight: 600;
        }

        .btn:hover{
            background-color:  rgb(181, 178, 178);
            transform: scale(1.04);
        }

    </style>
    
</head>
<body>
    <div class="wrapper">
        <form id="form1" runat="server">
        
            <!--اسم الشركة الخيالي-->
            <div class="text1">التدريب التعاوني</div>

            <!--الاول لي اول اسم inputانشاء-->
            <div class="input-box">
                <input type="text" id="First" name="First" placeholder="الاسم الأول" required>
            </div>

            <!--الثالث لي اسم العائلة inputانشاء-->
            <div>
                <div class="input-box">
                    <input type="text" id="family" name="family" placeholder="اسم العائلة" required>
            </div>
    
            <!-- email الرابع inputانشاء-->
            <div class="input-box">
                <input type="email" id="email" name="email" placeholder="******@gmail.com" required>
            </div>

            <!--الخامس رقم الجوال inputانشاء-->
            <div class="input-box">
                <input type="tel" id="number" name="number" placeholder="0566677777" pattern="[05]{2}[0-9]{8}" title="يرجى إدخال رقم جوال صحيح" maxlength="10" required>
            </div>

            <!--كلمة المرور inputانشاء-->
            <div class="input-box">                
            <input type="password" id="password" name="password" placeholder="كلمة المرور / A-a-5-$" required>
            </div>

            <!--تأكيد كلمة المرور inputانشاء-->
            <div class="input-box">                
            <input type="password" id="confirmationPassword" name="confirmationPassword" placeholder="تأكيد كلمة المرور / A-a-5-$" required>
            </div>

            <!--رابط التسجيل الدخول-->
            <div class="remember-forgot">
            <label><input type="checkbox" id="checkbox" required> هل البيانات صحيحه</label>
            <a href="Log_in.php"> لتسجيل الدخول ؟</a>
            </div><br>

            <!--زر الصفحة لينقلنا الى صفحة اخرا-->
            <button type="submit" class="btn" onclick="login()">تسجيل دخول</button>
        </form>
        <script>
            function login() {
                var first = document.getElementById("First").value;
                var family = document.getElementById("family").value;
                var email = document.getElementById("email").value;
                var number = document.getElementById("number").value;
                var password = document.getElementById("password").value;
                var confirmationPassword = document.getElementById("confirmationPassword").value;
                var checkbox = document.getElementById("checkbox").value;
        
                // فحص إذا كانت فيه الحقول فارغة
                if (isEmpty(first) || isEmpty(family) || isEmpty(email) || isEmpty(number) || isEmpty(password) || isEmpty(confirmationPassword)) {
                    alert("يوجد لديك حقل فارغ");
                    return;
                }
        
                // التحقق من عدد الأحرف للأسماء الأولى والعائلية
                if (!isNameValid(first) || !isNameValid(family)) {
                    alert("الاسم اكثر من الازم");
                    return;
                }
        
                // التحقق من صحة البريد الإلكتروني
                if (!isValidEmail(email)) {
                    alert("البريد الإلكتروني غير صحيح");
                    return;
                }
        
                // التحقق من تطابق كلمة المرور
                if (password !== confirmationPassword) {
                    alert("تأكيد كلمة المرور غير متطابق. يرجى التحقق منها");
                    return;
                }

                // التحقق من تعقيد كلمة المرور
                if (!isPasswordComplex(password)) {
                    alert('"كلمة المرور غير امنة !"' + "    " + "كلمة المرور يجب أن تحتوي على حرف صغير وحرف كبير ورمز وارقام");
                    return;
                }

                //الاختيارcheckbox التحقق من تحديد خانة
                if (!checkbox) {
                    alert("يجب عليك تحديد أن البيانات صحيحة");
                    return;
                }
        
                // لتأكيد بننا حفظنا البيانات 
                alert("تم حفظ البيانات بنجاح!");
            }
        
            //  للتحقق من وجود قيمة
            function isEmpty(value) {
                return value.trim() === "";
            }
        
            //  للتحقق من صحة البريد الإلكتروني
            function isValidEmail(email) {
                var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return emailRegex.test(email);
            }
        
            //  للتحقق من عدد الأحرف للأسماء الأولى والعائلية
            function isNameValid(name) {
                return name.length <= 15;
            }

            // للتحقق من تعقيد كلمة المرور
            function isPasswordComplex(password) {
                // يحتوي على حرف صغير وحرف كبير ورمز
                var lowercaseRegex = /[a-z]/;
                var uppercaseRegex = /[A-Z]/;
                var symbolRegex = /[!@#$%^&*()_+{}\|:"<>?~,-.;]/;
                var numberRegex = /[0-9]/;

                return lowercaseRegex.test(password) && uppercaseRegex.test(password) && symbolRegex.test(password) && numberRegex.test(password);
            }
        </script>
    </div>
</body>
</html>