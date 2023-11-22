<?= $this->layout("dashboard"); ?>

<div class="container-fluid">
    <div class="col-md-12 ml-auto mt-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-chevron p-3 bg-body-tertiary rounded-3">
                <li class="breadcrumb-item"><a class="link-body-emphasis fw-semibold text-decoration-none text-danger" href="<?=url("/dashboard")?>"><i class="bi bi-house-door"></i> Dashboard</a></li>
                <li class="breadcrumb-item"><a class="link-body-emphasis fw-semibold text-decoration-none text-danger" href="<?=url("/usuarios/")?>"><i class="bi bi-telephone"></i> Usuários</a></li>
                <li class="breadcrumb-item active" aria-current="page"><i class="bi bi-list"></i> Lixeira de Usuários</li>
            </ol>
        </nav>
    </div>

    <div class="pricing-header p-3 pb-md-2 mx-auto text-center">
        <p class="fs-2 fw-normal text-secondary"><i class="bi bi-trash"></i> Lixeira de Usuários SMSUB</p>
    </div>

    <div class="row justify-content-center">
        <div class="col-12 ajax_response">
            <?=flash();?>
        </div>
    </div>

    <div class="row justify-content-center mb-4">
        <div class="col-md-12 ml-auto text-center">
            <a data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip"
               data-bs-title="Clique para listar contatos" class="btn btn-outline-danger btn-sm fw-semibold" href="<?=url("/dashboard/listar-usuarios")?>"
               role="button"><i class="bi bi-arrow-right-circle me-2"></i>Sair</a>
        </div>
    </div>
    
    <div class="d-flex justify-content-center">
        <div class="col-12">
            <table id="userAppTrash" class="table table-bordered border-secondary table-striped" style="width:100%">
                <thead class="table-secondary">
                <tr>
                    <th class="text-center">NOME</th>
                    <th class="text-center">E-MAIL</th>
                    <th class="text-center">STATUS</th>
                    <th class="text-center">EXCLUÍDO EM</th>
                    <th class="text-center">REATIVAR?</th>
                    <th class="text-center">DEFINITIVO?</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    if(!empty($userlista)):
                        foreach ($userlista as $user):
                    ?>
                    <tr>
                        <td class="text-center"><?=$user->first_name." ".$user->last_name?></td>
                        <td class="text-center"><?=$user->email?></td>
                        <td class="text-center"><button disabled type="button" class="btn btn-outline-danger btn-sm rounded-circle"><i class="bi bi-exclamation-triangle"></i></button></td>
                        <td class="text-center"><?=date('d/m/Y H\hi', strtotime($user->deleted_at))?></td>
                        <td class="text-center"><?=$user->id?></td>
                        <td class="text-center"><?=$user->id?></td>
                    </tr>
                        <?php
                        endforeach;
                    else:
                        echo '<div class="alert alert-danger fw-semibold text-center" role="alert"><i class="bi bi-book-half fs-5 me-2"></i> Não existem usuários na lixeira !!!</div>';
                    endif;
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

