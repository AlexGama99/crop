
<script type="text/javascript">
    jQuery(function($){

        // Create variables (in this scope) to hold the API and image size
        var jcrop_api,
            boundx,
            boundy,

        // Grab some information about the preview pane
            $preview = $('#preview-pane'),
            $pcnt = $('#preview-pane .preview-container'),
            $pimg = $('#preview-pane .preview-container img'),

            xsize = $pcnt.width(),
            ysize = $pcnt.height();

        console.log('init',[xsize,ysize]);
        $('#target').Jcrop({
            onChange: updatePreview,
            onSelect: updatePreview,
            aspectRatio: 1,
            onSelect: updateCoords
        },function(){



            // Use the API to get the real image size
            var bounds = this.getBounds();
            boundx = bounds[0];
            boundy = bounds[1];
            // Store the API in the jcrop_api variable
            jcrop_api = this;
            jcrop_api.animateTo([0,0,100,100]);
            // Move the preview into the jcrop container for css positioning
            $preview.appendTo(jcrop_api.ui.holder);
        });

        function updatePreview(c)
        {
            if (parseInt(c.w) > 0)
            {
                var rx = xsize / c.w;
                var ry = ysize / c.h;

                $pimg.css({
                    width: Math.round(rx * boundx) + 'px',
                    height: Math.round(ry * boundy) + 'px',
                    marginLeft: '-' + Math.round(rx * c.x) + 'px',
                    marginTop: '-' + Math.round(ry * c.y) + 'px'
                });
            }
        };

    });
    function updateCoords(c)
    {
        $('#x').val(c.x);
        $('#y').val(c.y);
        $('#w').val(c.w);
        $('#h').val(c.h);
    };

    function checkCoords()
    {
        if (parseInt($('#w').val())) return true;
        swal('Ошибка','Выделите область','error');
        return false;
    };

</script>
<style>

    .avatar-text-info {
        font-size:75%;
    }
    figure.img  {

    }
    figure.img img  {
        /*max-width: 100%;
        height: auto;*/
        margin-right: 10px; /* Отступ справа */
        margin-bottom: 10px; /* Отступ снизу */

    }
    figure.img figcaption {

    }
    /* Apply these styles only when #preview-pane has
           been placed within the Jcrop widget */
    .jcrop-holder #preview-pane {
        display: inline-block;
        box-sizing: border-box;
        position: relative;
        bottom: 20px;
        z-index: 2000;
        right: -350px;
            /* 1px rgba(0,0,0,.4) solid;
         background-color: white;*/

        -webkit-border-radius: 6px;
        -moz-border-radius: 6px;
        border-radius: 6px;

        -webkit-box-shadow: 1px 1px 5px 2px rgba(0, 0, 0, 0.2);
        -moz-box-shadow: 1px 1px 5px 2px rgba(0, 0, 0, 0.2);
        box-shadow: 1px 1px 5px 2px rgba(0, 0, 0, 0.2);
    }

    /* The Javascript code will set the aspect ratio of the crop
       area based on the size of the thumbnail preview,
       specified here */
    #preview-pane .preview-container {
        width:400px;
        height: 400px;
        overflow: hidden;

    }
    #preview-pane .mask-image
    {
        position: absolute;
    }
    #preview-pane .input
    {
        position: absolute;
    }


</style>
    <section id="wrapper"><!-- Содержимое -->
        <section id="one" class="wrapper spotlight style1"><!-- 1 -->

            <div id="preview-pane">
                <div class="mask-image"><img src="/images/template/<?=$_COOKIE['fileAvatar']?>" width="400"></div>
                <div class="preview-container">
                    <img src="/images/file/<?=$_COOKIE['file']?>" class="jcrop-preview" alt="Preview"/>
                </div>
                <div class="input">
                    <form action="" method="post" onsubmit="return checkCoords();">
                        <input type="hidden" id="x" name="x" value="" />
                        <input type="hidden" id="y" name="y" value="" />
                        <input type="hidden" id="w" name="w" value="" />
                        <input type="hidden" id="h" name="h" value="" />
                        <input type="submit" name="load" value="Скачать фотографию" width="400"/>
                    </form>
                </div>
            </div>

            <div class="inner" >
                <!-- <a href="#" class="image"><img src="image/howto2.png" alt="" /></a> -->

                <div class="content">

                        <h2 align="center">Предпросмотр готового фото</h2>
                        <p align="left">Выделите нужную область фотографии </p>

                        <!--<div style="padding-bottom:20px"><img id="sourceimg" src="/images/file/<?=$_COOKIE['file']?>" alt="" title="" style="margin: 0 0 0 10px;" width="200" ></div>-->
                    <figure class="img" >
                    <img src="/images/file/<?=$_COOKIE['file']?>" id="target" alt="[Jcrop Example]"/><br><br><br><br><br><br>

</figure>
                </div>
            </div>
        </section>
    </section>

    <section id="two" class="wrapper alt spotlight style2"><!-- 2 -->
        <h2 align="center">Выберите шаблон</h2>
        <div class="inner" >
            <div class="content">
                <figure class="img">
                    <form action="" method="post" onsubmit="">
                <?php
                $handle = opendir('images\template\\');
                //echo "gfdgdf".$handle;
                while ($file = readdir($handle))
                {
                    if ($file != "." && $file != "..")
                    {

                        echo '<tr>
                <input type="image" src="/images/template/'.$file.'" name="avatar" value="'.$file.'" class="btn btn-large btn-inverse" height="200">
                </tr>';
                    }
                }
                closedir($handle);
                ?>
                    </form>
                </figure>

            </div>
        </div>
    </section>



