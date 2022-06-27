<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor Overlay Image.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Overlay_Image extends \Elementor\Widget_Base {
	public function get_name() {
		return 'Overlay Image';
	}

	public function get_title() {
		return esc_html__( 'Overlay Image', 'verifi3d-elementor' );
	}

	public function get_icon() {
		return 'eicon-image-rollover';
	}

	public function get_custom_help_url() {
		return 'https://developers.elementor.com/docs/widgets/';
	}

	public function get_categories() {
		return [ 'verifi3d' ];
	}

	public function get_keywords() {
		return [ 'overlay-image', 'verifi3d' ];
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
				'type' => \Elementor\Controls_Manager::TEXT				
			]
		);

        // icon
		$this->add_control(
			'icon',
			[
				'label' => esc_html__( 'Icon', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-arrow-right',
					'library' => 'fa-solid',
				],		
			]
		);
        // link
		$this->add_control(
			'link',
			[
				'label' => esc_html__( 'Link', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::URL,
				'separator' => 'after',
				'placeholder' => __( '#', 'verifi3d-elementor' ),
				'dynamic' => [
					'active' => true,
				],		
			]
		);

		// image 
		$this->add_control(
			'image',
			[
				'label' => esc_html__( 'Image', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::MEDIA				
			]
		);
		$this->end_controls_section();

	}

    // HTML content render from here
	protected function render() {
		$settings = $this->get_settings_for_display();

		?>
        <div style="background: linear-gradient(rgba(84, 89, 95, 0.71), rgba(84, 89, 95, 0.7)) 0% 0% / cover no-repeat, url('<?= $settings['image']['url']?>')" class="media-links">
            <h1><?= $settings['title']?></h1>
            <div class="media-icon">
                <a href="<?= $settings['link']['url']?>"><i class="<?= $settings['icon']['value']?>"></i></a>
            </div>
        </div>
		<?php

	}

}