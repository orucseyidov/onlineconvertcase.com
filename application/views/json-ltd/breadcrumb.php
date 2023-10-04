<script type="application/ld+json">
{
  "@context": "https://schema.org/", 
  "@type": "BreadcrumbList", 
  "itemListElement": [{
    "@type": "ListItem", 
    "position": 1, 
    "name": "Home",
    "item": "/"  
  },{
    "@type": "ListItem", 
    "position": 2, 
    "name": "<?=breadcrumbTitle ?? $title ?>",
    "item": "<?=$this->uri->segment(2) ?>"  
  }]
}
</script>