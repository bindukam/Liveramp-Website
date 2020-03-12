/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 489);
/******/ })
/************************************************************************/
/******/ ({

/***/ 2:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var utilities_root__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(3);
null==utilities_root__WEBPACK_IMPORTED_MODULE_0__["default"].Wistia&&(utilities_root__WEBPACK_IMPORTED_MODULE_0__["default"].Wistia={});var W=utilities_root__WEBPACK_IMPORTED_MODULE_0__["default"].Wistia;null==W._initializers&&(W._initializers={}),null==W._destructors&&(W._destructors={}),null==W.mixin&&(W.mixin=function(klass,obj){for(var k in obj)obj.hasOwnProperty(k)&&(klass[k]=obj[k])});/* harmony default export */ __webpack_exports__["default"] = (utilities_root__WEBPACK_IMPORTED_MODULE_0__["default"].Wistia);

/***/ }),

/***/ 3:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
function _typeof2(obj){return _typeof2="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function _typeof2(obj){return typeof obj}:function _typeof2(obj){return obj&&"function"==typeof Symbol&&obj.constructor===Symbol&&obj!==Symbol.prototype?"symbol":typeof obj},_typeof2(obj)}function _typeof(obj){return _typeof="function"==typeof Symbol&&"symbol"===_typeof2(Symbol.iterator)?function _typeof(obj){return _typeof2(obj)}:function _typeof(obj){return obj&&"function"==typeof Symbol&&obj.constructor===Symbol&&obj!==Symbol.prototype?"symbol":_typeof2(obj)},_typeof(obj)}/* global globalThis */var root;try{root=self,root.self!==root&&_typeof(root.self)!==void 0&&"undefined"!=typeof window&&(root=window)}catch(err){root="undefined"==typeof globalThis?window:globalThis}/* harmony default export */ __webpack_exports__["default"] = (root);

/***/ }),

