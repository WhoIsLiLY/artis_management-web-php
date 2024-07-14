const clothes = [
    {
        "brand" : "Lacoste",
        "gender" : "Pria",
        "jenis" : "Baju",
        "price" : 299,
        "jpg" : "assets/other/catalog/lacoste/lacoste_baju_pria_1.jpg",
        "text" : "Lacoste Men's Shirt Slim",
        "index" : 0
    },
    {
        "brand" : "Lacoste",
        "gender" : "Pria",
        "jenis" : "Baju",
        "price" : 399,
        "jpg" : "assets/other/catalog/lacoste/lacoste_baju_pria_2.jpg",
        "text" : "Lacoste Men's Shirt Slim",
        "index" : 1
    },
    {
        "brand" : "Lacoste",
        "gender" : "Pria",
        "jenis" : "Celana",
        "price" : 699,
        "jpg" : "assets/other/catalog/lacoste/lacoste_celana_pria.jpg",
        "text" : "Lacoste Men's Trousers",
        "index" : 2
    },
    {
        "brand" : "Lacoste",
        "gender" : "Wanita",
        "jenis" : "Baju",
        "price" : 199,
        "jpg" : "assets/other/catalog/lacoste/lacoste_baju_wanita.jpg",
        "text" : "Lacoste Women's Shirt New",
        "index" : 3
    },
    {
        "brand" : "Lacoste",
        "gender" : "Wanita",
        "jenis" : "Celana",
        "price" : 499,
        "jpg" : "assets/other/catalog/lacoste/lacoste_celana_wanita_2.jpg",
        "text" : "Lacoste women's Trousers",
        "index" : 4
    },
    {
        "brand" : "Lacoste",
        "gender" : "Wanita",
        "jenis" : "Celana",
        "price" : 799,
        "jpg" : "assets/other/catalog/lacoste/lacoste_celana_wanita_1.jpg",
        "text" : "Lacoste women's Trousers",
        "index" : 5
    },
    // ----------------------uniqlo----------------------------
    {
        "brand" : "Uniqlo",
        "gender" : "Pria",
        "jenis" : "Baju",
        "price" : 899,
        "jpg" : "assets/other/catalog/uniqlo/uniqlo_baju_pria.jpg",
        "text" : "Uniqlo Men's Oversize TS",
        "index" : 6
    },
    {
        "brand" : "Uniqlo",
        "gender" : "Pria",
        "jenis" : "Celana",
        "price" : 399,
        "jpg" : "assets/other/catalog/uniqlo/uniqlo_celana_pria_1.jpg",
        "text" : "Uniqlo Men's Chino Regular",
        "index" : 7
    },
    {
        "brand" : "Uniqlo",
        "gender" : "Pria",
        "jenis" : "Celana",
        "price" : 299,
        "jpg" : "assets/other/catalog/uniqlo/uniqlo_celana_pria_2.jpg",
        "text" : "Uniqlo Men's Sweatpants",
        "index" : 8
    },
    {
        "brand" : "Uniqlo",
        "gender" : "Wanita",
        "jenis" : "Baju",
        "price" : 699,
        "jpg" : "assets/other/catalog/uniqlo/uniqlo_baju_wanita_1.jpg",
        "text" : "Uniqlo Women's U Sheer Long",
        "index" : 9
    },
    {
        "brand" : "Uniqlo",
        "gender" : "Wanita",
        "jenis" : "Baju",
        "price" : 499,
        "jpg" : "assets/other/catalog/uniqlo/uniqlo_baju_wanita_2.jpg",
        "text" : "Uniqlo Women's Linen Blend ",
        "index" : 10
    },
    {
        "brand" : "Uniqlo",
        "gender" : "Wanita",
        "jenis" : "Celana",
        "price" : 199,
        "jpg" : "assets/other/catalog/uniqlo/uniqlo_celana_wanita_1.jpg",
        "text" : "Uniqlo Women's Cotton Wide",
        "index" : 11
    },
    // ---------------------- H&M -------------------------
    {
        "brand" : "H n M",
        "gender" : "Pria",
        "jenis" : "Baju",
        "price" : 799,
        "jpg" : "assets/other/catalog/hnm/handm_baju_pria_1.jpg",
        "text" : "H n M Men's Regular Cotton Shirt",
        "index" : 12
    },
    {
        "brand" : "H n M",
        "gender" : "Pria",
        "jenis" : "Baju",
        "price" : 499,
        "jpg" : "assets/other/catalog/hnm/handm_baju_pria_2.jpg",
        "text" : "H n M Men's Regular Cotton Shirt",
        "index" : 13
    },
    {
        "brand" : "H n M",
        "gender" : "Pria",
        "jenis" : "Celana",
        "price" : 199,
        "jpg" : "assets/other/catalog/hnm/handm_celana_pria.jpg",
        "text" : "H n M Men's Skinny Fit Jeans",
        "index" : 14
    },
    {
        "brand" : "H n M",
        "gender" : "Wanita",
        "jenis" : "Baju",
        "price" : 799,
        "jpg" : "assets/other/catalog/hnm/handm_baju_wanita_.jpg",
        "text" : "H n M Women's Original T-Shirt",
        "index" : 15
    },
    {
        "brand" : "H n M",
        "gender" : "Wanita",
        "jenis" : "Celana",
        "price" : 499,
        "jpg" : "assets/other/catalog/hnm/handm_celana_wanita_1.jpg",
        "text" : "H n M Women's Rib Knit Pants",
        "index" : 16
    },
    {
        "brand" : "H n M",
        "gender" : "Wanita",
        "jenis" : "Celana",
        "price" : 299,
        "jpg" : "assets/other/catalog/hnm/handm_celana_wanita_2.jpg",
        "text" : "H n M Women's Simply Pants",
        "index" : 17
    },
]
function itembtn(element) { 
    const index = $(element).attr("data-index");
    setup(index);
};
$(".filter").click(function () { 
    $("#main-banner").html("");
    const filter_by = $(this).attr("data-filter");
    const filter_value = $(this).attr("data-name");
    clothes.forEach(part => {
        if(filter_by == "brand"){
            if(filter_value == "ALL"){
                $("#main-banner").append(
                    `<div class="col">
                        <div class="card" style="background-color: rgb(230, 232, 234);">
                            <img src="${part.jpg}" class="card-img-top" alt="...">
                            <div class="card-body text-start text-light">
                            <h6 class="card-title text-center text-dark fw-bolder fs-5">${part.text}</h6>
                            <div class="card-text mb-2 w-100 d-flex justify-content-between" style="color: rgba(34, 34, 34, 0.555);">
                                <div class="col text-start">${part.jenis}<br> ${part.gender}</div>
                                <div class="col text-end">Rp ${part.price}K</div>
                            </div>
                            <a href="details.html?brand=${part.brand}&jpg=${part.jpg}&gender=${part.gender}&jenis=${part.jenis}&text=${part.text}&price=${part.price}" class="btn btn-danger pb-1 pt-1 ps-4 pe-4" data-index = ${part.index} onclick = "itembtn(this)">Details</a>   
                            </div>
                        </div>
                    </div>`
                );
            }else if(part.brand == filter_value){
                $("#main-banner").append(
                    `<div class="col">
                        <div class="card" style="background-color: rgb(230, 232, 234);">
                            <img src="${part.jpg}" class="card-img-top" alt="...">
                            <div class="card-body text-start text-light">
                            <h6 class="card-title text-center text-dark fw-bolder fs-5">${part.text}</h6>
                            <div class="card-text mb-2 w-100 d-flex justify-content-between" style="color: rgba(34, 34, 34, 0.555);">
                                <div class="col text-start">${part.jenis}<br> ${part.gender}</div>
                                <div class="col text-end">Rp ${part.price}K</div>
                            </div>
                            <a href="details.html?brand=${part.brand}&jpg=${part.jpg}&gender=${part.gender}&jenis=${part.jenis}&text=${part.text}&price=${part.price}" class="btn btn-danger pb-1 pt-1 ps-4 pe-4" data-index = ${part.index} onclick = "itembtn(this)">Details</a>   
                            </div>
                        </div>
                    </div>`
                );
            }
        }else if(filter_by == "gender"){
            if(part.gender == filter_value){
                $("#main-banner").append(
                    `<div class="col">
                        <div class="card" style="background-color: rgb(230, 232, 234);">
                            <img src="${part.jpg}" class="card-img-top" alt="...">
                            <div class="card-body text-start text-light">
                            <h6 class="card-title text-center text-dark fw-bolder fs-5">${part.text}</h6>
                            <div class="card-text mb-2 w-100 d-flex justify-content-between" style="color: rgba(34, 34, 34, 0.555);">
                                <div class="col text-start">${part.jenis}<br> ${part.gender}</div>
                                <div class="col text-end">Rp ${part.price}K</div>
                            </div>
                            <a href="details.html?brand=${part.brand}&jpg=${part.jpg}&gender=${part.gender}&jenis=${part.jenis}&text=${part.text}&price=${part.price}" class="btn btn-danger pb-1 pt-1 ps-4 pe-4" data-index = ${part.index} onclick = "itembtn(this)">Details</a>   
                            </div>
                        </div>
                    </div>`
                );
            }
        }else if(filter_by == "jenis"){
            if(part.jenis == filter_value){
                $("#main-banner").append(
                    `<div class="col">
                        <div class="card" style="background-color: rgb(230, 232, 234);">
                            <img src="${part.jpg}" class="card-img-top" alt="...">
                            <div class="card-body text-start text-light">
                            <h6 class="card-title text-center text-dark fw-bolder fs-5">${part.text}</h6>
                            <div class="card-text mb-2 w-100 d-flex justify-content-between" style="color: rgba(34, 34, 34, 0.555);">
                                <div class="col text-start">${part.jenis}<br> ${part.gender}</div>
                                <div class="col text-end">Rp ${part.price}K</div>
                            </div>
                            <a href="details.html?brand=${part.brand}&jpg=${part.jpg}&gender=${part.gender}&jenis=${part.jenis}&text=${part.text}&price=${part.price}" class="btn btn-danger pb-1 pt-1 ps-4 pe-4" data-index = ${part.index} onclick = "itembtn(this)">Details</a>   
                            </div>
                        </div>
                    </div>`
                );
            }
        }else if(filter_by == "price"){
            let onprice = false;
            if(filter_value == "low"){
                if(part.price >= 199 && part.price < 399){
                    onprice = true;
                }
            }else if(filter_value == "mid"){
                if(part.price >= 399 && part.price <= 599){
                    onprice = true;
                }
            }else if(filter_value == "high"){
                if(part.price > 599){
                    onprice = true;
                }
            }
            if(onprice){
                $("#main-banner").append(
                    `<div class="col">
                        <div class="card" style="background-color: rgb(230, 232, 234);">
                            <img src="${part.jpg}" class="card-img-top" alt="...">
                            <div class="card-body text-start text-light">
                            <h6 class="card-title text-center text-dark fw-bolder fs-5">${part.text}</h6>
                            <div class="card-text mb-2 w-100 d-flex justify-content-between" style="color: rgba(34, 34, 34, 0.555);">
                                <div class="col text-start">${part.jenis}<br> ${part.gender}</div>
                                <div class="col text-end">Rp ${part.price}K</div>
                            </div>
                            <a href="details.html?brand=${part.brand}&jpg=${part.jpg}&gender=${part.gender}&jenis=${part.jenis}&text=${part.text}&price=${part.price}" class="btn btn-danger pb-1 pt-1 ps-4 pe-4" data-index = ${part.index} onclick = "itembtn(this)">Details</a>   
                            </div>
                        </div>
                    </div>`
                );
            }
        }
    });
});

$(document).ready(function () {
    clothes.forEach(part => {
        $("#main-banner").append(
            `<div class="col">
                <div class="card" style="background-color: rgb(230, 232, 234);">
                    <img src="${part.jpg}" class="card-img-top" alt="...">
                    <div class="card-body text-start text-light">
                    <h6 class="card-title text-center text-dark fw-bolder fs-5">${part.text}</h6>
                    <div class="card-text mb-2 w-100 d-flex justify-content-between" style="color: rgba(34, 34, 34, 0.555);">
                        <div class="col text-start">${part.jenis}<br> ${part.gender}</div>
                        <div class="col text-end">Rp ${part.price}K</div>
                    </div>
                    <a href="details.html?brand=${part.brand}&jpg=${part.jpg}&gender=${part.gender}&jenis=${part.jenis}&text=${part.text}&price=${part.price}" class="btn btn-danger pb-1 pt-1 ps-4 pe-4" data-index = ${part.index} onclick = "itembtn(this)">Details</a>   
                    </div>
                </div>
            </div>`
        );
    });
});
