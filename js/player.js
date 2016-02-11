/**
 * Created by ForgedPixel on 5-2-2016.
 */

$(document).ready(function() {

    $.post("youtube.php",
        {
            action: 'list',
            playlistname: $('.playlistTitle').text(),
        },
        function(data, status){
            playlistData = data;
            if(status == 'success'){

                $('.playlistTitle').text(playlistData[0]['playlist'])
                generateThumbs();
            }
        },"json"
    );
});

var playlistData;

function setCurrentVideoTitle(){
    $('.column.video.left .information').remove();
    $title = getTitle(playlistData[0]['youtubeid']);
    $username = playlistData[0]['username'];
    $outerDiv = $('<div></div>').addClass('information')
        .append($('<h2>'+$title+'</h2>')).append($('<p>'+$username+'</p>'));
    $('.column.video.left').append($outerDiv);
}
function generateThumbs(){
    playlistData.forEach(function(entry){
        $backgroundImage = 'http://img.youtube.com/vi/'+entry['youtubeid']+'/maxresdefault.jpg';
        $title = getTitle(entry['youtubeid']);
        $username = 'Added by ' + entry['username'];
        $OuterDiv = $('<li></li>')
            .append($('<div></div>').addClass("thumbnail").css( "background-image", 'url('+$backgroundImage+')'  ).append($('<div></div>').addClass('information')
                .append($('<h2>'+$title+'</h2>')).append($('<p>'+$username+'</p>'))
            ))
        ;
        $('.column.list.right ul').append($OuterDiv);
    });
}

function getTitle($id) {
        var value= $.ajax({
            url: 'https://www.googleapis.com/youtube/v3/videos?id='+$id+'&key=AIzaSyB90aGp-XnXJ20x1yH7uFk6DQP-LQ5pfkw&fields=items(snippet(title))&part=snippet',
            async: false,
        }).responseText;
    value = JSON.parse(value);
        return value['items'][0]['snippet']['title'];

}
// 2. This code loads the IFrame Player API code asynchronously.
var tag = document.createElement('script');

tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

// 3. This function creates an <iframe> (and YouTube player)
//    after the API code downloads.
var player;
function onYouTubeIframeAPIReady($video) {
    player = new YT.Player('player', {
        height: '100%',
        width: '100%',
        videoId: '5tgVLKVVkiw',
        events: {
            'onReady': onPlayerReady,
            'onStateChange': onPlayerStateChange
        }
    });
}

// 4. The API will call this function when the video player is ready.
function onPlayerReady(event) {
    event.target.playVideo();
}

// 5. The API calls this function when the player's state changes.
//    The function indicates that when playing a video (state=1),
//    the player should play for six seconds and then stop.
var done = false;
function onPlayerStateChange(event) {
    if (event.data == YT.PlayerState.ENDED) {
        nextVideo();
    }
}
function nextVideo() {
    player.cueVideoById(playlistData[0]['youtubeid']);
    player.playVideo();
    $.post("youtube.php",
        {
            action: 'removePlayed',
            id: playlistData[0]['id'],

        },
        function(data, status){
            if(status == 'success'){
                setCurrentVideoTitle();
                $('.column.list.right ul').children().remove();
                $.post("youtube.php",
                    {
                        action: 'list',
                    },
                    function(data, status){
                        playlistData = data;
                    },"json"
                );
                setCurrentVideoTitle();
                generateThumbs();
            }
        }
    );
}
function stopVideo() {
    player.stopVideo();
}