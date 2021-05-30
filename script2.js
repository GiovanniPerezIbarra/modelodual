/*

  Pure CSS Button Animation
  Author: Yohaan Chokhany
  
  The JavaScript code is for the copy functionality ONLY. There is no code for the buttons here. Please click on a button to copy its code.

*/

document.getElementById("btn1").onclick = function() { openModal(1) };
document.getElementById("btn2").onclick = function() { openModal(2) };
document.getElementById("btn3").onclick = function() { openModal(3) };
document.getElementById("btn4").onclick = function() { openModal(4) };
document.getElementById("btn5").onclick = function() { openModal(5) };
document.getElementById("btn6").onclick = function() { openModal(6) };
document.getElementById("btn7").onclick = function() { openModal(7) };
document.getElementById("btn8").onclick = function() { openModal(8) };
document.getElementById("btn9").onclick = function() { openModal(9) };
document.getElementById("btn10").onclick = function() { openModal(10) };
document.getElementById("btn11").onclick = function() { openModal(11) };
document.getElementById("btn12").onclick = function() { openModal(12) };
document.getElementById("btn13").onclick = function() { openModal(13) };
document.getElementById("btn14").onclick = function() { openModal(14) };
document.getElementById("btn15").onclick = function() { openModal(15) };
document.getElementById("btn16").onclick = function() { openModal(16) };
document.getElementById("btn17").onclick = function() { openModal(17) };
document.getElementById("btn18").onclick = function() { openModal(18) };
document.getElementById("btn19").onclick = function() { openModal(19) };
document.getElementById("btn20").onclick = function() { openModal(20) };
document.getElementById("btn21").onclick = function() { openModal(21) };
document.getElementById("btn22").onclick = function() { openModal(22) };
document.getElementById("btn23").onclick = function() { openModal(23) };
document.getElementById("btn24").onclick = function() { openModal(24) };
document.getElementById("btn25").onclick = function() { openModal(25) };
document.getElementById("btn26").onclick = function() { openModal(26) };
document.getElementById("btn27").onclick = function() { openModal(27) };
document.getElementById("btn28").onclick = function() { openModal(28) };

var modal = document.getElementById("modal");
var modalBox = document.getElementById("modal-box");
var modalBoxButtons = document.getElementById("modal-box-buttons");
var copyHTML = document.getElementById("copy-html");
var copyCSS = document.getElementById("copy-css");
var cssButton = document.getElementById("css-button");
var htmlButton = document.getElementById("html-button");
var selected = "HTML";
var modalId;
var content = document.getElementsByClassName("content");
var close = document.getElementById("closeModal");
var copyButton = document.getElementById("copy-button");
var copyTextarea = document.getElementById("copy-textarea");
var copyMessage = document.getElementById("copy-message");
var clicked = false;

window.onclick = function(event) {
  if (modal.style.display == "block") {
    if (event.target == modal || event.target == modalBoxButtons || event.target == close || event.target == copyButton || event.target == modalBox) {
      closeModal();
    }
  }
}

