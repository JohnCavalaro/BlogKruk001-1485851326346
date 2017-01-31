<?php
session_start();
?>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">

        <button class="navbar-toggle" data-target=".navbar-responsive-collapse" data-toggle="collapse" type="button">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <div class="collapse navbar-collapse navbar-responsive-collapse" id="nav_inside">
            <ul class="nav navbar-nav">
                <li>
                    <a  href="http://lamp.ii.us.edu.pl/~ii294710/">Strona główna</a>
                </li>
                <li>
                    <a href="#">O mnie</a>
                </li>
                <li>
                    <a href="#">Kontakt</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right dropdown ">
                <li>
                   <?php
                   if(isset($_GET['akcja']) && $_GET['akcja']=='wyloguj'){
                       unset($_SESSION['zalogowany']);
                   }

                    if(isset($_POST['login']) && isset($_POST['haslo']) && $_POST['login']=='login' && $_POST['haslo']=='haslo'){
                        $_SESSION['zalogowany']=1;
                        $_SESSION['userLogin']=$_POST['login'];
                    }

                    if(!isset($_SESSION['zalogowany'])){
                    ?>

                    <a class="dropdown" data-toggle="dropdown" href="#">Login <span class="glyphicon glyphicon-log-in"></span></a>
                    <div class="dropdown-menu">
                        <form id="formLogin" method="post" action="index.php" class="form container-fluid">
                            <div class="form-group">
                                <label for="login">Login:</label>
                                <input type="text" class="form-control" name="login" id="login">
                            </div>
                            <div class="form-group">
                                <label for="haslo">Hasło:</label>
                                <input type="password" class="form-control" name="haslo" id="haslo">
                            </div>
                            <button type="submit" id="btnLogin" class="btn btn-block">Zaloguj</button>
                        </form>
                        <div class="container-fluid">
                            <br>
                            <a class="small" href="#">Zapomniałeś hasła?</a>
                        </div>
                    </div>

                    <?php }
                    else{
                   ?>
                    <a class="dropdown" data-toggle="dropdown" href = "#" > Panel administratora <span class="glyphicon glyphicon-log-in" ></span ></a>
                    <div class="dropdown-menu">
                        <form id="formLogout" method="get" action="index.php" class="form container-fluid">
                            <a type="button" href="http://lamp.ii.us.edu.pl/~ii294710/addPost.php" id="btnAddPost" class="btn btn-block">Dodaj post</a>
                            <a type="button" href="statystyki.php" id="btnStatistics" class="btn btn-block">Statystyki</a>
                            <a type="button" href="index.php?akcja=wyloguj" id="btnLogout" class="btn btn-block">Wyloguj</a>
                        </form>
                    </div>

                    <?php
                   }
                   ?>



                </li>
            </ul>

        </div>

    </div>
</nav>
