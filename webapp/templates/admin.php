<div class="tables_list">
    <div class="buttons">
        <h1 class="active">События</h1>
        <h1>Департаменты</h1>
        <h1>События департамента</h1>
        <h1>Записи на события</h1>
        <h1>Родители</h1>
        <h1>Дети</h1>
    </div>

    <div class="table table_event">
    <div class="row header">
        <div class="cell">Id</div>
        <div class="cell">Название</div>
        <div class="cell">Id менеджера</div>
        <div class="cell">Количество свободных мест</div>
        <div class="cell">Цена</div>
        <div class="cell">Изменение</div>
        <div class="cell">Удаление</div>
    </div>
    <?php foreach ($events as $event) : ?>
        <div class="row">
            <div class="cell"><?= $event[0] ?></div>
            <div class="cell"><?= $event[1] ?></div>
            <div class="cell"><?= $event[2] ?></div>
            <div class="cell"><?= $event[3] ?></div>
            <div class="cell"><?= $event[4] ?></div>
            <div class="cell"><a href="admin/update?table=event&id=<?= $event[0] ?>">Изменить</a></div>
            <div class="cell"><a href="admin/delete?table=event&id=<?= $event[0] ?>">Удалить</a></div>
        </div>
    <?php endforeach; ?>
        <div class="row insert"><a href="admin/insert?table=event">Добавить запись</a></div>
    </div>
<div class="table hidden table_departments">
    <div class="row header">
        <div class="cell">Id</div>
        <div class="cell">Адрес</div>
        <div class="cell">Номер телефона</div>
        <div class="cell">Изменение</div>
        <div class="cell">Удаление</div>
    </div>
    <?php foreach ($departments as $department) : ?>
        <div class="row">
            <div class="cell"><?= $department[0] ?></div>
            <div class="cell"><?= $department[1] ?></div>
            <div class="cell"><?= $department[2] ?></div>
            <div class="cell"><a href="admin/update?table=department&id=<?= $department[0] ?>">Изменить</a></div>
            <div class="cell"><a href="admin/delete?table=department&id=<?= $department[0] ?>">Удалить</a></div>
        </div>
    <?php endforeach; ?>
    <div class="row insert"><a href="admin/insert?table=department">Добавить запись</a></div>
</div>
    <div class="table hidden table_departments_events">
        <div class="row header">
            <div class="cell">Id</div>
            <div class="cell">Дата</div>
            <div class="cell">Время</div>
            <div class="cell">Id департамента</div>
            <div class="cell">Id события</div>
            <div class="cell">Изменение</div>
            <div class="cell">Удаление</div>
        </div>
        <?php foreach ($departments_events as $department_event) : ?>
            <div class="row">
                <div class="cell"><?= $department_event[0] ?></div>
                <div class="cell"><?= $department_event[1] ?></div>
                <div class="cell"><?= $department_event[2] ?></div>
                <div class="cell"><?= $department_event[3] ?></div>
                <div class="cell"><?= $department_event[4] ?></div>
                <div class="cell"><a href="admin/update?table=department_event&id=<?= $department_event[0] ?>">Изменить</a></div>
                <div class="cell"><a href="admin/delete?table=department_event&id=<?= $department_event[0] ?>">Удалить</a></div>
            </div>
        <?php endforeach; ?>
        <div class="row insert"><a href="admin/insert?table=department_event">Добавить запись</a></div>
    </div>
    <div class="table hidden table_events_records">
        <div class="row header">
            <div class="cell">Id</div>
            <div class="cell">Дата записи</div>
            <div class="cell">Id события департамента</div>
            <div class="cell">Id ребенка</div>
            <div class="cell">Изменение</div>
            <div class="cell">Удаление</div>
        </div>
        <?php foreach ($events_records as $event_record) : ?>
            <div class="row">
                <div class="cell"><?= $event_record[0] ?></div>
                <div class="cell"><?= $event_record[1] ?></div>
                <div class="cell"><?= $event_record[2] ?></div>
                <div class="cell"><?= $event_record[3] ?></div>
                <div class="cell"><a href="admin/update?table=event_record&id=<?= $event_record[0] ?>">Изменить</a></div>
                <div class="cell"><a href="admin/delete?table=event_record&id=<?= $event_record[0] ?>">Удалить</a></div>
            </div>
        <?php endforeach; ?>
        <div class="row insert"><a href="admin/insert?table=event_record">Добавить запись</a></div>
    </div>
    <div class="table hidden table_parents">
        <div class="row header">
            <div class="cell">Id</div>
            <div class="cell">Имя</div>
            <div class="cell">E-mail</div>
            <div class="cell">Изменение</div>
            <div class="cell">Удаление</div>
        </div>
        <?php foreach ($parents as $parent) : ?>
            <div class="row">
                <div class="cell"><?= $parent[0] ?></div>
                <div class="cell"><?= $parent[1] ?></div>
                <div class="cell"><?= $parent[2] ?></div>
                <div class="cell"><a href="admin/update?table=parent&id=<?= $parent[0] ?>">Изменить</a></div>
                <div class="cell"><a href="admin/delete?table=parent&id=<?= $parent[0] ?>">Удалить</a></div>
            </div>
        <?php endforeach; ?>
        <div class="row insert"><a href="admin/insert?table=parent">Добавить запись</a></div>
    </div>
    <div class="table hidden table_child">
        <div class="row header">
            <div class="cell">Id</div>
            <div class="cell">Имя</div>
            <div class="cell">Год рождения</div>
            <div class="cell">Id родителя</div>
            <div class="cell">Изменение</div>
            <div class="cell">Удаление</div>
        </div>
        <?php foreach ($child as $children) : ?>
            <div class="row">
                <div class="cell"><?= $children[0] ?></div>
                <div class="cell"><?= $children[1] ?></div>
                <div class="cell"><?= $children[2] ?></div>
                <div class="cell"><?= $children[3] ?></div>
                <div class="cell"><a href="admin/update?table=child&id=<?= $children[0] ?>">Изменить</a></div>
                <div class="cell"><a href="admin/delete?table=child&id=<?= $children[0] ?>">Удалить</a></div>
            </div>
        <?php endforeach; ?>
        <div class="row insert"><a href="admin/insert?table=child">Добавить запись</a></div>
    </div>
</div>
<script>
    let buttons = document.querySelectorAll('.tables_list .buttons h1')
    let tables = document.querySelectorAll('.table')
    buttons.forEach((button,index)=>{
        button.addEventListener('click', () => {
            buttons.forEach(b=> b!==button ? b.classList.remove('active') : b.classList.add('active'))
            tables.forEach(t=> t!==tables[index] ? t.classList.add('hidden'): t.classList.remove('hidden'))
        })
    })
    console.log(buttons)
    console.log(tables)
</script>
