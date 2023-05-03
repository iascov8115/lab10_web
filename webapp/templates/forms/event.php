<?php if (isset($event['event_id'])): ?>
<form id="record" class="form-control mt-5 w-50 mx-auto" action="/admin/update?table=event&id=<?=$event['event_id']?>" method="post">
<?php else: ?>
<form id="record" class="form-control mt-5 w-50 mx-auto" action="/admin/insert?table=event" method="post">
<?php endif; ?>
    <h1>Редактирование События</h1>
    <div class="form_body">
        <div class="form-row">
            <label for="event_name" class="form-label">Название события</label>
            <input type="text" required class="form-control" name="event_name" value="<?=$event['event_name']?>" id="event_name">
        </div>
        <div class="form-row">
            <label for="manager_id" class="form-label">Id менеджера</label>
            <input type="text" required class="form-control" name="manager_id" id="manager_id" value="<?=$event['manager_id']?>">
        </div>
        <div class="form-row">
            <label for="available_places" class="form-label">Количество мест</label>
            <input type="text" required class="form-control" name="available_places" id="available_places" value="<?=$event['available_places']?>">
        </div>
        <div class="form-row">
            <label for="event_price" class="form-label">Цена</label>
            <input type="text" required class="form-control" name="event_price" id="event_price" value="<?=$event['event_price']?>">
        </div>
    </div>
    <div class="form-row">
        <button type="submit" name="submit" value="ok">Отправить</button>
        <button type="reset">Сбросить</button>
    </div>
</form>
