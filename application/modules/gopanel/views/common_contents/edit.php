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
                            <a class="btn btn-outline-success waves-effect waves-light" href="/gopanel/<?=$class ?>/manage">
                                <i class="fas fa-list-ol mr-2"></i> Bütün Siyahı
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="?id=<?=$id ?>" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                    <label>Başlıq</label>
                                    <input type="text" name="title" class="form-control" value="<?=$values['title']; ?>" >
                                </div>
                                
                                <div class="col-md-3 col-sm-12 col-xs-12 form-group">
                                    <label>Dil seçin</label>
                                    <select class="form-control" name="locale">
                                        <?php
                                            foreach($languages as $key => $value){
                                            $select = ($value['locale'] == $values['locale']) ? "selected" : "";
                                        ?>
                                            <option value="<?= $value['locale']; ?>" <?= $select; ?>><?= $value['locale']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                
                                <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                    <label>Haqqında</label>
                                    <textarea class="form-control ckeditor" rows="5" name="description" ><?=$values['description']; ?></textarea>
                                </div>

                                <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                    <label>Başlıq (SEO)</label>
                                    <input type="text" name="seo_title" class="form-control" value="<?=$values['seo_title']; ?>">
                                </div>


                                <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                    <label>Məlumat (SEO)</label>
                                    <textarea class="form-control ckeditor" rows="5" name="seo_description"><?=$values['seo_description']; ?></textarea>
                                </div>
                                                  
                                <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                    <label>Açar sözlər</label>
                                    <input type="text" name="keywords" class="form-control tags" value="<?=$values['keywords']; ?>">
                                </div>
                                
                                <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                    <label>Link <small>Linkyoxdursa boş saxlaya bilərsiz</small></label>
                                    <input type="text" name="slug" class="form-control" placeholder="Nümunə : <?=base_url() ?>" value="<?=$values['slug']; ?>">
                                </div>

                                <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                    <label>Şəkli</label>
                                    <small class="pull-right imgnotfiy">Ölçü 804 x 400</small>
                                    <input type="file" name="image" class="filestyle" data-buttonname="btn-secondary" data-buttonText="Şəkil Seçin" data-classIcon="fas fa-file-import" data-buttonBefore="false">
                                    <?php if (!is_null($values['image'])): ?>
                                        <a class="imgarea" target="_blank" href="<?=$values['image']; ?>">
                                            <img style="max-width: 250px;" src="<?=base_url($values['image']) ?>">
                                        </a>
                                    <?php endif ?>
                                </div>

                                <div class="hidden-inputs">
                                    <input type="hidden" name="token" value="<?=$token ?>">
                                </div>
                                
                                <div class="col-md-12"><hr></div>
                                <div class="col-md-12 col-sm-12 col-xs-12 form-group mb-0">
                                    <div class="pull-right">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light mr-1 ">
                                           <i class="fas fa-save"></i> Yadda saxla
                                        </button>
                                        <button type="reset" class="btn btn-secondary waves-effect ">
                                           <i class="fas fa-times" ></i> Təmizlə
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- container-fluid -->
</div>
<!-- content -->