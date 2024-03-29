        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">TrendyDress Shop</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
<script>

    function loadRegisterPage() {
        fetch('./client/register-customer.php')
            .then(response => response.text())
            .then(html => {
                document.getElementById('registerContent').innerHTML = html;
            })
            .catch(error => {
                console.error('Error loading the register page:', error);
            });
    }
</script>