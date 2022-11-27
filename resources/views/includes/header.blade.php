{{-- function to display user alerts --}}

<alert-corner class="block fixed right-4 bottom-4 space-y-2">

</alert-corner>

<script>
    const alertCorner = document.querySelector('alert-corner');
    function alert(message, type = null) {

        // random string as id
        let random = "alert_"+(Math.random() + 1).toString(36).substring(2);

        switch (type ?? false) {
            case 'info':
                icon = `<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-current flex-shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>`;
                break;

            case 'success':
                icon = `<svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>`;
                break;

            case 'warning':
                icon = `<svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>`;
                break;

            case 'error':
                icon = `<svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>`;
                break;

            default:
                icon = `<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-current flex-shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>`;
        }


        let content = `<div class="alert ${(type ?? false) ? "alert-"+type : ''} flex-row min-w-[20rem] shadow-lg max-w-xs" id="${random}">
            <div>
                ${icon}
                <span class="line-clamp-3">${message}</span>
            </div>
            <x-fas-times class="w-6 h-6 cursor-pointer stroke-current flex-shrink-0" onclick="remove('${random}')"/>
        </div>`;
        alertCorner.insertAdjacentHTML('beforeend',content);
        setTimeout(() => {
            remove(random);
        }, 5000);
    }

    // removes element
    function remove(id) {
        if (document.getElementById(id)) {
            document.getElementById(id).remove();
        }
    }

</script>
