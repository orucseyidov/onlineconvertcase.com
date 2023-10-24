<section id="about">
  <div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-12 about-title-block">
            <span class="about-title"><?=lang('home_about_blocks_title') ?></span>
        </div>
        <?php foreach ($home_about_blocks as $key => $value): ?>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 about-block">
              <div class="card">
                <div class="card-body">
                  <h3 class="card-title"><?=$value['title'] ?></h3>
                  <p class="card-text"><?=$value['description'] ?></p>
                </div>
              </div>
            </div>
        <?php endforeach ?>
    </div>
  </div>
</section>