function openModal(chosenModalId) {
  modalId = chosenModalId;
  copyHTML.innerHTML = '&lt;link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Marvel"&gt;<br><br>&lt;button class="btn-' + modalId + '"&gt;<br>&nbsp;&nbsp;&lt;span&gt;Click here&lt;/span&gt;<br>&lt;/button&gt;';
  copyCSS.innerHTML = '.btn-' + modalId + ' {<br>&nbsp;&nbsp;cursor: pointer;<br>&nbsp;&nbsp;letter-spacing: 2px;<br>&nbsp;&nbsp;text-transform: uppercase;<br>&nbsp;&nbsp;font-family: Marvel;<br>&nbsp;&nbsp;font-size: 20pt;<br>&nbsp;&nbsp;width: 200px;<br>&nbsp;&nbsp;height: 45px;<br>&nbsp;&nbsp;position: relative;<br>&nbsp;&nbsp;border: solid #777 2px;<br>&nbsp;&nbsp;color: #777;<br>&nbsp;&nbsp;z-index: 1;<br>&nbsp;&nbsp;transition: all 0.5s ease-in-out;<br>&nbsp;&nbsp;border-radius: 5px;<br>'
  if (modalId == 1) {
    copyCSS.innerHTML += '&nbsp;&nbsp;background: transparent;<br>&nbsp;&nbsp;padding: 0;<br>}<br><br>.btn-1 span {<br>&nbsp;&nbsp;position: relative;<br>&nbsp;&nbsp;display: block;<br>&nbsp;&nbsp;width: 100%;<br>&nbsp;&nbsp;height: 100%;<br>&nbsp;&nbsp;padding-top: 5px;<br>&nbsp;&nbsp;transition: 0.5s ease-in-out;<br>}<br><br>.btn-1:before, .btn-1:after {<br>&nbsp;&nbsp;position: absolute;<br>&nbsp;&nbsp;content: "";<br>&nbsp;&nbsp;right: 0;<br>&nbsp;&nbsp;bottom: 0;<br>&nbsp;&nbsp;background: red;<br>&nbsp;&nbsp;transition: all 0.5s ease-in-out;<br>}<br><br>.btn-1:before {<br>&nbsp;&nbsp;height: 0%;<br>&nbsp;&nbsp;width: 2px;<br>&nbsp;&nbsp;top: 50%;<br>}<br><br>.btn-1:after {<br>&nbsp;&nbsp;width: 0%;<br>&nbsp;&nbsp;height: 2px;<br>&nbsp;&nbsp;left: 50%;<br>}<br><br>.btn-1:hover:before {<br>&nbsp;&nbsp;height: 100%;<br>&nbsp;&nbsp;top: 0%;<br>&nbsp;&nbsp;background: red;<br>}<br><br>.btn-1:hover:after {<br>&nbsp;&nbsp;width: 100%;<br>&nbsp;&nbsp;left: 0%;<br>&nbsp;&nbsp;background: red;<br>}<br><br>.btn-1:hover {<br>&nbsp;&nbsp;background: transparent;<br>&nbsp;&nbsp;border-color: transparent;<br>}<br><br>.btn-1 span:hover {<br>&nbsp;&nbsp;color: red;<br>}<br><br>.btn-1 span:before, .btn-1 span:after {<br>&nbsp;&nbsp;position: absolute;<br>content: "";<br>&nbsp;&nbsp;left: 0;<br>&nbsp;&nbsp;top: 0;<br>&nbsp;&nbsp;background: #333;<br>&nbsp;&nbsp;transition: all 0.5s ease-in-out;<br>}<br><br>.btn-1 span:before {<br>&nbsp;&nbsp;width: 2px;<br>&nbsp;&nbsp;height: 0%;<br>&nbsp;&nbsp;top: 50%;<br>}<br><br>.btn-1 span:after {<br>&nbsp;&nbsp;height: 2px;<br>&nbsp;&nbsp;width: 0%;<br>&nbsp;&nbsp;left: 50%;<br>}<br><br>.btn-1 span:hover:before {<br>&nbsp;&nbsp;height: 41px;<br>&nbsp;&nbsp;top: 0%;<br>&nbsp;&nbsp;background: red;<br>}<br><br>.btn-1 span:hover:after {<br>&nbsp;&nbsp;width: 100%;<br>&nbsp;&nbsp;left: 0%; <br>&nbsp;&nbsp;background: red;<br>}<br><br>.btn-1:active {<br>&nbsp;&nbsp;background-color: #00a7fc;<br>&nbsp;&nbsp;border-color: #00a7fc;<br>}<br><br>.btn-1:active:before, .btn-1:active:after {<br>&nbsp;&nbsp;background-color: #00a7fc;<br>}<br><br>.btn-1 span:active {<br>&nbsp;&nbsp;color: #333;<br>}<br><br>.btn-1 span:active:before, .btn-1 span:active:after {<br>&nbsp;&nbsp;background-color: #00a7fc;<br>}'
  } else if (modalId == 2) {
    copyCSS.innerHTML += '&nbsp;&nbsp;background-image: -webkit-linear-gradient(30deg, transparent 50%, red 50%);<br>&nbsp;&nbsp;background-image: linear-gradient(30deg, transparent 50%, red 50%);<br>&nbsp;&nbsp;background-size: 298%;<br>&nbsp;&nbsp;background-color: transparent;<br>&nbsp;&nbsp;background-repeat: no-repeat;<br>&nbsp;&nbsp;background-position: 0%;<br>}<br><br>.btn-2:hover {<br>&nbsp;&nbsp;background-position: 100%;<br>&nbsp;&nbsp;color: #f1f1f1;<br>&nbsp;&nbsp;border-color: red;<br>}<br><br>.btn-2:active {<br>&nbsp;&nbsp;background-color: #00a7fc;<br>&nbsp;&nbsp;color: #333;<br>&nbsp;&nbsp;background-position: 0%;<br>&nbsp;&nbsp;border-color: #00a7fc;<br>}'
  } else if (modalId == 3) {
    copyCSS.innerHTML += '&nbsp;&nbsp;background: transparent;<br>}<br><br>.btn-3:before {<br>&nbsp;&nbsp;content: "";<br>&nbsp;&nbsp;width: 100%;<br>&nbsp;&nbsp;height: 100%;<br>&nbsp;&nbsp;position: absolute;<br>&nbsp;&nbsp;top: 0;<br>&nbsp;&nbsp;left: 0;<br>&nbsp;&nbsp;background: red;<br>&nbsp;&nbsp;transform: scale(0);<br>&nbsp;&nbsp;transition: 0.5s ease-in-out;<br>&nbsp;&nbsp;z-index: -1;<br>}<br><br>.btn-3:hover:before {<br>&nbsp;&nbsp;transform: scale(1);<br>}<br><br>.btn-3:hover {<br>&nbsp;&nbsp;color: #f1f1f1;<br>&nbsp;&nbsp;border-color: red;<br>}<br><br>.btn-3:active:before {<br>&nbsp;&nbsp;background-color: #00a7fc;<br>}<br><br>.btn-3:active {<br>&nbsp;&nbsp;border-color: #00a7fc;<br>&nbsp;&nbsp;color: #333;<br>&nbsp;&nbsp;background-color: #00a7fc;<br>}'
  } else if (modalId == 4) {
    copyCSS.innerHTML += '&nbsp;&nbsp;background: red;<br>}<br><br>.btn-4:before {<br>&nbsp;&nbsp;content: "";<br>&nbsp;&nbsp;width: 100%;<br>&nbsp;&nbsp;height: 100%;<br>&nbsp;&nbsp;position: absolute;<br>&nbsp;&nbsp;top: 0;<br>&nbsp;&nbsp;left: 0;<br>&nbsp;&nbsp;background-color: #fff; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;// Change background-color to your preference;<br>&nbsp;&nbsp;transform: scale(1);<br>&nbsp;&nbsp;transition: 0.5s ease-in-out;<br>&nbsp;&nbsp;z-index: -1;<br>}<br><br>.btn-4:hover:before {<br>&nbsp;&nbsp;transform: scale(0);<br>}<br><br>.btn-4:hover {<br>&nbsp;&nbsp;color: #f1f1f1;<br>&nbsp;&nbsp;border-color: red;<br>}<br><br>.btn-4:active {<br>&nbsp;&nbsp;border-color: #00a7fc;<br>&nbsp;&nbsp;color: #333;<br>&nbsp;&nbsp;background-color: #00a7fc;<br>}<br><br>.btn-4:active:before {<br>&nbsp;&nbsp;background-color: #00a7fc;<br>}'
  } else if (modalId == 5) {
    copyCSS.innerHTML += '&nbsp;&nbsp;background: transparent;<br>}<br><br>.btn-5:before {<br>&nbsp;&nbsp;content: "";<br>&nbsp;&nbsp;width: 0%;<br>&nbsp;&nbsp;height: 100%;<br>&nbsp;&nbsp;position: absolute;<br>&nbsp;&nbsp;top: 0;<br>&nbsp;&nbsp;right: 0;<br>&nbsp;&nbsp;background-color: red;<br>&nbsp;&nbsp;transition: 0.5s ease-in-out;<br>&nbsp;&nbsp;z-index: -1;<br>}<br><br>.btn-5:hover:before {<br>&nbsp;&nbsp;width: 100%;<br>}<br><br>.btn-5:hover {<br>&nbsp;&nbsp;color: #f1f1f1;<br>&nbsp;&nbsp;border-color: red;<br>}<br><br>.btn-5:active:before {<br>&nbsp;&nbsp;background-color: #00a7fc;<br>}<br><br>.btn-5:active {<br>&nbsp;&nbsp;border-color: #00a7fc;<br>&nbsp;&nbsp;background-color: #00a7fc;<br>&nbsp;&nbsp;color: #333;<br>}';
  } else if (modalId == 6) {
    copyCSS.innerHTML += '&nbsp;&nbsp;background: transparent;<br>}<br><br>.btn-6:before {<br>&nbsp;&nbsp;content: "";<br>&nbsp;&nbsp;width: 0%;<br>&nbsp;&nbsp;height: 100%;<br>&nbsp;&nbsp;position: absolute;<br>&nbsp;&nbsp;top: 0;<br>&nbsp;&nbsp;left: 0;<br>&nbsp;&nbsp;background-color: red;<br>&nbsp;&nbsp;transition: 0.5s ease-in-out;<br>&nbsp;&nbsp;z-index: -1;<br>}<br><br>.btn-6:hover:before {<br>&nbsp;&nbsp;width: 100%;<br>}<br><br>.btn-6:hover {<br>&nbsp;&nbsp;color: #f1f1f1;<br>&nbsp;&nbsp;border-color: red;<br>}<br><br>.btn-6:active:before {<br>&nbsp;&nbsp;background-color: #00a7fc;<br>}<br><br>.btn-6:active {<br>&nbsp;&nbsp;border-color: #00a7fc;<br>&nbsp;&nbsp;background-color: #00a7fc;<br>&nbsp;&nbsp;color: #333;<br>}';
  } else if (modalId == 7) {
    copyCSS.innerHTML += '&nbsp;&nbsp;background: transparent;<br>}<br><br>.btn-7:before {<br>&nbsp;&nbsp;content: "";<br>&nbsp;&nbsp;width: 100%;<br>&nbsp;&nbsp;height: 0%;<br>&nbsp;&nbsp;position: absolute;<br>&nbsp;&nbsp;top: 0;<br>&nbsp;&nbsp;right: 0;<br>&nbsp;&nbsp;background-color: red;<br>&nbsp;&nbsp;transition: 0.5s ease-in-out;<br>&nbsp;&nbsp;z-index: -1;<br>}<br><br>.btn-7:hover:before {<br>&nbsp;&nbsp;height: 100%;<br>}<br><br>.btn-7:hover {<br>&nbsp;&nbsp;color: #f1f1f1;<br>&nbsp;&nbsp;border-color: red;<br>}<br><br>.btn-7:active:before {<br>&nbsp;&nbsp;background-color: #00a7fc;<br>}<br><br>.btn-7:active {<br>&nbsp;&nbsp;border-color: #00a7fc;<br>&nbsp;&nbsp;background-color: #00a7fc;<br>&nbsp;&nbsp;color: #333;<br>}';
  } else if (modalId == 8) {
    copyCSS.innerHTML += '&nbsp;&nbsp;background: transparent;<br>}<br><br>.btn-8:before {<br>&nbsp;&nbsp;content: "";<br>&nbsp;&nbsp;width: 100%;<br>&nbsp;&nbsp;height: 0%;<br>&nbsp;&nbsp;position: absolute;<br>&nbsp;&nbsp;bottom: 0;<br>&nbsp;&nbsp;right: 0;<br>&nbsp;&nbsp;background-color: red;<br>&nbsp;&nbsp;transition: 0.5s ease-in-out;<br>&nbsp;&nbsp;z-index: -1;<br>}<br><br>.btn-8:hover:before {<br>&nbsp;&nbsp;height: 100%;<br>}<br><br>.btn-8:hover {<br>&nbsp;&nbsp;color: #f1f1f1;<br>&nbsp;&nbsp;border-color: red;<br>}<br><br>.btn-8:active:before {<br>&nbsp;&nbsp;background-color: #00a7fc;<br>}<br><br>.btn-8:active {<br>&nbsp;&nbsp;border-color: #00a7fc;<br>&nbsp;&nbsp;background-color: #00a7fc;<br>&nbsp;&nbsp;color: #333;<br>}';
  } else if (modalId == 9) {
    copyCSS.innerHTML += '&nbsp;&nbsp;background: transparent;<br>}<br><br>.btn-9:before {<br>&nbsp;&nbsp;content: "";<br>&nbsp;&nbsp;width: 0%;<br>&nbsp;&nbsp;height: 100%;<br>&nbsp;&nbsp;position: absolute;<br>&nbsp;&nbsp;top: 0;<br>&nbsp;&nbsp;right: 50%;<br>&nbsp;&nbsp;background-color: red;<br>&nbsp;&nbsp;transition: 0.5s ease-in-out;<br>&nbsp;&nbsp;z-index: -1;<br>}<br><br>.btn-9:hover:before {<br>&nbsp;&nbsp;width: 100%;<br>&nbsp;&nbsp;right: 0%;<br>}<br><br>.btn-9:hover {<br>&nbsp;&nbsp;color: #f1f1f1;<br>&nbsp;&nbsp;border-color: red;<br>}<br><br>.btn-9:active {<br>&nbsp;&nbsp;color: #333;<br>&nbsp;&nbsp;border-color: #00a7fc;<br>&nbsp;&nbsp;background-color: #00a7fc;<br><br>.btn-9:active:before {<br>&nbsp;&nbsp;background-color: #00a7fc;<br>}';
  } else if (modalId == 10) {
    copyCSS.innerHTML += '&nbsp;&nbsp;background: red;<br>}<br><br>.btn-10:before {<br>&nbsp;&nbsp;content: "";<br>&nbsp;&nbsp;width: 100%;<br>&nbsp;&nbsp;height: 100%;<br>&nbsp;&nbsp;position: absolute;<br>&nbsp;&nbsp;top: 0;<br>&nbsp;&nbsp;right: 0%;<br>&nbsp;&nbsp;background-color: #fff; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;// Change background-color to your preference;<br>&nbsp;&nbsp;transition: 0.5s ease-in-out;<br>&nbsp;&nbsp;z-index: -1;<br>}<br><br>.btn-10:hover:before {<br>&nbsp;&nbsp;width: 0%;<br>&nbsp;&nbsp;right: 50%;<br>}<br><br>.btn-10:hover {<br>&nbsp;&nbsp;color: #f1f1f1;<br>&nbsp;&nbsp;border-color: red;<br>}<br><br>.btn-10:active {<br>&nbsp;&nbsp;color: #333;<br>&nbsp;&nbsp;border-color: #00a7fc;<br>&nbsp;&nbsp;background-color: #00a7fc;<br>}<br><br>.btn-10:active:before {<br>&nbsp;&nbsp;background-color: #00a7fc;<br>}';
  } else if (modalId == 11) {
    copyCSS.innerHTML += '&nbsp;&nbsp;background: transparent;<br>}<br><br>.btn-11:before {<br>&nbsp;&nbsp;content: "";<br>&nbsp;&nbsp;width: 100%;<br>&nbsp;&nbsp;height: 0%;<br>&nbsp;&nbsp;position: absolute;<br>&nbsp;&nbsp;top: 50%;<br>&nbsp;&nbsp;right: 0%;<br>&nbsp;&nbsp;background-color: red;<br>&nbsp;&nbsp;transition: 0.5s ease-in-out;<br>&nbsp;&nbsp;z-index: -1;<br>}<br><br>.btn-11:hover:before {<br>&nbsp;&nbsp;height: 100%;<br>&nbsp;&nbsp;top: 0%;<br>}<br><br>.btn-11:hover {<br>&nbsp;&nbsp;color: #f1f1f1;<br>&nbsp;&nbsp;border-color: red;<br>}<br><br>.btn-11:active {<br>&nbsp;&nbsp;color: #333;<br>&nbsp;&nbsp;border-color: #00a7fc;<br>&nbsp;&nbsp;background-color: #00a7fc;<br>}<br><br>.btn-11:active:before {<br>&nbsp;&nbsp;background-color: #00a7fc;<br>}';
  } else if (modalId == 12) {
    copyCSS.innerHTML += '&nbsp;&nbsp;background: red;<br>}<br><br>.btn-12:before {<br>&nbsp;&nbsp;content: "";<br >&nbsp;&nbsp;width: 100%;<br>&nbsp;&nbsp;height: 100%;<br>&nbsp;&nbsp;position: absolute;<br>&nbsp;&nbsp;top: 0%;<br>&nbsp;&nbsp;right: 0%;<br>&nbsp;&nbsp;background-color: #fff; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;// Change background-color to your preference;<br>&nbsp;&nbsp;transition: 0.5s ease-in-out;<br>&nbsp;&nbsp;z-index: -1;<br>}<br><br>.btn-12:hover:before {<br>&nbsp;&nbsp;height: 0%;<br>&nbsp;&nbsp;top: 50%;<br>}<br><br>.btn-12:hover {<br>&nbsp;&nbsp;color: #f1f1f1;<br>&nbsp;&nbsp;border-color: red;<br>}<br><br>.btn-12:active {<br>&nbsp;&nbsp;color: #333;<br>&nbsp;&nbsp;border-color: #00a7fc;<br>&nbsp;&nbsp;background-color: #00a7fc;<br>}<br><br>.btn-12:active:before {<br>&nbsp;&nbsp;background-color: #00a7fc;<br>}';
  } else if (modalId == 13) {
    copyCSS.innerHTML += '&nbsp;&nbsp;background-color: transparent;<br>}<br><br>.btn-13:hover {<br>&nbsp;&nbsp;color: #f1f1f1;<br>&nbsp;&nbsp;border-color: red;<br>}<br><br>.btn-13:hover:before {<br>&nbsp;&nbsp;left: 0%;<br>&nbsp;&nbsp;right: auto;<br>&nbsp;&nbsp;width: 100%;<br>}<br><br>.btn-13:before {<br>&nbsp;&nbsp;position: absolute;<br>&nbsp;&nbsp;top: 0px;<br>&nbsp;&nbsp;right: 0px;<br>&nbsp;&nbsp;width: 0%;<br>&nbsp;&nbsp;height: 100%;<br>&nbsp;&nbsp;z-index: -1;<br>&nbsp;&nbsp;content: "";<br>&nbsp;&nbsp;color: #f1f1f1;<br>&nbsp;&nbsp;background: red;<br>&nbsp;&nbsp;transition: all 500ms ease-in-out;<br>}<br><br>.btn-13:active:before {<br>&nbsp;&nbsp;background-color: #00a7fc;<br>}<br><br>.btn-13:active {<br>&nbsp;&nbsp;color: #333;<br>&nbsp;&nbsp;background-color: #00a7fc;<br>&nbsp;&nbsp;border-color: #00a7fc;<br>}';
  } else if (modalId == 14) {
    copyCSS.innerHTML += '&nbsp;&nbsp;background-color: transparent;<br>}<br><br>.btn-14:hover {<br>&nbsp;&nbsp;color: #f1f1f1;<br>&nbsp;&nbsp;border-color: red;<br>}<br><br>.btn-14:hover:before {<br>&nbsp;&nbsp;right: 0%;<br>&nbsp;&nbsp;left: auto;<br>&nbsp;&nbsp;width: 100%;<br>}<br><br>.btn-14:before {<br>&nbsp;&nbsp;position: absolute;<br>&nbsp;&nbsp;top: 0px;<br>&nbsp;&nbsp;left: 0px;<br>&nbsp;&nbsp;width: 0%;<br>&nbsp;&nbsp;height: 100%;<br>&nbsp;&nbsp;z-index: -1;<br>&nbsp;&nbsp;content: "";<br>&nbsp;&nbsp;color: #f1f1f1;<br>&nbsp;&nbsp;background: red;<br>&nbsp;&nbsp;transition: all 500ms ease-in-out;<br>}<br><br>.btn-14:active:before {<br>&nbsp;&nbsp;background-color: #00a7fc;<br>}<br><br>.btn-14:active {<br>&nbsp;&nbsp;color: #333;<br>&nbsp;&nbsp;background-color: #00a7fc;<br>&nbsp;&nbsp;border-color: #00a7fc;<br>}';
  } else if (modalId == 15) {
    copyCSS.innerHTML += '&nbsp;&nbsp;background-color: transparent;<br>}<br><br>.btn-15:hover {<br>&nbsp;&nbsp;color: #f1f1f1;<br>&nbsp;&nbsp;border-color: red;<br>}<br><br>.btn-15:hover:before {<br>&nbsp;&nbsp;bottom: 0%;<br>&nbsp;&nbsp;top: auto;<br>&nbsp;&nbsp;height: 100%;<br>}<br><br>.btn-15:before {<br>&nbsp;&nbsp;position: absolute;<br>&nbsp;&nbsp;top: 0px;<br>&nbsp;&nbsp;left: 0px;<br>&nbsp;&nbsp;height: 0%;<br>&nbsp;&nbsp;width: 100%;<br>&nbsp;&nbsp;z-index: -1;<br>&nbsp;&nbsp;content: "";<br>&nbsp;&nbsp;color: #f1f1f1;<br>&nbsp;&nbsp;background: red;<br>&nbsp;&nbsp;transition: all 500ms ease-in-out;<br>}<br><br>.btn-15:active:before {<br>&nbsp;&nbsp;background-color: #00a7fc;<br>}<br><br>.btn-15:active {<br>&nbsp;&nbsp;color: #333;<br>&nbsp;&nbsp;background-color: #00a7fc;<br>&nbsp;&nbsp;border-color: #00a7fc;<br>}';
  } else if (modalId == 16) {
    copyCSS.innerHTML += '&nbsp;&nbsp;background-color: transparent;<br>}<br><br>.btn-16:hover {<br>&nbsp;&nbsp;color: #f1f1f1;<br>&nbsp;&nbsp;border-color: red;<br>}<br><br>.btn-16:hover:before {<br>&nbsp;&nbsp;top: 0%;<br>&nbsp;&nbsp;bottom: auto;<br>&nbsp;&nbsp;height: 100%;<br>}<br><br>.btn-16:before {<br>&nbsp;&nbsp;position: absolute;<br>&nbsp;&nbsp;bottom: 0px;<br>&nbsp;&nbsp;left: 0px;<br>&nbsp;&nbsp;height: 0%;<br>&nbsp;&nbsp;width: 100%;<br>&nbsp;&nbsp;z-index: -1;<br>&nbsp;&nbsp;content: "";<br>&nbsp;&nbsp;color: #f1f1f1;<br>&nbsp;&nbsp;background: red;<br>&nbsp;&nbsp;transition: all 500ms ease-in-out;<br>}<br><br>.btn-16:active:before {<br>&nbsp;&nbsp;background-color: #00a7fc;<br>}<br><br>.btn-16:active {<br>&nbsp;&nbsp;color: #333;<br>&nbsp;&nbsp;background-color: #00a7fc;<br>&nbsp;&nbsp;border-color: #00a7fc;<br>}';
  } else if (modalId == 17) {
    copyCSS.innerHTML += '&nbsp;&nbsp;background: transparent;<br>&nbsp;&nbsp;overflow: hidden;<br>&nbsp;&nbsp;transition: all 0.3s ease-in-out 0s;<br>}<br><br>.btn-17:before {<br>&nbsp;&nbsp;content: "";<br>&nbsp;&nbsp;height: 0%;<br>&nbsp;&nbsp;width: 0%;<br>&nbsp;&nbsp;background: red;<br>&nbsp;&nbsp;position: absolute;<br>&nbsp;&nbsp;top: 50%;<br>&nbsp;&nbsp;right: 50%;<br>&nbsp;&nbsp;border-radius: 20px;<br>&nbsp;&nbsp;z-index: -1;<br>&nbsp;&nbsp;-webkit-transition: all 0.5s ease;<br>&nbsp;&nbsp;-moz-transition: all 0.5s ease;<br>&nbsp;&nbsp;-ms-transition: all 0.5s ease;<br>&nbsp;&nbsp;transform: translateX(50%) translateY(-50%) rotate(-45deg);<br>}<br><br>.btn-17:hover:before {<br>&nbsp;&nbsp;animation: btn-17 2s;<br>&nbsp;&nbsp;background-color: red;<br>}<br><br>.btn-17:hover {<br>&nbsp;&nbsp;color: #f1f1f1;<br>&nbsp;&nbsp;border-color: red;<br>&nbsp;&nbsp;background-color: red;<br>&nbsp;&nbsp;transition: background-color 0.5s ease-in-out 0.8s;<br>}<br><br>@keyframes btn-17 {<br>&nbsp;&nbsp;0% {<br>&nbsp;&nbsp;&nbsp;&nbsp;height: 0%;<br>&nbsp;&nbsp;&nbsp;&nbsp;width: 0%;<br>&nbsp;&nbsp;}<br><br>&nbsp;&nbsp;25% {<br>&nbsp;&nbsp;&nbsp;&nbsp;height: 250%;<br>&nbsp;&nbsp;&nbsp;&nbsp;width: 600%;<br>&nbsp;&nbsp;}<br><br>&nbsp;&nbsp;50% {<br>&nbsp;&nbsp;&nbsp;&nbsp;height: 600%;<br>&nbsp;&nbsp;&nbsp;&nbsp;width: 600%;<br>&nbsp;&nbsp;}<br><br>&nbsp;&nbsp;75% {<br>&nbsp;&nbsp;&nbsp;&nbsp;height: 100%;<br>&nbsp;&nbsp;&nbsp;&nbsp;width: 600%;<br>&nbsp;&nbsp;}<br><br>&nbsp;&nbsp;100% {<br>&nbsp;&nbsp;&nbsp;&nbsp;height: 0%;<br>&nbsp;&nbsp;&nbsp;&nbsp;width: 0%;<br>&nbsp;&nbsp;}<br><br>}';
  } else if (modalId == 18) {
    copyCSS.innerHTML += '&nbsp;&nbsp;background: transparent;<br>&nbsp;&nbsp;overflow: hidden;<br>&nbsp;&nbsp;transition: all 0.3s ease-in-out 0s;<br>}<br><br>.btn-18:before {<br>&nbsp;&nbsp;content: "";<br>&nbsp;&nbsp;height: 0%;<br>&nbsp;&nbsp;width: 0%;<br>&nbsp;&nbsp;background: red;<br>&nbsp;&nbsp;position: absolute;<br>&nbsp;&nbsp;top: 50%;<br>&nbsp;&nbsp;right: 50%;<br>&nbsp;&nbsp;border-radius: 20px;<br>&nbsp;&nbsp;z-index: -1;<br>&nbsp;&nbsp;-webkit-transition: all 0.5s ease;<br>&nbsp;&nbsp;-moz-transition: all 0.5s ease;<br>&nbsp;&nbsp;-ms-transition: all 0.5s ease;<br>&nbsp;&nbsp;transform: translateX(50%) translateY(-50%) rotate(45deg);<br>}<br><br>.btn-18:hover:before {<br>&nbsp;&nbsp;animation: btn-18 2s;<br>&nbsp;&nbsp;background-color: red;<br>}<br><br>.btn-18:hover {<br>&nbsp;&nbsp;color: #f1f1f1;<br>&nbsp;&nbsp;border-color: red;<br>&nbsp;&nbsp;background-color: red;<br>&nbsp;&nbsp;transition: background-color 0.5s ease-in-out 0.8s;<br>}<br><br>@keyframes btn-18 {<br>&nbsp;&nbsp;0% {<br>&nbsp;&nbsp;&nbsp;&nbsp;height: 0%;<br>&nbsp;&nbsp;&nbsp;&nbsp;width: 0%;<br>&nbsp;&nbsp;}<br><br>&nbsp;&nbsp;25% {<br>&nbsp;&nbsp;&nbsp;&nbsp;height: 250%;<br>&nbsp;&nbsp;&nbsp;&nbsp;width: 600%;<br>&nbsp;&nbsp;}<br><br>&nbsp;&nbsp;50% {<br>&nbsp;&nbsp;&nbsp;&nbsp;height: 600%;<br>&nbsp;&nbsp;&nbsp;&nbsp;width: 600%;<br>&nbsp;&nbsp;}<br><br>&nbsp;&nbsp;75% {<br>&nbsp;&nbsp;&nbsp;&nbsp;height: 100%;<br>&nbsp;&nbsp;&nbsp;&nbsp;width: 600%;<br>&nbsp;&nbsp;}<br><br>&nbsp;&nbsp;100% {<br>&nbsp;&nbsp;&nbsp;&nbsp;height: 0%;<br>&nbsp;&nbsp;&nbsp;&nbsp;width: 0%;<br>&nbsp;&nbsp;}<br><br>}';
  } else if (modalId == 19) {
    copyCSS.innerHTML += '&nbsp;&nbsp;overflow: hidden;<br>&nbsp;&nbsp;background: transparent;<br>}<br><br>.btn-19:before {<br>&nbsp;&nbsp;content: "";<br>&nbsp;&nbsp;position: absolute;<br>&nbsp;&nbsp;background: red;<br>&nbsp;&nbsp;width: 0%;<br>&nbsp;&nbsp;height: 0%;<br>&nbsp;&nbsp;border-radius: 50%;<br>&nbsp;&nbsp;z-index: -1;<br>&nbsp;&nbsp;top: 50%;<br>&nbsp;&nbsp;left: 50%;<br>&nbsp;&nbsp;transform: translateX(-50%) translateY(-50%);<br>&nbsp;&nbsp;-webkit-transition: all 0.5s ease;<br>&nbsp;&nbsp;-moz-transition: all 1s ease;<br>&nbsp;&nbsp;-ms-transition: all 1s ease;<br>}<br><br>.btn-19:hover:before {<br>&nbsp;&nbsp;width: 110%;<br>&nbsp;&nbsp;height: 300px;<br>}<br><br>.btn-19:hover {<br>&nbsp;&nbsp;color: #f1f1f1;<br>&nbsp;&nbsp;border-color: red;<br>}<br><br>.btn-19:active:before {<br>&nbsp;&nbsp;background-color: #00a7fc;<br>}<br><br>.btn-19:active {<br>&nbsp;&nbsp;color: #333;<br>&nbsp;&nbsp;background-color: #00a7fc;<br>&nbsp;&nbsp;border-color: #00a7fc;<br>}';
  } else if (modalId == 20) {
    copyCSS.innerHTML += '&nbsp;&nbsp;overflow: hidden;<br>&nbsp;&nbsp;background-color: red;<br>}<br><br>.btn-20:before {<br>&nbsp;&nbsp;content: "";<br>&nbsp;&nbsp;position: absolute;<br>&nbsp;&nbsp;background-color: #fff; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;// Change background-color to your preference;<br>&nbsp;&nbsp;width: 110%;<br>&nbsp;&nbsp;height: 300px;<br>&nbsp;&nbsp;border-radius: 50%;<br>&nbsp;&nbsp;z-index: -1;<br>&nbsp;&nbsp;top: 50%;<br>&nbsp;&nbsp;left: 50%;<br>&nbsp;&nbsp;transform: translateX(-50%) translateY(-50%);<br>&nbsp;&nbsp;-webkit-transition: all 0.5s ease;<br>&nbsp;&nbsp;-moz-transition: all 1s ease;<br>&nbsp;&nbsp;-ms-transition: all 1s ease;<br>}<br><br>.btn-20:hover:before {<br>&nbsp;&nbsp;width: 0%;<br>&nbsp;&nbsp;height: 0%;<br>}<br><br>.btn-20:hover {<br>&nbsp;&nbsp;color: #f1f1f1;<br>&nbsp;&nbsp;border-color: red;<br>}<br><br>.btn-20:active:before {<br>&nbsp;&nbsp;background-color: #00a7fc;<br>}<br><br>.btn-20:active {<br>&nbsp;&nbsp;color: #333;<br>&nbsp;&nbsp;background-color: #00a7fc;<br>&nbsp;&nbsp;border-color: #00a7fc;<br>}';
  } else if (modalId == 21) {
    copyCSS.innerHTML = '.btn-21 {<br>&nbsp;&nbsp;cursor: pointer;<br>&nbsp;&nbsp;letter-spacing: 2px;<br>&nbsp;&nbsp;text-transform: uppercase;<br>&nbsp;&nbsp;font-family: Marvel;<br>&nbsp;&nbsp;font-size: 20pt;<br>&nbsp;&nbsp;width: 200px;<br>&nbsp;&nbsp;height: 45px;<br>&nbsp;&nbsp;position: relative;<br>&nbsp;&nbsp;color: #777;<br>&nbsp;&nbsp;z-index: 1;<br>&nbsp;&nbsp;transition: all 0.5s ease-in-out;<br>&nbsp;&nbsp;border-radius: 0px;<br>&nbsp;&nbsp;background: transparent;<br>&nbsp;&nbsp;padding: 0;<br>&nbsp;&nbsp;overflow: hidden;<br>&nbsp;&nbsp;border: none;<br>}<br><br>.btn-21:before {<br>&nbsp;&nbsp;content: "";<br>&nbsp;&nbsp;position: absolute;<br>&nbsp;&nbsp;top: 0;<br>&nbsp;&nbsp;left: 0;<br>&nbsp;&nbsp;width: 100%;<br>&nbsp;&nbsp;height: 2px;<br>&nbsp;&nbsp;background: linear-gradient(to right, transparent, #bbb);<br>&nbsp;&nbsp;animation: btn-21-right 2s linear infinite;<br>&nbsp;&nbsp;transition: 0.5s ease-in-out;<br>}<br><br>.btn-21:after {<br>&nbsp;&nbsp;content: "";<br>&nbsp;&nbsp;position: absolute;<br>&nbsp;&nbsp;top: 0;<br>&nbsp;&nbsp;right: 0;<br>&nbsp;&nbsp;width: 2px;<br>&nbsp;&nbsp;height: 100%;<br>&nbsp;&nbsp;background: linear-gradient(to bottom, transparent, #bbb);<br>&nbsp;&nbsp;animation: btn-21-bottom 2s linear infinite;<br>&nbsp;&nbsp;animation-delay: 1s;<br>&nbsp;&nbsp;transform: translateY(-100%);<br>}<br><br>.btn-21 span {<br>&nbsp;&nbsp;position: relative;<br>&nbsp;&nbsp;display: block;<br>&nbsp;&nbsp;width: 100%;<br>&nbsp;&nbsp;height: 100%;<br>&nbsp;&nbsp;padding: 4px;<br>}<br><br>.btn-21 span:after {<br>&nbsp;&nbsp;content: "";<br>&nbsp;&nbsp;position: absolute;<br>&nbsp;&nbsp;bottom: 0;<br>&nbsp;&nbsp;left: 0;<br>&nbsp;&nbsp;width: 100%;<br>&nbsp;&nbsp;height: 2px;<br>&nbsp;&nbsp;background: linear-gradient(to left, transparent, #bbb);<br>&nbsp;&nbsp;animation: btn-21-left 2s linear infinite;<br>}<br><br>.btn-21 span:before {<br>&nbsp;&nbsp;content: "";<br>&nbsp;&nbsp;position: absolute;<br>&nbsp;&nbsp;top: 0;<br>&nbsp;&nbsp;left: 0;<br>&nbsp;&nbsp;width: 2px;<br>&nbsp;&nbsp;height: 100%;<br>&nbsp;&nbsp;background: linear-gradient(to top, transparent, #bbb);<br>&nbsp;&nbsp;animation: btn-21-top 2s linear infinite;<br>&nbsp;&nbsp;animation-delay: 1s;<br>&nbsp;&nbsp;transform: translateY(-100%);<br>}<br><br>.btn-21:hover:before {<br>&nbsp;&nbsp;background: linear-gradient(to right, transparent, red);<br>}<br><br>.btn-21:hover:after {<br>&nbsp;&nbsp;background: linear-gradient(to bottom, transparent, red);<br>}<br><br>.btn-21 span:hover:before {<br>&nbsp;&nbsp;background: linear-gradient(to top, transparent, red);<br>}<br><br>.btn-21 span:hover:after {<br>&nbsp;&nbsp;background: linear-gradient(to left, transparent, red);<br>}<br><br>.btn-21:hover {<br>&nbsp;&nbsp;color: red;<br>}<br><br>.btn-21:active:before {<br>&nbsp;&nbsp;background: linear-gradient(to right, transparent, #00a7fc);<br>}<br><br>.btn-21:active:after {<br>&nbsp;&nbsp;background: linear-gradient(to bottom, transparent, #00a7fc);<br>}<br><br>.btn-21 span:active:before {<br>&nbsp;&nbsp;background: linear-gradient(to top, transparent, #00a7fc);<br>}<br><br>.btn-21 span:active:after {<br>&nbsp;&nbsp;background: linear-gradient(to left, transparent, #00a7fc);<br>}<br><br>.btn-21:active {<br>&nbsp;&nbsp;color: #00a7fc;<br>}<br><br>@keyframes btn-21-right {<br>&nbsp;&nbsp;0% {<br>&nbsp;&nbsp;&nbsp;&nbsp;transform: translateX(-100%);<br>&nbsp;&nbsp;}<br><br>&nbsp;&nbsp;100% {<br>&nbsp;&nbsp;&nbsp;&nbsp;transform: translateX(100%);<br>&nbsp;&nbsp;}<br><br>}<br><br>@keyframes btn-21-top {<br>&nbsp;&nbsp;0% {<br>&nbsp;&nbsp;&nbsp;&nbsp;transform: translateY(100%);<br>&nbsp;&nbsp;}<br><br>&nbsp;&nbsp;100% {<br>&nbsp;&nbsp;&nbsp;&nbsp;transform: translateY(-100%);<br>&nbsp;&nbsp;}<br><br>}<br><br>@keyframes btn-21-left {<br>&nbsp;&nbsp;0% {<br>&nbsp;&nbsp;&nbsp;&nbsp;transform: translateX(100%);<br>&nbsp;&nbsp;}<br><br>&nbsp;&nbsp;100% {<br>&nbsp;&nbsp;&nbsp;&nbsp;transform: translateX(-100%);<br>&nbsp;&nbsp;}<br><br>}<br><br>@keyframes btn-21-bottom {<br>&nbsp;&nbsp;0% {<br>&nbsp;&nbsp;&nbsp;&nbsp;transform: translateY(-100%);<br>&nbsp;&nbsp;}<br><br>&nbsp;&nbsp;100% {<br>&nbsp;&nbsp;&nbsp;&nbsp;transform: translateY(100%);<br>&nbsp;&nbsp;}<br><br>}';
  } else if (modalId == 22) {
    copyCSS.innerHTML = '.btn-22 {<br>&nbsp;&nbsp;cursor: pointer;<br>&nbsp;&nbsp;letter-spacing: 2px;<br>&nbsp;&nbsp;text-transform: uppercase;<br>&nbsp;&nbsp;font-family: Marvel;<br>&nbsp;&nbsp;font-size: 20pt;<br>&nbsp;&nbsp;width: 200px;<br>&nbsp;&nbsp;height: 45px;<br>&nbsp;&nbsp;position: relative;<br>&nbsp;&nbsp;color: #777;<br>&nbsp;&nbsp;z-index: 1;<br>&nbsp;&nbsp;transition: all 0.5s ease-in-out;<br>&nbsp;&nbsp;border-radius: 0px;<br>&nbsp;&nbsp;background: transparent;<br>&nbsp;&nbsp;padding: 0;<br>&nbsp;&nbsp;overflow: hidden;<br>&nbsp;&nbsp;border: none;<br>}<br><br>.btn-22:before {<br>&nbsp;&nbsp;content: "";<br>&nbsp;&nbsp;position: absolute;<br>&nbsp;&nbsp;bottom: 0;<br>&nbsp;&nbsp;left: 0;<br>&nbsp;&nbsp;width: 100%;<br>&nbsp;&nbsp;height: 2px;<br>&nbsp;&nbsp;background: linear-gradient(to right, transparent, #bbb);<br>&nbsp;&nbsp;animation: btn-22-right 2s linear infinite;<br>&nbsp;&nbsp;transition: 0.5s ease-in-out;<br>}<br><br>.btn-22:after {<br>&nbsp;&nbsp;content: "";<br>&nbsp;&nbsp;position: absolute;<br>&nbsp;&nbsp;top: 0;<br>&nbsp;&nbsp;left: 0;<br>&nbsp;&nbsp;width: 2px;<br>&nbsp;&nbsp;height: 100%;<br>&nbsp;&nbsp;background: linear-gradient(to bottom, transparent, #bbb);<br>&nbsp;&nbsp;animation: btn-22-bottom 2s linear infinite;<br>&nbsp;&nbsp;animation-delay: 1s;<br>&nbsp;&nbsp;transform: translateY(-100%);<br>}<br><br>.btn-22 span {<br>&nbsp;&nbsp;position: relative;<br>&nbsp;&nbsp;display: block;<br>&nbsp;&nbsp;width: 100%;<br>&nbsp;&nbsp;height: 100%;<br>&nbsp;&nbsp;padding: 4px;<br>}<br><br>.btn-22 span:after {<br>&nbsp;&nbsp;content: "";<br>&nbsp;&nbsp;position: absolute;<br>&nbsp;&nbsp;top: 0;<br>&nbsp;&nbsp;left: 0;<br>&nbsp;&nbsp;width: 100%;<br>&nbsp;&nbsp;height: 2px;<br>&nbsp;&nbsp;background: linear-gradient(to left, transparent, #bbb);<br>&nbsp;&nbsp;animation: btn-22-left 2s linear infinite;<br>}<br><br>.btn-22 span:before {<br>&nbsp;&nbsp;content: "";<br>&nbsp;&nbsp;position: absolute;<br>&nbsp;&nbsp;top: 0;<br>&nbsp;&nbsp;right: 0;<br>&nbsp;&nbsp;width: 2px;<br>&nbsp;&nbsp;height: 100%;<br>&nbsp;&nbsp;background: linear-gradient(to top, transparent, #bbb);<br>&nbsp;&nbsp;animation: btn-22-top 2s linear infinite;<br>&nbsp;&nbsp;animation-delay: 1s;<br>&nbsp;&nbsp;transform: translateY(-100%);<br>}<br><br>.btn-22:hover:before {<br>&nbsp;&nbsp;background: linear-gradient(to right, transparent, red);<br>}<br><br>.btn-22:hover:after {<br>&nbsp;&nbsp;background: linear-gradient(to bottom, transparent, red);<br>}<br><br>.btn-22 span:hover:before {<br>&nbsp;&nbsp;background: linear-gradient(to top, transparent, red);<br>}<br><br>.btn-22 span:hover:after {<br>&nbsp;&nbsp;background: linear-gradient(to left, transparent, red);<br>}<br><br>.btn-22:hover {<br>&nbsp;&nbsp;color: red;<br>}<br><br>.btn-22:active:before {<br>&nbsp;&nbsp;background: linear-gradient(to right, transparent, #00a7fc);<br>}<br><br>.btn-22:active:after {<br>&nbsp;&nbsp;background: linear-gradient(to bottom, transparent, #00a7fc);<br>}<br><br>.btn-22 span:active:before {<br>&nbsp;&nbsp;background: linear-gradient(to top, transparent, #00a7fc);<br>}<br><br>.btn-22 span:active:after {<br>&nbsp;&nbsp;background: linear-gradient(to left, transparent, #00a7fc);<br>}<br><br>.btn-22:active {<br>&nbsp;&nbsp;color: #00a7fc;<br>}<br><br>@keyframes btn-22-right {<br>&nbsp;&nbsp;0% {<br>&nbsp;&nbsp; &nbsp;&nbsp;transform: translateX(-100%);<br>&nbsp;&nbsp;}<br><br>&nbsp;&nbsp;100% {<br>&nbsp;&nbsp; &nbsp;&nbsp;transform: translateX(100%);<br>&nbsp;&nbsp;}<br><br>}<br><br>@keyframes btn-22-top {<br>&nbsp;&nbsp;0% {<br>&nbsp;&nbsp; &nbsp;&nbsp;transform: translateY(100%);<br>&nbsp;&nbsp;}<br><br>&nbsp;&nbsp;100% {<br>&nbsp;&nbsp; &nbsp;&nbsp;transform: translateY(-100%);<br>&nbsp;&nbsp;}<br><br>}<br><br>@keyframes btn-22-left {<br>&nbsp;&nbsp;0% {<br>&nbsp;&nbsp; &nbsp;&nbsp;transform: translateX(100%);<br>&nbsp;&nbsp;}<br><br>&nbsp;&nbsp;100% {<br>&nbsp;&nbsp; &nbsp;&nbsp;transform: translateX(-100%);<br>&nbsp;&nbsp;}<br><br>}<br><br>@keyframes btn-22-bottom {<br>&nbsp;&nbsp;0% {<br>&nbsp;&nbsp; &nbsp;&nbsp;transform: translateY(-100%);<br>&nbsp;&nbsp;}<br><br>&nbsp;&nbsp;100% {<br>&nbsp;&nbsp; &nbsp;&nbsp;transform: translateY(100%);<br>&nbsp;&nbsp;}<br><br>}';
  } else if (modalId == 23) {
    messageAnimation("My Favorite!! 😜", "#F1B139", "#333", 3);
    copyCSS.innerHTML += '&nbsp;&nbsp;overflow: hidden;<br>&nbsp;&nbsp;background-color: transparent;<br>}<br><br>.btn-23:before {<br>&nbsp;&nbsp;content: "";<br>&nbsp;&nbsp;position: absolute;<br>&nbsp;&nbsp;left: 50%;<br>&nbsp;&nbsp;top: 0;<br>&nbsp;&nbsp;height: 100%;<br>&nbsp;&nbsp;width: 0%;<br>&nbsp;&nbsp;background: red;<br>&nbsp;&nbsp;border-radius: 23px;<br>&nbsp;&nbsp;transition: all 0.5s ease-in-out;<br>&nbsp;&nbsp;z-index: -1;<br>}<br><br>.btn-23:hover:before {<br>&nbsp;&nbsp;width: 120%;<br>&nbsp;&nbsp;left: -10%;<br>}<br><br>.btn-23:hover {<br>&nbsp;&nbsp;color: #f1f1f1;<br>&nbsp;&nbsp;border-color: red;<br>}<br><br>.btn-23:active {<br>&nbsp;&nbsp;border-color: #00a7fc;<br>&nbsp;&nbsp;color: #333;<br>&nbsp;&nbsp;background-color: #00a7fc;<br>}<br><br>.btn-23:active:before {<br>&nbsp;&nbsp;background-color: #00a7fc;<br>}<br><br>.btn-23:active {<br>&nbsp;&nbsp;background-color: #00a7fc;<br>&nbsp;&nbsp;border-color: #00a7fc;<br>&nbsp;&nbsp;color: #333;<br>}<br><br>.btn-23:active:before {<br>&nbsp;&nbsp;background-color: #00a7fc;<br>}';
  } else if (modalId == 24) {
    copyCSS.innerHTML += '&nbsp;&nbsp;background: transparent;<br>&nbsp;&nbsp;overflow: hidden;<br>&nbsp;&nbsp;background-color: red;<br>}<br><br>.btn-24:before {<br>&nbsp;&nbsp;content: "";<br>&nbsp;&nbsp;position: absolute;<br>&nbsp;&nbsp;height: 100%;<br>&nbsp;&nbsp;top: 0;<br>&nbsp;&nbsp;width: 120%;<br>&nbsp;&nbsp;left: -10%;<br>&nbsp;&nbsp;background-color: #fff; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;// Change background-color to your preference;<br>&nbsp;&nbsp;transition: all 0.5s ease-in-out;<br>&nbsp;&nbsp;border-radius: 23px;<br>&nbsp;&nbsp;z-index: -1;<br>}<br><br>.btn-24:hover {<br>&nbsp;&nbsp;color: #f1f1f1;<br>&nbsp;&nbsp;border-color: red;<br>}<br><br>.btn-24:hover:before {<br>&nbsp;&nbsp;width: 0%;<br>&nbsp;&nbsp;left: 50%;<br>}<br><br>.btn-24:active {<br>&nbsp;&nbsp;background-color: #00a7fc;<br>&nbsp;&nbsp;border-color: #00a7fc;<br>&nbsp;&nbsp;color: #333;<br>}<br><br>.btn-24:active:before {<br>&nbsp;&nbsp;background-color: #00a7fc;<br>}';
  } else if (modalId == 25) {
    copyCSS.innerHTML += '&nbsp;&nbsp;background: transparent;<br>}<br><br>.btn-25:before {<br>&nbsp;&nbsp;content: "";<br>&nbsp;&nbsp;position: absolute;<br>&nbsp;&nbsp;left: 0;<br>&nbsp;&nbsp;top: 0;<br>&nbsp;&nbsp;width: 50%;<br>&nbsp;&nbsp;height: 0%;<br>&nbsp;&nbsp;background-color: red;<br>&nbsp;&nbsp;transition: all 0.5s ease-in-out;<br>&nbsp;&nbsp;z-index: -1;<br>}<br><br>.btn-25:after {<br>&nbsp;&nbsp;content: "";<br>&nbsp;&nbsp;position: absolute;<br>&nbsp;&nbsp;right: 0;<br>&nbsp;&nbsp;bottom: 0;<br>&nbsp;&nbsp;width: 50%;<br>&nbsp;&nbsp;height: 0%;<br>&nbsp;&nbsp;background-color: red;<br>&nbsp;&nbsp;transition: all 0.5s ease-in-out;<br>&nbsp;&nbsp;z-index: -1;<br>}<br><br>.btn-25:hover {<br>&nbsp;&nbsp;color: #f1f1f1;<br>&nbsp;&nbsp;border-color: red;<br>}<br><br>.btn-25:hover:before, .btn-25:hover:after {<br>&nbsp;&nbsp;height: 100%;<br>}<br><br>.btn-25:active {<br>&nbsp;&nbsp;color: #333;<br>&nbsp;&nbsp;border-color: #00a7fc;<br>&nbsp;&nbsp;background-color: #00a7fc;<br>}<br><br>.btn-25:active:before, .btn-25:active:after {<br>&nbsp;&nbsp;background-color: #00a7fc;<br>}';
  } else if (modalId == 26) {
    copyCSS.innerHTML += '&nbsp;&nbsp;background: transparent;<br>}<br><br>.btn-26:before {<br>&nbsp;&nbsp;content: "";<br>&nbsp;&nbsp;position: absolute;<br>&nbsp;&nbsp;right: 0;<br>&nbsp;&nbsp;top: 0;<br>&nbsp;&nbsp;width: 50%;<br>&nbsp;&nbsp;height: 0%;<br>&nbsp;&nbsp;background-color: red;<br>&nbsp;&nbsp;transition: all 0.5s ease-in-out;<br>&nbsp;&nbsp;z-index: -1;<br>}<br><br>.btn-26:after {<br>&nbsp;&nbsp;content: "";<br>&nbsp;&nbsp;position: absolute;<br>&nbsp;&nbsp;left: 0;<br>&nbsp;&nbsp;bottom: 0;<br>&nbsp;&nbsp;width: 50%;<br>&nbsp;&nbsp;height: 0%;<br>&nbsp;&nbsp;background-color: red;<br>&nbsp;&nbsp;transition: all 0.5s ease-in-out;<br>&nbsp;&nbsp;z-index: -1;<br>}<br><br>.btn-26:hover {<br>&nbsp;&nbsp;color: #f1f1f1;<br>&nbsp;&nbsp;border-color: red;<br>}<br><br>.btn-26:hover:before, .btn-26:hover:after {<br>&nbsp;&nbsp;height: 100%;<br>}<br><br>.btn-26:active {<br>&nbsp;&nbsp;color: #333;<br>&nbsp;&nbsp;border-color: #00a7fc;<br>&nbsp;&nbsp;background-color: #00a7fc;<br>}<br><br>.btn-26:active:before, .btn-26:active:after {<br>&nbsp;&nbsp;background-color: #00a7fc;<br>}';
  } else if (modalId == 27) {
    copyCSS.innerHTML += '&nbsp;&nbsp;background: transparent;<br>}<br><br>.btn-27:before {<br>&nbsp;&nbsp;content: "";<br>&nbsp;&nbsp;position: absolute;<br>&nbsp;&nbsp;top: 0;<br>&nbsp;&nbsp;left: 0;<br>&nbsp;&nbsp;width: 0%;<br>&nbsp;&nbsp;height: 50%;<br>&nbsp;&nbsp;background-color: red;<br>&nbsp;&nbsp;transition: all 0.5s ease-in-out;<br>&nbsp;&nbsp;z-index: -1;<br>}<br><br>.btn-27:after {<br>&nbsp;&nbsp;content: "";<br>&nbsp;&nbsp;position: absolute;<br>&nbsp;&nbsp;bottom: 0%;<br>&nbsp;&nbsp;right: 0%;<br>&nbsp;&nbsp;width: 0%;<br>&nbsp;&nbsp;height: 50%;<br>&nbsp;&nbsp;background-color: red;<br>&nbsp;&nbsp;transition: all 0.5s ease-in-out;<br>&nbsp;&nbsp;z-index: -1;<br>}<br><br>.btn-27:hover {<br>&nbsp;&nbsp;color: #f1f1f1;<br>&nbsp;&nbsp;border-color: red;<br>}<br><br>.btn-27:hover:before, .btn-27:hover:after {<br>&nbsp;&nbsp;width: 100%;<br>}<br><br>.btn-27:active {<br>&nbsp;&nbsp;color: #333;<br>&nbsp;&nbsp;border-color: #00a7fc;<br>&nbsp;&nbsp;background-color: #00a7fc;<br>}<br><br>.btn-27:active:before, .btn-27:active:after {<br>&nbsp;&nbsp;background-color: #00a7fc;<br>}';
  } else if (modalId == 28) {
    copyCSS.innerHTML += '&nbsp;&nbsp;background: transparent;<br>}<br><br>.btn-28:before {<br>&nbsp;&nbsp;content: "";<br>&nbsp;&nbsp;position: absolute;<br>&nbsp;&nbsp;bottom: 0;<br>&nbsp;&nbsp;left: 0;<br>&nbsp;&nbsp;width: 0%;<br>&nbsp;&nbsp;height: 50%;<br>&nbsp;&nbsp;background-color: red;<br>&nbsp;&nbsp;transition: all 0.5s ease-in-out;<br>&nbsp;&nbsp;z-index: -1;<br>}<br><br>.btn-28:after {<br>&nbsp;&nbsp;content: "";<br>&nbsp;&nbsp;position: absolute;<br>&nbsp;&nbsp;top: 0%;<br>&nbsp;&nbsp;right: 0%;<br>&nbsp;&nbsp;width: 0%;<br>&nbsp;&nbsp;height: 50%;<br>&nbsp;&nbsp;background-color: red;<br>&nbsp;&nbsp;transition: all 0.5s ease-in-out;<br>&nbsp;&nbsp;z-index: -1;<br>}<br><br>.btn-28:hover {<br>&nbsp;&nbsp;color: #f1f1f1;<br>&nbsp;&nbsp;border-color: red;<br>}<br><br>.btn-28:hover:before, .btn-28:hover:after {<br>&nbsp;&nbsp;width: 100%;<br>}<br><br>.btn-28:active {<br>&nbsp;&nbsp;color: #333;<br>&nbsp;&nbsp;border-color: #00a7fc;<br>&nbsp;&nbsp;background-color: #00a7fc;<br>}<br><br>.btn-28:active:before, .btn-28:active:after {<br>&nbsp;&nbsp;background-color: #00a7fc;<br>}';
  }
  copyCSS.innerHTML += "<br><br>.btn-" + modalId + ":focus {<br>&nbsp;&nbsp;outline: none<br>}";
  modal.style.display = "block";
  setTimeout(function() {modal.style.opacity = "1";}, 1);
  document.documentElement.style.overflow = "hidden";
  showHTML();
}

