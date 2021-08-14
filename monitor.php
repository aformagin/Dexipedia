<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/pokeball.css">
    <!-- Bootstrap javascript -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>

<?php
session_start();
require_once 'database.php';
// if the user is logged in we show the logout button, else we show the login/register buttons.
if (isset($_SESSION['id'])) {
    $user_id = $_SESSION['id'];
    $sql = "SELECT * FROM users WHERE id=$user_id;";
    if($connection->query($sql)) {
        ini_set("default_socket_timeout", "05");
        set_time_limit(5);
        $f = fopen("http://dexipedia.formag.in/", "r");
        $r = fread($f, 1000);
        fclose($f);
        if (strlen($r) > 1) {
            echo "<body style='background-color:Green;'>";
        } else {
            echo "<body style='background-color:Red;'>";
        }
    }
}else{
    echo "<body style='background-color:Red;'>";
}
?>

</body>
</html>



