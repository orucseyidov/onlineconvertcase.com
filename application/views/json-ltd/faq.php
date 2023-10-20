<?php if (isset($faq) && is_array($faq) && count($faq)): ?>
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [
        
        <?php 
        $faq_line = '';
        foreach ($faq as $key => $value): 
          $faq_line .= '{
                      "@type": "Question",
                      "name": "'.$value['question'].'",
                      "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "'.decode_text($value['answer'],['"']).'"
                        }
                      },';  
        endforeach; 
        echo rtrim($faq_line,',');
        ?>

    ]
  }
  </script>
<?php endif ?>