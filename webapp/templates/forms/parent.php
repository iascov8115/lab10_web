<?php if (isset($parent['parent_id'])): ?>
<form id="record" class="form-control mt-5 w-50 mx-auto" action="/admin/update?table=parent&id=<?=$parent['parent_id']?>" method="post">
<?php else: ?>
<form id="record" class="form-control mt-5 w-50 mx-auto" action="/admin/insert?table=parent" method="post">
<?php endif; ?>
    <h1>Редактирование родителя</h1>
    <div class="form_body">
        <div class="form-row">
            <label for="parent_name" class="form-label">Имя фамилия родителя</label>
            <input type="text" required class="form-control" name="parent_name" id="parent_name" value="<?=$parent['parent_name']?>">
        </div>
        <div class="form-row">
            <label for="parent_email" class="form-label">E-mail родителя</label>
            <input type="text" required class="form-control" name="parent_email" id="parent_email" value="<?=$parent['parent_email']?>">
        </div>
    </div>
    <div class="form-row">
        <button type="submit" name="submit" value="ok">Отправить</button>
        <button type="reset">Сбросить</button>
    </div>
</form>
