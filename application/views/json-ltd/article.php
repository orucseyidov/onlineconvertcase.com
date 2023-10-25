<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Article",
  "headline": "<?=$page['title'] ?>",
  "articleBody": "<?=$page['meta_description'] ?>",
  "image": [
    "<?=base_url($page['image']) ?>"
   ],
  "datePublished": "<?=$page['created_at'] ?>",
  "dateModified": "<?=date('Y-m-d H:i:s') ?>",
  "author": [{
      "@type": "Organization",
      "name": "Convert Case",
      "url": "<?=base_url()?>"
    }],
  "publisher":
  {
    "name": "<?=$settings['site_title']?>",
    "url": "<?=base_url()?>"
  },
}
</script>