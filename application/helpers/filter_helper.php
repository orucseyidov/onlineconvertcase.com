<?php 

function SqlInjectFilter($str) {
    $str = str_replace("\n",'',$str);
    $str = str_replace("\t",'',$str);
    $str = str_replace("\r",'',$str);
    $str = str_replace("\0",'',$str);
    $str = str_replace("\x0B",'',$str);
    $str = str_replace("'",'',$str);
    $str = str_replace('"','',$str);
    $str = str_replace('\\','',$str);
    // $str = str_replace('/','',$str);
    // $str = str_ireplace (" and ","",$str); 
    $str = str_ireplace ("execute","",$str); 
    $str = str_ireplace ("update","",$str); 
    $str = str_ireplace ("count","",$str); 
    $str = str_ireplace ("chr ","",$str); 
    $str = str_ireplace ("master ","",$str); 
    $str = str_ireplace ("truncate","",$str); 
    $str = str_ireplace ("char ","",$str); 
    $str = str_ireplace ("declare","",$str); 
    $str = str_ireplace ("select","",$str); 
    $str = str_ireplace ("create","",$str); 
    $str = str_ireplace ("delete","",$str); 
    $str = str_ireplace ("insert","",$str); 
    $str = str_ireplace ("union","",$str); 
    $str = str_replace ("\"","",$str); 
    $str = str_replace ('"',"",$str); 
    // $str = str_replace (" ","",$str); 
    $str = str_replace ("$","",$str); 
    // $str = str_ireplace ("or ","",$str); 
    $str = str_replace ("=","",$str); 
    $str = str_replace ("% 20 ","",$str);
    $str = str_replace ("from ","",$str);
    $str = str_replace ("FROM ","",$str);
    $str = str_replace ("* ","",$str);
    $str = str_replace ("<","",$str);
    $str = str_replace (">","",$str);
    $str = str_replace ("php","",$str);
    $str = str_replace ("from","",$str);
    $str = str_replace ("script","",$str);
    $str = str_replace ("<?PHP","",$str);
    $str = str_replace ("<?","",$str);
    $str = str_replace ("?>","",$str);
    $str = str_replace ("{ ","",$str);
    $str = str_replace ("' ","",$str);
    $str = str_replace (" '' ","",$str);
    $str = str_replace ("sqlmap","",$str);
    $str = str_replace ("sql.map","",$str);
    $str = str_replace ("current","",$str);
    $str = str_replace ("-w 1","",$str);
    $str = str_replace ("password","",$str);
    $str = str_replace ("www","",$str);
    $str = str_replace ("http://","",$str);
    $str = str_replace ("http","",$str);
    $str = str_replace (":","",$str);
    $str = str_replace ("www.","",$str);
    // $str = str_replace (".","",$str);
    $str = str_replace ("*","",$str);
    $str = str_replace ("html","",$str);
    $str = str_replace (".html","",$str);
    $str = str_replace ("xml","",$str);
    $str = str_replace ("php","",$str);
    $str = addslashes($str);
    return $str;
}

function trimspaces($str) {
    // $str = str_replace(' ','',$str);
    $str = str_replace("\n",'',$str);
    $str = str_replace("\t",'',$str);
    $str = str_replace("\r",'',$str);
    $str = str_replace("\0",'',$str);
    $str = str_replace("\x0B",'',$str);
    return $str;
}
function cleanStringFromOtherChars($str) {
    $str = str_replace('!','',$str);
    // $str = str_replace('_','',$str);
    $str = str_replace("'",'',$str);
    $str = str_replace('"','',$str);
    $str = str_replace('\\','',$str);
    // $str = str_replace('/','',$str);
    // $str = str_replace('.','',$str);
    $str = str_replace(',','',$str);
    return $str;
}

function tags_filter2($str) {
    $str = str_replace("'<script[^>]*?>.*?</script>'si",'',$str);// Strip out javascript
    $str = str_replace("'<[\/\!]*?[^<>]*?>'si",'',$str);// Strip out html tags
    $str = str_replace("'([\r\n])[\s]+'",'',$str); // Strip out white space
    $str = str_replace("'&(quot #34);'i",'',$str); // Replace html entities
    $str = str_replace("'&(amp #38);'i",'',$str);
    $str = str_replace("'&(amp #38);'i",'',$str);
    $str = str_replace("'&(lt #60);'i",'',$str);
    $str = str_replace("'&(gt #62);'i",'',$str);
    $str = str_replace("'&(nbsp #160);'i",'',$str);
    $str = str_replace("'&(iexcl #161);'i",'',$str);
    $str = str_replace("'&(cent #162);'i",'',$str);
    $str = str_replace("'&(pound #163);'i",'',$str);
    $str = str_replace("'&(copy #169);'i",'',$str);
    $str = str_replace("'&#(\d+);'e",'',$str); // evaluate as php
    $str = str_replace("'",'',$str);
    return $str;
}


function filter($data){
  return SqlInjectFilter(trimspaces(cleanStringFromOtherChars(tags_filter2(strip_tags(trim($data))))));
}


function filter_comma($str){
    $str = str_replace("'",'&#39;',$str);
    $str = str_replace('"','&#34;',$str);
    return $str;
}

?>