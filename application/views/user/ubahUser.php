<!-- partial -->
<div class="main-panel">
<div class="content-wrapper">
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>

    <div class="row">
        <div class="col-md-12 grid-margin strech-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Ubah User Setting</h4>

            <!-- Tab starts -->
            
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="password-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">
                            <b>Ubah Password</b>
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="level-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">
                            <b>Ubah Role / Level</b>
                        </button>
                    </li>
                </ul>

                <div class="tab-content" id="myTabContent">

                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="password-tab">
                        <br/>
                        <?php $this->load->view('user/ubahPassword'); ?>
                    </div>

                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="level-tab">
                        <br/>
                        <?php $this->load->view('user/ubahLevel'); ?>
                    </div>
                    
                </div>

                
                <!-- Tab Ends -->
                
            </div>
        </div>
        </div>
    </div>
    </div>
<!-- content-wrapper ends -->