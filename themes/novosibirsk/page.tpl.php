<?php
// $Id$
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="<?php print $language->language ?>" xml:lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">
<head>
  <?php print $head ?>
  <title><?php print $head_title ?></title>
  <?php print $styles ?>
<?php  
  if($left == "" && $right == "") print  "<link type=\"text/css\" rel=\"stylesheet\" media=\"all\" href=\"" . base_path() . path_to_theme() . "/1column.css\" />";
  else if($left != "" && $right == "") print  "<link type=\"text/css\" rel=\"stylesheet\" media=\"all\" href=\"" . base_path() . path_to_theme() . "/leftcenter.css\" />";
  else if($left == "" && $right != "") print  "<link type=\"text/css\" rel=\"stylesheet\" media=\"all\" href=\"" . base_path() . path_to_theme() . "/centerright.css\" />";
  else print  "<link type=\"text/css\" rel=\"stylesheet\" media=\"all\" href=\"" . base_path() . path_to_theme() . "/3column.css\" />";
?>

<?php print $scripts ?>
<!--[if IE]><style>
.outer, .wide, h2, .wrapper, .minwidth {height: 0; he\ight: auto; zoom: 1;}
/* rimuove complicazione per Gecko 1.7- */
.left {margin-right: 1px;}
.right {margin-left: 1px;}
#login {width: 178px;}
img, div { behavior: url(<?php print base_path() . path_to_theme(); ?>/iepngfix.htc) }
</style><![endif]-->

<!--[if lt IE 7]><style>
/* previene espansione center */
.incenter {width: 100%;  margin-right: -10000px;  position: relative;}
.center .news2 {margin:0 1px 1px 1px;}
.minwidth {border-left: 904px solid #fff;}
.wrapper {margin-left: -904px; position: relative;}
#topmenu {position:rolevante !important;}
</style><![endif]-->
<?php 
  global $user;
  if($user->uid ==1) {
?>
  
<?php
  }
?>
</head>


<body>
<div id="content"> <!-- высота -->
  <div>  <!-- 3 колонки -->       

  <!--шапка над 3 колонками-->
  <div class="minwidth"><div class="wrapper">

  <div id="header">
    <div id="logo"><a href="/" title=""></a></div>
    <p id="logo-name"><a href="<?php print base_path(); ?>" title="Drupal Россия"><strong>Drupal</strong> Россия</a></p>
    <div id="sub-header">

          <?php 
                                    if (isset($secondary_links)) print theme('links', $secondary_links, array('class' =>'links', 'id' => 'sub-topmenu'))
          /* foreach($secondary_links as $k => $v) {
          #  $lnk = strstr($secondary_links[$k]["href"], "http://") ? $secondary_links[$k]["href"] : base_path() . $secondary_links[$k]["href"];
          #  print  "<a href=\"" . $lnk . "\"  title=\"" . $secondary_links[$k]["title"] . "\">" . $secondary_links[$k]["title"] . "</a>";
          #} */
          ?>

      <?php print $top_block; ?>      
    </div>
    <div id="topmenu">
      <?php 
        foreach($primary_links as $k => $v) {
    
          if ($v['href'] == $_GET['q'] || ($v['href'] == '<front>' && drupal_is_front_page())) {
               $class = ' class="active" ';
          } else {
              $class = '';
          }
          $lnk = strstr($primary_links[$k]["href"], "http://") ? $primary_links[$k]["href"] : base_path() . $primary_links[$k]["href"];
          print  "<a href=\"" . $lnk . "\" $class  title=\"" . $primary_links[$k]["title"] . "\">" . $primary_links[$k]["title"] . "</a>"; 
        }  
        ?>
      </div>
  </div>

  <div class="outer">
    <div class="wrap-cl">
      <div class="center"><?php if ($tabs != "") print  "<div class=\"tabs\">" . $tabs . "</div>"; ?><div class="incenter">

         <!-- новости -->
<?php 
  if ($header_info != "") {
?>
      <div id="mission"><?php print $header_info; ?></div>
<?php 
  }
?>   
        

<?php   
  if ($title != "") print $breadcrumb;
  if ($messages != "") print $messages;  
?>

        <div class="post">
          <?php print $content; ?>
          <?php print $feed_icons; ?>
        </div>


      </div></div> <!-- center div -->
      <div class="left"><div class="inleft"><!-- left div -->

        <div id="left">
          <?php print $left; ?>
        </div>

      </div></div> <!-- left div -->
    </div> <!-- wrap-cl div -->
<?php if($right) { ?>
    <div class="right"><div class="inright">
    
      <div id="right">
          <?php print $right; ?>
      </div>      

    </div></div> <!-- right div -->
<?php } ?>

    <br class="clear" />
  </div> <!-- outer div -->

  <div class="wide bottom"></div><!--низ под 3 колонками-->
  </div></div>

  </div> <!-- 3 колонки -->
  <div id="clearfooter"></div>
</div>

<div id="footer">
    <p><?php print $footer_message . $footer;?></p>
</div>
<?php print $closure;?>
</body>
</html>