<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Kamil Kruk Blog</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Lobster&subset=latin,latin-ext" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

</head>

<body>
<?php
include 'navbar.php';
?>
<br><br><br><br><br><br><br>
<?php
$id = $_GET['id'];
$host = "localhost";
$db_user = "ii294710";
$db_password = "#Tymbark1936";
$db_name = "ii294710";

$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
$polaczenie->set_charset("utf8");

$query="SELECT `text` FROM `posts` WHERE `ID`=".$id;
$result= $polaczenie->query($query);
//echo $result;
echo '<div class="container text-center" id="post_kontener">';

if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        echo $row["text"];
    }
} 
echo '<hr style="clear: both">'

?>
<form method="post">
    <div class="row">
        <div class="col-md-6">
            <label style="float: left" for="autor_komentarz">Autor:</label>
            <input style="float: left" type="text" name="autor_komentarz" id="autor_komentarz">
            <button type="submit"  style="float: right" class="btn btn-success"> Dodaj komentarz</button>
            <br><br>
            <label style="float:left;" for="tekst_komentarz">Treść:</label>
            <textarea style="width: 100%; resize: none; " name="tekst_komentarz" id="tekst_komentarz"></textarea>
        </div>
    </div>
    <hr>
</form>
<?php
if(isset($_GET['akcja']) && $_GET['akcja']=='usun'){
    $id = $_GET['id'];
    $host = "localhost";
    $db_user = "ii294710";
    $db_password = "#Tymbark1936";
    $db_name = "ii294710";

    $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
    $polaczenie->set_charset("utf8");

    $query = "DELETE FROM `ii294710`.`comments` WHERE `comments`.`ID` =".$_GET['id_komentarza'];

    $polaczenie->query($query);
}

?>

<?php
$id = $_GET['id'];
$host = "localhost";
$db_user = "ii294710";
$db_password = "#Tymbark1936";
$db_name = "ii294710";

$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
$polaczenie->set_charset("utf8");
$date = date('Y-m-d H:i:s');

$query = "INSERT INTO comments (text,author,date,post_id) VALUES ('".$_POST['tekst_komentarz']."','".$_POST['autor_komentarz']."','".$date."','".$id."');";

if($_POST['autor_komentarz']!='' && $_POST['tekst_komentarz']!=''){
    $polaczenie->query($query);

}
?>

<?php
$id = $_GET['id'];
$host = "localhost";
$db_user = "ii294710";
$db_password = "#Tymbark1936";
$db_name = "ii294710";

$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
$polaczenie->set_charset("utf8");

$query="SELECT * FROM `comments` WHERE post_id=".$id." ORDER BY `comments`.`ID` DESC ";
$result= $polaczenie->query($query);
while($row = $result->fetch_assoc()) {
    $post_id = $row["post_id"];
    $tekst = $row["text"];
    $data = $row["date"];
    $autor = $row["author"];
    $ID_konkretnego_posta = $row["ID"];


    echo '<h2>';
    if (isset($_SESSION['zalogowany'])) {

        echo'<a class="btn btn-danger btn-xs" id = "usun_btn"  href="post.php?id='.$id."&id_komentarza=".$ID_konkretnego_posta."&akcja=usun";
        echo'"> Usuń</a >';
    }
    echo'</h2>
            <p class="lead">
                Dodany przez: <a href="index.php">' . $autor;

    echo '</a>
            </p>
            <p><span class="glyphicon glyphicon-time"></span> Data dodania: ' . $data;
    echo '</p>
            <hr>' . $tekst;
    echo '<br><br>
            <hr>
        ';
}
?>



</div>
<footer class="navbar-fixed-bottom">
    <div class="row">
        <div class="col-lg-12 text-center">
            <p>2016 &copy; Kamil Kruk</p>
        </div>
    </div>
</footer>
<script src="js/bootstrap.min.js"></script>
</body>
</html>