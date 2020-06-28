<meta charset="UTF-8">
<?php
    $conn = mysqli_connect("localhost","root","1234") ;
    $dbname="MOVIE_DB";
    mysqli_set_charset($conn, 'UTF8');
    mysqli_select_db($conn,$dbname);

    session_start();
    $user_id = $_SESSION['user_id'];
    $user_name = $_SESSION['user_name'];
    $movie_name=$_POST["movie_name"];
    $movie_quote=$_POST["movie_quote"];
    $movie_score=$_POST["movie_score"];
    $movie_review=$_POST["movie_review"];
    
    if(empty($movie_name) || empty($movie_quote) || empty($movie_score) || empty($movie_review)){
        echo "<script>alert('모든 빈칸을 채워야 평가가 완료됩니다.'); history.back(); </script>";
    }
   
    $sql = "INSERT INTO MOVIE_EVALUATION (USER_ID, MOVIE_NAME, FAMOUS_QUOTE, MOVIE_SCORE, MOVIE_REVIEW) values ('{$user_id}', '{$movie_name}', '{$movie_quote}', {$movie_score}, '{$movie_review}')";
    $result = mysqli_query($conn,$sql);
    echo "<script>alert('평가가 완료되었습니다.');</script>";
    
    $sql = "SELECT EVALUATION_NO FROM MOVIE_EVALUATION WHERE USER_ID='{$user_id}' AND MOVIE_NAME = '{$movie_name}' AND FAMOUS_QUOTE = '{$movie_quote}' AND MOVIE_SCORE = {$movie_score} AND MOVIE_REVIEW = '{$movie_review}'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    $evaluation_no = $row['EVALUATION_NO'];
?>

<!DOCTYPE html>
<html>
    <head>
        <title>영화 평가</title>      
    </head>
    <body>
        <table>
            <tr>
                <center>
                    <br><?php  echo $user_name."(".$user_id;?>)님 영화 평가가 완료되었습니다. &nbsp;&nbsp;
                </center>      
                <center>
                    <br><br><input type="button" style="width:150px; height:40px; background-color:#CEF6E3; border-color:#CEF6E3; border-radius:30px;" onclick="location.href='./menu_screen.php'" value="To Menu" >
                    <input type="button" style="width:150px; height:40px; background-color:#E0ECF8; border-color:#E0ECF8; border-radius:30px;" onclick="location.href='./evaluate_movie_screen.php'" value="Back" > 
                </center>
            </tr>
            <tr>       
                <center>
                    <br><br><img src="<?php echo "./image/{$movie_name}.jpg" ?>" width="300" height="380"/><br><br><br>
                        
                    평가번호: <?php echo $evaluation_no; ?><br><br>
                        
                    영화명: <?php echo $movie_name; ?><br><br>
                    
                    평점: <?php echo $movie_score; ?><br><br>
                        
                    명대사: <?php echo $movie_quote; ?><br><br>
                        
                    리뷰: <?php echo $movie_review ?><br><br> 
                    
                </center>
            </tr>
        </table>
    </body>
</html>

