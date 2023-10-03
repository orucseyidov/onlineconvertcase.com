<section id="breadcrumb">
  <div class="page_header_default style_one ">
    <div class="parallax_cover">
       <img src="/assets/img/page-header-default-2.jpg" alt="bg_image" class="cover-parallax">
    </div>
    <div class="page_header_content">
       <div class="auto-container">
          <div class="row">
             <div class="col-md-12">
                <div class="banner_title_inner">
                   <div class="title_page">
                      <?=$breadcrumbTitle ?? $title ?>
                   </div>
                </div>
             </div>
             <div class="col-lg-12">
                <div class="breadcrumbs creote">
                   <ul class="breadcrumb m-auto">
                      <li><a href="/"><?=lang("home") ?></a> </li>
                      <li class="active"><?=$breadcrumbTitle ?? $title ?></li>
                   </ul>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>
</section>