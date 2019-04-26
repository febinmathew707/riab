<?php session_start();
@require_once ("config.php");
//$_SESSION[$captcha_session] = "";
$_SESSION['captcha_session']="";

function character_size ($font_file, $character, $size, $angle = 0) 
{
	if (is_file ($font_file) && strlen ($character) == 1 && $size > 0):
		$corners = @imagettfbbox ($size, $angle, $font_file, $character);
		$left = ($corners[0] > $corners[6]) ? $corners[6] : $corners[0];
		$right = ($corners[2] > $corners[4]) ? $corners[2] : $corners[4];
		$top = ($corners[5] > $corners[7]) ? $corners[7] : $corners[5];
		$bottom = ($corners[1] > $corners[3]) ? $corners[1] : $corners[3];
		$width = $right - $left + 4;
		$height = abs ($top - $bottom) + 4;
		$return = array ('width' => $width, 'height' => $height, 'bottom' => $bottom, 'right' => $right, 'top' => $top, 'left' => $left);
		else:
		$return = FALSE;
		endif;
		return $return;
}
function hexadecimal_color ($color) {
	if (substr_count ($color, ',') == 2):
	list ($red, $green, $blue) = array_map ('trim', explode (',', $color));
	else:
	$red = hexdec ($color[0] . $color[1]);
	$green = hexdec ($color[2] . $color[3]);
	$blue = hexdec ($color[4] . $color[5]);
	endif;
	return array ('red' => $red, 'green' => $green, 'blue' => $blue);
}
$image_width = 0;
$image_height = 0;
$code_length = rand ($captcha_minimum_length, $captcha_maximum_length);
for ($c = 1; $c <= $code_length; $c++):
$character[$c]['char'] = $captcha_characters[rand (0, strlen ($captcha_characters) - 1)];
$character[$c]['color'] = hexadecimal_color ($captcha_text_color[rand (0, count ($captcha_text_color) - 1)]);
$character[$c]['displacement'] = rand (0, $captcha_vertical_displacement * 2) - $captcha_vertical_displacement;
$character[$c]['font'] = $captcha_font_folder . $captcha_font_files[rand (0, count ($captcha_font_files) - 1)];
$character[$c]['size'] = rand ($captcha_minimum_size, $captcha_maximum_size);
$character[$c]['angle'] = rand (0, $captcha_rotation_left + $captcha_rotation_right) - $captcha_rotation_right;
$character[$c]['space'] = rand ($captcha_minimum_spacing, $captcha_maximum_spacing);
$properties = character_size ($character[$c]['font'], $character[$c]['char'], $character[$c]['size'], $character[$c]['angle']);
$width = $properties['width'];
$height = $properties['height'];
$image_width += $width;
if ($c != $code_length) $image_width += $character[$c]['space'];
if (($height + abs ($character[$c]['displacement'])) > $image_height) $image_height = $height + abs ($character[$c]['displacement']);
$_SESSION['captcha_session'] .= $character[$c]['char'];
endfor;

$image_width += $captcha_text_padding * 2;
$image_height += $captcha_text_padding * 2 + $captcha_vertical_displacement;
$image = imagecreatetruecolor ($image_width, $image_height);

$background = rand (0, count ($captcha_background_files) - 1);
list ($background_width, $background_height) = getimagesize ($captcha_background_folder . $captcha_background_files[$background]);
$background_width_difference = rand (0, $background_width - $image_width);
$background_height_difference = rand (0, $background_height - $image_height);
$background_image = imagecreatefrompng ($captcha_background_folder . $captcha_background_files[$background]);

imagecopy ($image, $background_image, 0, 0, $background_width_difference, $background_height_difference, $image_width, $image_height);
imagedestroy ($background_image);

$cursor = $captcha_text_padding;
for ($c = 1; $c <= $code_length; $c++):
$color = imagecolorallocate ($image, $character[$c]['color']['red'], $character[$c]['color']['green'], $character[$c]['color']['blue']);
$properties = character_size ($character[$c]['font'], $character[$c]['char'], $character[$c]['size'], $character[$c]['angle']);
$width = $properties['width'];
$height = $properties['height'];
$bottom = $properties['bottom'];
$y = $character[$c]['displacement'] + $captcha_vertical_displacement + $height - $bottom;
imagettftext ($image, $character[$c]['size'], $character[$c]['angle'], $cursor, $y, $color, $character[$c]['font'], $character[$c]['char']);
$cursor += $width + $character[$c]['space'];
endfor;

header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', FALSE);
header('Pragma: no-cache');
header('Content-type: image/png');
imagepng($image);
imagedestroy($image);
?>