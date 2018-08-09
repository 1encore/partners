<?php
if($connection->query("SET NAMES utf8")){
  if(isset($_SESSION['id'])){
    $com_id = $_SESSION['id'];
    $query_com = $connection->query("SELECT * FROM companies WHERE id = $com_id");
    if($row_com = $query_com->fetch_object()){
?>
<!-- Cart -->
<section class="cart">
    <div class="container">
        <div class="row">

            <div class="col-md-12 cart-total-items">
                <h5 class="subheading">Кол-во полей: <?php echo $row_com->field_count; ?></h5>
            </div>
            <?php
            $query_field = $connection->query("SELECT * FROM fields WHERE company_id = $row_com->id");
            $num = 0;
            while($row_field = $query_field->fetch_object()){
              if($row_field->active){
              $num++;
            ?>
            <div class="col-md-8">

                <div class="cart-item">
                    <div class="item-image-container">
                        <?php
                        $query_pic = $connection->query("SELECT * FROM pictures WHERE field_id = $row_field->id");
                        if($row_pic = $query_pic->fetch_object()){
                          if($row_pic->active){
                        ?>
                          <a href="#"><img src="db/img/<?php echo $row_pic->url; ?>" class="img-responsive" alt="#"></a>
                        <?php
                          }
                        }
                        ?>
                    </div>
                    <div class="item-details">
                        <h6><strong><?php echo $row_com->name; ?></strong></h6>
                        <h5>Поле № <?php echo $num; ?></h5>
                        <span><i class="ion-ios-pricetags-outline"></i></span>
                        <?php
                        $query_type = $connection->query("SELECT t.name as type, c.name as cov FROM type t, coverage c WHERE t.id = $row_field->type_id AND c.id = $row_field->coverage_id");
                        if($row_type = $query_type->fetch_object()){
                        ?>
                          <?php echo $row_type->type; ?> поле
                          <span>,</span>
                          <?php echo $row_type->cov; ?>
                        <?php } ?>
                        <a href="#" class="item-action move-to-wishlist"><i class="ion-android-list"></i>Редактировать</a>
                        <a href="#" class="item-action remove-from-cart"><i class="ion-ios-trash-outline"></i>Удалить</a>
                    </div>
                </div>
            </div>
            <?php
              }
            }
            ?>

            <div class="col-md-4">
                <div class="cart_totals">
                    <h5><?php echo $row_com->name; ?></h5>
                    <table cellspacing="0">
                        <tbody>
                          <?php
                            $query_city = $connection->query("SELECT d.name as dis, c.name as city FROM districts d, cities c WHERE c.id = $row_com->city and d.id = $row_com->district;");
                            if($row_city = $query_city->fetch_object()){
                          ?>
                            <tr class="cart-subtotal">
                                <th>Город</th>
                                <td><span class="amount"><?php echo $row_city->city; ?></span></td>
                            </tr>
                            <tr class="shipping">
                                <th>Район</th>
                                <td><span><?php echo $row_city->dis; ?></span></td>
                            </tr>
                            <tr class="cart-returns">
                                <th>Адресс</th>
                                <td><span class="amount"><?php echo $row_com->address; ?></span></td>
                            </tr>
                            <tr class="cart-returns">
                                <th>Контакты</th>
                                <td><span class="amount"><?php echo $row_com->phone; ?></span></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <a href="#" class="btn btn-primary btn-md btn-appear btn-cart-checkout"><span>Редактировать<i class="ion-ios-arrow-forward"></i></span></a>
                <a href="#" class="btn btn-primary btn-md btn-appear btn-cart-checkout"><span>Добавить поле<i class="ion-ios-arrow-forward"></i></span></a>
            </div>

        </div>
    </div>
</section>
<!-- Cart -->
<?php
    }
  }
}
?>
