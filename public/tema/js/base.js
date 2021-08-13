/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!***********************************!*\
  !*** ./resources/tema/js/base.js ***!
  \***********************************/
$(function () {
  $('.subnavbar').find('li').each(function (i) {
    var mod = i % 3;

    if (mod === 2) {
      $(this).addClass('subnavbar-open-right');
    }
  });
});
/******/ })()
;