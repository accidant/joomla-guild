<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tjoussen
 * Date: 26.07.13
 * Time: 22:49
 * To change this template use File | Settings | File Templates.
 */
defined('_JEXEC') or die("Restricted Access");
?>
<!DOCTYPE html>
<html>
    <head>
        <jdoc:include type="head" />
        <link rel="stylesheet" href="templates/system/css/system.css" type="text/css" />
        <link rel="stylesheet" href="templates/system/css/general.css" type="text/css" />
        <link rel="stylesheet" href="templates/<?php echo $this->template ?>/css/template.css" type="text/css" />
        <link rel="shortcut icon" href="images/favicon.ico" />
    </head>
    <body>
        <div id="topbar">
            <jdoc:include type="modules" name="wow-toolbar" style="none" />
        </div>
        <div id="wrapper">
            <div id="header">
                <div id="logo">
                    <img src="templates/<?php echo $this->template ?>/images/Logo.png" alt="Der schmale Grat" />
                </div>
            </div>
            <div id="navigation">
                <jdoc:include type="modules" name="wow-nav" style="none" />
            </div>
            <div id="content">
                <div id="left">
                    <jdoc:include type="message" />
                    <jdoc:include type="component" />
                </div>
                <div id="right">
                    <jdoc:include type="modules" name="wow-right" style="none" />
                </div>

            </div>
        </div>
    </body>
</html>