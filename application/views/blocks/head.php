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
  <meta name="description" content="<?= decode_text($desc) ?>" />
  <meta name="keywords" content="<?= $key ?>">
  <meta property="og:locale" content="<?=ucwords($locale)."_".$locale ?>" />
  <meta property="og:image" content="<?= $ogimage ?>" />
  <meta property="og:type" content="Online Tools" />
  <meta property="og:title" content="<?= $title ?>" />
  <meta property="og:site_name" content="<?= $settings['site_title']; ?>" />
  <meta property="og:description" content="<?= decode_text($desc) ?>" />
  <meta property="og:url" content="<?= base_url($_SERVER['REQUEST_URI']) ?>" />
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:description" content="<?= decode_text($desc) ?>" />
  <meta name="twitter:title" content="<?= $title ?>" />
  <meta name="token" content="<?= $token ?>">
  <meta name="device" content="<?= $device ?>">
  <!-- favicon -->
  <link rel="apple-touch-icon" sizes="57x57" href="/assets/favicon/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="/assets/favicon/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="/assets/favicon/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="/assets/favicon/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="/assets/favicon/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="/assets/favicon/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="/assets/favicon/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="/assets/favicon/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="/assets/favicon/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192"  href="/assets/favicon/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/assets/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="/assets/favicon/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/assets/favicon/favicon-16x16.png">
  <link rel="manifest" href="/assets/favicon/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="/assets/favicon/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">
  <!-- Style -->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" async>
  <link rel="stylesheet" href="/assets/css/style.css?v=<?= time() ?>" async>
  <link rel="stylesheet" href="/assets/css/responsive.css?v=<?= time() ?>" async>
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
  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-7FN1V1MPSQ"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-7FN1V1MPSQ');
  </script>
  <script type="application/ld+json">
  {
    "@context": "https://schema.org/",
    "@type": "WebSite",
    "name": "Case Converter",
    "url": "https://www.onlineconvertcase.com/",
    "potentialAction": {
      "@type": "SearchAction",
      "target": "https://www.onlineconvertcase.com/{search_term_string}",
      "query-input": "required name=search_term_string"
    }
  }
  </script>
  <?php
  if (isset($json_ltd) && is_array($json_ltd) && count($json_ltd)) {
    foreach ($json_ltd as $key => $value) {
      $this->load->view("json-ltd/{$value}");
    }
  }

  ?>
  
</head>