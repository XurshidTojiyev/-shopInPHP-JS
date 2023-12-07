const row = document.querySelector(".row");
let cartsBody = document.querySelector(".card-deck");
fetch("http://test/users/")
.then(products => products.json())
.then(product => product.map((element) => {
    row.innerHTML += `
    <div class="col-md-3 mb-2">
    <div class="card">
        <img src="${element.img}" class="card-img-top" alt="Product 2">
        <div class="card-body">
            <h5 class="card-title">${element.title}</h5>
            <p class="price">$${element.price}</p>
            <a href="/addCart?id=${element.id}" class="btn btn-primary">Add to Cart</a>
        </div>
    </div>
</div>
    `
}));

fetch("http://test/carts/")
    .then(carts => carts.json())
    .then(cart => cart.map((element) => {
        cartsBody.innerHTML += `
        <div class="card1">
        <img src=${element.img} class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">${element.title}</h5>
                <p>$${element.price}</p>
                <a href="delete/?id=${element.id}" class="btn btn-danger">Remove</a>
        </div>`
    }))