    <form id="record" class="form-control mt-5 w-50 mx-auto" action="/record?id=<?=$de_id?>" method="post">
        <h1>Запись на "<?= $eventName ?>"</h1>
        <div class="form_body">
            <div class="form-row">
                <label for="name" class="form-label">Введите имя и фамилию</label>
                <input type="text" required class="form-control" name="name" id="name" placeholder="Алексей Багиров">
            </div>
            <div class="form-row">
                <label for="email" class="form-label">Введите адрес вашей почты</label>
                <input type="email" required class="form-control" name="email" id="email" placeholder="name@example.com">
            </div>
            <div class="form-row">
                <label for="child_name" class="form-label">Введите имя ребенка</label>
                <input type="text" required class="form-control" name="child_name" id="child_name" placeholder="Александр">
            </div>
            <div class="form-row">
                <label for="date" class="form-label">Введите год рождения ребенка</label>
                <input type="text" required class="form-control" placeholder="2013" name="date" id="date">
            </div>
        </div>
        <div class="form-row">
            <button type="submit" name="submit" value="ok">Отправить</button>
            <button type="reset">Сбросить</button>
        </div>
    </form>
