const urlParams = new URLSearchParams(window.location.search);
const brand = urlParams.get('brand');
const jpg = urlParams.get('jpg');
const gender = urlParams.get('gender');
const jenis = urlParams.get('jenis');
const price = urlParams.get('price');
const text = urlParams.get('text');
$(document).ready(function () {
    $("#main").html(
        `
        <div class="card mb-3">
              <div class="row g-0">
                <div class="col-xl-4">
                  <img src="${jpg}" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-xl-8">
                  <div class="card-body">
                    <h1 class="card-title fw-bolder text-center">${text}</h5>
                    <h5 class="card-text fw-bolder mt-5 text-muted">
                      <div class="row text-start m-3">
                        <div class="col">Barang</div>
                        <div class="col">: Tersedia</div>
                      </div>
                      <div class="row text-start m-3">
                        <div class="col">Kondisi</div>
                        <div class="col">: Baru</div>
                      </div>
                      <div class="row text-start m-3">
                        <div class="col">Ukuran</div>
                        <div class="col">: XS - XX</div>
                      </div>
                      <div class="row text-start m-3">
                        <div class="col">Brand</div>
                        <div class="col">: ${brand}</div>
                      </div>
                      <div class="row text-start m-3">
                        <div class="col">Tipe</div>
                        <div class="col">:  ${jenis} ${gender}</div>
                      </div>
                      <div class="row text-start m-3">
                        <div class="col">Harga</div>
                        <div class="col">: Rp ${price}.000</div>
                      </div>
                    </h5>
                    <div class="row m-3 mt-5">
                      <div class="col text-start">
                        <a href="catalog_page.html" class="btn btn-primary pb-1 pt-1 ps-4 pe-4">Back Page</a>
                      </div>
                      <div class="col text-end">
                        <a href="catalog_page.html" class="btn btn-primary pb-1 pt-1 ps-4 pe-4">Buy Item</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        `  
    );
});