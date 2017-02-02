<?php
 
$wgExtensionCredits['parserhook'][] = array(
        'name'                => 'Google Doc Viewer',
        'author'              => 'Changes added by sp spas@work[at]gmail.com',
        'version'             => 'beta',
        'url'                 => 'http://www.mediawiki.org/wiki/Extension:Googledocviewer',
        'description' => 'Allows documents to be embedded on a page and viewed using googles viewers',
);
 
$wgExtensionFunctions[] = 'docviewer';
 
function docviewer()
{
        global $wgParser;
        $wgParser->setHook('doc', 'embedviewer');
}
 
function embedviewer($content, $args)
{
    if (!isset($args['id'])) {
        return '<font color="red">Usage: &lt;doc id=...[ width=...][ height=...][ mode=(view|edit|pub)][ title=...][ site=...] [literal=...] [type=...] /&gt;</font>';
    }
 
        $id      = urlencode($args['id']);
        $mode    = isset($args['mode'])    ? $args['mode']            : 'pub'; // view, pub, or edit
        $title   = isset($args['title'])   ? $args['title']   : '';
        $site    = isset($args['site'])    ? $args['site']    : '';
        $width   = isset($args['width'])   ? $args['width']   : '100%';
        $height  = isset($args['height'])  ? $args['height']  : '100%';
        $literal = isset($args['literal']) ? $args['literal'] : 'a';
        $type    = isset($args['type'])    ? $args['type']    : 'document';
 
        switch ($type) {
        case 'document':
            $html =
                '<table border=0 width="100%">'.
                        '<tr>'.
                                '<th align="left" width="85%">'.
                                        ($title ? '<h2>'.$title.'</h2>' : '').
                                '</th>'.
                                '<th align="right">'.
                                        '<a target="_blank" href="https://docs.google.com/'. $type .'/'. $literal .'/'.$id.'/edit">'.
                                                'Open in new window'.
                                        '</a>'.
                                '</th>'.
                        '</tr>'.
                '</table>'.
                '<iframe src=https://docs.google.com/'.$literal.'/'. $type .'/'.$mode.'?id='.$id.'&embedded=true width='.$width.' height='.$height.'></iframe>';
            break;
        case 'spreadsheet':
            $html =
                '<table border=0 width="100%">'.
                        '<tr>'.
                                '<th align="left" width="85%">'.
                                        ($title ? '<h2>'.$title.'</h2>' : '').
                                '</th>'.
                                '<th align="right">'.
                                        '<a target="_blank" href="https://docs.google.com/'. $type .'/ccc?key='.$id.'">'.
                                                'Open in new window'.
                                        '</a>'.
                                '</th>'.
                        '</tr>'.
                '</table>'.
                '<iframe src="https://docs.google.com/'. $type .'/'.$mode.'?key='.$id.'&single=true&gid=0&output=html&widget=true" width='.$width.' height='.$height.'></iframe>';            
            break;
        default:
            return '<font color="red">Name of document type is not correct!</font>';
            break;
        }
        return $html;
}
?>