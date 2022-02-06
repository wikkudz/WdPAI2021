var i = 0;

function addIngredient(){

    const ingredientName = document.querySelector('input[name="ingredient-name"]');
    const ingredientWeight = document.querySelector('input[name="weight"]');
    const ingredientPrice = document.querySelector('input[name="price"]');

    const node = document.createElement("li");
    // node.setAttribute(name)
    const textnode = document.createTextNode(ingredientName.value+" " + ingredientWeight.value+" " + ingredientPrice.value + " zl");
    node.appendChild(textnode);

    document.getElementById("list").appendChild(node);


}

// function markValidation(element, condition){
//     !condition ? element.classList.add('no-valid') : element.classList.remove('no-valid');
// }
//
// function isElementNull(element){
//     setTimeout(function () {
//             markValidation(element, isEmail(emailInput.value))
//         },
//         1000
//     );
// }

