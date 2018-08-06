<?php
if($connection->query("SET NAMES utf8")){
  if(isset($_GET['com_id'])){
    $com_id = $_GET['com_id'];
    $query_com = $connection->query("SELECT * FROM companies WHERE id = $com_id");
    if($row_com = $query_com->fetch_object()){
      if(isset($_GET['f_id'])){
        $f_id = $_GET['f_id'];
        $query_field = $connection->query("SELECT * FROM fields WHERE company_id = $row_com->id AND id = $f_id");
      }else{
        $query_field = $connection->query("SELECT * FROM fields WHERE company_id = $row_com->id");
      }
      if($row_field = $query_field->fetch_object()){
        $query_pic = $connection->query("SELECT * FROM pictures WHERE field_id = $row_field->id");
        if($row_pic = $query_pic->fetch_object()){
?>
<section class="blog">
    <div class="container">
        <div class="row">

            <!-- Blog Content -->
            <div class="col-md-9">

                <div class="blog-post">
                    <div class="post-date">
                        <h4 class="month">Apr</h4>
                        <h3 class="day">24</h3>
                        <span class="year">2016</span>
                    </div>
                    <img src="img/blog/5.jpg" class="img-responsive width100" alt="#">
                    <a class="link-to-post" href="#"><h3><?php echo $row_com->name;?></h3></a>
                    <p class="blog-post-categories">
                        <span><i class="ion-ios-pricetags-outline"></i></span>
                        <?php
                        $query_type = $connection->query("SELECT t.name as type, c.name as cov FROM type t, coverage c WHERE t.id = $row_field->type_id AND c.id = $row_field->coverage_id");
                        if($row_type = $query_type->fetch_object()){
                        ?>
                          <a href="#"><?php echo $row_type->type; ?> поле</a>
                          <span>,</span>
                          <a href="#"><?php echo $row_type->cov; ?></a>
                        <?php } ?>
                    </p>
                    <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites.</p>
                    <p>Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section. The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. There are many variations of passages of Lorem Ipsum available, but the majority.</p>
                    <p>Phasellus nibh tortor, varius vitae orci sit amet, placerat ornare quam. Nunc sapien risus, <strong>tictum id orci quis, rutrum cursus ipsum. Phasellus pellentesque ultricies pretium.</strong></p>

                    <blockquote><p>Phasellus nibh tortor, varius vitae orci sit amet, placerat ornare quam. Nunc sapien risus, tictum id orci quis, rutrum cursus ipsum. ultricies pretium. Phasellus nibh tortor, varius vitae orci sit amet, <strong>placerat ornare quamm, nunc</strong> sapien risus, <strong>tictum id orci quis, rutrum</strong> cursus ipsum. Phasellus pellentesque ultricies pretium, placerat ornare quam</p></blockquote>

                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo <a href="#">dolores et ea</a> rebum. Stet clita kasd gubergren, no sea takimata sanctus <a href="#">magna aliquyam erat</a>, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.<p>

                    <p><em>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nam at velit nisl. Aenean vitae est nisl. Cras molestie molestie nisl vel imperdiet. Donec vel mi sem.</em></p>

                </div>

                <!-- Bookings -->
                <br>
                <center><button class="btn btn-success" type="button" name="button" onclick="showBooking()" id="showButton">Брони</button></center>
                <div id="booking" style="display: none;">

                  <h3>Бронь</h3>
                  <table class="table table-striped">
                    <thead class="">
                      <tr>
                        <th>
                          Номер
                        </th>
                        <th>
                          Дата
                        </th>
                        <th>
                          От
                        </th>
                        <th>
                          До
                        </th>
                      </tr>
                    </thead>
                    <?php
                    $query_book = $connection->query("SELECT date, time_begin, time_end FROM bookings WHERE field_id = $row_field->id");
                    $count = 0;
                    while ($row_book = $query_book->fetch_object()) {
                      $count++;
                    ?>
                    <tr class="">
                      <td>
                        <?php echo $count; ?>
                      </td>
                      <td>
                        <?php echo $row_book->date; ?>
                      </td>
                      <td>
                        <?php
                        $date=date_create($row_book->time_begin,timezone_open("Europe/Oslo"));
                        echo date_format($date,"H:i");
                        ?>
                      </td>
                      <td>
                        <?php
                        $date=date_create($row_book->time_end,timezone_open("Europe/Oslo"));
                        echo date_format($date,"H:i");
                        ?>
                      </td>
                    </tr>
                    <?php
                    }
                    ?>
                  </table>

                  <form class="form-group" action="?act=book&com_id=<?php echo $row_com->id;?>&f_id=<?php echo $row_field->id;?>" method="post">
                    <center>
                      <input class="form-control" style="width: 50%;" placeholder="Дата" type="text" onfocus="(this.type='date')"  id="date" type="text" name="date">
                      <input class="form-control" style="width: 50%;" placeholder="Начало" type="text" onfocus="(this.type='time')"  id="date" type="text" name="time_begin">
                      <input class="form-control" style="width: 50%;" placeholder="Конец" type="text" onfocus="(this.type='time')"  id="date" type="text" name="time_end">
                      <input class="form-control" style="width: 50%;" type="text" name="name" placeholder="Имя">
                      <input class="form-control" style="width: 50%;" type="number" name="tel" placeholder="Телефон (Пример: 87076179250)">
                      <input class="btn btn-success" type="submit" style="margin-top: 10px;" value="Забронировать">
                    </center>
                  </form>
                </div>
                <!-- End bookings -->

                <!-- Comments -->

                <div class="comments">
                  <h3>Отзывы</h3><br>
                    <h4 class="comments-title">4 Comments</h4>
                    <div class="comment first depth-1">
                        <a class="pull-left" href="#">
                            <img class="avatar" src="img/assets/avatar.jpg" alt="">
                        </a>
                        <div class="comment-body">
                            <a class="comment-reply" href="#">Reply</a>
                            <h4 class="comment-heading">Chris Holland</h4>
                            <p class="comment-time">Apr 24, 2016</p>
                            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus magna aliquyam erat, sed diam voluptua. Vesquam ante aliquet lacusemper elit. Cras neque nulla, convallis non commodo et. Vesquam ante aliquet lacusemper elit.</p>
                        </div>
                    </div>

                    <div class="comment depth-2">
                        <a class="pull-left" href="#">
                            <img class="avatar" src="img/assets/avatar.jpg" alt="">
                        </a>
                        <div class="comment-body">
                            <a class="comment-reply" href="#">Reply</a>
                            <h4 class="comment-heading">Monica Fairley</h4>
                            <p class="comment-time">Apr 26, 2016</p>
                            <p>Cras neque nulla, convallis non commodo et, euismod nonsese. At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident.</p>
                        </div>
                    </div>

                    <div class="comment depth-3">
                        <a class="pull-left" href="#">
                            <img class="avatar" src="img/assets/avatar.jpg" alt="">
                        </a>
                        <div class="comment-body">
                            <a class="comment-reply" href="#">Reply</a>
                            <h4 class="comment-heading">William Gallop</h4>
                            <p class="comment-time">Apr 29, 2016</p>
                            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
                        </div>
                    </div>

                    <div class="comment depth-1">
                        <a class="pull-left" href="#">
                            <img class="avatar" src="img/assets/avatar.jpg" alt="">
                        </a>
                        <div class="comment-body">
                            <a class="comment-reply" href="#">Reply</a>
                            <h4 class="comment-heading">Eugene Miller</h4>
                            <p class="comment-time">Apr 30, 2016</p>
                            <p>Lorem ipsum dolor sit amet isse potenti. Vesquam ante aliquet lacusemper elit. Cras neque nulla, convallis non commodo et, euismod nonsese. At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.</p>
                        </div>
                    </div>

                </div>

            </div>
            <!-- End Blog Content -->

            <!-- Sidebar -->
            <div class="col-md-3 sidebar">

                <div class="shop-widget shop-tags">
                    <h5><b>Поле:</b></h5>
                    <ul class="tags-list">
                      <?php
                        for($i = 0; $i < $row_com->field_count; $i++){
                      ?>
                        <li><a href="#"><?php echo $i+1; ?></a></li>
                      <?php } ?>
                    </ul>
                </div>

                <div class="shop-widget">
                    <h5><b>Контакты: </b><br><br><?php echo $row_com->phone?></h5>
                </div>

                <div class="shop-widget">
                    <?php
                      $query_city = $connection->query("SELECT d.name as dis, c.name as city FROM districts d, cities c WHERE c.id = $row_com->city and d.id = $row_com->district;");
                      if($row_city = $query_city->fetch_object()){
                    ?>
                    <h5><b>Адресс: </b><br><br><?php echo $row_city->city.", ".$row_city->dis.", ".$row_com->address;?></h5>
                    <?php } ?>
                </div>

                <div class="shop-widget">
                  <div
                       data-map-coordinates="40.776773, -73.981351"
                       data-marker-coordinates="40.775075, -73.981179"
                       data-info="<?php echo $row_com->name;?><br><?php echo $row_com->address;?>"
                       id="map" class="map-style-3 height300">
                  </div>
                </div>
            </div>
            <!-- End Sidebar -->

        </div>
    </div>
</section>
<?php
        }
      }
    }else{
      header("Location:index.php?page=404");
    }
  }
}
?>

<script>
  $('#showButton').on('click', function () {
    $('#booking').slideToggle(600);
  });
</script>
