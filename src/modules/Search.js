import $ from 'jquery';

class Search {
    constructor() {
        this.resultsDiv = $("#search-overlay__results");
        this.openButton = $(".js-search-trigger");
        this.closeButton = $(".search-overlay__close");
        this.searchOverlay = $(".search-overlay");
        this.searchField =  $("#search-term");
        this.events();
        this.isOverlayOpen = false;
        this.isSearchVisible = false;
        this.typingTimer;
    }
    
    events(){
        this.openButton.on("click", this.openOverlay.bind(this));
        this.closeButton.on("click", this.closeOverlay.bind(this));
        $(document).on("keydown", this.keyPressDispatcher.bind(this));
        this.searchField.on("keydown", this.typingLogic.bind(this));
    }

    typingLogic(){
        clearTimeout(this.typingTimer);
        if (!this.isSearchVisible) {
            this.resultsDiv.html('<div class="spinner-loader"></div>');
            this.isSearchVisible = true;
        }
        this.typingTimer = setTimeout(this.getResults.bind(this), 2000);
    }

    getResults() {
        this.resultsDiv.html("Imagine real search results here...");
        this.isSearchVisible = false;
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