function closeModal() {
  modal.style.opacity = "0";
  setTimeout(function() {modal.style.display = "none";}, 300);
  document.documentElement.style.overflow = "auto";
  copyCSS.scrollTo(0, 0);
  copyHTML.scrollTo(0, 0);
}

function showHTML() {
  if (selected == "CSS") {
    copyHTML.style.display = "block";
    copyCSS.style.display = "none";
    selected = "HTML";
    htmlButton.style.opacity = "1";
    cssButton.style.opacity = "0.5";
  }
}

function showCSS() {
  if (selected == "HTML") {
    copyHTML.style.display = "none";
    copyCSS.style.display = "block";
    selected = "CSS";
    cssButton.style.opacity = "1";
    htmlButton.style.opacity = "0.5";
  }
}

function copyText(copySelect) {
  if (clicked == false) {
    var copyTextareaValue;
    if (copySelect == "HTML") {
      copyTextareaValue = '<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Marvel">\n\n<button class="btn-' + modalId + '">\n  <span>Click here</span>\n</button>';
      showHTML();
    } else if (copySelect == "CSS") {
      copyTextareaValue = copyCSS.innerHTML;
      copyTextareaValue = copyTextareaValue.replace(/<br>/g, "\n");
      copyTextareaValue = copyTextareaValue.replace(/&nbsp;/g, " ");
      showCSS();
    }
    messageAnimation(copySelect + " Copied!", "red", "#f1f1f1", 2);
    copyTextarea.value = copyTextareaValue;
    copyTextarea.style.display = "block";
    copyTextarea.select();
    copyTextarea.setSelectionRange(0, 99999);
    document.execCommand('copy');
    copyTextarea.setSelectionRange(0, 0);
    copyTextarea.blur();
    copyTextarea.style.display = "none";
  }
}

