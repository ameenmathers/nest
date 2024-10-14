
import.meta.glob([
    '../img/**',
    '../fonts/**',
]);

import './bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
