//CHECK KEYBOARD EVENTS
document.addEventListener('keydown', function(e){
  KEY = ["a", "d", "m", "i", "n", "Shift", "!"];
  this.INPUT = this.INPUT || [];
  this.INPUT.push(e.key);
  if (this.INPUT.some((e, i) => KEY[i] != e))
    this.INPUT = [this.INPUT.pop()];
  else if (this.INPUT.length == KEY.length){
    this.INPUT = [];
//CREATE POP-UP
  let adminpopup = document.createElement('div');
  adminpopup.setAttribute("id","admin-popup");
  adminpopup.innerHTML = '<p id="close-popap">x</p>';   
//STULES FOR POPUP
  adminpopup.style.position = 'absolute';
  adminpopup.style.background = 'linear-gradient(40deg, rgba(255,231,0,1) 13%, rgba(9,211,252,1) 85%)';
  adminpopup.style.boxShadow = '0px 4px 40px rgb(0 0 0 / 7%), 0px 13px 21px rgb(0 0 0 / 5%), 0px 0px 8px rgb(0 0 0 / 3%), 0px 8px 13px rgb(0 0 0 / 3%), 0px 36px 32px rgb(0 0 0 / 5%)';
  adminpopup.style.width = 'fit-content';
  adminpopup.style.height = 'auto';
  adminpopup.style.margin = 'auto';
  adminpopup.style.padding = '2.5rem';
  adminpopup.style.left = '0';
  adminpopup.style.right = '0';
  adminpopup.style.top = '15%';
  adminpopup.style.zIndex = '9';
  adminpopup.style.textAlign = 'center';
  adminpopup.style.display = 'block';
  adminpopup.style.borderRadius = '1rem'; 
  adminpopup.style.fontSize = '20px'; 
//INSERT ELEMENT TO PAGE
  let insertpopup = document.getElementsByTagName("body");
  insertpopup[0].appendChild(adminpopup);     
//CLOSE STYLES  
  let closepopup = document.getElementById("close-popap") 
  closepopup.style.position = 'absolute';
  closepopup.style.top = '0';
  closepopup.style.right = '1rem';
  closepopup.style.margin = '0';
  closepopup.style.fontWeight = 'bold';
  closepopup.style.fontSize = '30px';
  closepopup.style.color = '#fff';  
  closepopup.style.cursor = 'pointer'; 
//CREATE ADMIN LIST BLOCK 
  let adminlist = document.createElement('div');
  adminlist.setAttribute("id","admin-list");
  adminlist.innerHTML = '<img style="width:6rem;" src="https://i.gifer.com/Pak.gif"><h3 style="margin:0; padding-bottom:2rem;">Developed by:</h3><div id="list"><ul><li>TEAM LEAD</li><li><a style="color:#fff; font-weight:400;" href="https://www.linkedin.com/in/zavatskyi/" target="_blank">Herman Zavatskyi</a></li><li>TOP MANAGER</li><li><a style="color:#fff; font-weight:400;" href="https://www.linkedin.com/in/art-kachko/" target="_blank">Artem Skachko</a></li><li>DEVELOPERS</li><li><a style="color:#fff; font-weight:400;" href="https://www.rhelpers.com/employees/aleksei-g/" target="_blank">Aleksei Goriachov</a></li><li><a style="color:#fff; font-weight:400;" href="https://www.rhelpers.com/employees/anton-m/" target="_blank">Anton Makarchuk</a></li><li><a style="color:#fff; font-weight:400;" href="https://www.linkedin.com/in/vlad-nikitin-a43191235/" target="_blank">Vladyslav Nikitin</a></li><li><a style="color:#fff; font-weight:400;" href="https://www.rhelpers.com/employees/roman-ch/" target="_blank">Roman Chaikovskyi</a></li><li><a style="color:#fff; font-weight:400;" href="https://www.rhelpers.com/employees/sergey-y/" target="_blank">Sergey Yakovenko</a></li><li><a style="color:#fff; font-weight:400;" href="https://www.linkedin.com/in/worentwalker/ " target="_blank">Oleh Pushkash</a></li></ul></div>';
  let insertlist = document.getElementById( "admin-popup" );
  insertlist.appendChild(adminlist); 
//ADMIN LIST STYLES    
  adminlist.style.padding = '0 6vw 1rem';
  adminlist.style.lineHeight = '2.5rem';
  adminlist.style.color = '#54595f';   
  adminlist.style.fontWeight = '700';   
//AUTO-SCROLL TO POP-UP
  document.getElementById("admin-popup").scrollIntoView({
      behavior: 'auto',
      block: 'center',
      inline: 'center'
  });    
//CLOSE MODAL POP-UP
  // jQuery( "#close-popap" ).click(function() {
  jQuery( "#close-popap" ).click(function() {
    document.getElementById( "admin-popup" ).remove();
    });
  }
});

//GIF FROG
  document.addEventListener('keydown', function(e) {
    KEY = ["h", "e", "s", "o", "y", "a", "m"];
        this.GIF = this.GIF || [];
        this.GIF.push(e.key);
        if (this.GIF.some((e, i) => KEY[i] != e))
          this.GIF = [this.GIF.pop()];
        else if (this.GIF.length == KEY.length){
          this.GIF = [];
            let gifpopup = document.createElement('div');
            gifpopup.setAttribute("id","gif-popup");
            gifpopup.innerHTML = '<img id="gif-img" src="https://c.tenor.com/wxrfWYT7gzMAAAAC/peepo-ukraine-ukraine.gif">';
            gifpopup.style.position = 'fixed';
            gifpopup.style.width = '10rem';
            gifpopup.style.left = '0';
            gifpopup.style.bottom = '0';
            gifpopup.style.zIndex = '9';
            gifpopup.style.textAlign = 'left';
            gifpopup.style.display = 'block';
            let insertgifpopup = document.getElementsByTagName("body");
            insertgifpopup[0].appendChild(gifpopup);
            document.getElementById("gif-popup").scrollIntoView({
            behavior: 'auto',
            block: 'center',
            inline: 'center'
            });
            jQuery( "#gif-popup" ).click(function() {
            document.getElementById( "gif-popup" ).remove();
            });
        }
        });

//GIF TRAVOLTA
        document.addEventListener('keydown', function(e) {
          KEY = ["a", "s", "p", "i", "r", "i", "n"];
              this.ASP = this.ASP || [];
              this.ASP.push(e.key);
              if (this.ASP.some((e, i) => KEY[i] != e))
                this.ASP = [this.ASP.pop()];
              else if (this.ASP.length == KEY.length){
                this.ASP = [];
                  let asppopup = document.createElement('div');
                  asppopup.setAttribute("id","asp-popup");
                  asppopup.innerHTML = '<img id="gif-img" src="https://i.gifer.com/5LSi.gif">';
                  asppopup.style.position = 'fixed';
                  asppopup.style.right = '0';
                  asppopup.style.bottom = '-1%';
                  asppopup.style.zIndex = '10';
                  asppopup.style.textAlign = 'right';
                  asppopup.style.display = 'block';
                  let insertasppopup = document.getElementsByTagName("body");
                  insertasppopup[0].appendChild(asppopup);
                  document.getElementById("asp-popup").scrollIntoView({
                  behavior: 'auto',
                  block: 'center',
                  inline: 'center'
                  });
                  jQuery( "#asp-popup" ).click(function() {
                  document.getElementById( "asp-popup" ).remove();
                  });
              }
          }); 