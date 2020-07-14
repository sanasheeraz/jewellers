<?php
session_start();
include 'connection.php';
$total_amount = $_SESSION['t'];
$Quantity = $_SESSION['qty_array'];
$userId = $_SESSION['user'];
$q = "INSERT INTO orders(U_Id, O_Total_Amount) VALUES ('$userId','$total_amount')";
$index = 0;
$result = mysqli_query( $conn, $q );
if ( $result )
 {
    $sql = 'SELECT * FROM product  WHERE P_Id IN ('.implode( ',', $_SESSION['cart'] ).')';
    $result = mysqli_query( $conn, $sql );
    while ( $row = mysqli_fetch_assoc( $result ) )
    {
        $r = mysqli_query( $conn, 'SELECT max(O_Id) from orders' );
        $O_Id = mysqli_fetch_row( $r );
        $highest_id = $O_Id[0];
        $id = $row['P_Id'];
        $name = $row['P_Name'];
        $p = $row['P_Price'];
        //$quan = implode( ',', $Quantity );
        $quan = $_SESSION['qty_array'][$index];
        echo "<script>alert('$quan')</script>";
        $q1 = "INSERT INTO invoice(O_Id,P_Id,P_Name,P_Price,P_Quantity) VALUES ('$highest_id','$id','$name','$p','$quan')";
        $result1 = mysqli_query( $conn, $q1 );
        if ( $result1 )
        {
            echo 'Successfull'.$index;
            $index++;
            unset( $_SESSION['cart'] );
            unset( $_SESSION['qty_array'] );
            echo "<script>alert('Order placed successfully');</script>";
            header( 'location:shop.php' );
        } else {
            echo 'Try Again';
            echo mysqli_error( $conn );
        }
    }

} else {
    echo 'Fail'.mysqli_error($conn);
}

?>