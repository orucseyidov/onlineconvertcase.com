<script type="application/ld+json">
{
  "@context": "https://schema.org/", 
  "@type": "BreadcrumbList", 
  "itemListElement": [{
    "@type": "ListItem", 
    "position": 1, 
    "name": "Home",
    "item": "<?=base_url() ?>"  
  },{
    "@type": "ListItem", 
    "position": 2, 
    "name": "<?=$breadcrumbTitle ?? $title ?>",
    "item": "<?=base_url($this->uri->segment(2)) ?>"  
  }]
}
</script>