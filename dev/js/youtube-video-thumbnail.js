/* Light YouTube Embeds by @labnol */
/* Web: http://labnol.org/?p=27941 */

document.addEventListener( 'DOMContentLoaded', function() {
    var div, n, playBtn, playBtnID, apiID, move, youtubeURL, vidID, vidAPIurl, vidTitle,
    v = document.getElementsByClassName( 'related-v' );
        apiID = 'AIzaSyDBC0tlQD0Tcz6psxhKXz9FQuVg_BmueLE';
        youtubeURL = 'https://www.googleapis.com/youtube/v3/videos?part=snippet&id=';
        for ( n = 0; n < v.length; n++ ) {
            vidID = v[n].dataset.id;
            vidAPIurl = youtubeURL + vidID + '&key=' + apiID;
            div = document.createElement( 'div' );
            div.setAttribute( 'class', 'vid-title' );
            vidInfo( vidAPIurl, div, n, v );
        }
});

function vidInfo( vidAPIurl, div, n, v ) {
    $.getJSON( vidAPIurl, function( data ) {
        var divChannel;
        var vidTitle = `${data.items[0].snippet.title}`;
        var vidChannel = `${data.items[0].snippet.channelTitle}`;
        div.innerHTML = '<p>' + vidTitle + '</p>';
        v[n].appendChild( div );
        $( div ).insertBefore( v[n]);
        divChannel = document.createElement( 'div' );
        divChannel.setAttribute( 'class', 'vid-channel' );
        divChannel.innerHTML = '<p>' + vidChannel + '</p>';
        v[n].appendChild( divChannel );
        $( divChannel ).insertAfter( v[n]);
    });
}

document.addEventListener( 'DOMContentLoaded',
function() {
    var div, n, playBtn, playBtnID,
        v = document.getElementsByClassName( 'youtube-player' );
        for ( n = 0; n < v.length; n++ ) {
        div = document.createElement( 'div' );
        div.setAttribute( 'data-id', v[n].dataset.id );
        div.setAttribute( 'id', v[n].id );
        div.setAttribute( 'class', 'the-player');
        div.innerHTML = labnolThumb( v[n].dataset.id );
        div.onclick = labnolIframe;
        playBtn = document.getElementById( v[n].dataset.id );
        playBtnID = v[n].dataset.id;
        v[n].appendChild( div );
        playBtn.onclick = removePlayBtn;
    }
    var vSq = document.getElementsByClassName( 'youtube-player-square' );
        for ( n = 0; n < vSq.length; n++ ) {
        div = document.createElement( 'div' );
        div.setAttribute( 'data-id', vSq[n].dataset.id );
        div.setAttribute( 'id', vSq[n].id );
        div.innerHTML = labnolThumb( vSq[n].dataset.id );
        div.onclick = labnolIframe;
        playBtn = document.getElementById( vSq[n].dataset.id );
        playBtnID = vSq[n].dataset.id;
        vSq[n].appendChild( div );
        playBtn.onclick = removePlayBtn;
    }
});
function labnolThumb( id ) {
    var thumb = '<img src="https://i.ytimg.com/vi/ID/sddefault.jpg" https://i.ytimg.com/vi/ID/3.jpg 300w,https://i.ytimg.com/vi/ID/hqdefault.jpg 400w" sizes="(min-width: 960px) 75vw, 100vw">';


    return thumb.replace( /ID/g, id );
}



function labnolIframe( id ) {

    /* Display: NONE Play Button */
    var elem = document.getElementById( this.dataset.id );
    var iframe = document.createElement( 'iframe' );
    var embed = 'https://www.youtube.com/embed/ID';
    elem.style.display = 'none';
    iframe.setAttribute( 'src', embed.replace( 'ID', this.dataset.id + '?autoplay=1' + this.id ) );
    iframe.setAttribute( 'frameborder', '0' );
    iframe.setAttribute( 'allowfullscreen', '1' );
    this.parentNode.replaceChild( iframe, this );
}

function removePlayBtn() {
    var otherElem = document.getElementById(this.dataset.id).firstChild;
    console.log(otherElem);
    this.style.display = 'none';
    var iframe = document.createElement('iframe');
    var embed = 'https://www.youtube.com/embed/ID?autoplay=1';
    iframe.setAttribute( 'src', embed.replace( 'ID', this.id + this.dataset.id ) );
    iframe.setAttribute( 'frameborder', '0' );
    iframe.setAttribute( 'allowfullscreen', '1' );
    otherElem.parentNode.replaceChild( iframe, otherElem );
}