<section id="otherTools">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
          <div class="other-tool-title">
            <span class="about-title">Similar tools</span>
          </div>
      </div>
        <div class="col-12 other-tool-col">
          <div class="other-tool-links" itemscope itemtype="http://www.schema.org/SiteNavigationElement">
            <?php 
                foreach ($other_tools_by_group as $key => $value):
                  if ($this->uri->segment(1) == $value['slug']) {
                    continue;
                  }
            ?>
              <a itemprop="url" class="other-link-btn" href="<?=base_url($value['slug']) ?>/">
                <h3 itemprop="name" <?= strlen($value['title']) > 21 ? 'class="mini"' : NULL; ?> ><?=$value['title'] ?></h3>
              </a>
            <?php endforeach ?>
          </div>
        </div>
    </div>
  </div>
</section>