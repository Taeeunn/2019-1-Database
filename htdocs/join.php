<meta charset="UTF-8">
<?php
    $conn = mysqli_connect("localhost","root","1234") ;
    $dbname="MOVIE_DB";
    mysqli_set_charset($conn, 'UTF8');
    mysqli_select_db($conn,$dbname); 
    
    $user_id= $_POST["user_id"]; 
    $user_name= $_POST["user_name"];
    $user_password= $_POST["user_password"]; 
    $user_email= $_POST["user_email"]; 

    $sql ="INSERT INTO USER_INFO(USER_ID, USER_PW, USER_NAME, USER_EMAIL) VALUES ('$user_id','$user_password','$user_name','$user_email')"; 
    $result = mysqli_query($conn,$sql);
   
    $date=date('Y-m-d');
    if(!empty($result)){
        $sql ="INSERT INTO USER_MEMBERSHIP(USER_ID, MEMBERSHIP_POINT, MEMBERSHIP_DATE) VALUES ('$user_id', 0, '$date')";
        $result = mysqli_query($conn,$sql);
        echo '<script>alert("회원가입이 완료되었습니다."); location.href="login_screen.php";</script>';
    }
    else{
        $error=mysqli_error($conn);
        echo '<script>alert("회원가입을 실패했습니다.");history.back(); </script>';
    }
    
    mysqli_close($conn);
?>
