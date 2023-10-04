<section id="about">
  <div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-12 about-title-block">
            <h3 class="about-title"><?=lang('home_about_blocks_title') ?></h3>
        </div>
        <?php foreach ($home_about_blocks as $key => $value): ?>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 about-block">
              <div class="card">
                <div class="card-body">
                  <h2 class="card-title"><?=$value['title'] ?></h2>
                  <p class="card-text"><?=$value['description'] ?></p>
                </div>
              </div>
            </div>
        <?php endforeach ?>
    </div>
  </div>
</section>