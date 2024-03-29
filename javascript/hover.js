const link = document.querySelectorAll(".nav-link");
          console.log(link);
          link.forEach(l=>{
            l.addEventListener("mouseover",()=>{
              l.classList.add("active");
              l.classList.add("link-light");
              l.classList.remove("link-dark");
            })
            l.addEventListener("mouseout",()=>{
              l.classList.remove("active");
              l.classList.remove("link-light");
              l.classList.add("link-dark");
            })
          })