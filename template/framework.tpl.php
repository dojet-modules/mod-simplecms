<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?=safeHtml($tpl_title)?></title>
    <link href="<?php echo ('/static/mod/simplecms/main.css')?>" rel="stylesheet">
    <link href="<?php echo ('/static/mod/simplecms/bootstrap/css/bootstrap.css')?>" rel="stylesheet">
    <link href="<?php echo ('/static/mod/simplecms/jquery-ui-1.11.0/jquery-ui.min.css')?>" rel="stylesheet">
    <script src="<?php echo ('/static/mod/simplecms/jquery-1.11.1.min.js')?>"></script>
    <script src="<?php echo ('/static/mod/simplecms/jquery-ui-1.11.0/jquery-ui.min.js')?>"></script>
    <script src="<?php echo ('/static/mod/simplecms/bootstrap/js/bootstrap.min.js')?>"></script>
    <script src="<?php echo ('/static/mod/simplecms/jquery.datepick-zh-CN.js')?>"></script>
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }

      .nav-side dl {margin: 0 0 .5em 0;}
      .nav-side dl dt {padding: 0 0 .5em;}
      .nav-side dl dd {padding-left: 1em;}
    </style>
  </head>

  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <span class="navbar-brand">CMS</span>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <p class="navbar-text pull-right">
            Logged in as <a href="<?='/user/edit?uid='.$tpl_userid?>"><?=safeHtml($tpl_fullname)?></a>, <a href="/signout" class="navbar-link">Signout</a>
          </p>
          <ul class="nav navbar-nav">
          <? foreach ($tpl_top_menu as $key => $topMenu) : ?>
          <?php
              $pms = $topMenu['permissions'];
              if (!empty($pms) && !array_intersect($pms, $tpl_permissions)) continue;
              $link = $topMenu['link'];
              $title = $topMenu['title'];
          ?>
            <li<?=$key == $tpl_menu_id ? ' class="active"' : ''?>><a href="<?=$link?>"><?=safeHtml($title)?></a></li>
          <? endforeach ?>
          </ul>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-xs-2">
          <div class="well nav-side">
            <? print_r($tpl_left_menu); ?>
            <? foreach ((array)$tpl_left_menu as $menu) : ?>
            <?  if (!array_intersect($menu['permissions'], $tpl_permissions)) continue; ?>
              <dl class="nav">
                <dt><?=safeHtml($menu['title'])?></dt>
                <? foreach ($menu['link'] as $item) : ?>
                <?  if (!array_intersect($item['permissions'], $tpl_permissions)) {continue;} ?>
                  <dd><a href="<?=$item['link']?>"><?=safeHtml($item['title'])?></a></dd>
                <? endforeach ?>
              </dl>
            <? endforeach; ?>
          </div>
        </div>
        <div class="col-xs-10">
          <div class="ui-corner-all" style="border:solid 1px #ccc; min-height:400px;max-width:1356px;overflow-x:scroll;">
            <h1 class="ui-widget-header ui-corner-top"
            style="border: none; margin:0 0 1em; text-indent: 1em; color:black;font-size: 120%; line-height: 2;"><?=safeHtml($tpl_title)?></h1>
            <div class="container-fluid">
              <div class="row">
                <div class="col-xs-12">
<? include($tpl_page); ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
