    </div>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
    <script src="http://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/d004434a5ff76e7b97c8b07c01f34ca69e635d97/src/js/bootstrap-datetimepicker.js"></script>
    <script>
        jQuery(function($) {
            $('#datetimepicker2, #data').datetimepicker({
                'sideBySide': true,
                'format': 'YYYY-MM-DD'
            });
            $('#datetimepicker4, #ora, #start, #finis').datetimepicker({
                'format': 'HH:mm',
                'stepping': '30'
            });

            $('#start').on('dp.change', function(e) {
                console.info(e);
//                $('#finis').data('DateTimePicker').minDate($('#start').val());
            });
        });
    </script>
  </body>
</html>