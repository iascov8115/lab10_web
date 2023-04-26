    <form id="record" class="form-control mt-5 w-50 mx-auto" action="/record/submit" method="post">
        <h1>Запись на событие <?= $eventName ?></h1>
        <div class="form-row">
            <label for="name" class="form-label">Введите имя и фамилию</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Алексей Багиров">
        </div>
        <div class="form-row">
            <label for="email" class="form-label">Введите адрес вашей почты</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com">
        </div>
        <div class="form-row">
            <label for="child_name" class="form-label">Введите имя ребенка</label>
            <input type="text" class="form-control" name="child_name" id="child_name" placeholder="Александр">
        </div>
        <div class="form-row">
            <label for="date" class="form-label">Введите год рождения ребенка</label>
            <input type="text" class="form-control" name="date" id="date">
        </div>
        <input type="hidden"  name="event_id" value="<?= $eventId?>">
        <div class="form-row">
            <button type="submit">Отправить</button>
            <button type="reset">Сбросить</button>
        </div>
    </form>