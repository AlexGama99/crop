


    <div class="clear"></div>
    <form action="" method="post">
        <article class="module width_full">
            <header><h3>Описание</h3></header>
            <div class="module_content">
                <fieldset>
                    <label>Описание:</label>

                <textarea rows="12" name="descript"><?php $fp = fopen("file\\descriptoin.txt", "r" ) or die ( "Не удалось открыть файл" );
while (!feof($fp))
    echo (fgets($fp,1024));
?></textarea>

                </fieldset>
            </div>
            <footer>
                <div class="submit_link">
                    <input type="submit" name="SaveDescription" value="Сохранить" class="alt_btn">
                </div>
            </footer>
        </article><!-- end of post new article -->
    </form>
    <div class="spacer"></div>
</section>