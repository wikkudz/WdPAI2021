let i = 0;

function addIngredient(){
    const input = document.querySelector('div[class="addingredients"]');

    const newDiv = document.createElement("div");

    newDiv.innerHTML="<input name='ingredient-name"+i+"' type=\"text\" placeholder = \"NAZWA\">\n" +
        "                            <input name=\"weight"+i+"\" type=\"text\" placeholder=\"ILOSC\">\n" +
        "                            <input name=\"price"+i+"\" type=\"number\" min=\"0\" max=\"10000\" step = \"0.01\" placeholder=\"cena\">zl\n" +
        "                            <input name=\"recipe-id"+i+"\" type=\"text\" value = '<?= $dish -> getId() ?>' style=\"display: none\">\n";

    i = i+1;
    newDiv.classList.add("test");
    input.appendChild(newDiv)
    // const ingredientName = document.querySelector('input[name="ingredient-name"]');
    // const ingredientWeight = document.querySelector('input[name="weight"]');
    // const ingredientPrice = document.querySelector('input[name="price"]');

    // const node = document.createElement("li");
    // const textnode = document.createTextNode(ingredientName.value+" " + ingredientWeight.value+" " + ingredientPrice.value + " zl");
    // node.appendChild(textnode);
    //
    // document.getElementById("list").appendChild(node);


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

