<?php

class _formFileUpload extends _formObject implements _formObjectInterface
{

    var $thumbnail = "";
    var $image_file_types = '/\.(gif|jpe?g|png|)$/i';

    function loadThumbnail()
    {
        if (empty($this->defaultValue))
            return false;

        if (preg_match($this->image_file_types, $this->defaultValue)) {
            $this->thumbnail = "<img src='upload/files/thumbnail/" . $this->defaultValue . "' class='thumbnail' style='width:150px;'>";
        } else {
            $this->thumbnail = "<a href='upload/files/" . $this->defaultValue . "'><i class='fa fa-download'></i> " . $this->defaultValue . "</a>";
        }
        $this->thumbnail .= '<a href="#" class="btn btn-danger file-remove-'.$this->id.'" data-file="' . $this->id . '"><i class="fa fa-times"></i></a>';
    }

    public function formElement()
    {
        self::init();
        return "
        <span class=\"btn btn-success fileinput-button\">
            <i class=\"glyphicon glyphicon-plus\"></i>
            <span>Select file...</span>
            <input type=\"file\" id=\"" . $this->id . "_upload\" name=\"" . $this->name . "\">
        </span>
        <br>
        <br>
        <input type=\"hidden\" id=\"" . $this->id . "\" name=\"" . $this->id . "\" value=\"" . $this->defaultValue . "\"" . $this->attributes . ">
        <div id=\"" . $this->id . "_progress\" class=\"progress\"><div class=\"progress-bar progress-bar-success\"></div></div>
        <div id=\"" . $this->id . "_files\" class=\"files\">" . $this->thumbnail . "</div>

        <script>
        $(function () {

            $('.file-remove-".$this->id."').click(
                function(){
                    var id =  $(this).data('file');
                    $('#'+id).val('');
                    $('#'+id+'_files').html('');
                }
            );

            $('#" . $this->id . "_progress').hide();
            'use strict';
            // Change this to the location of your server-side upload handler:
            var url = 'upload/';
            $('#" . $this->id . "_upload').fileupload({
                url: url,
                replaceFileInput: false,
                dataType: 'json',
                done: function (e, data) {
                    $.each(data.result.files, function (index, file) {
                    var error = file.error;
                    if(error){
                        $(\"#" . $this->id . "_files\").html('<div class=\"alert alert-danger\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">×</span></button><strong>Erreur</strong> : '+error+'</div>');
                        $('#" . $this->id . "_progress').hide();

                    }
                    else{
                        var type = file.type;
                            if(type.indexOf('image')>=0){
                                $(\"#" . $this->id . "_files\").html('<img src=\"upload/files/thumbnail/'+file.name+'\" class=\"thumbnail\" style=\"width:150px;\">');
                            }
                            else
                                $(\"#" . $this->id . "_files\").html('<div class=\"alert alert-success\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">×</span></button>'+file.name+'</div>');

                            $(\"#" . $this->id . "\").val(file.name);
                            $('#" . $this->id . "_progress').hide();
                        }
                    }


                    );
                },
                progressall: function (e, data) {
                    $('#" . $this->id . "_progress').show();
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    $('#" . $this->id . "_progress .progress-bar').css(
                        'width',
                        progress + '%'
                    );
                }
            }).prop('disabled', !$.support.fileInput)
                .parent().addClass($.support.fileInput ? undefined : 'disabled');
        });
        </script>
        ";
    }

    public function __toString()
    {
        $this->loadThumbnail();
        return "<div class=\"form-group\"><label class=\"col-sm-2 col-sm-2 control-label\">" . $this->label . "</label><div class=\"col-sm-10\">" . $this->formElement() . "</div></div>";
    }

}