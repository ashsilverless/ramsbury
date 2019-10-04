<?php
/**
 * The template for displaying the footer
 * @package ramsbury
 */
?>
<!--test slack notification-->
</main>

<footer class="footer">

    <div class="details">

        <?php get_template_part('template-parts/ramsbury', 'logo');?>

        <p class="mt2"><?php the_field('footer_heading', 'option');?></p>

        <p><?php the_field('shop_address', 'option');?></p>

        <p><?php the_field('shop_telephone', 'option');?></p>

        <div class="socials mt1">

            <?php if( have_rows('social_links', 'option') ): while( have_rows('social_links', 'option') ): the_row(); ?>

            <a href="<?php the_sub_field('page_link'); ?>"><i class="fab fa-<?php the_sub_field('name'); ?>"></i></a>

            <?php endwhile; endif; ?>

        </div>

    </div>

    <div class="container-fluid pl0 pr0">

	    <?php
		    global $woocommerce;

		    $myaccount_page_id = get_option( 'woocommerce_myaccount_page_id' );

			$account_url = $myaccount_page_id ? get_permalink( $myaccount_page_id ) : "";

			$cart_url = $woocommerce->cart->get_cart_url();

		    $checkout_url = $woocommerce->cart->get_checkout_url();

		?>

        <div class="socket">

            <div class="row">

                <div class="col-6">

                    &copy; Ramsbury Brewery <?php echo date ('Y');?> |

                    <a href="/terms-conditions">Terms & Conditions</a> |

                    <a href="/privacy">Privacy Policy</a>

                </div>

                <div class="col-6 text-right">

                    <a href="<?php echo $cart_url; ?>">Basket</a> |

                    <a href="<?php echo $checkout_url; ?>">Checkout</a> |

                    <a href="<?php echo $account_url; ?>">My Account</a>

                </div>

            </div><!--row-->

        </div><!--socket-->

    </div><!--container-->

</footer>

</div><!-- #page -->

<?php wp_footer(); ?>

<!-- Google Analytics -->
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-149022531-1', 'auto');
ga('send', 'pageview');
</script>
<!-- End Google Analytics -->

</body>

</html>
