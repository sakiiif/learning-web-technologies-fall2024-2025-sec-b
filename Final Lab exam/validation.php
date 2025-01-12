<script>
document.getElementById('employeeForm').addEventListener('submit', function(event) {
    let name = document.querySelector('[name="name"]').value;
    let contact_no = document.querySelector('[name="contact_no"]').value;
    let username = document.querySelector('[name="username"]').value;
    let password = document.querySelector('[name="password"]').value;

    if (!name || !contact_no || !username || !password) {
        alert('All fields are required!');
        event.preventDefault();
    }
});
</script>