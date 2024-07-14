var counterBrandMode = 2;

const cards = document.querySelectorAll(".animate")
const banner_title = document.querySelectorAll(".banner-title");
const observer = new IntersectionObserver(entries =>{
    entries.forEach(entry => {
        entry.target.classList.toggle("show", entry.isIntersecting);
    });
})
banner_title.forEach(card =>{
    observer.observe(card)
})
cards.forEach(card => {
    observer.observe(card)
});

$(document).ready(function(){
    setInterval(() => {
        let banner = $("#mainbanner");
        let brandQuote = $("#brand-quote");
        let clothesBrand = $("#clothes-brand");
        if(counterBrandMode == 1){
            banner.css(`background-image`, `linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)),url('assets/other/uniqlo_model.jpg')`);
            clothesBrand.text("UNIQLO");
            brandQuote.html(`<a id="brand-quote">
                            Uniqlo has always developed new fabrics<br>and is always trying to be innovative. <br> 
                            The design is simple so the fabric is important</a>`);
        }else if(counterBrandMode == 2){
            banner.css(`background-image`, `linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)),url('assets/other/handm_model.jpg')`);
            clothesBrand.text("H & M");
            brandQuote.html(`<a id="brand-quote">
                            you're thinking of something that's<br>accessible to a broad range of people <br> 
                            perhaps far broader than most of these beautiful shows.</a>`);
        }else if(counterBrandMode == 3){
            banner.css(`background-image`, `linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)),url('assets/other/polo_model.jpg')`);
            clothesBrand.text("P O L O");
            brandQuote.html(`<a id="brand-quote">
                            A leader has the vision and conviction<br>that a dream can be achieved.<br> 
                            He inspires the power and energy to get it done.</a>`);
        }
        counterBrandMode++;
        if(counterBrandMode > 3){
            counterBrandMode = 1;
        }
    }, 3000);
});