/**
 * sg-scripts.js
 */(function(e, t) {
    "use strict";
    e.getElementsByTagName("body")[0].className += " js";
    var n = function(e, t) {
        var n = new RegExp("(?:\\s|^)" + t + "(?:\\s|$)");
        return !!e.className.match(n);
    }, r = function(e, t) {
        e.className += " " + t;
    }, i = function(e, t) {
        var n = new RegExp("(?:\\s|^)" + t + "(?:\\s|$)");
        e.className = e.className.replace(n, " ");
    }, s = function(e, t) {
        n(e, t) ? i(e, t) : r(e, t);
    }, o = function(t) {
        var n = e;
        if (n.body.createTextRange) {
            var r = n.body.createTextRange();
            r.moveToElementText(t);
            r.select();
        } else if (window.getSelection) {
            var i = window.getSelection(), r = n.createRange();
            r.selectNodeContents(t);
            i.removeAllRanges();
            i.addRange(r);
        }
    };
    if (!Array.prototype.forEach) e.getElementsByTagName("body")[0].className += " legacy"; else {
        [].forEach.call(e.querySelectorAll(".sg-btn--source"), function(e) {
            e.onclick = function() {
                var e = this, t = e.parentNode.nextElementSibling;
                s(t, "is-active");
                return !1;
            };
        }, !1);
        [].forEach.call(e.querySelectorAll(".sg-btn--select"), function(e) {
            e.onclick = function() {
                o(this.nextSibling);
                s(this, "is-active");
                return !1;
            };
        }, !1);
    }
    window.operamini ? e.getElementsByTagName("body")[0].className += " operamini" : prettyPrint();
})(document);