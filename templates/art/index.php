<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.protostar
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/** @var JDocumentHtml $this */

$app  = JFactory::getApplication();
$user = JFactory::getUser();

// Output as HTML5
$this->setHtml5(true);

// Getting params from template
$params = $app->getTemplate(true)->params;

// Detecting Active Variables
$option   = $app->input->getCmd('option', '');
$view     = $app->input->getCmd('view', '');
$layout   = $app->input->getCmd('layout', '');
$task     = $app->input->getCmd('task', '');
$itemid   = $app->input->getCmd('Itemid', '');
$sitename = $app->get('sitename');

if ($task === 'edit' || $layout === 'form')
{
	$fullWidth = 1;
}
else
{
	$fullWidth = 0;
}

// Add JavaScript Frameworks
JHtml::_('bootstrap.framework');

// Add template js
JHtml::_('script', 'template.js', array('version' => 'auto', 'relative' => true));

// Add html5 shiv
JHtml::_('script', 'jui/html5.js', array('version' => 'auto', 'relative' => true, 'conditional' => 'lt IE 9'));

// Add Stylesheets
JHtml::_('stylesheet', 'template.css', array('version' => 'auto', 'relative' => true));

// Check for a custom CSS file
JHtml::_('stylesheet', 'custom.css', array('version' => 'auto', 'relative' => true));
JHtml::_('stylesheet', 'mobile.css', array('version' => 'auto', 'relative' => true));

// Check for a custom js file
JHtml::_('script', 'bootstrap.js', array('version' => 'auto', 'relative' => true));
JHtml::_('script', 'custom.js', array('version' => 'auto', 'relative' => true));

// Load optional RTL Bootstrap CSS
JHtml::_('bootstrap.loadCss', false, $this->direction);

// Adjusting content width
if ($this->countModules('position-7') && $this->countModules('position-8'))
{
	$span = 'span6';
}
elseif ($this->countModules('position-7') && !$this->countModules('position-8'))
{
	$span = 'span9';
}
elseif (!$this->countModules('position-7') && $this->countModules('position-8'))
{
	$span = 'span9';
}
else
{
	$span = 'span12';
}

?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700,800&amp;subset=cyrillic,cyrillic-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700&amp;subset=cyrillic" rel="stylesheet">
	<jdoc:include type="head" />
    <script src="https://3dsec.sberbank.ru/demopayment/docsite/assets/js/ipay.js"></script>
    <link href="https://3dsec.sberbank.ru/demopayment/docsite/assets/css/modal.css" rel="stylesheet">
    <script type="text/javascript">
        var ipay = new IPAY({
            api_token : "4ovfgbmjlenv98eq6bj16f0skg"
        });
    </script>
</head>
<body class="site <?php echo $option
	. ' view-' . $view
	. ($layout ? ' layout-' . $layout : ' no-layout')
	. ($task ? ' task-' . $task : ' no-task')
	. ($itemid ? ' itemid-' . $itemid : '')
	. ($params->get('fluidContainer') ? ' fluid' : '');
	echo ($this->direction === 'rtl' ? ' rtl' : '');
?>">
	<!-- Body -->
	<div class="body" id="top">
        <?php if ($this->countModules('position-1')) : ?>
            <nav class="navigation" role="navigation">
                <div class="nav-collapse">
                    <jdoc:include type="modules" name="position-1" style="none" />
                </div>
            </nav>
		<header class="header" role="banner">
            <div class="header-inner clearfix">
                <a class="logo" href="<?php echo $this->baseurl; ?>/">
                    <img src="/images/logo.png" alt="">
                </a>
                <div class="social">
                    <a href="https://vk.com/turyizsamari" target="_blank"><img src="/images/vk.png" alt=""></a>
                    <a href="https://ok.ru/group/43637870100566" target="_blank"><img src="/images/odnkl.png" alt=""></a>
                    <a href="https://twitter.com/turyizsamari" target="_blank"><img src="/images/twit.png" alt=""></a>
                    <a href="https://www.facebook.com/turyizsamari" target="_blank"><img src="/images/fb.png" alt=""></a>
                </div>
