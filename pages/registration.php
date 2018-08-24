<!-- Checkout -->
<section class="checkout">
    <div class="container">
        <div class="row">

            <div class="col-md-8 mr-auto text-center mt40 mb40">
                <div class="section-heading">
                    <h2>Партнерам</h2>
                    <hr class="separator">
                </div>

                <?php
                if(isset($_GET['error'])){
                  if($_GET['error'] == 1){
                ?>
                <div class="alert alert-danger fade in">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="ion-ios-close-empty"></i></button>
                  <i class="icon-genius"></i> <strong>Данные заполнены не коректно.</strong>
                </div>
                <?php
                  }else if($_GET['error'] == 2){
                ?>
                <div class="alert alert-danger fade in">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="ion-ios-close-empty"></i></button>
                  <i class="icon-genius"></i> <strong>Пользователь с таким почтовым адресом уже существует.</strong>
                </div>
                <?php
                  }
                }
                ?>

                <form class="" action="?act=reg" method="post">
                  <input type="email" class="input-text" name="email" placeholder="Email*">
                  <input type="password" class="input-text" name="pwd" placeholder="Пароль*">
                  <input type="text" class="input-text" name="name" placeholder="Название компании*">
                  <input type="text" class="input-text" name="addr" placeholder="Адрес*">
                  <input type="number" class="input-text" name="phone" placeholder="Телефон* (Пример: 87071234567)">
                  Описание:
                  <textarea name="descr" rows="8" cols="40" placeholder="Описание"></textarea>
                  <select name="city">
                    <option selected="selected" disabled="disabled" value="">Выберите город*</option>
                    <?php
                    $query_city = $connection->query("SELECT * FROM cities");
                    while($row_city = $query_city->fetch_object()){
                    ?>
                      <option value="<?php echo $row_city->id; ?>"><?php echo $row_city->name; ?></option>
                    <?php
                    }
                    ?>
                  </select>

                  <select name="district">
                    <option selected="selected" disabled="disabled" value="">Выберите район*</option>
                    <?php
                    $query_city = $connection->query("SELECT * FROM districts");
                    while($row_city = $query_city->fetch_object()){
                    ?>
                      <option value="<?php echo $row_city->id; ?>"><?php echo $row_city->name; ?></option>
                    <?php
                    }
                    ?>
                  </select>

                  <input class="btn btn-primary btn-md btn-appear btn-cart-checkout highlight" type="submit" value="Отправить"/>
                  <a href="?page=login" class="btn btn-primary btn-md btn-appear btn-cart-checkout highlight" style="color: #fff">Уже есть аккаунт</a>
                  <p class="small-print">Нажимая конпку "Отпрравить", я согласен с <a href="#" class="highlight">условиями пользовательского соглашения.</a></p>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- Checkout -->
