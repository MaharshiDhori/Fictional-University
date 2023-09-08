import $ from 'jquery';

class Search {
    constructor() {
        this.openButton = $(".js-search-trigger");
        this.closeButton = $(".search-overlay__close");
        this.searchOverlay = $(".search-overlay");
        this.events();
        this.isOverlayOpen = false;
    }
    events(){
        this.openButton.on("click", this.openOverlay.bind(this));
        this.closeButton.on("click", this.closeOverlay.bind(this));
        $(document).on("keyup", this.keyPressDispatcher.bind(this));
    }

    keyPressDispatcher(e){

        if(e.keyCode == 83 && !this.isOverlayOpen){  //Keycode for "S" button
            this.openOverlay();
        }

        if(e.keyCode == 27 && this.isOverlayOpen) {  //keycode for "esc" button
            this.closeOverlay();
        }

    }

    openOverlay() {
        this.searchOverlay.addClass("search-overlay--active");
        $("body").addClass("body-no-scroll");
        console.log("our open method just ran!");
        this.isOverlayOpen = true;

    }

    closeOverlay(){
        this.searchOverlay.removeClass("search-overlay--active");
        $("body").removeClass("body-no-scroll");
        console.log("our close method just ran!");
        this.isOverlayOpen = false;
    }
}

export default Search