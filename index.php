<html lang="pl">
<head>
    <?php
    include 'head.php';
    ?>
</head>

<body>
<?php
include 'navbar.php';
?>

<!-- To jest skrypt który usuwa posty -->
<?php
if(isset($_GET['akcja']) && $_GET['akcja']=='usun'){
    $id = $_GET['id'];
    $host = "http://lamp.ii.us.edu.pl/~ii294710";
    $db_user = "ii294710";
    $db_password = "#Tymbark1936";
    $db_name = "ii294710";

    $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
    $polaczenie->set_charset("utf8");

    $query = "DELETE FROM `ii294710`.`posts` WHERE `posts`.`ID` =".$id;

    $polaczenie->query($query);
    header("Location: http://lamp.ii.us.edu.pl/~ii294710/");
}
?>
<!-- Koniec skryptu usuwającego posty -->

<div class="jumbotron">
    <div class="container text-center"><h1>Only from the heart can you touch the sky.</h1>
        <p class="text-right">~Yalalludin Rumi</p>
    </div>


</div>
<div class="container" id="middle">

    <div class="row">

        <div class="col-md-8">
            <br><br>
            <!-- Pobieranie i wyświetlanie postów z bazy danych -->
<?php
$id = $_GET['id'];
$host = "lamp.ii.us.edu.pl/~ii294710";
$db_user = "ii294710";
$db_password = "#Tymbark1936";
$db_name = "ii294710";

$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
$polaczenie->set_charset("utf8");

$query="SELECT * FROM `posts` ORDER BY `posts`.`ID` DESC ";
$result= $polaczenie->query($query);
while($row = $result->fetch_assoc()) {
    $temat = $row["topic"];
    $tekst = $row["text"];
    $data = $row["date"];
    $autor = $row["author"];
    $id = $row["ID"];


    echo '<h2>
        <a href="#">' . $temat;
    echo '</a>';
    if (isset($_SESSION['zalogowany'])) {

    echo'<a class="btn btn-danger btn-xs" id = "usun_btn"  href="index.php?akcja=usun&id='.$id;
        echo'"> Usuń</a >
<a class="btn btn-info btn-xs" id = "edycja_btn"  href="edycja.php?id='.$id;
        echo '"> Edytuj</a>';
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
            <a class="btn btn-primary" href="post.php?id='.$id;
    echo '">Czytaj... <span class="glyphicon glyphicon-chevron-right"></span></a>

            <hr>
        ';
}
?>

<!-- Koniec pobierania i wyświetlania postów -->

            <ul class="pager">
                <li class="previous">
                    <a href="#">&larr; Nowsze posty</a>
                </li>
                <li class="next">
                    <a href="#">Starsze posty &rarr;</a>
                </li>
            </ul>

        </div>

        <div class="col-md-4">
            <br><br><br>

            <div class="well">
                <h4>Kategorie:</h4>
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="list-group">
                            <li><a  class="list-group-item" href="#">Motywacja</a>
                            </li>
                            <li><a class="list-group-item" href="#">Motoryzacja</a>
                            </li>
                            <li><a class="list-group-item" href="#">Inne</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="well">
                <h4>O mnie</h4>
                <img src="img/me.jpg" class="img-circle img-responsive center-block" id="my_photo"><br>
                <p class="text-center" style="font-weight: bold">Kamil Kruk<br> </p>
                <p class="text-center"> Student III roku Uniwersytetu Śląskiego na kierunku Informatyka Inżynierska <br></p>
                <p> Moje zainteresowania, to: <br>- <br> - <br> - <br> - <br></p>
            </div>

        </div>

    </div>

    <hr>

    <footer>
        <div class="row">
            <div class="col-lg-12 text-center">
                <p>2016 &copy; Kamil Kruk</p>
            </div>
        </div>
    </footer>

</div>

<script src="js/bootstrap.min.js"></script>
</body>
</html>