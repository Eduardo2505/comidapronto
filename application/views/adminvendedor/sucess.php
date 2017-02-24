<html>
    <head>
        <title>Formulario de Carga</title>
    </head>
    <body>
        <?php echo form_open('procesa_form/procesa'); // Aquí pondremos la url del controlador y función que procesará nuestro formulario
        ?>
        <div>
            <?php
            echo form_label('File:', 'file');
            $data = array('id' => 'txtFileName',
                'value' => '',
                'size' => 50,
                'disabled' => 'disabled',
                'style' => 'border: solid 1px; background-color: #FFFFFF;');
            echo form_input($data); //Insertamos el campo de texto que recibirá el nombre del archivo una vez subido
            ?>
            <span id="spanButtonPlaceholder"></span>
            (20 MB max)
        </div>
        <div id="fsUploadProgress"></div>
        <input type="hidden" name="hidFileID" id="hidFileID" value="" />
        <?php
        echo "<br />";
        $extra = 'id="btnSubmit"';
        echo form_submit('upload', 'Send', $extra);
        echo form_close();
        ?>
        <!-- Añadimos los archivos de JavaScript de SWFUpload -->
        <script type="text/javascript" src="<?php echo base_url(); ?>js/swfupload/swfupload.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/swfupload/handlers.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/swfupload/fileprogress.js"></script>
        <script type="text/javascript">
            var swfu;
            window.onload = function() {
                swfu = new SWFUpload({
                    // Backend settings
                    upload_url: "<?php echo base_url(); ?>procesa_form/upload",
                    file_post_name: "resume_file",
                    // Flash file settings
                    file_size_limit: "20 MB", //Limite de tamaño del archivo
                    file_types: "*.jpg", // or you could use something like: "*.doc;*.wpd;*.pdf",
                    file_types_description: "Image Files",
                    file_upload_limit: 0,
                    file_queue_limit: 1,
                    // Event handler settings
                    swfupload_loaded_handler: swfUploadLoaded, file_dialog_start_handler: fileDialogStart,
                    file_queued_handler: fileQueued,
                    file_queue_error_handler: fileQueueError,
                    file_dialog_complete_handler: fileDialogComplete,
                    //upload_start_handler : uploadStart,    // I could do some client/JavaScript validation here, but I don't need to.
                    swfupload_preload_handler: preLoad,
                    swfupload_load_failed_handler: loadFailed,
                    upload_progress_handler: uploadProgress,
                    upload_error_handler: uploadError,
                    upload_success_handler: uploadSuccess,
                    upload_complete_handler: uploadComplete,
                    // Button Settings
                    button_image_url: "<?php echo base_url(); ?>img/upload_flash_button_61x22.png",
                    button_placeholder_id: "spanButtonPlaceholder",
                    button_width: 61,
                    button_height: 22,
                    // Flash Settings
                    flash_url: "<?php echo base_url(); ?>swf/swfupload/swfupload.swf",
                    flash9_url: "<?php echo base_url(); ?>swf/swfupload/swfupload_fp9.swf",
                    custom_settings: {
                        progress_target: "fsUploadProgress",
                        upload_successful: false
                    },
                    // Debug settings
                    debug: false
                });
            };
        </script>
    </body>
</html>