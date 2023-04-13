<footer class="footer mt-auto text-center">
        <div class="copyright bg-white">
          <p>
            &copy; <span id="copy-year"></span> Copyright Pinso Market ,Tous droits reservés . Par <a class="text-primary" href="#" ><?php echo APP_NAME ?></a>.
          </p>
        </div>
        <script>
          var d = new Date();
          var year = d.getFullYear();
          document.getElementById("copy-year").innerHTML = year;
        </script>
</footer>