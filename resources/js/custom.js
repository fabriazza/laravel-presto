$( document ).ready(function() {
    let dragText = document.querySelector('.dz-button');
    let lang = document.documentElement.lang;
    switch(lang){
        case "it":
            dragText.innerHTML="Trascina o clicca qui per inserire le tue immagini"
            break;
        case "en":
            dragText.innerHTML="Drag or click here to insert your images"
            break;
        case "es":
            dragText.innerHTML="Arrastre o haga clic aquí para insertar sus imágenes"
            break;
    };
});
