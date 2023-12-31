<section id="about">
  <div class="container-fluid">
    <div class="row">
        <!-- <div class="col-12 about-title-block">
            <h3 class="about-title">About Convert case</h3>
        </div> -->
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 about-block">
          <div class="card">
            <div class="card-body">
              <h2 class="card-title"><?=$tool['seo_title'] ?></h2>
              <div class="card-text">
                <?=$tool['seo_description'] ?>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 about-block">
          <div>
            <div class="accordion">
              <?php foreach ($faq as $key => $value): $counter++; ?>
                <div class="card card-sm px-4 py-3 border border-light rounded mb-4">
                    <div data-target="#panel-<?=$value['id'] ?>" class="accordion-panel-header icon-title" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="panel-<?=$value['id'] ?>">
                      <span class="h6 mb-0"><?=$value['question'] ?></span> 
                      <span class="icon"><i class="fas fa-angle-down"></i></span>
                    </div>
                    <div class="collapse <?=$counter == 1 ? 'show' : '' ?>" id="panel-<?=$value['id'] ?>">
                        <div class="accordion-content">
                            <?=$value['answer'] ?>
                        </div>
                    </div>
                </div>
              <?php endforeach ?>
              <div class="row mt-5 mt-lg-6">
                  <div class="col text-center">
                    <a href="<?=base_url("faq") ?>" class="btn btn-primary">
                      <span class="mr-2"><i class="fas fa-question-circle"></i></span> See all FAQ
                    </a>
                  </div>
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>
</section>
<?php $this->load->view("inc/otherInfromation"); ?>