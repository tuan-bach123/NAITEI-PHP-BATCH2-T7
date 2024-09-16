import './bootstrap';
import 'flowbite';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

function sidebarOpen() {
    document.getElementsByClassName('cart__sidebar')[0].classList.add('show');
    document.getElementsByClassName('cart__sidecontainer')[0].classList.add('show');
}

function sidebarClose() {
    document.getElementsByClassName('cart__sidebar')[0].classList.remove('show');
    document.getElementsByClassName('cart__sidecontainer')[0].classList.remove('show');
}

function applySort(sortValue) {
    // Set the sort value in the hidden input field
    document.getElementById('sortInput').value = sortValue;

    // Submit the form
    document.getElementById('filterSortForm').submit();
}

window.applySort = applySort;
window.sidebarOpen = sidebarOpen;
window.sidebarClose = sidebarClose;

