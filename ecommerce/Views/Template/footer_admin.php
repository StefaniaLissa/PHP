<script>
        const base_url = "<?= base_url(); ?>";
    </script>
    <!-- Essential javascripts for application to work-->
    <script src="<?= media(); ?>/Admin/js/jquery-3.3.1.min.js"></script>
    <script src="<?= media(); ?>/Admin/js/popper.min.js"></script>
    <script src="<?= media(); ?>/Admin/js/bootstrap.min.js"></script>
    <script src="<?= media(); ?>/Admin/js/main.js"></script>
    <script src="<?= media();?>/Admin/js/fontawesome.js"></script>
    <script src="<?= media(); ?>/Admin/js/functions_admin.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="<?= media(); ?>/Admin/js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
     <script type="text/javascript" src="<?= media(); ?>/Admin/js/plugins/sweetalert.min.js"></script>

    <!-- Data table plugin-->
    <script type="text/javascript" src="<?= media(); ?>/Admin/js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?= media(); ?>/Admin/js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="<?= media();?>/Admin/js/plugins/bootstrap-select.min.js"></script>
    
    <!-- Exportar en Excel, PDF y CSV -->
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>

    <script type="text/javascript" src="<?= media();?>/Admin/js/functions_admin.js"></script>
    <script src="<?= media(); ?>/Admin/js/<?= $data['page_functions_js']; ?>"></script>
  </body>
</html>