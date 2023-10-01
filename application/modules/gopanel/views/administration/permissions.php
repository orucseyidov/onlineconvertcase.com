<!-- Start content -->
<div class="content">
    <div class="container-fluid">
        <div class="page-title-box">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h4 class="page-title"><?=$btitle ?></h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?=base_url() ?>">Əsas Panel</a></li>
                        <li class="breadcrumb-item"><a href="<?=base_url($table) ?>/manage"><?=$btitle ?></a></li>
                        <li class="breadcrumb-item active"><?=$bactive ?></li>
                    </ol>
                </div>
                <div class="col-sm-6">
                    <div class="float-right d-none d-md-block">
                        <div class="dropdown">
                            <a class="btn btn-outline-success waves-effect waves-light" href="<?=base_url($table) ?>/manage">
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
                        <form action="" method="POST" enctype="multipart/form-data" id="permissionsForm" >
                            <div class="row">
                                <div class="table table-responsive company_and_departnets">
                                    <table class="table table-bordered mb-0 p-table">
                                        <thead>
                                            <tr class="tcompan">
                                                <th colspan="5">Bütün Bölmələr</th>
                                                <th class="w50 text-center">
                                                    <label class="switch">
                                                        <input 
                                                        class="all_permissions" 
                                                        name="all"
                                                        type="checkbox"
                                                        checked
                                                        >
                                                        <span class="slider round"></span>
                                                    </label>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th>#</th>
                                                <th>Bölmə (funksia)</th>
                                                <th class="text-center">Əlavə et</th>
                                                <th class="text-center">Yenilə</th>
                                                <th class="text-center">Oxu</th>
                                                <th class="text-center">Sil</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($conrollorName as $key => $value): ?>
                                            <tr>
                                                <th scope="row"><?=$counter++; ?></th>
                                                <td class="w400"><?=$value['title'] ?></td>
                                                <td class="w50 text-center">
                                                    <label class="switch">
                                                        <input 
                                                        class="permissioninput 
                                                        <?=class_c($permissions,$value['key'],"add"); ?>" 
                                                        name="permissions[<?=$value['key']?>][add]" 
                                                        type="checkbox"
                                                        <?=c_control($permissions,$value['key'],"add"); ?>
                                                        >
                                                        <span class="slider round"></span>
                                                    </label>
                                                </td>
                                                <td class="w50 text-center">
                                                    <label class="switch">
                                                        <input 
                                                        class="permissioninput 
                                                        <?=class_c($permissions,$value['key'],"edit"); ?>"  
                                                        name="permissions[<?=$value['key']?>][edit]" 
                                                        type="checkbox"
                                                        <?=c_control($permissions,$value['key'],"edit"); ?>
                                                        >
                                                        <span class="slider round"></span>
                                                    </label>
                                                </td>
                                                <td class="w50 text-center">
                                                    <label class="switch">
                                                        <input 
                                                        class="permissioninput 
                                                        <?=class_c($permissions,$value['key'],"manage"); ?>" 
                                                        name="permissions[<?=$value['key']?>][manage]" 
                                                        type="checkbox"
                                                        <?=c_control($permissions,$value['key'],"manage"); ?>
                                                        >
                                                        <span class="slider round"></span>
                                                    </label>
                                                </td>
                                                <td class="w50 text-center">
                                                    <label class="switch">
                                                        <input 
                                                        class="permissioninput 
                                                        <?=class_c($permissions,$value['key'],"delete"); ?>"
                                                        name="permissions[<?=$value['key']?>][delete]" 
                                                        type="checkbox"
                                                        <?=c_control($permissions,$value['key'],"delete"); ?>
                                                        >
                                                        <span class="slider round"></span>
                                                    </label>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="hidden-inputs">
                                    <input type="hidden" name="token" value="<?=$token ?>">
                                    <input type="hidden" name="user_id" value="<?=isset($_GET['id']) ? $_GET['id'] : 0; ?>">
                                </div>
                                <!-- <div class="col-md-12 col-sm-12 col-xs-12 form-group mb-0">
                                    <div class="pull-right">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light mr-1 ">
                                           <i class="fas fa-refresh"></i> Məlumatı Yenilə
                                        </button>
                                    </div>
                                </div> -->
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