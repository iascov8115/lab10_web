<?php if (isset($department_event['de_id'])): ?>
<form id="record" class="form-control mt-5 w-50 mx-auto" action="/admin/update?table=department_event&id=<?=$department_event['de_id']?>" method="post">
<?php else: ?>
<form id="record" class="form-control mt-5 w-50 mx-auto" action="/admin/insert?table=department_event" method="post">
<?php endif; ?>
    <h1>Редактирование события филиала</h1>
    <div class="form_body">
        <div class="form-row">
            <label for="de_date" class="form-label">Дата события</label>
            <input type="date" required class="form-control" name="de_date" id="de_date" value="<?=$department_event['de_date']?>">
        </div>
        <div class="form-row">
            <label for="de_time" class="form-label">Время события</label>
            <input type="time" required class="form-control" name="de_time" id="de_time" value="<?=$department_event['de_time']?>">
        </div>
        <div class="form-row">
            <label for="department_id" class="form-label">Id филиала</label>
            <input type="text" required class="form-control" name="department_id" id="department_id" value="<?=$department_event['department_id']?>">
        </div>
        <div class="form-row">
            <label for="event_id" class="form-label">Id события</label>
            <input type="text" required class="form-control" name="event_id" id="event_id" value="<?=$department_event['event_id']?>">
        </div>
    </div>
    <div class="form-row">
        <button type="submit" name="submit" value="ok">Отправить</button>
        <button type="reset">Сбросить</button>
    </div>
</form>
