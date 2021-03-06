<?php
/*
 * Created on 25 Feb 2009
 *
 */
require_once(__DIR__ . '/../main/loader.php');
 
class SitemapLocationsWebPage extends WebPage {
	function __construct(){
		$this->setContentType("text/xml");
		parent::__construct();
		

		$this->show();		
	}
	function show($html=""){
		WebPage::show($this->getSitemap());
	}
	function getSitemap(){
		$l=new Location();
		$ls=$l->getAll();
		
		$out='<?xml version="1.0" encoding="utf-8"?>';
		$out.='<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

		foreach($ls as $l){
			$link = htmlspecialchars(Config::$telefoanesite."/index.php?action=viewprefixbylocation&id=".$l->id);		
			$pubDate = "2014-07-06";
			$out.='<url>';
			$out.='<loc>'.$link.'</loc>';
			$out.='<lastmod>'.$pubDate.'</lastmod>';
			$out.='</url>';
		}
		$out.='</urlset>';
		return $out;
	}
}
$n=new SitemapLocationsWebPage();

?>
