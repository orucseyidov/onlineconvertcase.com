<?php 



function cart_product_control($postSerialize){
	$cart = $_SESSION['cart'];
	foreach ($cart as $key => $value) {
		$sessionSerialize = serialize(['product'=>(int)$value['product'],'parametr'=>$value['parametr']]);
		if ($sessionSerialize == $postSerialize) {
			return ['product' => $value , 'key' => $key];
		}
	}
	return false;
}



function cartView($cartData,$currency,$cur_code){
	$resultHtml = '';
	$prds 		= $cartData['products'];
	$prms 		= $cartData['parametrs'];
	$totalPrice = 0;
	$totalItem 	= 0;
	foreach ($_SESSION['cart'] as $key => $value) {
		// $price = number_format($value['qty']*$prds[$value['product']]['price'],2).$cur_code[$currency];
		$price = number_format($prds[$value['product']]['price'],2).$cur_code[$currency];

		$totalPrice += ($value['qty'] * $prds[$value['product']]['price']);
		$totalItem  += $value['qty'];

		$image = empty($value['image']) ? $prds[$value['product']]['image'] : $value['image'];

		$resultHtml .= "
		<li class='minicart-item' id='cart_{$key}'>
		    <div class='minicart-thumb'>
		        <a href='/product/{$prds[$value['product']]['slug']}'>
		            <img src='{$image}' alt='product'>
		        </a>
		    </div>
		    <div class='minicart-content'>
		        <h3 class='product-name'>
		            <a href='/product/{$prds[$value['product']]['slug']}'>{$prds[$value['product']]['title']}</a>
		        </h3>
		        <p>
		            <span class='cart-quantity'>{$value['qty']}<strong>&times;</strong></span>
		            <span class='cart-price'>{$price}</span>
		        </p>
		    </div>
		    <button cart='{$key}' class='minicart-remove removeCartItemModal'>
		    	<i class='pe-7s-close'></i>
		    </button>
		</li>
		";
	}
	return ["resultHtml" => $resultHtml, "totalPrice" => $totalPrice , "totalItem" => $totalItem];
}



function ordermailcontent($cartData,$currency,$cur_code){
	$html = '';
	if (isset($_SESSION['cart'])) {
		$prds 		= $cartData['products'];
		$prms 		= $cartData['parametrs'];
		$totalPrice = 0;
		$totalItem 	= 0;
		foreach ($_SESSION['cart'] as $key => $value) {
			// $price = number_format($value['qty']*$prds[$value['product']]['price'],2).$cur_code[$currency];
			$price = number_format($prds[$value['product']]['price'],2).'<span style="font-size:18px">'.$cur_code[$currency].'</span>';

			$totalPrice += ($value['qty'] * $prds[$value['product']]['price']);
			$totalItem  += $value['qty'];

			$title = $prds[$value['product']]['title'];
			$image = empty($value['image']) ? $prds[$value['product']]['image'] : $value['image'];
			$image = base_url($image);
			$slug  = base_url($prds[$value['product']]['slug']);
			$html .= '
				<tr>
		          <td style="border-bottom:8px solid #ffffff" bgcolor="#f5f5f5" valign="top" align="left"><table style="background-color:#f5f5f5;padding-right:10px;padding-left:10px;padding-bottom:10px;padding-top:10px;max-width:350px!important" cellspacing="0" cellpadding="10" align="left" border="0" width="350">
		              <tbody><tr>
		                <td valign="middle" align="center"><table style="background-color:#ffffff" cellspacing="0" cellpadding="0" align="center" bgcolor="#FFFFFF">
		                    <tbody><tr>
		                      <td bgcolor="#FFFFFF" valign="middle" align="center"><table style="border:1px solid #dcdada;background-color:#ffffff" cellspacing="0" cellpadding="0" align="center" border="0" width="105">
		                          <tbody><tr>
		                            <td bgcolor="#FFFFFF" valign="middle" align="center"><a rel="noopener noreferrer" style="width:105px" href="'.$slug.'" target="_blank" data-saferedirecturl="'.$slug.'"><img width="105" alt="trendyol" src="'.$image.'" class="CToWUd"></a></td>
		                          </tr>
		                        </tbody></table></td>
		                    </tr>
		                  </tbody></table></td>
		                <td valign="middle" align="left"><table style="max-width:380px" width="380" cellspacing="0" cellpadding="0" border="0" align="left">
		                    <tbody><tr>
		                      <td valign="bottom" align="left"><table width="350" cellspacing="0" cellpadding="0" align="left">
		                          <tbody><tr>
		                            <td valign="top" align="center"><table style="padding-bottom:10px;padding-top:10px" width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
		                                <tbody><tr>
		                                  <td style="font-family:Tahoma,Helvetica,Arial;font-size:13px;color:#000006;text-align:left;padding-top:5px;line-height:18px" valign="top" align="left">
		                                  	'.$title.'
		                                    <br></td>
		                                </tr>
		                              </tbody></table></td>
		                          </tr>
		                        </tbody></table></td>
		                    </tr>
		                    <tr>
		                      <td valign="middle" align="left"><table style="text-align:left" width="350" cellspacing="0" cellpadding="0" border="0" align="left">
		                          <tbody><tr>
		                            <td style="border-bottom:1px solid #cdcdcd;padding-top:6px" align="left"></td>
		                          </tr>
		                        </tbody></table></td>
		                    </tr>
		                    <tr>
		                      <td valign="top" align="left"><table width="350" cellspacing="0" cellpadding="0" align="left">
		                          <tbody><tr>
		                            <td valign="middle" align="left"><table width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
		                                <tbody><tr>
		                                  <td style="font-family:Tahoma,Arial;font-size:14px;color:#000006;text-align:left;padding-bottom:8px;padding-top:8px" align="left">
		                                  '.param_cart_mail($value,$prms).'
		                                  </td>
		                                </tr>
		                              </tbody></table></td>
		                          </tr>
		                          <tr>
		                            <td valign="middle" align="center"><table width="100%" cellspacing="0" cellpadding="0" border="0" align="left">
		                                <tbody><tr>
		                                  <td style="font-family:Tahoma,Arial;font-size:20px;color:#f26928;text-align:left;vertical-align:middle;padding-bottom:12px" align="left">
		                                  <strong>
		                                  	'.$price.'
		                                  </strong>
		                                  </td>
		                                </tr>
		                              </tbody></table></td>
		                          </tr>
		                        </tbody></table></td>
		                    </tr>
		                  </tbody></table></td>
		              </tr>
		            </tbody>
		            </table>
		            </td>
		        </tr>
			';
		}
	}
	return $html;
}


function param_cart_mail($value,$prms){
	if (is_array($value['parametr'])) {
        foreach ($value['parametr'] as $key1 => $value1) {
            if ($prms[$value1]['type'] == 1) {
                return"<span>{$prms[$value1]['title']}</span>  <br>";
            }
            else{
                return "
                    <span class='cartColor' style='background:{$prms[$value1]['title']}'>&nbsp;
                    </span>
                ";
            }
        }
    }
}









?>