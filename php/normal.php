<?php
session_start();

$category = $_SESSION['category'];
$priority = $_SESSION['priority'];
$risk = $_SESSION['risk'];
$sdescription = $_SESSION['dxcsdescription'];
$start_time = $_SESSION['start_time'];
$end_time = $_SESSION['end_time'];
$dxc_ssr = $_SESSION['dxcssr'];
?>
<script src='./normalpost.js'></script>
<html>

<head>
    <script src="./normalpost.js"></script>
</head>

<body onload="normalpost('<?php echo $category ?>',
    '<?php echo $priority ?>', '<?php echo $category ?>', '<?php echo $sdescription ?>',
    '<?php echo $start_time ?>', '<?php echo $end_time ?>', '<?php echo $dxc_ssr ?>')">

</body>

</html>


<?php
include ("./connections.php");

$query = mysqli_query($connections, "SELECT * FROM ssr_tracker ORDER BY dxc_ssr DESC LIMIT 1;");
$row = mysqli_fetch_assoc($query);

$dxc_ssr = $row['dxc_ssr'];
    $query = mysqli_query($connections, "INSERT INTO ssr_snow(sys_id, change_number, state, dxc_ssr) 
    VALUES ('','','','$dxc_ssr')");
?> 