<!--                <div class="grafik">-->
<!--                    <span class="graf-head">график работы:</span>-->
<!--                    <span class="graf-day">пн-пт</span> 10:00-19:00<br>-->
<!--                    <span class="graf-day">суб.</span> 10:00-17:00-->
<!--                </div>-->
                <div class="adresses">
                    <p>д. Шостаковича <span class="graf-day">7</span></p>
                    <p>ул. Аминева <span class="graf-day">33</span></p>
                </div>
                <div class="phones">
                    <div class="tel"><span>8 (846) </span>333-78-77<br> <span>8 (846) </span>200-17-17</div>
<!--                    <div class="mail">3337877@mail.ru</div>-->
                </div>
                <a class="call" href="tel:88463337877"></a>
            </div>
        </header>

			<?php endif; ?>
			<jdoc:include type="modules" name="banner" style="xhtml" />
		<div class="page-content container<?php echo ($params->get('fluidContainer') ? '-fluid' : ''); ?>">
			<!-- Header -->
			<div class="row-fluid">
				<?php if ($this->countModules('position-8')) : ?>
					<!-- Begin Sidebar -->
					<div id="sidebar" class="span3 sidebar1">
                        <div class="left-open">
                            <div class="krug-open">
                                <img class="sidebar-arrow" src="/images/right-arrow.png">
                            </div>
                        </div>
						<div class="sidebar-nav scroll-block">
							<jdoc:include type="modules" name="position-8" style="xhtml" />
						</div>
					</div>
					<!-- End Sidebar -->
				<?php endif; ?>
				<main id="content" role="main" class="<?php echo $span; ?>">

                    <!-- Begin Content -->
                    <jdoc:include type="modules" name="position-3" style="xhtml" />
                    <jdoc:include type="message" />
                    <jdoc:include type="component" />
                    <jdoc:include type="modules" name="position-2" style="none" />
                    <!-- End Content -->
                </main>
                <?php if ($this->countModules('position-7')) : ?>
                    <div id="aside" class="span3">
                        <!-- Begin Right Sidebar -->
                        <jdoc:include type="modules" name="position-7" style="well" />
                        <!-- End Right Sidebar -->
                    </div>
                <?php endif; ?>
            </div>
            <div class="p-form pay-form">
                <img class="close-img" src="/images/close-img.png" alt="">
                <div class="form-block">
                    <p class="form-head">Заявка на тур <span id="tourName"></span></p>
                    <form id="application" action="/send.php" method="POST" name="application">
                        <input name="name" maxlength="40" placeholder="Ваше имя" required="" type="text">
                        <input name="tel" maxlength="40" placeholder="Ваш телефон" required="" type="tel" pattern="(\+?\d[- .]*){7,13}">
                        <input type="hidden" id="itemLink" name="item-link" value="">
                        <input type="hidden" name="page-link" value="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>">
                        <button class="send-button" type="submit" form="application">Отправить заявку</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
	<!-- Footer -->
	<div class="foot" id="foot">
        <div class="on-footer">
            <div class="on-footer-in">
               <jdoc:include type="modules" name="footer" style="none" /> 
            </div>
        </div>
        <footer class="footer" role="contentinfo">
            <div class="container">
				<span class="copyright">
					&copy; <?php echo date('Y'); ?> <?php echo $sitename; ?>
				</span>
                <span class="developer">
					<a href="https://vsproger.ru" title="Разработчик сайта" target="_blank">Разработчик сайта</a> - <img src="/images/vs.png" alt="VS">
				</span>
            </div>
        </footer>
    </div>
	<jdoc:include type="modules" name="debug" style="none" />

    <link rel="stylesheet" type="text/css" href="//auth.intrumnet.com/css/external/consult/base.css" /><script type="text/javascript" src="//auth.intrumnet.com/storage/externalscripts/consult/utf-8/2/main.js"></script>
</body>
</html>
