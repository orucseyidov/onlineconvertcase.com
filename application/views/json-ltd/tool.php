<script type="application/ld+json">
{
  "@context": "https://schema.org/", 
  "@type": "HowTo", 
  "name": "<?=$tool['title'] ?>",
  "description": "<?=decode_text($tool['description']) ?>",
  <?php if (!is_null($tool['image'])): ?>
    "image": "<?=base_url($tool['image']) ?>",
  <?php endif; ?>
  "supply": {
    "@type": "HowToSupply",
    "name": "onlineconvertcase.com"
  },
  <?php if (isset($other_tool_json) && is_array($other_tool_json) && count($other_tool_json)): ?>
    "tool": [
      <?php 
      $tool_line = '';
      foreach ($other_tool_json as $key => $value): 
        $tool_line .= '{"@type": "HowToTool","name": "'.$value['title'].'"},';  
      endforeach; 
      echo rtrim($tool_line,',');
      ?>
    ],
  <?php endif ?>
  "step": [{
    "@type": "HowToStep",
    "text": "Copy your text to the clipboard",
    "image": "https://onlineconvertcase.com//assets/steps/step1.png",
    "name": "copytext",
    "url": "https://onlineconvertcase.com/"
  },{
    "@type": "HowToStep",
    "text": "Paste the text you copied into the text box",
    "image": "https://onlineconvertcase.com/assets/steps/step2.png",
    "name": "paste text",
    "url": "https://onlineconvertcase.com/"
  },{
    "@type": "HowToStep",
    "text": "Then convert this text to the case you want.",
    "image": "https://onlineconvertcase.com/assets/steps/step3.png",
    "name": "Convert your text",
    "url": "https://onlineconvertcase.com/"
  },{
    "@type": "HowToStep",
    "text": "Then copy this text to your clipboard",
    "image": "https://onlineconvertcase.com/assets/steps/step4.png",
    "name": "paste text",
    "url": "https://onlineconvertcase.com/"
  },{
    "@type": "HowToStep",
    "text": "Or download this text as file",
    "image": "https://onlineconvertcase.com//assets/steps/step5.png",
    "name": "paste text",
    "url": "https://onlineconvertcase.com/"
  }],    
  "aggregateRating": {
    "@type": "AggregateRating",
    "ratingValue": "4.5",
    "bestRating": "5",
    "worstRating": "1",
    "ratingCount": "85"
  }    
}
</script>