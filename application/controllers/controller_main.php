<?php
define('MIN_WIDTH', 200);
define('MAX_WIDTH', 4000);
define('MIN_HEIGHT', 200);
define('MAX_HEIGHT', 4000);


class Controller_Main extends Controller
{

    function LoadImage()
    {
        $uploaddir = 'images/file/';
// это папка, в которую будет загружаться картинка
        $apend = rand(time(),time());
// это имя, которое будет присвоенно изображению
        $uploadfile = "$uploaddir$apend";
//в переменную $uploadfile будет входить папка и имя изображения

// В данной строке самое важное - проверяем загружается ли изображение (а может вредоносный код?)
// И проходит ли изображение по весу. В нашем случае до 512 Кб
        if (($_FILES['userfile']['type'] == 'image/gif' || $_FILES['userfile']['type'] == 'image/jpeg' || $_FILES['userfile']['type'] == 'image/png') && ($_FILES['userfile']['size'] != 0)) {
// Указываем максимальный вес загружаемого файла. Сейчас до 512 Кб
            if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
                //Здесь идет процесс загрузки изображения
                $size = getimagesize($uploadfile);
                // с помощью этой функции мы можем получить размер пикселей изображения
                if (($size[0] > MIN_WIDTH || $size[0] < MAX_WIDTH) && ($size[1] > MIN_HEIGHT || $size[1] < MAX_HEIGHT)) {
                    //echo "Файл загружен. Путь к файлу: <b>".$uploadfile."</b>";
                    //setcookie("file12", $uploadfile, time() + 3600*24);
                    setcookie('file', $apend, time() + 3600 * 24);
                    return true;
                } else {
                    setcookie('error', 1, time() + 100);

                    unlink($uploadfile);
                    // удаление файла
                }
            } else {
                setcookie('error', 2, time() + 100);
            }
        } else {
            //echo "<script>alert(\"Вы вошли на сайт, как гость.\");</script>";
            // exit('<meta http-equiv="refresh" content="0; url=main" />');
        }
    }

    function action_index()
    {
        //echo "<script>swal(\"Ошибка\");</script>";
        if (isset($_REQUEST['submitfile']) && $_REQUEST['submitfile'] == "Загрузить") {
            @mkdir("images", 0777);
            @mkdir("images/file", 0777);
            if (isset ($_FILES['userfile']) && $_FILES['userfile'] != "") {
                if ($this->LoadImage()) {
                    //copy($_FILES ['userfile']['tmp_name'], "images/file/" . $_FILES['userfile']['name']);
                    //header('Location:image/');
                    exit('<meta http-equiv="refresh" content="0; url=image" />');
                }
            }
        } else {
            //$this->view->generate('main_view.php', 'template_view.php', $data = null);
            //echo "NO"; 
        }
        $this->view->generate('main_view.php', 'template_view.php', $data = null);
        if ($_COOKIE['error'] == 1) {
            echo "<script>swal('Ошибка','Загружаемое изображение превышает допустимые нормы','error');</script>";
            setcookie('error', 0, time() + 3600 * 24);
        }
        if ($_COOKIE['error'] == 2) {
            echo "<script>swal('Ошибка','Файл не загружен, вернитеcь и попробуйте еще раз','error');</script>";
            setcookie('error', 0, time() + 3600 * 24);
        }
    }
}

