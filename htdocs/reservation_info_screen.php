<meta charset="UTF-8">
<?php
    $conn = mysqli_connect("localhost","root","1234"); 
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
        <title>영화 예매 정보</title>
        <style>
            #title{font-size:40pt; text-align:center}
            td{align:center; text-align:center;}
        </style>
    </head>
    <body>
        <table width="100%" align="center">
            <tr>
                <br><br><br><br><br><center><div id="title">Reservation Information</div>
            </tr>
            <tr>
                <center><br><br>
                    <input type="button" style="width:150px; height:40px; background-color:#CEF6E3; border-color:#CEF6E3; border-radius:30px;" onclick="location.href='./menu_screen.php'" value="To Menu" >
                    <input type="button" style="width:150px; height:40px; background-color:#E0ECF8; border-color:#E0ECF8; border-radius:30px;" onclick="location.href='./user_info_screen.php'" value="Back" >
                </center><br><br>
            </tr>

            <tr>
                <th>예매번호</th>
                <th>영화제목</th>
                <th>장르</th>
                <th>감독</th>
                <th>극장</th>
                <th>좌석</th>
                <th>상영시간</th>
                <th>예매취소</th>
            </tr>
          
            <?php
                $sql = "SELECT * FROM MOVIE_RESERVATION WHERE USER_ID = '{$user_id}'";   
                $result2 = mysqli_query($conn,$sql);

                if (empty($row2 = mysqli_fetch_assoc($result2))) {
                    echo "<tr><td colspan=10>예약정보 없음</td></tr>";
                }
                else{
                    $sql = "SELECT * FROM MOVIE_RESERVATION WHERE USER_ID = '{$user_id}'";   
                    $result2 = mysqli_query($conn,$sql);
                    
                    while($row2 = mysqli_fetch_assoc($result2)){
                        $reservation_no = $row2['RESERVATION_NO'];   
                        $movie_no = $row2['MOVIE_NO'];
                        $theater_no = $row2['THEATER_NO'];
                        $seat = $row2['SEAT'];

                        $sql = "SELECT * FROM MOVIE_INFO where MOVIE_NO = '{$movie_no}'";  
                        $result = mysqli_query($conn,$sql);
                        $row = mysqli_fetch_assoc($result);
                        $movie_name = $row['MOVIE_NAME'];
                        $movie_genre = $row['MOVIE_GENRE'];
                        $movie_director = $row['MOVIE_DIRECTOR'];
                        $movie_place = $row['MOVIE_PLACE'];
                        $movie_time = $row['MOVIE_TIME'];

                        $sql = "SELECT * FROM THEATER_INFO where THEATER_NO = '{$theater_no}'";   
                        $result = mysqli_query($conn,$sql);
                        $row = mysqli_fetch_assoc($result);
                        $theater_name = $row['THEATER_NAME'];

  
                        echo "
                            <tr>
                                <td>{$reservation_no}</td>
                                <td>{$movie_name}</td>
                                <td>{$movie_genre}</td>
                                <td>{$movie_director}</td>
                                <td>{$theater_name} ({$movie_place})</td>
                                <td>{$seat}</td>
                                <td>{$movie_time}</td>
                                <td>
                                    <form method='POST' action='delete_reservation.php'>
                                        <input type='hidden' name='delete' value='{$reservation_no}'>
                                        <input type='submit' style='width:80px; height:30px; background-color:yellow; border-color:yellow; border-radius:30px;' value='예매취소'>
                                    </form>
                                </td>
                            </tr>
                        ";
                    }
                }
            ?>
        </table>
    </body>
</html>
