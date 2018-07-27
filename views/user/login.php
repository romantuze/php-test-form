<div class="container">
    <h1>Вход</h1>
    <div class="row">
        <div class="col-lg-8 mb-4">
            <form action="/" method="post" class="form-login">
                <div class="form-group">
                    <div class="controls">
                        <label>Логин:</label>
                        <input type="text" name="login" class="form-control input-login" >
                    </div>
                </div>
                <div class="form-group">
                    <div class="controls">
                        <label>Пароль</label>
                        <input type="password" name="password" class="form-control input-password" >
                    </div>
                </div>
                <p class="form-button"><button type="submit" class="btn btn-primary">Вход</button></p>
                <p class="errors"></p>
            </form>
        </div>
    </div>
    <p>Еще не зарегистрированы? <a href="/signup">Регистрация</a></p>
</div>