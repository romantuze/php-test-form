<!DOCTYPE html>
<html>
    <head>
        <title><?php echo LANG_SITE_TITLE; ?> - <?php echo $title; ?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="template/css/style.css">
    </head>
    <body>       
        <nav class="navbar navbar-default">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-menu" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand"><?php echo LANG_SITE_TITLE; ?></a>
            </div>
            <div class="collapse navbar-collapse" id="top-menu">
              <ul class="nav navbar-nav">
                <?php if (isset($_SESSION['user'])) : ?>
                <li class="active"><a href="/profile"><?php echo LANG_PROFILE; ?></a></li> 
                <li><a href="/logout"><?php echo LANG_LOGOUT; ?></a></li> 
                <?php else: ?>
                <li <?php if ($_SERVER['REQUEST_URI']=='/') echo 'class="active"'; ?>><a href="/"><?php echo LANG_LOGIN; ?></a></li>   
                <li <?php if ($_SERVER['REQUEST_URI']=='/signup') echo 'class="active"'; ?>><a href="/signup"><?php echo LANG_REGISTRATION; ?></a></li>
                <?php endif; ?>
              </ul>              
              <ul class="nav navbar-nav navbar-right">              
                <li>
                  <div class="form-lang">
                    <label><?php echo LANG_LANGUAGE; ?></label>
                    <select name="lang" class="select-lang" <?php if ($_SESSION['lang']=='rus') echo 'selected'; ?>>
                      <option value="rus">Русский</option>
                      <option value="eng" <?php if ($_SESSION['lang']=='eng') echo 'selected'; ?>>English</option>
                    </select>
                  </div>
               </li>
              </ul>
            </div>
          </div>
        </nav>
        <?php echo $content; ?>
        <script src="/template/js/jquery.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script src="/template/js/forms.js"></script>
    </body>
</html>