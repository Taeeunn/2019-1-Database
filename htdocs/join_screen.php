<meta charset="UTF-8">
<!DOCTYPE html>
<html>
    <head>
        <title>회원가입</title>
        <style>
            #title{font-size:40pt; text-align:center}
            #subtitle{font-size:30pt; text-align:center}
            td{align:center; text-align:center;}
        </style>

        <script>
            function enroll() { 
                var frm = document.join;
                if (frm.user_password.value != frm.user_password_check.value) {
                    alert("비밀번호를 다시 확인해주세요");
                    return;
                }
                frm.method = "POST";
                frm.action = "join.php";
                frm.submit();
            }
        </script>
    </HEAD>

    <body>
        <form name="join">
            <table align="center">
                <tr>
                    <td>
                        <br><br><br><br><br><br><div id="title">Movie Booking Site</div><br><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="button" style="width:100px; height:40px; background-color:#A9E2F3; border-color:#A9E2F3; border-radius:30px;" onclick="location.href='./login_screen.php'" value="Back" >
                    </td>
                </tr>
                <tr>
                    <td>    
                        <br><br><div id="subtitle"><FONT>JOIN</FONT></div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <br><input type="text" name="user_id" style="width:230px; height:30px" placeholder="ID">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="user_name" style="width:230px; height:30px" placeholder="Name">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="password" name="user_password" style="width:230px; height:30px" placeholder="Password">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="password" name="user_password_check" style="width:230px; height:30px" placeholder="Password Confirm">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="user_email" style="width:230px; height:30px" placeholder="E-mail">
                    </td>
                </tr>
                <tr>
                    <td>
                        <br><input type="button" style="width:130px; height:50px; background-color:#E3F6CE; border-color:#E3F6CE; border-radius:30px" value="Sign Up"  onClick="enroll()"  >
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>