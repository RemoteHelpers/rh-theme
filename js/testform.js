const fields = {
    sourceAffiliate: [
        {
            type: "text",
            name: "client_name",
            class: "required-fields",
            id: "name-id",
            required: false,
            placeholder: "Name",
        },
        {
            type: "number",
            name: "client_phone",
            class: "required-fields",
            required: false,
            placeholder: "Phone",
        },
        {
            type: "email",
            name: "client_email",
            class: "required-fields",
            placeholder: "Email",
            required: false,
        },
        {
            type: "textarea",
            name: "note",
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
        }
    ],

    affiliate: [
        {
            type: "text",
            name: "client_name",
            class: "required-fields",
            id: "name-id",
            required: false,
            placeholder: "Name",
        },
        {
            type: "number",
            name: "client_phone",
            class: "required-fields",
            required: false,
            placeholder: "Phone",
        },
        {
            type: "email",
            name: "client_email",
            class: "required-fields",
            placeholder: "Email",
            required: false,
        },
        {
            type: "textarea",
            name: "note",
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
            type: "promocode",
            name: "promocode",
            required: false,
            value: "Promocode",
            id: "promocode-id",
            hidden: true,
        },
    ],

    customer: [
        {
            type: "text",
            name: "client_name",
            class: "required-fields",
            id: "name-id",
            required: false,
            placeholder: "Name",
        },
        {
            type: "number",
            name: "client_phone",
            class: "required-fields",
            required: false,
            placeholder: "Phone",
        },
        {
            type: "email",
            name: "client_email",
            class: "required-fields",
            placeholder: "Email",
            required: false,
        },
        {
            type: "textarea",
            name: "note",
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
    ],

    subscription: [
        {
            type: "text",
            name: "client_name",
            class: "required-fields",
            id: "name",
            required: false,
            placeholder: "Name",
        },
        {
            type: "text",
            name: "client_phone",
            id: "phone",
            class: "required-fields",
            required: false,
            placeholder: "Phone",
        },
        {
            type: "email",
            id: "email",
            name: "client_email",
            class: "required-fields",
            placeholder: "Email",
            required: false,
        },
        {
            type: "textarea",
            name: "note",
            class: "required-fields",
            required: false,
            placeholder: "Message",
        },
        {
            type: "submit",
            name: "submit_button",
            class: "send-form-button",
            value: "Send",
            id: "sendId"
        },
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
    ]
};

const param = [sourceAffiliate, affiliate, customer, subscription];

window.addEventListener("DOMContentLoaded", param[3]);

function globalItems(fields) {
    let fieldsRow = '';

    fields.map(field => {
        field.type === 'textarea' || field.type === 'select'
            ?
            fieldsRow += `<${field.type}
            ${field.name ? `name="${field.name}"` : ''} 
            ${field.placeholder ? `placeholder="${field.placeholder}"` : ''}
            ${field.type === 'textarea' ? `style="resize: none"` : ''} ></${field.type}>`
            :
            fieldsRow += `<div class="form-control"><input 
        ${field.id ? `id = "${field.id}"` : ''} 
        ${field.class ? `class = "${field.class}"` : ''}
        ${field.type ? `type="${field.type}"` : ''} 
        ${field.name ? `name="${field.name}"` : ''}
        ${field.value ? `value="${field.value}"` : ''} 
        ${field.placeholder ? `placeholder="${field.placeholder}"` : ''}
        ${field.required ? "required" : ''} 
        ${field.hidden ? `hidden` : ''}
        > <small></small></div>`
    });

    const formRef = document.querySelector('.formWrapper');
    formRef.insertAdjacentHTML('beforeend', fieldsRow);
}


function drawForm() {
    let renderingForm = `<form class="form" id="formId" method="POST" action="" name="myForm"></form>`;
    document.querySelector(".crm-form").insertAdjacentHTML("afterbegin", renderingForm);

    let formContainer = `<container class="formWrapper" id="formWrapperId"></container>`;
    document.querySelector(".form").insertAdjacentHTML("afterbegin", formContainer);

    let formContainerWrapper = `<container class="formContainerWrapper" id="formContainerWrapperId"></container>`;
    document.querySelector(".form").insertAdjacentHTML("beforeend", formContainerWrapper);

    let formFrequencies = `<div class="formFrequencies" id="formFrequenciesId"></div>`;
    document.querySelector(".formContainerWrapper").insertAdjacentHTML("beforeend", formFrequencies);

    let formDepartments = `<div class="formDepartments" id="formDepartments"></div>`;
    document.querySelector(".formContainerWrapper").insertAdjacentHTML("beforeend", formDepartments);

    let formSelect = `<div class="select-wrap">
                      <select class="custom-select" id="select" name="mine_frequency" placeholder="Select the sending frequency">
                      </select>
                      </div>`;
    document.querySelector(".formContainerWrapper").insertAdjacentHTML("afterbegin", formSelect);
}

function sourceAffiliate() {
    const formType = 'sourceAffiliate';
    drawForm();
    sendDataToCrm(formType);
    globalItems(fields.sourceAffiliate);
}

function affiliate() {
    const formType = 'affiliate';
    drawForm();
    sendDataToCrm(formType);
    globalItems(fields.affiliate);
}

function customer() {
    const formType = 'customer';
    drawForm();
    sendDataToCrm(formType);
    globalItems(fields.customer);
}

function subscription() {
    const formType = 'subscription';
    drawForm();
    globalItems(fields.subscription);

    async function getItems() {
        let url = 'https://crm-s.com/api/v1/get-data-subscription-form?global_company_name=Remote%20Helpers';
        try {
            let res = await fetch(url);
            return await res.json();
        } catch (error) {
            console.log(error);
        }
    }

    async function renderItems() {
        let htmlFrequencies = '';
        let htmlDepartment = '';
        let items = await getItems();

        let frequenciesItems = items.frequencies.map(obj => {
            let frequenciesWrapper = renderFrequencies(obj);
            htmlFrequencies += frequenciesWrapper;
        }).join('');

        function renderFrequencies(obj) {
            return (`  
            <option id=${obj.id} 
                    value=${obj.name.split(' ').join('_')}>${obj.name}</option>`
            );
        }

        const containerMain = document.querySelector('.custom-select');
        containerMain.insertAdjacentHTML('beforeend', htmlFrequencies);

        // For Select
        document.querySelectorAll(".select-wrap").forEach(function (wrap) {
            let select = wrap.querySelector(".custom-select");
            let classes = select.getAttribute("class"),
                id = select.getAttribute("id"),
                name = select.getAttribute("name");
            let template = '<div class="' + classes + '">';
            template += '<span class="custom-select-trigger">' + select.getAttribute("placeholder") + '</span>';
            template += '<div class="custom-options">';
            select.querySelectorAll("option").forEach(function (option) {
                template += '<span class="custom-option' + '"data-value="' + option.getAttribute("value") + '">' + option.innerText + '</span>';
            });
            template += '</div></div>';
            let select_wrapper = document.createElement('div');
            select.style.display = 'none';
            select_wrapper.innerHTML = `<div class="custom-select-wrapper">${template}</div>`;
            wrap.appendChild(select_wrapper);
        });

        document.querySelector(".custom-select-trigger").addEventListener("click", function () {
            document.querySelector(".custom-select-trigger").closest(".custom-select").classList.toggle("opened");
        });
        document.querySelectorAll(".custom-option").forEach((option) => {
            option.addEventListener("click", function () {
                option.closest(".select-wrap").querySelector("select").value = option.getAttribute("data-value");
                option.closest(".custom-select").classList.remove("opened");
                option.closest(".custom-select").querySelector(".custom-select-trigger").innerText = option.innerText;
            });
        });

        // End select

        let departmentsItems = items.departments?.map((item) => {
            let departmentWrapper = renderDepartment(item);
            htmlDepartment += departmentWrapper;
        });

        function renderDepartment(item) {
            return (`
            <div class="accordion-item">
    <div class="accordion-item-header">
        <div class="checkbox">
            <input class="parent custom-checkbox" 
            type="checkbox" 
            id=${item.id}
            value=${item.id}>
            <label for=${item.id}>${item.name}</label>
        </div>
    </div>
    <div class="accordion-item-body">
        <div class="accordion-item-body-content">
            <div class="accordionBodyWrapper">
                ${item.positions.map((pos) =>
                `
                <div class="checkbox">
                    <input class="child custom-checkbox" 
                    type="checkbox" 
                    id=${pos.id + pos.department_id} 
                    value=${pos.id}>
                    <label for=${pos.id + pos.department_id}  class="custom-label">${pos.name}</label>
                </div>
                `
            ).join('')}
            </div>
        </div>
    </div>
</div>
            `);
        }

        const container = document.querySelector('.formDepartments');
        container.insertAdjacentHTML('beforeend', htmlDepartment);

        // For Accordion

        const accordionItemHeaders = document.querySelectorAll(".accordion-item-header");

        accordionItemHeaders.forEach(accordionItemHeader => {
            accordionItemHeader.addEventListener("click", event => {
                accordionItemHeader.classList.toggle("active");
                const accordionItemBody = accordionItemHeader.nextElementSibling;
                if (accordionItemHeader.classList.contains("active")) {
                    accordionItemBody.style.maxHeight = accordionItemBody.scrollHeight + "px";
                } else {
                    accordionItemBody.style.maxHeight = 0;
                }
            });
        });

        // End Accordion

        // For Checkbox All

        function activateCheckbox() {
            let checkboxes = document.querySelectorAll('.accordion-item');
            Array.prototype.forEach.call(checkboxes, function (item) {
                let count = item.getElementsByClassName('child').length;
                let currentCount = 0;

                item.addEventListener('change', function (evt) {
                    if (evt.target.classList.contains('parent')) {
                        if (evt.target.checked) {
                            setAllCheckboxes(item, true);
                            currentCount = count;
                        } else {
                            setAllCheckboxes(item, false);
                            currentCount = 0;
                        }
                    } else {
                        evt.target.checked ? ++currentCount : --currentCount;

                        if (currentCount == count) {
                            setAllCheckboxes(item, true);
                        } else if (currentCount == count - 1) {
                            if (!evt.target.checked) {
                                item.getElementsByClassName('child')[0].checked = false;
                            }
                        }
                    }
                }, false);
            });

            function setAllCheckboxes(where, value) {
                let checkboxes = where.querySelectorAll('input[type="checkbox"]');
                Array.prototype.forEach.call(checkboxes, function (item) {
                    item.checked = value ? true : false;
                });
            }
        }

        activateCheckbox();

        // End Checkbox All
    }

    let result = [];

    const getFormItem = document.querySelector('form');
    getFormItem.addEventListener('submit', function (e) {
        e.preventDefault();
        const departments_id = getFormItem.querySelectorAll('.parent');
        departments_id.forEach(item => {
            if (item.checked) {
                let singleDepartment = {};
                singleDepartment.department_id = item.value;
                let positions = [];

                item
                    .closest('.accordion-item')
                    .querySelectorAll('.accordionBodyWrapper input[type=checkbox]:checked')
                    .forEach((e) => {
                        positions.push(e.value);
                    });

                singleDepartment.positions = positions;
                result.push(singleDepartment)
            }
        })

    })

    renderItems();
    sendDataToCrm(formType, result);
}


function sendDataToCrm(formType, result) {
    const form = document.querySelector('form');

    form.addEventListener('submit', function (e) {

        validateForm();
        console.log(isFormValid());

        if (isFormValid() == true) {
            let myForm = e.target;
            const prePayload = new FormData(myForm);

            prePayload.set('departments', JSON.stringify(result))
            prePayload.set('type', formType)

            //look at all the contents
            for (let key of prePayload.keys()) {
                console.log(key, prePayload.get(key));
            }

            let url = 'https://crm-s.com/api/v1/leads-public11';
            fetch(
                url, {
                    body: prePayload,
                    method: 'POST',
                }
            )
                .then((res) => res.json())
                .then((data) => {
                    console.log('Response from server');
                    console.log(data);
                })
                .catch(console.warn);
        } else {
            e.preventDefault();
        }
        form.reset();
    });

}

function isFormValid() {
    const form = document.querySelector('form');
    const inputContainers = form.querySelectorAll('.form-control');
    let result = true;
    inputContainers.forEach((container) => {
        if (container.classList.contains('error')) {
            result = false;
        }
    });
    return result;
}

function validateForm() {
    const form = document.querySelector('form');
    const username = document.getElementById('name');
    const email = document.getElementById('email');
    const phone = document.getElementById('phone');

    // Сообщения которые вылазят, если произошла ошибка
    function showError(input, message) {
        const formControl = input.parentElement;
        formControl.className = 'form-control error';
        const small = formControl.querySelector('small');
        small.innerText = message;
    }

    // Показывает зеленый цвет, если валидация правильная
    function showSucces(input) {
        const formControl = input.parentElement;
        formControl.className = 'form-control success';
    }

    // Проверка инпута имейда
    function checkEmail(input) {
        const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        if (re.test(input.value.trim())) {
            showSucces(input)
        } else {
            showError(input, 'Email is not invalid !!!');
        }
    }

    // Проверка инпутов на required
    function checkRequired(inputArr) {
        inputArr.forEach(function (input) {
            if (input.value.trim() === '') {
                showError(input, `${getFieldName(input)} is required`)
            } else {
                showSucces(input);
            }
        });
    }

    // Проверка на длину инпутов
    function checkLength(input, min, max) {
        if (input.value.length < min) {
            showError(input, `${getFieldName(input)} must be at least ${min} characters`);
        } else if (input.value.length > max) {
            showError(input, `${getFieldName(input)} must be les than ${max} characters`);
        } else {
            showSucces(input);
        }
    }

    // Получение имени инпута
    function getFieldName(input) {
        return input.id.charAt(0).toUpperCase() + input.id.slice(1);
    }

    // Проверяем фокус
    phone.addEventListener('focus', _ => {
        // Если там ничего нет или есть, но левое
        if (!/^\+\d*$/.test(phone.value))
            // То вставляем знак плюса как значение
            phone.value = '+';
    });

    phone.addEventListener('keypress', e => {
        // Отменяем ввод не цифр
        if (!/\d/.test(e.key))
            e.preventDefault();
    });

    checkRequired([username, email, phone]);
    checkLength(username, 4, 12);
    checkLength(phone, 10, 13);
    checkEmail(email);
}