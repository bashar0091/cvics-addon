<?php
class cvics_blog_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'cvics_blog_Widget';
	}

	public function get_title() {
		return esc_html__( 'Cvics Blog', 'cvics' );
	}

	public function get_icon() {
		return 'eicon-code';
	}

	public function get_categories() {
		return [ 'basic' ];
	}

	public function get_keywords() {
		return [ 'blog', 'post', 'cvics' ];
	}

	protected function register_controls() {

		// Content Tab Start

		$this->start_controls_section(
			'section_title',
			[
				'label' => esc_html__( 'Title', 'cvics' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'readmore_title',
			[
				'label' => esc_html__( 'Title', 'cvics' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Read More', 'cvics' ),
			]
		);
		$this->add_control(
			'readmore_icon',
			[
				'label' => esc_html__( 'Icon', 'cvics' ),
				'type' => \Elementor\Controls_Manager::ICONS,
			]
		);

		$this->end_controls_section();

		// Content Tab End


		// Style Tab Start

		// title 
		$this->start_controls_section(
			'blog_title',
			[
				'label' => esc_html__( 'Title', 'cvics' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'blog_title_color',
			[
				'label' => esc_html__( 'Title Color', 'cvics' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .blog-title' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'blog_title_typography',
				'selector' => '{{WRAPPER}} .blog-title',
			]
		);

		$this->end_controls_section();

		// paragraph 
		$this->start_controls_section(
			'blog_excerpt',
			[
				'label' => esc_html__( 'Excerpt', 'cvics' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'blog_excerpt_color',
			[
				'label' => esc_html__( 'Excerpt Color', 'cvics' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .blog-excerpt' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'blog_excerpt_typography',
				'selector' => '{{WRAPPER}} .blog-excerpt',
			]
		);
		
		$this->end_controls_section();

		// readmore 
		$this->start_controls_section(
			'blog_readmore',
			[
				'label' => esc_html__( 'Read More', 'cvics' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'blog_readmore_color',
			[
				'label' => esc_html__( 'Read More Color', 'cvics' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .blog-readmore' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'blog_readmore_typography',
				'selector' => '{{WRAPPER}} .blog-readmore',
			]
		);

		$this->end_controls_section();

		// category 
		$this->start_controls_section(
			'blog_cat',
			[
				'label' => esc_html__( 'Category', 'cvics' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'blog_cat_color',
			[
				'label' => esc_html__( 'Category Color', 'cvics' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cat-item' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'blog_cat_typography',
				'selector' => '{{WRAPPER}} .cat-item',
			]
		);

		$this->end_controls_section();

		// date 
		$this->start_controls_section(
			'blog_date',
			[
				'label' => esc_html__( 'Date', 'cvics' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'blog_day_color',
			[
				'label' => esc_html__( 'Day Color', 'cvics' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .blog-day' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'blog_day_typography',
				'selector' => '{{WRAPPER}} .blog-day',
			]
		);

		$this->add_control(
			'blog_month_color',
			[
				'label' => esc_html__( 'Month Color', 'cvics' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .blog-month' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'blog_month_typography',
				'selector' => '{{WRAPPER}} .blog-month',
			]
		);

		$this->end_controls_section();

		// Style Tab End

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<style>
            .blog-wrapper {
                display: grid;
                grid-template-columns: 1.5fr 1fr 1fr;
                grid-gap: 20px;
            }
            .blog-wrapper .blog-item {
                background-color: #F4F4F4;
                padding: 30px;
                position: relative;
                overflow: hidden;
                background-repeat: no-repeat;
                background-size: cover;
                background-position: center center;
                z-index: 1;
            }
            .blog-wrapper .blog-item .date {
                position: absolute;
                top: 0;
                right: 0;
                z-index: 1;
            }
            .blog-wrapper .blog-item .date:before {
                display: block;
                content: "";
                background: #fff;
                width: 172px;
    			height: 100px;
                position: absolute;
                z-index: -1;
                right: -1px;
                top: 0;
                margin: 0;
                -webkit-transform: skewY(30deg);
                -moz-transform: skewY(30deg);
                -ms-transform: skewY(30deg);
                transform: skewY(30deg);
                -webkit-transform-origin: 100% 0;
                -moz-transform-origin: 100% 0;
                -ms-transform-origin: 100% 0;
                transform-origin: 100% 0;
            }
            .blog-wrapper .category {
            	margin-top: 80px;
            }
            .blog-wrapper .category ul li {
                display: inline-block;
            }
            .blog-wrapper .blog-item .blog-excerpt {
            	margin: 8px 0;
            }
            .blog-wrapper .category ul {
            	margin: 0;
            	position: relative;
            }
            .blog-wrapper .category ul:before {
            	content: '';
            	position: absolute;
            	top: 50%;
            	right: 100%;
            	transform: translateY(-50%);
            	background: var( --e-global-color-text );
            	width: 20px;
            	height: 1px;
    			margin-right: 10px;
            }
            .blog-wrapper .category ul li {
            	margin-right: 5px;
            }
            .bg_type_style .cat-item,
            .bg_type_style .blog-title,
            .bg_type_style .blog-excerpt {
            	color: #fff !important;
            }
            .blog-wrapper .bg_type_style .category ul:before {
                background: var( --e-global-color-primary );
            }
            .blog-overlay {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0,0,0,0.3);
                z-index: -1;
            }
        </style>
		<div class="blog-wrapper">
			<?php
				$args = array(
					'post_type' => 'post',
					'post_per_page' => -1,
				);
				$query = new WP_Query($args);
				while ($query -> have_posts()){
					$query -> the_post();
					$bg_img = get_the_post_thumbnail_url();
			?>
            <div class="blog-item <?php if($bg_img){echo 'bg_type_style';}?>" 
            <?php if($bg_img){?>
            style="background-image: url(<?php echo $bg_img;?>);"
            <?php } ?>
            >
            	<?php if($bg_img){echo '<div class="blog-overlay"></div>';}?>
                <div class="date">
                    <h4 class="blog-day"><?php echo get_the_date( 'd' );?></h4>
                    <h5 class="blog-month"><?php echo get_the_date( ' M' );?></h5>
                </div>
                <div class="category">
                    <ul>
                    	<?php 
	                    	$category_name=get_the_category($post->ID);
	                        foreach($category_name as $cat){
	                    ?>
	                        <li>
	                            <a href="#" class="cat-item"><?php echo $cat->cat_name;?></a>
	                        </li>
	                    <?php
	                        }
	                    ?>
                    </ul>
                </div>
                <h3 class="blog-title">
                    <?php echo wp_kses(get_the_title(),true);?>
                </h3>
                <p class="blog-excerpt">
                    <?php echo wp_kses(get_the_excerpt(),true);?>
                </p>
                <a href="<?php echo wp_kses(get_the_permalink(),true);?>" class="blog-readmore">
                	<?php echo wp_kses($settings['readmore_title'],true);?>
                	<?php \Elementor\Icons_Manager::render_icon( $settings['readmore_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                </a>
            </div>
        	<?php }
        		wp_reset_postdata();
        	?>
        </div>

		<?php
	}
}