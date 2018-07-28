<div class="container">
    <h1><?php echo LANG_LOGIN; ?></h1>
    <div class="row">
        <div class="col-lg-8 mb-4">
            <form action="/" method="post" class="form-login">
                <div class="form-group">
                    <div class="controls">
                        <label><?php echo LANG_LOG; ?>:</label>
                        <input type="text" name="login" class="form-control input-login">
                    </div>
                </div>
                <div class="form-group">
                    <div class="controls">
                        <label><?php echo LANG_PAS; ?>:</label>
                        <input type="password" name="password" class="form-control input-password">
                    </div>
                </div>
                <p class="form-button"><button type="submit" class="btn btn-primary"><?php echo LANG_LOGIN; ?></button></p>
                <p class="errors"></p>
            </form>
        </div>
    </div>
    <p><?php echo LANG_YET; ?> <a href="/signup"><?php echo LANG_REGISTRATION; ?></a></p>
</div>