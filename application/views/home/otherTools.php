<section id="otherTools">
  <div class="container-fluid">
    <div class="row">
      <?php foreach ($other_tools as $key => $value): ?>
        <div class="col-12 other-tool-col">
          <div class="other-tool-title">
            <span class="about-title"><?=$value['title'] ?></span>
          </div>
          <div class="other-tool-links" itemscope itemtype="http://www.schema.org/SiteNavigationElement">
            <?php 
              if(isset($value['tools']) && is_array($value['tools'])):
                foreach ($value['tools'] as $toolsKey => $toolsValue):
                  if (isset($tool['slug']) && $toolsValue['slug'] == $this->uri->segment(1)) {
                    continue;
                  }
            ?>
              <a itemprop="url" class="other-link-btn" href="<?=base_url($toolsValue['slug']) ?>">
                <h2 itemprop="name"><?=$toolsValue['title'] ?></h2>
              </a>
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