<!-- DIRECT CHAT -->
<div class="col-md-12">
    <div class="card direct-chat direct-chat-primary">
        <div class="card-header">
            <h3 class="card-title">Chatting</h3>

            <div class="card-tools">
                <span data-toggle="tooltip" title="3 New Messages" class="badge badge-primary"></span>
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-toggle="tooltip" title="Contacts" data-widget="chat-pane-toggle">
                    <i class="fas fa-comments"></i>

            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <!-- Conversations are loaded here -->
            <div class="direct-chat-messages">
                <!-- Message. Default to the left -->
                <?php
                foreach ($pesan as $key => $value) {
                    $id_pelanggan = $value->id_pelanggan;
                    if ($value->pelanggan_send != '0') {
                ?>
                        <div class="direct-chat-msg">
                            <div class="direct-chat-infos clearfix">
                                <span class="direct-chat-name float-left"><?= $value->nama_pelanggan ?></span>
                                <span class="direct-chat-timestamp float-right"><?= $value->time_chatting ?></span>
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
                                <span class="direct-chat-name float-right">Admin</span>
                                <span class="direct-chat-timestamp float-left"><?= $value->time_chatting ?></span>
                            </div>
                            <!-- /.direct-chat-infos -->
                            <!-- /.direct-chat-img -->
                            <div class="direct-chat-text">
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
            <div class="card-footer">
                <form action="<?= base_url('chatting_admin/send') ?>" method="post">
                    <div class="input-group">
                        <input type="text" name="pesan" placeholder="Type Message ..." class="form-control">
                        <input type="hidden" name="id_pelanggan" value="<?= $id_pelanggan ?>">
                        <span class="input-group-append">
                            <button type="submit" class="btn btn-primary">Send</button>
                        </span>
                    </div>
                </form>
            </div>
            <!-- /.card-footer-->
        </div>
    </div>
    <!--/.direct-chat -->
</div>

<!-- 
<script type="text/javascript">
    $(function() {
        $("#btn_send_chat").click(function() {
            $.ajax({
                type: 'POST',
                dataType: "json",
                url: '<?= site_url('admin/send_mgs_chat') ?>',
                data: {
                    'msg': $('#text_message_chat').val(),
                    'id_pelanggan': $('#text_id_pelanggan').val()
                },
                success: function(msg) {
                    console.log(msg);
                    //alert('wow' + msg);
                    $('.direct-chat-messages').append('<div class="direct-chat-msg right"><div class="direct-chat-infos clearfix"><span class="direct-chat-name float-right">' + msg.nama_user + ' </span><span class="direct-chat-timestamp float-left">' + msg.time_chatting + '</span ></div><div class="direct-chat-text">' + msg.admin_send + '</div></div>');
                }
            });
            $('#text_message_chat').val('');
            $('#text_message_chat').focus();
        });
    });
</script> -->