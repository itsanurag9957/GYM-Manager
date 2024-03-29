/* global bootstrap: false */
(function () {
  'use strict'
  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
  tooltipTriggerList.forEach(function (tooltipTriggerEl) {
    new bootstrap.Tooltip(tooltipTriggerEl)
  })
})()


const link = document.querySelectorAll(".nav-link");
          console.log(link);
          link.forEach(l=>{
            l.addEventListener("mouseover",()=>{
              l.classList.add("active");
            })
            l.addEventListener("mouseout",()=>{
              l.classList.remove("active");
            })
          })