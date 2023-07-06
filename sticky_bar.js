window.onscroll = function() {stickyOn()};

    var dynamic_island = document.getElementById("dynamic_island");
    var sticky = dynamic_island.offsetTop;

    function stickyOn() {
        if (window.pageYOffset >= sticky) {
            dynamic_island.classList.add("sticky")
        } 
        else {
            dynamic_island.classList.remove("sticky");
        }
    }