<footer class="footer">
            <div class="card">
              <div class="card-body">
                <div
                  class="d-sm-flex justify-content-center justify-content-sm-between">
                  <span
                    class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright
                    © 2020 NCOnline. All
                    rights reserved.</span>

                </div>
              </div>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>


<script src="<?= url ?>1/vendors/js/vendor.bundle.base.js"></script>
  <script src="<?= url ?>1/js/off-canvas.js"></script>
  <script src="<?= url ?>1/js/hoverable-collapse.js"></script>
  <script src="<?= url ?>1/js/template.js"></script>
  <script src="<?= url ?>1/js/settings.js"></script>
  <script src="<?= url ?>1/js/todolist.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    function logout() {
        Swal.fire({
            title: 'Are you sure you want to logout?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, logout'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '<?= url ?>Users/logout';
            }
        });
    } 
</script>



</body>

</html>