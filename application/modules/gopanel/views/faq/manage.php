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
                            <a class="btn btn-outline-success waves-effect waves-light" href="/gopanel/<?=$class ?>/add">
                                <i class="fas fa-plus mr-2"></i> Əlavə et
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

        <input id="datatableOptions" type="hidden" exportColunm = "1,2,3" value="" />
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="" method="GET" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-8 col-sm-12 col-xs-12 form-group">
                                    <label>Səhifə seçin</label>
                                    <select class="form-control" name="page_id">
                                        <option value="">Səhifə seçin</option>
                                        <?php
                                        foreach ($other_groups as $key => $value) {
                                        ?>
                                            <option value="<?= $value['id']; ?>"><?= $value['name']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-4 col-sm-12 col-xs-12 form-group" style="padding-top: 26px;">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light btn-block ">
                                        <i class="fas fa-search"></i> Filterle
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body table-responsive">
                        <table id="datatable" class="table table-bordered table-striped dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th><i class="fas fa-expand-arrows-alt"></i></th>
                                    <th>№</th>
                                    <th>Səhifə</th>
                                    <th>Sual</th>
                                    <th>Cavab</th>
                                    <th>Dil</th>
                                    <th>Əməliyyatlar</th>
                                </tr>
                            </thead>
                            <tbody id="sortable" class="sortableIcon" data-table="<?=$class ?>">
                                <?php
                                    foreach ($manage as $key => $value): 
                                        $editlink = base_url("gopanel/").$class."/edit/?id=".$value['id'];
                                        $copylink = base_url("gopanel/").$class."/copy/?id=".$value['id'];
                                ?>
                                    <tr id="ord-<?=$value['id']?>">
                                        <td class="sort-td"><i class="fas fa-arrows-alt-v"></i></td>
                                        <td><?=$counter++ ?></td>
                                        <td><?=$value['page_name'] ?></td>
                                        <td><?=$value['question']; ?></td>
                                        <td><?=mb_substr(strip_tags($value['answer']), 0,50) ?></td>
                                        <td><?=$value['locale'] ?></td>
                                        <td>
                                            <div class="manage">
                                                <a class="btn btn-info" href="<?=$copylink?>" data-toggle="tooltip" data-placement="top" title="Məlumatı Kopyala" ><i class="fa fa-clone"></i></a>
                                                <a class="btn btn-success" href="<?=$editlink?>" data-toggle="tooltip" data-placement="top" title="Məlumatı Yenilə" ><i class="fas fa-edit"></i></a>
                                                <a class="btn btn-danger delete" href="" unit_id="<?=$value['id']?>" table_name="<?=$table ?>" data-toggle="tooltip" data-placement="top" title="Məlumatı Sil" ><i class="fas fa-trash-alt"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- container-fluid -->
</div>
<!-- content -->