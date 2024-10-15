
  //validacion de nueva guitarra
function validarGuitarra() {
    let valido = true;

    let marca = $("#marca");
    let modelo = $("#modelo");
    let tipo = $("#tipo");
    let precio = $("#precio");
    let stock = $("#stock");
    let fechaIngreso = $("#fecha_ingreso");

    //reiniciar clases de validación
    marca.removeClass("is-invalid is-valid");
    modelo.removeClass("is-invalid is-valid");
    tipo.removeClass("is-invalid is-valid");
    precio.removeClass("is-invalid is-valid");
    stock.removeClass("is-invalid is-valid");
    fechaIngreso.removeClass("is-invalid is-valid");

    //marca, solo letras y espacios
    let regexMarca = /^[A-Za-z\s]+$/;
    if (!regexMarca.test(marca.val())) {
        marca.addClass("is-invalid");
        valido = false;
    } else {
        marca.addClass("is-valid");
    }

    //modelo, letras y nros
    let regexModelo = /^[A-Za-z0-9]+$/;
    if (!regexModelo.test(modelo.val())) {
        modelo.addClass("is-invalid");
        valido = false;
    } else {
        modelo.addClass("is-valid");
    }

    //tipo, letras y espaciso
    let regexTipo = /^[A-Za-z\s]+$/;
    if (!regexTipo.test(tipo.val())) {
        tipo.addClass("is-invalid");
        valido = false;
    } else {
        tipo.addClass("is-valid");
    }

    //precio:
    let regexPrecio = /^\d+$/;
    if (!regexPrecio.test(precio.val()) || parseInt(precio.val()) <= 0) {
        precio.addClass("is-invalid");
        valido = false;
    } else {
        precio.addClass("is-valid");
    }

    //stock, nros enteros > 0
    let regexStock = /^\d+$/;
    if (!regexStock.test(stock.val()) || parseInt(stock.val()) < 0) {
        stock.addClass("is-invalid");
        valido = false;
    } else {
        stock.addClass("is-valid");
    }

    //fecha de ingreso q no este vacia
    if (!fechaIngreso.val()) {
        fechaIngreso.addClass("is-invalid");
        valido = false;
    } else {
        fechaIngreso.addClass("is-valid");
    }

    return valido;
}