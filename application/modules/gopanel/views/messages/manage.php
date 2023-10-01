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
                <!-- <div class="col-sm-6">
                    <div class="float-right d-none d-md-block">
                        <div class="dropdown">
                            <a class="btn btn-outline-success waves-effect waves-light" href="/gopanel/<?=$class ?>/add">
                                <i class="fas fa-plus mr-2"></i> Əlavə et
                            </a>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
        <!-- end row -->

        <input id="datatableOptions" type="hidden" exportColunm = "0,1,2" value="" />

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body table-responsive">
                        <table id="datatable" class="table table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>№</th>
                                    <th>Ad</th>
                                    <th>Email</th>
                                    <th>Mövzu</th>
                                    <th>Mesaj</th>
                                    <th>Əməliyyatlar</th>
                                </tr>
                            </thead>
                            <tbody id="sortable" class="sortableIcon" data-table="<?=$table ?>">
                                <?php
                                    foreach ($manage as $key => $value): 
                                    $details_link = base_url("gopanel/").$class."/details/".$value['id'];
                                    $read_link = base_url("gopanel/").$class."/read/".$value['id'];
                                    $no_read_link = base_url("gopanel/").$class."/no_read/".$value['id'];
                                ?>
                                    <tr id="ord-<?=$value['id']?>">
                                        <td><?=$counter++ ?></td>
                                        <td><?=$value['fullname']; ?></td>
                                        <td><?=$value['email']; ?></td>
                                        <td><?=$value['subject']; ?></td>
                                        <td><?=mb_substr(strip_tags($value['message']), 0,50) ?></td>
                                        <td>
                                            <div class="manage">
                                                <a class="btn btn-success" href="<?=$details_link?>" data-toggle="tooltip" data-placement="top" title="Məlumatı Yenilə" ><i class="fa fa-folder-open"></i></a>
                                                <a class="btn btn-success" href="<?= $value['status'] == 0 ? $read_link : $no_read_link; ?>" data-toggle="tooltip" data-placement="top" title="<?= $value['status'] == 0 ? 'Oxunmuş qeyd et' : 'Oxunmamış qeyd et'; ?>" ><i class="<?= $value['status'] == 0 ? 'far fa-eye-slash' : 'far fa-eye'; ?>"></i></a>
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