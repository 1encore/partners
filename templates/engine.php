<?php
if(isset($_GET['act'])){
 if($_GET['act'] == 'login'){

    $email = $_POST['email'];
    $pwd = sha1($_POST['pwd']);
    $query_login = $connection->query("SELECT * FROM companies WHERE email = \"$email\" AND password = \"$pwd\"");

    if($row_login = $query_login->fetch_object()){
      // if authorized
      $_SESION['id'] = $row_login->id;
      $page = 'main';
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

    header('Location:'.$descr.'');

    // if($connection->query("INSERT INTO companies VALUES(NULL, \"$name\", \"$email\", \"$pwd\", $city, $dis, \"$addr\", 1, 1, \"$phone\", 1, $descr, 1)")){
    //   header('Location:index.php?page=login');
    // }else{
    //   header('Location:index.php?page=registration&error=1');
    // }

  }
}

if(isset($_GET['page'])){
  if($_GET['page'] == 'registration'){
    $page = 'registration';
  }else if($_GET['page'] == 'login'){
    $page = 'login';
  }else{
    $page = '404';
  }
}
?>
