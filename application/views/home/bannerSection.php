<section id="bannerSection">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-9 col-lg-9 col-sm-12 col-xs-12">
        <div class="banner-one">
          <div class="banner-image">
              <div>
                <img alt="onlineconvertcase.com" src="/assets/img/icons/compare.png">
              </div>
          </div>
          <div class="banner-text">
              <div>
                <h1><?=content("home_intro_text")['title'] ?></h1>
                <?=content("home_intro_text")['desc'] ?>
              </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12 m-none">
        <div class="banner-two">
          <div class="banner-two-center">
            <h3><?=content('recommend_tool')['title'] ?></h3>
            <p><?=content('recommend_tool')['desc'] ?></p>
            <button class="default-btn banner-btn" data-toggle="modal" data-target="#recomModal">
              <?=lang('recommendations_btn') ?>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>