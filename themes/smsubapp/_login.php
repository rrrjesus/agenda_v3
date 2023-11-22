
<!-- SMSUB AGENDA -->
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <?= $head;?> <!-- HEAD -->

        <link rel="icon" type="image/png" href="<?= url("/themes/".CONF_VIEW_THEME_APP."/assets/images/favicon.png"); ?>"/>
        <link rel="stylesheet" href="<?= url("/themes/".CONF_VIEW_THEME_APP."/assets/style.css"); ?>"/>

    </head>
    <body class="d-flex align-items-center py-4 bg-body-tertiary">

    <div class="ajax_load">
        <div class="ajax_load_box">
            <div class="ajax_load_box_circle"></div>
            <p class="ajax_load_box_title">Aguarde, carregando ...</p>
        </div>
    </div>

    <?= $this->section("content"); ?>

    <script src="<?= url("/themes/".CONF_VIEW_THEME_APP."/assets/scripts.js"); ?>"></script>

    </body>
</html>
