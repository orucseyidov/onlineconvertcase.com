<?php $this->load->view("blocks/breadcrumb") ?>
<section class="static-page">
  <div class="container">
      <div class="row">
        <div class="col-12 static-page-title text-center">
          <h1><?=$page['title'] ?></h1>
        </div>
        <div class="col-12 about-text">
          <?=$page['description'] ?>
        </div>
      </div>
  </div>
</section>