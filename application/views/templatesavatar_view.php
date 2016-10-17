
    <header><h3 class="tabs_involved">Шаблоны аватаров</h3>
        <div class="submit_link">
            <form action="" method="post" enctype="multipart/form-data">
                <input type="file" name="userfile" accept="image/*">
                <input type="submit" name="AddTemplatesAvatar" value="Добавить" class="alt_btn">
            </form>
        </div>
    </header>

<div class="tab_container">
    <div id="tab1" class="tab_content">
        <table class="tablesorter" cellspacing="0">
            <thead>
            <tr>
                <th>Entry Name</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <form action="" method="post">
                <?php
                $handle = opendir('images\template\\');
                //echo "gfdgdf".$handle;
                while ($file = readdir($handle))
                {
                    if ($file != "." && $file != "..")
                    {
                        echo '<tr>
                <td>
                <input type="image" src="/images/template/'.$file.'" name="avatar" value="'.$file.'" height="150">
                </td>
                <td><input type="image" src="images/icn_trash.png" title="delete" name="delete" value="'.$file.'"></td>
                </tr>';
                    }
                }
                closedir($handle);
                ?>
            </form>
            </tbody>
        </table>
    </div><!-- end of #tab1 -->
    </div>
