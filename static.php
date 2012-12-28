<?php
$file = $_GET['file'];
$ext = $_GET['ext'];
$filename = $file.'.'.$ext;

header('Date: ' . gmdate('D, d M Y H:i:s GMT'));
header('Expires: ' . gmdate('D, d M Y H:i:s', strtotime('+ 10 years')) . ' GMT');
header('Last-Modified: ' . gmdate('D, d M Y H:i:s', filemtime($filename)) . ' GMT');
header('Cache-Control: public, max-age=315360000');
header('Pragma: ');

if($ext == 'css')
{
	header('Content-type: text/css; charset=utf-8');
}
elseif($ext == 'js')
{
	header('Content-type: application/x-javascript; charset=utf-8');
}
else
{
	header('Content-type: text/html; charset=utf-8');
}

function make_gzip($source)
{
	if(!headers_sent() && extension_loaded("zlib") && strstr($_SERVER["HTTP_ACCEPT_ENCODING"],"gzip"))
	{
		$source = gzencode($source, 9);

		header("Content-Encoding: gzip");
		header("Vary: Accept-Encoding");
		header("Content-Length: ".strlen($source));

		return $source;
	}
}

function html_compress($html)
{
    preg_match_all('!(<(?:code|pre|script).*>[^<]+</(?:code|pre|script)>)!',$html,$pre);
    $html = preg_replace('!<(?:code|pre).*>[^<]+</(?:code|pre)>!', '#pre#', $html);
    $html = preg_replace('#<!–[^\[].+–>#', '', $html);
    $html = preg_replace('/[\r\n\t]+/', ' ', $html);
    $html = preg_replace('/>[\s]+</', '><', $html);
    $html = preg_replace('/[\s]+/', ' ', $html);
    
    if(!empty($pre[0]))
    {
        foreach ($pre[0] as $tag)
        {
            $html = preg_replace('!#pre#!', $tag, $html,1);
        }
    }
    
    return $html;
}

if(file_exists($file.'.'.$ext))
{
    //if($ext == 'html')
    //{
	//    echo make_gzip(html_compress(file_get_contents($file.'.'.$ext)));
    //}
    //else
    //{
    	echo make_gzip(file_get_contents($file.'.'.$ext));
    //}
}

?>