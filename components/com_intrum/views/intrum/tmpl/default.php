<?php
defined('_JEXEC') or die('Restricted access');

$pageLink = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
?>

<?php foreach($this->content['list'] as $item): ?>
<?php
    $city = $item['field']['72']['value'] ?? null;
    $date = $item['field']['87'] ?? null;
    $duration = $item['field']['74'] ?? null;
    $from = $item['field']['236'] ?? null;
?>
    <div class="item-block" id="<?= $item['id']; ?>">

        <div class="teaser-info">
            <div class="teaser-head">
                <h2 class="teaser-name"><?= $item['name']; ?></h2>

                <span class="teaser-id"><?= $item['id']; ?></span>

            </div>
            <div class="teaser-list">
                <div class="list-element teaser-to"><span class="name-field">Куда: </span><?= $item['field']['71']['value']; ?><?=  $city ? '/'.$city : ''; ?></div>
                <?php if($date['value']) : ?>
                    <div class="list-element teaser-date"><span class="name-field"><?= $date['name']; ?>: </span><?= $date['value']; ?></div>
                <?php endif; ?>
                <?php if($duration['value']) : ?>
                    <div class="list-element teaser-duration"><span class="name-field"><?= $duration['name']; ?>: </span> <?= $duration['value']; ?></div>
                <?php endif; ?>
                <?php if($from['value']) : ?>
                    <div class="list-element teaser-from"><span class="name-field"><?= $from['name']; ?>: </span><?= $from['value']; ?></div>
                <?php endif ?>
<!--                <div class="list-element link-item"><span class="link-head">Ссылка на тур</span><span class="link-link">http://--><?//= $pageLink . $item['id']; ?><!--</span></div>-->
            </div>
        </div>
        <div class="list-buttons">
            <div class="list-button teaser-price"><span class="price-line"><span class="name-field">Цена: </span> <?= $item['field']['81']['value']; ?> руб.</span></div>
            <a onclick="ipayCheckout({
                    amount:<?= $item['field']['81']['value']; ?>,
                    currency:'RUB',
                    order_number:'',
                    description: '<?= $item['name']; ?>'},
                    function(order) { showSuccessfulPurchase(order) },
                    function(order) { showFailurefulPurchase(order) })"
               class="list-button price-btn detail-price-btn">Оплатить
            </a>
            <a class="list-button item-link send">Отправить заявку</a>
            <a class="list-button item-link more" href="<?php echo JRoute::_('index.php?option=com_intrum&view=item&id=' . $item['id']); ?>" target="_blank">Подробнее</a>
        </div>
        <div class="teaser-image">
            <img src="<?= $item['field']['89']['value'] ?? '/images/no-photo.jpg'; ?>">
        </div>
    </div>
<?php endforeach; ?>

<?php
//echo "<pre>";
//print_r($this->content);
//echo "<pre>";
$uri = JFactory::getURI();
$url = $uri->toString(array('path', 'fragment'));
$currentPage = $this->content['current_page'];
$countPages = ceil($this->content['count'] / $this->content['limit']);

$pervpage = ($currentPage > 1) ? '<a class="pg-button" href="'. $url . '?page=' . ($currentPage - 1) . '"><img src="/images/prev.png"></a><br>' : '';

// Находим две ближайшие станицы с обоих краев, если они есть
$page2left = ($currentPage > 2) ? ' <a href='. $url . '?page='. ($currentPage - 2) .'>'. ($currentPage - 2) .'</a> | ' : '';
$page1left = ($currentPage > 1) ? '<a href='. $url . '?page='. ($currentPage - 1) .'>'. ($currentPage - 1) .'</a> | ' : '';
$page1right = ($currentPage + 1 <= $countPages) ? ' | <a href='. $url . '?page='. ($currentPage + 1) .'>'. ($currentPage + 1) .'</a>' : '';
$page2right = ($currentPage + 2 <= $countPages) ? ' | <a href='. $url . '?page='. ($currentPage + 2) .'>'. ($currentPage + 2) .'</a>' : '';

$nextpage = ($countPages > $currentPage) ? '<a href="'. $url . '?page=' . ($currentPage + 1) . '" class="pg-button"><img src="/images/next.png"></a><br>' : '';

?>
<?php if($countPages > 1) : ?>
<div class="pagination"><?= $pervpage ?><div class="pages"><?= $page2left . $page1left ?><span><?= $currentPage ?></span><?= $page1right.$page2right ?></div><?= $nextpage ?></div>
<?php endif; ?>

