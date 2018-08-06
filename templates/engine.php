<?php
if(isset($_GET['act'])){
 if($_GET['act'] == 'login'){

    $email = $_POST['email'];
    $pwd = sha1($_POST['pwd']);
    $query_login = $connection->query("SELECT * FROM companies WHERE email = \"$email\" AND password = \"$pwd\"");
    if($row_login = $query_login->fetch_object()){
      $_SESION['id'] = $row_login->id;
      $page = 'main';
    }else{
      header('Location:index.php?page=login&error=1');
    }

  }else if($_GET['act'] == 'reg'){



  }
}

if(isset($_GET['page'])){
  if($_GET['page'] == 'company'){
    $page = 'company';
  }else if($_GET['page'] == 'registration'){
    $page = 'registration';
  }else if($_GET['page'] == 'login'){
    $page = 'login';
  }else{
    $page = '404';
  }
}
?>
