<h1>Страница авторизации</h1>
<div class="inner">
<form action="" method="post">
        <div class="field">
            <h2 class="major">Авторизация</h2>
        </div>
            <div class="field">
            <label for="login">Имя</label>
            <input type="text" name="login" />
            </div>
                <div class="field">
                    <label for="login">Пароль</label>
                    <input type="text" name="password" />
                </div>
        <ul class="actions">
            <li><input type="submit" value="Войти" name="btn" /></li>
        </ul>
</form>
</div>

<?php extract($data); ?>
<?php if($login_status=="access_granted") { ?>
    <div>Авторизация прошла успешно.</div>
<?php } elseif($login_status=="access_denied") { ?>
    <div>Логин и/или пароль введены неверно.</div>
<?php } ?>