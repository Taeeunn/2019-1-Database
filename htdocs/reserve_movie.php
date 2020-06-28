<meta charset="UTF-8">
<?php
    $conn = mysqli_connect("localhost","root","1234") ;
    $dbname="MOVIE_DB";
    mysqli_set_charset($conn, 'UTF8');
    mysqli_select_db($conn,$dbname); 

    session_start();
    $user_id = $_SESSION['user_id'];
    $user_name = $_SESSION['user_name'];
    
    $sql = "SELECT * FROM THEATER_INFO WHERE THEATER_NAME = '{$_POST["theater_name"]}'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    $theater_no = $row['THEATER_NO'];
    $theater_name = $row['THEATER_NAME'];
    $theater_loc = $row['THEATER_LOC'];
    $theater_phone = $row['THEATER_PHONE'];

    $sql = "SELECT * FROM MOVIE_INFO WHERE MOVIE_NAME = '{$_POST["movie_name"]}' and MOVIE_TIME = '{$_POST["movie_time"]}'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    $movie_no = $row['MOVIE_NO'];  
    $movie_name = $row['MOVIE_NAME'];
    $movie_genre = $row['MOVIE_GENRE'];
    $movie_director = $row['MOVIE_DIRECTOR'];
    $movie_place = $row['MOVIE_PLACE'];
    $movie_time = $row['MOVIE_TIME'];

    $seat = $_POST['seat_sector'].$_POST['seat_number'];  
 
    $sql = "SELECT MOVIE_NO,THEATER_NO,SEAT FROM MOVIE_RESERVATION WHERE MOVIE_NO = {$movie_no} AND THEATER_NO = {$theater_no} AND SEAT = '{$seat}'";
    $result = mysqli_query($conn,$sql);
    $array = mysqli_fetch_assoc($result);
    
    if(!empty($array)){ //중복 좌석 확인
        echo "<script>alert('이미 예매된 좌석입니다. 다른 좌석을 선택해 주세요.'); location.href=('./reserve_movie_screen.php');</script>";
    }
    else{
        $sql = "INSERT INTO MOVIE_RESERVATION(USER_ID,MOVIE_NO,THEATER_NO,SEAT) values('{$user_id}',{$movie_no},{$theater_no},'{$seat}')";
        $result = mysqli_query($conn,$sql);
        echo "<script>alert('예매가 완료되었습니다.');</script>";
        $sql = "UPDATE USER_MEMBERSHIP SET MEMBERSHIP_POINT=MEMBERSHIP_POINT+100"; //예매할 때마다 멤버십 포인트 +100
        $result = mysqli_query($conn,$sql);
        $sql = "SELECT RESERVATION_NO FROM MOVIE_RESERVATION WHERE USER_ID = '{$user_id}' AND MOVIE_NO = {$movie_no} AND THEATER_NO = {$theater_no} AND SEAT = '{$seat}'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        $reservation_no = $row['RESERVATION_NO'];
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>영화 예매</title>      
    </head>
    <body>
        <table>
            <tr>
                <center><br><?php  echo $user_name."(".$user_id;?>)님 예매가 완료되었습니다. &nbsp;&nbsp;</center>
                <center>
                    <br><br><input type="button" style="width:150px; height:40px; background-color:#CEF6E3; border-color:#CEF6E3; border-radius:30px;" onclick="location.href='./menu_screen.php'" value="To Menu" >
                    <input type="button" style="width:150px; height:40px; background-color:#E0ECF8; border-color:#E0ECF8; border-radius:30px;" onclick="location.href='./reserve_movie_screen.php'" value="Back" > 
                </center>        
            </tr>
                
            <center>
                <br><br><img src="<?php echo "./image/{$movie_name}.jpg" ?>" width="300" height="380"/><br><br>
                        
                예매번호: <?php echo $reservation_no; ?><br><br>
                        
                영화명: <?php echo $movie_name; ?><br><br>
                        
                영화장르: <?php echo $movie_genre; ?><br><br>
                        
                영화감독: <?php echo $movie_director; ?><br><br>
                     
                극장: <?php echo "$theater_name   ($movie_place)"?><br><br>
                        
                좌석: <?php echo $seat; ?><br><br>
                        
                상영시간: <?php echo $movie_time; ?><br><br>
                        
                극장정보: <?php echo" $theater_loc  (Tell: $theater_phone)" ?><br><br>
                        
            </center>
        </table>
    </body>
</html>
