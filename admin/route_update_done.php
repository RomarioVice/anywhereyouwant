<?php
    require "connect.php";
?>

<?php if( isset($_SESSION['logged_user']) ) :  ?>

<?php
include('/blocks/connect.php');
$result = mysql_query("UPDATE services SET departure = '$_POST[departure]', destination = '$_POST[destination]', cost = '$_POST[cost]', g_map = '$_POST[g_map]', description = '$_POST[description]' WHERE id_route = '$_GET[id]'");

if($result == true) 
{
echo "Done";
}
else
{
    echo "Not done!";
}

?>



            <?php
                include('/blocks/footer-1.php');
            ?>
        </div>
  <?php else : header('Location: login.php');?>
    <?php endif; ?>
    </body>
</html>