<html>
<head>
    <script src="ckeditor/ckeditor.js"></script>

    <?php
    include 'head.php';
    ?>
</head>
<body>
<?php
include 'navbar.php';
?>
<br><br><br><br><br><br><br>
<div class="container">


    <form method="post" id="post" style="clear: both">
        <div class="form-group">
            <label for="topic">Temat:</label>
            <input type="text" class="form-control" name="topic" id="topic">
        </div>
        <textarea name="notatnik" id="notatnik"> </textarea>
        <script>
           CKEDITOR.replace('notatnik');
        </script>
        <button type="submit" id="btnAddPost" class="btn btn-block btn-success"  style="float: right">Dodaj post</button>
</div>
<?php
$id = $_GET['id'];
$host = "localhost";
$db_user = "ii294710";
$db_password = "#Tymbark1936";
$db_name = "ii294710";

$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
$polaczenie->set_charset("utf8");
$date = date('Y-m-d H:i:s');

$query = "INSERT INTO posts (text,author,date,topic) VALUES ('".$_POST['notatnik']."','".$_SESSION['userLogin']."','".$date."','".$_POST['topic']."');";

if($_POST['notatnik']!='' && $_POST['topic']!=''){
    $polaczenie->query($query);
    header("Location: http://lamp.ii.us.edu.pl/~ii294710/");

}
?>

<script src="js/bootstrap.min.js"></script>
</body>
</html>




