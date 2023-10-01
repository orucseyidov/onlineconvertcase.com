<!-- Start content -->
<div class="content">
    <div class="container-fluid">
        <div class="page-title-box">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h4 class="page-title"><?=$btitle ?></h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?=base_url("gopanel") ?>">Əsas Panel</a></li>
                        <li class="breadcrumb-item"><a href="<?=base_url("gopanel/{$class}/{$table}") ?>"><?=$btitle ?></a></li>
                        <li class="breadcrumb-item active"><?=$bactive ?></li>
                    </ol>
                </div>
                <div class="col-sm-6">
                    <div class="float-right d-none d-md-block">
                        <div class="dropdown">

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
                        <form action="/gopanel/<?=$class."/".$table ?>" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                    <label>Saytın Adı</label>
                                    <input type="text" name="site_title" class="form-control" value="<?=$values['site_title'] ?>" required>
                                </div>
                               
                                <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                    <label>Sayt haqqında</label>
                                    <textarea class="form-control" rows="5" name="description"><?=$values['description'] ?></textarea>
                                </div>

                                <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                    <label>Açar sözlər</label>
                                    <input type="text" name="tags" class="form-control tags" value="<?=$values['tags'] ?>" required>
                                </div>

                                <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                    <label>
                                        Saytın statusu
                                        <small>
                                            <?=$values['site_status'] == 1 ? 'Sayt hal hazırda açıqdır' : 'Sayt hal hazırda bağlıdır' ?>
                                        </small>
                                    </label>
                                    <select class="form-control" name="site_status">
                                        <option value="1" <?=s($values['site_status'],1) ?>> Açıq</option>
                                        <option value="0" <?=s($values['site_status'],0) ?>> Bağlı</option>
                                    </select>
                                </div>

                                <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                    <label>Saytın Favikonu</label>
                                    <small class="pull-right imgnotfiy">Ölçü 16 x 16</small>
                                    <input type="file" name="favicon" class="filestyle" data-buttonname="btn-secondary" data-buttonText="Şəkil Seçin" data-classIcon="fas fa-file-import" data-buttonBefore="false">
                                    <a class="imgarea" target="_blank" href="<?=$values['favicon'] ?>">
                                        <img style="max-width: 250px;" src="<?=base_url($values['favicon']) ?>">
                                    </a>
                                </div>

                                <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                    <label>Saytın Logosu</label>
                                    <small class="pull-right imgnotfiy">Ölçü 200 x 60</small>
                                    <input type="file" name="image" class="filestyle" data-buttonname="btn-secondary" data-buttonText="Şəkil Seçin" data-classIcon="fas fa-file-import" data-buttonBefore="false">
                                    <a class="imgarea" target="_blank" href="<?=$values['image'] ?>">
                                        <img style="max-width: 250px;" src="<?=base_url($values['image']) ?>">
                                    </a>
                                </div>

                                <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                    <label>Logono mobile</label>
                                    <small class="pull-right imgnotfiy">Ölçü 100 x 100</small>
                                    <input type="file" name="logo_mobile" class="filestyle" data-buttonname="btn-secondary" data-buttonText="Şəkil Seçin" data-classIcon="fas fa-file-import" data-buttonBefore="false">
                                    <a class="imgarea" target="_blank" href="<?=$values['logo_mobile'] ?>">
                                        <img style="max-width: 250px;" src="<?=base_url($values['logo_mobile']) ?>">
                                    </a>
                                </div>

                                <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                    <label>Og Image</label>
                                    <small class="pull-right imgnotfiy">Ölçü 828 x 498</small>
                                    <input type="file" name="og_image" class="filestyle" data-buttonname="btn-secondary" data-buttonText="Şəkil Seçin" data-classIcon="fas fa-file-import" data-buttonBefore="false">
                                    <a class="imgarea" target="_blank" href="<?=$values['og_image'] ?>">
                                        <img style="max-width: 250px;" src="<?=base_url($values['og_image']) ?>">
                                    </a>
                                </div>

                                <div class="hidden-inputs">
                                    <input type="hidden" name="token" value="<?=$token ?>">
                                </div>
                                
                                <div class="col-md-12 col-sm-12 col-xs-12 form-group mb-0">
                                    <div class="pull-right">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light mr-1 ">
                                           <i class="fas fa-refresh"></i> Yadda saxla
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