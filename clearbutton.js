document.getElementById('clear-button').addEventListener('click', function(e) {
    const confirmed = confirm('Are you sure you want to clear the fields?');

    if (confirmed) {
        document.getElementById('title').value = '';
        document.getElementById('body').value = '';
    } else {
        e.preventDefault();
    }
});
