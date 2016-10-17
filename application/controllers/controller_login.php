<?php

class Controller_Login extends Controller
{
    function action_index()
    {
        if(isset($_POST['login']) && isset($_POST['password']))
        {
            $login = $_POST['login'];
            $password =$_POST['password'];
            setcookie('password', $password, time() + 3600*24);
            /*
            Производим аутентификацию, сравнивая полученные значения со значениями прописанными в коде.
            Такое решение не верно с точки зрения безопсаности и сделано для упрощения примера.
            Логин и пароль должны храниться в БД, причем пароль должен быть захеширован.
            */
            if(md5($login)==md5("admin") && md5($password)==md5("123456"))
            {
                $data["login_status"] = "access_granted";
                session_start();
                echo $_SESSION['admin'];
                echo '<script>window.location.href = "admin";</script>';
                //header('Location:/admin/');
                exit();
                //$this->view->generate('admin_view.php', 'template_view.php');
            }
            else
            {
                $data["login_status"] = "access_denied";
               // echo "Не верно!";
            }
        }
        else
        {
            $data["login_status"] = "";

        }

        $this->view->generate('login_view.php', 'template_view.php',$data);
        //$this->view->generate('login_view.php', 'template_view.php', $data);

    }
}