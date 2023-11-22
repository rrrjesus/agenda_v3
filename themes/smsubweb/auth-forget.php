<?= $this->layout("_theme"); ?>

<div class="form-signin w-100 m-auto">
    <form class="needs-validation" data-reset="true" novalidate id="forget" action="<?=url("/recuperar")?>" method="post" enctype="multipart/form-data">
        <div class="ajax_response"><?=flash();?></div>
        <?=csrf_input();?>

        <img class="mb-4" width="130" height="40" src="<?=theme("/assets/images/smsub_logo/SUBPREFEITURAS_HORIZONTAL_FUNDO_ESCURO.png")?>" alt="">
        <h1 class="h3 mb-3 fw-normal">Recuperar senha</h1>

        <p>Informe seu e-mail para receber um link de recuperação.</p>

        <p>
            <a class="text-decoration-none text-info fw-bold" href="<?=url("/entrar")?>" data-bs-togglee="tooltip" data-bs-placement="right" data-bs-custom-class="custom-tooltip" data-bs-title="Voltar para agenda">
                Voltar e entrar
            </a>
        </p>

        <div class="form-floating mb-3">
            <input class="form-control" type="email" name="email" id="email" placeholder="Informe seu e-mail:" required>
            <label for="floatingInput">Digite seu e-mail:</label>
        </div>

        <button class="btn w-100 py-2 fw-bold text-light transition gradient gradient-blue gradient-hover" type="submit">Recuperar</button>
    </form>
</div>