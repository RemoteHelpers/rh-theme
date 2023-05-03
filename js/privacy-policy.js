/* Privacy policy/therms/accessibility page - tabs */
onload = () => {
    privacyTabs();
  }
  function privacyTabs() {
      const tabs = document.querySelectorAll(".privacy-tab");
      const contents = document.querySelectorAll(".content");
    
      tabs.forEach((item) => {
        item.addEventListener("click", (e) => {
          const content = Array.from(contents);
    
          tabs.forEach((item) => {
            item.classList.remove("active");
          });
          e.target.classList.add("active");
    
          content.forEach((item) => {
            item.classList.remove("shown");
          });
    
          const found = content.find((item) => {
            return item.dataset.content === e.target.dataset.tab;
          });
          found.classList.add("shown");
        });
      });
    }