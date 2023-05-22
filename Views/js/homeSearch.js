form = document.getElementById("form");
errorMsg = document.querySelector(".error-msg");

const printMsg = ()=> {
    errorMsg.classList.add("active");
    setTimeout(()=>{
        errorMsg.classList.remove("active");
    }, 3000)
}

form.addEventListener("submit",(e)=>{
    e.preventDefault();
    let url = "../all_product.php";
    data = Array.from(form.querySelectorAll("ul li")).filter( element => {
        if(element.innerText === element.parentElement.parentElement.querySelector("label").innerText)
            return element.dataset
    });
    console.log(data)
    const type = data[0].dataset.propertyTypeId;
    const operation = data[1].dataset.opType;
    const inputValue = form.querySelector("input").value; 
    console.log(type, operation);
    if(operation) window.location.href = `products.php?sort=recent&search=${inputValue}${type ? ("&propType=" + type) : ""}${operation ? ("&type=" + operation) : ""}`;
    else printMsg();
    
   
})