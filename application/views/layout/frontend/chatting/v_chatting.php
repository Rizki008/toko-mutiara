<div class="hero-wrap hero-bread" style="background-image: url('<?= base_url('template4/images/bg_1.jpg') ?>');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Keranjang</span></p>
                <h1 class="mb-0 bread"><?= $title ?></h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section contact-section bg-light">
    <div class="container">
        <div class="row block-9">


            <!-- DIRECT CHAT -->

            <div class="col-md-6">
                <div class="card direct-chat direct-chat-primary">
                    <div class="card-header">
                        <h3 class="card-title">Chatting</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <!-- Conversations are loaded here -->
                        <div class="direct-chat-messages">
                            <!-- Message. Default to the left -->
                            <?php foreach ($chat as $key => $value) {
                                if ($value->pelanggan_send != '0') {
                            ?>
                                    <div class="direct-chat-msg">
                                        <div class="direct-chat-infos clearfix">
                                            <span class="direct-chat-name float-left"><?= $value->nama_pelanggan ?></span><br>
                                            <span class="direct-chat-timestamp float-left"><?= $value->time_chatting ?></span>
                                        </div>
                                        <!-- /.direct-chat-img -->
                                        <div class="direct-chat-text">
                                            <?= $value->pelanggan_send ?>
                                        </div>
                                        <!-- /.direct-chat-text -->
                                    </div>
                                    <!-- /.direct-chat-msg -->
                                <?php
                                } else if ($value->admin_send != '0') {
                                ?>
                                    <!-- Message to the right -->
                                    <div class="direct-chat-msg right">
                                        <div class="direct-chat-infos clearfix">
                                            <span class="direct-chat-name float-right">Admin</span><br>
                                            <span class="direct-chat-timestamp float-right"><?= $value->time_chatting ?></span>
                                        </div>
                                        <!-- /.direct-chat-infos -->
                                        <!-- /.direct-chat-img -->
                                        <div class="direct-chat-text text-right">
                                            <?= $value->admin_send ?>
                                        </div>
                                        <!-- /.direct-chat-text -->
                                    </div>
                                    <!-- /.direct-chat-msg -->
                            <?php
                                }
                            }
                            ?>
                            <!--/.direct-chat-messages-->
                            <!-- /.direct-chat-pane -->
                        </div>
                        <!-- /.card-body -->
                        <!-- /.card-footer-->
                    </div>
                </div>
                <!--/.direct-chat -->
            </div>

            <div class="col-md-6 order-md-last d-flex">
                <form action="<?= base_url('chatting_pelanggan') ?>" method="POST" class="bg-white p-5 contact-form">
                    <div class="form-group">
                        <textarea name="pesan" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
                    </div>
                </form>
            </div>

        </div>
    </div>
</section>