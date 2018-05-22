if(window.loadDscvo !== undefined && window.loadDscvo.length) {
    for(var key in window.loadDscvo) {
        window.loadDscvo[key](jQuery);
    }
}