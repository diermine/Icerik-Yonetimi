<?php
/**
 * @subpackage  mod_verticalpopularnews
 *
 * @copyright   Copyright (C) 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;

use Joomla\CMS\Layout\LayoutHelper;

$app	= JFactory::getApplication();
$menu   = $app->getMenu();
$doc = JFactory::getDocument();

$items = $params->get('count');
$limittexttitlearticle = $params->get('limittexttitlearticle', 50);
$patchtoimage = $params->get('patchtoimage');
$articlesimgheight =  $params->get('articlesimgheight');
$artclehitsdateposition = $params->get('artclehitsdateposition');

$modulebackground = $params->get('modulebackground');
$itemspadding = $params->get('itemspadding');
$itemarticlesmargin = $params->get('itemarticlesmargin');
$itemsbackground = $params->get('itemsbackground');
$itemsbackgroundhover  = $params->get('itemsbackgroundhover');
$itemsbackgroundhovertransition = $params->get('itemsbackgroundhovertransition');
$newsboximagefloat = $params->get('newsboximagefloat');
$newsboximagewidth = $params->get('newsboximagewidth');
$newsboximagepadding = $params->get('newsboximagepadding');
$newsboximageborderradius = $params->get('newsboximageborderradius');
$newsboximageobjectfit = $params->get('newsboximageobjectfit');
$newsboximageobjectposition = $params->get('newsboximageobjectposition');
$firstarticletitletextalign = $params->get('firstarticletitletextalign');
$firstarticletitlemargin = $params->get('firstarticletitlemargin');
$firstarticletitlecolor = $params->get('firstarticletitlecolor');
$firstarticletitlecssfontfamily  = $params->get('firstarticletitlecssfontfamily', '"Conv_MinionPro-It"');
$firstarticletitlefontsize = $params->get('firstarticletitlefontsize');
$firstarticletitlelineheight = $params->get('firstarticletitlelineheight');
$firstarticletitlefontweight = $params->get('firstarticletitlefontweight');
$firstarticletitletextdecoration = $params->get('firstarticletitletextdecoration');
$firstarticletitlehovercolor = $params->get('firstarticletitlehovercolor');
$hoveritemtitlecolor  = $params->get('hoveritemtitlecolor');
$hoverfirstarticletitletextdecoration = $params->get('hoverfirstarticletitletextdecoration');
$itemsarticleboxshadow = $params->get('itemsarticleboxshadow');
$itemsarticlehoverboxshadow = $params->get('itemsarticlehoverboxshadow');
$modcss = $params->get('modcss');
$style = '
ul.latestnewsbox'.$module->id.''.$moduleclass_sfx.' {display: block; background: '.$modulebackground.'; width: 100%; margin: auto; padding: '.$itemspadding.' }
.freshnews'.$module->id.' {box-shadow:'.$itemsarticleboxshadow.'; margin: '.$itemarticlesmargin.' !important; background:'.$itemsbackground.'; list-style: none; display: table; width: 100%; transition: all '.$itemsbackgroundhovertransition.'ms ease-in-out;}
.freshnews'.$module->id.':hover {background: '.$itemsbackgroundhover.'; box-shadow:'.$itemsarticlehoverboxshadow.'; transition: all '.$itemsbackgroundhovertransition.'ms ease-in-out; }
.newsbox'.$module->id.' {display: table; width: 100%;}
.newsboximage'.$module->id.' { float: '.$newsboximagefloat.'; }
.imagemorearticle'.$module->id.' img {margin: 0px !important; border: none !important; box-sizing: border-box; padding: '.$newsboximagepadding.'; border-radius: '.$newsboximageborderradius.'; max-width: 100% !important; object-fit: '.$newsboximageobjectfit.'; object-position: '.$newsboximageobjectposition.';}
.firstarticletitle'.$module->id.' { line-height: normal; text-align: '.$firstarticletitletextalign.'; margin: '.$firstarticletitlemargin.';}
.firstarticletitle'.$module->id.' a { color: '.$firstarticletitlecolor.' !important; font-size: '.$firstarticletitlefontsize.' !important; font-weight: '.$firstarticletitlefontweight.' !important; text-decoration: '.$firstarticletitletextdecoration.' !important; line-height: '.$firstarticletitlelineheight.' !important;}
.freshnews'.$module->id.':hover .firstarticletitle'.$module->id.' a:hover { color: '.$firstarticletitlehovercolor.' !important; text-decoration: '.$hoverfirstarticletitletextdecoration.' !important;}
.freshnews'.$module->id.':hover .firstarticletitle'.$module->id.' a {color: '.$hoveritemtitlecolor.' !important; transition: all '.$itemsbackgroundhovertransition.'ms ease-in-out;}
'.$modcss.' 
'; 
$doc->addStyleDeclaration( $style );

// Use of title/autor/hits/tags
 if ($newsboximagefloat == 'none') {
$style = '
.newsboximage'.$module->id.' {display: block; width: 100%;}
.newstitle'.$module->id.' {display: block; width: 100%; padding: 0px 0 10px 0;}

'; 
$doc->addStyleDeclaration( $style );
}
 else {
$style = '
.newsboximage'.$module->id.' {display: table; width: '.$newsboximagewidth.';}
.newstitle'.$module->id.' {display: table; width: calc(100% - '.$newsboximagewidth.');}
'; 
$doc->addStyleDeclaration( $style );
}

// Use of autor article
$firstarticleautoronof = $params->get('firstarticleautoronof');
$firstarticleautorfontweight = $params->get('firstarticleautorfontweight');
$firstarticleautortextalign = $params->get('firstarticleautortextalign');
$firstarticleautorfontsize = $params->get('firstarticleautorfontsize');
$firstarticleautorcolor = $params->get('firstarticleautorcolor');
$firstarticleautormargin = $params->get('firstarticleautormargin');
$firstarticleautorlineheight = $params->get('firstarticleautorlineheight');
$style = '
.firstarticleautor'.$module->id.' {line-height: '.$firstarticleautorlineheight.' !important; margin: '.$firstarticleautormargin.'; font-weight: '.$firstarticleautorfontweight.'; text-align: '.$firstarticleautortextalign.'; font-size: '.$firstarticleautorfontsize.'; color: '.$firstarticleautorcolor.'; }
'; 
$doc->addStyleDeclaration( $style );

// Use of Google Font
if ($params->get('googleFontarticletitle'))
{
	$doc->addStyleSheet('//fonts.googleapis.com/css?family=' . $params->get('firstarticletitlefontfamily'));
	$doc->addStyleDeclaration("
.firstarticletitle".$module->id." a {
		font-family: '" . str_replace('+', ' ', $params->get('firstarticletitlefontfamily')) . "', sans-serif !important;
	}");
}
else {
	$style = '
.firstarticletitle'.$module->id.' a { font-family: '.$firstarticletitlecssfontfamily.' !important; }
'; 
$doc->addStyleDeclaration( $style );	
}

// Start hits dateupdate:
$firstarticledateupdate = $params->get('firstarticledateupdate');
$dateofarticle  = $params->get('dateofarticle');
$firstarticledateformatupdate = $params->get('firstarticledateformatupdate');
$firstarticlehits = $params->get('firstarticlehits');
$firstarticlehitsupdatetexalign = $params->get('firstarticlehitsupdatetexalign');
$firstarticlehitsupdatemargin = $params->get('firstarticlehitsupdatemargin');
$firstarticlehitsupdatefontsize = $params->get('firstarticlehitsupdatefontsize');
$firstarticlehitsupdatecolor = $params->get('firstarticlehitsupdatecolor');
$firstarticledatecreatelineheight = $params->get('firstarticledatecreatelineheight');

$pathtomodule = JURI::base().'modules/'.$module->module;
$iconcontentdateupdate = $params->get('iconcontentdateupdate');
$iconarticlehits = $params->get('iconarticlehits');

$style = '
.firstarticledatecreate'.$module->id.'{line-height: '.$firstarticledatecreatelineheight.' !important; text-align: '.$firstarticlehitsupdatetexalign.'; margin: '.$firstarticlehitsupdatemargin.'; font-size: '.$firstarticlehitsupdatefontsize.'; color: '.$firstarticlehitsupdatecolor.'; }
.dateupdate'.$module->id.'::before { content: '.$iconcontentdateupdate.'('.$pathtomodule.'/img/date.png); padding: 0 5px 0 0; opacity: 0.6; }
.hits'.$module->id.'::before { content: '.$iconarticlehits.'('.$pathtomodule.'/img/hit.png); padding: 0 5px 0 0; opacity: 0.6; }
'; 
$doc->addStyleDeclaration( $style );
// End hits dateupdate:

// Start mobile layout:
$modverticalnewsmobilelayout =  $params->get('modverticalnewsmobilelayout');
$articlesimgheightmobile =  $params->get('articlesimgheightmobile');
$style = '
@media all and (max-width: '.$modverticalnewsmobilelayout.')
{
.newsboximage'.$module->id.' {display: block; float: none; width: 100%;}
.imagemorearticle'.$module->id.' img {margin: 0px !important; border: none !important; box-sizing: border-box; padding: '.$newsboximagepadding.'; min-height: '.$articlesimgheightmobile.';  max-height: '.$articlesimgheightmobile.'; border-radius: 0px;}
.newstitle'.$module->id.' {display: block; width: 100% !important; padding: 0px 0 10px 0;}
}
'; 
$doc->addStyleDeclaration( $style );
// End mobile layout:

// tags
$tagsarticles = $params->get('tagsarticles');
$limitcounttags = $params->get('limitcounttags');
$tagslinktarget = $params->get('tagslinktarget');

$ariclestagsmargin = $params->get('ariclestagsmargin');
$ariclestagsposition = $params->get('ariclestagsposition');
$ariclestagsspancolor = $params->get('ariclestagsspancolor');
$ariclestagscolor = $params->get('ariclestagscolor');
$ariclestagsfontsize = $params->get('ariclestagsfontsize');
$ariclestagslineheight = $params->get('ariclestagslineheight');
$ariclestagscolorhover = $params->get('ariclestagscolorhover');
$ariclestagshoverdecoration = $params->get('ariclestagshoverdecoration');

$style = '
.tags'.$module->id.' {box-sizing: border-box; text-align: '.$ariclestagsposition.'; margin:'.$ariclestagsmargin.'; font-size: '.$ariclestagsfontsize.'; line-height: '.$ariclestagslineheight.';}
.tags'.$module->id.' > span {color: '.$ariclestagsspancolor.' !important; }
.tags'.$module->id.' a {color: '.$ariclestagscolor.' !important; font-size: '.$ariclestagsfontsize.';}
.tags'.$module->id.' a:hover {color: '.$ariclestagscolorhover.' !important; text-decoration: none !important;}
'; 
$doc->addStyleDeclaration( $style );

 if ($params->get('showtagsmobile')) {
$style = '
@media all and (max-width: '.$modverticalnewsmobilelayout.')
{
.tags'.$module->id.' {display: none !important;}
}
'; 
$doc->addStyleDeclaration( $style );
}

// Use of Google Font Title and params module title
$newsmoduletitleonof = $params->get('newsmoduletitleonof');
$newsmoduletitleposition = $params->get('newsmoduletitleposition');
$ourteamtitlebackground = $params->get('ourteamtitlebackground');
$ourteamtitlecolor = $params->get('ourteamtitlecolor', '#000');
$ourteamtitlefontsize = $params->get('ourteamtitlefontsize');
$ourteamtitletextshadow = $params->get('ourteamtitletextshadow');
$ourteamtitleletterspacing = $params->get('ourteamtitleletterspacing');
$ourteamtitlefontweight = $params->get('ourteamtitlefontweight');
$ourteamtitlefontfamilycss = $params->get('ourteamtitlefontfamilycss', ' "Conv_MinionPro-It" ');
$ourteamtitletextalign = $params->get('ourteamtitletextalign');
$ourteamtitlepadding = $params->get('ourteamtitlepadding');
$newsmoduletitlebackground = $params->get('newsmoduletitlebackground', 'transparent');
$ourteamtitlehovercolor = $params->get('ourteamtitlehovercolor');
$ourteamtitletextdecoration = $params->get('ourteamtitletextdecoration');

if ($params->get('googleFont'))
{
	$doc->addStyleSheet('//fonts.googleapis.com/css?family=' . $params->get('ourteamtitlefontfamily'));
	$doc->addStyleDeclaration("
.art-ourteamtitle".$module->id." > .art-newsmoduletitle".$module->id." > h2, .art-ourteamtitle".$module->id." > .art-newsmoduletitle".$module->id." > h2 > a {
		font-family: '" . str_replace('+', ' ', $params->get('ourteamtitlefontfamily')) . "', sans-serif !important;
	}");
}
else 
{
$style = '
.art-ourteamtitle'.$module->id.' > .art-newsmoduletitle'.$module->id.' > h2, .art-ourteamtitle'.$module->id.' > .art-newsmoduletitle'.$module->id.' > h2 > a {font-family: '.$ourteamtitlefontfamilycss.' !important;}
'; 
$doc->addStyleDeclaration( $style );	
}

$style = '
.art-ourteamtitle'.$module->id.' { background: '.$modulebackground.'; display: block !important; left: 0px !important; margin-left: 0px !important; position: relative !important; text-align: '.$ourteamtitletextalign.' !important;  width: 100%; margin: 0px; box-sizing: border-box; }
.art-ourteamtitle'.$module->id.' > .art-newsmoduletitle'.$module->id.' > h2, .art-ourteamtitle'.$module->id.' > .art-newsmoduletitle'.$module->id.' > h2 > a { color: '.$ourteamtitlecolor.' !important; font-size:'.$ourteamtitlefontsize.' !important; text-shadow: '.$ourteamtitletextshadow.'; letter-spacing: '.$ourteamtitleletterspacing.'; font-weight: '.$ourteamtitlefontweight.'; margin: 0 !important; padding: '.$ourteamtitlepadding.' !important; line-height: normal; text-decoration: none;}
.art-newsmoduletitle'.$module->id.' {background: '.$newsmoduletitlebackground.';}
.art-newsmoduletitle'.$module->id.' h2 a:hover {text-decoration: '.$ourteamtitletextdecoration.' !important; color: '.$ourteamtitlehovercolor.' !important;}
'; 
$doc->addStyleDeclaration( $style );

?>

<?php if ( 1 == $newsmoduletitleonof ) : ?>
<?php if ($newsmoduletitleposition == 1): ?>
<?php if ($params->get('linktitleurl')) : ?>
<div class="art-ourteamtitle<?php echo $module->id;?>"><div class="art-newsmoduletitle<?php echo $module->id;?>"><h2><a href="<?php echo $params->get('modtitlelinkurl'); ?>" target="<?php echo $params->get('linkmoreaerticlestarget'); ?>"><?php echo $params->get('ourteamtitle'); ?></a></h2></div art-newsmoduletitle></div>
<?php else : ?>
<div class="art-ourteamtitle<?php echo $module->id;?>"><div class="art-newsmoduletitle<?php echo $module->id;?>"><h2><?php echo $params->get('ourteamtitle'); ?></h2></div art-newsmoduletitle></div>
<?php endif; ?>
<?php endif; ?>
<?php endif; ?>

<ul class="latestnewsbox<?php echo $module->id; ?><?php echo $moduleclass_sfx; ?>">
<?php foreach ($list as $item) :  ?>

<?php
    $images = json_decode($item->images) ; 
	$imagetitle = $item->title;
	$author = $item->created_by_alias ? $item->created_by_alias : $item->author;
?>
  
    <li class="freshnews<?php echo $module->id; ?>">
 
    <div class="newsbox<?php echo $module->id; ?>">

    <div class="newsboximage<?php echo $module->id; ?>">
       <?php if ($patchtoimage == 1) : ?> 
       <div class="imagemorearticle<?php echo $module->id; ?>">   
       <a href="<?php echo $item->link; ?>" target="<?php echo $params->get('linkmoreaerticlestarget'); ?>">
        <img src="<?php echo json_decode($item->images)->image_intro; ?>"   alt="<?php echo htmlspecialchars($images->image_intro_alt); ?>"  title="<?php echo $imagetitle; ?>" style="width:100%; height: <?php echo $params->get('articlesimgheight'); ?>;" />        
        </a>  
        </div imagemorearticle>
        <?php endif; ?>
        
       <?php if ($patchtoimage == 2) : ?> 
       <div class="imagemorearticle<?php echo $module->id; ?>">   
       <a href="<?php echo $item->link; ?>" target="<?php echo $params->get('linkmoreaerticlestarget'); ?>">
        <img src="<?php echo json_decode($item->images)->image_fulltext; ?>"   alt="<?php echo htmlspecialchars($images->image_intro_alt); ?>"  title="<?php echo $imagetitle; ?>" style="width:100%; height: <?php echo $params->get('articlesimgheight'); ?>;" />        
        </a>  
        </div imagemorearticle>
        <?php endif; ?>
        
      <?php if ($patchtoimage == 3) : ?> 
            <?php 
                $matches = null;
                preg_match_all('/<img[^>]+src=([\'"])?((?(1).+?|[^\s>]+))(?(1)\1)/', $item->introtext, $matches);
                if (count($matches[2]) > 0) :
            ?>
                <div class="imagemorearticle<?php echo $module->id; ?>">
                <a href="<?php echo $item->link; ?>" target="<?php echo $params->get('linkmoreaerticlestarget'); ?>">
                    <img src="<?php echo $matches[2][0] ?>" title="<?php echo $imagetitle; ?>" alt="<?php echo $imagetitle; ?>" style="width:100%; height: <?php echo $params->get('articlesimgheight'); ?>;" />
               </a>
                </div imagemorearticle>
            <?php endif; ?>
        <?php endif; ?>
   </div newsboximage>
   
   <div class="newstitle<?php echo $module->id; ?>">
       <div class="firstarticletitle<?php echo $module->id; ?>"> <a href="<?php echo $item->link; ?>" target="<?php echo $params->get('firstarticlebuttontarget'); ?>"><?php if(strlen($item->title) > $limittexttitlearticle) { $item->title = substr($item->title, 0, $limittexttitlearticle)." …";} echo $item->title; ?></a></div firstarticletitle>
      
        <?php if ($firstarticleautoronof == 1): ?>
       <div class="firstarticleautor<?php echo $module->id ;?>"> <?php echo $params->get('firstarticleautortext'); ?> <?php echo JText::sprintf($author); ?></div>
      <?php endif; ?>
     <?php if ($artclehitsdateposition == 1): ?>
  <div class="firstarticledatecreate<?php echo $module->id ;?>"> <?php if ($firstarticlehits == 1) : ?><span class="hits<?php echo $module->id; ?>"><?php echo $item->hits; ?></span>  │<?php endif; ?><?php if ($firstarticledateupdate == 1) : ?><span class="dateupdate<?php echo $module->id; ?>"><?php echo JHtml::_('date', $item->$dateofarticle, JText::_($firstarticledateformatupdate)); ?></span><?php endif; ?></div>
      <?php endif; ?>
      
     <?php if ($tagsarticles == 1): ?>
  <div class="tags<?php echo $module->id ;?>">
  <span><?php echo $params->get('tagsatribute'); ?></span>
 <?php
// set tags
$tags = '';
if (!empty($item->tags->itemTags)) {
    JLoader::register('TagsHelperRoute',JPATH_BASE.'/components/com_tags/helpers/route.php');
    foreach ($item->tags->itemTags as $i => $tag) {
        if (in_array($tag->access,     JAccess::getAuthorisedViewLevels(JFactory::getUser()->get('id')))) {
         if (++$i <= $limitcounttags) $tags .='<a href="'.JRoute::_(TagsHelperRoute::getTagRoute($tag->tag_id.'-'.$tag->alias)).'" target="'.$tagslinktarget.'">'.$tag->title.' | </a>';		   
        }
    }
}
$args['tags'] = $tags;
echo $tags;
?> 
  </div>     
      <?php endif; ?>
      
   </div newstitle>
 
   </div newsbox>
   
     <?php if ($artclehitsdateposition == 2): ?>
  <div class="firstarticledatecreate<?php echo $module->id ;?>"> <?php if ($firstarticlehits == 1) : ?><span class="hits<?php echo $module->id; ?>"><?php echo $item->hits; ?></span>  │<?php endif; ?><?php if ($firstarticledateupdate == 1) : ?><span class="dateupdate<?php echo $module->id; ?>"><?php echo JHtml::_('date', $item->$dateofarticle, JText::_($firstarticledateformatupdate)); ?></span><?php endif; ?></div>
      <?php endif; ?>
   
</li>
<?php endforeach; ?>   
</ul>

<?php if ($items > 3) : ?> 
<?php
echo "You do not have permission to use this module";
?>
<style>
.latestnewsbox<?php echo $module->id; ?><?php echo $moduleclass_sfx; ?> { display: none !important;	}
</style>
        <?php endif; ?>

<?php if ( 1 == $newsmoduletitleonof ) : ?>
<?php if ($newsmoduletitleposition == 2): ?>
<?php if ($params->get('linktitleurl')) : ?>
<div class="art-ourteamtitle<?php echo $module->id;?>"><div class="art-newsmoduletitle<?php echo $module->id;?>"><h2><a href="<?php echo $params->get('modtitlelinkurl'); ?>" target="<?php echo $params->get('linkmoreaerticlestarget'); ?>"><?php echo $params->get('ourteamtitle'); ?></a></h2></div art-newsmoduletitle></div>
<?php else : ?>
<div class="art-ourteamtitle<?php echo $module->id;?>"><div class="art-newsmoduletitle<?php echo $module->id;?>"><h2><?php echo $params->get('ourteamtitle'); ?></h2></div art-newsmoduletitle></div>
<?php endif; ?>
<?php endif; ?>
<?php endif; ?>