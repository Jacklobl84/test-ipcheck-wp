<?php
/**
 * Template Name: IP checker
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
get_header(); ?>

<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

          <input type="text" id="userInput" />
          <input type="button" id="sese" value="Submit" onclick="myFunction();">

          <script>
           function myFunction() {
            var data = document.getElementById("userInput").value;
            var arr = data.split(",");

            var ip_addresses = [];
            jQuery.each(arr, function(index, value) {
              ip_addresses.push({
                  query:value
              });
            });

          jQuery.post("http://ip-api.com/batch/", JSON.stringify(ip_addresses), function(response) {
              var table_body = "";
              jQuery.each(response, function(i, ipObject) {
                table_body += "<div style='margin-bottom: 10px; border-bottom: 1px solid black;'><table>";
                jQuery.each(ipObject, function(k, v) {
                  table_body += "<tr><td>" + k + "</td><td><b>" + v + "</b></td></tr>";
                });
                table_body += "</table></div>";
              })
              jQuery("#GeoResults").prepend(table_body);
          }, "json");
      }
          </script>


			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/page/content', 'page' );


			endwhile; // End of the loop.
			?>
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer();
