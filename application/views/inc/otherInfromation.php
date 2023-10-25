<?php if (isset($other_info) && is_array($other_info) && count($other_info)): ?>
<section id="otherInfromation">
  <div class="container">
    <div class="col-12">
        <?php foreach ($other_info as $key => $value): ?>
        <div class="card">
          <div class="card-body">
            <h4 class="otherInfromationTitle card-title"><?=$value['title'] ?></h4>
            <div class="card-text">
              <?=$value['description'] ?>
            </div>
          </div>
        </div>
        <?php endforeach ?>
    </div>
  </div>
</section>
<?php endif ?>