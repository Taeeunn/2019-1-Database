<meta charset="UTF-8">
<?php
    $conn = mysqli_connect("localhost","root","1234") ;   
    $dbname="MOVIE_DB";
    mysqli_set_charset($conn, 'UTF8');
    mysqli_select_db($conn,$dbname);
    
    session_start();
    $user_id = $_SESSION['user_id'];
    $user_name = $_SESSION['user_name'];
    $movie_name=$_POST['movie_name'];
 ?>

<!DOCTYPE html>
<html>
    <head>
        <title>영화 정보</title>
        <style>
            #title{font-size:40pt; text-align:center}
            td{align:center; text-align:center;}
        </style>
    </head>
    <body>
        <form>
            <table width="100%" align="center">
                <tr>
                    <center><br><br><br>
                        <div id="title">Movie Information</div>
                    </center><br><br>
                </tr>
                <tr>
                    <center>
                        <input type="button" style="width:150px; height:40px; background-color:#CEF6E3; border-color:#CEF6E3; border-radius:30px;" onclick="location.href='./menu_screen.php'" value="To Menu" >
                        <input type="button" style="width:150px; height:40px; background-color:#E0ECF8; border-color:#E0ECF8; border-radius:30px;" onclick="location.href='./search_movie_screen.php'" value="Back" >
                    </center> 
                </tr>
                <tr>
                    <center>
                        <br><br><img src="<?php echo "./image/{$movie_name}.jpg" ?>" width="300" height="380"/>           
                    </center>
                </tr>
                
                <tr>
                    <th>평가번호</th>
                    <th>작성자</th>
                    <th>명대사</th>
                    <th>평점</th>
                    <th>리뷰</th>
                </tr>
      
    
                    
                <?php
                    $sql = "SELECT * FROM MOVIE_EVALUATION WHERE MOVIE_NAME = '{$movie_name}'";   
                    $result = mysqli_query($conn,$sql);

                    if (empty($row = mysqli_fetch_assoc($result))) {
                        echo "<tr><td colspan=10>평가정보 없음</td></tr>";
                    }
                    else{
                        $sql = "SELECT * FROM MOVIE_EVALUATION WHERE MOVIE_NAME = '{$movie_name}'";    
                        $result = mysqli_query($conn,$sql);
                        while($row = mysqli_fetch_assoc($result)){
                            $evaluation_no = $row['EVALUATION_NO'];   
                            $user_id = $row['USER_ID'];
                            $movie_quote = $row['FAMOUS_QUOTE'];
                            $movie_score = $row['MOVIE_SCORE'];
                            $movie_review = $row['MOVIE_REVIEW'];
                            
                            echo "
                                <tr>
                                    <td>{$evaluation_no}</td>
                                    <td>{$user_id}</td>
                                    <td>{$movie_quote}</td>
                                    <td>{$movie_score}</td>
                                    <td>{$movie_review}</td>
                                </tr>
                            ";
                        }
                    }
                ?>
            
          
       
                <center><br><br>
                    <?php
                        $sql = "SELECT * FROM MOVIE_INFO WHERE MOVIE_NAME = '{$_POST["movie_name"]}'";
                        $result = mysqli_query($conn,$sql);
                        $row = mysqli_fetch_assoc($result);
                        $movie_name = $row['MOVIE_NAME'];
                        $movie_genre = $row['MOVIE_GENRE'];
                        $movie_director = $row['MOVIE_DIRECTOR'];
                        echo "<p>***************************Movie Information***************************</p>";
                        echo "<p>영화제목: $movie_name</p>";
                        echo "<p>영화장르: $movie_genre</p>";
                        echo "<p>영화감독: $movie_director</p>";
                        
                        echo "<p>******************************Time Table*******************************</p>";
                        while ($row) {
                            $movie_no = $row['MOVIE_NO']; 
                            $movie_place = $row['MOVIE_PLACE'];
                            $movie_time = $row['MOVIE_TIME'];
                            echo "<p>$movie_place  $movie_time</p>";
                            $row = mysqli_fetch_assoc($result);
                        }
                        echo "<p>***************************Moview Review*****************************</p>";
                    ?> 
                </center>
            </table>
        </form>
    </body>
</html>





 
  
    
 



   
