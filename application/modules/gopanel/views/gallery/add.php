<!-- Start content -->
<div class="content">
    <div class="container-fluid">
        <div class="page-title-box">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h4 class="page-title"><?=$btitle ?></h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?=base_url("gopanel") ?>">Əsas Panel</a></li>
                        <li class="breadcrumb-item"><a href="<?=base_url("gopanel/".$class) ?>/manage"><?=$btitle ?></a></li>
                        <li class="breadcrumb-item active"><?=$bactive ?></li>
                    </ol>
                </div>
                <div class="col-sm-6">
                    <div class="float-right d-none d-md-block">
                        <div class="dropdown">
                            <a class="btn btn-outline-success waves-effect waves-light" href="<?=base_url("gopanel/{$table}/manage/?parent={$parent}&section={$section}&size={$size}") ?>">
                                <i class="fas fa-list-ol mr-2"></i> Bütün Şəkillər
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
        <div class="row">
         <div class="col-12">
            <div class="card">
               <div class="card-body">
                  <h4 class="mt-0 header-title">Fayl yüklə</h4>
                  <p class="text-muted m-b-30">Fayl yükləmək üçün klik edin və ya fayılları sürüşdürüb buraxın.</p>
                  <?php if (!empty($size)): ?>
                    <p class="text-muted m-b-30">
                      Şəkillərin ölçüsü <span class="imgnotfiy"><?=$size ?></span> olmalıdır
                    </p>
                  <?php endif ?>
                  <div class="m-b-30">
                     <form action="<?=base_url("/gopanel/{$class}/upload/") ?>" class="dropzone">
                        <div class="fallback"><input name="file" type="file" multiple="multiple"></div>
                        <input type="hidden" name="token" value="<?=$token ?>">
                        <input type="hidden" name="parent" value="<?=$parent ?>">
                        <input type="hidden" name="section" value="<?=$section ?>">
                     </form>
                  </div>
               </div>
            </div>
         </div>
         <!-- end col -->
        </div>
    </div>
    <!-- container-fluid -->
</div>
<!-- content -->