require('./bootstrap');

const deleteForm = document.querySelectorAll('.delete-post-form');

deleteForm.forEach(i => {
    i.addEventListener('submit', function(e) {
        const resp = confirm('vuoi veramente rimuovere questo post?');

        if(!resp) {
            e.preventDefault();
        }
    });
})