function toggleUpdateForm(id) {
    var form = document.getElementById('update-form-' + id);
    if (form.style.display === 'none') {
        form.style.display = 'block';
    } else {
        form.style.display = 'none';
    }
}

function confirmDelete(id) {
    if (confirm('Are you sure you want to delete this feedback?')) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                location.reload();
            }
        };
        xhttp.open("GET", "../php/delete_feedback.php?id=" + id, true);
        xhttp.send();
    }
}