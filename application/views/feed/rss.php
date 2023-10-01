<?='<?xml version="1.0" encoding="UTF-8"?>' ?>
<rss version="2.0">
	<channel>
		<title><?=$title ?></title>
		<link><?=base_url() ?></link>
		<description><?=$desc ?></description>
		<ttl>60</ttl>
<?php 
    foreach ($services as $key => $value):
        $title      = preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $value['title']);
?>
        <item>
            <title><?=$title ?></title>
            <image>
                <url><?=base_url($value['image']) ?></url>
            </image>
            <language>az</language>
            <link><?=base_url($value['slug']) ?></link>
            <description><![CDATA[<?=$value['description'] ?>]]></description>
            <pubDate><?=date("Y-m-d H:i:s") ?></pubDate>
            <guid isPermaLink="true">
                <?=base_url($value['slug']) ?>
            </guid>
        </item>
<?php 
    endforeach; 
    if ($productstatus == 1):
    foreach ($products as $key => $value):
        $title      = preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $value['title']);
?>
        <item>
            <title><?=$title ?></title>
            <image>
                <url><?=base_url($value['image']) ?></url>
            </image>
            <language>az</language>
            <link><?=base_url($value['slug']) ?></link>
            <description><![CDATA[<?=$value['description'] ?>]]></description>
            <pubDate><?=date("Y-m-d H:i:s") ?></pubDate>
            <guid isPermaLink="true">
                <?=base_url("product/".$value['slug']) ?>
            </guid>
        </item>
<?php 
    endforeach;
    endif;
    foreach ($blog as $key => $value):
        $title      = preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $value['title']);
?>
        <item>
            <title><?=$title ?></title>
            <image>
                <url><?=base_url($value['image']) ?></url>
            </image>
            <language>az</language>
            <link><?=base_url($value['slug']) ?></link>
            <description><![CDATA[<?=$value['description'] ?>]]></description>
            <pubDate><?=$value['date'].date(" H:i:s") ?></pubDate>
            <guid isPermaLink="true">
                <?=base_url("blog/".$value['slug']) ?>
            </guid>
        </item>
<?php endforeach ?>
	</channel>
</rss>