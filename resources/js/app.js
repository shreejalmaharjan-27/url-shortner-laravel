import './bootstrap';
import ClipboardJS from 'clipboard';
// any element with class copy will instantiate
const clipboard = new ClipboardJS('.copy');

clipboard.on('success', (e) => {
    alert('Copied link to clipboard.','success');
});
