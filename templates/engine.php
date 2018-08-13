<?php
if(isset($_GET['act'])){
 if($_GET['act'] == 'login'){
    $email = $_POST['email'];
    $pwd = sha1($_POST['pwd']);
    $query_login = $connection->query("SELECT * FROM companies WHERE email = \"$email\" AND password = \"$pwd\"");

    if($row_login = $query_login->fetch_object()){
      // if authorized, removing the previus session
      if(isset($_SESSION['id'])){
        unset($_SESSION['id']);
      }

      $_SESSION['id'] = $row_login->id;
      header('Location:index.php?page=profile');
    }else{
      // if authorization failed
      header('Location:index.php?page=login&error=1');
    }
  }else if($_GET['act'] == 'reg'){
    $email = $_POST['email'];
    $pwd = sha1($_POST['pwd']);
    $name = $_POST['name'];
    $addr = $_POST['addr'];
    $phone = $_POST['phone'];
    $descr = $_POST['descr'];
    $city = $_POST['city'];
    $dis = $_POST['district'];

    if($connection->query("INSERT INTO companies VALUES(NULL, \"$name\", \"$email\", \"$pwd\", $city, $dis, \"$addr\", 1, 1, \"$phone\", 1, \"$descr\", 1)")){
      header('Location:index.php?page=login&reg=1');
    }else{
      header('Location:index.php?page=registration&error=1');
    }
  }else if($_GET['act'] == "addField" && isset($_SESSION['id'])){

    $type = $_POST['type'];
    $cov = $_POST['coverage'];
    $temp_file = $_FILES['avatar'];
    $salt = "dratuti";
    $id = $_SESSION['id'];
    $query_add_field=$connection->query("SELECT id FROM pictures WHERE id = (SELECT MAX(id) FROM pictures)");
    if($row_add_field=$query_add_field->fetch_object()){
      $img_max = $row_add_field->id;
      $img_max++;
	    $file_name = sha1($img_max.$salt).".jpg";
	    move_uploaded_file($_FILES['userfile']['tmp_name'],"db/img/$file_name");
      $connection->query("INSERT INTO fields VALUES(NULL,$type,$cov,$id,1)");
      $query_add_img = $connection->query("SELECT id FROM fields WHERE id = (SELECT MAX(id) FROM fields)");
      if($row_add_img = $query_add_img->fetch_object()){
        $id_max = $row_add_img->id;
        $connection->query("INSERT INTO pictures VALUES(NULL,\"$file_name\",$id_max,1)");
      }
    }

    //updating field_count in companies
    $id = $_SESSION['id'];
    $connection->query("UPDATE fields SET active = 0 WHERE id = $id_del");
    $query_del_field = $connection->query("SELECT * FROM companies WHERE id = $id");
    if($row_del_field = $query_del_field->fetch_object()){
      $field_count = $row_del_field->field_count;
      $field_count++;
      $connection->query("UPDATE companies SET field_count = $field_count WHERE id = $id");
    }

    header('Location:index.php?page=profile');

  }else if($_GET['act'] == 'editField' && isset($_SESSION['id'])){

    $id_edit = $_GET['id'];
    $type = $_POST['type'];
    $cov = $_POST['coverage'];
    $temp_file = $_FILES['avatar'];

    $connection->query("UPDATE fields SET type_id = $type, coverage_id = $cov WHERE id = $id_edit");

    if(file_exists($_FILES['userfile']['tmp_name']) || is_uploaded_file($_FILES['userfile']['tmp_name'])) {
      $connection->query("UPDATE pictures SET active = 0 WHERE field_id = $id_edit");
      $salt = "dratuti";
      $query_add_field=$connection->query("SELECT id FROM pictures WHERE id = (SELECT MAX(id) FROM pictures)");
      if($row_add_field=$query_add_field->fetch_object()){
        $img_max = $row_add_field->id;
        $img_max++;
        $file_name = sha1($img_max.$salt).".jpg";
        move_uploaded_file($_FILES['userfile']['tmp_name'],"db/img/$file_name");
        $id_max = $row_add_img->id;
        $connection->query("INSERT INTO pictures VALUES(NULL,\"$file_name\",$id_edit,1)");
      }
    }
    header('Location:index.php?page=profile');

  }else if($_GET['act'] == 'delField'){

    $id = $_SESSION['id'];
    $id_del = $_GET['id'];
    $connection->query("UPDATE fields SET active = 0 WHERE id = $id_del");
    $query_del_field = $connection->query("SELECT * FROM companies WHERE id = $id");
    if($row_del_field = $query_del_field->fetch_object()){
      $field_count = $row_del_field->field_count;
      $field_count--;
      $connection->query("UPDATE companies SET field_count = $field_count WHERE id = $id");
    }
    header('Location:index.php?page=profile');

  }else if($_GET['act'] == 'logout'){
    unset($_SESSION['id']);
    header('Location:index.php?page=login');
  }
}

if(isset($_GET['page'])){
  if($_GET['page'] == 'registration'){
    $page = 'registration';
  }else if($_GET['page'] == 'login'){
    $page = 'login';
  }else if($_GET['page'] == 'profile' && isset($_SESSION['id'])){
    $page = 'profile';
  }else{
    $page = '404';
  }
}
?>
