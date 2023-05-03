<?php if (isset($event_record['er_id'])): ?>
<form id="record" class="form-control mt-5 w-50 mx-auto" action="/admin/update?table=event_record&id=<?=$event_record['er_id']?>" method="post">
<?php else: ?>
<form id="record" class="form-control mt-5 w-50 mx-auto" action="/admin/insert?table=event_record" method="post">
<?php endif; ?>
    <h1>Редактирование записи на событие</h1>
    <div class="form_body">
        <div class="form-row">
            <label for="er_date" class="form-label">Дата записи</label>
            <input type="date" required class="form-control" name="er_date" id="er_date" value="<?=$event_record['er_date']?>">
        </div>
        <div class="form-row">
            <label for="de_id" class="form-label">Id события филиала</label>
            <input type="text" required class="form-control" name="de_id" id="de_id" value="<?=$event_record['de_id']?>">
        </div>
        <div class="form-row">
            <label for="child_id" class="form-label">Id ребенка</label>
            <input type="text" required class="form-control" name="child_id" id="child_id" value="<?=$event_record['child_id']?>">
        </div>
    </div>
    <div class="form-row">
        <button type="submit" name="submit" value="ok">Отправить</button>
        <button type="reset">Сбросить</button>
    </div>
</form>
