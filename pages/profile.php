<?php
if($connection->query("SET NAMES utf8")){
  if(isset($_SESSION['id'])){
    $com_id = $_SESSION['id'];
    $query_com = $connection->query("SELECT * FROM companies WHERE id = $com_id");
    if($row_com = $query_com->fetch_object()){
?>
<!-- Modal Add-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Новое поле</h5>
      </div>
      <form class="" action="?act=addField" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <input type="text" name="userfile" required placeholder="Фото" onmouseover="(this.type='file')" class="form-control">
          <select name="type" required>
            <option disabled selected>Тип</option>
          <?php
            $query_add_type = $connection->query("SELECT * FROM type");
            while($row_add_type = $query_add_type->fetch_object()){
          ?>
            <option value="<?php echo $row_add_type->id ?>"><?php echo $row_add_type->name; ?></option>
          <?php
            }
          ?>
          </select>
          <select name="coverage" required>
            <option disabled selected>Покрытие</option>
          <?php
            $query_add_type = $connection->query("SELECT * FROM coverage");
            while($row_add_type = $query_add_type->fetch_object()){
          ?>
            <option value="<?php echo $row_add_type->id ?>"><?php echo $row_add_type->name; ?></option>
          <?php
            }
          ?>
        </select>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
          <button type="submit" class="btn btn-primary">Добавить</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Cart -->
<section class="cart">
    <div class="container">
        <div class="row">
            <div class="col-md-12 cart-total-items">
                <h5 class="subheading">Кол-во полей: <?php echo $row_com->field_count; ?></h5>
            </div>
            <div class="col-md-8">
            <!-- Getting each field -->
            <?php
            $query_field = $connection->query("SELECT * FROM fields WHERE company_id = $row_com->id AND active = 1");
            $num = 0;
            while($row_field = $query_field->fetch_object()){
              $num++;
            ?>
                <div class="cart-item">
                    <div class="item-image-container">
                        <?php
                        $query_pic = $connection->query("SELECT * FROM pictures WHERE field_id = $row_field->id AND active = 1");
                        if($row_pic = $query_pic->fetch_object()){
                        ?>
                          <a href="#"><img src="db/img/<?php echo $row_pic->url; ?>" class="img-responsive" alt="#"></a>
                        <?php
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
                        <a href="#" class="item-action move-to-wishlist" data-toggle="modal" data-target="#<?php echo $row_field->id ?>"><i class="ion-android-list"></i>Редактировать</a>
                        <a href="?act=delField&id=<?php echo $row_field->id ?>" class="item-action remove-from-cart"><i class="ion-ios-trash-outline"></i>Удалить</a>
                    </div>
                </div>
                <!-- Modal edit-->
                <div class="modal fade" id="<?php echo $row_field->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Новое поле</h5>
                      </div>
                      <form class="" action="?act=editField&id=<?php echo $row_field->id; ?>" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                          <input type="text" name="userfile" placeholder="Заменить текущее фото" onmouseover="(this.type='file')" class="form-control">
                          <select name="type" required>
                            <option disabled>Тип</option>
                          <?php
                            $query_add_type = $connection->query("SELECT * FROM type");
                            while($row_add_type = $query_add_type->fetch_object()){
                              if($row_add_type->id == $row_field->type_id){
                          ?>
                            <option selected value="<?php echo $row_add_type->id ?>"><?php echo $row_add_type->name; ?></option>
                          <?php
                              }else{
                          ?>
                              <option value="<?php echo $row_add_type->id ?>"><?php echo $row_add_type->name; ?></option>
                          <?php
                              }
                            }
                          ?>
                          </select>
                          <select name="coverage" required>
                            <option disabled>Тип</option>
                          <?php
                            $query_add_type = $connection->query("SELECT * FROM coverage");
                            while($row_add_type = $query_add_type->fetch_object()){
                              if($row_add_type->id == $row_field->coverage_id){
                          ?>
                            <option selected value="<?php echo $row_add_type->id ?>"><?php echo $row_add_type->name; ?></option>
                          <?php
                              }else{
                          ?>
                              <option value="<?php echo $row_add_type->id ?>"><?php echo $row_add_type->name; ?></option>
                          <?php
                              }
                            }
                          ?>
                          </select>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                          <button type="submit" class="btn btn-primary">Изменить</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
            <?php
            }
            ?>
            <!-- Add field -->
              <div class="cart-item">
                <div class="item-image-container cbp-item">
                      <a href="#" data-toggle="modal" data-target="#exampleModal"><img src="img/assets/new.jpg" class="img-responsive" alt="#"></a>
                </div>
              </div>
            </div>

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
