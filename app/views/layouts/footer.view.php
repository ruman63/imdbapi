    <!-- Flash Toast Messages -->
    <?php foreach (errors() as $error):?>
        <span data-toast data-text="<?= $error ?>" data-duration="6000"></span>
    <?php endforeach;?>
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    <script src="/js/app.js"></script>
</body>
</html>