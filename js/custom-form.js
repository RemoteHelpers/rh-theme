jQuery(document).ready(function() { 
  //CREATE NECESSARY INPUTS
      const fields = [
    {
      type: "text",
      name: "client_name",
      class: "required-fields",
      id: "name-id",
      required: true,
      placeholder: "Name",
    },
    {
      type: "number",
      name: "client_phone",
      class: "required-fields",
      required: true,
      placeholder: "Phone",
    },
    {
      type: "email",
      name: "client_email",
      class: "required-fields",
      placeholder: "Email",
      required: true,
    },
    {
      type: "textarea",
      name: "client_notes",
      class: "required-fields",
      required: false,
      placeholder: "Message",
    },
    {
      type: "submit",
      name: "submit_button",
      class: "send-form-button",
      value: "Send",
    },
//    HIDEN REQUIRED INPUT FIELS
    {
      type: "text",
      name: "global_company_name",
      placeholder: "Your company",
      required: false,
      hidden: true,
      value: "Remote Helpers",
    },
    {
      type: "text",
      name: "project_company",
      placeholder: "Your company",
      required: false,
      hidden: true,
      value: "rh-s.com",
    },
    {
      type: "text",
      name: "type",
      placeholder: "New request",
      required: true,
      hidden: true,
      value: "customer",
    },
  ];
  
  
  //GET ALL ID`S OF PRODUCT ON CHECKOUT PAGE
  const listID = [];
  var personformId = document.querySelectorAll('[class*="id_forform"]');
      for(var i = 0; i < personformId.length; i++) {
      var current = personformId[i];
          listID.push(current.textContent);   
      };
  
  //CRAETE MAIN ELEMENTS (FORM, CONTAINER, MODAL WINDOW) 
  let formcrm = document.createElement('form');
  formcrm.classList.add('form'); 
  formcrm.method = "POST";
  formcrm.action = "";
  document.body.appendChild(formcrm);
  let insertform = document.getElementsByClassName("crm-form");
  insertform[0].appendChild(formcrm);   
      
  let formcontainer = document.createElement('container');
  formcontainer.classList.add('label-container');
  formcontainer.setAttribute("id","label-container-id");
  document.body.appendChild(formcontainer);
  let insertcontainer = document.getElementsByClassName("form"); 
  insertcontainer[0].appendChild(formcontainer);     
      
  let modalwindow = document.createElement('div');
  modalwindow.classList.add('backdrop');
  document.body.appendChild(modalwindow);
  let formblock = document.getElementsByClassName("crm-form"); 
  formblock[0].appendChild(modalwindow);
      
  //CREATE MODAL WINDOW ELEMENTS       
  let h2tag = document.createElement("h2");
  let h2text = document.createTextNode("Thank You!");
  h2tag.appendChild(h2text);
  let h2element = document.getElementsByClassName("backdrop");
  h2element[0].appendChild(h2tag);   
  
  //The client's name is automatically added to the modal window after submitting the form.    
  let h3tag = document.createElement("h3");
  h3tag.setAttribute("id", "client_id"); 
  let h3element = document.getElementsByClassName("backdrop");
  h3element[0].appendChild(h3tag);
      
  let h4tag = document.createElement("h4");
  let h4text = document.createTextNode("We have received your message!");
  h4tag.appendChild(h4text);
  let h4element = document.getElementsByClassName("backdrop");
  h4element[0].appendChild(h4tag);   
  
  let h5tag = document.createElement("h5");
  let h5text = document.createTextNode("Our manager will contact you as soon as possible.");
  h5tag.appendChild(h5text);
  let h5element = document.getElementsByClassName("backdrop");
  h5element[0].appendChild(h5tag);    
      
  // CLOSE BUTTON
  // let buttontag = document.createElement("button");
  // buttontag.classList.add('modal-btn');    
  // let buttontext = document.createTextNode("Back to Home");
  // buttontag.appendChild(buttontext);
  // let buttonelement = document.getElementsByClassName("backdrop");
  // buttonelement[0].appendChild(buttontag);     
      
  //INITIALIZING THE REFERENCE FOR FUTURE EVENTS
  const refs = {
    backdrop: document.querySelector(".backdrop"),
    // modalBtn: document.querySelector(".modal-btn"),
    form: document.querySelector(".form")
  }; 
  
  //DYNAMIC FORM AND ELEMENTS CREATION ON CONTENT LOAD     
  window.addEventListener(
    "DOMContentLoaded",
    drowForm(fields, ".form .label-container")
  );   
  function drowForm(fields, selector) {
  const formRef = document.querySelector(selector);
  formRef.insertAdjacentHTML("beforeend", buildInputs(fields));  
  }
      
  //CREATING INPUTS ON FRONT END FROM "const fields" array 
  //(label, name, type, class, ID, required, placeholder, hidden, value)     
  function buildInputs(formFields) {
    let str = "";
    let openLabel = "";
    let closeLabel = "";
    formFields.forEach((field) => {
      if (field.label) {
        openLabel = `<label>${field.label}`;
        closeLabel = `</label>`;
      } else {
        openLabel = "";
        closeLabel = "";
      }
      switch (field.type) {
        case "textarea":
          str += `${openLabel}<textarea ${
            field.name ? `name="${field.name}"` : ""
          } cols="30" rows="5" ${
            field.placeholder ? `placeholder="${field.placeholder}"` : ""
          } ${field.hidden ? `hidden` : ""} ${
            field.required ? "required" : ""
          }></textarea>${closeLabel}`;
          break;
        case "select":
          if (!field.options || !field.options.length) {
            break;
          }
          str += `<select ${field.name ? `name="${field.name}"` : ""} ${
            field.required ? "required" : ""
          }>${field.options
            .map((option) => `<option>${option}</option>`)
            .join("")}</select>`;
          break;
        default:
          str += `${openLabel}<input type="${field.type}" ${
            field.class ? `class="${field.class}"` : ""
          } ${field.id ? `id="${field.id}"` : ""} ${
            field.name ? `name="${field.name}"` : ""
          } ${field.value ? `value="${field.value}"` : ""} ${
            field.placeholder ? `placeholder="${field.placeholder}"` : ""
          } ${field.required ? "required" : ""} ${
            field.pattern ? `pattern="${field.pattern}"` : ""
          } ${field.hidden ? "hidden" : ""}>${closeLabel}`;
      }
    });
    return str;
  }
  
  //INITIALIZING THE SUBMIT EVENT  
  refs.form.addEventListener("submit", formZipSubmit);
  
  //EVENTS ON SUBMIT     
  function formZipSubmit(e) {
    e.preventDefault();
    const formData = new FormData(e.currentTarget);
    const note = formData.get("note");
    formData.set("note", `Candidates ID's: ${listID} `);
    formData.delete("looking");
    const newArr = [];
    formData.forEach((value, name) => newArr.push([name, value]));
    const parsedData = Object.fromEntries(newArr);
    
    let thanksName = document.getElementById("name-id").value;
    document.getElementById("client_id").innerHTML = thanksName;
      
  //OPEN MODAL WINDOW   
    addUserData(formData)
      .then((data) => {
        openThankYouModal(parsedData);
      })
      .catch((error) => console.log(error.message));
    refs.form.reset();
  }
  
  //SENDING DATA TO CRM URL    
  const link = "https://crm-s.com/api/v1/leads-public";
  async function addUserData(userData) {
    const response = await fetch(link, {
      method: "POST",
      body: userData,
    });
    return response.json();
  }
  
  //EVENTS FOR OPENING AND CLOSING A MODAL WINDOW
  async function openThankYouModal({ client_email, client_name }) {
    refs.backdrop.classList.add("is-visible");

    //close on click
    // refs.modalBtn.addEventListener("click", closeThankYouModal);
    //close auto after 5 sec
    setTimeout(closeThankYouModal, 5000);

    formcrm.classList.add('blur-form');
    document.getElementById("label-container-id").scrollIntoView({
      behavior: 'auto',
      block: 'center',
      inline: 'center'
  });
  }
  //CLOSING A MODAL WINDOW ON BUTTON
  function closeThankYouModal() {
    refs.backdrop.classList.remove("is-visible");
    formcrm.classList.remove('blur-form');
  }
  });