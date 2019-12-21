<?php 
    session_start();
    include("connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aom Shop</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="">Aomm Shop</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="#">หน้าหลัก</a></li>
                    <li><a href="#">เกี่ยวกับ</a></li>
                    <li><a href="#">ติดต่อ</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"role="button"aria-haspopup="true"aria-expanded="false">
                        <i class="glyphicon glyphicon-user"></i>
                            สินค้า <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="index.php?cat=notebook">NOTEBOOK</a></li>
                            <li><a href="index.php?cat=storage">STORAGE</a></li>
                            <li><a href="index.php?cat=cpu">CPU</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                <?php 
                    if(isset($_SESSION['id'])){
                ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"role="button"aria-haspopup="true"aria-expanded="false">
                        <i class="glyphicon glyphicon-user"></i>
                            ยินดีต้อนรับ <?php echo $_SESSION ['name']?> <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#">โปรไฟล์</a></li>
                            <li><a href="#">รายการสั่งซื้อ</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="logout.php">ออกจากระบบ</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <i class="glyphicon glyphicon-shopping-cart"></i>(0)
                        </a>
                    </li>
                    <?php 
                    }
                    else{
                    ?>
                    <li><a href="login.php">เข้าสู่ระบบ</a></li>
                    <li><a href="#">สมัครสมาชิก</a></li>
                    <?php 
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
                    <div class="jumbotron">
                        <h1>Aomm Shop</h1>
                        <p class="lead">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatem quis nemo iure architecto libero doloremque nisi nulla, tempore non necessitatibus.</p>
                    </div>
                    <div class="container">
           <div class = "row">
           <?php
              if(isset($_GET['cat'])){
                  $menu = $_GET['cat'];
              }
              else{
                  $menu="";
              }
              switch($menu){
                  case "notebook":{
                      $page = "product";
                      $id = "notebook";
                      break;
                  }
                  case "storage":{
                      $page = "product2";
                      $id = "storage";
                      break;
                  }
                  case "cpu":{
                      $page = "product3";
                      $id = "cpu";
                      break;
                  }
                  default:{
                      $page = "product";
                      $id = "notebook";
                  }
              }
                $sql = "SELECT * FROM $page ORDER By id";
                $result = $conn->query($sql);
                if(!$result){
                    echo "Error during data retrieval";
                }
                else{
                    while($prd=$result->fetch_object()){
                        
                ?> 
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <div class="thumbnail">
                <a href="productdetail.php?pid=<?php echo $prd->id;?>&cat=<?php echo $id;?>">
                    <img src="pig/<?php echo $prd->picture?> " alt="">
                    </a>
                    <div class="caption">
                    <h3><?php echo $prd->name?></h3>
                        <p><?php echo $prd->description?></p>
                        <p>
                        <strong>Price: <?php echo $prd->price?>
                        </strong>
                        </p>
                            <a href="#" class="btn btn-success">Read more</a>
                            <a href="editproduct.php?pid=<?php echo $prd->id?>" class="btn btn-warning">
                                <i class="glyphicon glyphicon-pencil"></i>Edit

                            <a href="deleteproduct.php?pid=<?php echo $prd->id?>" class="btn btn-danger" id="lnkDelete">
                                <i class="glyphicon glyphicon-trash"></i>Edit
                                
                            </a>
                         </p>
                    </div>
                </div>
           </div>  
                <?php
                     }
                }
                ?>

    </div>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
    $(document).ready(function(){
        $("#lnkDelete").click(function(){
            if(confirm("Confirm delete")){
                return true;
            }else{
                return false;
            }
            //alert("55555");
            //return false;

        });
    });    
    </script>
</body>
</html>