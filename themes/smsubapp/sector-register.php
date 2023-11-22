<?= $this->layout("dashboard"); ?>

<div class="container-fluid">
    <div class="col-md-12 ml-auto mt-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-chevron p-2 bg-body-tertiary rounded-3">
                <li class="breadcrumb-item"><a class="link-body-emphasis fw-semibold text-decoration-none text-danger" href="<?=url("/dashboard")?>"><i class="bi bi-house-door"></i> Dashboard</a></li>
                <li class="breadcrumb-item"><a class="link-body-emphasis fw-semibold text-decoration-none text-danger" href="<?=url("/dashboard/listar-setores")?>"><i class="bi bi-telephone"></i> Setores</a></li>
                <li class="breadcrumb-item active" aria-current="page"><i class="bi bi-plus-circle"></i> Cadastrar Setor</li>
            </ol>
        </nav>
    </div>

    <div class="pricing-header p-3 pb-md-2 mx-auto text-center">
        <p class="fs-3 fw-normal text-body-emphasis"><i class="bi bi-book-half"></i> Cadastro de setores SMSUB</p>
    </div>

    <div class="d-flex justify-content-center">
        <div class="col-12">
            <form class="row gy-2 gx-3 align-items-center needs-validation" novalidate id="sector-register" action="<?=url("/dashboard/cadastrar-setor")?>" method="post" enctype="multipart/form-data">

                <div class="row justify-content-center mb-3">
                    <div class="col-6 ajax_response">
                        <?=flash();?>
                    </div>
                </div>

                <?=csrf_input();?>

                <div class="row justify-content-center mb-3">
                    <div class="col-6">
                        <strong><label for="inputSector" class="col-3 col-form-label col-form-label-sm"><i class="fas fa-table"></i> SETOR</label></strong>
                        <input data-bs-toggle="tooltip" data-bs-placement="right"
                               data-bs-custom-class="custom-tooltip"
                               data-bs-title="Digite o setor"  class="form-control form-control-sm sector" type="text" name="sector" placeholder="DIGITE O SETOR"/>
                    </div>
                </div>

                <div class="row justify-content-center mt-3 mb-3">
                    <div class="col-auto">
                        <button data-bs-toggle="tooltip" data-bs-placement="bottom"
                                data-bs-custom-class="custom-tooltip"
                                data-bs-title="Clique para gravar o registro" class="btn btn-outline-success btn-sm fw-bold me-3"><i class="bi bi-disc-fill me-1"></i> GRAVAR</button>
                        <a href="<?=url("/dashboard/listar-setores")?>" data-bs-toggle="tooltip" data-bs-placement="bottom" role="button"
                           data-bs-custom-class="custom-tooltip"
                           data-bs-title="Clique para listar os setores" class="btn btn-outline-info btn-sm fw-bold"><i class="bi bi-list-columns me-2"></i>LISTAR</a>
                    </div>
                </div>
            </form>
        </div>
    </div>