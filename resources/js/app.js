import './bootstrap';

// Importiamo il nostro stile custom
import '~resources/scss/app.scss';



// Importiamo la parte JS di Bootstrap
import * as bootstrap from 'bootstrap';
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl);
}); 


// Istruiamo Vite e Blade affinchè processino correttamente i nostri assets
import.meta.glob([
    '../img/**'
]);
