<section id="usefullLinks">
  <div class="container-fluid">
    <div class="row">
        <div class="col-12 usefullLinks-title">
          <h4><?=content("home_usefull_text")['title'] ?></h4>
          <?=content("home_usefull_text")['desc'] ?>
        </div>
        <div class="col-12">
          <div class="usefulllinks">
            <div class="usefull-icon">
              <i id="left" class="fas fa-angle-left"></i>
            </div>
            <ul class="usefull-tabs-box">
              <?php foreach ($usefull_links as $key => $value): ?>
                <li class="usefull-tab">
                  <a href="<?=base_url($value['slug']) ?>">
                    <?=$value['title'] ?>
                  </a>
                </li>
              <?php endforeach ?>
            </ul>
            <div class="usefull-icon">
              <i id="right" class="fas fa-angle-right"></i>
            </div>
          </div>
        </div>
    </div>
  </div>
</section>