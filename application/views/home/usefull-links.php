
<section id="usefullLinks">
  <div class="container-fluid">
    <div class="row">
        <div class="col-12 usefullLinks-title">
          <span class="title-section"><?=content("home_usefull_text")['title'] ?></span>
          <p class="title-section-desc"><?=content("home_usefull_text")['desc'] ?></p>
        </div>
        
    </div>
    <div class="swiper usefullLinksCarusel">
      <div class="swiper-wrapper usefull-wrapper">
        <?php foreach($usefull_links as $key => $value): ?>
        <div class="usefull-card about-block swiper-slide">
          <div class="card">
            <div class="card-body">
              <a href="<?=base_url($value['slug']) ?>/" class="card-title"><?=$value['title'] ?></a>
              <p class="card-text"><?=$value['meta_description'] ?></p>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-pagination"></div>
    </div>
  </div>
</section>