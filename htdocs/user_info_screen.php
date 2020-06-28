<meta charset="UTF-8">
<?php
    $conn = mysqli_connect("localhost","root","1234") ;
    $dbname="MOVIE_DB";
    mysqli_set_charset($conn, 'UTF8');
    mysqli_select_db($conn,$dbname); 

    session_start();
    $user_id = $_SESSION['user_id'];
    $user_name = $_SESSION['user_name'];
?>

<!DOCTYPE html>
<html>
    <head>
        <title>사용자 정보</title>
        <style>
            #title{font-size:40pt; text-align:center}
            td{align:center; text-align:center;}
        </style>  
    </head>
    <body>
        <form>
            <table align="center">
                <tr>
                    <td>
                        <br><br><br><br><br><div id="title">User Information</div><br><br><br>
                    </td>
                </tr>   
                <tr>
                    <td>
                        <br><input type="button" style="width:150px; height:40px; background-color:#D8F781; border-color:#D8F781; border-radius:30px;" onclick="location.href='./menu_screen.php'" value="To Menu" ><br><br><br><br>
                        <input type="button" style="width:300px; height:80px; background-color:#F2E0F7; border-color:#F2E0F7; border-radius:50px;" onclick="location.href='./membership_info_screen.php'" value="Membership Information">&nbsp;&nbsp;
                        <input type="button" style="width:300px; height:80px; background-color:#F8E0EC; border-color:#F8E0EC; border-radius:50px;" onclick="location.href='./reservation_info_screen.php'" value="Reservation Information"><br><br>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>

