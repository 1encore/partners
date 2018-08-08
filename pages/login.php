<!-- Checkout -->
<section class="checkout">
    <div class="container">
        <div class="row">

            <div class="col-md-8 mr-auto text-center mt40 mb40">
                <div class="section-heading">
                    <h2>Войти</h2>
                    <hr class="separator">
                </div>

                <form class="" action="?act=login" method="post">
                  <input type="email" class="input-text" name="email" placeholder="E-mail адресс">
                  <input type="password" class="input-text" name="pwd" placeholder="Пароль">

                  <input class="btn btn-primary btn-md btn-appear btn-cart-checkout highlight" type="submit" value="Войти"/>
                </form>
                <a href="?page=registration" class="">Зарегестрироваться</a>
                <?php
                if(isset($_GET['error'])){
                ?>
                <br><br>
                <div class="alert alert-danger fade in">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="ion-ios-close-empty"></i></button>
                  <i class="icon-genius"></i> <strong>Неверный логин или пароль.</strong>
                </div>
                <?php
                }else if(isset($_GET['reg'])){
                ?>
                <br><br>
                <div class="alert alert-success fade in">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="ion-ios-close-empty"></i></button>
                  <i class="icon-happy"></i> <strong>Вы зарегестрированы.</strong>
                </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</section>
<!-- Checkout -->
