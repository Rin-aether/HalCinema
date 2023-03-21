<?php
include("auth.php");
$con=new connec();

if(!isset($_SESSION)){
    session_start();
}

if(isset($_GET["action"]))
{
    if($_GET["action"]== "logout")
    {
        $_SESSION["username"]=null;
        $_SESSION["cust_id"]=null;
    }
}

if(empty($_SESSION["username"]))
{
    $_SESSION["ul"]= '<li class="nav-item">
    <a class="nav-link btn-p" data-toggle="modal" data-target="#modelId">新規登録</a>
    </li>
    <li class="nav-item">
    <a class="nav-link btn-s" data-toggle="modal" data-target="#modelId1">ログイン</a>
    </li>';
}

if(isset($_POST["btn_login"]))
{
    $email_id = $_POST["log_email"];  
    $paswrd_log = $_POST["log_psw"];  
      
    $result=$con->select_login("users", $email_id);
    if($result->num_rows>0)
    {
        $row=$result->fetch_assoc();

        if($row["email"]==$email_id && $row["password"]== $paswrd_log)
        {
            $_SESSION["username"]=$row["username"];
            $_SESSION["cust_id"]=$row["id"];
            $_SESSION["ul"]='<li class="nav-item"> <a class="nav-link" href="mypage.php">マイページ</a></li>
                             <li class="nav-item"> <a class="nav-link">'.$_SESSION["username"].'</a></li>
                             <li class="nav-item"> <a class="nav-link" href="index.php?action=logout">Logout</a></li>';
        } else {
            echo'<script> alert("Invalid Password")</script>';
        }
    } else {
        echo'<script> alert("Invalid Email")</script>';
    }
}

if(isset($_POST['btn_reg']))
{
    $name=$_POST["reg_username"];
    $email=$_POST["reg_email"];
    $paswrd=$_POST["reg_psw"];
    $cnfrm_paswrd=$_POST["psw-repeat"];

    if($paswrd == $cnfrm_paswrd)
    {
        $sql="INSERT INTO users (username, email, password) VALUES ('$name','$email','$cnfrm_paswrd')";

        $con->insert($sql,"Sucess!!");
    } else {
        ?>
            <script>alert("Password Not Matched");</script>
        <?php
    }
}

?>

<!doctype html>
<html lang="ja">
    <head>
        <title>HALシネマ</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Jquery -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <script src="js/live2dcubismcore.js"></script>
        <script src="//cdn.jsdelivr.net/gh/dylanNew/live2d/webgl/Live2D/lib/live2d.min.js"></script>
        <!-- PixiJS -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/pixi.js/5.1.3/pixi.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/pixi-live2d-display/dist/index.min.js"></script>
        <!-- Kalidokit -->
        <script src="//cdn.jsdelivr.net/npm/kalidokit@1.1/dist/kalidokit.umd.js"></script>
        <!-- Custom CSS -->
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,700,1,200" /> 

        
        <style type="text/css">
            canvas {
            }
        </style>
    </head>
    
    
    <body>
    <!-- Background -->
    <div class="bg">
        <img src="images/popcorn.png">
    </div>
    
    <nav class="navbar navbar-expand-sm">
        <a class="navbar-brand" href="index.php" style="font-weight: bold;">HALシネマ</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="nowshowing.php">上映中</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="commingsoon.php">公開予定</a>
                </li>
                <?php echo $_SESSION["ul"];?>
            </ul>
        </div>
    </nav>

    <!-- Register Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">新規登録</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        <div class="form-row">
                            <label for="username"><b>ユーザー名</b></label>
                            <input type="text" name="reg_username" id="username" required placeholder="ユーザー名">
                        </div>
                        <div class="form-row">
                            <label for="email"><b>メール</b></label>
                            <input type="text" name="reg_email" id="email" required placeholder="メール">
                        </div>
                        <div class="form-row">
                            <label for="psw"><b>パスワード</b></label>
                            <input type="password" name="reg_psw" id="psw" required placeholder="パスワード">
                        </div>
                        <div class="form-row">
                            <label for="psw-repeat"><b>パスワード再入力</b></label>
                            <input type="password" name="psw-repeat" id="psw-repeat" required placeholder="パスワード">
                        </div>

                        <button type="submit" class="btn-c" name="btn_reg">新規登録</button>

                        <div class="signin">
                            <p>すでにアカウントをお持ちの方は<a href="#" data-toggle="modal" data-target="#modelId1" data-dismiss="modal">こちら</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Login Modal -->
    <div class="modal fade" id="modelId1" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">ログイン</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        <div class="form-row">
                            <label for="email"><b>メール</b></label>
                            <input type="text" name="log_email" id="email" required placeholder="メール">
                        </div>
                        <div class="form-row">
                            <label for="psw"><b>パスワード</b></label>
                            <input type="password" name="log_psw" id="psw" required placeholder="パスワード">
                        </div>

                        <button type="submit" class="btn-c" name="btn_login">ログイン</button>

                        <div class="register">
                            <p>アカウントをお持ちでない方は<a href="#" data-toggle="modal" data-target="#modelId" data-dismiss="modal">こちら</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
