<?= $this->layout("dashboard"); ?>

<div class="container-fluid">
    <div class="col-md-12 ml-auto mt-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-chevron p-2 bg-body-tertiary rounded-3">
                <li class="breadcrumb-item"><a class="link-body-emphasis fw-semibold text-decoration-none text-danger" href="<?=url("/dashboard")?>"><i class="bi bi-house-door"></i> Dashboard</a></li>
                <li class="breadcrumb-item"><a class="link-body-emphasis fw-semibold text-decoration-none text-danger" href="<?=url("/setores/")?>"><i class="bi bi-telephone"></i> Setores</a></li>
                <li class="breadcrumb-item active" aria-current="page"><i class="bi bi-list"></i> Lista de Setores</li>
            </ol>
        </nav>
    </div>

    <div class="pricing-header p-3 pb-md-2 mx-auto text-center">
        <p class="fs-3 fw-normal text-secondary"><i class="bi bi-trash text-secondary fw-semibold"></i> Lixeira de Setores SMSUB</p>
    </div>

    <div class="row justify-content-center mb-0">
        <div class="col-md-12 ml-auto mt-3 text-center">
            <?=flash();?>
        </div>
    </div>

    <div class="row justify-content-center mb-4">
        <div class="col-md-12 ml-auto text-center">
            <a data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip"
               data-bs-title="Clique para listar contatos" class="btn btn-outline-danger btn-sm fw-semibold" href="<?=url("/dashboard/listar-setores")?>"
               role="button"><i class="bi bi-arrow-right-circle me-2"></i>Sair</a>
        </div>
    </div>

    <div class="d-flex justify-content-center">
        <div class="col-12">
            <table id="sectorAppTrash" class="table table-sm table-bordered border-secondary table-striped" style="width:100%">
                <thead class="table-secondary">
                <tr>
                    <th class="text-center">SETOR</th>
                    <th class="text-center">CRIADO EM</th>
                    <th class="text-center">EXCLUIDO EM</th>
                    <th class="text-center">REATIVAR</th>
                    <th class="text-center">DEFINITIVO?</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if(!empty($sectorlist)):
                    foreach ($sectorlist as $lista):
                        ?>
                        <tr>
                            <td class="text-center"><span class="badge bg-danger-subtle border border-danger-subtle text-danger-emphasis rounded-pill">
                                    <?=(!empty($lista->sector_name) ? $lista->sector_name : '');?></span></td>
                            <td class="text-center"><?=date('d/m/Y H\hi', strtotime($lista->created_at))?></td>
                            <td class="text-center"><?=(!empty($lista->deleted_at) ? date('d/m/Y H\hi', strtotime($lista->deleted_at)) : "")?></td>
                            <td class="text-center"><?=$lista->id?></td>
                            <td class="text-center"><?=$lista->id?></td>
                        </tr>
                    <?php
                    endforeach;
                else:
                    echo '<div class="alert alert-danger fw-semibold text-center" role="alert"><i class="bi bi-book-half fs-5 me-2"></i> Não existem setores na lixeira !!!</div>';
                endif;
                ?>

                </tbody>
            </table>
        </div>
    </div>
</div>

