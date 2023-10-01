<section id="otherTools">
  <div class="container-fluid">
    <div class="row">
      <?php foreach ($other_tools as $key => $value): ?>
        <div class="col-12 other-tool-col">
          <div class="other-tool-title">
            <h3><?=$value['title'] ?></h3>
          </div>
          <div class="other-tool-links">
            <?php 
              if(isset($value['tools']) && is_array($value['tools'])):
                foreach ($value['tools'] as $toolsKey => $toolsValue):
            ?>
              <a class="other-link-btn" href="<?=base_url("en/{$toolsValue['slug']}") ?>"><?=$toolsValue['title'] ?></a>
            <?php 
                endforeach;
              endif;
            ?>
          </div>
        </div>
      <?php endforeach ?>
    </div>
  </div>
</section>