import './bootstrap';

import.meta.glob([
    '../img/**',
    '../fonts/**',
]);

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
