<?= $this->layout("dashboard"); ?>

<div class="container-fluid">
    <div class="col-md-12 ml-auto mt-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-chevron p-2 bg-body-tertiary rounded-3">
                <li class="breadcrumb-item"><a class="link-body-emphasis fw-semibold text-decoration-none text-danger" href="<?=url("/dashboard")?>"><i class="bi bi-house-door"></i> Dashboard</a></li>
                <li class="breadcrumb-item"><a class="link-body-emphasis fw-semibold text-decoration-none text-danger" href="<?=url("/dashboard/listar-usuarios")?>"><i class="bi bi-person-add"></i> Usuários</a></li>
                <li class="breadcrumb-item active" aria-current="page"><i class="bi bi-plus-circle"></i> Editar Usuário</li>
            </ol>
        </nav>
    </div>

    <div class="pricing-header p-3 pb-md-2 mx-auto text-center">
        <p class="fs-3 fw-normal text-body-emphasis"><i class="bi bi-book-half"></i> Edição de Usuários SMSUB</p>
    </div>

    <div class="d-flex justify-content-center">
        <div class="col-12">
            <form class="row gy-2 gx-3 align-items-center needs-validation" novalidate id="user-updated" action="<?=url("/dashboard/editar-usuario")?>" method="post" enctype="multipart/form-data">

                <div class="row justify-content-center mb-3">
                    <div class="col-9 ajax_response">
                        <?=flash();?>
                    </div>
                </div>

                <?=csrf_input();?>

                <div class="row justify-content-center mb-3">
                    <div class="col-9">
                        <strong><label for="inputSector" class="col-3 col-form-label col-form-label-sm"><i class="bi bi-person me-2"></i> NOME</label></strong>
                        <input data-bs-toggle="tooltip" data-bs-placement="bottom"
                               data-bs-custom-class="custom-tooltip"
                               data-bs-title="Digite o setor"  class="form-control form-control-sm" type="text" name="first_name" value="<?=$edit->first_name?>" placeholder="DIGITE O NOME"/>
                    </div>
                </div>

                <div class="row justify-content-center mb-2">
                    <div class="col-9">
                        <strong><label for="inputSector" class="col-3 col-form-label col-form-label-sm"><i class="bi bi-person me-2"></i>SOBRENOME</label></strong>
                        <input data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip"
                               data-bs-title="Digite o nome" class="form-control form-control-sm" type="text" name="last_name" value="<?=$edit->last_name?>" placeholder="DIGITE O SOBRENOME"/>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-9">
                        <strong><label  for="inputEmail" class="col-3 col-form-label col-form-label-sm"><i class="bi bi-mailbox me-2"></i> EMAIL</label></strong>
                        <input data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip"
                               data-bs-title="Digite o email" class="form-control form-control-sm" type="email" name="email" value="<?=$edit->email?>" placeholder="DIGITE O E-MAIL"/>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-9">
                        <strong><label  for="inputLogin" class="col-3 col-form-label col-form-label-sm"><i class="bi bi-mailbox me-2"></i> LOGIN</label></strong>
                        <input data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip"
                               data-bs-title="Digite o login" class="form-control form-control-sm" type="text" name="functional_record" value="<?=$edit->functional_record?>" placeholder="DIGITE O RF"/>
                    </div>
                </div>

                <input type="hidden" name="id" value="<?=$edit->id?>">

                <div class="row justify-content-center mt-3 mb-3">
                    <div class="col-auto">
                        <button data-bs-toggle="tooltip" data-bs-placement="bottom"
                                data-bs-custom-class="custom-tooltip"
                                data-bs-title="Clique para gravar o registro" class="btn btn-outline-success btn-sm fw-bold me-3"><i class="bi bi-disc-fill me-1"></i> GRAVAR</button>
                        <a href="<?=url("/dashboard/listar-usuarios")?>" data-bs-toggle="tooltip" data-bs-placement="bottom" role="button"
                           data-bs-custom-class="custom-tooltip"
                           data-bs-title="Clique para listar os usuários" class="btn btn-outline-info btn-sm fw-bold"><i class="bi bi-list-columns me-2"></i>LISTAR</a>
                    </div>
                </div>
        </form>
    </div>
</div>