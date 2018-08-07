<nav class="navbar navbar-default fullwidth <?php if($page=='main') echo "transparent"; ?>">
    <div class="container">
        <div id="navbar" class="navbar-collapse collapse">
            <div class="container" onscroll="logoMargin()">
              <a id="logo" class="navbar-brand" href="?page=login"><img src="img/assets/logo-nav.png" class="logo-dark" alt="#" style="margin-top: 15px"></a>
                <ul class="nav navbar-nav menu-right">
                  <?php
                  if(!isset($_SESSION['id'])) {
                  ?>
                    <li><a href="https://www.fast-booking.kz/" class="btn-scroll">Главная</a></li>
                    <li><a href="?page=login" class="btn-scroll">Войти</a></li>
                  <?php }else{ ?>
                    <li><a href="?page=profile" class="btn-scroll">Профиль</a></li>
                    <li><a href="?act=logout" class="btn-scroll">Выйти</a></li>
                  <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</nav>
