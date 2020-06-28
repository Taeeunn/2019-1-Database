<meta charset="UTF-8">
<?php
    $conn = mysqli_connect("localhost","root","1234") ;
    $dbname="MOVIE_DB";
    mysqli_set_charset($conn, 'UTF8');
    mysqli_select_db($conn,$dbname); 

    session_start();
    $user_id = $_SESSION['user_id'];
    $user_name = $_SESSION['user_name'];
 
    $sql = "SELECT * FROM USER_MEMBERSHIP WHERE USER_ID = '{$user_id}'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    $membership_no = $row['MEMBERSHIP_NO']; 
    $membership_point=$row['MEMBERSHIP_POINT'];
    $membership_date=$row['MEMBERSHIP_DATE'];
 
    $sql = "SELECT * FROM USER_INFO WHERE USER_ID = '{$user_id}'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    $user_email = $row['USER_EMAIL'];  
?>

<!DOCTYPE html>
<html>
    <head>
        <title>멤버십 정보</title>
        <style>
            #title{font-size:50pt; text-align:center}
            td{align:center; text-align:center;}
        </style>       
    </head>
    <body>
         <form name="membership">
            <table align="center">
                <tr>
                    <td>
                        <br><br><br><br><br><div id="title">Membership Information</div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <br><br><input type="button" style="width:150px; height:40px; background-color:#CEF6E3; border-color:#CEF6E3; border-radius:30px;" onclick="location.href='./menu_screen.php'" value="To Menu" >
                        <input type="button" style="width:150px; height:40px; background-color:#E0ECF8; border-color:#E0ECF8; border-radius:30px;" onclick="location.href='./user_info_screen.php'" value="Back" >
                    </td>
                </tr>
                <tr>
                    <td>
                        <br><br><br> ID: <?php echo $user_id; ?>
                        
                        <br><br><br> 이름: <?php echo $user_name; ?>
                        
                        <br><br><br> 이메일: <?php echo $user_email; ?>
                     
                        <br><br><br> 회원번호: <?php echo $membership_no; ?>
                  
                        <br><br><br> 멤버십 포인트: <?php echo $membership_point; ?>
                        
                        <br><br><br> 가입날짜: <?php echo $membership_date; ?>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>
