
<?php
require_once("dompdf/dompdf_config.inc.php");

$html =
 '<html><body style="font-family: sans-serif; font-size: 150%; background-color:#096; ">'.
  '<p>Hello World!</p>'.
  '<img src="pdf_files/img_2.png" style="margin-top: 39px; margin-left: 384px; -webkit-transform: rotate(-90deg) scale(.68,.68); 
    -moz-transform:rotate(-90deg) scale(.58,.58);
    zoom: 58%;
    filter: progid:DXImageTransform.Microsoft.BasicImage(Rotation=3);
	 -ms-transform:rotate(-90deg);
        -o-transform:rotate(-90deg);
        transform:rotate(-90deg);  ">'.
  '</body></html>';
//$html="<div class='ui-droppable' id='design'><img style='top: 39px; left: 151px; transform: rotate(90deg) scale(1, 1);' class='ui-draggable item' src='pdf_files/img_2.png'><img style='top: 123px; left: 353px;' class='ui-draggable item' src='pdf_files/img_3.png'></div>";

$dompdf = new DOMPDF();
$dompdf->load_html($html);
$dompdf->render();
$dompdf->stream("sample.pdf", array("Attachment" => 0));

?>
