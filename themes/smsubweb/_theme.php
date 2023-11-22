<?php $user = (new \Source\Models\Auth())->user(); ?>

<!-- SMSUB AGENDA -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <?= $head;?> <!-- HEAD -->
    <link rel="icon" type="image/png" href="<?= theme("/assets/images/favicon.png"); ?>"/>
    <link rel="stylesheet" href="<?= theme("/assets/style.css"); ?>"/>

</head>
<body>

<div class="ajax_load">
    <div class="ajax_load_box">
        <div class="ajax_load_box_circle"></div>
            <p class="ajax_load_box_title">Aguarde, carregando ...</p>
    </div>
</div>

<svg xmlns="http://www.w3.org/2000/svg" class="d-none">
    <symbol id="circle-half" viewBox="0 0 16 16">
        <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z"/>
    </symbol>
    <symbol id="moon-stars-fill" viewBox="0 0 16 16">
        <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z"/>
        <path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z"/>
    </symbol>
       <symbol id="sun-fill" viewBox="0 0 16 16">
        <path d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"/>
    </symbol>
</svg>

<header class="container-md navbar navbar-expand-md bd-navbar sticky-top">
    <nav class="container-md bd-gutter flex-wrap flex-lg-nowrap" aria-label="Main navigation">
        <a class="navbar-brand p-0 me-0 me-lg-2 fw-bold fs-4" href="/" aria-label="Agenda">
            <img width="130" height="40" src="<?=theme("/assets/images/smsub_logo/SUBPREFEITURAS_HORIZONTAL_FUNDO_ESCURO.png")?>">
        </a>

        <div class="d-flex">
            <div class="bd-search" id="docsearch" data-bd-docs-version="5.3"></div>

            <button class="navbar-toggler d-flex d-lg-none order-3 p-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#bdNavbar" aria-controls="bdNavbar" aria-label="Toggle navigation">
                <i class="bi bi-justify"></i>
            </button>
        </div>

        <div class="offcanvas-lg offcanvas-end flex-grow-1 navbar-collapse justify-content-md-center" tabindex="-1" id="bdNavbar" aria-labelledby="bdNavbarOffcanvasLabel" data-bs-scroll="true">
            <div class="offcanvas-header px-4 pb-0">
                <div class="offcanvas-title text-light" id="bdNavbarOffcanvasLabel"><img width="130" height="40" src="<?=theme("/assets/images/smsub_logo/SUBPREFEITURAS_HORIZONTAL_FUNDO_ESCURO.png")?>"></div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close" data-bs-target="#bdNavbar"></button>
            </div>

            <div class="offcanvas-body p-4 pt-0 p-lg-0">
                <hr class="d-lg-none">
                <ul class="navbar-nav flex-row flex-wrap bd-navbar-nav">
                    <li class="nav-item nav col-6 col-lg-auto">
                        <a class="nav-link py-2 px-0 px-lg-2 <?=lnk("/")?>" aria-current="true" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Home" href="<?= url(); ?>">Home</a>
                    </li>
                    <li class="nav-item col-6 col-lg-auto">
                        <a class="nav-link py-2 px-0 px-lg-2 <?=lnk("/contatos")?>" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Contatos" href="<?=url("/contatos")?>">Contatos</a>
                    </li>
                    <li class="nav-item col-6 col-lg-auto">
                        <a class="nav-link py-2 px-0 px-lg-2 <?=lnk("/email")?>" data-bs-toggle="tooltip" data-bs-placement="bottom" title="E-mail" href="<?=url("/email")?>">E-mail</a>
                    </li>
                    <li class="nav-item col-6 col-lg-auto">
                        <a class="nav-link py-2 px-0 px-lg-2 <?=lnk("/sobre")?>" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Sobre" href="<?=url("/sobre")?>">Sobre</a>
                    </li>
                    <li class="nav-item col-6 col-lg-auto">
                        <a class="nav-link py-2 px-0 px-lg-2" data-bs-toggle="tooltip" data-bs-placement=" bottom" title="Blog" href="http://10.23.237.79/blog">Blog</a>
                    </li>
                </ul>

                <hr class="d-lg-none">

                <ul class="navbar-nav flex-row flex-wrap ms-md-auto">
                    <li class="nav-item col-6 col-lg-auto">
                        <a class="nav-link py-2 px-0 px-lg-2" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Facebook" href="https://www.facebook.com/<?=CONF_SOCIAL_FACEBOOK_PAGE?>" target="_blank" rel="noopener">
                            <i class="bi bi-facebook"></i>
                            <small class="d-lg-none ms-2">Facebook</small>
                        </a>
                    </li>
                    <li class="nav-item col-6 col-lg-auto">
                        <a class="nav-link py-2 px-0 px-lg-2" href="https://www.instagram.com/<?=CONF_SOCIAL_INSTAGRAM_PAGE?>" target="_blank" rel="noopener">
                            <i class="bi bi-instagram"></i>
                            <small class="d-lg-none ms-2">Instagram</small>
                        </a>
                    </li>
                    <li class="nav-item col-6 col-lg-auto">
                        <a class="nav-link py-2 px-0 px-lg-2" href="https://www.youtube.com/<?=CONF_SOCIAL_YOUTUBE_PAGE?>" target="_blank" rel="noopener">
                            <i class="bi bi-youtube"></i>
                            <small class="d-lg-none ms-2">YouTube</small>
                        </a>
                    </li>
                    <li class="nav-item py-2 py-lg-1 col-12 col-lg-auto">
                        <div class="vr d-none d-lg-flex h-100 mx-lg-2 text-white"></div>
                        <hr class="d-lg-none my-2">
                    </li>



                    <li class="nav-item dropdown">
                        <?php if(!empty($user)):?>
                        <button type="button" class="btn btn-link nav-link py-2 px-0 px-lg-2 dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" data-bs-display="static">
                            <span class="d-lg-none" aria-hidden="true"><?=$user->functional_record?> : </span>
                            <?php if(!empty($user->photo)):
                                echo '<img src="'.theme("/assets/images/$user->photo").'" width="30" height="30" class="img-fluid rounded-circle"/>';
                            else:
                                echo '<img src="'.theme("/assets/images/logo_menu.png").'" width="30" height="30" class="img-fluid rounded-circle"/>';
                            endif;
                            ?>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><h6 class="dropdown-header">Dashboard</h6></li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center justify-content-between" aria-current="true" href="<?=url("/dashboard")?>">
                                    Gráfico
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center justify-content-between" aria-current="true" href="<?=url("/dashboard/listar-contatos")?>">
                                    Contatos
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center justify-content-between" aria-current="true" href="<?=url("/dashboard/listar-setores")?>">
                                    Setores
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center justify-content-between" aria-current="true" href="<?=url("/dashboard/listar-usuarios")?>">
                                    Usuários
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center justify-content-between" aria-current="true" href="<?=url("/dashboard/sair")?>">
                                    Sair
                                </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li><h6 class="dropdown-header">Lançamentos anteriores</h6></li>
                            <li><a class="dropdown-item" href="http://<?=CONF_DB_HOST?>/agendav2/">v2.0</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="http://<?=CONF_DB_HOST?>/agendav1/">v1.0</a></li>
                        </ul>
                        <?php else:?>
                            <li class="nav-item col-6 col-lg-auto">
                                <a class="nav-link py-2 px-0 px-lg-2 <?=lnk("/entrar")?>" href="<?=url("/admin/login")?>">
                                    <i class="bi bi-person-lock"></i> Entrar
                                </a>
                            </li>
                        <?php endif;?>
                    </li>


                    <li class="nav-item py-2 py-lg-1 col-12 col-lg-auto">
                        <div class="vr d-none d-lg-flex h-100 mx-lg-2 text-white"></div>
                        <hr class="d-lg-none my-2">
                    </li>

                    <li class="nav-item dropdown">
                        <button class="btn btn-link nav-link py-2 px-0 px-lg-2 dropdown-toggle d-flex align-items-center"
                                id="bd-theme"
                                type="button"
                                aria-expanded="false"
                                data-bs-toggle="dropdown"
                                data-bs-display="static"
                                aria-label="Toggle theme (auto)">
                            <svg class="bi my-1 theme-icon-active"><use href="#circle-half"></use></svg>
                            <span class="d-lg-none ms-2" id="bd-theme-text">Alternar tema</span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="bd-theme-text">
                            <li>
                                <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light" aria-pressed="false">
                                    <svg class="bi me-2 opacity-50 theme-icon"><use href="#sun-fill"></use></svg>
                                    Light
                                    <i class="bi bi-check2 ms-auto d-none"></i>
                                </button>
                            </li>
                            <li>
                                <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark" aria-pressed="false">
                                    <svg class="bi me-2 opacity-50 theme-icon"><use href="#moon-stars-fill"></use></svg>
                                    Dark
                                    <i class="bi bi-check2 ms-auto d-none"></i>
                                </button>
                            </li>
                            <li>
                                <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto" aria-pressed="true">
                                    <svg class="bi me-2 opacity-50 theme-icon"><use href="#circle-half"></use></svg>
                                    Auto
                                    <i class="bi bi-check2 ms-auto d-none"></i>
                                </button>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<!--CONTENT-->