function messageAnimation(messageText, backgroundColor, color, duration) {
    clicked = true;
    copyMessage.innerHTML = messageText;
    copyMessage.style.left = "40px";
    copyMessage.style.opacity = "1";
    copyMessage.style.backgroundColor = backgroundColor;
    copyMessage.style.color = color;
    setTimeout(function() {copyMessage.style.left = "10px"}, 300);
    setTimeout(function() {copyMessage.style.bottom = "100px"; copyMessage.style.opacity = "0"}, duration * 1000);
    setTimeout(function() {copyMessage.style.left = "-250px"; copyMessage.style.bottom = "10px"; clicked = false;}, duration * 1000 + 300);
}

function onLoad() {
  var width = window.innerWidth;
  var height = window.innerHeight;
  modalBox.style.width = width - 200 + "px";
  modalBox.style.height = height - 100 + "px";
  content[0].style.width = width - 220 + "px";
  content[0].style.height = height - 210 + "px";
  content[1].style.width = width - 220 + "px";
  content[1].style.height = height - 210 + "px";
  copyButton.style.left = (width - 425) / 2 + "px";
}

function onResize() {
  var width = window.innerWidth;
  var height = window.innerHeight;
  modalBox.style.width = width - 200 + "px";
  modalBox.style.height = height - 100 + "px";
  content[0].style.width = width - 220 + "px";
  content[0].style.height = height - 210 + "px";
  content[1].style.width = width - 220 + "px";
  content[1].style.height = height - 210 + "px";
  copyButton.style.left = (width - 445) / 2 + "px"
}