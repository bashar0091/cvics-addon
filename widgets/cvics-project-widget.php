<?php
class cvics_project_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'cvics_project_Widget';
	}

	public function get_title() {
		return esc_html__( 'Cvics Project Gallery', 'cvics' );
	}

	public function get_icon() {
		return 'eicon-code';
	}

	public function get_categories() {
		return [ 'basic' ];
	}

	public function get_keywords() {
		return [ 'project', 'filter', 'gallery' ];
	}

	protected function register_controls() {

		// Content Tab Start
		$this->start_controls_section(
			'project_item',
			[
				'label' => esc_html__( 'Project Item', 'cvics' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'projectlist',
			[
				'label' => esc_html__( 'List Item', 'cvics' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
					[
						'name' => 'project_title',
						'label' => esc_html__( 'Text', 'cvics' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'placeholder' => esc_html__( 'List Item', 'cvics' ),
						'default' => esc_html__( 'List Item', 'cvics' ),
					],
					[
						'name' => 'project_content',
						'label' => esc_html__( 'Content', 'cvics' ),
						'type' => \Elementor\Controls_Manager::TEXTAREA,
						'placeholder' => esc_html__( 'List Content', 'cvics' ),
					],
					[
						'name' => 'project_img',
						'label' => esc_html__( 'Image', 'cvics' ),
						'type' => \Elementor\Controls_Manager::MEDIA,
					],
				],
				'default' => [
					[
						'text' => esc_html__( 'List Item #1', 'cvics' ),
						'link' => 'https://elementor.com/',
					],
					[
						'text' => esc_html__( 'List Item #2', 'cvics' ),
						'link' => 'https://elementor.com/',
					],
				],
				'title_field' => '{{{ text }}}',
			]
		);

		$this->end_controls_section();

		// Content Tab End


		// Style Tab Start

		// title 
		$this->start_controls_section(
			'project_title',
			[
				'label' => esc_html__( 'Title', 'cvics' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'project_title_color',
			[
				'label' => esc_html__( 'Title Color', 'cvics' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .project-title' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'project_title_typography',
				'selector' => '{{WRAPPER}} .project-title',
			]
		);
		$this->end_controls_section();

		// content 
		$this->start_controls_section(
			'project_des',
			[
				'label' => esc_html__( 'Content', 'cvics' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'project_des_color',
			[
				'label' => esc_html__( 'Description Color', 'cvics' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .project_des' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'project_des_typography',
				'selector' => '{{WRAPPER}} .project_des',
			]
		);
		
		$this->end_controls_section();

		// Style Tab End

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<style>
            .project-wrapper {
				display: grid;
				grid-template-columns: 1fr 1fr 1fr;
				grid-gap: 20px;
			}
			.project-wrapper .project-item {
				position: relative;
                box-shadow: 1px 1px 10px #b3b3b3;
                transition: all 0.3s ease-in-out;
			}
            .project-wrapper .project-item:hover {
                transform: translateY(-10px);
            }
			.project-wrapper .project-item img {
				height: 406px;
                width: 406px;
                object-fit: cover;
			}
			.project-wrapper .project-item .project-content {
                position: absolute;
                bottom: 0;
                background: #fff;
                height: 30%;
                display: flex;
                flex-direction: column;
                justify-content: end;
                clip-path: polygon(100.23% 0.54%, 100% 30%, 100% 67%, 100% 100%, 0px 100%, -0.23% 27.91%);
                width: 100%;
                padding: 20px;
                opacity: 1;
                visibility: visible;
                transition: all 0.4s ease-in-out;
            }
            .project-wrapper .project-item:hover .project-content {
            	height: 0;
                opacity: 0;
                visibility: hidden;
            }
            .project-wrapper .project-item .project_des {
            	margin-bottom: 0;
            }
			.plus-icon {
                position: absolute;
                right: 0;
                top: 0;
                width: 120px;
                height: 85px;
                clip-path: polygon(100% 0px, 109.02% 104.29%, -35.75% -21.52%);
                background: var( --e-global-color-primary );
            }
			.plus-icon span {
				position: absolute;
               	top: -17px;
				right: 15px;;
                font-size: 55px;
                color: #fff;
                transition: all 0.6s ease-in-out;
			}
            .project-wrapper .project-item .plus-icon span {
            	font-size: 50px;
            }
			.project-cat ul {
				margin: 0;
				padding: 0;
			}
			.project-cat ul li {
				display: inline-block;
			}
            @media (max-width:767px) {
            	.project-wrapper {
                    display: block;
                }
                .project-wrapper .project-item img {
                    width: 100%;
                }
                .project-wrapper .project-item .project-content {
                    width: 100%;
                    opacity: 1;
                    visibility: visible;
                    padding: 20px;
                }
                .project-wrapper .project-item {
                    box-shadow: 1px 1px 10px #b3b3b3;
                    margin-bottom: 15px;
                }
                .plus-icon {
                    clip-path: polygon(100% 0px, 109.02% 104.29%, -31.58% -9.76%);
                }
                .project-wrapper .project-item:hover {
                    transform: translateY(0);
                }
            }
        </style>
        
		<div class="project-wrapper">
			<?php
				foreach (  $settings['projectlist'] as $item ) {
			?>
			<div class="project-item">
				<img src="<?php echo esc_url($item['project_img']['url']);?>" alt="image">
				<div class="project-content">
					<div class="plus-icon">
						<span>+</span>
					</div>
					<h3 class="project-title"><?php echo wp_kses($item['project_title'], true);?></h3>
					<p class="project_des">
						<?php echo wp_kses($item['project_content'], true);?>
					</p>
				</div>
			</div>
			<?php } ?>
		</div>

		<?php
	}
}