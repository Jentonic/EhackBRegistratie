/**
 * Created by Kamiel Klumpers on 20/11/2016.
 */

$(function(){

    $("#inputGameID").change(function(){
        $("#teammembers").parent().remove();

        var gameID = $("#inputGameID").val();
        var teammembers = $("#game"+gameID+"players").val();

        if(teammembers!=1) {
            var html = '<div class="form-group row"><label for="teammembers" class="col-sm-2 col-form-label">Teammembers</label><div class="col-sm-10" id="teammembers"></div>';

            $("#submit").before(html);

            for (var i = 0; i < teammembers; i++) {
                var html2 = "<input type='text' class='form-control' placeholder='E-mail' name='teammembers[]'>";
                $("#teammembers").append(html2);
            }
        }
    });

    function submit(form){

    }
});