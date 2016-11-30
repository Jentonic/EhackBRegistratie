/**
 * Created by Kamiel Klumpers on 20/11/2016.
 */

function updateView() {
    $("#members").html('');

    var gameID = $("#inputGameID").val();
    var teammembers = $("#game"+gameID+"players").val();

    if(teammembers!=1) {
        for (var i = 0; i < teammembers-1; i++) {
            var html2 = "<input type='text' class='form-control' placeholder='E-mail' name='teammembers[]'>";
            $("#members").append(html2);
        }
    }
}

$(function(){
    updateView();

    $("#inputGameID").change(function(){
        updateView();
    });

    $("#submitbutton").click(function(){
        $("form#registerteamform").submit();
    });

});
