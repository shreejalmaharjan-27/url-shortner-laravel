import './bootstrap';
import ClipboardJS from 'clipboard';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
// any element with class copy will instantiate
const clipboard = new ClipboardJS('.copy');

clipboard.on('success', (e) => {
    alert('Copied link to clipboard.','success');
});
