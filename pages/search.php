<!-- Portfolio -->
<section class="shop">
    <div class="container">
        <div class="row">

            <div class="col-md-9">
                <div class="shop-standard cbp" id="shop-grid">
                  <?php
                    $query_com = $connection->query("SELECT * FROM companies");
                    while($row_com = $query_com->fetch_object()){
                      $query_field = $connection->query("SELECT * FROM fields WHERE company_id = $row_com->id");
                      if($row_field = $query_field->fetch_object()){
                        $query_pic = $connection->query("SELECT * FROM pictures WHERE field_id = $row_field->id");
                        if($row_pic = $query_pic->fetch_object()){
                  ?>
                  <div class="cbp-item women clothing">
                      <div class="product-details">
                          <h4 class="price" style="color: #fff;"><?php echo $row_com->name; ?></h4>
                      </div>
                      <div class="cbp-caption">
                          <div class="cbp-caption-defaultWrap">
                              <img src="db/img/<?php echo $row_pic->url; ?>">
                          </div>
                          <div class="cbp-caption-activeWrap">
                              <div class="cbp-l-caption-alignCenter">
                                  <div class="cbp-l-caption-body">
                                      <a href="?page=company&com_id=<?php echo $row_com->id;?>" class="shop-item-btn add-to-cart-btn"><i class="fa fa-search"></i> Подробнее</a>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <?php
                      }
                    }
                  }
                  ?>
                </div>

                <!-- Pagination >
                <div class="col-md-12 text-center">
                    <ul class="blog-pagination">
                        <li>
                            <a href="#">
                                <i class="ion-android-arrow-back"></i>
                            </a>
                        </li>
                        <li class="active">
                            <a href="#">1</a>
                        </li>
                        <li>
                            <a href="#">2</a>
                        </li>
                        <li>
                            <a href="#">3</a>
                        </li>
                        <li>
                            <a href="#">4</a>
                        </li>
                        <li>
                            <a href="#">5</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="ion-android-arrow-forward"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- End Pagination -->

            </div>

            <!-- Sidebar -->
            <div class="col-md-3 sidebar">

                <div class="shop-widget">
                    <h5><b>Поиск</b></h5>
                    <form>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Название">
                            <span class="input-group-addon">
                                <button type="submit">
                                    <span class="ti-search"></span>
                                </button>
                            </span>
                        </div>
                    </form>
                </div>

                <div class="shop-widget">
                    <h5><b>Город</b></h5>
                    <select name="city">
                      <option selected="selected" disabled="disabled" value="">Выберите город</option>
                      <?php
                      $query_city = $connection->query("SELECT * FROM cities");
                      while($row_city = $query_city->fetch_object()){
                      ?>
                        <option value="<?php echo $row_city->id; ?>"><?php echo $row_city->name; ?></option>
                      <?php
                      }
                      ?>
                    </select>
                </div>

                <div class="shop-widget">
                    <h5><b>Район</b></h5>
                    <select name="district">
                      <option selected="selected" disabled="disabled" value="">Выберите район</option>
                      <?php
                      $query_city = $connection->query("SELECT * FROM districts");
                      while($row_city = $query_city->fetch_object()){
                      ?>
                        <option value="<?php echo $row_city->id; ?>"><?php echo $row_city->name; ?></option>
                      <?php
                      }
                      ?>
                    </select>
                </div>

                <div class="shop-widget shop-tags">
                    <h5><b>Тип</b></h5>
                    <ul class="tags-list">
                      <?php
                      $query_type = $connection->query("SELECT name FROM type");
                      while($row_type = $query_type->fetch_object()){
                      ?>
                        <li><a href="#"><?php echo $row_type->name; ?></a></li>
                      <?php
                      }
                      $query_cov = $connection->query("SELECT name FROM coverage");
                      while($row_cov = $query_cov->fetch_object()){
                      ?>
                        <li><a href="#"><?php echo $row_cov->name; ?></a></li>
                      <?php
                      }
                      ?>
                    </ul>
                </div>
            </div>
            <!-- End Sidebar -->

        </div>
    </div>
</section>
<!-- End Portfolio -->
