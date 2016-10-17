<?php


class Controller_Image extends Controller
{

function action_index()
{
    $this->Saveimage('images/file/'.$_COOKIE['file']);






    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_REQUEST['load'])&& $_REQUEST['load'] != "") {
            $this->uploadimage();
        }
        if ((isset($_REQUEST['avatar']))||(!isset($_COOKIE['fileAvatar']))) {
            $this->createIcon();

        }
    }

        $this->view->generate('image_view.php', 'template_view.php', null);
}

    public function Saveimage($file_name)
{
    require_once 'SimpleImage.php';
    //include('SimpleImage.php');
    $image = new SimpleImage();
    $image->load($file_name);
    $image->resizeToWidth(250);
    $image->save($file_name);
    }
    
    public function uploadimage()
    {
//$GLOBALS['file'] = $_FILES['userfile']['name'];
        $fileAvatar = 'images/template/'.$_COOKIE['fileAvatar'];
                $file_types = array('png', 'jpeg', 'gif');
                $current_file_type = substr(strrchr($fileAvatar, '.'), 1);
                if( ($current_file_type == "jpeg" )||($current_file_type == "jpg" )) {
                    $water_img = imagecreatefromjpeg($fileAvatar);
                } elseif( $current_file_type == 'gif' ) {
                    $water_img = imagecreatefromgif($fileAvatar);
                } elseif( $current_file_type == 'png' ) {
                    $water_img = imagecreatefrompng($fileAvatar);
                }
                   // $water_img = imagecreate('images/template/'.$_COOKIE['fileAvatar']);

                $water_size = getimagesize('images/template/'.$_COOKIE['fileAvatar']);

                $targ_w = $water_size[0];
                $targ_h = $water_size[1];
                $jpeg_quality = 100;

                $src = 'images/file/' . $_COOKIE['file'];
                $img_r = imagecreatefromjpeg($src);
                $dst_r = ImageCreateTrueColor($targ_w, $targ_h);
                $new_filename = 'images/file/'.$_COOKIE['file'].$_COOKIE['fileAvatar'];

                imagecopyresampled($dst_r, $img_r, 0, 0, $_POST['x'], $_POST['y'],
                    $targ_w, $targ_h, $_POST['w'], $_POST['h']);


                $logo_h = $water_size[1]; //высота
                $logo_w = $water_size[0]; //ширинаа
                imagecopy($dst_r, $water_img, 0, 0, 0, 0, $logo_w, $logo_h);

                $dst_r1 = ImageCreateTrueColor(250, 250);
                imagecopyresampled($dst_r1, $dst_r, 0, 0, 0, 0,
                    250, 250, $targ_w, $targ_h);

                imagejpeg($dst_r1, $new_filename, $jpeg_quality);

                header('Content-Type: image/jpeg');
                header('Content-Disposition: attachment; filename="' . htmlspecialchars($_GET['name']) . '"');
                header('Content-Length:' . filesize($new_filename) . '');
                header('Cache-Control: no-cache');
                header('Content-Transfer-Encoding: chunked');
                readfile($new_filename);
                unlink($new_filename);
                unlink($dst_r1);
                unlink($dst_r);
                unlink($water_img);
       // $upload = true;
        
                //unlink($src);
    }
    
    public function createIcon()
    {
        if (isset($_REQUEST['avatar']))
        {
            $fileAvatar = $_REQUEST['avatar'];
            setcookie('fileAvatar',$fileAvatar,time() + 3600*24);
            exit('<meta http-equiv="refresh" content="0; url=image" />');
            //header('Location: image');
        }
        elseif(!isset($_COOKIE['fileAvatar']))
        {
            $d = opendir("images/template");
            $files = array();
            while ( false !== ($fileAvatar = readdir($d)) ){
                if ($fileAvatar == "." or $fileAvatar == ".." )
                    continue;
                $files[] = $fileAvatar;
            }
            if(!empty($files)) {
                shuffle($files);
                $fileAvatar = $files[mt_rand(0, count($files)-1)];
                setcookie('fileAvatar',$fileAvatar,time() + 3600*24);
                exit('<meta http-equiv="refresh" content="0; url=image" />');
                //header('Location: image');
            }
            else echo 'Файлов не найдено';
            closedir($d);
        }
        exit();
    }


}