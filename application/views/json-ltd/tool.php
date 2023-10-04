<script type="application/ld+json">
{
  "@context": "https://schema.org/", 
  "@type": "HowTo", 
  "name": "<?=$tool['title'] ?>",
  "description": "<?=$tool['description'] ?>",
  <?php if (!is_null($tool['image'])): ?>
    "image": "<?=base_url($tool['image']) ?>",
  <?php 
      endif;
  if (isset($other_tool_json) && is_array($other_tool_json) && count($other_tool_json)): ?>
    "tool": [
      <?php 
      $tool_line = '';
      foreach ($other_tool_json as $key => $value): 
        $tool_line .= '{"@type": "HowToTool","name": "'.$value['title'].'"},';  
      endforeach; 
      echo rtrim(rtrim($tool_line,','),"}");
      ?>
    ],
  <?php endif ?>
  "aggregateRating": {
    "@type": "AggregateRating",
    "ratingValue": "4.5",
    "bestRating": "5",
    "worstRating": "1",
    "ratingCount": "85"
  }    
}
</script>