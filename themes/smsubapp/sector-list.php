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
        <p class="fs-3 fw-normal text-body-emphasis"><i class="bi bi-book-half"></i> Lista de setores SMSUB</p>
    </div>

    <div class="row justify-content-center mb-0">
        <div class="col-md-12 ml-auto mt-3 text-center">
            <?=flash();?>
        </div>
    </div>

    <div class="row justify-content-center mb-4">
        <div class="col-md-12 ml-auto text-center">
            <a data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip"
               data-bs-title="Clique para cadastrar novo contato" class="btn btn-outline-success btn-sm me-3 fw-semibold" href="<?=url("/dashboard/cadastrar-setor")?>"
               role="button"><i class="bi bi-telephone-plus me-2"></i>Novo</a>
            <?php if(!empty($lixo)){ ?>
                <a role="button" href="<?=url("/dashboard/lixeira-setores")?>" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip"
                   data-bs-title="Clique para listar lixeira de contatos" class="btn btn-outline-secondary btn-sm position-relative fw-semibold"><i class="bi bi-trash-fill text-danger me-2">
                    </i> Lixo<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"><?=$lixo?></span></a>
            <?php } ?>

        </div>
    </div>

    <div class="d-flex justify-content-center">
        <div class="col-12">
            <table id="sectorApp" class="table table-sm table-bordered border-danger table-striped" style="width:100%">
                <thead class="table-danger">
                <tr>
                    <th class="text-center">EDITAR</th>
                    <th class="text-center">SETOR</th>
                    <th class="text-center">CRIADO</th>
                    <th class="text-center">EDITADO</th>
                    <th class="text-center">LIXEIRA</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    foreach ($sectorlista as $lista):
                        ?>
                        <tr>
                            <td class="text-center"><?=$lista->id?></td>
                            <td class="text-center"><?=$lista->sector_name?></td>
                            <td class="text-center"><?=date('d/m/Y H\hi', strtotime($lista->created_at))?></td>
                            <td class="text-center"><?=date('d/m/Y H\hi', strtotime($lista->updated_at))?></td>
                            <td class="text-center"><?=$lista->id?></td>
                        </tr>
                    <?php
                    endforeach;
                ?>

                </tbody>
            </table>
        </div>
    </div>
</div>

