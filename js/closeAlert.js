function closeAlert(button) {
    var alert = button.parentElement; 
    if (alert) {
        alert.classList.add('fadeOut');
        setTimeout(function() {
            alert.remove();
        }, 500); 
    }
}