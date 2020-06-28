<meta charset="UTF-8">
<?php
    $conn = mysqli_connect("localhost","root","1234") ;
    mysqli_set_charset($conn, 'UTF8');
    $dbname="MOVIE_DB";
    mysqli_select_db($conn,$dbname); 
    
    $user_id= $_POST["user_id"];
    $user_password= $_POST["user_password"];

    $sql="SELECT * FROM USER_INFO WHERE USER_ID='$user_id' AND USER_PW='$user_password'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result); 

    
    if(empty($row)){
        echo "<script>alert('아이디 혹은 비밀번호가 틀렸습니다.'); location.href=('LOGIN_SCREEN.php');</script>"; 
    }
    else{ 
        session_start();
        $_SESSION['user_id'] = $row['USER_ID'];
        $_SESSION['user_name'] = $row['USER_NAME'];
        
        echo "<script>alert('$row[USER_NAME]님 로그인에 성공했습니다!.'); location.href=('menu_screen.php');</script>";  
    }
    
    mysqli_close($conn);
?>
