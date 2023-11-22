<?= $this->layout("dashboard"); ?>

<div class="container-fluid">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>-->

    <div class="pricing-header p-3 pb-md-2 mx-auto text-center">
        <p class="fs-2 fw-normal text-body-emphasis"><i class="bi bi-book-half"></i> Gráfico de acesso - Agenda de contatos SMSUB</p>
    </div>

    <div class="d-flex justify-content-center">
        <div class="col-12">
            <canvas id="graphicAccessPage" class="my-4 w-100" width="900" height="380"></canvas>
        </div>
    </div>

    <div class="row">
        <div class="col-12 pb-3">
            <canvas id="graphicPages" class="my-4 w-100" width="900" height="380"></canvas>
        </div>
    </div>
</div>

<script>

    let graphicPage;
    graphicPage = (() => {

        new Chart("graphicPages", {
            type: "line",
            data: {
                labels: <?=(new \Source\Models\Post())->chart("uri", 30)?>,
                datasets: [{
                    label: 'Acessos',
                    data: <?=(new \Source\Models\Post())->chart("views", 30)?>,
                    borderColor: '#861520',
                    borderWidth: 4,
                    pointBackgroundColor: '#d81b02',
                    fill: false
                }]
            },
            options: {
                plugins: {
                    title: {
                        display: true,
                        text: 'Acessos por página da Agenda',
                        font: {
                            size: 16
                        }
                    },
                    legend: {
                        display: true
                    },
                    tooltip: {
                        boxPadding: 3
                    }
                }
            }
        });
    })()


let graphicAccessPage;
graphicAccessPage = (() => {

    new Chart("graphicAccessPage", {
        type: "line",
        data: {
            labels: <?=(new \Source\Models\Report\Access())->chartDate("created_at", 30)?>,
            datasets: [{
                label: 'Usuários',
                data: <?=(new \Source\Models\Report\Access())->chart("users", 30)?>,
                borderColor: '#861520',
                borderWidth: 4,
                pointBackgroundColor: '#d81b02',
                fill: false
            },{
                label: 'Visualizações',
                data: <?=(new \Source\Models\Report\Access())->chart("views", 30)?>,
                borderColor: '#17781b',
                borderWidth: 4,
                pointBackgroundColor: '#4fe326',
                fill: false
            },{
                label: 'Páginas',
                data: <?=(new \Source\Models\Report\Access())->chart("pages", 30)?>,
                borderColor: '#1b59b6',
                borderWidth: 4,
                pointBackgroundColor: '#06b8ee',
                fill: false
            }]
        },
        options: {
            plugins: {
                title: {
                    display: true,
                    text: 'Monitoramento de acessos da Agenda',
                    font: {
                        size: 16
                    }
                },
                legend: {
                    display: true
                },
                tooltip: {
                    boxPadding: 3
                }
            }
        }
    });
})()
</script>


