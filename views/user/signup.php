<div class="container">
    <h1>Регистрация</h1>
    <div class="row">
        <div class="col-lg-8 mb-4">
            <form action="/signup" method="post" class="form-reg" enctype="multipart/form-data">
                <div class="control-group form-group">
                    <div class="controls">
                        <label>E-mail:</label>
                        <input type="text" class="form-control input-email" name="email">
                        <div class="error"></div>
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Логин:</label>
                        <input type="text" class="form-control input-login" name="login">
                        <div class="error"></div>
                    </div>
                </div>              
                <div class="control-group form-group">
                    <div class="controls">
                        <label>ФИО:</label>
                        <input type="text" class="form-control input-fio" name="fio">
                        <div class="error"></div>
                    </div>
                </div>
                 <div class="control-group form-group">
                    <div class="controls">
                        <label>Фото:</label>
                        <input type="file" class="form-control input-photo" name="photo">
                        <div class="error"></div>
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Пароль</label>
                        <input type="password" class="form-control input-password" name="password">
                        <div class="error"></div>
                    </div>
                </div>
                <p class="form-button"><button type="submit" class="btn btn-primary">Регистрация</button></p>
                <p class="errors"></p>
            </form>
        </div>
    </div>
     <p>Уже зарегистрированы? <a href="/">Войти</a></p>
</div>