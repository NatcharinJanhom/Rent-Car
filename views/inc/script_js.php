<script>
 var current = location.pathname.split("/").slice(2)[0].replace(/^\/|\/$/g, '');
 $('.navbar-nav li a').each(function() {
      var $this = $(this);
      if (current === "") {
        //for root url
        if ($this.attr('href').indexOf("home") !== -1) {
          $(".nav-item").first().addClass('active');
        }
      } else {
          
        //for other url
        if ($this.attr('href').indexOf(current) !== -1) {
          $(this).parents('.nav-item').last().addClass('active');
          if ($(this).parents('.sub-menu').length) {
            $(this).addClass('active');
          }
          if(current !== "index.html") {
            $(this).parents('.nav-item').last().find(".nav-link").attr("aria-expanded", "true");
            if ($(this).parents('.sub-menu').length) {
              $(this).closest('.collapse').addClass('show');
            }
          }
        }
      }
    })

</script>
