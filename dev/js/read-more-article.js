// function findreadMoreTag() {
//     var texT, repll, x = document.createElement( 'div' );
//     x.setAttribute( 'id', 'read-more-hidden' );
//     x.setAttribute( 'class', 'show-article' );
//     texT = document.getElementById("readmore-bubble");
//     $(".readmore-bubble").append( x );
//     repll = document.getElementById( "read-more-hidden" );
//     repll.replace( '</div>', '' );
    
// }findreadMoreTag();

function readmoreDropdown() {
    var postNav, texT, 
    x = document.getElementById( 'read-more-hidden' );
    
    texT = document.getElementById("readmore-bubble");
    
    postNav = document.querySelector(".post-navigation");
    if ( "show-article" == x.className ) {
        x.setAttribute("class", "hide-article");
        texT.setAttribute("class", "readmore-bubble");
        postNav.setAttribute("class", "navigation post-navigation readmore-space");
    } else {
        x.setAttribute("class", "show-article");
        texT.setAttribute("class", "readless");
        postNav.setAttribute("class", "navigation post-navigation");
    }
}readmoreDropdown();
