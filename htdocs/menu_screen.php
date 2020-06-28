<meta charset="UTF-8">
<?php
    $conn = mysqli_connect("localhost","root","1234") ;
    $dbname="MOVIE_DB";
    mysqli_set_charset($conn, 'UTF8');
    mysqli_select_db($conn,$dbname); 
?>

<!DOCTYPE html>
<html>
    <head>
        <title>메뉴</title>
        <style>
            #title{font-size:50pt; text-align:center}
            td{align:center; text-align:center;}
            FONT{font-size:17pt; font-style:bold;}
        </style>
    </head>
    <body>
        <form name="menu">
            <table align="center">
                <tr>
                    <td>
                        <br><br><br><div id="title">Movie Booking Site</div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <FONT><br><br>
                            <?php
                                session_start();
                                if(!isset($_SESSION['user_id']) || !isset($_SESSION['user_name'])) {
                                    echo "<meta http-equiv='refresh' content='0;url=login.php'>";
                                    exit;
                                }
                                $user_id = $_SESSION['user_id'];
                                $user_name = $_SESSION['user_name'];
                                echo "<p>$user_name($user_id)님, 안녕하세요</p>";
                            ?>
                        </FONT><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <br><input type="button" style="width:150px; height:40px; background-color:#CEF6F5; border-color:#CEF6F5; border-radius:30px;" onclick="location.href='./logout.php'" value="Log Out" ><br><br><br><br>
                        <input type="button" style="width:200px; height:40px; background-color:#F2E0F7; border-color:#F2E0F7; border-radius:30px;" onclick="location.href='./user_info_screen.php'" value="User Information" >&nbsp;&nbsp;
                        <input type="button" style="width:200px; height:40px; background-color:#F8E0EC; border-color:#F8E0EC; border-radius:30px;" onclick="location.href='./search_movie_screen.php'" value="Search Movie" ><br><br>
                        <input type="button" style="width:200px; height:40px; background-color:#E3F6CE; border-color:#E3F6CE; border-radius:30px;" onclick="location.href='./reserve_movie_screen.php'" value="Book Movie" >&nbsp;&nbsp;
                        <input type="button" style="width:200px; height:40px; background-color:#F2F5A9; border-color:#F2F5A9; border-radius:30px;" onclick="location.href='./evaluate_movie_screen.php'" value="Evaluate Movie" >
                    </td>
                </tr>
                <tr>
                    <td>
                        <br><a href="url"><img src="./image/기생충.jpg" width="230" height="300"></a>
                        &nbsp;&nbsp;&nbsp;<a href="url"><img src="./image/어벤져스_앤드게임.jpg" width="230" height="300"></a>
                        &nbsp;&nbsp;&nbsp;<a href="url"><img src="./image/토이스토리4.jpg" width="230" height="300"></a>
                        &nbsp;&nbsp;&nbsp;<a href="url"><img src="./image/알라딘.jpg" width="230" height="300"></a>
                        &nbsp;&nbsp;&nbsp;<a href="url"><img src="./image/고질라_킹 오브 몬스터.jpg" width="230" height="300"></a>
                        &nbsp;&nbsp;&nbsp;<a href="url"><img src="./image/로켓맨.jpg" width="230" height="300"></a>
                    </td>
                </tr>
            </table> 
        </form>  
    </body>
</html>
