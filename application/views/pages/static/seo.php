<?php $this->load->view("blocks/breadcrumb") ?>
<section class="static-page">
  <div class="container">
      <div class="row">
        <?php if (isset($page['image']) && !is_null($page['image']) && !empty($page['image'])): ?>
          <div class="col-12 static-page-image">
            <img src="<?=base_url($page['image']) ?>" alt="<?=$page['meta_title'] ?>">
          </div>
        <?php endif ?>
        <div class="col-12 static-page-title text-center">
          <h1><?=$page['title'] ?></h1>
        </div>
        <div class="col-12 static-page-text">
          <?=$page['description'] ?>
        </div>
      </div>
  </div>
</section>
<?php
if (isset($other_tools) && is_array($other_tools) && count($other_tools)) {
  $this->load->view("home/otherTools");
}
?>