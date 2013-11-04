<footer><span>&copy; <?php echo date("Y"); ?> fledr by codekod.com</span></footer>
<script>
    $(".show_act").click(function() {
    $("header").addClass("menuopen");
    });
    $(".content").click(function() {
    $("header").removeClass("menuopen");
    });
</script>
    
</body>
</html>