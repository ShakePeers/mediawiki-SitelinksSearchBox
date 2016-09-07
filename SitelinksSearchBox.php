<?php
/**
 * SitelinksSearchBox
 * Provide Sitelinks Search Box to Google.
 *
 * PHP version 5.4
 *
 * @category Extension
 *
 * @author   Pierre Rudloff <contact@rudloff.pro>
 * @license  GPL http://www.gnu.org/licenses/gpl.html
 *
 * @link     https://github.com/ShakePeers/mediawiki-SitelinksSearchBox
 * */
$wgExtensionCredits['validextensionclass'][] = [
   'name'   => 'SitelinksSearchBox',
   'author' => 'ShakePeers',
   'url'    => 'http://shakepeers.org/',
];

/**
 * Add JSON-LD to head.
 *
 * @param OutputPage $out HTML page
 *
 * @return void
 * */
function sitelinksSearchBox(&$out)
{
    global $wgScriptPath, $wgServer;
    $out->addHeadItem(
        'SitelinksSearchBox',
        '<script type="application/ld+json">
        {
           "@context": "http://schema.org",
           "@type": "WebSite",
           "url": "'.$wgServer.$wgScriptPath.'",
           "potentialAction": {
             "@type": "SearchAction",
             "target": "'.$wgServer.$wgScriptPath.'/index.php?search={search}",
             "query-input": "required name=search"
           }
        }
        </script>'
    );
}

$wgHooks['BeforePageDisplay'][] = 'sitelinksSearchBox';
