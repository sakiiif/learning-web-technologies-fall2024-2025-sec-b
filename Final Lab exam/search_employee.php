<?php

$query = $_GET['query'];
$conn = new mysqli('localhost', 'root', '', 'shop');
$result = $conn->query("SELECT * FROM employee WHERE name LIKE '%$query%'");

while ($row = $result->fetch_assoc()) {
    echo "<p>{$row['name']} - {$row['contact_no']}</p>";
}


?>

<input type="text" id="searchBox" placeholder="Search employees">
<div id="results"></div>

<script>
    document.getElementById('searchBox').addEventListener('keyup', function() {
        let query = this.value;
        fetch(`search_employee.php?query=${query}`)
            .then(response => response.text())
            .then(data => document.getElementById('results').innerHTML = data);
    });
</script>

