<?php $this->load->view("blocks/breadcrumb") ?>
<section class="static-page">
  <div class="container" id="faq">
      <div class="row">
        <div class="col-12 static-page-title text-center">
          <h1>F.A.Q</h1>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
        <div class="col-12">
            <div class="accordion">
                <?php 
                    foreach ($faq as $key => $value):
                ?>
                    <div class="card card-sm px-4 py-3 border border-light rounded mb-4">
                        <div data-target="#panel-<?=$value['id'] ?>" class="accordion-panel-header icon-title" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="panel-<?=$value['id'] ?>">
                            <span class="h6 mb-0"><?=$value['question'] ?></span> 
                            <span class="icon"><i class="fas fa-angle-down"></i></span>
                        </div>
                        <div class="collapse show" id="panel-<?=$value['id'] ?>">
                            <div class="accordion-content">
                                <p><?=$value['answer'] ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
                <!-- <div class="row mt-5 mt-lg-6">
                    <div class="col text-center">
                        <a href="#" class="btn btn-primary"><span class="mr-2"><i class="fas fa-question-circle"></i></span> See all FAQ</a>
                    </div>
                </div> -->
            </div>
        </div>
      </div>
  </div>
</section>