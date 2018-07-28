<div class="container">
    <h1><?php echo LANG_REGISTRATION; ?></h1>
    <div class="row">
        <div class="col-lg-8 mb-4">
            <form action="/signup" method="post" class="form-reg" enctype="multipart/form-data">
                <div class="control-group form-group">
                    <div class="controls">
                        <label><?php echo LANG_EMAIL; ?>:</label>
                        <input type="email" class="form-control form-input input-email" name="email">
                        <div class="error"></div>
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label><?php echo LANG_LOG; ?>:</label>
                        <input type="text" class="form-control form-input input-login" name="login">
                        <div class="error"></div>
                    </div>
                </div>              
                <div class="control-group form-group">
                    <div class="controls">
                        <label><?php echo LANG_FIO; ?>:</label>
                        <input type="text" class="form-control form-input input-fio" name="fio">
                        <div class="error"></div>
                    </div>
                </div>
                 <div class="control-group form-group">
                    <div class="controls">
                        <label><?php echo LANG_PHOTO; ?>:</label>
                        <input type="file" class="form-control-file form-input input-photo" name="photo">
                        <div class="error"></div>
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label><?php echo LANG_PAS; ?>:</label>
                        <input type="password" class="form-control form-input input-password" name="password">
                        <div class="error"></div>
                    </div>
                </div>
                <p class="form-button"><button type="submit" class="btn btn-primary"><?php echo LANG_REGISTRATION; ?></button></p>
                <p class="errors"></p>
            </form>
        </div>
    </div>
    <p><?php echo LANG_ALREADY; ?> <a href="/"><?php echo LANG_COME; ?></a></p>
</div>