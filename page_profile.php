<?php
session_start();
require "functions.php";
authorization_check();  // Проверка авторизации
$id = $_GET['id'];
is_my_account_edit($id);
require "header.php";
$card=get_users();
foreach ($card as $card_user){
    if ($card_user['id']==$id){
        $username = $card_user['username'];
        $title = $card_user['title'];
        $tel = $card_user['tel'];
        $address = $card_user['address'];
        $email = $card_user['email'];
        $img = $card_user['img'];
    }
}
?>
<main id="js-page-content" role="main" class="page-content mt-3">
    <div class="subheader">
        <h1 class="subheader-title">
            <i class='subheader-icon fal fa-user'></i><?php echo $username;?>
        </h1>
    </div>
    <div class="row">
      <div class="col-lg-6 col-xl-6 m-auto">
            <!-- profile summary -->
            <div class="card mb-g rounded-top">
                <div class="row no-gutters row-grid">
                    <div class="col-12">
                        <div class="d-flex flex-column align-items-center justify-content-center p-4">
                            <img src="img/demo/avatars/<?php echo $img;?>" class="rounded-circle shadow-2 img-thumbnail" alt="">
                            <h5 class="mb-0 fw-700 text-center mt-3">
                                <?php echo $username;?>
                                <small class="text-muted mb-0"><?php echo $title;?></small>
                            </h5>
                            <div class="mt-4 text-center demo">
                                <a href="javascript:void(0);" class="fs-xl" style="color:#C13584">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a href="javascript:void(0);" class="fs-xl" style="color:#4680C2">
                                    <i class="fab fa-vk"></i>
                                </a>
                                <a href="javascript:void(0);" class="fs-xl" style="color:#0088cc">
                                    <i class="fab fa-telegram"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="p-3 text-center">
                            <a href="tel:+13174562564" class="mt-1 d-block fs-sm fw-400 text-dark">
                                <i class="fas fa-mobile-alt text-muted mr-2"></i><?php echo $tel;?></a>
                            <a href="mailto:<?php echo $email;?>" class="mt-1 d-block fs-sm fw-400 text-dark">
                                <i class="fas fa-mouse-pointer text-muted mr-2"></i><?php echo $email;?></a>
                            <address class="fs-sm fw-400 mt-4 text-muted">
                                <i class="fas fa-map-pin mr-2"></i><?php echo $address;?>
                            </address>
                        </div>
                    </div>
                </div>
            </div>
       </div>
    </div>
</main>
<?php require "footer.php";?>