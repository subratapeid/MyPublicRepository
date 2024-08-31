<!-- content area end -->
</div>
      </div>
      <footer class="footer col-12 d-flex justify-content-center ">
        <div><a href="https://integramicro.com/">Integra</a> © 2023 Integra Micro System</div>

      </footer>
    </div>
    <!-- CoreUI and necessary plugins-->
    <script src="vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
    <script src="vendors/simplebar/js/simplebar.min.js"></script>
    <script src="vendors/@coreui/utils/js/coreui-utils.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- logout popup -->

<script>
document.getElementById('logoutLink').addEventListener('click', function(e) {
    e.preventDefault(); // Prevent the default action of the link
    
    if (confirm('Are you sure you want to logout?')) {
        // If user clicks OK, execute the logout code
        window.location.href = 'logout.php';
    } else {
        // If user clicks Cancel, do nothing or perform other actions
    }
});
</script>

  </body>
</html>