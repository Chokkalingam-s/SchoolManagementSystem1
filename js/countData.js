document.addEventListener("DOMContentLoaded", function () {
    fetch('../admin/count_data.php')
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                console.error(data.error);
            } else {
                document.getElementById("studentCount").textContent = data.studentCount;
                document.getElementById("staffCount").textContent = data.staffCount;
            }
        })
        .catch(error => console.error('Error fetching counts:', error));
});
