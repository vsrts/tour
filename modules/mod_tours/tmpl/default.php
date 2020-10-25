<?php
// No direct access
defined('_JEXEC') or die;

$pageLink = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
?>
<div class="home-tours">
    <h1>Новинки туров</h1>
<?php foreach($tours['list'] as $item): ?>
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

<a class="open-all-tours" href="/tury.html">Открыть все туры</a>
</div>

