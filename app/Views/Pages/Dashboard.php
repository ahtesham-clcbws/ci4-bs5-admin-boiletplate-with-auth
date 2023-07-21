<?= $this->extend('Layout') ?>

<?= $this->section('content') ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"><?= $PageName ?></h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <!-- <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
        </div> -->
        <!-- <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle d-flex align-items-center gap-1">
            <svg class="bi">
                <use xlink:href="#calendar3" />
            </svg>
            This week
        </button> -->
        <select class="form-select tomselect" aria-label="Default select example">
            <option selected>Open this select menu</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
        </select>
    </div>
</div>

<div>
    <h2>Section title</h2>
    <div class="table-responsive">
        <table class="table table-bordered initDatatable">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Header</th>
                    <th scope="col">Header</th>
                    <th scope="col">Header</th>
                    <th scope="col">Header</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 0; $i < 50; $i++) : ?>
                    <tr>
                        <td>1,001</td>
                        <td>random</td>
                        <td>data</td>
                        <td>placeholder</td>
                        <td>text</td>
                    </tr>
                    <tr>
                        <td>1,002</td>
                        <td>placeholder</td>
                        <td>irrelevant</td>
                        <td>visual</td>
                        <td>layout</td>
                    </tr>
                    <tr>
                        <td>1,003</td>
                        <td>data</td>
                        <td>rich</td>
                        <td>dashboard</td>
                        <td>tabular</td>
                    </tr>
                    <tr>
                        <td>1,003</td>
                        <td>information</td>
                        <td>placeholder</td>
                        <td>illustrative</td>
                        <td>data</td>
                    </tr>
                    <tr>
                        <td>1,004</td>
                        <td>text</td>
                        <td>random</td>
                        <td>layout</td>
                        <td>dashboard</td>
                    </tr>
                <?php endfor; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>
<?= $this->section('javascript') ?>
<script>
    alert('its an sweetalert box replace with window.alert', 'info','alert() anything.<br /><br />You will get this sweetalert instead of window legacy alert box.<br /><br />You will find this code in app/Views/Pages/Dashboard.php. <br /><br />You also initiate simple alert eg: alert("alert message here").<br /><br /> it will show simple message with info icon, <br /><br /><h5>Alert parameters:</h5>alert(title, icon, message), <br /> title:(required parameter),<br /> icon:(default:info, options:info,success,danger),<br /> message:(default:null).')
</script>
<?= $this->endSection() ?>