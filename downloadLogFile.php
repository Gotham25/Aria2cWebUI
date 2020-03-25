<?php

require_once("Utils.php");

$logFileName = $_GET['logFileName'];
$fileType = $_GET['fileType'];

if (!isset($logFileName) && !isset($fileType)) {
    die('Invalid invocation of file');
}

$contentType = getContentTypeFromFileType($fileType);

$filename = "$logFileName.$fileType";

$absoluteFilePath = getcwd();
$tmp1=getcwd();
$tmp2="";
if ($logFileName != "aria2c") {
    $absoluteFilePath .= (DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "downloads");
    $tmp2=(DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "downloads");
}
$absoluteFilePath .= (DIRECTORY_SEPARATOR . $filename);
$tmp3 = (DIRECTORY_SEPARATOR . $filename);

$absoluteFilePath = realpath($absoluteFilePath);

echo "<br />absoluteFilePath: $absoluteFilePath<br />filename: $filename<br />logFileName: $logFileName<br />fileType: $fileType<br />";
echo "<br />tmp1: $tmp1<br />tmp2: $tmp2<br />tmp3: $tmp3<br />";

// // http headers for log file downloads
// header("Pragma: public");
// header("Expires: 0");
// header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
// header("Cache-Control: public");
// header("Content-Description: File Transfer");
// header("Content-type: $contentType");
// header("Content-Disposition: attachment; filename=\"" . $filename . "\"");
// header("Content-Transfer-Encoding: binary");
// header("Content-Length: " . filesize($absoluteFilePath));

// ob_end_flush();
// @readfile($absoluteFilePath);

?>