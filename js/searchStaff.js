function searchStaff(query) {
    fetch(`search_staff.php?search=${encodeURIComponent(query)}`)
        .then(response => response.json())
        .then(data => {
            const tableBody = document.querySelector("#staffTable tbody");
            tableBody.innerHTML = ""; // Clear existing rows

            if (data.error) {
                tableBody.innerHTML = `<tr><td colspan="6">${data.error}</td></tr>`;
            } else if (data.length > 0) {
                data.forEach((staff, index) => {
                    const row = document.createElement("tr");
                    row.innerHTML = `
                        <td>${index + 1}</td>
                        <td>${staff.TNAME}</td>
                        <td>${staff.QUAL}</td>
                        <td>${staff.SAL}</td>
                        <td><a href='staff_view.php?id=${staff.TID}' class='btnb'>View</a></td>
                        <td><a href='staff_delete.php?id=${staff.TID}' class='btnr'>Delete</a></td>
                    `;
                    tableBody.appendChild(row);
                });
            } else {
                tableBody.innerHTML = "<tr><td colspan='6'>No Records Found</td></tr>";
            }
        })
        .catch(error => {
            console.error("Error fetching staff:", error);
        });
}
