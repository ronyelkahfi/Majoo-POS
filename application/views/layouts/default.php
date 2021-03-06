<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css" />
    
    <title>Majoo Teknologi Indonesia - <?= $title ?></title>
    <?php 
    if(!empty($externalCSS)){
      foreach ($externalCSS as $hrefCSS) {
        echo '<link href="'.$hrefCSS.'" rel="stylesheet">';
      }
    }
    ?>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-success fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">Majoo Teknologi Indonesia</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <?php if(empty($this->session->userdata('isLogin'))){ ?>
            <li class="nav-item">
              <a class="nav-link <?= (!empty($activeMenu)&&$activeMenu=="home") ? 'active' : '' ?>" aria-current="page" href="<?= base_url() ?>">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?= (!empty($activeMenu)&&$activeMenu=="login") ? 'active' : '' ?>" aria-current="page" href="<?= base_url("login") ?>">Login</a>
            </li>
            <?php }else{ ?>
              <li class="nav-item">
              <a class="nav-link <?= (!empty($activeMenu)&&$activeMenu=="category") ? 'active' : '' ?>" href="<?= base_url("category") ?>">Category</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?= (!empty($activeMenu)&&$activeMenu=="product") ? 'active' : '' ?>" href="<?= base_url("product") ?>">Product</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?= (!empty($activeMenu)&&$activeMenu=="customer") ? 'active' : '' ?>" href="#">Customer</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?= (!empty($activeMenu)&&$activeMenu=="supplier") ? 'active' : '' ?>" href="#">Supplier</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?= (!empty($activeMenu)&&$activeMenu=="order") ? 'active' : '' ?>" href="<?= base_url("order/make") ?>">Make Order</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" <?= (!empty($activeMenu)&&$activeMenu=="make_purchase") ? 'active' : '' ?> href="#">Make Purchase</a>
            </li>
            <li class="nav-item">
              <a class="nav-link"  href="<?= base_url("login/logout")?>">Logout</a>
            </li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </nav>
    <?php $CI->load->view($view,$data_content); ?>
    <section class="mb-5 mt-5 pt-5">
      <div class="container-fluid">
        <div class="row d-flex justify-content-center">
              2022 &copy; PT. Majoo Teknologi Indonesia
        </div>
      </div>
    </section>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/48a99d070e.js" crossorigin="anonymous"></script>
    <?php 
    if(!empty($externalJS)){
      foreach ($externalJS as $hrefJS) {
        echo '<script src="'.$hrefJS.'" type="text/javascript"></script>';
      }
    }
    ?>
  </body>
</html>
