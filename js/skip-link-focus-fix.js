/**
 * Skip Link Focus v0.1.0
 * https://github.com/cedaro/skip-link-focus
 *
 * @copyright Modifications Copyright (c) 2015 Cedaro, LLC
 * @license BSD-3-Clause
 */
(function(e,t){"use strict";if("function"===typeof define&&define.amd){define([],t)}else if("object"===typeof exports){module.exports=t()}else{e.skipLinkFocus=t()}})(this,function(){"use strict";function e(){if(window&&/webkit|opera|msie/i.test(window.navigator.userAgent)&&window.addEventListener){var e,i=window.document.querySelectorAll(".skip-link");window.addEventListener("hashchange",function(){n(location.hash.substring(1))},false);for(e=0;e<i.length;++e){i[e].addEventListener("click",t)}}}function t(e){n(e.target.hash.substring(1))}function n(e){var t;if(!/^[A-z0-9_-]+$/.test(e)){return}t=window.document.getElementById(e);if(t){if(!/^(?:a|select|input|button|textarea)$/i.test(t.tagName)){t.tabIndex=-1}t.focus()}}return{init:e,skipToElement:n}});
