<?php if (isset($department['department_id'])): ?>
<form id="record" class="form-control mt-5 w-50 mx-auto"
      action="/admin/update?table=department&id=<?= $department['department_id'] ?>" method="post">
<?php else: ?>
<form id="record" class="form-control mt-5 w-50 mx-auto" action="/admin/insert?table=department" method="post">
<?php endif; ?>
        <h1>Редактирование филиала</h1>
        <div class="form_body">
            <div class="form-row">
                <label for="department_phone" class="form-label">Телефон филиала</label>
                <input type="text" required class="form-control" name="department_phone" id="department_phone"
                       value="<?= $department['department_phone'] ?>">
            </div>
            <div class="form-row">
                <label for="department_address" class="form-label">Адресс филиала</label>
                <input type="text" required class="form-control" name="department_address" id="department_address"
                       value="<?= $department['department_address'] ?>">
            </div>
        </div>
        <div class="form-row">
            <button type="submit" name="submit" value="ok">Отправить</button>
            <button type="reset">Сбросить</button>
        </div>
    </form>
