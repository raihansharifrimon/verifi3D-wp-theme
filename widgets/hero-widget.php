<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor List Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Banner_Widget extends \Elementor\Widget_Base {
	public function get_name() {
		return 'Hero Section';
	}

	public function get_title() {
		return esc_html__( 'Hero Section', 'verifi3d-elementor' );
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
		return [ 'hero', 'home', 'hero-section' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'verifi3d-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		/* Start repeater */

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'text',
			[
				'label' => esc_html__( 'Text', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'List Item', 'verifi3d-elementor' ),
				'default' => esc_html__( 'List Item', 'verifi3d-elementor' ),
				'label_block' => true,
				'dynamic' => [
					'active' => true,
				],
			]
		);

		$repeater->add_control(
			'link',
			[
				'label' => esc_html__( 'Link', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'verifi3d-elementor' ),
				'dynamic' => [
					'active' => true,
				],
			]
		);

		/* End repeater */

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

		// button-1 
		$this->add_control(
			'btn-1-title',
			[
				'label' => esc_html__( 'Button 1', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Text', 'verifi3d-elementor' )				
			]
		);

		// button-1 url
		$this->add_control(
			'btn-1-url',
			[
				'label' => esc_html__( 'Button 1 URL', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __( '#', 'verifi3d-elementor' ),
				'dynamic' => [
					'active' => true,
				],				
			]
		);

		// button-2
		$this->add_control(
			'btn-2-title',
			[
				'label' => esc_html__( 'Button 2', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Text', 'verifi3d-elementor' )				
			]
		);

		// button-2 url 
		$this->add_control(
			'btn-2-url',
			[
				'label' => esc_html__( 'Button 2 URL', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::URL,
				'separator' => 'after',
				'placeholder' => __( '#', 'verifi3d-elementor' ),
				'dynamic' => [
					'active' => true,
				],		
			]
		);

		// Image large
		$this->add_control(
			'image-large',
			[
				'label' => esc_html__( 'Image Large', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::MEDIA,				
			]
		);

		// Image small
		$this->add_control(
			'image-small',
			[
				'label' => esc_html__( 'Image Samll', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::MEDIA,				
			]
		);

		$this->end_controls_section();
		
		// start style control
		$this->start_controls_section(
			'style_content_section',
			[
				'label' => esc_html__( 'List Style', 'verifi3d-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Color', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .verifi3d-elementor-text' => 'color: {{VALUE}};',
					'{{WRAPPER}} .verifi3d-elementor-text > a' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'icon_typography',
				'selector' => '{{WRAPPER}} .verifi3d-elementor-text, {{WRAPPER}} .verifi3d-elementor-text > a',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'text_shadow',
				'selector' => '{{WRAPPER}} .verifi3d-elementor-text',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'style_marker_section',
			[
				'label' => esc_html__( 'Marker Style', 'verifi3d-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'marker_color',
			[
				'label' => esc_html__( 'Color', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .verifi3d-elementor-text::marker' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'marker_spacing',
			[
				'label' => esc_html__( 'Spacing', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em', 'rem' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
					'em' => [
						'min' => 0,
						'max' => 10,
					],
					'rem' => [
						'min' => 0,
						'max' => 10,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 40,
				],
				'selectors' => [
					// '{{WRAPPER}} .verifi3d-elementor' => 'padding-left: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .verifi3d-elementor' => 'padding-inline-start: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$heading = $settings['heading'];
		$description = $settings['description'];
		$btn_1_title = $settings['btn-1-title'];
		$btn_1_url = $settings['btn-1-url']['url'];
		$btn_2_title = $settings['btn-2-title'];
		$btn_2_url = $settings['btn-2-url']['url'];
		$image_large = $settings['image-large'];
		$image_small = $settings['image-small'];
		?>
		<section class="Hero overflow-hidden">
            <div class="container text-center">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12">
                        <div class="hero-content">                            
                            <div class="main-img">
                                <img src="<?= $image_large['url'] ?>" alt="">
                                <div class="small-laptop">
                                    <img class="smallImg" src="<?= $image_small['url'] ?>" alt="">
                                </div>
                            </div>

                            <a href="<?= $btn_1_url ?>">
								<button class="common-btn mx-lg-4 mx-sm-3">
									<?= $btn_1_title ?>
                                    <span><i class="fa fa-arrow-right" aria-hidden="true"></i></span>
								</button>
							</a>
                            <a class="popup-video" href="<?= $btn_2_url ?>">
								<button class="common-btn">
								<?= $btn_2_title ?>
									<span><i class="fa fa-search" aria-hidden="true"></i></span>
                                </button>
							</a>


                        </div>
                    </div>
                </div>
            </div>
        </section>
		<?php

	}

	/**
	 * Render list widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function content_template() {
		?>
		<#
		html_tag = {
			'ordered': 'ol',
			'unordered': 'ul',
			'other': 'ul',
		};
		view.addRenderAttribute( 'list', 'class', 'verifi3d-elementor' );
		#>
		<{{{ html_tag[ settings.marker_type ] }}} {{{ view.getRenderAttributeString( 'list' ) }}}>
			<# _.each( settings.list_items, function( item, index ) {
				var repeater_setting_key = view.getRepeaterSettingKey( 'text', 'list_items', index );
				view.addRenderAttribute( repeater_setting_key, 'class', 'verifi3d-elementor-text' );
				view.addInlineEditingAttributes( repeater_setting_key );
				#>
				<li {{{ view.getRenderAttributeString( repeater_setting_key ) }}}>
					<# var title = item.text; #>
					<# if ( item.link ) { #>
						<# view.addRenderAttribute( `link_${index}`, item.link ); #>
						<a href="{{ item.link.url }}" {{{ view.getRenderAttributeString( `link_${index}` ) }}}>
							{{{title}}}
						</a>
					<# } else { #>
						{{{title}}}
					<# } #>
				</li>
			<# } ); #>
		</{{{ html_tag[ settings.marker_type ] }}}>
		<?php
	}

}