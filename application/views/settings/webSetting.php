<!-- partial -->
<div class="main-panel">
<div class="content-wrapper">
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>

    <div class="row">
        <div class="col-md-12">
        <div class="card">
            <div class="card-body">

            <div class="row justify-content-end mb-3">
                <div class="col-md">
                    <h3> Ubah Web Setting </h3>
                </div>
            
                <?= $this->session->flashdata('image'); ?>

            </div>

            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="splash-tab" data-bs-toggle="tab" data-bs-target="#splash" type="button" role="tab" aria-controls="home" aria-selected="true">
                        <b>Ubah Splash Screen Login</b>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="logo-tab" data-bs-toggle="tab" data-bs-target="#logo" type="button" role="tab" aria-controls="profile" aria-selected="false">
                        <b>Ubah Logo Web</b>
                    </button>
                </li>
            </ul>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="splash" role="tabpanel" aria-labelledby="splash-tab">

                    <br/>
                    <?php $this->load->view('settings/splash'); ?>

                </div>

                <div class="tab-pane fade" id="logo" role="tabpanel" aria-labelledby="logo-tab">

                    <br/>
                    <?php $this->load->view('settings/logo'); ?>
                

                </div>
                
            </div>






            </div>
        </div>
        </div>
    </div>
    </div>
    
<!-- content-wrapper ends -->