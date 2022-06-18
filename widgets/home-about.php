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
class Home_About_Section_Widget extends \Elementor\Widget_Base {
	public function get_name() {
		return 'About Info';
	}

	public function get_title() {
		return esc_html__( 'About Info', 'verifi3d-elementor' );
	}

	public function get_icon() {
		return 'eicon-call-to-action';
	}

	public function get_custom_help_url() {
		return 'https://developers.elementor.com/docs/widgets/';
	}

	public function get_categories() {
		return [ 'verifi3d' ];
	}

	public function get_keywords() {
		return [ 'about', 'aboutinfo', 'home' ];
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
			'title',
			[
				'label' => esc_html__( 'Title', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Title', 'verifi3d-elementor' )				
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
        
        $this->add_control(
			'video_link',
			[
				'label' => esc_html__( 'Video URL', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __( '#', 'verifi3d-elementor' ),
				'dynamic' => [
					'active' => true,
				],				
			]
		);

        // button text
		$this->add_control(
			'btn_text',
			[
				'label' => esc_html__( 'Button Text', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Text', 'verifi3d-elementor' )				
			]
		);

        // button url
		$this->add_control(
			'btn_url',
			[
				'label' => esc_html__( 'Button URL', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __( '#', 'verifi3d-elementor' ),
				'dynamic' => [
					'active' => true,
				],				
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
					'{{WRAPPER}} , .left-info h5' => 'color: {{VALUE}};',
				],
			]
		);

        // title typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'heading_typography',
				'selector' => '{{WRAPPER}} .left-info h5',
			]
		);

        // title shadow
		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'heading_shadow',                
				'selector' => '{{WRAPPER}} .left-info h5',
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
					'{{WRAPPER}} , .info p' => 'color: {{VALUE}};',
				],
			]
		);

        // description typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'description_typography',
				'selector' => '{{WRAPPER}} .info p',
			]
		);

        // title shadow
		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'description_shadow',
				'selector' => '{{WRAPPER}} .info p',
			]
		);

		$this->end_controls_section();

	}

    // HTML content render from here
	protected function render() {
		$settings = $this->get_settings_for_display();
		$title = $settings['title'];
		$description = $settings['description'];
		$video_link = $settings['video_link']['url'];
		$btn_text = $settings['btn_text'];
		$btn_url = $settings['btn_url']['url'];

		?>
        <section class="info overflow-hidden mt-4">
            <div class="info-main mt-lg-3">
                <div class="container">
                    <div class="row align-items-center info-row py-4">
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="left-info">
                                <h5><?= $title ?></h5>
                                <p><?= $description ?></p>
                                <a href="<?= $btn_url ?>"><button class="common-btn"><?= $btn_text ?><span><i class="fa fa-arrow-right" aria-hidden="true"></i></span></button></a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">

                            <div class="info-video-area">
                                <iframe src="<?= $video_link ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
		<?php

	}

}