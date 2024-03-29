 <!-- JavaScript Libraries -->
 <!-- JavaScript Libraries -->
 <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
 <script src="{{ asset('admin2/lib/chart/chart.min.js') }}"></script>
 <script src="{{ asset('admin2/lib/easing/easing.min.js') }}"></script>
 <script src="{{ asset('admin2/lib/waypoints/waypoints.min.js') }}"></script>
 <script src="{{ asset('admin2/lib/owlcarousel/owl.carousel.min.js') }}"></script>
 <script src="{{ asset('admin2/lib/tempusdominus/js/moment.min.js') }}"></script>
 <script src="{{ asset('admin2/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
 <script src="{{ asset('admin2/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

 <!-- Template Javascript -->
 <script src="{{ asset('admin2/js/main.js') }}"></script>
 <link rel="stylesheet" type="text/css"
     href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-colvis-1.6.1/b-html5-1.6.1/b-print-1.6.1/r-2.2.3/datatables.min.css" />
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
 <script type="text/javascript"
     src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-colvis-1.6.1/b-html5-1.6.1/b-print-1.6.1/r-2.2.3/datatables.min.js">
 </script>
 <script>
     $(document).ready(function() {
         $('#table_id').DataTable({
             dom: 'Bfrtip',
             responsive: false,
             pageLength: 25,
             buttons: [
                 'copy', 'excel', 'pdf', 'print'
             ]
         });
     });

     $(document).ready(function() {
         $('#user_id').DataTable({
             dom: 'Bfrtip',
             responsive: false,
             pageLength: 25,
             buttons: [
                 'copy', 'excel', 'pdf', 'print'
             ]
         });
     });
 </script>
 </body>

 </html>
