/**
 * Created by OsaMa on 10/07/2018.
 */
$(document).ready(function(){
    var progressbox = $("#progressbox");
    var progressbar = $("#progressbar");
    var statustxt = $("#statustxt");
    var submitButton = $("#UploadBtn");
    var myform = $("#UploadForm");
    var output = $("#output");
    var completed = '0%';
    progressbox.hide();

    $(myform).ajaxForm({
        beforeSend: function(){
            submitButton.attr('disabled','');
            statustxt.empty();
            progressbox.show();
            progressbar.width(completed);
            statustxt.html(completed);
        },
        uploadProgress: function(event,position,total,percentComplete){
            progressbar.width(percentComplete + '%');
            statustxt.html(percentComplete + '%');
        },
        complete: function (response){
            output.html(response.responseText);
            submitButton.removeAttr('disabled');
            progressbox.hide();
        }
    });
});