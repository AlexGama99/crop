<?php

class Controller_Admin extends Controller
{

    function action_index()
    {
        $this->auth();
        if(isset($_REQUEST['Content'])&& $_REQUEST['Content'] == "Описание")
        {
            setcookie('content', $_REQUEST['Content'],time() + 3600*24);
            setcookie('fileview','description_view.php',time() + 3600*24);
            header('Location: admin');
            exit();
        }

        if(isset($_REQUEST['Content'])&& $_REQUEST['Content'] == "Шаблоны")
        {
            setcookie('content', $_REQUEST['Content'],time() + 3600*24);
            setcookie('fileview','templatesavatar_view.php',time() + 3600*24);
            header('Location: admin');
            exit();
        }

        if(isset($_REQUEST['Content'])&& $_REQUEST['Content'] == "JS и IFrame")
        {
            setcookie('content', $_REQUEST['Content'],time() + 3600*24);
            setcookie('fileview','JSiFrame.php',time() + 3600*24);
            header('Location: admin');
            exit();
        }


        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            if(isset($_REQUEST['SaveDescription'])&& $_REQUEST['SaveDescription'] == "Сохранить")
            {
                $this->editdescription();
            }
            $this->EditTemplate();
        }

        $this->view->generate('admin_view.php', 'template_admin_view.php', $_COOKIE['fileview']);

    }

        function EditTemplate()
        {
            if(isset($_REQUEST['AddTemplatesAvatar'])&& $_REQUEST['AddTemplatesAvatar'] != "")
            {
                @mkdir("images", 0777);
                @mkdir("images/template", 0777);
                if (isset ($_FILES['userfile']) && $_FILES['userfile'] != "")
                {
                        copy($_FILES ['userfile']['tmp_name'], "images/template/" . $_FILES['userfile']['name']);
                        echo '<script>window.location.href = "admin";</script>';
                        exit();
                }
            }

            if(isset($_REQUEST['delete'])&& $_REQUEST['delete'] != "")
            {
                unlink("images/template/".$_REQUEST['delete']);
            }

        }

        function editdescription()
        {
                $fp = fopen( "file\\descriptoin.txt", "w" ) or die ( "Не удалось открыть файл" );
                fputs( $fp, $_REQUEST['descript'] );
                fclose( $fp );
        }

        function auth()
        {
            if (md5($_COOKIE['password']) == md5("123456")) {

            }
            else
            {
                echo '<script>window.location.href = "login";</script>';
                exit();
            }
        }
    
}