/***/ 489:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var wistia_namespace_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(2);
var translations={AUDIO_DESCRIPTION_OFF:"\u5173\u95ED",CAPTIONS_HIDE_MENU:"\u9690\u85CF\u5B57\u5E55\u83DC\u5355",CAPTIONS_OFF:"\u5173\u95ED",CAPTIONS_SHOW_MENU:"\u663E\u793A\u5B57\u5E55\u83DC\u5355",CAPTIONS_READ_TRANSCRIPT:"\u641C\u7D22\u89C6\u9891",CHAPTERS_CLOSE_CHAPTERS:"\u5173\u95ED\u7AE0\u8282",CHAPTERS_OPEN_CHAPTERS:"\u6253\u5F00\u7AE0\u8282",CLICK_FOR_SOUND_DESKTOP_TEXT:"\u70B9\u51FB\u64AD\u653E\u58F0\u97F3",CLICK_FOR_SOUND_MOBILE_TEXT:"\u70B9\u6309\u64AD\u653E\u58F0\u97F3",CONTEXT_MENU_ABOUT_WISTIA:"\u5173\u4E8EWistia",CONTEXT_MENU_COPIED:"\u5DF2\u590D\u5236\uFF01",CONTEXT_MENU_COPY_LINK_AND_THUMBNAIL:"\u590D\u5236\u94FE\u63A5\u548C\u7F29\u7565\u56FE",CONTEXT_MENU_LOGGED_IN_TO_WISTIA:"\u5DF2\u767B\u5F55Wistia",CONTEXT_MENU_OPEN_VIDEO_IN_WISTIA:"\u5728Wistia\u91CC\u6253\u5F00\u89C6\u9891",CONTEXT_MENU_REPORT_A_PROBLEM:"\u62A5\u544A\u95EE\u9898",CONTEXT_MENU_VIEW_STATS_IN_WISTIA:"\u5728Wistia\u91CC\u67E5\u770B\u7EDF\u8BA1\u4FE1\u606F",CUSTOMER_LOGO_LOGO:"\u6807\u5FD7",FULLSCREEN_DOUBLE_TAP:"Double-tap to zoom in or out",FULLSCREEN_TITLE_WHEN_IN_FULLSCREEN:"\u9000\u51FA\u5168\u5C4F",FULLSCREEN_TITLE_WHEN_NOT_IN_FULLSCREEN:"\u5168\u5C4F",LAYOUT_TITLE:"\u89C6\u9891",PLAY_BUTTON_TITLE_WHEN_NOT_PLAYING:"\u64AD\u653E",PLAY_BUTTON_TITLE_WHEN_PLAYING:"\u6682\u505C",REPORT_A_PROBLEM_ADD_DETAILS_TEXT:"\u8BF7\u6DFB\u52A0\u8BE6\u7EC6\u4FE1\u606F",REPORT_A_PROBLEM_CANCEL:"Cancel",REPORT_A_PROBLEM_CHOOSE_ONE:"\u9009\u4E00\u4E2A",REPORT_A_PROBLEM_DESCRIPTION:"\u611F\u8C22\u60A8\u62A5\u544A\u95EE\u9898\u3002\u6211\u4EEC\u5C06\u9644\u4E0A\u5173\u4E8E\u6B64\u6B21\u4F1A\u8BDD\u7684\u6280\u672F\u6570\u636E\uFF0C\u4EE5\u5E2E\u52A9\u6211\u4EEC\u627E\u51FA\u95EE\u9898\u6240\u5728\u3002\u54EA\u4E00\u9879\u6700\u80FD\u63CF\u8FF0\u8FD9\u4E2A\u95EE\u9898\uFF1F",REPORT_A_PROBLEM_DISMISS:"\u53D6\u6D88",REPORT_A_PROBLEM_FAILS_TO_PLAY:"\u89C6\u9891\u65E0\u6CD5\u64AD\u653E",REPORT_A_PROBLEM_OTHER:"\u5176\u4ED6",REPORT_A_PROBLEM_OTHER_CONTEXT:"\u5176\u4ED6\u7EC6\u8282\u6216\u80CC\u666F\u4FE1\u606F\uFF1F",REPORT_A_PROBLEM_POOR_QUALITY:"\u89C6\u9891\u8D28\u91CF\u5DEE",REPORT_A_PROBLEM_PROBLEM_CATEGORY:"\u95EE\u9898\u7C7B\u522B",REPORT_A_PROBLEM_PROBLEM_DESCRIPTION:"\u95EE\u9898\u63CF\u8FF0",REPORT_A_PROBLEM_SELECT_CAT_TEXT:"\u8BF7\u9009\u62E9\u4E00\u4E2A\u7C7B\u522B",REPORT_A_PROBLEM_SEND:"\u53D1\u9001",REPORT_A_PROBLEM_SENDING:"\u53D1\u9001\u4E2D...",REPORT_A_PROBLEM_STUTTER:"\u89C6\u9891\u80FD\u64AD\u653E\uFF0C\u4F46\u7ECF\u5E38\u5361\u987F",REWATCH:"\u91CD\u770B",SETTINGS_PLAYBACK_RATE_TITLE:"\u901F\u5EA6",SETTINGS_QUALITY_AUTO:"\u81EA\u52A8",SETTINGS_QUALITY_TITLE:"\u8D28\u91CF",SETTINGS_TITLE:"Settings",SHARE_CONTROL_CLOSE:"\u5173\u95ED\u5171\u4EAB\u83DC\u5355",SHARE_CONTROL_OPEN:"\u6253\u5F00\u5171\u4EAB\u83DC\u5355",SHARE_COPIED:"\u5DF2\u590D\u5236\uFF01",SHARE_DOWNLOAD:"\u4E0B\u8F7D",SHARE_EMAIL:"Email",SHARE_EMBED:"\u5185\u5D4C",SHARE_FACEBOOK:"Facebook",SHARE_LINKED_IN:"LinkedIn",SHARE_TWITTER:"Twitter",SKIP:"\u8DF3\u8FC7",STATUS_BAR_EMBED_CODE_COPIED:"\u5D4C\u5165\u4EE3\u7801\u5DF2\u590D\u5236\u5230\u60A8\u7684\u526A\u8D34\u677F\uFF01",THUMBNAIL_VIDEO_THUMBNAIL:"\u89C6\u9891\u7F29\u7565\u56FE",TURNSTILE_DEFAULT_END:"\u611F\u8C22\u89C2\u770B\uFF01 \n\u8BF7\u8F93\u5165\u60A8\u7684\u90AE\u4EF6\u5730\u5740\u3002",TURNSTILE_DEFAULT_START:"\u8BF7\u8F93\u5165\u60A8\u7684\u90AE\u4EF6\u5730\u5740\u4EE5\u67E5\u770B\u6B64\u89C6\u9891\u3002",TURNSTILE_EMAIL_PLACEHOLDER:"\u60A8\u7684\u90AE\u4EF6",TURNSTILE_FIRST_NAME_PLACEHOLDER:"\u540D\u5B57",TURNSTILE_LAST_NAME_PLACEHOLDER:"\u59D3\u6C0F",TURNSTILE_PLAY:"\u64AD\u653E",TURNSTILE_SUBMIT:"\u63D0\u4EA4",VOLUME_TITLE_VOLUME_SLIDER:"\u97F3\u91CF\u8C03\u8282",VOLUME_TITLE_WHEN_MUTED:"\u53D6\u6D88\u9759\u97F3",VOLUME_TITLE_WHEN_UNMUTED:"\u9759\u97F3",WATCH_NEXT_NEXT_VIDEO_PLAYS_IN:"The next video plays in..."};wistia_namespace_js__WEBPACK_IMPORTED_MODULE_0__["default"].defineLanguage("zh-CN","Chinese (Simplified)",translations),wistia_namespace_js__WEBPACK_IMPORTED_MODULE_0__["default"].define("translations/zh-CN.js",void 0);

/***/ })

/******/ });