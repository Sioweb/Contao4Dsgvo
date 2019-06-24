if(window.loadDsgvo !== undefined && window.loadDsgvo.length) {
    for(var key in window.loadDsgvo) {
        window.loadDsgvo[key](jQuery);
    }
}