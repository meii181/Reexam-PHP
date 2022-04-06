function _one(q, from=document){return from.querySelector(q)}
function _all(q, from=document){return from.querySelectorAll(q)}

function validation(callback){
    const form = event.target
    const error_validate = "rgba(19,31,48,0.8)"
    _all("[data-validate]", form).forEach(function(element){
        element.classList.remove("error_validate")
        element.style.backgroundColor = "whitesmoke"
    })

    _all("[data-validate]", form).forEach(function(element){
        switch(element.getAttribute("data-validate")){
            case "str":
                if(element.value.length < parseInt(element.getAttribute("data-min")) ||
                element.value.lenght > parseInt(element.getAttribute("data-max"))
                ){
                
        element.classList.add("error_validate")
        element.style.backgroundColor = error_validate
    }

    break;
    case "int":
        if(! /^\d+$/.test(element.value) || 
        parseInt(element.value) < parseInt(element.getAttribute("data-min")) || 
        parseInt(element.value) > parseInt(element.getAttribute("data-max"))
        ){
            element.classList.add("error_validate")
            element.style.backgroundColor = error_validate
        }

        break;
        case "email":
            let re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])| (([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            if(!re.test(element.value.toLowerCase())){
                element.classList.add("error_validate")
                element.style.backgroundColor = error_validate
            }

            break;
            case "re":
                if(! regex.test(element.value)){
                    console.log(phone_error)
                    element.classList.add("error_validate")
                    element.style.backgroundColor = error_validate
                }

                break;
                case "match":
                    if(element.value != _one(`[name='${element.getAttribute("data-match-name")}']`, form).value){
                        element.classList.add("error_validate")
                        element.style.backgroundColor = error_validate
                    }
                    break;
                }
})

if(! _one(".error_validate", form)){
    callback(); return
}
_one(".error_validate", form).focus()
}