<main class="container-sm" style="padding-right: 0;padding-left: 0">

    <script src="<?= theme("/../".CONF_VIEW_THEME."/assets/scripts.js"); ?>"></script>

    <?= $this->section("content"); ?>

    <?= $this->section("scripts"); ?>

</main>

<?php if ($this->section("optout")): ?>
    <?= $this->section("optout"); ?>
<?php else: ?>

        <div class="row justify-content-center text-center mt-5 mb-5">
            <div class="col-md-4">
                <i class="bi bi-book-half display-1"></i>
                <p class="fw-bolder fs-3">Comece a utilizar a agenda inteligente agora mesmo</p>
                <p class="fs-5">É rápida, simples e funcional!</p>
            </div>
        </div>
<?php endif; ?>

<footer class="bd-footer py-4 py-md-5 bg-body-tertiary text-center container-sm">
    <div class="container-xl py-4 py-md-5 px-4 px-md-3 text-body-secondary">
        <div class="row">
            <div class="col-lg-3 mb-3">
                <a data-bs-togglee="tooltip" data-bs-placement="right" data-bs-custom-class="custom-tooltip"
                   data-bs-title="Agenda de Ramais" class="d-inline-flex align-items-center mb-2 text-body-emphasis text-decoration-none" href="<?=url("/contatos")?>" aria-label=Contatos">
                    <i class="bi bi-book fs-1 mb-3 me-2 text-info fw-bold"></i>
                    <span class="text-info fw-bold fs-6">SMSUB AGENDA</span>
                </a>
                <ul class="list-unstyled small">
                    <li class="mb-2">Desenvolvido com todo amor pela equipe de <strong>SMSUB - COTI - Coordenação de Tecnologia da Informação</strong>.</li>
                    <li class="mb-2">Código licenciado <a data-bs-togglee="tooltip" data-bs-placement="right" data-bs-custom-class="custom-tooltip"
                                                          data-bs-title="Liçenca de Software" class="text-decoration-none text-info fw-bold" href="https://github.com/rrrjesus/agenda/blob/main/LICENSE" target="_blank" rel="license noopener">MIT</a></li>
                    <li class="mb-2">Versão Atual v2.0.2.</li>
                    <li class="mb-2">Código Fonte <a data-bs-togglee="tooltip" data-bs-placement="right" data-bs-custom-class="custom-tooltip" data-bs-title="GitHub do Desenvolvedor" class="text-decoration-none text-info fw-bold" href="https://github.com/rrrjesus/agenda" target="_blank" rel="noopener"><i class="bi bi-github"></i> @rrrjesus/agenda</a>.</li>
                </ul>
            </div>

            <div class="col-lg-2 mb-3">
                <h5>Mais</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a data-bs-togglee="tooltip" data-bs-placement="right" data-bs-custom-class="custom-tooltip" data-bs-title="Acessar Home"  class="text-decoration-none text-info fw-bold" href="<?= url(); ?>">Home</a></li>
                    <li class="mb-2"><a data-bs-togglee="tooltip" data-bs-placement="right" data-bs-custom-class="custom-tooltip" data-bs-title="Acessar Contatos" class="text-decoration-none text-info fw-bold" href="<?= url("/contatos"); ?>">Contatos</a></li>
                    <li class="mb-2"><a data-bs-togglee="tooltip" data-bs-placement="right" data-bs-custom-class="custom-tooltip" data-bs-title="Acessar Sobre" class="text-decoration-none text-info fw-bold" href="<?= url("/sobre"); ?>">Sobre</a></li>
