<footer><span>&copy; <?php echo date("Y"); ?> fledr by codekod.com :)</span></footer>
<script>
    $(".show_act").click(function() {
        if ($('header').hasClass('menuopen')) {
            $('header').removeClass('menuopen');
        } else {
           $('header').addClass('menuopen');
        }
    });
</script>
    
</body>
</html>
