    <form id="record" class="form-control mt-5 w-50 mx-auto" action="/admin" method="post">
        <h1>Вход в учетную запись</h1>
        <div class="form_body">
            <div class="form-row">
                <label for="login" class="form-label">Введите логин</label>
                <input type="email" required class="form-control" name="login" id="login" placeholder="name@example.com">
            </div>
            <div class="form-row">
                <label for="password" class="form-label">Пароль</label>
                <input type="password" required class="form-control" name="password" id="password" >
            </div>
        </div>
        <div class="form-row">
            <button type="submit" name="submit" value="ok">Отправить</button>
            <button type="reset">Сбросить</button>
        </div>
    </form>
