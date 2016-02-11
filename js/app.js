/**
 * Created by ForgedPixel on 5-2-2016.
 */

$(document).ready(function() {

    $('#createplaylistform button').on('click', function(){
        $.post("youtube.php",
            {
                action: 'create',
                playlistname: $("#createplaylistform input[name='playlistname']").val(),

            },
            function(data, status){
                console.log(data, status);
            }
        );
    });

    $('#addTrack button').on('click', function(){
        $.post("youtube.php",
            {
                action: 'add',
                user: $("#addTrack input[name='username']").val(),
                youtubeid: $("#addTrack input[name='youtubeID']").val(),
                playlist: $("#addTrack input[name='playlist']").val(),

            },
            function(data, status){

            }
        );
    });

});