    <section id="wrapper"><!-- Содержимое -->
        <section id="one" class="wrapper spotlight style1"><!-- 1 -->
            <div class="inner">
                <!-- <a href="#" class="image"><img src="image/howto2.png" alt="" /></a> -->
                <img src="/images/howto5.png" alt="">
                <div class="content">
                    <h2 class="major">Исходное фото</h2>
                    <p>
                        <?php $fp = fopen("file\\descriptoin.txt", "r" ) or die ( "Не удалось открыть файл" );
                        while (!feof($fp))
                            echo (fgets($fp,1024));
                        ?> <br>
                    </p>
                        <form action="" method="post" enctype="multipart/form-data" name="uploader">
                            <div class="field">
                            <input id="uploadimage" type="file"  name="userfile" accept="image/*">
                                </div>
                            <ul class="actions">
                               <li><input type="submit" name="submitfile" value="Загрузить" /></li>
                               <!--<a href="image" class="special">Загрузите файл</a>-->
                            </ul>
                        </form>
                    <!-- <a href="Search" class="special">Выберите файл  </a><-->
 <!--Файл не выбран-->
                    <!--<a href="upload" class="special">Загрузите файл  </a>-->
                                    </div>
                                </div>
                            </section>
                        </section>
</div>
