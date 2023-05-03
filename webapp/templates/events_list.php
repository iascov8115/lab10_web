<div class="event_list list">
    <?php foreach ($events as $event) : ?>
    <div class="event">
        <h1 class="event_heading"><?= $event[5] ?></h1>
        <div class="event_body">
            <div class="event_address">Адрес: <?= $event[1] ?></div>
            <div class="event_price">Цена: <span class="amount"><?=$event[7] ?></span> MDL</div>
            <div class="event_date">Дата: <?= $event[3] ?></div>
            <div class="event_time">Время: <?= substr($event[4], 0, -3) ?></div>
            <div class="event_free_spaces">Количество свободных мест: <?= $event[6] ?></div>
        </div>
        <a class="button" href="/record?id=<?=$event[0]?>">Записаться</a>
    </div>
    <?php endforeach; ?>
</div>
