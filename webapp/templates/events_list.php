<div class="table">
    <div class="row">
        <div class="event-name cell">Событые</div>
        <div class="event-address cell">Адрес</div>
        <div class="event-price cell">Цена</div>
        <div class="event-manager cell">Пиши нам</div>
        <div class="event-action cell">Записаться</div>
    </div>
    <?php
    foreach ($events as $event) { ?>
    <div class="row">
        <div class="event-name cell"><?= $event[0] ?></div>
        <div class="event-address cell"><?= $event[1] ?></div>
        <div class="event-price cell"><?= $event[2] . 'MDL' ?></div>
        <div class="event-manager cell"><?= $event[3] ?></div>
        <div class="event-action cell"><a href="/record?id=<?=$event[4]?>"><img src="../static/images/record.png" alt="Записаться"></a></div>
    </div>
    <?php } ?>
</div>
