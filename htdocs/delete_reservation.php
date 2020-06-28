<meta charset="UTF-8">
<?php
    $conn = mysqli_connect("localhost","root","1234") ;   
    $dbname="MOVIE_DB";
    mysqli_set_charset($conn, 'UTF8');
    mysqli_select_db($conn,$dbname);
    
    $reservation_no = $_POST['delete'];
    $sql = "DELETE FROM MOVIE_RESERVATION WHERE RESERVATION_NO = '{$reservation_no}'";   
    $result = mysqli_query($conn,$sql);
    
    $sql = "UPDATE USER_MEMBERSHIP SET MEMBERSHIP_POINT=MEMBERSHIP_POINT-30"; //예매 취소할 때마다 멤버십 포인트 -30
    $result = mysqli_query($conn,$sql);
    
    echo "<script>alert('예매를 취소하였습니다.'); location.href=('reservation_info_screen.php');</script>";
?>
