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
                    <div class="float-right">
                        <div class="dropdown gallery_btn">
                            <?php if (count($gallery) > 0): ?>
                                <input type="checkbox" class="checkAll" name="" title="Hamısını Seç">
                            <?php endif ?>
                            <a class="btn btn-outline-success waves-effect waves-light" href="<?=base_url("/gopanel/{$class}/add/?parent={$parent}&section={$section}&size={$size}") ?>">
                                <i class="fas fa-plus mr-2"></i> Əlavə et
                            </a>
                            <a class="btn btn-outline-danger waves-effect waves-light" id="deleteAll" href="">
                                <i class="fas fa-trash mr-2"></i> Seçilənləri Sil
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
        <div class="row">
        <?php 
        if (count($gallery) > 0){ 
            foreach ($gallery as $key => $value):
              $id       = $value['id'];
              $editlink = base_url("gopanel/{$class}/edit/?id={$id}");
        ?>
         <div class="col-xl-3 col-md-3" id="img_<?=$value['id'] ?>">
            <a href="<?=$value['image'] ?>" class="gallery-popup" title="Open Imagination">
               <div class="project-item">
                  <div class="overlay-container">
                     <img src="<?=$value['image'] ?>" alt="img" class="gallery-thumb-img">
                     <div class="project-item-overlay text-center">
                        <h4 class="text-center">Şəkili böyüt </h4>
                        <p class="text-center">
                            <a href="<?=$editlink ?>" class="g-manage"> <i class="mdi mdi-square-edit-outline"></i> </a>
                            <a href="" unit_id="<?=$id?>" table_name="<?=$table ?>" class="g-manage deleteImg"> <i class="far fa-trash-alt"></i> </a>
                        </p>
                     </div>
                  </div>
                  <input type="checkbox" id="chek_<?=$value['id'] ?>'" name="id[]" class="chekimage" value="<?=$value['id'] ?>">
               </div>
            </a>
         </div>
         <!-- end col -->
        <?php 
            endforeach; 
        }else{
        ?>
            <div class="col-md-12">
                <div class="alert alert-danger mb-0" role="alert">
                    <h4 class="alert-heading font-18">Xəta!</h4>
                    <p>
                       Heç bir şəkil tapılmadı!
                    </p>
                    <p class="mb-0">
                       Siz Bu bölməyə şəkil yükləməmisiniz. Zəhmət olmasa əlavə et düyməsinən yeni şəkil əlavə edin.
                    </p>
                </div>
            </div>
        <?php } ?>
        </div>
        <!-- end row -->
    </div>
    <!-- container-fluid -->
</div>
<!-- content -->

<form id="deleteform" >
   <div class="imageList">
       
   </div>
</form>