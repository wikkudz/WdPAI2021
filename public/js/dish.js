const ingredient = document.getElementById("ingredients-button");
ingredient.addEventListener("click", function (event){
    event.preventDefault();
    const name = document.querySelector('input[name="ingredient-name"]');

    const date = (ingredient: name.value);

    const ingredientName = document.querySelector('input[name="ingredient-name"]');

    const node = document.createElement("li");

    const textnode = document.createTextNode(ingredientName.value);

    node.appendChild(textnode);

    document.getElementById("list").appendChild(node);
});

{

    event.preventDefault();


}

