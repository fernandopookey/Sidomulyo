<footer class="main-footer">
    <strong>Copyright &copy; 2023 <b>Admin Sidomulyo</b>

        <aside class="control-sidebar control-sidebar-dark">

        </aside>

        </div>


        <script src="/adminsidomulyo/plugins/jquery/jquery.min.js"></script>

        <script src="/adminsidomulyo/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

        <script src="/adminsidomulyo/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

        <script src="/adminsidomulyo/dist/js/adminlte.min.js?v=3.2.0"></script>

        <script src="/adminsidomulyo/dist/js/demo.js"></script>

        @stack('prepend-script')
        <script src="/vendor/jquery/jquery.min.js"></script>
        <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.datatables.net/v/dt/dt-1.13.3/datatables.min.js"></script>
        <script></script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init();
        </script>
        <script>
            $('#menu-toggled').click(function (e) {
          e.preventDefault();
          $('#wrapper').toggleClass('toggled');
        })
        </script>
        @stack('addon-script')
        </body>

        </html>