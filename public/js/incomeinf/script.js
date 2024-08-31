function abc(val,e){
    if(val == "yes"){
        e.parentNode.parentNode.parentNode.lastElementChild.lastElementChild.lastElementChild.disabled = false
        e.parentNode.parentNode.parentNode.lastElementChild.lastElementChild.lastElementChild.required = true
    }
    else{
        e.parentNode.parentNode.parentNode.lastElementChild.lastElementChild.lastElementChild.disabled = true

    }
}

