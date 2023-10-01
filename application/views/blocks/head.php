<!doctype html>
<html lang="<?=$locale ?>">

<head>
  <base href="<?= base_url() ?>">
  <!-- Required meta tags -->
  <meta http-equiv="content-language" content="<?=$locale ?>">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?= $title ?></title>
  <meta name="robots" content="index, follow">
  <meta name="title" content="<?= $title ?>" />
  <meta name="description" content="<?= $desc ?>" />
  <meta name="keywords" content="<?= $key ?>">
  <meta property="og:locale" content="<?=ucwords($locale)."_".$locale ?>" />
  <meta property="og:image" content="<?= base_url($ogimage) ?>" />
  <meta property="og:type" content="Online Tools" />
  <meta property="og:title" content="<?= $title ?>" />
  <meta property="og:site_name" content="<?= $settings['site_title']; ?>" />
  <meta property="og:description" content="<?= $desc ?>" />
  <meta property="og:url" content="<?= base_url($_SERVER['REQUEST_URI']) ?>" />
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:description" content="<?= $desc ?>" />
  <meta name="twitter:title" content="<?= $title ?>" />
  <meta name="token" content="<?= $token ?>">
  <meta name="device" content="<?= $device ?>">
  <!-- Style -->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="/assets/css/style.css?v=<?= time() ?>">
  <link rel="stylesheet" href="/assets/css/responsive.css?v=<?= time() ?>">
  <!--Style css and-->
  <!-- <link rel="pingback" href="<?=base_url("pingback") ?>" /> -->
  <link rel="canonical" href="<?=current_url() ?>" />
  <?php 
  foreach ($languages as $key => $value):
    if ($locale != $value['locale']) {
  ?>
        <link rel="alternate" href="<?= get_lang_url($locale, $value['locale']) ?>" hreflang="<?=$value['locale'] ?>" />
  <?php 
    }
  endforeach;
  if (!empty($headdata)) {
    echo $headdata;
  }
  if (!empty($loadstyle)) {
    $this->load->view($loadstyle);
  }
  ?>
  
</head>