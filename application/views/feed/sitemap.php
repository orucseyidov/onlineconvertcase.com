<?='<?xml version="1.0" encoding="UTF-8"?>' ?>
<!-- <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd" xmlns:xhtml="http://www.w3.org/1999/xhtml" > -->
<urlset
    xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
    xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd
    http://www.w3.org/1999/xhtml http://www.w3.org/2002/08/xhtml/xhtml1-strict.xsd"
    xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
    xmlns:xhtml="http://www.w3.org/1999/xhtml"   
>
	<url>
	  <loc><?=base_url() ?></loc>
	  <lastmod><?= date("Y-m-d") ?></lastmod>
	  <changefreq>daily</changefreq>
	  <priority>1.00</priority>
	</url>
	<?php foreach ($languages as $key => $value): ?>
		<url>
		  <loc><?=base_url($value['locale']) ?></loc>
		  <!-- <xhtml:link rel="alternate" hreflang="<?=$value['locale'] ?>" href="<?=base_url($value['locale']) ?>" /> -->
		  <lastmod><?= date("Y-m-d") ?></lastmod>
		  <changefreq>daily</changefreq>
		  <priority>1.00</priority>
		</url>
	<?php endforeach ?>
	<?php foreach ($menu as $key => $value): ?>
		<url>
		  <loc><?=base_url($value['locale']."/".$value['slug']) ?></loc>
		  <lastmod><?= date("Y-m-d") ?></lastmod>
		  <changefreq>daily</changefreq>
		  <priority>1.00</priority>
		</url>
	<?php endforeach ?>
	<?php foreach ($pages as $key => $value): ?>
		<url>
		  <loc><?=base_url($value['locale']."/".$value['slug']) ?></loc>
		  <lastmod><?= date("Y-m-d") ?></lastmod>
		  <changefreq>daily</changefreq>
		  <priority>1.00</priority>
		</url>
	<?php endforeach ?>
	<?php foreach ($seo_pages as $key => $value): ?>
		<url>
		  <loc><?=base_url($value['locale']."/".$value['slug']) ?></loc>
		  <lastmod><?= date("Y-m-d") ?></lastmod>
		  <changefreq>daily</changefreq>
		  <priority>1.00</priority>
		</url>
	<?php endforeach ?>

</urlset>
