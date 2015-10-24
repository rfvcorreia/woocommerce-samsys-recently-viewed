<?php 

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
/**
 * Creates Samsys Catalog widgets.
 *
 * @see WP_Widget::widget()
 *
 * @package   samsys_WC_recently_viewed
 * @author    Ricardo Correia, Samsys <ricardo.correia@samsys.pt>
 * @license   GPL-2.0+
 * @link      http://samsys.pt
 * @copyright 2015 Samsys - Consultoria e Soluções Informáticas, Lda.
 */

add_action( 'widgets_init', 'register_ssys_WC_recently_viewed_widget', 15 );

/**
 * Initializes featured posts widget.
 *
 * @see WP_Widget::widget()
 * 
 * @since   2.0.0
 */
function register_ssys_WC_recently_viewed_widget() {

	class Ssys_WC_Recently_Viewed extends WC_Widget {

		/**
		 * Constructor
		 */
		function __construct() {
			
			$this->widget_cssclass    = 'woocommerce widget_recently_viewed_products ssys_all_visitors';
			$this->widget_description = __( 'Display a list of recently viewed products from all visitors.', 'woocommerce-ssys-recently-viewed' );
			$this->widget_id          = 'woocommerce-ssys-recently-viewed';
			$this->widget_name        = __( 'WooCommerce Recently Viewed Products from all visitors', 'woocommerce-ssys-recently-viewed' );

			$this->settings           = array(
				'title'  => array(
					'type'  => 'text',
					'std'   => __( 'Recently Viewed Products', 'woocommerce' ),
					'label' => __( 'Title', 'woocommerce' )
				),
				'number' => array(
					'type'  => 'number',
					'step'  => 1,
					'min'   => 1,
					'max'   => '',
					'std'   => 4,
					'label' => __( 'Number of products to show', 'woocommerce' )
				),
				'fromadmin' => array(
					'type'  => 'checkbox',
					'std'   => '',
					'label' => __( 'Exclude views from administrators and shop managers', 'woocommerce' )
				)
			);

			parent::__construct();

		}

		/**
		 * Front-end display of widget.
		 *
		 * @see WP_Widget::widget()
		 *
		 * @param array $args     Widget arguments.
		 * @param array $instance Saved values from database.
		 */
		public function widget( $args, $instance ) {
			
			$number = ! empty( $instance['number'] ) ? absint( $instance['number'] ) : $this->settings['number']['std'];

			//Get Recently Viewed Products
			$recent_args = array(
					   'post_type' => 'product',
					   'post_status' => array( 'publish' ),
					   'posts_per_page' => $number,
					   'orderby' => 'meta_value_num',
	    			   'order' => 'DESC',
	    			   'meta_key' => '_ssys_Last_Viewed_Date'
					);

			//Verify stock status
			$recent_args['meta_query']   = array();
		    $recent_args['meta_query'][] = WC()->query->stock_status_meta_query();
		    $recent_args['meta_query']   = array_filter( $recent_args['meta_query'] );
					
			$recent_query = new WP_Query($recent_args);
			
			echo '<ul class="product_list_widget">';
			
			if($recent_query->have_posts()){
				
				$this->widget_start( $args, $instance );

				echo '<ul class="product_list_widget ssys_recently_viewed">';

				while ($recent_query->have_posts()){ 

					$recent_query->the_post();
					
					$located = wc_locate_template('ssys-content-widget-product.php');

					//Load Widget template if exists, else load WC default recently viewed widget template
					if( file_exists($located)){
				
						wc_get_template( 'ssys-content-widget-product.php' );
				
					}else{
				
						wc_get_template( 'content-widget-product.php' );
				
					}
				
				}
				
				echo '</ul>';

				$this->widget_end( $args );
				
			}

			wp_reset_postdata();
			
		}

	} // class Ssys_WC_Recently_Viewed

	register_widget( 'Ssys_WC_Recently_Viewed' );
   
}