<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor Section Heading Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Section_Heading_Widget extends \Elementor\Widget_Base {
	public function get_name() {
		return 'Section Heading';
	}

	public function get_title() {
		return esc_html__( 'Section Heading', 'verifi3d-elementor' );
	}

	public function get_icon() {
		return 'eicon-image-box';
	}

	public function get_custom_help_url() {
		return 'https://developers.elementor.com/docs/widgets/';
	}

	public function get_categories() {
		return [ 'verifi3d' ];
	}

	public function get_keywords() {
		return [ 'heading', 'section-heading', 'hero-section' ];
	}

	protected function register_controls() {

        //----------Contents tab------------        
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'verifi3d-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		// title 
		$this->add_control(
			'heading',
			[
				'label' => esc_html__( 'Title', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Heading', 'verifi3d-elementor' )				
			]
		);

		// description 
		$this->add_control(
			'description',
			[
				'label' => esc_html__( 'Description', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'separator' => 'after',
				'placeholder' => __( 'Description', 'verifi3d-elementor' )				
			]
		);		

		$this->end_controls_section();

        // ----------------style tab-----------		
		$this->start_controls_section(
			'style_section',
			[
				'label' => esc_html__( 'Styles', 'verifi3d-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
        
        // ----------------Heading style-----------	
        $this->add_control(
			'title_style_heading',
			[
				'label' => esc_html__( 'Heading Style', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
			]
		);

        // title style
		$this->add_control(
			'heading_color',
			[
				'label' => esc_html__( 'Color', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#2aa9e1',
				'selectors' => [
					'{{WRAPPER}} , .section-heading h1' => 'color: {{VALUE}};',
				],
			]
		);

        // title typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'heading_typography',
				'selector' => '{{WRAPPER}} .section-heading h1',
			]
		);

        // title shadow
		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'heading_shadow',                
				'selector' => '{{WRAPPER}} .section-heading h1',
			]
		);

        // ----------------Description style-----------
        $this->add_control(
			'description_style_heading',            
			[
                'separator' => 'before',
				'label' => esc_html__( 'Description Style', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING
			]
		);

        // description style
		$this->add_control(
			'description_color',
			[
				'label' => esc_html__( 'Color', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#e16627',
				'selectors' => [
					'{{WRAPPER}} , .section-heading p' => 'color: {{VALUE}};',
				],
			]
		);

        // description typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'description_typography',
				'selector' => '{{WRAPPER}} .section-heading p',
			]
		);

        // title shadow
		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'description_shadow',
				'selector' => '{{WRAPPER}} .section-heading p',
			]
		);

        // ----------------Divider Style-----------
        $this->add_control(
			'divider_color',            
			[
                'separator' => 'before',
				'label' => esc_html__( 'Divider Style', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING
			]
		);

        // divider bg color
		$this->add_control(
			'divider_bg_color',
			[
				'label' => esc_html__( 'Color', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#e16627',
				'selectors' => [
					'.section-heading h1::after' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

	}

    // HTML content render from here
	protected function render() {
		$settings = $this->get_settings_for_display();
		$heading = $settings['heading'];
		$description = $settings['description'];

		?>
            <div class="container">
                <div class="section-heading pt-lg-2 pt-md-0">
                    <h1 data-animation="fadeInLeft"><?= $heading ?></h1>
                    <?php
                    if ($description) {
                        ?>
                        <p><?= $description ?></p>
                        <?php
                    }
                    ?>
                </div>
            </div>
		<?php

	}

}