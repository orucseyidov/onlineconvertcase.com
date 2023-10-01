<?php 

function ordermailcontent($data){
	$html = '';
	if (count($data) > 0) {
		foreach ($data as $key => $value) {
			$price 		= $value['price'];
			$title 		= $value['title'];
			$image 		= base_url($value['image']);
			$slug  		= base_url($value['slug']);
			$parametr 	= $value['param'];
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
		                                  '.$parametr.'
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


?>