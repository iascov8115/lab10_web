<?php if(isset($child['child_id'])): ?>
<form id="record" class="form-control mt-5 w-50 mx-auto" action="/admin/update?table=child&id=<?=$child['child_id']?>" method="post">
<?php else: ?>
    <form id="record" class="form-control mt-5 w-50 mx-auto" action="/admin/insert?table=child" method="post">
<?php endif; ?>
    <h1>Редактирование ребенка</h1>
        <div class="form_body">
        <div class="form-row">
            <label for="child_name" class="form-label">Имя ребенка</label>
            <input type="text" required class="form-control" name="child_name" value="<?=$child['child_name']?>" id="child_name">
        </div>
        <div class="form-row">
            <label for="child_year_of_birth" class="form-label">Год рождения</label>
            <input type="text" required class="form-control" name="child_year_of_birth" id="child_year_of_birth" value="<?=$child['child_year_of_birth']?>">
        </div>
            <div class="form-row">
            <label for="parent_id" class="form-label">Id родителя</label>
            <input type="text" required class="form-control" name="parent_id" id="parent_id" value="<?=$child['parent_id']?>">
        </div>
    </div>
    <div class="form-row">
        <button type="submit" name="submit" value="ok">Отправить</button>
        <button type="reset">Сбросить</button>
    </div>
</form>
