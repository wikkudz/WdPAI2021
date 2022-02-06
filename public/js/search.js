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

    const image = dish.image;

    clone.querySelector(".recipe-template").style.backgroundImage= 'url(image)';


    const title =  clone.querySelector('.recipe-title');
    title.innerHTML = dish.title;
    const difficulty = clone.querySelector('.difficulty-level');
    difficulty.innerHTML = dish.difficulty;


    const time = clone.querySelector('.time');
    time.innerHTML = dish.time + "min";

    dishContainer.appendChild(clone);
}