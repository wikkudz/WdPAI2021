const search = document.querySelector('input[placeholder="Szukaj...\"]');
const dishContainer = document.querySelector(".recipes");

search.addEventListener("keyup", function (event){
    if(event.key === "Enter"){
        event.preventDefault();

        const data = {search: this.value};

        fetch('/search', {
            method: 'POST',
            headers:{
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        }).then(function (response){
            return response.json();
        }).then(function(dishes){
            dishContainer.innerHTML = "",
            loadDishes(dishes)
        })
    }
})

function loadDishes(dishes) {
    dishes.forEach(dish =>{
        console.log(dish);
        createDish(dish);
    })
}

function createDish(dish) {
    const template = document.querySelector("#dish-template");

    const clone = template.content.cloneNode(true);

    const recipe = clone.querySelector(".recipe-template");

    recipe.style.backgroundImage = "url('"+dish.image+"')";
    recipe.style.borderRadius = "2em";
    recipe.style.backgroundSize = "cover";

    const link = clone.querySelector(".link")
    link.href = "http://localhost:8080/dish?id="+dish.id;

    const title =  clone.querySelector('.recipe-title');
    title.innerHTML = dish.title;
    const difficulty = clone.querySelector('.difficulty-level');
    difficulty.innerHTML = dish.difficulty;


    const time = clone.querySelector('.time');
    time.innerHTML = dish.time + "min";

    const user = clone.querySelector('.user');
    user.innerHTML = dish.users_id;

    console.log(dish.price);

    const price = clone.querySelector('.price-value');
    price.innerHTML = dish.price + "zl";

    dishContainer.appendChild(clone);
}

var item = document.querySelector('section[class="recipes"]');

window.addEventListener("wheel", function (e) {
    if (e.deltaY > 0) item.scrollLeft += 100;
    else item.scrollLeft -= 100;
});