<!--                    <li class="mb-2"><a data-bs-togglee="tooltip" data-bs-placement="right" data-bs-custom-class="custom-tooltip" data-bs-title="Acessar Blog" class="text-decoration-none text-info fw-bold" href="http://10.23.237.79/blog">Blog</a></li>-->
                    <?php if(!empty($user->id)):?>
                        <li class="mb-2"><a data-bs-togglee="tooltip" data-bs-placement="right" data-bs-custom-class="custom-tooltip" data-bs-title="Acessar Painel" class="text-decoration-none text-info fw-bold" href="<?= url("/dashboard"); ?>">Painel</a></li>
                    <?php else: ?>
                        <li class="mb-2"><a data-bs-togglee="tooltip" data-bs-placement="right" data-bs-custom-class="custom-tooltip" data-bs-title="Login no Painel" class="text-decoration-none text-info fw-bold" href="<?= url("/entrar"); ?>">Entrar</a></li>
                    <?php endif;?>
                </ul>
            </div>

            <div class="col-12 col-lg-4 mb-3">
                <h5>Contato:</h5>
                <ul class="list-unstyled small">
                    <li class="mb-2"><p><b>Telefone:</b><br> +55 11 4934-3131</p></li>
                    <li class="mb-2"><p><b>E-mail:</b><br>
                            <a class="text-decoration-none text-info fw-bold" href="mailto:<?=CONF_SITE_EMAIL?>" data-bs-togglee="tooltip" data-bs-placement="right" data-bs-custom-class="custom-tooltip" data-bs-title="E-mail de COTI - Suporte"><?=CONF_SITE_EMAIL?></a></p></li>
                    <li class="mb-2"><p><b>Endereço:</b><br><a class="text-decoration-none text-info fw-bold" data-bs-togglee="tooltip" data-bs-placement="right" data-bs-custom-class="custom-tooltip" data-bs-title="Endereço no Google Maps de SMSUB"  target="_blank" href="https://www.google.com/maps/place/Condom%C3%ADnio+do+Edif%C3%ADcio+Martinelli/@-23.5455906,-46.6350075,15z/data=!4m6!3m5!1s0x94ce5854575bec47:0xcff6dbd0a9dd6bac!8m2!3d-23.5455906!4d-46.6350075!16s%2Fm%2F047d5rn?entry=ttu">
                                <i class="bi bi-pin-map-fill"></i> </a> Rua São Bento, 405 / Rua Líbero Badaró, 504 - Edifício Martinelli - 10º, 23º e 24º andar - Centro - São Paulo</p></li>
                </ul>
            </div>

            <div class="col-lg-2">
                <h5>Social:</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a target="_blank" class="text-decoration-none text-info fw-bold"
                                        href="https://www.facebook.com/<?= CONF_SOCIAL_FACEBOOK_PAGE; ?>" data-bs-togglee="tooltip" data-bs-placement="right" data-bs-custom-class="custom-tooltip" data-bs-title="<?=CONF_SITE_NAME?> no Facebook"><i class="bi bi-facebook"></i> /SMSUB</a></li>
                    <li class="mb-2"><a target="_blank" class="text-decoration-none text-info fw-bold"
                                        href="https://www.instagram.com/<?= CONF_SOCIAL_INSTAGRAM_PAGE; ?>" data-bs-togglee="tooltip" data-bs-placement="right" data-bs-custom-class="custom-tooltip" data-bs-title="<?=CONF_SITE_NAME?> no Instagram"><i class="bi bi-instagram"></i> @SMSUB</a></li>
                    <li class="mb-2"><a target="_blank" class="text-decoration-none text-info fw-bold" href="https://www.youtube.com/<?= CONF_SOCIAL_YOUTUBE_PAGE; ?>"
                                        data-bs-togglee="tooltip" data-bs-placement="right" data-bs-custom-class="custom-tooltip" data-bs-title="<?=CONF_SITE_NAME?> no YouTube"><i class="bi bi-youtube"></i> /SMSUB</a></li>
                </ul>
            </div>

            <p data-bs-toggle="tooltip" data-bs-placement="left" title="Termos da <?=CONF_SITE_DESC?>" class="termos text-center p-3"> &copy; 2023, SMSUB todos os direitos reservados</p>
        </div>
    </div>
</footer>

</body>
</html>

<!-- Desenvolvido por Rodolfo R. R. de Jesus - rrrjesus@smsub.prefeitura.sp.gov.br -->