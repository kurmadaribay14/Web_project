<?php
if (isset($_POST["comm_id"]) and is_numeric($_POST["comm_id"]))
    $obj=$_POST["comm_id"];
else $obj='';

if (isset($_POST["ocenka"]) and ($_POST["ocenka"]==0 or $_POST["ocenka"]==1))
    $ocenka=$_POST["ocenka"];
else $ocenka='';

if ($ocenka!='' and $obj>0) {
 $ip=$_SERVER['REMOTE_ADDR'];

 $db=mysqli_connect("localhost", "root", "", "db") or die();
 $res=mysqli_query($db,"SELECT count(id),ocenka FROM ocenka_comment
         WHERE comment_id='".$obj."' and ip=INET_ATON('".$ip."')");

 $number=mysqli_fetch_array($res);
 if ($number[0]==0) {
    $res=mysqli_query($db,"INSERT INTO ocenka_comment (date,comment_id,ip,ocenka)
    values ('".time()."','".$obj."',INET_ATON('".$ip."'),'".$ocenka."')");

    if ($ocenka==0) $res=mysqli_query($db,"UPDATE comment SET minus=(minus+1)
                    WHERE id='".$obj."' LIMIT 1");
    else $res=mysqli_query($db,"UPDATE comment SET plus=(plus+1)
                    WHERE id='".$obj."' LIMIT 1");
 }
 elseif ($number["ocenka"]!=$ocenka) {
    $res=mysqli_query($db,"UPDATE ocenka_comment SET date='".time()."',
    ocenka='".$ocenka."' WHERE comment_id='".$obj."' and ip=INET_ATON('".$ip."')");

    if ($ocenka==0) $res=mysqli_query($db,"UPDATE comment SET minus=(minus+1),
                    plus=(plus-1) WHERE id='".$obj."' LIMIT 1");
    else $res=mysqli_query($db,"UPDATE comment SET plus=(plus+1), minus=(minus-1)
                    WHERE id='".$obj."' LIMIT 1");
 }

$res=mysqli_query($db,"SELECT plus,minus FROM comment WHERE id='".$obj."' LIMIT 1");
$rating=mysqli_fetch_array($res);
echo '<b>'.( $rating["plus"]-$rating["minus"]).'</b>';
mysqli_close($db);
}
?>