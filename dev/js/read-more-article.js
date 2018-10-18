function readmoreDropdown() {
    var postNav, texT, x = document.getElementById( 'read-more-hidden' );
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
