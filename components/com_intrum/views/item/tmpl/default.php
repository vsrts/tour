<?php
    $item=$this->content;
    $city = $item['field']['72']['value'] ?? null;
    $date = $item['field']['87'] ?? null;
    $duration = $item['field']['74'] ?? null;
    $from = $item['field']['236'] ?? null;
    $description = $item['field']['83'] ?? null;
    $publicDate = explode(' ', $item['date_add']) ?? null;

?>

    <div class="item-main">
        <div class="left-block">
            <div class="item-header">
                <h1 class="item-name"><?= $item['name'] ?? null; ?></h1>
                <span class="item-id"><?= $item['id'] ?? null; ?></span>
                <span class="public-date"><?= $publicDate[0]; ?></span>
            </div>
            <div class="item-info">
                <div class="detail-element item-to"><span class="name-field">Куда: </span></span><?= $item['field']['71']['value']; ?><?=  $city ? '/'.$city : ''; ?></div>
                <?php if($date['value']) : ?>
                    <div class="detail-element item-date"><span class="name-field"><?= $date['name']; ?>: </span><?= $date['value']; ?></div>
                <?php endif; ?>
                <?php if($duration['value']) : ?>
                    <div class="detail-element item-duration"><span class="name-field"><?= $duration['name']; ?>: </span> <?= $duration['value']; ?></div>
                <?php endif; ?>
                <?php if($from['value']) : ?>
                    <div class="detail-element item-from"><span class="name-field"><?= $from['name']; ?>: </span><?= $from['value']; ?></div>
                <?php endif ?>
                <!--<div class="item-to"><span class="name-field">Отель: </span><?php echo $hotelName; ?></div>
                <div class="item-to"><span class="name-field">Звёздность: </span><?php echo $stars; ?></div>
                <div class="item-to"><span class="name-field">Питание: </span><?php echo $food; ?></div>-->
            </div>
            <?php if($description['value']) : ?>
                <div class="detail-element item-description"><?= $description['value']; ?></div>
            <?php endif; ?>
        </div>
        <div class="right-block">
            <div class="item-image">
                <img src="<?= $item['field']['89']['value'] ?? '/images/no-photo-detail.jpg'; ?>">
            </div>
    <div class="buy-block">
        <div class="detail-price teaser-price"><span class="price-line"><span class="name-field">Цена: </span><?= $item['field']['81']['value']; ?> руб.</span></div>
        <a onclick="ipayCheckout({
            amount:<?= $item['field']['81']['value']; ?>,
            currency:'RUB',
            order_number:'',
            description: '<?= $item['name']; ?>'},
            function(order) { showSuccessfulPurchase(order) },
            function(order) { showFailurefulPurchase(order) })"
           class="price-btn detail-price-btn">Оплатить
        </a>
    </div>
    </div>
    </div>

<div class="contact-block">
    <img class="send-gif" src="/images/send-us.gif">
    <p>Свяжитесь с нами для получения подробной информации или задайте вопрос по туру</p>
    <a class="list-button item-link detail-link send">Форма для связи</a>
</div>


<?php
//echo "<pre>";
//print_r($this->content);
//echo "</pre>";