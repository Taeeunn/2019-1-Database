<meta charset="UTF-8">
<!DOCTYPE html>
<html>
    <head>
        <title>로그인</title>
        <style>
            #title{font-size:50pt; text-align:center}
            #subtitle{font-size:30pt; text-align:center}
            td{align:center; text-align:center;}
        </style>
    </head>
    
    <body>
        <form name="login" method="POST" action="login.php">
            <table align="center">
                <tr>
                    <td>
                        <br><br><br><br><br><div id="title">Movie Booking Site</div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <br><br><div id="subtitle">Log In</div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <br><br><input type="text" name="user_id" style="width:230px; height:30px" placeholder="ID">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="password" name="user_password" style="width:230px; height:30px" placeholder="Password">
                    </td>
                </tr>
                <tr>
                    <td>
                        <br><input type="submit" style="width:130px; height:50px; background-color:#F2F5A9; border-color:#F2F5A9; border-radius:50px;" value="Sign In" >
                        <input type="button" style="width:130px; height:50px; background-color:#E3F6CE; border-color:#E3F6CE; border-radius:50px;" value="Sign Up" onclick="location.href='join_screen.php'">
                    </td>
                </tr>
 
                <tr>
                    <td>
                        <br><br><a href="url"><img src="./image/기생충.jpg" width="230" height="300"></a>
                        &nbsp;&nbsp;&nbsp;<a href="url"><img src="./image/어벤져스_앤드게임.jpg" width="230" height="300"></a>
                        &nbsp;&nbsp;&nbsp;<a href="url"><img src="./image/토이스토리4.jpg" width="230" height="300"></a>
                        &nbsp;&nbsp;&nbsp;<a href="url"><img src="./image/알라딘.jpg" width="230" height="300"></a>
                        &nbsp;&nbsp;&nbsp;<a href="url"><img src="./image/고질라_킹 오브 몬스터.jpg" width="230" height="300"></a>l
                        &nbsp;&nbsp;&nbsp;<a href="url"><img src="./image/로켓맨.jpg" width="230" height="300"></a>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>
